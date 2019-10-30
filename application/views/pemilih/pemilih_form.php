
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Pemilih <?php echo form_error('nama_pemilih') ?></label>
            <input type="text" class="form-control" name="nama_pemilih" id="nama_pemilih" placeholder="Nama Pemilih" value="<?php echo $nama_pemilih; ?>" />
        </div>
	    <div class="form-group">
            <label for="varbinary">Kel <?php echo form_error('kel') ?></label>
            <input type="text" class="form-control" name="kel" id="kel" placeholder="Kel" value="<?php echo $kel; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kode Akun <?php echo form_error('kode_akun') ?></label>
            <input type="text" class="form-control" name="kode_akun" id="kode_akun" placeholder="Kode Akun" value="<?php echo $kode_akun; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Telp <?php echo form_error('no_telp') ?></label>
            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
        </div>
	    <input type="hidden" name="id_pemilih" value="<?php echo $id_pemilih; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pemilih') ?>" class="btn btn-default">Cancel</a>
	</form>
   