<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
    <b> Transaksi Pinjam </b> 
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-plus"></i>&nbsp;  <?= $title_web;?></li>
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
                    <form  id="form_pinjam" action="<?php echo base_url('transaksi/prosespinjam');?>" method="POST" enctype="multipart/form-data">
						
						<div class="row">
							<div class="col-sm-5">
								<table class="table table-striped">
									

									<div class="form-group">
                                    <label>No Peminjaman</label>
									<input type="text" name="nopinjam" value="<?= $nop;?>" readonly class="form-control">
                            		</div>

									<div class="form-group">
                                    <label>Tgl Peminjaman</label>
									<input type="date" value="<?= date('Y-m-d');?>" name="tgl" readonly class="form-control">
                            		</div>

									<div class="form-group">
                                    <label>Lama peminjaman</label>
									<input type="number" readonly required placeholder="Lama Pinjam Max : 10 hari" name="lama" value="10" class="form-control"> 
                            		</div>

									<div class="form-group">
                                    <label>Pilih Peminjam</label>
									<div class="input-group">
										<input type="text" class="form-control" required autocomplete="off" name="id_login" id="search-box" placeholder="" type="text" value="">
											<span class="input-group-btn">
													<a data-toggle="modal" data-target="#TableAnggota" class="btn btn-primary"><i class="fa fa-search"></i></a>
											</span>
									</div> 
									</div>  
										
									<div class="form-group">
                                    <label>Biodata</label>
									<td>
											<div id="result_tunggu"> <p style="color:red">* Belum Ada Hasil</p></div>
											<div id="result"></div>
										</td>
                            		</div>
								</table>
							</div>
							
							<div class="col-sm-7">
								<table class="table table-striped">
									

									<div class="form-group">
                                    <label>Pilih Buku</label>
									<div class="input-group">
												<input type="text" class="form-control" autocomplete="off" name="id_buku" id="buku-search" placeholder="" type="text" value="">
												<span class="input-group-btn">
													<a data-toggle="modal" data-target="#TableBuku" class="btn btn-primary"><i class="fa fa-search"></i></a>
												</span>
											</div>
                            		</div>

									<div class="form-group">
                                    <label>Data Buku</label>
									
											<div id="result_tunggu_buku"> <p style="color:red">* Belum Ada Hasil</p></div>
											<div id="result_buku"></div>
										
                            		</div>
									<br>
									<br>

									<!-- tombol -->
									<div class="pull-left">
									<input type="hidden" name="tambah" value="tambah">
                            		<button type="button" id="save" class="btn btn-primary btn-md">Submit</button> 
                   			 		</form>
									<a href="<?= base_url('transaksi');?>" class="btn btn-danger btn-md">Kembali</a>
									</div>
								
								</table>
							</div>
						</div>
                        
		        </div>
	        </div>
	    </div>
    </div>
</section>


