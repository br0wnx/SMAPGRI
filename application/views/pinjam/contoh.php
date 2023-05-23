<script>
		$(document).ready(function(){
                 // paket sesuai yang diambil dari name pada input
			$("input[name='paket']").change(function() {
				// variable untuk jumlah limit sesuaikan saja dengan keinginan 
                             var maxpil = 2;
                               // variable untuk jumlah data yang dipilih atau di checklist 
				// jika melebihi dari variable limit maka akan diberikan warning
                              var jml = $("input[name='paket']:checked").length;
				if(jml > maxpil){
					$(this).prop("checked","");
				alert('Anda dapat memilih maksimal '+ maxpil +' Paket Kursus Supaya FOCUS!!');
			}
			});
		});
	</script>

<?php $idlogin = $isi['id_login']; ?>
				<?php $pinjam = $this->db->query("SELECT id_login from tb_pinjam where status = 'Dipinjam'"); ?>
				<?php if ($pinjam = $idlogin) { ?>
					<button class="btn btn-primary" readonly id="Select_File1" data_id="<?= $isi['id_login'];?>">
					<i class="fa fa-check"> </i> Pilih
					</button>
					<?php} else {?>
						<button class="btn btn-primary" id="Select_File1" data_id="<?= $isi['id_login'];?>">
					<i class="fa fa-check"> </i> Pilih
					</button>
					<?php}?>
				


                    $id_dipinjan = $this->db->query("SELECT id_login from tb_pinjam where status = 'Dipinjam'");
		$id_login = $this->db->query("SELECT id_login from tb_pinjam where status != 'Dipinjam' and id_login != '$id_dipinjam'");


        $id_login = $this->db->query("SELECT id_login  from tb_pinjam where status != 'Dipinjam' and id_login != (SELECT id_login FROM tb_pinjam WHERE status ='Dipinjam')");