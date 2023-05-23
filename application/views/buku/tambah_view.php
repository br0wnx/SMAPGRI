<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>
			<i class="fa fa-book""> </i> <b> <?= $title_web;?> </b>
    </h1>
    <ol class=" breadcrumb">
				<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a>
				</li>
				<li class="active"><i class="fa fa-plus"></i>&nbsp; <?= $title_web;?></li>
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
						<form action="<?php echo base_url('data/prosesbuku');?>" method="POST"
							enctype="multipart/form-data">
							<div class="row">
								<div class="col-sm-6">

									<!-- start form  -->

									<div class="form-group">
										<label>Judul Buku</label>
										<input type="text" class="form-control" name="title"
											placeholder="Contoh : Cara Cepat Belajar Pemrograman Web">
									</div>

									<!-- NOTICE ME                 -->
									<div class="form-group">
										<label>Penerbit</label>
										<select name="penerbit" class="form-control select2" required="required">
											<option disabled selected value> -- Pilih penerbit -- </option>
											<?php foreach($penerbit as $isi){?>
											<option value="<?= $isi['id_penerbit'];?>"><?= $isi['nama_penerbit'];?>
											</option>
											<?php }?>
										</select>
									</div>


									<div class="form-group">
										<label>Pengarang</label>
										<select name="pengarang" class="form-control select2" required="required">
											<option disabled selected value> -- Pilih pengarang -- </option>
											<?php foreach($pengarang as $isi){?>
											<option value="<?= $isi['id_pengarang'];?>"><?= $isi['nama_pengarang'];?>
											</option>
											<?php }?>
										</select>
									</div>
									<!-- END NOTICE ME -->

									<div class="form-group">
										<label>Kategori</label>
										<select class="form-control select2" required="required" name="kategori">
											<option disabled selected value> -- Pilih Kategori -- </option>
											<?php foreach($kats as $isi){?>
											<option value="<?= $isi['id_kategori'];?>"><?= $isi['nama_kategori'];?>
											</option>
											<?php }?>
										</select>
									</div>

									<div class="form-group">
										<label>jenis buku</label>
										<select class="form-control select2" required="required" name="jenis_buku">
											<option disabled selected value> -- JENIS BUKU -- </option>

											<option value="FIKSI">FIKSI</option>
											<option value="NON FIKSI">NON FIKSI</option>
											<option value="REFRENSI">REFRENSI</option>
										</select>
									</div>


									<div class="form-group">
										<label>Rak / Lokasi</label>
										<select name="rak" class="form-control select2" required="required">
											<option disabled selected value> -- Pilih Rak / Lokasi -- </option>
											<?php foreach($rakbuku as $isi){?>
											<option value="<?= $isi['id_rak'];?>"><?= $isi['nama_rak'];?></option>
											<?php }?>
										</select>
									</div>


									<div class="form-group">
										<label>ISBN (International Standard Book Number)</label>
										<input type="number" class="form-control" name="isbn"
											placeholder="Contoh ISBN : 9786028123358">
									</div>




								</div>

								<!-- pindah samping -->
								<div class="col-sm-6">

									<div class="form-group">
										<label>sumber buku</label>
										<select class="form-control select2" required="required" name="sumber_buku">
											<option disabled selected value> -- SUMBER BUKU -- </option>

											<option value="BOS">BOS</option>
											<option value="hibah">hibah</option>
											<option value="dropping">dropping</option>
										</select>
									</div>


									<div class="form-group">
										<label>Tahun Buku Terbit</label>
										<input type="number" class="form-control" name="thn"
											placeholder="Tahun Buku : 2019">
									</div>

									<div class="form-group">
										<label>Jumlah Buku</label>
										<input type="number" class="form-control" name="jml"
											placeholder="Jumlah buku : 12">
									</div>

									<div class="form-group">
										<label>Harga Buku (Rp.)</label>
										<input type="text" class="form-control" name="harga_buku" placeholder="50.000">
									</div>

									<div class="form-group">
										<label>Sampul <small style="color:green">(gambar) * opsional</small></label>
										<input type="file" accept="image/*" name="gambar">
									</div>

									<!-- tombol -->
									<div class="pull-right">
										<input type="hidden" name="tambah" value="tambah">
										<button type="submit" class="btn btn-primary btn-md">Submit</button>
						</form>
						<a href="<?= base_url('data');?>" class="btn btn-danger btn-md">Kembali</a>
					</div>

					<!-- inputan lampiran ditutup -->
					<!-- <div class="form-group">
                                    <label>Lampiran Buku <small style="color:green">(pdf) * opsional</small></label>
                                    <input type="file" accept="" name="lampiran">
                                </div> -->
					<!-- <div class="form-group">
                                    <label>Keterangan Lainnya</label>
                                    <textarea class="form-control" name="ket" id="summernotehal" style="height:120px"></textarea>
                                </div> -->
				</div>
			</div>

		</div>
</div>
</div>
</div>
</section>
</div>