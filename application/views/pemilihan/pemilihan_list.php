
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pemilihan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pemilihan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pemilihan'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Kategori</th>
		<th>Nama Pemilihan</th>
		<th>Jumlah Pemilihan</th>
		<th>Kontak Panitia</th>
		<th>Penyelenggara</th>
		<th>Lokasi</th>
		<th>Kecamatan</th>
		<th>Kelurahan</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Action</th>
            </tr><?php
            foreach ($pemilihan_data as $pemilihan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pemilihan->id_kategori ?></td>
			<td><?php echo $pemilihan->nama_pemilihan ?></td>
			<td><?php echo $pemilihan->jumlah_pemilihan ?></td>
			<td><?php echo $pemilihan->kontak_panitia ?></td>
			<td><?php echo $pemilihan->penyelenggara ?></td>
			<td><?php echo $pemilihan->lokasi ?></td>
			<td><?php echo $pemilihan->kecamatan ?></td>
			<td><?php echo $pemilihan->kelurahan ?></td>
			<td><?php echo $pemilihan->start_date ?></td>
			<td><?php echo $pemilihan->end_date ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pemilihan/update/'.$pemilihan->id_pemilihan),'<span class="label label-info">Ubah</span>'); 
				echo ' | '; 
				echo anchor(site_url('pemilihan/delete/'.$pemilihan->id_pemilihan),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    