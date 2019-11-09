
<?php 
$rw = $data->row();
 ?>

<div id="page">
        <div class="header header-fixed header-logo-app">
            <a href="#" class="header-title">Informasi Pemilihan</a>
            <a href="#" class="header-icon header-icon-1" data-back-button><i class="fas fa-arrow-left"></i></a>
            <!-- <a href="#" class="header-icon header-icon-2" data-menu="menu-1"><i class="fas fa-bars"></i></a>
            <a href="#" class="header-icon header-icon-3" data-menu="menu-2"><i class="fas fa-cog"></i></a> -->
            <a href="#" class="header-icon header-icon-2" data-toggle-theme><i class="fas fa-moon"></i></a>
        </div>

        <!-- Pendeteksi Internet -->
        <div id="menu-offline" class="menu menu-box-modal round-medium bg-gradasi">
            <div data-height="100%" class="caption" >
                <div class="caption-center">
                    <h2 class="center-text color-theme bolder font-30">Internet Terputus</h2>
                    <p class="boxed-text-huge color-theme opacity-60 bottom-30 top-15">
                        Aplikasi ini membutuhkan koneksi internet. Periksa kembali data seluler atau wifi untuk
                        melanjutkan.
                    </p>
                </div>
            </div>
        </div>

        <div class="page-content header-clear-kecil">

            <div class="profile-2">
                <img class="profile-image preload-image" data-src="front/images/pemilihan/<?php echo $rw->foto ?>" alt="img">
                <div class="profile-body">
                    <h1 class="judul-medium"><?php echo $rw->nama_pemilihan ?>.</h1>
                    <h2 class="profile-sub-heading"><a href="#" class="color-highlight"><?php echo $rw->kelurahan ?></a></h2>

                    <div class="divider divider-margins bottom-10"></div>
                    <div class="content-txt-tengah">
                        <a href="#" class="chip chip-small bg-gray1-dark">
                            <i class="fa fa-play bg-green1-dark"></i>
                            <span class="color-black"><?php echo $rw->start_date ?></span>
                        </a>
                        <a href="#" class="chip chip-small bg-gray1-dark">
                            <i class="fa fa-stop bg-red2-dark"></i>
                            <span class="color-black"><?php echo $rw->end_date ?> </span>
                        </a>
                    </div>
                    <div class="divider divider-margins bottom-10"></div>

                    <div class="profile-stats">
                        <a href="#"></i>0<em class="color-blue1-dark">Calon</em></a>
                        <a href="#"></i>0<em class="color-blue1-dark">Pemilih</em></a>
                        <a href="#"></i>0<em class="color-green1-dark">Sudah Pilih</em></a>
                        <a href="#"></i>0<em class="color-red1-dark">Belum Pilih</em></a>
                        <div class="clear"></div>
                    </div>

                    <div class="divider divider-margins bottom-15"></div>

                    <div class="content">
                        <h5 class="center-text"><i class="fa fa-user color-green1-dark right-10"></i>Daftar Calon</h5>
                        <div class="divider divider-margins bottom-15"></div>
                        <div class="gallery gallery-thumbs gallery-square">
                            <?php 
                            foreach ($this->db->get_where('calon',array('id_pemilihan'=>$id_pemilihan))->result() as $key => $rw) {
                             ?>
                            <a class="show-gallery polaroid-effect" href="#" title="Vynil and Typerwritter">
                                <img src="front/images/calon/<?php echo $rw->foto ?>"
                                    class="contain" alt="img">
                                <div class="nama-calon-kcl">
                                    <span class="color-theme"><?php echo $rw->nama_calon ?></span></div>
                                <span class="nomer"><?php echo $rw->no_calon ?></span>
                            </a>
                            <?php } ?>
                        </div>
                    </div>

                    <h5 class="center-text"><i class="fa fa-user color-green1-dark right-10"></i>Daftar Pemilih</h5>
                    <div class="divider divider-margins top-15"></div>
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
                                <th class="tbl-kiri">Nama Pemilih</th>
                                <th class="tbl-kiri">Kel</th>
                                <th>Status</th>
                            </tr>
                            <?php 
                            $no = 1;
                            foreach ($this->db->get_where('pemilih',array('id_pemilihan'=>$id_pemilihan))->result() as $key => $rw) {
                             ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td class="tbl-kiri"><?php echo $rw->nama_pemilih ?></td>
                                <td class="tbl-kiri"><?php echo $rw->kel ?></td>
                                <td><?php 
                                echo status_pemilih($rw->id_pemilih,$rw->id_pemilihan);
                                 ?></td>
                            </tr>
                            <?php $no++; } ?>
                        </table>
                        <!-- <div class="pagination">
                            <a href="#"><i class="fa fa-angle-left"></i></a>
                            <a href="#" class="bg-highlight color-white">1</a>
                            <a href="#" class="no-border">2</a>
                            <a href="#" class="no-border">3</a>
                            <a href="#" class="no-border">4</a>
                            <a href="#" class="no-border">5</a>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-hider"></div>
    </div>