<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

    <!-- Content Header (Page header) --> 
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Laporan  <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">laporan</li>
      </ol>
    </section>
    <!-- Main content -->
      <section class="content">


            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-sm-12">
                

                

                
             
                <!-- <div class="col-lg-3 col-xs-6">
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3><= $count_kembali;?></h3>

                      <p>Di Kembalikan</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-list"></i>
                    </div>
                    <a href="transaksi/kembali" class="small-box-footer">cetak laporan <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div> -->

              </div>

  <section class="content">
  <div class="box box-success">
          <div class="box-header with-border">
      <div class="row"> 
        
        <div class="col-md-3 col-sm-6 col-xs-12">

          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>
            <div class="info-box-content">
              <span class="info-box-number">Buku</span>
              <span class="info-box-text">Jumlah buku : <?= $jumlahbuku;?></span>
              <span class="info-box-text">dipinjam : <?= $bukudipinjam;?></span>
               <a href="data/indexbukukaperpus" class="small-box-footer">detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-exchange"></i></span>
            <div class="info-box-content">
              <span class="info-box-number">Transaksi</span>
              <span class="info-box-text">Peminjaman : <?= $peminjaman;?> </span>
              <span class="info-box-text">Pengembalian : <?= $pengembalian;?> </span>
              <a href="transaksi/transaksiview_kaperpus" class="small-box-footer">detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
            <span class="info-box-number">Pengguna</span>
              <span class="info-box-text">Petugas : <?= $userpetugas;?> </span>
              <span class="info-box-text">Anggota : <?= $useranggota;?> </span>
              <a href="user" class="small-box-footer">detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">denda</span>
              <?php 
              
              ?>
              <span class="info-box-number"><?= $dendaaa->denda; ?></span>
              <span class="info-box-number"> -- </span>
              <a href="laporan/dendaview" class="small-box-footer">detail <i class="fa fa-arrow-circle-right"></i></a>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    
      </div>
      </div>
    
      </div>


      
      <!-- /.row -->

      <!-- =========================================================== -->

  <!-- BAR CHART -->
 


      

              
            </div>
            
        </section>
        
    </div>
    <!-- /.content -->
