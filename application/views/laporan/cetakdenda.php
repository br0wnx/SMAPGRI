<style>  

</style>
</br>
         <font face="Times new roma" > <center> LAPORAN DENDA </font> 
         <font face="Times new roma" size="5"> <center> <b> Perpustakaan SMA PGRI Tanjungpandan </b></font>
         </br>
         <br><br>

    <div class="panel-body">
    <div class="table-responsive">

    <table align="center" border="2" width="80%" class="table table-striped table-bordered table-hover">

<thead>
<tr>
                            <th><center><font size="4"><b>No</th>
                          <th><center><font size="4"><b>pinjam_id</th>
                          <th><center><font size="4"><b>nama peminjam</th>
                          <th><center><font size="4"><b>denda</th>
                          <th><center><font size="4"><b>lama telat</th>
                          <!-- <th><center><font size="4"><b></th>
                          <th><center><font size="4"><b></th> -->
                        
</tr>
</thead>

	<tbody>

	<?php
				
 
  $koneksi     = mysqli_connect("localhost", "root", "", "perpustakaansmapi");
				// $sql = mysqli_query($koneksi,"SELECT distinct * FROM tb_user join tb_pinjam on tb_user.id_login = tb_pinjam.id_login join  tb_denda on tb_pinjam.pinjam_id = tb_denda.pinjam_id order by 'pinjam_id'");
                $sql = mysqli_query($koneksi,"SELECT distinct tb_pinjam.pinjam_id , tb_user.nama, tb_denda.denda, tb_denda.lama_waktu from tb_denda join tb_pinjam on tb_pinjam.pinjam_id = tb_denda.pinjam_id join tb_user on tb_pinjam.id_login = tb_user.id_login where denda >'0' order by 'pinjam_id'");

  //mengambil data hasil query dalam bentuk array
  //while untuk perulangan selama data masih ada maka akan ditampilkan  
   $no=0;
  while ($b = mysqli_fetch_array($sql)) {
    //$no++;  //variabel no untuk penomoran data yang ditampilkan
    $no++;
			
	?>
	<tr>
	<td><center><font face="tahoma"><?php echo $no; ?></td>
  <td><center><font face="tahoma"><?php echo $b["pinjam_id"]; ?></td>
  <td><center><font face="tahoma"><?php echo $b["nama"]; ?></td>
  <td><center><font face="tahoma"><?php echo $b["denda"]; ?></td>
   <td><center><font face="tahoma"><?php echo $b["lama_waktu"]; ?></td>

    
  
  
 
 

 
  

    
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
    	<td>Kepsek</td>
	</tr>
</table>
</div>
</div>
</div>
</div>

<script>
window.print();
</script>