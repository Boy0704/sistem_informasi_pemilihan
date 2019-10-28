<?php 
$rw = $data->row();
 ?>
<div id="page">
        <div class="header header-fixed header-logo-app">
            <a href="#" class="header-title">Lihat Hasil Pemilihan</a>
            <a href="#" class="header-icon header-icon-1" data-back-button><i class="fas fa-arrow-left"></i></a>
            <a href="#" class="header-icon header-icon-2" data-toggle-theme><i class="fas fa-moon"></i></a>
        </div>

        <!-- Pendeteksi Internet -->
        <div id="menu-offline" class="menu menu-box-modal round-medium bg-gradasi">
            <div data-height="100%" class="caption">
                <div class="caption-center">
                    <h2 class="center-text color-theme bolder font-30">Internet Terputus</h2>
                    <p class="boxed-text-huge color-theme opacity-60 bottom-30 top-15">
                        Aplikasi ini membutuhkan koneksi internet. Periksa kembali data seluler atau wifi untuk
                        melanjutkan.
                    </p>
                </div>
            </div>
        </div>

        <div class="page-content header-clear-sedang">
            <div class="content">
                <div class="list-columns-left">
                    <div>
                        <img src="front/images/pictures/3t.jpg" alt="img">
                        <h1 class="b"><?php echo $rw->nama_pemilihan ?></h1>
                        <p>
                            <?php echo $rw->kelurahan ?>.
                        </p>
                    </div>
                </div>
            </div>

            <div class="divider divider-margins"></div>

            <div class="content">
                <p class="center-text under-heading font-15 color-theme bottom-5">Grafik Perolehan Suara</p>
                <div class="content bottom-0">
                    <canvas class="chart" id="vertical-chart" style="height: 300px;" /></canvas>
                </div>
            </div>

            <div class="profile-2">
                <div class="profile-stats">
                    <a href="#"></i>0<em class="color-blue1-dark">Calon</em></a>
                    <a href="#"></i>0<em class="color-blue1-dark">Pemilih</em></a>
                    <a href="#"></i>0<em class="color-green1-dark">Sudah Pilih</em></a>
                    <a href="#"></i>0<em class="color-red1-dark">Belum Pilih</em></a>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="divider divider-margins"></div>

            <div class="content">
                <p class="center-text under-heading font-15 color-theme bottom-5">Daftar Suara Terbanyak</p>
                <table class="table-borders">
                    <!-- <tr>
                        <th style="min-width: 30px;">#</th>
                        <th >No Calon</th>
                        <th class="tbl-kiri">Nama Calon</th>
                        <th>Suara</th>
                        <th>Persentase</th>
                    </tr> -->
                    
                </table>
            </div>
        </div>
    </div>
        <canvas class="chart disabled" id="pie-chart" /></canvas>
    <canvas class="chart disabled" id="doughnut-chart" /></canvas>
    <canvas class="chart disabled" id="polar-chart" /></canvas>
    <canvas class="chart disabled" id="bar-chart" /></canvas>