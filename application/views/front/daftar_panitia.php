<div id="page">
        <div class="header header-fixed header-logo-app header-dark">
            <a href="" class="header-title color-white">Daftar Akun Panitia</a>
            <a href="#" class="header-icon header-icon-1 color-white" data-back-button><i
                    class="fas fa-arrow-left"></i></a>
            <a href="#" class="header-icon header-icon-2 color-white" data-toggle-theme><i class="fas fa-info"></i></a>
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

        <div class="page-content-black top-30"></div>
        <div class="page-content">
            <div class="cover-wrapper cover-no-buttons">
                <div data-height="cover" class="caption bottom-0">
                    <div class="caption-center">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="left-50 right-50 top-50">
                            <div>
                                <p class="bottom-0 top-15 text-center">Tambah Foto</p>
                                <img v-if="url" class="preload-image horizontal-center" width="80" :src="foto"
                                    :data-src="foto" alt="img"
                                    style="border: dashed; border-width: thin; color: darkgrey; padding: 5px; margin-bottom: 12px;">
                            </div>
                            <div class="input-style input-light has-icon input-style-1">
                                <i class="input-icon fa fa-image"></i>
                                <span>Upload Foto</span>
                                <em>(terkunci)</em>
                                <input type="file" name="foto"  multiple accept='image/*' @change="onFileChange"required>
                            </div>
                            <div class="input-style input-light has-icon input-style-1 input-required" style="margin-bottom: 0px!important;">
                                <i class="input-icon fa fa-at"></i>
                                <span>Email</span>
                                <em>(wajib terisi)</em>
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="input-style input-light has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-user font-11"></i>
                                <span>Nama Lengkap</span>
                                <em>(wajib terisi)</em>
                                <input type="name" name="nama" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="input-style input-light has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-user font-11"></i>
                                <span>Nomor HP (WhatsApp)</span>
                                <em>(wajib terisi)</em>
                                <input type="number" name="no_telp" placeholder="Nomor Handphone" required>
                            </div>
                            <div class="input-style input-light has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-lock font-11"></i>
                                <span>Kata Sandi</span>
                                <em>(wajib terisi)</em>
                                <input type="password" name="password1" placeholder="Kata Sandi" required>
                            </div>
                            <div class="input-style input-light has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-lock font-11"></i>
                                <span>Ketik ulang kata sandi</span>
                                <em>(wajib terisi)</em>
                                <input type="password" name="password2" placeholder="Konfirmasi Kata Sandi" required>
                            </div>
                            <a href="app/login" class="color-white opacity-50 text-center font-11 top-10">Sudah
                                punya Akun? Masuk disini</a>
                            <!-- <button type="submit" 
                                class="back-button button button-full button-m shadow-large button-round-small bg-highlight top-20 bottom-0">BUAT
                                AKUN</button> -->
                                <button type="submit" class="button button-full button-m shadow-large button-round-small bg-highlight top-20 bottom-0">SIMPAN</button>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="caption-overlay bg-black opacity-90"></div>
                <div class="caption-bg" style="background-image:url(front/images/pictures/29t.jpg)"></div>
            </div>
        </div>

        <div class="menu-hider"></div>
    </div>

<script type="text/javascript">
    var vm = new Vue({
    el: "#page",
    data : {
        judul : '',
        kab : '',
        link1 : '',
        link2 : '',
        url : false,
        foto : null,
    },
    computed:{
        
    }, 
    methods:{
        infoModal: function(id_p,judul,kab) {
            this.judul = judul
            this.kab = kab
            this.link1 = 'app/info_pemilihan/'+id_p
            this.link2 = 'app/lakukan_pemilihan/'+id_p
            this.link3 = 'app/lihat_hasil/'+id_p
            this.link4 = 'app/lihat_status_pemilih/'+id_p
        },
        onFileChange(e)
            {
                const file = e.target.files[0];
                this.foto = URL.createObjectURL(file);
                this.url = true;
            }
    }
    

})
</script>