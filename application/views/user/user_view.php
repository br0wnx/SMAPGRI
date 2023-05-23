<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
	<section class="content-header">
	

		<ol class="breadcrumb">
        <h4> <b>
				<i class="fa fa-users"> </i> Daftar Pengguna
			</b> </h4>
			

		</ol>
		<?php if($this->session->userdata('level') == 'Petugas'){?>
		<div align="left" class="box-header with-border">
			<a href="user/tambah"><button class="btn btn-success"><i class="fa fa-user"> </i> Tambah
					Pengguna</button></a>
		</div>
		<?php }?>

		<?php if($this->session->userdata('level') == 'kepala perpus'){?>
		<div align="left" class="box-header with-border">
			<a href="laporan/cetak_user" target=blank"><button class="btn btn-primary"><i class="fa fa-print"> </i>
					cetak</button></a>
		</div>
		<?php }?>
	</section>
	<section class="content">
		<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">





					<!-- /.box-header -->
					<div class="box-body">




						<div class="table-responsive">
							<br />
							<table id="example1" class="table table-bordered table-striped table" width="100%">
								<thead>
									<tr>
										<th>No</th>
										<th>ID Anggota</th>
										<!-- <th>ID</th> -->
										<th>Foto</th>
										<th>NIP/NIS</th>
										<th>Nama</th>
										<!-- <th>Username</th> -->
										<th>Jenkel</th>
										<!-- <th>Telepon</th> -->
										<th>Level</th>
										<!-- <th>Alamat</th> -->
										<?php if($this->session->userdata('level') == 'Petugas'){?>
										<th>Aksi</th>
										<?php }?>
									</tr>
								</thead>
								<tbody>
									<?php $no=1;foreach($user as $isi){?>
									<tr>
										<td><?= $no;?></td>
										<!-- <td><?= $isi['id_login'];?></td> -->
										<td><?= $isi['id_anggota'];?></td>
										<td>
											<center>
												<?php if(!empty($isi['foto'] !== "-")){?>
												<img src="<?php echo base_url();?>assets_style/image/<?php echo $isi['foto'];?>"
													alt="#" class="img-responsive" style="height:auto;width:30px;" />
												<?php }else{?>
												<!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
												<i class="fa fa-user fa-3x" style="color:#333;"></i>
												<?php }?>
											</center>
										</td>
										<td><b><?= $isi['nisnip'];?></b></td>
										<td><b><?= $isi['nama'];?></b></td>
										<!-- <td><= $isi['user'];?></td> -->
										<td><?= $isi['jenkel'];?></td>
										<!-- <td><?= $isi['telepon'];?></td> -->
										<td><?= $isi['level'];?></td>
										<!-- <td><?= $isi['alamat'];?></td> -->

										<?php if($this->session->userdata('level') == 'Petugas'){?>
										<td style="width:20%;">
											<a href="<?= base_url('user/edit/'.$isi['id_login']);?>"><button
													class="btn btn-success"><i class="fa fa-edit"></i></button></a>
											<a href="<?= base_url('user/del/'.$isi['id_login']);?>"
												onclick="return confirm('Anda yakin user akan dihapus ?');">
												<button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
											<a href="<?= base_url('user/detail/'.$isi['id_login']);?>"
												target="_blank"><button class="btn btn-primary">
													<i class="fa fa-print"></i> Cetak Kartu</button></a>
										</td>
										<?php }?>


									</tr>
									<?php $no++;}?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
