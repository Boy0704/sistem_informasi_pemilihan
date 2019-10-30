<div id="page">
        <div class="header header-fixed header-logo-app">
            <a href="app" class="header-title ultrabold"
                style="margin-left: 15px!important;font-size: 18px;"><span class="color-highlight">SIS</span>{{dg}}</a>
            <a href="#" class="header-icon header-icon-2" data-toggle-theme><i class="fas fa-moon"></i></a>
        </div>

        <?php $this->load->view('front/menu_panitia'); ?>

        <div class="page-content header-clear-medium">
            <div class="content">
                <link rel="stylesheet" type="text/css" href="front/styles/sisp.css">
                <!-- Profil -->
                <a href="app/profil-admin.html"><img class="preload-image horizontal-center" width="80" src="front/images/empty.png"
                    data-src="front/images/preload-logo.png" alt="img"></a>
                <h1 class="bolder font-15 center-text top-5"><?php echo $this->session->userdata('nama'); ?></h1>
                <p class="under-heading center-text color-highlight bottom-10">Leuwiliang - Kabupaten Bogor</p>
            </div>

            <div class="divider divider-margins bottom-15"></div>

            <div class="content top-15">
                <?php 
                foreach ($this->db->get('pemilihan')->result() as $row) {
                
                 ?>
                <div class="sisp-list-item bottom-10">
                    <a href="#" data-menu="menu-pemilihan-admin-aktif">
                        <img class="preload-image shadow-small round-small" src="front/images/empty.png"
                            data-src="front/images/pictures/5s.jpg" alt="img">
                        <strong>
                            <?php echo $row->nama_pemilihan ?>
                        </strong>
                    </a>
                    <span>
                        <a href="#" class="bg-aktif2">Aktif</a>
                        <i class="fas fa-map-marked-alt"></i><?php echo $row->kelurahan ?>
                    </span>
                </div>
                <?php } ?>

                <div class="clear"></div>
            </div><br><br><br>
        </div>

        <!-- Menu Pemilihan Admin AKTIF -->
        <div id="menu-pemilihan-admin-aktif" class="menu menu-box-modal" data-menu-height="320" data-menu-width="310"
            data-menu-effect="menu-over">
            <h5 class="center-text top-10">Pemilihan Ketua OSIS SMP Muhammadiyah Puraseda</h5>
            <div class="divider-small"></div>
            <div class="link-list link-list-1 content bottom-0">
                <a href="info-pemilihan.html" class="">
                    <i class="fas fa-info-circle fa-lg"></i>
                    <span class="font-13">
                        Informasi</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="data-pemilihan.html" class="">
                    <i class="fas fa-edit fa-lg" style="color:green"></i>
                    <span class="font-13">
                        Edit Data</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#" class="">
                    <i class="fas fa-file-pdf fa-lg" style="color:green"></i>
                    <span class="font-13">
                        Download PDF Kartu Akun</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="lihat-hasil.html" class="">
                    <i class="fas fa-poll fa-lg" style="color:green"></i>
                    <span class="font-13">
                        Lihat Hasil Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="status-pemilih.html" class="">
                    <i class="fas fa-user-check fa-lg" style="color:green"></i>
                    <span class="font-13">
                        Lihat Status Pemilih</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#" class="" data-menu="menu-reset-pemilihan">
                    <i class="fas fa-redo fa-lg" style="color:red"></i>
                    <span class="font-13">
                        Reset Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#" class="">
                    <i class="fas fa-lock fa-lg" style="color:black"></i>
                    <span class="font-13">
                        Tutup Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>

        <!-- Menu Pemilihan Admin DRAFT -->
        <div id="menu-pemilihan-admin-draft" class="menu menu-box-modal" data-menu-height=" 320" data-menu-width="310"
            data-menu-effect="menu-over">
            <h5 class="center-text top-10">Pemilihan Ketua OSIS SMP Muhammadiyah Puraseda</h5>
            <div class="divider-small"></div>
            <div class="link-list link-list-1 content bottom-0">
                <a href="info-pemilihan.html" class="">
                    <i class="fas fa-info-circle fa-lg"></i>
                    <span class="font-13">
                        Informasi</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="data-pemilihan.html" class="">
                    <i class="fas fa-edit fa-lg" style="color:gray"></i>
                    <span class="font-13">
                        Edit Data</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#" class="">
                    <i class="fas fa-file-pdf fa-lg" style="color:gray"></i>
                    <span class="font-13">
                        Download PDF Kartu Akun</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="lihat-hasil.html" class="">
                    <i class="fas fa-poll fa-lg" style="color:gray"></i>
                    <span class="font-13">
                        Lihat Hasil Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="status-pemilih.html" class="">
                    <i class="fas fa-user-check fa-lg" style="color:gray"></i>
                    <span class="font-13">
                        Lihat Status Pemilih</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="#" class="" data-menu="menu-reset-pemilihan">
                        <i class="fas fa-redo fa-lg" style="color:red"></i>
                        <span class="font-13">
                            Reset Pemilihan</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                <a href="#" class="">
                    <i class="fas fa-toggle-on fa-lg" style="color:green"></i>
                    <span class="font-13">
                        Aktifkan Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>

        <!-- Menu Pemilihan Admin ARSIP -->
        <div id="menu-pemilihan-admin-arsip" class="menu menu-box-modal" data-menu-height=" 320" data-menu-width="310"
            data-menu-effect="menu-over">
            <h5 class="center-text top-10">Pemilihan Ketua OSIS SMP Muhammadiyah Puraseda</h5>
            <div class="divider-small"></div>
            <div class="link-list link-list-1 content bottom-0">
                <a href="info-pemilihan.html" class="">
                    <i class="fas fa-info-circle fa-lg"></i>
                    <span class="font-13">
                        Informasi</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="lihat-hasil.html" class="">
                    <i class="fas fa-poll fa-lg" style="color:gray"></i>
                    <span class="font-13">
                        Lihat Hasil Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="status-pemilih.html" class="">
                    <i class="fas fa-user-check fa-lg" style="color:gray"></i>
                    <span class="font-13">
                        Lihat Status Pemilih</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>

        <!-- Konfirmasi Reset Pemilihan -->
        <div id="menu-reset-pemilihan" class="menu menu-box-bottom menu-nonactive" data-menu-height="200"
        data-menu-effect="menu-over" style="height: 200px; opacity: 1; display: block;">
        <h5 class="center-text uppercase ultrabold top-20">Apakah Kamu Yakin?</h5>
        <p class="boxed-text-large">
            Semua data pemilihan akan direset.
        </p>
        <div class="content left-50 right-50">
            <div class="one-half">
                <a href="#"
                    class="close-menu button button-center-large button-s shadow-large button-round-small bg-red2-dark">Ya</a>
            </div>
            <div class="one-half last-column">
                <a href="#"
                    class="close-menu button button-center-large button-s shadow-large button-round-small bg-green1-dark">Batal</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>

        <div class="menu-hider"></div>
    </div>

    <script type="text/javascript">
        var vm = new Vue({
        
            el: "#page",
            data: {
                'dg':'hALLO'
            }
        
        })
    </script>