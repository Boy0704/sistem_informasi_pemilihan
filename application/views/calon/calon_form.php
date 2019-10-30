
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
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
            <label for="varchar">Foto </label>
            <input type="hidden" name="old_image" value="<?php echo $foto ?>">
            <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto"  />
            <div>
                <b class="text-danger">*) Foto sebelumnya</b><br>
                <?php 
                if ($foto == '') {
                    echo 'tidak ada foto';
                } else {
                    echo '<img src="front/images/calon/'. $foto .'" style="width: 100px;height: 100px;">';
                }
                ?>
            </div>
        </div>
	    <div class="form-group">
            <label for="program_lain">Program Lain <?php echo form_error('program_lain') ?></label>
            <textarea class="form-control" rows="3" name="program_lain" id="program_lain" placeholder="Program Lain"><?php echo $program_lain; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Pemilihan <?php echo form_error('id_pemilihan') ?></label>
            <!-- <input type="text" class="form-control" name="id_pemilihan" id="id_pemilihan" placeholder="Id Pemilihan" value="<?php echo $id_pemilihan; ?>" /> -->
            <select name="id_pemilihan" class="form-control">
                <option value="<?php echo $id_pemilihan ?>"><?php echo $id_pemilihan ?></option>
                <?php 
                foreach ($this->db->get('pemilihan')->result() as $rw) {
                 ?>
                <option value="<?php echo $rw->id_pemilihan ?>"><?php echo $rw->nama_pemilihan ?></option>
            <?php } ?>
            </select>
        </div>
	    <input type="hidden" name="id_calon" value="<?php echo $id_calon; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('calon') ?>" class="btn btn-default">Cancel</a>
	</form>
   