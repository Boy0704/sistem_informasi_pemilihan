
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
            <div class="alert alert-small alert-round-medium bg-green1-dark">
                <i class="fa fa-check"></i>
                <span>Selamat Datang Kembali <?php echo $this->session->userdata('username'); ?></span>
                <i class="fa fa-times"></i>
            </div> 
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
                    <?php 
                    $cek = $this->db->get_where('detail_pilih', array('id_pemilih'=>$this->session->userdata('id_user'),'id_calon'=>$value->id_calon));
                    if ($cek->num_rows() > 0) {
                        echo '<button class="button button-xxs shadow-small button-round-small bg-green2-dark">ANDA TELAH MEMILIH</button>';
                    } else {
                     ?>
                    <div class="center-text">
                        <button id="id_status<?php echo $value->id_calon ?>" class="button button-xxs shadow-small button-round-small bg-green2-dark" style="display: none;">ANDA TELAH MEMILIH</button>
                        <a href="#" @click="infoModal('<?php echo $value->foto ?>','<?php echo $value->nama_calon ?>','<?php echo $value->visi ?>','<?php echo $value->misi ?>','<?php echo $value->program_lain ?>')" id="id_profil<?php echo $value->id_calon ?>" class="button button-xxs shadow-small button-round-small bg-blue2-dark"
                            data-menu="profil-calon">Profil</a>
                        <a href="#" @click="pilih_calon('<?php echo $value->id_calon ?>','<?php echo $this->session->userdata('id_user') ?>','<?php echo $value->id_pemilihan ?>')" id="id<?php echo $value->id_calon ?>" class="button button-xxs shadow-small button-round-small bg-green2-dark">Pilih</a>
                    </div>
                    <?php } ?>
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
                        <td v-if="hideSelesai" rowspan="2" @click="selesai_pilih()" style="padding:0px;"><a class="button tombol-selesai bg-green2-dark">SELESAI</a></td>
                    </tr>
                    <tr>
                        <th class="data-pilih ">{{harus_pilih}}</th>
                        <th class="data-pilih">{{telah_pilih}}</th>
                        <th class="data-pilih">{{pilih_lagi}}</th>
                    </tr>
                </table>
            </div>
        </div>
        <br>

        <!-- Profil Calon -->
        <div id="profil-calon" class="menu menu-box-modal round-medium" data-menu-height="340" data-menu-width="320"
            data-menu-effect="menu-over">
            <div class="boxed-text-huge">
                <img class="preload-image horizontal-center top-10" width="80" :src="foto"
                    :data-src="foto" alt="img">
                <h6 class="center-text uppercase ultrabold top-10 bottom-10">{{nama_calon}}</h6>
                <div class="divider bottom-5"></div>
                <p class="text-left ultrabold bottom-5">Visi:</p>
                <p style="line-height:15px;margin-bottom: 12px; text-align: justify;">
                    {{visi}}
                </p>
                <p class="text-left ultrabold bottom-5">Visi:</p>
                <p style="line-height:15px;margin-bottom: 12px; text-align: justify;">
                    {{misi}}
                </p>
                <p class="text-left ultrabold bottom-5">Program:</p>
                <p style="line-height:15px;margin-bottom: 12px; text-align: justify;">
                    {{program}}
                </p>
                <div class="divider bottom-15"></div>
            </div>
        </div>
        <div class="menu-hider"></div>

    </div>

<script type="text/javascript">
    var vm = new Vue({
    el: "#page",
    data : {
        foto : 'front/images/empty.png',
        nama_calon : '',
        visi : '',
        misi : '',
        program : '',
        harus_pilih : 3,
        telah_pilih : 0,
        pilih_lagi : 3,
        hideSelesai: false,
        status_pilih: false,

        BaseUrl: '<?php echo base_url() ?>'
    },
    computed:{
        
    }, 
    methods:{
        infoModal: function(foto,nama_calon,visi,misi,program) {
            this.foto = 'front/images/calon/'+foto
            this.nama_calon = nama_calon
            this.visi = visi
            this.misi = misi
            this.program = program
        },
        pilih_calon: function(id_calon,id_pemilih,id_pemilihan) {
            if (this.telah_pilih != this.harus_pilih) {
                
                // axios.post(this.BaseUrl+'/app/simpan_pilih_calon', {
                //     id_calon: id_calon,
                //     id_pemilih: id_pemilih
                // })
                axios
                  .get('<?php echo base_url() ?>app/simpan_pilih_calon/'+id_calon+'/'+id_pemilih+'/'+id_pemilihan)
                .then(res => {
                     console.log(res)
                })
                .catch(error => {
                     console.log(error)
                })

                this.telah_pilih += 1
                this.pilih_lagi = this.harus_pilih - this.telah_pilih
                document.getElementById('id'+id_calon).style.display = 'none';
                document.getElementById('id_profil'+id_calon).style.display = 'none';
                document.getElementById('id_status'+id_calon).style.display = 'block';
                
                swal('Pilihan anda berhasil disimpan', 'klik Ok!', );
            } else {
                this.hideSelesai = true;
                swal('Kuota Anda untuk memilih telah habis\n silahkan klik tombol selesai', 'klik Ok!', );
            }
                
        },
        selesai_pilih: function() {
            swal('terimah kasih telah melakukan pemilihan', 'klik Ok!', )
            window.location="<?php echo base_url() ?>app/logout"
        }
        
    }
})
</script>


        