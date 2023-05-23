<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
echo date ('Y-m-d');

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-user"> </i>  <b> Tambah Pengguna </b>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah User</li>
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
                    <form action="<?php echo base_url('user/add');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">

                            <!-- notice me - untuk buat id anggota otomatis, disable edit -->

                            
                            <!-- end notice me - untuk buat id anggota otomatis, disable edit -->

                            <div class="form-group">
                                    <label>id anggota otomatis</label>
                                    <input type="text" class="form-control" name="id_anggota" value="<?= $id_anggota;?>" readonly required="required" placeholder="id otomatis">
                            </div>


                            <div class="form-group">
                                    <label>NIS/NIP</label>
                                    <input type="number" class="form-control" name="nisnip" required="required" placeholder="nisnip">
                                </div>
                                <div class="form-group">
                                    <label>Nama Pengguna</label>
                                    <input type="text" class="form-control" name="nama" required="required" placeholder="Nama Pengguna">
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="lahir" required="required" placeholder="Contoh : Bekasi">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" min="2011-1-1" max="2016-1-1" class="form-control" name="tgl_lahir" required="required" placeholder="Contoh : 1999-05-18"> </input>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="user" required="required" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="pass" required="required" placeholder="Password">
                                </div>
                                
                            </div>
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control" required="required">
                                    <option>Petugas</option>
                                    <option>Anggota</option>
                                    <option>kepala perpus</option> 
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <br/>
                                    <input type="radio" name="jenkel" value="Laki-Laki" required="required"> Laki-Laki
                                    <br/>
                                    <input type="radio" name="jenkel" value="Perempuan" required="required"> Perempuan
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input id="uintTextBox" class="form-control" name="telepon" required="required" placeholder="Contoh : 081234567353">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" class="form-control" name="email" required="required" placeholder="Contoh : gegenaldy22@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label>Pas Foto</label>
                                    <input type="file" accept="image/*" name="gambar" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" required="required"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                    </form>
                            <a href="<?= base_url('user');?>" class="btn btn-danger btn-md">Kembali</a>
                        </div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
