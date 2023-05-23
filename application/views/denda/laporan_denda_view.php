<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> <b>
      <i class="fa fa-money"> </i> denda
    </b></h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
    </ol>
  </section>
<section class="content">
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>


<div class="col-sm-6">
    <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Denda</span>
          <span class="info-box-number"> Rp. <?= $dendaaa->denda;?></span>
        </div>
 <!-- /.info-box-content -->
    </div><!-- /.info-box -->
</div>

<div class=" col-sm-6">
    <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-red"><i class="fa fa-calendar-times-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total transaksi telat</span>
          <span class="info-box-number"> <?= $transaksitelat;?></span>
        </div>
 <!-- /.info-box-content -->
    </div><!-- /.info-box -->
</div>









    
	<div class="row"> 
	    <div class="col-md-12">
	        <div class="box box-success">
                
			<!-- sesi action tombol atas khusus petugas -->
      <?php if($this->session->userdata('level') == 'kepala perpus'){?>
                <div class="box-header with-border">
                    <a href="cetak_denda" target=blank"><button class="btn btn-primary"><i class="fa fa-print"> </i> cetak</button></a>
                </div>
            <?php }?>


				<!-- end sesi petugas -->
				<!-- /.box-header -->
				<div class="box-body">
                    <br/>
					<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pinjam</th>
                                <!-- <th>ID denda</th> -->
                                <th>Nama peminjam</th>
                                <th>denda</th>
                                <th>lama telat</th>
                               
                            </tr>
						</thead>
						<tbody>
						<?php 
						// NOTICE ME!!
							$no=1;
							foreach($denda->result_array() as $isi){
									$id_denda = $isi['id_denda'];
									$ang = $this->db->query("SELECT * FROM tb_denda WHERE id_denda = '$id_denda'")->row();

									$pinjam_id = $isi['pinjam_id'];
                  $nama = $this->db->query("SELECT tb_user.nama FROM tb_user join tb_pinjam on tb_user.id_login = tb_pinjam.id_login join tb_denda on tb_pinjam.pinjam_id = tb_denda.pinjam_id WHERE tb_denda.pinjam_id = '$pinjam_id' ")->row() ;
									$denda = $this->db->query("SELECT * FROM tb_denda WHERE pinjam_id = '$pinjam_id'");
                  $total_denda = $denda->row();

                  // $id_login = $isi['id_login'];
									// $nama = $this->db->query("SELECT tb_user.nama FROM tb_user join tb_pinjam on tb_user.id_login = tb_pinjam.id_login join tb_denda on tb_pinjam.pinjam_id = tb_denda.pinjam_id WHERE tb_user.id_login = '$id_login'")->row();
                 

                 
                

									

                  // // sambungan untuk memanggil nams berdasarkan id_pinjam
                  // $id_login = $isi['id_login'];
									// $id_login = $this->db->query("SELECT * FROM tb_pinjam WHERE pinjam_id = '$pinjam_id'");
									// $total_denda = $denda->row();


						?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $isi['pinjam_id'];?></td>
                                <!-- <td><?= $isi['id_denda'];?></td> -->
                                <td><?= $nama->nama;?></td>
                                <td><?= $isi['denda'];?></td>
                                <td><?= $isi['lama_waktu'];?> hari</td>
                                
                                
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
