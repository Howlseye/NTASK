<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/logo2.png">
    <?php include '../crud.php'; auth()?>
    <title>Tugas</title>

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
                    <div class="kepilih">
                        <a href="">
                            <img src="../assets/icons/to-do.png">&nbsp; &nbsp;
                            Tugas
                        </a>
                    </div>
                </div>
                <div class="pilih">
                    <a href="../Profile/">
                        <img src="../assets/icons/user-gear.png">&nbsp; &nbsp;
                        Profile
                    </a>
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
                    <div class="iman"><img class="mani" src="../assets/icons/to-do2.png"></div>&nbsp;&nbsp;
                    Tugas
                </div>
                <div style="width: 700px;"></div>
                <div class="profil">
                    <img src="../assets/icons/user.png"  onclick="window.location='../profile'">
                    <label class="drop"><?php echo $_SESSION['user']['nama']?></label>
                </div>
            </div>
            <div class="aks">
                <div class="bpls">
                    <button class="pls" id="pls">
                        <label class="ic" style="color: white;">Tambah Tugas</label>
                    </button>
                </div>
                <div class="filter">
                    <form method="post">
                        <div class="filter1">
                            <div class="fsel">
                                <select name="prioritas">
                                <option value="" hidden>Prioritas</option>
                                <option value="Rendah">Rendah</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Tinggi">Tinggi</option>
                                </select>
                            </div>
                            <div class="filter2">
                                <input type="text" name="xcari" placeholder="Cari">
                                <button name="cari">
                                    <img src="../assets/icons/search.png">
                                </button>
                            </div>
                        </div> 
                    </form>			
                </div>
            </div>
            <div class="tbl">
                <table id="tabel" class="container" style="top: 0px;">
                    <thead>
                        <tr>
                            <th><h1>No</h1></th>
                            <th><h1>Tugas</h1></th>
                            <th><h1>Deskripsi</h1></th>
                            <th><h1>Deadline</h1></th>
                            <th><h1>Dibuat</h1></th>
                            <th><h1>Prioritas</h1></th>
                            <th><h1>Status</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php tampil() ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="myPopup" class="popup">
        <div class="popup-content block">
            <span class="close">&times;</span>
            <form method="post" style="padding-top: 40px;">
                <div class="ing" style="position: relative;">
                    <input type="text" class="inp" name="task" placeholder="Beli Buah" required>
                    <label class="ilab">Tugas</label>
                </div>
                <div class="ing" style="position: relative; margin-top: 20px;">
                    <textarea class="inp" name="deskripsi" style="resize: none;" rows="7" placeholder="Pisang, Mangga, Jeruk"></textarea>
                    <label class="ilab">Deskripsi</label>
                </div>
                <div class="ing" style="position: relative; margin-top: 20px;">
                    <input type="date" class="inp" name="deadline" required>
                    <label class="ilab">Deadline</label>
                </div>
                <div class="ing" style="position: relative; margin-top: 20px; padding-right: 100px;">
                    <select name="prioritas" class="inp" required>
                        <option  value="" hidden>Pilih Prioritas</option>
                        <option value="Rendah">Rendah</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Tinggi">Tinggi</option>
                    </select>
                    <label class="ilab">Prioritas</label>
                </div>
                <button class="button type1" name="tugas" style="margin-top: 25px;">
                  <span class="btn-txt">Selesai</span>
                </button>
            </form>
        </div>
    </div>

    <div id="lihat" class="popup" style="top: -140px;">
        <div class="popup-content block">
            <span id="close" class="close">&times;</span>
            <img src="../assets/icons/print.png" style="position: relative; top: 5px; cursor: pointer;" id="print">
            <form method="post" style="padding-top: 40px;">
                <input type="hidden" name="id" id="idtugas">
                <div class="ing" style="position: relative;">
                    <input type="text" class="inp" id="task" name="task" placeholder="Beli Buah" required>
                    <label class="ilab">Tugas</label>
                </div>
                <div class="ing" style="position: relative; margin-top: 20px;">
                    <textarea class="inp" id="deskripsi" name="deskripsi" style="resize: none;" rows="7" placeholder="Pisang, Mangga, Jeruk"></textarea>
                    <label class="ilab">Deskripsi</label>
                </div>
                <div class="ing" style="position: relative; margin-top: 20px;">
                    <input type="date" id="deadline" class="inp" name="deadline" required>
                    <label class="ilab">Deadline</label>
                </div>
                <input type="hidden" id="dibuat" name="dibuat">
                <div class="ing" style="position: relative; margin-top: 20px; padding-right: 100px;">
                    <select id="prioritas" name="prioritas" class="inp" required>
                        <option value="" hidden>Pilih Prioritas</option>
                        <option value="Rendah">Rendah</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Tinggi">Tinggi</option>
                    </select>
                    <label class="ilab">Prioritas</label>
                </div>
                <div class="ing" style="position: relative; margin-top:20px;">
                    <input type="text" class="inp" id="statu" disabled>
                    <label class="ilab">Status</label>
                </div>
                <button class="button type2" name="hapus" style="left: 10px; transform: none; width: 110px; margin-top: 25px;">
                  <span class="btn-txt">Hapus</span>
                </button>
                <button class="button type1" name="edit" style="left: 30px; transform: none; width: 110px; margin-top: 25px;">
                  <span class="btn-txt">Simpan</span>
                </button>
                <button class="button type3" name="done" id="stat" style="left: 50px; transform: none; width: 122px; margin-top: 25px;">
                  <span id="sta" class="btn-txt">Selesaikan</span>
                </button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('pls').addEventListener('click', function(event) {
            var popup = document.getElementById('myPopup');
            setTimeout(function(){
            popup.style.display = 'block';}
            ,600)
        });

        document.getElementsByClassName('close')[0].onclick = function() {
            document.getElementById('myPopup').style.display = 'none';
        };

        document.getElementById('tabel').addEventListener('click', function(event) {
            var row = event.target.parentNode;
            var id = row.cells[7].innerText;
            var tugas = row.cells[1].innerText;
            var deskripsi = row.cells[2].innerText;
            var dead = row.cells[3].innerText;
            var [d, m, y] = dead.split("/");
            var deadline = `${y}-${m}-${d}`;
            var dib = row.cells[4].innerText;
            var [a, b, c] = dib.split("/");
            var dibuat = `${c}-${b}-${a}`;
            var prioritas = row.cells[5].innerText;
            var status = row.cells[6].innerText;
            var id_tugas = document.getElementById('idtugas');
            var inp_tugas = document.getElementById('task');
            var inp_deskripsi = document.getElementById('deskripsi');
            var inp_deadline = document.getElementById('deadline');
            var inp_dibuat = document.getElementById('dibuat');
            var sel_prior = document.getElementById('prioritas');
            var stat_inp = document.getElementById('statu');
            var stat_btn = document.getElementById('stat');
            var stat_txt = document.getElementById('sta');
            var popup = document.getElementById('lihat');
            id_tugas.value = id;
            inp_tugas.value = tugas;
            inp_deskripsi.value = deskripsi;
            inp_deadline.value = deadline;
            inp_dibuat.value = dibuat;
            sel_prior.value = prioritas;
            stat_inp.value = status;
            if(status == 'Selesai'){
                stat_btn.className = "button type2";
                stat_btn.name = "blm";
                stat_txt.innerText = "Batalkan";
            }else if(status == 'Belum Selesai'){
                stat_btn.className = "button type3";
                stat_btn.name = "done";
                stat_txt.innerText = "Selesaikan";
            }
            popup.style.display = 'block';
        });

        document.getElementById('close').onclick = function() {
            document.getElementById('lihat').style.display = 'none';
        };

        document.getElementById('print').addEventListener('click', function(event){
            var tugas = document.getElementById('task').value;
            var deskripsi = document.getElementById('deskripsi').value;
            var deadline = document.getElementById('deadline').value;
            var dibuat = document.getElementById('dibuat').value;
            var prior = document.getElementById('prioritas').value;
            var status = document.getElementById('statu').value;
            window.location.href = "print.php?tugas=" + encodeURIComponent(tugas) + "&deskripsi=" + encodeURIComponent(deskripsi) + "&deadline=" + encodeURIComponent(deadline) + "&dibuat=" + encodeURIComponent(dibuat) +  "&prioritas=" + encodeURIComponent(prior) + "&status=" + encodeURIComponent(status);

        });
    </script>

</body>
</html>