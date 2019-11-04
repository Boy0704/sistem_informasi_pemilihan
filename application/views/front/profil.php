<?php $data = $dt->row(); ?>
<div id="page">
        <div class="header header-fixed header-logo-app header-transparent">
            <a href="" class="header-title color-white">Edit Profil</a>
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

        <div class="page-content-black"></div>
        <div class="page-content">
            <div class="cover-wrapper cover-no-buttons">
                <div data-height="cover" class="caption bottom-0">
                    <div class="caption-center">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="left-50 right-50 top-50">
                            <div>
                                    <p class="bottom-0 top-15 text-center">Preview Foto</p>
                                <img v-if="url" class="preload-image horizontal-center" width="80" :src="foto" :data-src="foto" alt="img"
                                    style="border: dashed; border-width: thin; color: darkgrey; padding: 5px; margin-bottom: 12px;">
                            </div>
                            <div class="input-style input-light has-icon input-style-1">
                                <i class="input-icon fa fa-image"></i>
                                <span>Upload Foto</span>
                                <em>(terkunci)</em>
                                <input type="file" name="foto"  multiple accept='image/*' @change="onFileChange">
                            </div>
                            <div class="input-style input-light has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-at"></i>
                                <span>Email</span>
                                <em>(terkunci)</em>
                                <input type="email" name="email" value="<?php echo $data->email ?>" placeholder="Email" disabled>
                            </div>
                            <div class="input-style input-light has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-user font-11"></i>
                                <span>Nama Lengkap</span>
                                <em>(wajib terisi)</em>
                                <input type="name" name="nama" value="<?php echo $data->nama ?>" placeholder="Nama Lengkap">
                            </div>
                            <div class="input-style input-light has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-phone font-11"></i>
                                <span>Nomor HP (WhatsApp)</span>
                                <em>(wajib terisi)</em>
                                <input type="number" name="no_telp" value="<?php echo $data->no_telp ?>" placeholder="Nomor Handphone">
                            </div>
                            <p class="bottom-0 top-15">Isi jika Kata Sandi diubah</p>
                            <div class="input-style input-light has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-lock font-11"></i>
                                <span>Kata Sandi baru</span>
                                <em>(wajib terisi)</em>
                                <input type="password" name="password" placeholder="Kata Sandi">
                            </div>
                            <button type="submit" 
                                class="button button-full button-m shadow-large button-round-small bg-highlight top-30 bottom-0">SIMPAN</button>
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
        foto : 'front/images/user/<?php echo $data->foto ?>',
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
    <?php 
    if ($data->foto == null) {
        ?>
        vm.url = false;
        <?php
    } else {
        ?>
        vm.url = true;
        <?php
    }
     ?>
</script>
