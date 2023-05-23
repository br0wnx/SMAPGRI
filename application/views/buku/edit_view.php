<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i> </i>  EDIT BUKU
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-edit"></i>&nbsp;  <?= $title_web;?></li>
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
                    <form action="<?php echo base_url('data/prosesbuku');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
								<div class="form-group">
									<label>Kategori</label>
									<select class="form-control select2" required="required"  name="kategori">
										<option disabled selected value> -- Pilih Kategori -- </option>
										<?php foreach($kats as $isi){?>
											<option value="<?= $isi['id_kategori'];?>" <?php if($isi['id_kategori'] == $buku->id_kategori){ echo 'selected';}?>><?= $isi['nama_kategori'];?></option>
										<?php }?>
									</select>
								</div>
                                <div class="form-group">
                                    <label>Rak / Lokasi</label>
                                    <select name="rak" class="form-control select2" required="required">
										<option disabled selected value> -- Pilih Rak / Lokasi -- </option>
										<?php foreach($rakbuku as $isi){?>
											<option value="<?= $isi['id_rak'];?>" <?php if($isi['id_rak'] == $buku->id_rak){ echo 'selected';}?>><?= $isi['nama_rak'];?></option>
										<?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text" class="form-control" value="<?= $buku->isbn;?>" name="isbn"  placeholder="Contoh ISBN : 978-602-8123-35-8">
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control" value="<?= $buku->title;?>" name="title" placeholder="Contoh : Cara Cepat Belajar Pemrograman Web">
                                </div>
                                <div class="form-group">
									<label>Pengarang</label>
									<select class="form-control select2" required="required"  name="pengarang">
										<option disabled selected value> -- Pilih Kategori -- </option>
										<?php foreach($pengarang as $isi){?>
											<option value="<?= $isi['id_pengarang'];?>" <?php if($isi['id_pengarang'] == $buku->id_pengarang){ echo 'selected';}?>><?= $isi['nama_pengarang'];?></option>
										<?php }?>
									</select>
								</div>
                                <div class="form-group">
									<label>Penerbit</label>
									<select class="form-control select2" required="required"  name="penerbit">
										<option disabled selected value> -- Pilih Penerbit -- </option>
										<?php foreach($penerbit as $isi){?>
											<option value="<?= $isi['id_penerbit'];?>" <?php if($isi['id_penerbit'] == $buku->id_penerbit){ echo 'selected';}?>><?= $isi['nama_penerbit'];?></option>
										<?php }?>
									</select>
								</div>
                                <div class="form-group">
                                    <label>sumber buku</label>
                                    <select class="form-control select2" required="required"  name="sumber_buku">
										<option disabled selected value> -- SUMBER BUKU -- </option>
										
											<option value="BOS">BOS</option>
                                            <option value="hibah">hibah</option>
                                            <option value="dropping">dropping</option>
										
									</select>
                                </div>
                                <div class="form-group">
                                    <label>jenis buku</label>
                                    <select class="form-control select2" required="required"  name="jenis_buku">
										<option disabled selected value> -- JENIS BUKU -- </option>
										
											<option value="FIKSI">FIKSI</option>
                                            <option value="NON FIKSI">NON FIKSI</option>
                                            <option value="REFRENSI">REFRENSI</option>
										
									</select>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Buku</label>
                                    <input type="number" class="form-control" value="<?= $buku->thn_buku;?>" name="thn" placeholder="Tahun Buku : 2019">
                                </div>
								
                            </div>
                            <div class="col-sm-6">
							
                            <div class="form-group">
                                    <label>Harga Buku (Rp.)</label>
                                    <input type="text" class="form-control" value="<?= $buku->harga_buku;?>" name="harga_buku" placeholder="Contoh : Cara Cepat Belajar Pemrograman Web">
                                </div>


								<!-- <div class="form-group">
                                    <label>Jumlah Buku</label>
                                    <input type="number" class="form-control" value="<?= $buku->jml;?>" name="jml" placeholder="Jumlah buku : 12">
								</div> -->
                                <div class="form-group">
								<label>Sampul <small style="color:green">(gambar) * opsional</small></label>
									<input type="file" accept="image/*" name="gambar">

									<?php if(!empty($buku->sampul !== "0")){?>
									<br/>
									<a href="<?= base_url('assets_style/image/buku/'.$buku->sampul);?>" target="_blank">
										<img src="<?= base_url('assets_style/image/buku/'.$buku->sampul);?>" style="width:70px;height:70px;" class="img-responsive">
									</a>
									<?php }else{ echo '<br/><p style="color:red">* Tidak ada Sampul</p>';}?>
								</div>
                                
                            </div>
                        </div>
                        <div class="pull-right">
							<input type="hidden" name="gmbr" value="<?= $buku->sampul;?>">
							<!-- <input type="hidden" name="lamp" value="<= $buku->lampiran;?>"> -->
							<input type="hidden" name="edit" value="<?= $buku->id_buku;?>">
                            <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                    </form>
                            <a href="<?= base_url('data');?>" class="btn btn-danger btn-md">Kembali</a>
                        </div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
