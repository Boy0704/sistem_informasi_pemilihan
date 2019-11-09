<div id="page">
        <div class="header header-fixed header-logo-app">
            <a href="#" class="header-title">Draft Pemilihan</a>
            <a href="#" class="header-icon header-icon-1" data-back-button><i class="fas fa-arrow-left"></i></a>
            <a href="#" class="header-icon header-icon-3" data-menu="cari-pemilihan-draft"><i class="fas fa-search"></i></a>
            <a href="" class="header-icon header-icon-4"><i class="fas fa-home"></i></a>
            <a href="#" class="header-icon header-icon-2" data-toggle-theme><i class="fas fa-moon"></i></a>
        </div>

        <div class="page-content header-clear-sedang">
            <div class="content">
                <link rel="stylesheet" type="text/css" href="front/styles/sisp.css">
                <h5 class="bold top-10 bottom-10 center-text">
                    <i class="fa fa-pencil-ruler color-brown1-dark fa-4x"></i></h5>
                <p class="under-heading center-text color-theme bottom-5 top-10"
                    style="line-height: 20px;padding: 0px 15px;">
                    Pemilihan yang masih draft hanya bisa dilakukan simulasi oleh maksimal 15 akun pemilih.</p>
            </div>

            <div class="divider divider-margins bottom-15"></div>

            <div class="content top-15">
                <?php 
                if ($this->db->get_where('pemilihan', array('status'=>3))->num_rows() == NULL ) {
                    echo '<a href="#" class="button button-full button-m shadow-large button-round-small bg-highlight top-30 bottom-0">Belum Ada Draft Pemilihan</a>';
                } else {
                foreach ($this->db->get_where('pemilihan', array('status'=>3))->result() as $key => $rw) {
                 
                 ?>
                <div class="sisp-list-item bottom-10">
                    <a href="#" @click="infoModal('<?php echo $rw->id_pemilihan ?>','<?php echo $rw->nama_pemilihan ?>','<?php echo $rw->kelurahan ?>')" data-menu="menu-pemilihan-draft">
                        <img class="preload-image shadow-small round-small" src="front/images/empty.png"
                            data-src="<?php echo $foto = ($rw->foto == null) ? '' : 'front/images/pemilihan/'.$rw->foto ?> " alt="img">
                        <strong>
                            <?php echo $rw->nama_pemilihan ?>
                        </strong>
                    </a>
                    <span>
                        <a href="#" class="bg-draft">Draft</a>
                        <i class="fas fa-map-marked-alt"></i><?php echo $rw->kelurahan ?>
                    </span>
                </div>
                
            <?php } } ?>
                <div class="clear"></div>
            </div>
        </div>

        <!-- Menu Klik Daft Pemilihan REV -->
        <div id="menu-pemilihan-draft" class="menu menu-box-modal" data-menu-height="320" data-menu-width="310"
            data-menu-effect="menu-over">
            <h4 class="center-text top-30">{{judul}}</h4>
            <div class="divider-small"></div>
            <h6 class="center-text">{{kab}}</h6>
            <div class="link-list link-list-1 content bottom-0">
                <a :href="link1" class="">
                    <i class="fas fa-info-circle fa-lg"></i>
                    <span class="font-13">Informasi</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a :href="link2" class="">
                    <i class="fas fa-edit fa-lg" style="color:green"></i>
                    <span class="font-13">Lakukan Simulasi Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a :href="link3" class="">
                    <i class="fas fa-poll fa-lg" style="color:gray"></i>
                    <span class="font-13">Lihat Hasil Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a :href="link4" class="">
                    <i class="fas fa-user-check fa-lg" style="color:gray"></i>
                    <span class="font-13">Lihat Status Pemilih</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a :href="link5" class="">
                    <i class="fas fa-comment-dots fa-lg" style="color:gray"></i>
                    <span class="font-13">Kontak Panitia</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>

        <!-- Cari Pemilihan Draft -->
        <div id="cari-pemilihan-draft" class="menu menu-box-bottom" data-menu-height="230" data-menu-effect="menu-over">
            <div class="content">
                <p class="font-11 under-heading bottom-20 top-20">
                    Ketikan keyword untuk mencari.
                </p>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <i class="input-icon fa fa-search"></i>
                    <span>Masukan keyword pencarian</span>
                    <em>(wajib)</em>
                    <input type="text" placeholder="Ketik disini">
                </div>
                <a href="#" class="button button-full button-m shadow-large button-round-small bg-highlight top-20">CARI
                    Draft Pemilihan</a>
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
        link3 : '',
        link4 : '',
        link5 : '',
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
            this.link5 = 'app/kontak_panitia/'+id_p
        }
    }
})
</script>