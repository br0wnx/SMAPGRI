<style>  

</style>
</br>
<font face="Times new roma" > <center>LAPORAN TRANSAKSI</font>
         <font face="Times new roma" size="5"> <center> <b> PERPUSTAKAAN SMA PGRI Tanjungpandan </b></font>
         </br>
         <br>
		 <form method="post" action="">
			<label>PILIH TANGGAL</label>
			<input type="date" name="tanggal">
			<input type="date" name="tanggal2"> 
			<input type="submit" name="submit" value="submit">
			</form>
		 <br>

    <div class="panel-body">
    <div class="table-responsive">

    <table align="center" border="1" width="100%" class="table table-striped table-bordered table-hover">

<thead>
	<?php
$koneksi     = mysqli_connect("localhost", "root", "", "perpustakaansmapi");
				// $sql = mysqli_query($koneksi,"SELECT distinct * FROM tb_user join tb_pinjam on tb_user.id_login = tb_pinjam.id_login join  tb_denda on tb_pinjam.pinjam_id = tb_denda.pinjam_id order by 'pinjam_id'");
                
				
				if(isset($_POST['tanggal']) || isset($_POST['tanggal2'])){
					$tgl = $_POST['tanggal'];
					$tgl2 = $_POST['tanggal2'];
					$sql = $koneksi->query("SELECT distinct tb_pinjam.pinjam_id, tb_user.nama, tb_pinjam.tgl_pinjam, tb_pinjam.tgl_kembali FROM tb_user join tb_pinjam on tb_user.id_login = tb_pinjam.id_login join  tb_denda on tb_pinjam.pinjam_id = tb_denda.pinjam_id WHERE tgl_pinjam BETWEEN '$tgl' AND '$tgl2' order by 'pinjam_id'");
				}else{
					$sql = $koneksi->query("SELECT distinct tb_pinjam.pinjam_id, tb_user.nama, tb_pinjam.tgl_pinjam, tb_pinjam.tgl_kembali FROM tb_user join tb_pinjam on tb_user.id_login = tb_pinjam.id_login join  tb_denda on tb_pinjam.pinjam_id = tb_denda.pinjam_id order by 'pinjam_id'");
				}
	?>
<tr>
                            <th><center><font size="4"><b>No</th>
                          <th><center><font size="4"><b>id pinjam</th>
                          <th><center><font size="4"><b>Nama</th>
                          <th><center><font size="4"><b>tanggal pinjam</th>
                          <th><center><font size="4"><b>tanggal dikembalikan</th>
                          <!-- <th><center><font size="4"><b></th>
                          <th><center><font size="4"><b></th> -->
                        
</tr>
</thead>

	<tbody>

	<?php
				
 
  
  //mengambil data hasil query dalam bentuk array
  //while untuk perulangan selama data masih ada maka akan ditampilkan  
   $no=0;
  while ($b = $sql->fetch_array()) {
    //$no++;  //variabel no untuk penomoran data yang ditampilkan
    $no++;
			
	?>
	<tr>
	<td><center><font face="tahoma"><?php echo $no; ?></td>
  <td><center><font face="tahoma"><?php echo $b["pinjam_id"]; ?></td>
  <td><center><font face="tahoma"><?php echo $b["nama"]; ?></td>
  <td><center><font face="tahoma"><?php echo $b["tgl_pinjam"]; ?></td>
   <td><center><font face="tahoma"><?php if($b["tgl_kembali"] == '0000-00-00')
												{
													echo '<p style="color:red;">belum dikembalikan</p>';
												}else{
													echo $b["tgl_kembali" ];
												} ?></td> 

    
  
  
 
 

 
  

    
  </tr>
	<?php

}

	?>
</tbody>
</table>

<table width="80%" align="center">
	<tr>
		<td>&nbsp;</td>
    	<td height="30">&nbsp;</td>
	</tr>
	<br><br>
	</br>
	<tr>
		<td width="78%">&nbsp;</td>
    	<td width="22%">Tanjungpandan, <?php
$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
echo date("j")." ".$bulan[date("n")]." ".date("Y");
?>

       	
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
    	<td>Disetujui Oleh,</td>
  	</tr>
  	<tr>
		<td>&nbsp;</td>
    	<td>Kepala Sekolah,</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
    	<td height="50">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
    	<td>kepsek</td>
	</tr>
</table>
</div>
</div>
</div>
</div>

<script>
window.print();
</script>