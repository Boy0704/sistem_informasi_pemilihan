<?php $dt = $data->row(); ?>
<div id="page">
        <div class="header header-fixed header-logo-app">
            <a href="#" class="header-title">Status Pemilih</a>
            <a href="#" class="header-icon header-icon-1" data-back-button><i class="fas fa-arrow-left"></i></a>
            <!-- <a href="#" class="header-icon header-icon-2" data-menu="menu-1"><i class="fas fa-bars"></i></a>
            <a href="#" class="header-icon header-icon-3" data-menu="menu-2"><i class="fas fa-cog"></i></a> -->
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
                        <h1 class="b"><?php echo $dt->nama_pemilihan ?></h1>
                        <p><?php echo $dt->kelurahan ?></p>
                    </div>
                </div>
            </div>

            <div class="profile-2">
                <div class="divider divider-margins top-5"></div>
                <div class="profile-sub-heading">
                    <div class="fac fac-radio fac-default"><span></span>
                        <input id="box1-fac-radio" type="radio" name="rad" value="1">
                        <label for="box1-fac-radio">Semua Status</label>
                    </div>
                    <div class="fac fac-radio fac-green"><span></span>
                        <input id="box2-fac-radio" type="radio" name="rad" value="1">
                        <label for="box2-fac-radio">Sudah Pilih</label>
                    </div>
                    <div class="fac fac-radio fac-red"><span></span>
                        <input id="box3-fac-radio" type="radio" name="rad" value="1">
                        <label for="box3-fac-radio">Belum Pilih</label>
                    </div>
                </div>
                <div class="divider divider-margins top-15"></div>

                <div class="content">
                    <table class="table-borders">
                        <tr>
                            <th>No</th>
                            <th class="tbl-kiri">Nama Lengkap</th>
                            <th class="tbl-kiri">Kategori</th>
                            <th>Status</th>
                        </tr>
                        <?php 
                            foreach ($this->db->get('pemilih')->result() as $key => $rw) {
                             ?>
                        <tr>
                            <td>1</td>
                            <td class="tbl-kiri"><?php echo $rw->nama_pemilih ?></td>
                            <td class="tbl-kiri"><?php echo $rw->kel ?></td>
                            <td><i class="fa fa-check-square color-green1-dark"></i> Belum</td>
                        </tr>
                        <?php } ?>
                    </table>
                    <div class="pagination">
                        <a href="#"><i class="fa fa-angle-left"></i></a>
                        <a href="#" class="bg-highlight color-white">1</a>
                        <a href="#" class="no-border">2</a>
                        <a href="#" class="no-border">3</a>
                        <a href="#" class="no-border">4</a>
                        <a href="#" class="no-border">5</a>
                        <a href="#"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>