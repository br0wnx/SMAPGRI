<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php if($this->session->userdata('level') == 'Anggota'){ redirect(base_url('transaksi'));}?>
<?php if($this->session->userdata('level') == 'kepala perpus'){ redirect(base_url('laporan'));}?>
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <b> 
        Dashboard
        </b> 
      </h1>
     
    </section>
    <!-- Main content -->
      <section class="content">
            <!-- Small boxes (Stat box) -->
        <div class="box box-primary">
          <div class="box-header with-border">

          
            <div class="row">
              <div class="col-sm-12">
                <div class="col-lg-3 col-6">
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?= $count_anggota;?></h3>

                      <p>Anggota</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-users"></i>
                    </div>
                    <a href="user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                   <!--small box-->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?= $count_buku;?></h3>

                      <p>Buku</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-book"></i>
                    </div>
                    <a href="data" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div> 

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?= $peminjaman;?></h3>

                      <p>Jumlah Transaksi</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-exchange"></i>
                    </div>
                    <a href="transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3><?= $count_kembali;?></h3>

                      <p>Jumlah Pengembalian</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-list"></i>
                    </div>
                    <a href="transaksi/kembali" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                

                </div>
            </div>

              </div>
            </div>

           
        </section>
    </div>
    <!-- /.content -->
