
<font face="Times new roma" > <center>LAPORAN TRANSAKSI</font>
         <font face="Times new roma" size="5"> <center> <b> PERPUSTAKAAN SMA PGRI Tanjungpandan</b></font>
         <br>

<br> 
<table align="center" border="1" width="100%" class="table table-striped table-bordered table-hover">
    <thead>
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
    <?php $no=1; foreach ($datafilter as $row): ?>
        <tr>
            

                <td> <?php echo $no++; ?> </td>
                <td> <?php echo $row -> pinjam_id ; ?> </td>
                <td> <?php echo $row -> nama ; ?> </td>
                <td> <?php echo $row -> tgl_pinjam ; ?> </td>
                <td> <?php echo $row -> tgl_kembali ; ?> </td>
            
                <?php endforeach ?>

        </tr>
    </tbody>

</table>
</body>


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


