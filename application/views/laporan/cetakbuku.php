<style>  

</style>
</br>
<font face="Times new roma" > <center> LAPORAN BUKU </font> 
         <font face="Times new roma" size="5"> <center> <b> PERPUSTAKAAN SMA PGRI Tanjungpandan </b></font>
         <font face="Times new roma" size="4"> <center>  </font>
         </br>
         <br><br>

    <div class="panel-body">
    <div class="table-responsive">

    <table align="center" border="1" width="100%" class="table table-striped table-bordered table-hover">

<thead>
<tr>
                            <th><center><font size="4"><b>No</th>
                          <th><center><font size="4"><b>Title</th>
                          <th><center><font size="4"><b>Pengarang</th>
                          <th><center><font size="4"><b>Penerbit</th>
                          <th><center><font size="4"><b>Kategori</th>
						  <th><center><font size="4"><b>Jumlah</th>

                          <!-- <th><center><font size="4"><b></th>
                          <th><center><font size="4"><b></th> -->
                        
</tr>
</thead>

	<tbody>

	<?php
				
 
  $koneksi     = mysqli_connect("localhost", "root", "", "perpustakaansmapi");
				$sql = mysqli_query($koneksi,"SELECT distinct tb_buku.title,tb_pengarang.nama_pengarang,tb_penerbit.nama_penerbit,tb_kategori.nama_kategori FROM tb_buku LEFT JOIN tb_pengarang on tb_pengarang.id_pengarang = tb_buku.id_pengarang JOIN tb_penerbit on tb_penerbit.id_penerbit = tb_buku.id_penerbit join tb_kategori on tb_kategori.id_kategori = tb_buku.id_kategori  GROUP by id_buku");
				
  //mengambil data hasil query dalam bentuk array
  //while untuk perulangan selama data masih ada maka akan ditampilkan  
   $no=0;
  while ($b = mysqli_fetch_array($sql)) {
    //$no++;  //variabel no untuk penomoran data yang ditampilkan
    $no++;
			
	?>
	<?php
	$btitle = $b["title"];
	$countjumlahbuku  =$this->db->query("SELECT title FROM tb_buku where title = '$btitle' ")->num_rows();
	
	
	
	?>
	<tr>
	<td><center><font face="tahoma"><?php echo $no; ?></td>
  <td><center><font face="tahoma"><?php echo $b["title"]; ?></td>
  <td><center><font face="tahoma"><?php echo $b["nama_pengarang"]; ?></td>
  <td><center><font face="tahoma"><?php echo $b["nama_penerbit"]; ?></td>
   <td><center><font face="tahoma"><?php echo $b["nama_kategori"]; ?></td>
   <td><center><font face="tahoma"><?php echo $countjumlahbuku;?></td> 


    
  
  
 
 

 
  

    
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
    	<td width="22%">Tanjungpanda, <?php
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
    	<td>Drs. Akhmad Effendi</td>
	</tr>
</table>
</div>
</div>
</div>
</div>

<script>
window.print();

</script>