<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<?php
	$idkat = $buku->id_kategori;
	$idrak = $buku->id_rak;
	$idpenerbit = $buku->id_penerbit;
	$idpengarang = $buku->id_pengarang;

	$kat = $this->M_Admin->get_tableid_edit('tb_kategori','id_kategori',$idkat);
	$rak = $this->M_Admin->get_tableid_edit('tb_rak','id_rak',$idrak);
	$penerbit = $this->M_Admin->get_tableid_edit('tb_penerbit','id_penerbit',$idpenerbit);
	$pengarang = $this->M_Admin->get_tableid_edit('tb_pengarang','id_pengarang',$idpengarang);
?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
		</h1>
		<ol class="breadcrumb">

		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h4><b>Detail Buku</b></h4>
					</div>
					<!-- /.box-header -->

					<!-- form start -->
					<div class="box-body">
						<table class="table table-striped table-bordered">

							<tr>
								<td>Judul Buku</td>
								<td><b> <?= $buku->title;?> </b></td>
							</tr>

							<!-- NOTICE ME -->
							<tr>
								<td>Penerbit</td>
								<td><?= $penerbit->nama_penerbit;?></td>
							</tr>

							<tr>
								<td>Pengarang</td>
								<td><?= $pengarang->nama_pengarang;?></td>
							</tr>
							<!-- END NOTICE ME -->

							<tr>
								<td>Kategori</td>
								<td><?= $kat->nama_kategori;?></td>
							</tr>

							<tr>
								<td>jenis buku</td>
								<td><?= $buku->jenis_buku;?></td>
							</tr>

							<tr>
								<td style="width:20%">ISBN</td>
								<td><?= $buku->isbn;?></td>
							</tr>

							<tr>
								<td style="width:20%">Harga Buku (Rp.)</td>
								<td><?= $buku->harga_buku;?></td>
							</tr>





							<tr>
								<td>sumber buku</td>
								<td><?= $buku->sumber_buku;?></td>
							</tr>

							<tr>
								<td>Tahun Terbit</td>
								<td><?= $buku->thn_buku;?></td>
							</tr>
							<!-- <tr>
							<td>Jumlah Buku</td>
							<td><= $buku->jml;?></td>
						</tr> -->
							<tr>
								<td>Detail Pinjam</td>
								<td>
									<?php
									$id = $buku->id_buku;
									$dd = $this->db->query("SELECT * FROM tb_pinjam WHERE id_buku= '$id' AND status = 'Dipinjam'");
									if($dd->num_rows() > 0 )
									{
										echo $dd->num_rows();
									}else{
										echo '0';
									}
								?>
									<a data-toggle="modal" data-target="#TableAnggota" class="btn btn-primary btn-xs"
										style="margin-left:1pc;">
										<i class="fa fa-sign-in"></i> Detail Pinjam</a>
								</td>
							</tr>
							<!-- <tr>
							<td>Keterangan Lainnya</td>
							<td><?= $buku->isi;?></td>
						</tr> -->
							<tr>
								<td>Rak / Lokasi</td>
								<td><?= $rak->nama_rak;?></td>
							</tr>
							<tr>
								<!-- <td>Lampiran</td>
							<td><php if(!empty($buku->lampiran !== "0")){?>
									<a href="<= base_url('assets_style/image/buku/'.$buku->lampiran);?>" class="btn btn-primary btn-md" target="_blank">
										<i class="fa fa-download"></i> Sample Buku
									</a>
								<php  }else{ echo '<br/><p style="color:red">* Tidak ada Lampiran</p>';}?>
                               </td> -->
							</tr>
							<tr>
								<td>Tanggal Masuk</td>
								<td><?= $buku->tgl_masuk;?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header ">
						<h4><b> <center> Sampul Buku </center></b></h4>
					</div>
					<tr>
						<center>
						<td>
							<?php if(!empty($buku->sampul !== "0")){?>
							<a href="<?= base_url('assets_style/image/buku/'.$buku->sampul);?>" target="_blank">
								<img src="<?= base_url('assets_style/image/buku/'.$buku->sampul);?>"
									style="height:200px;" class="img-responsive">
							</a>
							<?php }else{ echo '<br/><p style="color:red">* Tidak ada Sampul</p>';}?>
						</td>
						</center>
						<br>
					</tr>

				</div>
			</div>
		</div>


</div>
</section>
</div>

<!--modal import -->
<div class="modal fade" id="TableAnggota">
	<div class="modal-dialog" style="width:70%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"> Anggota Yang Sedang Pinjam</h4>
			</div>
			<div id="modal_body" class="modal-body fileSelection1">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Anggota</th>
							<th>Nama</th>
							<th>Jenkel</th>
							<th>Telepon</th>
							<th>Tgl Pinjam</th>
							<th>Lama Pinjam</th>
						</tr>
					</thead>
					<tbody>
						<?php 
	$no = 1;
	$bukuid = $buku->id_buku;
	$pin = $this->db->query("SELECT * FROM tb_pinjam WHERE id_buku ='$bukuid' AND status = 'Dipinjam'")->result_array();
	foreach($pin as $si)
	{
		$isi = $this->M_Admin->get_tableid_edit('tb_user','id_login',$si['id_login']);
		if($isi->level == 'Anggota'){
		?>
						<tr>
							<td><?= $no;?></td>
							<td><?= $isi->id_login;?></td>
							<td><?= $isi->nama;?></td>
							<td><?= $isi->jenkel;?></td>
							<td><?= $isi->telepon;?></td>
							<td><?= $si['tgl_pinjam'];?></td>
							<td><?= $si['lama_pinjam'];?> Hari</td>
						</tr>
						<?php $no++;}}?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
