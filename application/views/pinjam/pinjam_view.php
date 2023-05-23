<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
<section class="content-header">
  
    <ol class="breadcrumb">
    <h3> <b>
      <i> </i>  Data Transaksi
    </b></h3>
    
    </ol>
  </section>
 
	<section class="content">
		<!-- sesi action tombol atas khusus petugas -->
		<div class="box-header with-border"><?php if($this->session->userdata('level') == 'Petugas'){ ?>
						<a href="transaksi/pinjam"><button class="btn btn-primary">
								<i class="fa fa-plus"> </i> Tambah Pinjam</button></a>
						<a href="transaksi/kembali"><button class="btn btn-danger">
								<i class="fa fa-download"> </i>daftar pengembalian</button></a>
						<?php }?>

						<div class="box-header with-border"><?php if($this->session->userdata('level') == 'Anggota'){ ?>
							<a href="transaksi/kembali"><button class="btn btn-primary">
									<i class="fa fa-download"> </i>daftar pengembalian</button></a>
							<?php }?>
						</div>

						<!-- ==================================================================================== -->
						<?php if($this->session->userdata('level') == 'kepala perpus'){?>
						<div class="box-header with-border">
							<a href="laporan/cetak_transaksi" target=blank><button class="btn btn-primary"><i
										class="fa fa-print"> </i> cetak</button></a>
						</div>
						<?php }?>

						<!-- ==================================================================================== -->


						<!-- end sesi petugas -->
		<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">

					
						<!-- /.box-header -->
						<div class="box-body">
							<br />
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped table" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>No Pinjam</th>
											<!-- <th>ID Anggota</th> -->
											<th>Nama</th>
											<th>Pinjam</th>
											<th>Batas Kembali</th>
											<th style="width:10%">Status</th>
											<th>Denda</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php 
						// NOTICE ME!!
							$no=1;
							foreach($pinjam->result_array() as $isi){
									$id_login = $isi['id_login'];
									$ang = $this->db->query("SELECT * FROM tb_user WHERE id_login = '$id_login'")->row();

									$pinjam_id = $isi['pinjam_id'];
									$denda = $this->db->query("SELECT * FROM tb_denda WHERE pinjam_id = '$pinjam_id'");
									$total_denda = $denda->row();
						?>
										<tr>
											<td><?= $no;?></td>
											<td><?= $isi['pinjam_id'];?></td>
											<!-- <td><?= $isi['id_login'];?></td> -->
											<td><?= $ang->nama;?></td>
											<td><?= $isi['tgl_pinjam'];?></td>
											<td><?= $isi['tgl_balik'];?></td>
											<td><?= $isi['status'];?></td>
											<td>
												<?php 
										if($isi['status'] == 'Di Kembalikan')
										{
											echo $this->M_Admin->rp($total_denda->denda);
										}else{
											$jml = $this->db->query("SELECT * FROM tb_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();			
											$date1 = date('Ymd');
											$date2 = preg_replace('/[^0-9]/','',$isi['tgl_balik']);
											$diff = $date1 - $date2;
											if($diff > 0 )
											{
												echo $diff.' hari';
												$dd = $this->M_Admin->get_tableid_edit('tb_biaya_denda','stat','Aktif'); 
												echo '<p style="color:red;font-size:18px;">
												'.$this->M_Admin->rp($jml*($dd->harga_denda*$diff)).' 
												</p><small style="color:#333;">* Untuk '.$jml.' Buku</small>';
											}else{
												echo '<p style="color:green;">
												Tidak Ada Denda</p>';
											}
										}
									?>
											</td>
											<td style="text-align:center;">
												<?php if($this->session->userdata('level') == 'Petugas'){ ?>
												<?php if($isi['tgl_kembali'] == '0000-00-00') {?>
												<a href="<?= base_url('transaksi/kembalipinjam/'.$isi['pinjam_id']);?>"
													class="btn btn-warning btn-sm" title="pengembalian buku">
													<i class="fa fa-sign-out"></i> Kembalikan</a>
												<?php }else{ ?>
												<a href="javascript:void(0)" class="btn btn-success btn-sm"
													title="pengembalian buku">
													<i class="fa fa-check"></i> Dikembalikan</a>
												<?php }?>
												<a href="<?= base_url('transaksi/detailpinjam/'.$isi['pinjam_id'].'?pinjam=yes');?>"
													class="btn btn-primary btn-sm" title="detail pinjam"><i
														class="fa fa-eye"></i></button></a>
												<!-- <a href="<= base_url('transaksi/prosespinjam?pinjam_id='.$isi['pinjam_id']);?>" 
											onclick="return confirm('Anda yakin Peminjaman Ini akan dihapus ?');" 
											class="btn btn-danger btn-sm" title="hapus pinjam">
											<i class="fa fa-trash"></i></a> -->
												<?php }else{?>
												<a href="<?= base_url('transaksi/detailpinjam/'.$isi['pinjam_id']);?>"
													class="btn btn-primary btn-sm" title="detail pinjam">
													<i class="fa fa-eye"></i> Detail Pinjam</a>
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
	</section>
</div>
