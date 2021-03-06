<div id="page">
        <div class="header header-fixed header-logo-app">
            <a href="#" class="header-title">Data Pemilihan</a>
            <a href="#" class="header-icon header-icon-1" data-back-button><i class="fas fa-arrow-left"></i></a>
            <a href="" class="header-icon header-icon-3"><i class="fas fa-home"></i></a>
            <a href="#" class="header-icon header-icon-2" data-toggle-theme><i class="fas fa-moon"></i></a>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </div>

        <div class="page-content header-clear-sedang">
            <div class="content">


                <?php 
                if ($this->session->flashdata('id_pemilihan') == '') {
                    ?>  
                    <form action="" method="POST" enctype="multipart/form-data">

               <div>
                    <p class="bottom-0 top-15 text-center">Preview Foto</p>
                    <img v-if="url" class="preload-image horizontal-center" width="80" :src="foto"
                        :data-src="foto" alt="img"
                        style="border: dashed; border-width: thin; color: darkgrey; padding: 5px; margin-bottom: 12px;">
                </div>
                <div class="input-style input-light has-icon input-style-1">
                    <i class="input-icon fa fa-image"></i>
                    <label>Upload Foto</label>
                    <em>(terkunci)</em>
                    <input type="file" name="foto"  multiple accept='image/*' @change="onFileChange"required>
                </div>

                <div class="input-style input-style-1 input-required">
                    <span>Kategori Pemilihan</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select name="id_kategori" required>
                        <option value="default" disabled selected>Pilih Kategori Pemilihan</option>
                        <?php 
                        foreach ($this->db->get('kategori')->result() as $key => $value) {
                         ?>
                        <option value="<?php echo $value->id_kategori ?>"><?php echo $value->kategori ?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-poll"></i>
                    <span>Isi Nama Pemilihan</span>
                    <em>(wajib)</em>
                    <input type="name" name="nama_pemilihan" placeholder="Nama Pemilihan" required>
                </div>

                <div class="one-half">
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <i class="input-icon fa fa-user-cog"></i>
                        <span>Pilih Calon</span>
                        <input type="number" name="jumlah_pemilihan" placeholder="Jmlh Calon Dipilih" required>
                    </div>
                </div>
                <div class="one-half last-column">
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <i class="input-icon fa fa-phone"></i>
                        <span>HP Admin [WhatsApp]</span>
                        <input type="number" name="kontak_panitia" placeholder="Kontak Panitia" required>
                    </div>
                </div>
                <div class="clear"></div>

                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <i class="input-icon fa fa-building"></i>
                    <span>Nama Lembaga/Yayasan/Organisasi</span>
                    <em>(wajib)</em>
                    <input type="name" name="penyelenggara" placeholder="Penyelenggara" required>
                </div>

                <p class="bottom-0 top-15">Lokasi Penyelenggaraan</p>
                <div class="input-style has-icon input-style-1 input-required">
                    <span>Alamat Rinci Sampai Tingkat Desa</span>
                    <em>(wajib)</em>
                    <textarea placeholder="Alamat Pemilihan" name="lokasi" required></textarea>
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-map-marker"></i>
                    <span>Lokasi Kecamatan</span>
                    <em>(wajib)</em>
                    <input type="name" name="kecamatan" placeholder="Lokasi Kecamatan" required>
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-map-marker-alt"></i>
                    <span>Lokasi Kabupaten/Kota</span>
                    <em>(wajib)</em>
                    <input type="name" name="kelurahan" placeholder="Lokasi Kabupaten/Kota" required>
                </div>

                <p class="bottom-0 top-15">Waktu Pemilihan</p>
                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-play-circle"></i>
                    <span>Waktu Dimulai</span>
                    <em>(wajib)</em>
                    <input type="datetime-local" name="start_date" placeholder="Waktu Dimulai" required>
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-stop-circle"></i>
                    <span>Waktu Selesai</span>
                    <em>(wajib)</em>
                    <input type="datetime-local" name="end_date" placeholder="Waktu Selesai" required>
                </div>
                <!-- <div class="input-style input-style-1 input-required">
                    <span>Status Pemilihan</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select name="status">
                        <option value="default" disabled selected>Pilih Status Pemilihan</option>
                        <option value="1">Aktif</option>
                        <option value="2">Arsip</option>
                        <option value="3">Draft</option>
                    </select>
                </div> -->
                <input type="hidden" name="status" value="3">

                <div class="clear"></div>

                <div class="one-half top-20 bottom-10" style="text-align: center">
                    <button type="submit" class="button button-s shadow-small bg-green1-dark">Simpan</button>
                </div>
                </form>

                    <?php
                } else {

                    $data = $this->db->get_where('pemilihan', array('id_pemilihan'=>$this->session->flashdata('id_pemilihan')))->row();

                 ?>
                <form action="app/edit_pemilihan/<?php echo $this->session->flashdata('id_pemilihan') ?>" method="POST">

                <div>
                    <p class="bottom-0 top-15 text-center">Preview Foto</p>
                    <img class="preload-image horizontal-center" width="80" src="<?php echo base_url() ?>front/images/pemilihan/<?php echo $data->foto ?>"
                        data-src="<?php echo base_url() ?>front/images/pemilihan/<?php echo $data->foto ?>" alt="img"
                        style="border: dashed; border-width: thin; color: darkgrey; padding: 5px; margin-bottom: 12px;">
                </div>
                <div class="input-style input-light has-icon input-style-1">
                    <i class="input-icon fa fa-image"></i>
                    <label>Upload Foto</label>
                    <em>(terkunci)</em>
                    <input type="file" name="foto"  multiple accept='image/*' @change="onFileChange"required>
                </div>

                <div class="input-style input-style-1 input-required">
                    <span>Kategori Pemilihan</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select name="id_kategori" required>
                        <option value="<?php echo $data->id_kategori ?>" selected><?php echo get_data('kategori','id_kategori',$data->id_kategori,'kategori') ?></option>
                        <?php 
                        foreach ($this->db->get('kategori')->result() as $key => $value) {
                         ?>
                        <option value="<?php echo $value->id_kategori ?>"><?php echo $value->kategori ?></option>
                    <?php } ?>
                    </select>
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-poll"></i>
                    <span>Isi Nama Pemilihan</span>
                    <em>(wajib)</em>
                    <input type="name" name="nama_pemilihan" value="<?php echo $data->nama_pemilihan ?>" placeholder="Nama Pemilihan" required>
                </div>

                <div class="one-half">
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <i class="input-icon fa fa-user-cog"></i>
                        <span>Pilih Calon</span>
                        <input type="number" name="jumlah_pemilihan" placeholder="Jmlh Calon Dipilih" value="<?php echo $data->jumlah_pemilihan ?>" required>
                    </div>
                </div>
                <div class="one-half last-column">
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <i class="input-icon fa fa-phone"></i>
                        <span>HP Admin [WhatsApp]</span>
                        <input type="number" name="kontak_panitia" placeholder="Kontak Panitia" value="<?php echo $data->kontak_panitia ?>" required>
                    </div>
                </div>
                <div class="clear"></div>

                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <i class="input-icon fa fa-building"></i>
                    <span>Nama Lembaga/Yayasan/Organisasi</span>
                    <em>(wajib)</em>
                    <input type="name" name="penyelenggara" placeholder="Penyelenggara" value="<?php echo $data->penyelenggara ?>" required>
                </div>

                <p class="bottom-0 top-15">Lokasi Penyelenggaraan</p>
                <div class="input-style has-icon input-style-1 input-required">
                    <span>Alamat Rinci Sampai Tingkat Desa</span>
                    <em>(wajib)</em>
                    <textarea placeholder="Alamat Pemilihan" name="lokasi" required><?php echo $data->lokasi ?></textarea>
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-map-marker"></i>
                    <span>Lokasi Kecamatan</span>
                    <em>(wajib)</em>
                    <input type="name" name="kecamatan" placeholder="Lokasi Kecamatan" value="<?php echo $data->kecamatan ?>" required>
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-map-marker-alt"></i>
                    <span>Lokasi Kabupaten/Kota</span>
                    <em>(wajib)</em>
                    <input type="name" name="kelurahan" placeholder="Lokasi Kabupaten/Kota" value="<?php echo $data->kelurahan ?>" required>
                </div>

                <p class="bottom-0 top-15">Waktu Pemilihan</p>
                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-play-circle"></i>
                    <span>Waktu Dimulai</span>
                    <em>(wajib)</em>
                    <input type="datetime" name="start_date" placeholder="Waktu Dimulai" value="<?php echo $data->start_date ?>" required>
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-stop-circle"></i>
                    <span>Waktu Selesai</span>
                    <em>(wajib)</em>
                    <input type="datetime" name="end_date" placeholder="Waktu Selesai" value="<?php echo $data->end_date ?>" required>
                </div>
                <!-- <div class="input-style input-style-1 input-required">
                    <span>Status Pemilihan</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select name="status">
                        <option value="default" disabled selected>Pilih Status Pemilihan</option>
                        <option value="1">Aktif</option>
                        <option value="2">Arsip</option>
                        <option value="3">Draft</option>
                    </select>
                </div> -->
                <input type="hidden" name="status" value="3">

                <div class="clear"></div>

                <div class="one-half top-20 bottom-10" style="text-align: center">
                    <button type="submit" class="button button-s shadow-small bg-green1-dark">Simpan</button>
                </div>
                </form>


                <div class="one-half top-20 bottom-10" style="text-align: center; margin-right: 0;">
                    <a href="app/data_calon/<?php echo $this->session->flashdata('id_pemilihan'); ?>" class="button button-s shadow-small bg-blue1-dark">Data Calon <i
                            class="fa fa-arrow-right"></i></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="menu-hider"></div>


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