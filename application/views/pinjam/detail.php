<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
   
    <ol class="breadcrumb">
			
    </ol>
  </section>
  <section class="content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
		
                <div class="box-header with-border">
				<h4> <b> 
      <i> </i>  <?= $title_web;?> </b>
    </h4>
                </div>
			    <!-- /.box-header -->
			    <div class="box-body">
						<div class="row">
							<div class="col-sm-5">
								<table class="table table-striped">
									<tr">
										<td colspan="3"><b>Data Transaksi </b></td>
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
									<!-- <tr>
										<td>ID Anggota</td>
										<td>:</td>
										<td>
											<?= $pinjam->id_login;?>
										</td>
									</tr> -->
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
									<tr>
										<td colspan="3"> <b> Pinjam Buku </b></td>
									</tr>
									<!-- <tr>
										<td>Status</td>
										<td>:</td>
										<td>
											<= $pinjam->status;?>
										</td>
									</tr> -->
									<tr>
										<td>Tgl Kembali</td>
										<td>:</td>
										<td>
											<?php 
												if($pinjam->tgl_kembali == '0000-00-00')
												{
													echo '<p style="color:red;">belum dikembalikan</p>';
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
												$total_denda = $denda->row();

												if($pinjam->status == 'Di Kembalikan')
												{
													echo $this->M_Admin->rp($total_denda->denda);
													
												}else{
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
												}
											?>
										</td>
									</tr>
									
									<tr>
										<td>Data Buku</td>
										<td>:</td>
										<td>
											<table class="table table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>id buku </th>
														<th>Title</th>
														<!-- <th>status</th> -->
														<!-- <th>Penerbit</th>
														<th>sumber_buku</th>
														<th>jenis_buku</th>
														<th>Tahun</th> -->
													</tr>
												</thead>
												<tbody>
												<?php 	$pin = $this->M_Admin->get_tableid('tb_pinjam','pinjam_id',$pinjam->pinjam_id);
										
													$no=1;
													foreach($pin as $isi)
													{
														$buku = $this->M_Admin->get_tableid_edit('tb_buku','id_buku',$isi['id_buku']);
												?>
													<tr>
														<td><?= $no;?></td>
														<td><?= $buku->id_buku;?></td>
														<td><?= $buku->title;?></td>
														<!-- <td><?= $buku->status_buku;?></td> -->
														<!-- <td><= $buku->penerbit;?></td>
														<td><= $buku->sumber_buku;?></td>
														<td><= $buku->jenis_buku;?></td>
														<td><= $buku->thn_buku;?></td> -->
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
							<a href="#" onclick="window.history.back()" class="btn btn-danger btn-md">Kembali</a>
						</div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
