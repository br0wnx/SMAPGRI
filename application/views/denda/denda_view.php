<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-edit" style="color:green"> </i> <b> Denda </b>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
		</ol>
	</section>
	<section class="content">
		<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-sm-4">
						<div class="box box-primary">
							<div class="box-header with-border">
								<?php if(!empty($this->input->get('id'))){?>
								<h4> Edit Harga Denda</h4>
								<?php }else{?>
								<h4> Edit Harga Denda</h4>
								<?php }?>

							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<?php if(!empty($this->input->get('id'))){?>
								<form method="post" action="<?= base_url('transaksi/dendaproses');?>">
									<div class="form-group">
										<label for="">Harga Denda</label>
										<input type="number" name="harga" value="<?=$den->harga_denda;?>"
											class="form-control" placeholder="Contoh : 10000">

									</div>
									<!-- status denda disable -->
									<div class="form-group" hidden>
										<label for="">Status</label>
										<select class="form-control" name="status">
											<option <?php if($den->stat == 'Aktif'){echo 'selected';}?>>Aktif</option>
											<option <?php if($den->stat == 'Tidak Aktif'){echo 'selected';}?>>Tidak
												Aktif</option>
										</select>
									</div>
									<br />
									<input type="hidden" name="edit" value="<?=$den->id_biaya_denda;?>">
									<button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Harga
										Denda</button>
								</form>
								<?php }else{?>
								<!-- ini untuk tambah harga denda -->
								<div class="form-group">
									<label for="">harga denda</label>
									<input type="number" name="harga" class="form-control" readonly>
								</div>
								<br />
								<input type="hidden" name="tambah" value="tambah">
								<button type="submit" class="btn btn-primary" disable> <i class="fa fa-edit"></i> Edit
									Harga Denda</button>


								<!-- <form method="post" action="<= base_url('transaksi/dendaproses');?>">
								<div class="form-group">
								<label for="">Harga Denda</label>
									<input type="number" name="harga" class="form-control" placeholder="Contoh : 10000" >
								</div>
								<br/>
								<input type="hidden" name="tambah" value="tambah">
								<button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Harga Denda</button>
							</form> -->
								<!-- end tambah harga denda -->
								<?php }?>
								<div class="box-header with-border">
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<div class="table-responsive">
										<table class="table table-bordered table-striped table" width="100%">
											<thead>
												<tr>
													<!-- <th>No</th> -->
													<th>Harga Denda</th>
													<th>Status</th>
													<th>Mulai Tanggal</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $no=1;foreach($denda->result_array() as $isi){?>
												<tr>
													<!-- <td><= $no;?></td> -->
													<td><?= $isi['harga_denda'];?></td>
													<td><?= $isi['stat'];?></td>
													<td><?= $isi['tgl_tetap'];?></td>
													<td style="width:20%;">
														<a
															href="<?= base_url('transaksi/denda?id='.$isi['id_biaya_denda']);?>"><button
																class="btn btn-success"><i
																	class="fa fa-edit"></i>edit</button></a>
														<?php if($isi['stat'] == 'Aktif'){?>
														<!-- <button class="btn btn-warning"><i class="fa fa-ban"></i></button> -->
														<?php }else{?>
														<!-- <a href="<= base_url('transaksi/dendaproses?denda_id='.$isi['id_biaya_denda']);?>" onclick="return confirm('Anda yakin Biaya denda ini akan dihapus ?');">
											<button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> -->
														<?php }?>
													</td>
												</tr>
												<?php $no++;}?>
											</tbody>
										</table>
									</div>
								</div>

							</div>
						</div>
					</div>
					<!-- tabel -->

					<div class="col-sm-8">
						<div class="box box-primary">
							<div class="box-header with-border">
								<!-- /.box-header -->
								<div class="box-body">
									<div class="table-responsive">
										<table id="example1" class="table table-bordered table-striped table"
											width="100%">
											<thead>
												<tr>
													<!-- <th>No</th> -->
													<th>Pinjam id</th>
													<th>Nama</th>
													<th>Denda</th>
													<th>Waktu</th>
												</tr>
											</thead>

											<tbody>

												<?php
					$koneksi     = mysqli_connect("localhost", "root", "", "perpustakaansmapi");
									// $sql = mysqli_query($koneksi,"SELECT distinct * FROM tb_user join tb_pinjam on tb_user.id_login = tb_pinjam.id_login join  tb_denda on tb_pinjam.pinjam_id = tb_denda.pinjam_id order by 'pinjam_id'");
									$sql = mysqli_query($koneksi,"SELECT distinct tb_pinjam.pinjam_id , tb_user.nama, tb_denda.denda, tb_denda.lama_waktu from tb_denda join tb_pinjam on tb_pinjam.pinjam_id = tb_denda.pinjam_id join tb_user on tb_pinjam.id_login = tb_user.id_login where denda >'0' order by 'pinjam_id'");

					//mengambil data hasil query dalam bentuk array
					//while untuk perulangan selama data masih ada maka akan ditampilkan  
					$no=0;
					while ($b = mysqli_fetch_array($sql)) {
						//$no++;  //variabel no untuk penomoran data yang ditampilkan
						$no++;	
			?>
												<tr>
													<!-- <td><font face="tahoma"><?php echo $no; ?></td> -->
													<td>
														<font face="tahoma"><?php echo $b["pinjam_id"]; ?>
													</td>
													<td>
														<font face="tahoma"><?php echo $b["nama"]; ?>
													</td>
													<td>
														<font face="tahoma"><?php echo $b["denda"]; ?>
													</td>
													<td>
														<font face="tahoma"><?php echo $b["lama_waktu"]; ?>-hari
													</td>
												</tr>
												<?php $no++;}?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>




			<!-- ===================================================== -->

	</section>
</div>
