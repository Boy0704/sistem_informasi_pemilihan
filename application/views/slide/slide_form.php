
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="file" class="form-control" name="foto" />
            <input type="hidden" name="old_foto" value="<?php echo $foto; ?>">
            <?php 
            if ($foto != '') {
             ?>
            <p><b>*) Foto Sebelumnya</b></p>
            <img src="front/images/slide/<?php echo $foto ?>" style="width: 100px;">
            <?php } ?>
        </div>
	    <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
	    <input type="hidden" name="id_slide" value="<?php echo $id_slide; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('slide') ?>" class="btn btn-default">Cancel</a>
	</form>
   