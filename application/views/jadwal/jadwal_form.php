
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="datetime">Mulai <?php echo form_error('mulai') ?></label>
            <input type="text" class="form-control" name="mulai" id="mulai" placeholder="Mulai" value="<?php echo $mulai; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jadwal') ?>" class="btn btn-default">Cancel</a>
	</form>
   