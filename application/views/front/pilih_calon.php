
<div id="page">
        <div class="header header-fixed header-logo-app">
            <a href="#" class="header-title">Pilih Calon Sesuai Kuota</a>
            <a href="#" class="header-icon header-icon-1" data-back-button><i class="fas fa-arrow-left"></i></a>
            <a href="#" class="header-icon header-icon-2" data-toggle-theme><i class="fas fa-moon"></i></a>
        </div>
        <div class="toasts">
            <div class="toast toast-top" id="toast-tombol-selesai">
                <p class="color-white"><i class='fa fa-sync fa-spin right-10'></i> Pilih sesuai kuota.. </p>
                <div class="toast-bg opacity-90 bg-red2-dark"></div>
            </div>
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

        <div class="page-content header-clear-large">
            <div class="content bottom-0">

                <?php 
                foreach ($this->db->get_where('calon', array('id_pemilihan'=>$id_pemilihan))->result() as $key => $value) {

                 ?>


                <div class="one-half">
                    <a href="#">
                        <img data-src="front/images/pictures/29t.jpg" src="front/images/empty.png" alt="img"
                            class="preload-image responsive-image round-small shadow-large bottom-20">
                    </a>
                    <div class="nama-calon-sdg color-theme"><?php echo $value->nama_calon ?></div>
                    <span class="nomer-besar"><?php echo $value->no_calon ?></span>
                    <div class="center-text">
                        <a href="#" class="button button-xxs shadow-small button-round-small bg-blue2-dark"
                            data-menu="profil-calon">Profil</a>
                        <a href="#" onclick="swal('Pilihan anda berhasil disimpan', 'klik Ok!', )" class="button button-xxs shadow-small button-round-small bg-green2-dark">Pilih</a>
                    </div>
                    <div class="divider bottom-30"></div>
                </div>
                <?php } ?>

                <div class="clear"></div>
            </div>

            <div class="divider divider-margins"></div>

        </div>
        <div class="content">
            <div class="ad-300x50-fixed bg-highlight">
                <table class="table-borders">
                    <tr>
                        <td class="wd-70" style="line-height: 25px; padding: 0px; font-size: 11px; color: cadetblue;">
                            Harus Pilih</td>
                        <td class="wd-70" style="line-height: 25px; padding: 0px; font-size: 11px; color: darkgreen;">
                            Telah Dipilih</td>
                        <td class="wd-70" style="line-height: 25px; padding: 0px; font-size: 11px;color: darkorange;">
                            Pilih Lagi</td>
                        <td rowspan="2" style="padding:0px;"><a class="button tombol-selesai"
                                data-toast-manual-id="toast-tombol-selesai">SELESAI</a></td>
                    </tr>
                    <tr>
                        <th class="data-pilih ">10</th>
                        <th class="data-pilih">7</th>
                        <th class="data-pilih">3</th>
                    </tr>
                </table>
            </div>
        </div>
        <br>

        <!-- Profil Calon -->
        <div id="profil-calon" class="menu menu-box-modal round-medium" data-menu-height="340" data-menu-width="320"
            data-menu-effect="menu-over">
            <div class="boxed-text-huge">
                <img class="preload-image horizontal-center top-10" width="80" src="images/empty.png"
                    data-src="images/preload-logo.png" alt="img">
                <h6 class="center-text uppercase ultrabold top-10 bottom-10">Muhammad Ismail Yusanto</h6>
                <div class="divider bottom-5"></div>
                <p class="text-left ultrabold bottom-5">Visi:</p>
                <p style="line-height:15px;margin-bottom: 12px; text-align: justify;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book.
                </p>
                <p class="text-left ultrabold bottom-5">Visi:</p>
                <p style="line-height:15px;margin-bottom: 12px; text-align: justify;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book.
                </p>
                <p class="text-left ultrabold bottom-5">Program:</p>
                <p style="line-height:15px;margin-bottom: 12px; text-align: justify;">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book.
                </p>
                <div class="divider bottom-15"></div>
            </div>
        </div>
        <div class="menu-hider"></div>




        <script type="text/javascript" src="scripts/jquery.js"></script>
        <script type="text/javascript" src="scripts/plugins.js" async></script>
        <script type="text/javascript" src="scripts/custom.js" async></script>