<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<?php
            $d = $this->db->query("SELECT * FROM tb_user WHERE id_login='$idbo'")->row();
            if(!empty($d->foto)){
          ?>

				<img src="<?php echo base_url();?>assets_style/image/<?php echo $d->foto;?>" alt="#" class="img-circle"
					style="border:0px solid #fff;height:50px;width:50px;" />
				<?php }else{?>
				<!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
				<i class="fa fa-user fa-4x" style="color:#fff;"></i>
				<?php }?>
			</div>
			<div class="pull-left info" style="margin-top: 5px;">
				<p><?php echo $d->nama; ?></p>
				<!-- <p><= $d->level;?></p> -->
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>

		</div>

		<!-- NOTICE ME  menu petugas-->

		<ul class="sidebar-menu" data-widget="tree">
			<?php if($this->session->userdata('level') == 'Petugas'){?>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<li class="header">MAIN NAVIGATION</li>
			<li class="<?php if($this->uri->uri_string() == 'dashboard'){ echo 'active';}?>">
				<a href="<?php echo base_url('dashboard');?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li class="<?php if($this->uri->uri_string() == 'user'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'user/tambah'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'user/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
				<a href="<?php echo base_url('user');?>" class="cursor">
					<i class="fa fa-users"></i> <span>Data Pengguna</span>

				</a>
			</li>
			<li class="treeview <?php if($this->uri->uri_string() == 'data/kategori'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/rak'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukutambah'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukuedit/'.$this->uri->segment('3')){ echo 'active';}?>">


			<li
				class="<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukutambah'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukuedit/'.$this->uri->segment('3')){ echo 'active';}?>">
				<a href="<?php echo base_url("data");?>" class="cursor">
					<span class="fa fa-book"></span> Data Buku

				</a>
			</li>

			<li
				class="<?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'transaksi/pinjam'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'transaksi/kembalipinjam/'.$this->uri->segment('3')){ echo 'active';}?>">
				<a href="<?php echo base_url("transaksi");?>" class="cursor">
					<span class="fa fa-exchange"></span> Transaksi

				</a>
			</li>
			<!-- tutup dulu -->
			<!-- <li class="php if($this->uri->uri_string() == 'transaksi/kembali'){ echo 'active';}?>">
                        <a href="php echo base_url("transaksi/kembali");?>" class="cursor">
                            <span class="fa fa-download"></span> Pengembalian
                        </a>
                    </li>  -->

			<li class="<?php if($this->uri->uri_string() == 'transaksi/denda'){ echo 'active';}?>">
				<a href="<?php echo base_url("transaksi/denda");?>" class="cursor">
					<i class="fa fa-money"></i> <span>Denda</span>

				</a>
			</li>

			</span>
			</a>
			<ul class="treeview-menu">


			</ul>
			</li>
			<li
				class="treeview 
                <?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/kembali'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/pinjam'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/detailpinjam/'.$this->uri->segment('3')){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/kembalipinjam/'.$this->uri->segment('3')){ echo 'active';}?>">


		</ul>
		</li>
		<?php }?>

		<!-- NOTICE ME menu anggota            -->

		<?php if($this->session->userdata('level') == 'Anggota'){?>
		<li class="<?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>">
			<a href="<?php echo base_url("transaksi");?>" class="cursor">
				<i class="fa fa-exchange"></i> <span>Transaksi </span>
			</a>
		</li>
		<!-- <li class="<php if($this->uri->uri_string() == 'transaksi/kembali'){ echo 'active';}?>">
					<a href="<php echo base_url("transaksi/kembali");?>" class="cursor">
						<i class="fa fa-upload"></i> <span>Data Pengambilan</span>
					</a>
				</li> -->
		<li class="<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>">
			<a href="<?php echo base_url("data");?>" class="cursor">
				<i class="fa fa-search"></i> <span>Cari Buku</span>
			</a>
			<!-- </li>
				<li class="<php if($this->uri->uri_string() == 'user/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
					<a href="<php echo base_url('user/edit/'.$this->session->userdata('ses_id'));?>" class="cursor">
						<i class="fa fa-user"></i>  <span>Data Anggota</span>
					</a>
				</li> -->
			<!-- <li class="">
					<a href="<php echo base_url('user/detail/'.$this->session->userdata('ses_id'));?>" target="_blank" class="cursor">
						<i class="fa fa-print"></i> <span>Cetak kartu Anggota</span>
					</a>
				</li> -->
			<?php }?>

			<!-- notice me untuk menu kepala perpus -->

			<?php if($this->session->userdata('level') == 'kepala perpus'){?>
			<!-- <li class="<?php if($this->uri->uri_string() == 'dashboard'){ echo 'active';}?>">
                <a href="<?php echo base_url('dashboard');?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
                
            </li>
             <li class="header">MAIN NAVIGATION</li>
            
				<li class="?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>">
					<a href="?php echo base_url("transaksi");?>" class="cursor">
						<i class="fa fa-upload"></i> <span>Data Peminjaman </span>
					</a>
				</li>
				<li class="?php if($this->uri->uri_string() == 'transaksi/kembali'){ echo 'active';}?>">
					<a href="?php echo base_url("transaksi/kembali");?>" class="cursor">
						<i class="fa fa-upload"></i> <span>Data Pengambilan</span>
					</a>
				</li>
                <li class="?php if($this->uri->uri_string() == 'transaksi/daftar_denda'){ echo 'active';}?>">
					<a href="?php echo base_url("transaksi/daftar_denda");?>" class="cursor">
						<i class="fa fa-money"></i> <span>daftar denda</span>
					</a>
				</li>
				<li class="?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
				?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>">
					<a href="?php echo base_url("data");?>" class="cursor">
						<i class="fa fa-search"></i>  <span>Cari Buku</span>
					</a>
				</li>
				<li class="?php if($this->uri->uri_string() == 'user/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
					<a href="?php echo base_url('user/edit/'.$this->session->userdata('ses_id'));?>" class="cursor">
						<i class="fa fa-user"></i>  <span>Data Anggota</span>
					</a>
				</li>
				<li class="">
					<a href="?php echo base_url('user/detail/'.$this->session->userdata('ses_id'));?>" target="_blank" class="cursor">
						<i class="fa fa-print"></i> <span>Cetak kartu Anggota</span>
					</a>
				</li> -->

		<li class="header">MAIN NAVIGATION</li>
		<li class="<?php if($this->uri->uri_string() == 'laporan'){ echo 'active';}?>">
			<a href="<?php echo base_url('laporan');?>">
				<i class="fa fa-dashboard"></i> <span>Dashboard</span>
			</a>
		</li>
		<li class="header">DETAIL LAPORAN</li>




		<li class="<?php if($this->uri->uri_string() == 'data/indexbukukaperpus'){ echo 'active';}?>">
			<a href="<?php echo base_url('data/indexbukukaperpus');?>">
				<i class="fa fa-book"></i> <span>Laporan Buku</span>
			</a>
		<li class="<?php if($this->uri->uri_string() == 'transaksi/transaksiview_kaperpus'){ echo 'active';}?>">
			<a href="<?php echo base_url('transaksi/transaksiview_kaperpus');?>">
				<i class="fa fa-exchange"></i> <span>Laporan Transaksi</span>
			</a>
		<li class="<?php if($this->uri->uri_string() == 'user'){ echo 'active';}?>">
			<a href="<?php echo base_url('user');?>">
				<i class="fa fa-users"></i> <span>Laporan Pengguna</span>
			</a>
		<li class="<?php if($this->uri->uri_string() == 'laporan/dendaview'){ echo 'active';}?>">
			<a href="<?php echo base_url('laporan/dendaview');?>">
				<i class="fa fa-money"></i> <span>Laporan Denda</span>
			</a>

			<?php }?>


			</ul>
			<div class="clearfix"></div>
			<br />
			<br />
	</section>
	<!-- /.sidebar -->
</aside>
