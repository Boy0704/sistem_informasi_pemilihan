
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('slide/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('slide/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('slide'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Foto</th>
		<th>Keterangan</th>
		<th>Action</th>
            </tr><?php
            foreach ($slide_data as $slide)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><img src="front/images/slide/<?php echo $slide->foto ?>" style="width: 100px;"></td>
			<td><?php echo $slide->keterangan ?></td>
			<td style="text-align:center" width="200px">
                <?php 
                if ($slide->aktif==0) {
                 ?>
                <a href="app/status_slide/1/<?php echo $slide->id_slide ?>" class="label label-primary">Non aktif</a>
            <?php } else { ?>
                <a href="app/status_slide/0/<?php echo $slide->id_slide ?>" class="label label-success">Aktif</a>
				<?php 
            }   
                echo ' | '; 
				echo anchor(site_url('slide/update/'.$slide->id_slide),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('slide/delete/'.$slide->id_slide),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    