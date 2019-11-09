<div id="page">
            <div class="header header-fixed header-logo-app">
                <a href="#" class="header-title">Data Calon</a>
                <a href="app" class="header-icon header-icon-1" data-back-button><i class="fa fa-arrow-left"></i></a>
                <a href="app/panitia" class="header-icon header-icon-3"><i class="fas fa-home"></i></a>
                <a href="#" class="header-icon header-icon-2" data-toggle-theme><i class="fas fa-moon"></i></a>
            </div>

            <div class="page-content header-clear">
                <link rel="stylesheet" type="text/css" href="front/styles/sisp.css">
                <div class="content top-20">
                    <?php 
                    foreach ($this->db->get_where('calon', array('id_pemilihan'=>$id))->result() as $row) {
                     ?>
                    <div class="sisp-list-item">
                        <a href="#">
                            <img class="preload-image shadow-large round-small crop" src="front/images/calon/<?php echo $row->foto ?>"
                                data-src="front/images/calon/<?php echo $row->foto ?>" alt="img" style="width: 80px; height: 80px;">
                            <strong style="font-weight: 300">Nomor Calon: <?php echo $row->no_calon ?></strong>
                        </a>
                        <a href="#">
                            <strong2 class="color-theme"><?php echo $row->nama_calon ?></strong2>
                        </a>
                        <a href="#" @click="hapus_calon('<?php echo $row->id_calon ?>','<?php echo $row->id_pemilihan ?>')" class="button button-xxs shadow-small button-round-small bg-red2-dark" style="float: right;
                        padding: 0px 5px;margin-top: 5px;margin-left: 4px" data-menu="menu-hapus-calon"><i
                                class="fa fa-trash-alt color-white-dark"></i></a>
                        <a href="#" @click="edit_calon(<?php echo $row->id_calon ?>)" class="button button-xxs shadow-small button-round-small bg-blue1-dark" style="float: right;
                        padding: 0px 5px;margin-top: 5px;" data-menu="menu-data-calon">Edit Data</a>
                    </div>
                    <?php } ?>

                    <!-- Tombol Simpan -->
                    <div class="one-half top-20 bottom-10" style="text-align: center">
                        <a href="#" @click="clear()" class="button button-s shadow-small bg-green1-dark" data-menu="menu-data-calon">+
                            Tambah</a>
                    </div>

                    <div class="one-half top-20 bottom-10" style="text-align: center; margin-right: 0;">
                        <a href="app/data_pemilih/<?php echo $this->uri->segment(3) ?>" class="button button-s shadow-small bg-blue1-dark">Data Pemilih <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Menu Tambah / Edit Calon -->
            <div id="menu-data-calon" class="menu menu-box-bottom" data-menu-height="390" data-menu-effect="menu-over">
                <div class="content">
                    <h3 class="uppercase ultrabold top-20">{{type_input}} Data Calon</h3>
                    <p class="font-11 under-heading bottom-20">
                        Isi data calon sesuai urutan.
                    </p>
                    <div v-if="type_input === 'tambah'">
                        <img v-if="url" class="preload-image horizontal-center" width="80" :src="foto"
                            :data-src="foto" alt="img"
                            style="border: dashed; border-width: thin; color: darkgrey; padding: 5px;">
                    </div>
                    <div v-else-if="type_input === 'edit'">
                        <img class="preload-image horizontal-center" width="80" :src="foto_calon(data_calon.foto)"
                            :data-src="foto_calon(data_calon.foto)" alt="img"
                            style="border: dashed; border-width: thin; color: darkgrey; padding: 5px;">
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                    <div v-if="type_input === 'tambah'">
                      <input type="hidden" name="type_input" value="tambah">
                    </div>
                    <div v-else-if="type_input === 'edit'">
                      <input type="hidden" name="type_input" value="edit">
                      <input type="hidden" name="old_foto" :value="data_calon.foto">
                      <input type="hidden" name="id_calon" :value="data_calon.id_calon">
                    </div>
                    <div class="input-style has-icon input-style-1 input-required">
                        <i class="input-icon fa fa-sort-numeric-down font-11"></i>
                        <span>Upload Foto</span>
                        <em>(wajib)</em>
                        <input type="file" name="foto" placeholder="Nomor Calon" multiple accept='image/*' @change="onFileChange" required>
                    </div>
                    <div class="input-style has-icon input-style-1 input-required">
                        <i class="input-icon fa fa-sort-numeric-down font-11"></i>
                        <span>Nomor Calon (co: 01 atau 001, AB, dll)</span>
                        <em>(wajib)</em>
                        <input type="text" name="no_calon" placeholder="Nomor Calon" :value="data_calon.no_calon" required>
                    </div>
                    <div class="input-style has-icon input-style-1 input-required">
                        <i class="input-icon fa fa-id-card font-11"></i>
                        <span>Nama Lengkap Calon</span>
                        <em>(wajib)</em>
                        <input type="name" name="nama_calon" placeholder="Nama Calon" :value="data_calon.nama_calon" required>
                    </div>
                    <div class="input-style input-style-1 input-required">
                        <span class="input-style-1-inactive">Visi</span>
                        <em>(required)</em>
                        <textarea placeholder="Visi" name="visi" required>{{data_calon.visi}}</textarea>
                    </div>
                    <div class="input-style input-style-1 input-required">
                        <span class="input-style-1-inactive">Misi</span>
                        <em>(required)</em>
                        <textarea placeholder="Misi" name="misi" required>{{data_calon.misi}}</textarea>
                    </div>
                    <div class="input-style input-style-1 input-required">
                        <span class="input-style-1-inactive">Program Lainnya</span>
                        <em>(required)</em>
                        <textarea placeholder="Program Lainnya" name="program_lain" required>{{data_calon.program_lain}}</textarea>
                        <input type="hidden" name="id_pemilihan" value="<?php echo $this->uri->segment(3) ?>" required>
                    </div>
                    <div class="clear"></div>
                    <button type="submit" 
                        class="button button-full button-s shadow-large button-round-small bg-blue2-dark top-10">Simpan</button>
                    </form>
                </div>
            </div>

            <!-- Menu Hapus Calon -->
            <div id="menu-hapus-calon" class="menu menu-box-bottom menu-nonactive" data-menu-height="200"
                data-menu-effect="menu-over" style="height: 200px; opacity: 1; display: block;">
                <h5 class="center-text uppercase ultrabold top-20">Apakah Kamu Yakin?</h5>
                <p class="boxed-text-large">
                    Akan menghapus data calon ini.
                </p>
                <div class="content left-50 right-50">
                    <div class="one-half">
                        <a :href="hapus"
                            class="button button-center-large button-s shadow-large button-round-small bg-red2-dark">Ya</a>
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
    data : {
        type_input : '',
        hapus : '#',
        data_calon: [],
        foto: null,
        url: false
    },
    computed:{
        
    }, 
    watch: {
        
    },
    methods:{
        edit_calon: function(id_calon) {
            axios
              .get('<?php echo base_url() ?>app/get_calon/'+id_calon)
              .then(response => (
                this.data_calon = response.data.calon
                ))
            this.type_input = 'edit'
        },
        foto_calon: function(foto) {
            return 'front/images/calon/'+foto
        },
        hapus_calon: function(id_calon,id_pemilihan) {
            this.hapus = 'app/hapus_calon/'+id_calon+'/'+id_pemilihan
        },
        onFileChange(e)
        {
            const file = e.target.files[0];
            this.foto = URL.createObjectURL(file);
            this.url = true;
        },
        clear: function() {
            this.type_input='tambah'
            this.data_calon= []
        }
    }
})
</script>