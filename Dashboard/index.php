<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/logo2.png">
    <script src="../js/chart.js/dist/chart.umd.js"></script>
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
                    <div class="kepilih">
                        <a href="">
                            <img src="../assets/icons/chart-tree-map.png">&nbsp; &nbsp;
                            Dashboard
                        </a>
                    </div>
                </div>
                <div class="pilih">
                    <a href="../Tugas/">
                        <img src="../assets/icons/to-do.png">&nbsp; &nbsp;
                        Tugas
                    </a>
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
        <div class="dua">
            <div class="atas">
                <div class="judul" onclick="window.location='#'">
                    <div class="iman"><img src="../assets/icons/chart-tree-map2.png"></div>&nbsp;&nbsp;
                    Dashboard
                </div>
                <div style="width: 700px;"></div>
                <div class="profil">
                    <img src="../assets/icons/user.png" onclick="window.location='../profile'">
                    <label class="drop"><?php echo $_SESSION['user']['nama']?></label>
                </div>
            </div>
            <div class="wdh_ch1">
                <div style="width: 100%; height: 44px; text-align: center;">
                    <h2 style="padding-top: 10px; padding-bottom: 10px; color: #fafafaf3; text-shadow: 0px 0px 35px #c1bfcea8; font-weight: bold;">Tugas Selesai</h2>
                </div>
                <div style="width: 100%; height: 326px;">
                    <canvas id="chart1" style="width: 100%; height: 100%;"></canvas>
                </div>
            </div>
            <div class="wdh_ch2">
                <div style="width: 100%; height: 44px; text-align: center;">
                    <h2 style="padding-top: 10px; padding-bottom: 10px; color: #fafafaf3; text-shadow: 0px 0px 35px #c1bfcea8; font-weight: bold;">Total Tugas</h2>
                </div>
                <div style="width: 100%; height: 326px;">
                    <canvas id="chart2" style="width: 100%; height: 100%;"></canvas>
                </div>
            </div>
            <div class="tbl" style="position: relative; top: -330px; height: 350px;">
                <table class="container" style="top: 0px;" onclick="location.href='../Tugas/';">
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
    <script>
        Chart.defaults.color = '#fff';
        var char1_canv = document.getElementById('chart1').getContext('2d');
        var char1 = new Chart(char1_canv, {
            type: 'bar',
            data: {
                labels: ['Rendah', 'Sedang', 'Tinggi'],
                datasets: [{
                    label: 'Selesai',
                    data: [
                        <?php chart('prioritas', 'Rendah', 'status', 'Selesai')?>,
                        <?php chart('prioritas', 'Sedang', 'status', 'Selesai')?>,
                        <?php chart('prioritas', 'Tinggi', 'status', 'Selesai')?>
                    ],
                    backgroundColor: [
                        'rgba(92, 248, 92, 0.09)'
                    ],
                    borderColor: [
                        'rgba(92, 248, 92,1)',
                    ],
                    borderWidth: 1
                },{
                    label: 'Belum Selesai',
                    data: [
                        <?php chart('prioritas', 'Rendah', 'status', 'Belum Selesai')?>,
                        <?php chart('prioritas', 'Sedang', 'status', 'Belum Selesai')?>,
                        <?php chart('prioritas', 'Tinggi', 'status', 'Belum Selesai')?>
                    ],
                    backgroundColor: [
                        'rgba(251, 102, 122, 0.09)'
                    ],
                    borderColor: [
                        '#FB667A'
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                        display: false
                        }
                    },
                    y: {
                        grid: {
                        color: 'rgba(255,255,255,0.09)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }

        });

        var char2_canv = document.getElementById('chart2').getContext('2d');
        var char2 = new Chart(char2_canv, {
            type: 'pie',
            data: {
                labels: ['Rendah', 'Sedang', 'Tinggi'],
                datasets: [{
                    label: 'Tugas',
                    data: [
                        <?php chart('prioritas', 'Rendah', '', '')?>,
                        <?php chart('prioritas', 'Sedang', '', '')?>,
                        <?php chart('prioritas', 'Tinggi', '', '')?>
                    ],
                    backgroundColor: [
                        'rgba(77, 210, 255, 0.09)',
                        'rgba(255, 166, 77, 0.09)',
                        'rgba(251, 102, 122, 0.09)'
                    ],
                    borderColor: [
                        '#4dd2ff',
                        '#ffa64d',
                        '#FB667A'
                    ],
                    borderWidth: 1,
                    hoverOffset: 15
                },{
                    label: 'Total Tugas',
                    data: [0,0,0,<?php chart('', '', '', '')?>],
                    backgroundColor: 'rgba(255, 255, 255, 0.09)',
                    borderWidth: 0
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>