<style>  

</style>
</br>
         <font face="Times new roma" > <center> DATA ANGGOTA</font>
         <font face="Times new roma" size="5"> <center> <b> PERPUSTAKAAN SMA PGRI TANJUNGPANDAN </b></font>
         <font face="Times new roma" size="4"> <center> Jl. Dr.soesilo, Paal satu, Tanjungpandan, Belitung, Kepuluan Bangka Belitung </font>
         </br>
         <br>
		 <!-- <form method="post" action="" name='value'>
			<label>PILIH LEVEL</label>
			<select name='value'>
                                    <option value = 'petugas'  >Petugas</option>
                                    <option value = 'anggota' >Anggota</option>
                                    <option value = 'kepala perpus' >kepala perpus</option>
                                    </select>
			<input type="submit" name="submit" value="submit">
			</form> -->
		 <br>

    <div class="panel-body">
    <div class="table-responsive">

    <table align="center" border="2" width="80%" class="table table-striped table-bordered table-hover">

<thead>
<tr>
                            <th><center><font size="4"><b>No</th>
                          <th><center><font size="4"><b>id.anggota</th>
                          <th><center><font size="4"><b>nama</th>
                          <th><center><font size="4"><b>level</th>
                          <th><center><font size="4"><b>alamat</th>
                          <!-- <th><center><font size="4"><b></th>
                          <th><center><font size="4"><b></th> -->
                        
</tr>
</thead>

	<tbody>

	<?php
				
 
  $koneksi     = mysqli_connect("localhost", "root", "", "perpustakaansmapi");
				// $sql = mysqli_query($koneksi,"SELECT distinct * FROM tb_user join tb_pinjam on tb_user.id_login = tb_pinjam.id_login join  tb_denda on tb_pinjam.pinjam_id = tb_denda.pinjam_id order by 'pinjam_id'");
               

				if(isset($_POST['submit']) && isset($_POST['value']))
				{
					$value = $_POST['value'];
					$sql = mysqli_query($koneksi,"SELECT * from tb_user where level = '$value' order by 'pinjam_id'");				}
				else
				{
					$sql = mysqli_query($koneksi,"SELECT * from tb_user order by 'pinjam_id'");
				}
				?>
<?php
  //mengambil data hasil query dalam bentuk array
  //while untuk perulangan selama data masih ada maka akan ditampilkan  
   $no=0;
  while ($b = mysqli_fetch_array($sql)) {
    //$no++;  //variabel no untuk penomoran data yang ditampilkan
    $no++;
			
	?>
	<tr>
	<td><center><font face="tahoma"><?php echo $no; ?></td>
  <td><center><font face="tahoma"><?php echo $b["id_anggota"]; ?></td>
  <td><center><font face="tahoma"><?php echo $b["nama"]; ?></td>
  <td><center><font face="tahoma"><?php echo $b["level"]; ?></td>
   <td><center><font face="tahoma"><?php echo $b["alamat"]; ?></td>

    
  
  
 
 

 
  

    
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