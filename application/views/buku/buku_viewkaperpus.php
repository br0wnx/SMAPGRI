<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> <b>
      <i class="fa fa-book"> </i>  <?= $title_web;?>
    </b></h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
    </ol>
  </section>
  <section class="content"> 
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">

                <!-- cetak laporan buku -->
                
                <div class="box-header with-border">
                    <a href="cetak_buku" target=blank"><button class="btn btn-primary"><i class="fa fa-print"> </i> cetak</button></a>
                </div>
               

				<!-- /.box-header -->
				<div class="box-body">
                    <br/>
					<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sampul</th>
                                <!-- <th>no buku</th> -->
                                <!-- <th>ISBN</th> -->
                                <th>Title</th>
                                <th>Kategori</>
                                <!-- <th>Penerbit</th> -->
                                <!-- <th>sumber buku</th> -->
                                <th>jenis buku</th>
                                <th>Tahun Buku</th>
                                <!-- <th>Stok Buku</th> -->
                                <!-- <th>Dipinjam</th> -->
                                <!-- <th>Tanggal Masuk</th> -->
                                <th>Jumlah Buku</th>
                                <!-- <th>status</th> -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>


                        
                        <?php $no=1;foreach($bukubyjudul->result_array() as $isi){?>
                        
  
                      
                        
                            <tr>
                                <td><?= $no;?></td>
                                <!-- sampul -->
                                <td>
                                    <center>
                                        <?php if(!empty($isi['sampul'] !== "0")){?>
                                        <img src="<?php echo base_url();?>assets_style/image/buku/<?php echo $isi['sampul'];?>" alt="#" 
                                        class="img-responsive" style="height:auto;width:50px;"/>
                                        <?php }else{?>
                                            <!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
											<i class="fa fa-book fa-3x" style="color:#333;"></i> <br/><br/>
											Tidak Ada Sampul
                                        <?php }?>
                                    </center>
                                </td>
                                <!-- end sampul -->
                                <!-- <td><?= $isi['isbn'];?></td> -->
                                <!-- <td><= $isi['id_buku'];?></td> -->
                                <td><b><?= $isi['title'];?></b></td>
                    <!-- NOTICE ME -->
                                <!-- <td><= $isi['nama_penerbit'];?></td> -->
                                <!-- <td><= $isi['sumber_buku'];?></td> -->
                                <?php
                                $idkategori = $isi['id_kategori'];
                                $kategori = $this->db->query("SELECT nama_kategori from tb_kategori where id_kategori = '$idkategori'")->row();
                                ?>
                                <td><?= $kategori->nama_kategori;?></td>
                                <td><?= $isi['jenis_buku'];?></td>
                                <td><?= $isi['thn_buku'];?></td>
                                <!-- <td><= $isi['jml'];?></td> -->
								<!-- <td>
									<php
										$id = $isi['noinduk_buku'];
										$dd = $this->db->query("SELECT * FROM tb_pinjam WHERE noinduk_buku= '$id' AND status = 'Dipinjam'");
										if($dd->num_rows() > 0 )
										{
											echo $dd->num_rows();
										}else{
											echo '0';
										}
									?>
								</td> --> 
                                <!-- <td><= $isi['tgl_masuk'];?></td> -->
                                <?php $btitle = $isi['title'];
                                $jumlah =   $this->db->query("SELECT title FROM tb_buku where title = '$btitle' ") -> num_rows();
                                ?>
                                <td><?=$jumlah?></td>
                    <!-- untuk status buku  -->
                                <!-- <td><= $isi['status_buku'];?></td> -->
									<td <?php if($this->session->userdata('level') == 'Petugas'){?>style="width:17%;"<?php }?>>
								
									<?php if($this->session->userdata('level') == 'Petugas'){?>
									<a href="<?= base_url('data/bukuedit/'.$isi['id_buku']);?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
									
                                    <a href="<?= base_url('data/bukudetail/'.$isi['id_buku']);?>">
									<button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button></a>
                                    
                                    <a href="<?= base_url('data/prosesbuku?id_buku='.$isi['id_buku']);?>" onclick="return confirm('Anda yakin Buku ini akan dihapus ?');">
									<button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

                                    <!-- hilang -->
                                    <!-- <a href="<= base_url('data/prosesbuku?id_buku='.$isi['id_buku']);?>" onclick="return confirm('Anda yakin Buku ini akan dihapus ?');">
									<button class="btn btn-warning"><i class="fa fa-">hilang</i></button></a>
 -->

									<?php }else{?>
										<a href="<?= base_url('data/bukudetail/'.$isi['id_buku']);?>">
										<button class="btn btn-primary"><i class="fa fa-sign-in"></i> Detail</button></a>
									<?php }?>
                                </td>
                            </tr>
                        <?php $no++;}?>
                        </tbody>
                    </table>
                            <?php if($this->session->userdata('level') == 'kepala perpus'){?>
                                <div class="box-header with-border">
                                    <a href="user/tambah"><button class="btn btn-primary"><i class="fa fa-print"> </i> cetak</button></a>
                                </div>
                            <?php }?>
			    </div>
			    </div>
	        </div>
    	</div>
    </div>
</section>
</div>
