
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Kategori <?php echo form_error('id_kategori') ?></label>
            <!-- <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" /> -->
            <select name="id_kategori" class="form-control">
                <option value="<?php echo $id_kategori ?>"><?php echo $id_kategori ?></option>
                <?php 
                foreach ($this->db->get('kategori')->result() as $rw) {
                 ?>
                <option value="<?php echo $rw->id_kategori ?>"><?php echo $rw->kategori ?></option>
            <?php } ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Pemilihan <?php echo form_error('nama_pemilihan') ?></label>
            <input type="text" class="form-control" name="nama_pemilihan" id="nama_pemilihan" placeholder="Nama Pemilihan" value="<?php echo $nama_pemilihan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah Pemilihan <?php echo form_error('jumlah_pemilihan') ?></label>
            <input type="text" class="form-control" name="jumlah_pemilihan" id="jumlah_pemilihan" placeholder="Jumlah Pemilihan" value="<?php echo $jumlah_pemilihan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kontak Panitia <?php echo form_error('kontak_panitia') ?></label>
            <input type="text" class="form-control" name="kontak_panitia" id="kontak_panitia" placeholder="Kontak Panitia" value="<?php echo $kontak_panitia; ?>" />
        </div>
	    <div class="form-group">
            <label for="varbinary">Penyelenggara <?php echo form_error('penyelenggara') ?></label>
            <input type="text" class="form-control" name="penyelenggara" id="penyelenggara" placeholder="Penyelenggara" value="<?php echo $penyelenggara; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lokasi <?php echo form_error('lokasi') ?></label>
            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
            <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Start Date <?php echo form_error('start_date') ?></label>
            <input type="datetime" class="form-control" name="start_date" id="start_date" placeholder="Start Date" value="<?php echo $start_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">End Date <?php echo form_error('end_date') ?></label>
            <input type="datetime" class="form-control" name="end_date" id="end_date" placeholder="End Date" value="<?php echo $end_date; ?>" />
        </div>
	    <input type="hidden" name="id_pemilihan" value="<?php echo $id_pemilihan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pemilihan') ?>" class="btn btn-default">Cancel</a>
	</form>
   