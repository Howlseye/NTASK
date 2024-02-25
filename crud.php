<?php
    $kon = mysqli_connect('localhost','root','','ntask');

    if(isset($_POST['daftar'])){
        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8');
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $pw = openssl_encrypt($_POST['sandi'], 'AES-128-CTR', 'lolololol', 0, 1234567891011121);
        $ttg = "Halo!";

        $sql = "insert into user values(null, ?, ?, ?, ?)";
        $pre = $kon->prepare($sql);
        $pre->bind_param("ssss", $nama, $email, $pw, $ttg);
        $daftar = $pre->execute();

        if($daftar){
            echo "<script>alert('Akun Berhasil Dibuat, Silahkan Login');</script>";
        } else{
            echo "<script>alert('Terjadi Kesalahan, Coba Lagi !');</script>";
        }
    }

    if (isset($_POST['login'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $pw = htmlspecialchars($_POST['sandi'], ENT_QUOTES, 'UTF-8');

        $sql = "select * from user where email=? or sandi=?";
        $pre = $kon->prepare($sql);
        $pre->bind_param("ss", $email, $pw);
        $login = $pre->execute();

        if ($login) {
            $data = $pre->get_result();
            if ($data->num_rows > 0) {
                $user = $data->fetch_assoc();
                if ($pw == openssl_decrypt($user['sandi'], 'AES-128-CTR', 'lolololol', 0, 1234567891011121)) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header("location: Dashboard");
                } else {
                    echo "<script>alert('Password Salah');</script>";
                }
            } else {
                echo "<script>alert('Email Tidak Ditemukan');</script>";
            }
        } else {
            echo "<script>alert('Terjadi Kesalahan, Coba Lagi !');</script>";
        }
    }

    function auth(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        if(!isset($_SESSION['user'])){
            header('location:../');
        }
    }

    function chart($kolom1, $val1, $kolom2, $val2){
        auth();
        $id = $_SESSION['user']['id_user'];
        if(!empty($kolom1) and !empty($val1) and empty($kolom2) and empty($val2)){
            $and = "and $kolom1 = '$val1'";
        } else if (!empty($kolom1) and !empty($val1) and !empty($kolom2) and !empty($val2)){
            $and = "and $kolom1 = '$val1' and $kolom2 = '$val2'";
        } else{
            $and= "";
        }
        $data = mysqli_query($GLOBALS['kon'], "select tugas from tugas where id_user = '$id' $and");
        if(empty(($data))){
            $chart = 0; 
        } else{
            $chart = mysqli_num_rows($data);            
        }
        echo $chart;
    }

    if(isset($_POST['tugas'])){
        auth();
        $id_user = $_SESSION['user']['id_user'];
        $tugas = htmlspecialchars($_POST['task'], ENT_QUOTES, 'UTF-8');
        $deskripsi = htmlspecialchars($_POST['deskripsi'], ENT_QUOTES, 'UTF-8');
        if(empty($deskripsi)){
            $deskripsi = "-";
        }
        $deadline = $_POST['deadline'];
        $dibuat = date("y-m-d");
        $prioritas = $_POST['prioritas'];
        $status = "Belum Selesai";

        $sql = "insert into tugas values(null, ?, ?, ?, ?, ?, ?, ?)";
        $pre = $kon->prepare($sql);
        $pre->bind_param('issssss', $id_user, $tugas, $deskripsi, $deadline, $dibuat, $prioritas, $status);
        $tbh = $pre->execute();

        if($tbh){
            echo "<script>alert('Ditambahkan');</script>";
        } else{
            echo "<script>alert('Terjadi Kesalahan, Coba Lagi !');</script>";
        }
    }

    function deadline($tgl,$deadline){
        if ($tgl > $deadline) {
            return true;
        } else {
            return false;
        }
    }

    function tampil(){
        auth();
        $id = $_SESSION['user']['id_user'];
        if(isset($_POST['cari'])){
            $prioritas = $_POST['prioritas'];
            $xcari = htmlspecialchars($_POST['xcari'], ENT_QUOTES, 'UTF-8');
            if(!empty($prioritas) && !empty($xcari)){
                $and = "and tugas.prioritas = '$prioritas' and tugas.tugas like '%".$xcari."%'";
            } else if(!empty($prioritas) && empty($xcari)){
                $and = "and tugas.prioritas = '$prioritas'";
            } else if(empty($prioritas) && !empty($xcari)){
                $and = "and tugas.tugas like '%".$xcari."%'";
            } else if(empty($prioritas) && empty($xcari)){
                $and = "";
            }
        } else{
            $and = "";
        }
        
        $sql = "select * from user inner join tugas on user.id_user = tugas.id_user where tugas.id_user = '$id' $and";
        $data = mysqli_query($GLOBALS['kon'], $sql);
        $no = 0;

        while($tugas = mysqli_fetch_array($data)){
            $no++
            ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $tugas['tugas']?></td>
                <td><?php echo $tugas['deskripsi']?></td>
                <td <?php echo(deadline($tugas['dibuat'], $tugas['deadline']))? 'style="color: #FB667A;"':'';?>><?php echo date('d/m/20y', strtotime($tugas['deadline']))?></td>
                <td><?php echo date('d/m/20y', strtotime($tugas['dibuat']))?></td>
                <td style="color:
                <?php
                if($tugas['prioritas'] == 'Rendah'){
                    ?>
                    #4dd2ff
                    <?php
                }else if($tugas['prioritas'] == 'Sedang'){
                    ?>
                    #ffa64d
                    <?php
                }else if($tugas['prioritas'] == 'Tinggi'){
                    ?>
                    #FB667A
                    <?php
                }
                ?>
                ;"><?php echo $tugas['prioritas']?></td>
                <td style="color:<?php echo ($tugas['status'] == 'Selesai')? '#4dff4d':'#FB667A'; ?>;"><?php echo $tugas['status']?></td>
                <td style="display: none;" id="id_tugas"><?php echo $tugas['id_tugas']?></td>
            </tr>
            <?php
        }
    }

    if(isset($_POST['edit'])){
        auth();
        $id = $_POST['id'];
        $tugas = htmlspecialchars($_POST['task'], ENT_QUOTES, 'UTF-8');
        $deskripsi = htmlspecialchars($_POST['deskripsi'], ENT_QUOTES, 'UTF-8');
        if(empty($deskripsi)){
            $deskripsi = "-";
        }
        $deadline = $_POST['deadline'];
        $prioritas = $_POST['prioritas'];

        $sql = "update tugas set tugas = ?, deskripsi = ?, deadline = ?, prioritas = ? where id_tugas = ?";
        $pre = $kon->prepare($sql);
        $pre->bind_param('ssssi',$tugas, $deskripsi, $deadline, $prioritas, $id);
        $edit = $pre->execute();
        if($edit){
            echo "<script>alert('Berhasil Dirubah');</script>";
        } else{
            echo "<script>alert('Terjadi Kesalahan, Coba Lagi !');</script>";
        }
    }

    if(isset($_POST['done'])){
        auth();
        $id = $_POST['id'];
        $done = mysqli_query($kon, "update tugas set status = 'Selesai' where id_tugas = '$id'");
    }

    if(isset($_POST['blm'])){
        auth();
        $id = $_POST['id'];
        $blm = mysqli_query($kon, "update tugas set status = 'Belum Selesai' where id_tugas = '$id'");
    }

    if(isset($_POST['hapus'])){
        auth();
        $id = $_POST['id'];
        $hapus = mysqli_query($kon, "delete from tugas where id_tugas = '$id'");
        if($hapus){
            echo "<script>alert('Berhasil Dihapus');</script>";
        } else{
            echo "<script>alert('Terjadi Kesalahan, Coba Lagi !');</script>";
        }
    }

    if(isset($_POST['profil'])){
        auth();
        $id = $_SESSION['user']['id_user'];
        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8');
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $pw = openssl_encrypt($_POST['sandi'], 'AES-128-CTR', 'lolololol', 0, 1234567891011121);
        $tentang = htmlspecialchars($_POST['tentang'], ENT_QUOTES, 'UTF-8');
        if(empty($tentang)){
            $tentang = 'Halo!';
        }

        $sql = "update user set nama = ?, email = ?, sandi = ?, tentang = ? where id_user = ?";
        $pre = $kon->prepare($sql);
        $pre->bind_param('ssssi', $nama, $email, $pw, $tentang, $id);
        $profil = $pre->execute();

        if($profil){
            echo "<script>alert('Profil Diubah');</script>";
            $_SESSION['user']['nama'] = $nama;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['sandi'] = $pw;
            $_SESSION['user']['tentang'] = $tentang;
        } else{
            echo "<script>alert('Terjadi Kesalahan, Coba Lagi !');</script>";
        }
    }

    if(isset($_GET['logout'])){
        session_start();
        $logout = session_destroy();
        if($logout){
            header('location: ./');
        }
    }
?>