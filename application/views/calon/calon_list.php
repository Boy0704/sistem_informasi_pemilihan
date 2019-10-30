
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('calon/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('calon/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('calon'); ?>" class="btn btn-default">Reset</a>
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
		<th>No Calon</th>
		<th>Nama Calon</th>
		<th>Visi</th>
		<th>Misi</th>
		<th>Foto</th>
		<th>Program Lain</th>
		<th>Pemilihan</th>
		<th>Action</th>
            </tr><?php
            foreach ($calon_data as $calon)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $calon->no_calon ?></td>
			<td><?php echo $calon->nama_calon ?></td>
			<td><?php echo $calon->visi ?></td>
			<td><?php echo $calon->misi ?></td>
			<td><img src="front/images/calon/<?php echo $calon->foto ?>" style="width: 100px;height: 100px;"></td>
			<td><?php echo $calon->program_lain ?></td>
			<td><?php echo get_data('pemilihan','id_pemilihan',$calon->id_pemilihan,'nama_pemilihan') ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('calon/update/'.$calon->id_calon),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('calon/delete/'.$calon->id_calon),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    