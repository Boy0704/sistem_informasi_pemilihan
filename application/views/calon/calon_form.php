
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">No Calon <?php echo form_error('no_calon') ?></label>
            <input type="text" class="form-control" name="no_calon" id="no_calon" placeholder="No Calon" value="<?php echo $no_calon; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Calon <?php echo form_error('nama_calon') ?></label>
            <input type="text" class="form-control" name="nama_calon" id="nama_calon" placeholder="Nama Calon" value="<?php echo $nama_calon; ?>" />
        </div>
	    <div class="form-group">
            <label for="visi">Visi <?php echo form_error('visi') ?></label>
            <textarea class="form-control" rows="3" name="visi" id="visi" placeholder="Visi"><?php echo $visi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="misi">Misi <?php echo form_error('misi') ?></label>
            <textarea class="form-control" rows="3" name="misi" id="misi" placeholder="Misi"><?php echo $misi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
        </div>
	    <input type="hidden" name="id_calon" value="<?php echo $id_calon; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('calon') ?>" class="btn btn-default">Cancel</a>
	</form>
   