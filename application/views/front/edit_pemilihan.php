<?php 
$dt = $data->row();
 ?>
<div id="page">
        <div class="header header-fixed header-logo-app">
            <a href="#" class="header-title">Data Pemilihan</a>
            <a href="#" class="header-icon header-icon-1" data-back-button><i class="fas fa-arrow-left"></i></a>
            <a href="admin.html" class="header-icon header-icon-3"><i class="fas fa-home"></i></a>
            <a href="#" class="header-icon header-icon-2" data-toggle-theme><i class="fas fa-moon"></i></a>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </div>

        <div class="page-content header-clear-sedang">
            <div class="content">
                <form action="" method="POST">
                <div class="input-style input-style-1 input-required">
                    <span>Kategori Pemilihan</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select name="id_kategori">
                        <option value="<?php echo $dt->id_kategori ?>" selected><?php echo $dt->id_kategori ?></option>
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
                    <input type="name" name="nama_pemilihan" placeholder="Nama Pemilihan" value="<?php echo $dt->nama_pemilihan ?>">
                </div>

                <div class="one-half">
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <i class="input-icon fa fa-user-cog"></i>
                        <span>Pilih Calon</span>
                        <input type="number" name="jumlah_pemilihan" placeholder="Jmlh Calon Dipilih" value="<?php echo $dt->jumlah_pemilihan ?>">
                    </div>
                </div>
                <div class="one-half last-column">
                    <div class="input-style has-icon input-style-1 input-required bottom-30">
                        <i class="input-icon fa fa-phone"></i>
                        <span>HP Admin [WhatsApp]</span>
                        <input type="number" name="kontak_panitia" placeholder="Kontak Panitia" value="<?php echo $dt->kontak_panitia ?>">
                    </div>
                </div>
                <div class="clear"></div>

                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <i class="input-icon fa fa-building"></i>
                    <span>Nama Lembaga/Yayasan/Organisasi</span>
                    <em>(wajib)</em>
                    <input type="name" name="penyelenggara" placeholder="Penyelenggara" value="<?php echo $dt->penyelenggara ?>">
                </div>

                <p class="bottom-0 top-15">Lokasi Penyelenggaraan</p>
                <div class="input-style has-icon input-style-1 input-required">
                    <span>Alamat Rinci Sampai Tingkat Desa</span>
                    <em>(wajib)</em>
                    <textarea placeholder="Alamat Pemilihan" name="lokasi"><?php echo $dt->lokasi ?></textarea>
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-map-marker"></i>
                    <span>Lokasi Kecamatan</span>
                    <em>(wajib)</em>
                    <input type="name" name="kecamatan" placeholder="Lokasi Kecamatan" value="<?php echo $dt->kecamatan ?>">
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-map-marker-alt"></i>
                    <span>Lokasi Kabupaten/Kota</span>
                    <em>(wajib)</em>
                    <input type="name" name="kelurahan" placeholder="Lokasi Kabupaten/Kota" value="<?php echo $dt->kelurahan ?>">
                </div>

                <p class="bottom-0 top-15">Waktu Pemilihan</p>
                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-play-circle"></i>
                    <span>Waktu Dimulai</span>
                    <em>(wajib)</em>
                    <input type="datetime-local" name="start_date" placeholder="Waktu Dimulai" value="<?php echo $dt->start_date ?>">
                </div>

                <div class="input-style has-icon input-style-1 input-required">
                    <i class="input-icon fa fa-stop-circle"></i>
                    <span>Waktu Selesai</span>
                    <em>(wajib)</em>
                    <input type="datetime-local" name="end_date" placeholder="Waktu Selesai" value="<?php echo $dt->end_date ?>">
                </div>
                <div class="input-style input-style-1 input-required">
                    <span>Status Pemilihan</span>
                    <em><i class="fa fa-angle-down"></i></em>
                    <select name="status">
                        <option value="<?php echo $dt->status ?>" selected><?php echo $dt->status ?></option>
                        <!-- <option value="1">Aktif</option>
                        <option value="2">Arsip</option> -->
                        <option value="3">Draft</option>
                    </select>
                </div>

                <div class="clear"></div>

                <div class="one-half top-20 bottom-10" style="text-align: center">
                    <button type="submit" class="button button-s shadow-small bg-green1-dark">Simpan</button>
                </div>
                </form>

                <?php 
                if ($this->session->flashdata('id_pemilihan') == '') {
                    # code...
                } else {
                 ?>
                
                <div class="one-half top-20 bottom-10" style="text-align: center; margin-right: 0;">
                    <a href="app/data_calon/<?php echo $this->session->flashdata('id_pemilihan'); ?>" class="button button-s shadow-small bg-blue1-dark">Data Calon <i
                            class="fa fa-arrow-right"></i></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="menu-hider"></div>