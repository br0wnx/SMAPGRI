<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> <b>
      <i class="fa fa-exchange"> </i> Transaksi Pinjam
    </b></h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
    </ol>
  </section>
  
 <!-- cekk -->
 

 <!-- cekk -->



  <section class="content">
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-success">

		<!-- filter tgl jalu==================================================================================== -->
		<!-- <div class="box-header with-border">
                    <a href="cetak_transaksi" target=blank ><button class="btn btn-primary"><i class="fa fa-print"> </i> cetak</button></a>
        </div>

		<php if($this->session->userdata('level') == 'kepala perpus'){?> 
                
			<form method="post" action="">
			<label>PILIH TANGGAL</label>
			<input type="date" name="tanggal">
			<input type="date" name="tanggal2">
			<input type="submit" name="submit" value="submit">
			</form>

		
    
		 ==================================================================================== -->

<!-- <hr>
filter by bulan
<form action ="<php echo base_url();?> transaksi/filter"
method="POST" target ='blank'>

<input type="hidden" name="nilaifilter" value="2">

			pilih tahun  <br>
			<select name ="tahun1" required="">

			<php foreach ($tahun as $row): ?>
			
				<option value ="<php echo $row->tahun ?>"><php echo $row-> tahun ?> </option>

				<php endforeach ?>
			</select>
			
			
			<br> bulan Awal <br>
			<select name="bulanawal" required="">
				<option value="1">Januari</option>
				<option value="2">Februari</option>
				<option value="3">Maret</option>
				<option value="4">April</option>
				<option value="5">Mei</option>
				<option value="6">Juni</option>
				<option value="7">Juli</option>
				<option value="8">Agustus</option>
				<option value="9">September</option>
				<option value="10">Oktober</option>
				<option value="11">November</option>
				<option value="12">Desember</option>
			</select> <br> 

			bulan Akhir <br>
			<select name="bulanakhir" required="">
				<option value="1">Januari</option>
				<option value="2">Februari</option>
				<option value="3">Maret</option>
				<option value="4">April</option>
				<option value="5">Mei</option>
				<option value="6">Juni</option>
				<option value="7">Juli</option>
				<option value="8">Agustus</option>
				<option value="9">September</option>
				<option value="10">Oktober</option>
				<option value="11">November</option>
				<option value="12">Desember</option>
			<br>
			<input type="submit" value="print">
		</form>



<hr>


filter by bulan
<form action ="<php echo base_url(); ?> transaksi/filter"
method="POST" target ='blank'>

<input type="hidden" name="nilaifilter" value="3">

			pilih tahun  <br>
			<select name ="tahun2" required="">

			<php foreach ($tahun as $row): ?>
			
				<option value ="<php echo $row->tahun ?>"><php echo $row->tahun ?> </option>

				<php endforeach ?>
			</select>
			
			
			
			<input type="submit" value="print">
		</form>




		cek 123 -->

				<!-- /.box-header -->

				
				<!-- filter -->
				<div class="box-body">
				<!-- <form action ="<?php echo base_url(); ?>transaksi/filter"
								method="POST" target ='blank'>

										<input type="hidden" name="nilaifilter" value="1">

											range tanggal
											<input type="date" name= "tanggalawal" required=""> sampai

											
											<input type="date" name= "tanggalakhir" required=""> 

											
											<input type="submit" value="print">
											
								</form> -->

								<form method="POST" action="" id="form_filter">
									<label>PILIH TANGGAL</label>
									<input type="hidden" name="nilaifilter" value="1">
									<input type="date" name="tanggalawal" value="<?php echo @$_POST['tanggalawal']?>">
									<input type="date" name="tanggalakhir" value="<?php echo @$_POST['tanggalakhir']?>">
									<input type="button" id="cari" class="btn btn-sm btn-primary" value="Cari">
									<input type="button" value="Print" id="print" class="btn btn-sm btn-primary">
								</form>
					<!-- end filter -->
                    <br/>
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
                                <!-- <th>Denda</th> -->
                                <th>Aksi</th>
                            </tr>
						</thead>

						
						<tbody>
						<?php 
						// NOTICE ME!!
							$no=1;
							if(isset($_POST['tanggalawal']) || isset($_POST['tanggalakhir'])){
								$tgl = $_POST['tanggalawal'];
								$tgl2 = $_POST['tanggalakhir'];
								$sql =$this->db->query("SELECT  * FROM tb_pinjam WHERE tgl_pinjam BETWEEN '$tgl' AND '$tgl2'");
							}else{
								$sql = $this->db->query("SELECT  * FROM tb_pinjam ORDER by id_pinjam desc");
							}

							foreach($sql->result_array() as $isi){
								$isifilteran = $isi;
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
                                <!-- <td>
									<php 
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
								</td> -->
								<td style="text-align:center;">
										<a href="<?= base_url('transaksi/detailpinjam/'.$isi['pinjam_id']);?>" 
											class="btn btn-primary btn-sm" title="detail pinjam">
											<i class="fa fa-eye"></i> Detail Pinjam</a>
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
<script>
	$(document).ready(function(){
		$('#print').click(function(e) {
			$("#form_filter").attr("action","<?php echo base_url(); ?>transaksi/filter");
			$("#form_filter").attr("target","_blank");
			$("#form_filter").submit();
		});
		$(document).on("click","#cari",function(){
			$("#form_filter").attr("action","");
			$("#form_filter").removeAttr("target");
			$("#form_filter").submit();
		});
	})

</script>
