<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-sign-out" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-sign-out"></i>&nbsp;  <?= $title_web;?></li>
    </ol>
  </section>
  <section class="content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
                </div>
			    <!-- /.box-header -->
			    <div class="box-body">
						<div class="row">
							<div class="col-sm-5">
								<table class="table table-striped">
									<tr style="background:yellowgreen">
										<td colspan="3">Data Transaksi</td>
									</tr>
									<tr>
										<td>No Peminjaman</td>
										<td>:</td>
										<td>
											<?= $pinjam->pinjam_id;?>
										</td>
									</tr>
									<tr>
										<td>Tgl Peminjaman</td>
										<td>:</td>
										<td>
											<?= $pinjam->tgl_pinjam;?>
										</td>
									</tr>
									<tr>
										<td>Tgl pengembalian</td>
										<td>:</td>
										<td>
											<?= $pinjam->tgl_balik;?>
										</td>
									</tr>
									<tr>
										<td>ID Anggota</td>
										<td>:</td>
										<td>
											<?= $pinjam->id_login;?>
										</td>
									</tr>
									<tr>
										<td>Biodata</td>
										<td>:</td>
										<td>
											<?php
											$user = $this->M_Admin->get_tableid_edit('tb_user','id_login',$pinjam->id_login);
											error_reporting(0);
											if($user->nama != null)
											{
												echo '<table class="table table-striped">
															<tr>
																<td>Nama Anggota</td>
																<td>:</td>
																<td>'.$user->nama.'</td>
															</tr>
															<tr>
																<td>Telepon</td>
																<td>:</td>
																<td>'.$user->telepon.'</td>
															</tr>
															<tr>
																<td>E-mail</td>
																<td>:</td>
																<td>'.$user->email.'</td>
															</tr>
															<tr>
																<td>Alamat</td>
																<td>:</td>
																<td>'.$user->alamat.'</td>
															</tr>
															<tr>
																<td>Level</td>
																<td>:</td>
																<td>'.$user->level.'</td>
															</tr>
														</table>';
											}else{
												echo 'Anggota Tidak Ditemukan !';
											}
											?>
										</td>
									</tr>
									<tr>
										<td>Lama Peminjaman</td>
										<td>:</td>
										<td>
											<?= $pinjam->lama_pinjam;?> Hari
										</td>
									</tr>
								</table>
							</div>
							<div class="col-sm-7">
								<table class="table table-striped">
									<tr style="background:yellowgreen">
										<td colspan="3">Pinjam Buku</td>
									</tr>
									<tr>
										<td>Status</td>
										<td>:</td>
										<td>
											<?= $pinjam->status;?>
										</td>
									</tr>
									<tr>
										<td>Tgl Kembali</td>
										<td>:</td>
										<td>
											<?php 
												if($pinjam->tgl_kembali == '0000-00-00')
												{
													echo '<p style="color:red;"><b>belum dikembalikan</b></p>';
												}else{
													echo $pinjam->tgl_kembali;
												}
											
											?>
										</td>
									</tr>
									<tr>
										<td>Denda</td>
										<td>:</td>
										<td>
										<?php 
												$pinjam_id = $pinjam->pinjam_id;
												$denda = $this->db->query("SELECT * FROM tb_denda WHERE pinjam_id = '$pinjam_id'");
												
												$jml = $this->db->query("SELECT * FROM tb_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();			
												$date1 = date('Ymd');
												$date2 = preg_replace('/[^0-9]/','',$pinjam->tgl_balik);	
												$diff = $date1 - $date2;
												/*	$datetime1 = new DateTime($date1);
													$datetime2 = new DateTime($date2);
													$difference = $datetime1->diff($datetime2); */
												// echo $difference->days;
												if($diff > 0 )
												{
													echo $diff.' hari';
													$dd = $this->M_Admin->get_tableid_edit('tb_biaya_denda','stat','Aktif'); 
													echo '<p style="color:red;font-size:18px;">'.$this->M_Admin->rp($jml*($dd->harga_denda*$diff)).' 
													</p><small style="color:#333;">* Untuk '.$jml.' Buku</small>';
												}else{
													echo '<p style="color:green;text-align:center;">
													Tidak Ada Denda</p>';
												}
											?>
										</td>
									<!-- </tr>
									<td>Denda Hilang</td>
										<td>:</td>
										<php
										$this->M_Admin->get_tableid('tb_pinjam','pinjam_id',$pinjam->pinjam_id);
										$denda_buku_hilang = $this->db->query("SELECT harga_buku FROM tb_buku join tb_pinjam on tb_buku.id_buku=tb_pinjam.id_buku WHERE pinjam_id = '$pinjam_id' and tb_pinjam.status ='hilang'");
										if($denda_buku_hilang > 0 )
												{
													echo $denda_buku_hilang;
												}else{
													echo '<p style="color:green;text-align:center;">
													Tidak Ada Denda</p>';
												}
										?>-->
									
									<!-- <tr>
										<td>Kode Buku</td>
										<td>:</td>
										<td>
										<php
											$pin = $this->M_Admin->get_tableid('tb_pinjam','pinjam_id',$pinjam->pinjam_id);
											$no =1;
											foreach($pin as $isi)
											{
												$buku = $this->M_Admin->get_tableid_edit('tb_buku','id_buku',$isi['id_buku']);
												echo $no.'. '.$buku->id_buku.'<br/>';
											$no++;}

										?>
										</td>
									</tr> -->
									<tr>
										<td>Data Buku</td>
										<td>:</td>
										<td>
											<table class="table table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>id buku</th>
														<th>Title</th>
														<!-- <th>Penerbit</th>
														<th>sumber_buku</th>
														<th>jenis_buku</th>
														<th>Tahun</th> -->
														<!-- <th>status</th> -->
														<!-- ini tombol untuk aktifkan update buku hilang -->
														<!-- <th>Action</th> -->
													</tr>
												</thead>
												<tbody>
												<?php 
												$pin = $this->M_Admin->get_tableid('tb_pinjam','pinjam_id',$pinjam->pinjam_id);
													$no=1;
													foreach($pin as $isi)
													{
														$buku = $this->M_Admin->get_tableid_edit('tb_buku','id_buku',$isi['id_buku']);
														
												?>
													<tr>
														<td><?= $no;?></td>
														<td><?= $buku->id_buku;?></td>
														<td><?= $buku->title;?></td>
														<!-- <td><= $buku->penerbit;?></td>
														<td><= $buku->sumber_buku;?></td>
														<td><= $buku->jenis_buku;?></td>
														<td><= $buku->thn_buku;?></td> -->
														<!-- <td><= $buku->status_buku;?></td> -->
													<!-- ini tombol untuk aktifkan update buku hilang -->
														<!-- <td><= $buku->action; ?>
														<a href="<= base_url('transaksi/prosespinjam?bukuhilang='.$isi['id_buku']);?>"  ><button class="btn btn-warning" ><i class="fa fa-edit"></i></button></a>
													</td> -->

														

													</tr>
												<?php $no++;}?>
												</tbody>
											</table>
										</td>
									</tr>
								</table>
							</div> 
						</div>
                        <div class="pull-right"> 
							<a data-toggle="modal" data-target="#TableDenda" class="btn btn-primary btn-md" style="margin-left:1pc;">
								<i class="fa fa-sign-in"></i> Kembalikan</a>
							<a href="<?= base_url('transaksi');?>" class="btn btn-danger btn-md">Kembali</a>
						</div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>

 <!--modal import -->
<div class="modal fade" id="TableDenda">
<div class="modal-dialog" style="width:70%">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"> Pengembalian Buku</h4>
</div>
<div id="modal_body" class="modal-body fileSelection1">
	<table class="table table-striped">
		<tr style="background:yellowgreen">
			<td colspan="3">Data Peminjaman Buku</td>
		</tr>
		<tr>
			<td>No Peminjaman</td>
			<td>:</td>
			<td>
				<?= $pinjam->pinjam_id;?>
			</td>
		</tr>
		<tr>
			<td>Tgl Peminjaman</td>
			<td>:</td>
			<td>
				<?= $pinjam->tgl_pinjam;?>
			</td>
		</tr>
		<tr>
			<td>Tgl pengembalian</td>
			<td>:</td>
			<td>
				<?= $pinjam->tgl_balik;?>
			</td>
		</tr>
		<tr>
			<td>ID Anggota</td>
			<td>:</td>
			<td>
				<?= $pinjam->id_login;?>
				<?php
					$user = $this->M_Admin->get_tableid_edit('tb_user','id_login',$pinjam->id_login);
					error_reporting(0);
					if($user->nama != null)
					{
						echo ' ( '. $user->nama. ' )';
					}	
				?>
			</td>
		</tr>
		<tr>
			<td>Lama Peminjaman</td>
			<td>:</td>
			<td>
				<?= $pinjam->lama_pinjam;?> Hari
			</td>
		</tr>
		<tr>
			<td>Tanggal Pengembalian</td>
			<td>:</td>
			<td>
				<?= date('Y-m-d');?> ( Sekarang )
			</td>
		</tr>
		<tr>
			<td>Terlewat Masa Pengembalian</td>
			<td>:</td>
			<td>
			<?php
				
				$date1 = date('Ymd');
				$date2 = preg_replace('/[^0-9]/','',$pinjam->tgl_balik);
				$diff = $date1 - $date2;
				if($diff > 0)
				{
					echo abs($diff);

				}else{
					echo '0';
				}
			?> Hari
			</td>
		</tr>
		<tr>
			<td>Detail Buku</td>
			<td>:</td>
			<td>
			<?php
				$pin = $this->M_Admin->get_tableid('tb_pinjam','pinjam_id',$pinjam->pinjam_id);
				$no =1;
				foreach($pin as $isi)
				{
					$buku = $this->M_Admin->get_tableid_edit('tb_buku','id_buku',$isi['id_buku']);
					echo $no.'. '.$buku->id_buku.' ( '.$buku->title.' )<br/>';
				$no++;}

			?>
			</td>
		</tr>

		<tr>
			<td>Total Denda</td>
			<td>:</td>
			<td>
			<?php 
				$pinjam_id = $pinjam->pinjam_id;
				$denda = $this->db->query("SELECT * FROM tb_denda WHERE pinjam_id = '$pinjam_id'");
				
				$jml = $this->db->query("SELECT * FROM tb_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();			
				$date1 = date('Ymd');
				$date2 = preg_replace('/[^0-9]/','',$pinjam->tgl_balik);
				$diff = $date1 - $date2;
				/* $datetime1 = new DateTime($date1);
					$datetime2 = new DateTime($date2);
					$difference = $datetime1->diff($datetime2);*/
				// echo $difference->days;
				if($diff >0 )
				{
					$dd = $this->M_Admin->get_tableid_edit('tb_biaya_denda','stat','Aktif'); 
					echo '<p style="color:red;font-size:18px;">'.$this->M_Admin->rp($jml*(($dd->harga_denda*$diff) + $denda_hilang)).' 
					</p><small style="color:#333;">* Untuk '.$jml.' Buku</small>';
				}else{
					echo '<p style="color:green;text-align:center;">
					Tidak Ada Denda</p>';
				}
				
			?>
			</td>


		</tr>
	</table>
</div>
<div class="modal-footer">
	<div class="pull-right">
		<a href="<?= base_url('transaksi/prosespinjam?kembali='.$pinjam->pinjam_id);?>">
		<button class="btn btn-primary"> Proses Pengembalian</button></a>
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
</div>
</div>

<!-- modelhilang -->

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