</div>
<!--modal import -->
<div class="modal fade" id="TableBuku">
<div class="modal-dialog" style="width:80%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Buku</h4>
</div>
<div id="modal_body" class="modal-body fileSelection1">
<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>id buku</th>
				<th>Title</th>
				<!-- <th>Penerbit</th> -->
				<!-- <th>sumber_buku</th>
				<th>jenis_buku</th> -->
				<th>Tahun Buku</th>
				<!-- <th>Stok Buku</th> -->
				<th>Tanggal Masuk</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $no=1;foreach($buku->result_array() as $isi){?>
			<tr>
				<td><?= $no;?></td>
				<td><?= $isi['id_buku'];?></td>
				<td><?= $isi['title'];?></td>
				<!-- <td><= $isi['penerbit'];?></td> -->
				<td><?= $isi['thn_buku'];?></td>
				<!-- <td><= $isi['jml'];?></td> -->
				<td><?= $isi['tgl_masuk'];?></td>
				
				<td style="width:17%">
				<input type="checkbox" id="Select_File2" data_id="<?= $isi['id_buku'];?>" >
					</i> Pilih
				</input>
				<a href="<?= base_url('data/bukudetail/'.$isi['id_buku']);?>" target="_blank">
					<button class="btn btn-success"><i class="fa fa-sign-in"></i> Detail</button></a>
				</td>
			</tr> 
			
		<?php $no++;}?>
		<!-- <button id="tombol" >Simpan</button> -->
		</tbody>
	</table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
	// $("#tombol").click(function(){
		
		
	$(".fileSelection1 #Select_File2 ").click(function () {
		document.getElementsByName('id_buku')[0].value = $(this).attr("data_id");
		$('#TableBuku').modal('hide');
		var maxpil = 3; //mengatur jumlah maksimal buku pinjam
		var jml = $(".fileSelection1 #Select_File2:checked").length + 1;
		if(jml > maxpil){
					
					$(".fileSelection1 #Select_File2").attr('disabled', true);
			
			}

		$.ajax({
			type: "POST",
			url: "<?php echo base_url('transaksi/buku');?>",
			data:'kode_buku='+$(this).attr("data_id"),
			
			beforeSend: function(){
				$("#result_buku").html("");
				$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				
			},
			success: function(html){
				
				$("#result_buku").load("<?= base_url('transaksi/buku_list');?>");
				$("#result_tunggu_buku").html('');
				
			},
			
			
		});
		
		
		
	}

	
	
	);
	
	</script>
	  
	<script>
	// AJAX call for autocomplete 
	$(document).ready(function(){
		$("#buku-search").keyup(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('transaksi/buku');?>",
				data:'kode_buku='+$(this).val(),
				beforeSend: function(){
					$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html){
					$("#result_buku").load("<?= base_url('transaksi/buku_list');?>");
					$("#result_tunggu_buku").html('');
				}
			});
		});
	});
	</script>
 <!--modal import -->
 <div class="modal fade" id="TableAnggota">
	<div class="modal-dialog " style="width:60%;" >
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title"><center> <b> Pilih Anggota  </b></center> </h4>
	<h4 style="background:yellow" > <center> <b> Jika anggota tidak tersedia, peminjaman buku telah mencapai batas kuota 3 buku dan belum dikembalikan </b> </center> </h4>
	</div>
	<div id="modal_body" class="modal-body fileSelection1">
	<table id="example3" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>Nama</th>
				<th>Jenkel</th>
				<th>Telepon</th>
				<th>Sisa Kuota</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>

		<?php $no=1;
		$sql = $this->db->query( "SELECT distinct id_login from tb_user where status != 'bebaspinjam' ");
		foreach($user as $isi){
			if($isi['level'] == 'Anggota' && $isi['jumlah_pinjam'] < 3){?>
			<tr>
				<td><?= $no;?></td>
				<td><?= $isi['id_login'];?></td> 
				<td><?= $isi['nama'];?></td>
				<td><?= $isi['jenkel'];?></td>
				<td><?= $isi['telepon'];?></td>
				<td><?= 3-$isi['jumlah_pinjam']." Buku";?></td>
			
				<td style="width:20%;"><button class="btn btn-primary" id="Select_File1" data_id="<?= $isi['id_login'];?>"><i class="fa fa-check"> </i> Pilih</button></td>
			
			
			</tr>
		<?php }$no++;}?>
			

		</tbody>
		</table>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
	</div>
	</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<script>
	$(".fileSelection1 #Select_File1").click(function (e) {
		document.getElementsByName('id_login')[0].value = $(this).attr("data_id");
		$('#TableAnggota').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('transaksi/result');?>",
			data:'kode_anggota='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result").html("");
				$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result").html(html);
				$("#result_tunggu").html('');
			}
		});
	});
	</script>
	  
	<script>
	// AJAX call for autocomplete 
	$(document).ready(function(){
		$("#search-box").keyup(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('transaksi/result');?>",
				data:'kode_anggota='+$(this).val(),
				beforeSend: function(){
					$("#result").html("");
					$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html){
					$("#result").html(html);
					$("#result_tunggu").html('');
				}
			});
		});
	});
	</script>

<script>
	$(document).ready(function(){
		$(document).on("click","#save",function(){
			// $("#form_pinjam").submit();
			$sisa_kuota = $('#sisa_kuota').val();
			$jumlah_pinjam = $(".idbuku").length
			// alert($jumlah_pinjam);
			if($jumlah_pinjam > $sisa_kuota){
				alert("Jumlah pinjam melebihi kuota tersisa");
			}else{
				$("#form_pinjam").submit();
			}
		})
		// $("#form_pinjam").on("submit",function(e){
		// 	e.preventDefault();
		// 	alert("lalalla");
		// })
	})

</script>