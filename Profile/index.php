<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/logo2.png">
    <?php include '../crud.php'; auth()?>
    <title>Dashboard</title>
</head>
<body>
    <canvas class="anim"><script src="../js/script.js"></script></canvas>
    <div class="satu">
        <div class="side">
            <div class="sider">
                <div class="pilih" style="justify-content: center;padding-bottom: 15px;margin-top: 30px; border-bottom: 1px solid #fafafaf3;">
                    <img src="../assets/icons/logo.png" onclick="window.open('../Dashboard', '_self');" style="width: 150px; position: relative; top: -15px; cursor: pointer;">
                </div>
                <div class="pilih" style="margin-top: 20px;">
                    <a href="../Dashboard/">
                        <img src="../assets/icons/chart-tree-map.png">&nbsp; &nbsp;
                        Dashboard
                    </a>
                </div>
                <div class="pilih">
                    <a href="../Tugas/">
                        <img src="../assets/icons/to-do.png">&nbsp; &nbsp;
                        Tugas
                    </a>
                </div>
                <div class="pilih">
                    <div class="kepilih">
                        <a href="">
                            <img src="../assets/icons/user-gear.png">&nbsp; &nbsp;
                            Profile
                        </a>
                    </div>
                </div>
                <div class="pilih">
                    <a href="../crud.php?logout">
                        <img src="../assets/icons/sign-out-alt.png">&nbsp; &nbsp;
                        Keluar
                    </a>
                </div>
            </div>
        </div>
        <div class="dua" style="height: auto;">
            <div class="atas">
                <div class="judul" onclick="window.location='#'">
                    <div><img src="../assets/icons/user-gear2.png"></div>&nbsp;&nbsp;
                    Profile
                </div>
                <div style="width: 700px;"></div>
                <div class="profil">
                    <img src="../assets/icons/user.png">
                    <label class="drop"><?php echo $_SESSION['user']['nama']?></label>
                </div>
            </div>
            <div class="utama">
                <div class="wdh_prfl" style="padding: 20px; padding-top: 50px;">
                    <form method="post">
                        <div class="ing" style="position: relative;">
                            <input type="text" name="nama" class="inp" placeholder="Isi Nama" value="<?php echo $_SESSION['user']['nama']?>" required>
                            <label class="ilab" style="background-color: #2d2d41;border-radius:15px; font-size:18px; letter-spacing: 2px;">Nama</label>
                        </div>
                        <div class="ing" style="position: relative; padding-top: 20px;">
                            <input type="text" name="email" class="inp" placeholder="Isi Email" value="<?php echo $_SESSION['user']['email']?>" required>
                            <label class="ilab" style="background-color: #2d2d41; border-radius:15px; font-size:18px; letter-spacing: 2px;">Email</label>
                        </div>
                        <div class="ing" style="position: relative; padding-top: 20px;">
                            <input type="password" name="sandi" id="sandi" class="inp" placeholder="Isi Kata Sandi" value="<?php echo openssl_decrypt($_SESSION['user']['sandi'], 'AES-128-CTR', 'lolololol', 0, 1234567891011121)?>" required>
                            <label class="ilab" style="background-color: #2d2d41; border-radius:15px; font-size:18px; letter-spacing: 2px;">Kata Sandi</label>
                            <img src="../assets/icons/eye-crossed.png" alt="lihat" id="lihat" style="display: block; color: white; font-size: 14px; cursor: pointer; position: relative; top: -33px; left: 955px; margin-bottom: -15px;">
                        </div>
                        <div class="ing" style="position: relative; padding-top: 20px;">
                            <textarea class="inp" name="tentang" placeholder="tentang Saya" rows="8"><?php echo $_SESSION['user']['tentang']?></textarea>
                            <label class="ilab" style="background-color: #2d2d41; border-radius:15px; font-size:18px; letter-spacing: 2px;">Tentang Saya</label>
                        </div>
                        <button class="button type1" name="profil" style="width: 150px; margin-top: 25px;">
                            <span class="btn-txt">Simpan</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('lihat').addEventListener('click', function(){
            var btn = document.getElementById('lihat');
            var inp = document.getElementById('sandi');
            if(btn.alt == 'lihat'){
                inp.type = 'text';
                btn.alt = 'hide';
                btn.src = '../assets/icons/eye.png';
            } else{
                inp.type = 'password';
                btn.alt= 'lihat';
                btn.src = '../assets/icons/eye-crossed.png';
            }
        });
    </script>
</body>
</html>