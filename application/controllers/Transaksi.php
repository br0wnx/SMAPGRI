<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
		$this->data['CI'] =& get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		$this->load->library(array('cart'));
		if($this->session->userdata('masuk_sistem_rekam') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
	 }
	 
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{	
		$this->data['title_web'] = 'Data Pinjam Buku ';
		$this->data['idbo'] = $this->session->userdata('ses_id');
		
		
		if($this->session->userdata('level') == 'Anggota'){
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `id_login`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam WHERE status = 'Dipinjam' 
				AND id_login = ? ORDER BY pinjam_id DESC", 
				array($this->session->userdata('id_login')));

		
		}else if($this->session->userdata('level') == 'kepala perpus'){
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `id_login`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam  ORDER BY pinjam_id DESC");

		}else{
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `id_login`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam WHERE status = 'Dipinjam' ORDER BY pinjam_id DESC");
		}
		
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/pinjam_view',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	
	public function transaksiview_kaperpus()
	{	
		$this->data['title_web'] = 'Data Pinjam Buku ';
		$this->data['idbo'] = $this->session->userdata('ses_id');	
		$this->data['tahun'] = $this->M_Admin->gettahun();		
		
	
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `id_login`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam  ORDER BY pinjam_id DESC");

		
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/transaksiview_kaperpus',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	


	// fungsi cetak filter dika

	public function filter(){
		$tanggalawal = $this -> input -> post('tanggalawal');
		$tanggalakhir = $this -> input -> post('tanggalakhir');
		$tahun1 = $this -> input -> post('tahun1');
		$bulanawal = $this -> input -> post('bulanawal');
		$bulanakhir = $this -> input -> post('bulanakhir');
		$tahun2 = $this -> input -> post('tahun2');
		$nilaifilter = $this -> input -> post('nilaifilter');

		// logikanich

		if ($nilaifilter == 1){
			$data['title'] = "laporan berdasarkan tanggal";
			$data['datafilter'] = $this -> M_Admin -> filterbytanggal($tanggalawal,$tanggalakhir);
			$this->load ->view('laporan/print_transaksifilter', $data);


		}elseif ($nilaifilter == 2){
			$data['title']= "laporan transaksi by bulan";
			$data['datafilter']= $this->M_Admin->filterbybulan($tahun1, $bulanawal,$bulanakhir);
			$this->load ->view('laporan/print_transaksifilter', $data);


		}elseif ($nilaifilter == 3){
			$data['title']= "laporan transaksi by tahun";
			$data['datafilter']= $this->M_Admin->filterbytahun($tahun2);
			$this->load ->view('laporan/print_transaksifilter', $data);

		}

	}


	public function filtertampil(){
		$tanggalawal = $this -> input -> post('tanggalawal');
		$tanggalakhir = $this -> input -> post('tanggalakhir');
		$tahun1 = $this -> input -> post('tahun1');
		$bulanawal = $this -> input -> post('bulanawal');
		$bulanakhir = $this -> input -> post('bulanakhir');
		$tahun2 = $this -> input -> post('tahun2');
		$nilaifilter = $this -> input -> post('nilaifilter');

		// logikanich

		if ($nilaifilter == 1){
			$data['title'] = "laporan berdasarkan tanggal";
			$data['datafilter'] = $this -> M_Admin -> filterbytanggal($tanggalawal,$tanggalakhir);
			$this->load ->view('laporan/print_transaksifilter', $data);


		}elseif ($nilaifilter == 2){
			$data['title']= "laporan transaksi by bulan";
			$data['datafilter']= $this->M_Admin->filterbybulan($tahun1, $bulanawal,$bulanakhir);
			$this->load ->view('laporan/print_transaksifilter', $data);


		}elseif ($nilaifilter == 3){
			$data['title']= "laporan transaksi by tahun";
			$data['datafilter']= $this->M_Admin->filterbytahun($tahun2);
			$this->load ->view('laporan/print_transaksifilter', $data);

		}

	}



	// end fungsi cetak filter dika

	public function kembali()
	{	
		$this->data['title_web'] = 'Data Pengembalian Buku ';
		$this->data['idbo'] = $this->session->userdata('ses_id');

		if($this->session->userdata('level') == 'Anggota'){
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `id_login`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam WHERE id_login = ? AND status = 'Di Kembalikan'
				ORDER BY id_pinjam DESC",array($this->session->userdata('id_login')));
		}else{
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `id_login`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam WHERE status = 'Di Kembalikan'   ORDER BY id_pinjam DESC");
		}
		
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('kembali/home',$this->data);
		$this->load->view('footer_view',$this->data);
	}

 
	public function pinjam()
	{	

		$this->data['nop'] = $this->M_Admin->buat_kode('tb_pinjam','PJ','id_pinjam','ORDER BY id_pinjam DESC LIMIT 1'); 
		$this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['user'] = $this->M_Admin->get_table('tb_user');


		$sub = $this->db
		->from("tb_pinjam")
		->where("status","Dipinjam")
		->get_compiled_select();
		$this->data['user'] = $this->db
		->select("tb_user.*,COUNT(id_pinjam) as jumlah_pinjam")
		->from("($sub) as a")
		->join("tb_user","tb_user.id_login=a.id_login","RIGHT")
		->group_by("tb_user.id_login")
		->get()->result_array();

		// echo "<pre>";
		// print_r($this->data['user']);
		// echo "</pre>";
		// die();
		// $this->data['userfree'] = $this->db->query("SELECT distinct id_login from tb_pinjam where status != 'Dipinjam' and id_login != (SELECT id_login from tb_pinjam where status = 'Dipinjam')")->result_array();
		$this->data['buku'] =  $this->db->query("SELECT * FROM tb_buku where status_buku ='tersedia' ORDER BY id_buku DESC");

		$this->data['title_web'] = 'Tambah Pinjam Buku ';

		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/tambah_view',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function detailpinjam()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');		
		$id = $this->uri->segment('3');
		if($this->session->userdata('level') == 'Anggota'){
			$count = $this->db->get_where('tb_pinjam',[
				'pinjam_id' => $id, 
				'id_login' => $this->session->userdata('id_login')
			])->num_rows();
			if($count > 0)
			{
				$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, 
				`id_login`, `status`, 
				`tgl_pinjam`, `lama_pinjam`, 
				`tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam WHERE pinjam_id = ? 
				AND id_login =?", 
				array($id,$this->session->userdata('id_login')))->row();
			}else{
				echo '<script>alert("DETAIL TIDAK DITEMUKAN");window.location="'.base_url('transaksi').'"</script>';
			}
		}else{
			$count = $this->M_Admin->CountTableId('tb_pinjam','pinjam_id',$id);
			if($count > 0)
			{
				$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, 
				`id_login`, `status`, 
				`tgl_pinjam`, `lama_pinjam`, 
				`tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam WHERE pinjam_id = '$id'")->row();
			}else{
				echo '<script>alert("DETAIL TIDAK DITEMUKAN");window.location="'.base_url('transaksi').'"</script>';
			}
		}
		$this->data['sidebar'] = 'kembali';
		$this->data['title_web'] = 'Detail Pinjam Buku ';
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/detail',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function kembalipinjam()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');		
		$id = $this->uri->segment('3');
		$count = $this->M_Admin->CountTableId('tb_pinjam','pinjam_id',$id);
		if($count > 0)
		{
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, 
			`id_login`, `status`, 
			`tgl_pinjam`, `lama_pinjam`, 
			`tgl_balik`, `tgl_kembali` 
			FROM tb_pinjam WHERE pinjam_id = '$id'")->row();
		}else{
			echo '<script>alert("BUKU HILANG :(");window.location="'.base_url('transaksi').'"</script>';
		}


		$this->data['title_web'] = 'Kembali Pinjam Buku ';
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/kembali',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function prosespinjam()
	{
		$post = $this->input->post();

		if(!empty($post['tambah']))
		{

			$tgl = $post['tgl'];
			$tgl2 = date('Y-m-d', strtotime('+'.$post['lama'].' days', strtotime($tgl)));

			$hasil_cart = array_values(unserialize($this->session->userdata('cart')));
			foreach($hasil_cart as $isi)
			{
				$data[] = array(
					'pinjam_id'=>htmlentities($post['nopinjam']), 
					'id_login'=>htmlentities($post['id_login']), 
					'id_buku' => $isi['id'], 
					'status' => 'Dipinjam', 
					'tgl_pinjam' => htmlentities($post['tgl']), 
					'lama_pinjam' => htmlentities($post['lama']), 
					'tgl_balik'  => $tgl2, 
					'tgl_kembali'  => '0',
				);
				$data2[] = array(
					'id_buku' => $isi['id'], 
					'status_buku' => 'Dipinjam', 
				);

				$data3[] = array(
					'id_login' => htmlentities($post['id_login']), 
					'status' => 'pinjambuku', 
				);
			}
			
			$total_array = count($data);
			if($total_array != 0)
			{
				$this->db->insert_batch('tb_pinjam',$data);
				$this->db->update_batch('tb_buku',$data2,'id_buku');
				$this->db->update_batch('tb_user',$data3,'id_login');
// NOTICE ME!!!!
			
				 // gives UPDATE mytable SET field = field+1 WHERE id = 2
						
				$cart = array_values(unserialize($this->session->userdata('cart')));
				for ($i = 0; $i < count($cart); $i ++){
				  unset($cart[$i]);
				  $this->session->unset_userdata($cart[$i]);
				  $this->session->unset_userdata('cart');
				}
			}
			

			

			
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi')); 
		}

		if($this->input->get('pinjam_id'))
		{
			$this->M_Admin->delete_table('tb_pinjam','pinjam_id',$this->input->get('pinjam_id'));
			$this->M_Admin->delete_table('tb_denda','pinjam_id',$this->input->get('pinjam_id'));

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p>  Hapus Transaksi Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi')); 
		}

// notice me

		if($this->input->get('kembali'))
		{
			$id = $this->input->get('kembali');
			$pinjam = $this->db->query("SELECT  * FROM tb_pinjam WHERE pinjam_id = '$id'");

			foreach($pinjam->result_array() as $isi){
				$pinjam_id = $isi['pinjam_id'];
				$denda = $this->db->query("SELECT * FROM tb_denda WHERE pinjam_id = '$pinjam_id'");
				$jml = $this->db->query("SELECT * FROM tb_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();			
				if($denda->num_rows() > 0){
					$s = $denda->row();
					echo $s->denda;
				}else{
					$date1 = date('Ymd');
					$date2 = preg_replace('/[^0-9]/','',$isi['tgl_balik']);
					$diff = $date2 - $date1;
					if($diff >= 0 )
					{
						$harga_denda = 0;
						$lama_waktu = 0;
					}else{
						$dd = $this->M_Admin->get_tableid_edit('tb_biaya_denda','stat','Aktif'); 
						$harga_denda = $jml*($dd->harga_denda*abs($diff));
						$lama_waktu = abs($diff);
					}
				}
				
			}

			$data = array(
				'status' => 'Di Kembalikan', 
				'tgl_kembali'  => date('Ymd'),
			);

			$data2 = array(
				'status_buku' => 'tersedia',
			);
			
			$data3 = array(
				'status' => 'bebaspinjam',
			);
			

			$total_array = count($data);
			if($total_array != 0 )
			{	 
				
				// $this->db->where('pinjam_id',$this->input->get('kembali'));
				// $this->db->update('tb_pinjam',$data);
				$this->db->query("UPDATE tb_pinjam set tb_pinjam.status='Di Kembalikan' ,tb_pinjam.tgl_kembali = curdate() where tb_pinjam.pinjam_id='$id' and tb_pinjam.status ='Dipinjam'");
				$this->db->query("UPDATE tb_buku join tb_pinjam on tb_buku.id_buku=tb_pinjam.id_buku set tb_buku.status_buku='tersedia' where tb_pinjam.pinjam_id='$id' and tb_buku.status_buku ='Dipinjam'");
				$this->db->query("UPDATE tb_user join tb_pinjam on tb_user.id_login=tb_pinjam.id_login set tb_user.status='bebaspinjam' where tb_pinjam.pinjam_id='$id' and tb_user.status ='pinjambuku'");
				// $this->db->update('tb_buku',$data2); 
				// $this->db->join('tb_pinjam','tb_buku.id_buku=tb_pinjam.id_buku');
				// // $this->db->where('pinjam_id',$id);
				// $this->db->where('pinjam_id',$this->input->get('kembali'));
				
				// $this->db->update('tb_buku',$data2);  
				// $this->db->get('tb_pinjam',$data);
				// $this->db->join('tb_pinjam', 'tb_buku.id_buku=tb_pinjam.id_buku'); 
				// // $this->db->set('status', 'Di Kembalikan');
				// // $this->db->set('tgl_kembali', date('Y-m-d')); 
				// // $this->db->set('status_buku', 'tersedia');
				// $this->db->where('pinjam_id',$this->input->get('kembali')); 

			}




			$data_denda = array(
				'pinjam_id' => $this->input->get('kembali'), 
				'denda' => $harga_denda, 
				'lama_waktu'=>$lama_waktu, 
				'tgl_denda'=> date('Y-m-d'),
			);
			$this->db->insert('tb_denda',$data_denda);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Pengembalian Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi')); 

		}

		if($this->input->get('bukuhilang'))
		{
			$id = $this->input->get('bukuhilang');

			$data = array(
				'status' => 'hilang',
			);

			$data2 = array(
				'status_buku' => 'hilang',
			);

			$total_array = count($data);
			if($total_array != 0)
			{
				$this->db->where('id_buku',$this->input->get('bukuhilang'));
				$this->db->update('tb_pinjam',$data);
			
				$this->db->where('id_buku',$this->input->get('bukuhilang'));
				$this->db->update('tb_buku',$data2);
			}
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
				<p> Proses buku hilang !</p>
				</div></div>');
				redirect(base_url('transaksi/kembalipinjam/'.$isi['pinjam_id'])); 
		}

	}

	public function denda()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');	

		$this->data['denda'] =  $this->db->query("SELECT * FROM tb_biaya_denda ORDER BY id_biaya_denda DESC");

		if(!empty($this->input->get('id'))){
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tb_biaya_denda','id_biaya_denda',$id);
			if($count > 0)
			{			
				$this->data['den'] = $this->db->query("SELECT *FROM tb_biaya_denda WHERE id_biaya_denda='$id'")->row();
			}else{
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="'.base_url('transaksi/denda').'"</script>';
			}
		}

		$this->data['title_web'] = ' Denda ';
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('denda/denda_view',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function dendaproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= htmlentities($this->input->post());
			$data = array(
				'harga_denda'=>htmlentities($post['harga']),
				'stat'=>'Tidak Aktif',
				'tgl_tetap' => date('Y-m-d')
			);

			$this->db->insert('tb_biaya_denda', $data);
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah  Harga Denda  Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi/denda')); 
		}

		if(!empty($this->input->post('edit')))
		{
			$dd = $this->M_Admin->get_tableid('tb_biaya_denda','stat','Aktif');
			foreach($dd as $isi)
			{
				$data1 = array(
					'stat'=>'Tidak Aktif',
				);
				$this->db->where('id_biaya_denda',$isi['id_biaya_denda']);
				$this->db->update('tb_biaya_denda', $data1);
			}

			$post= $this->input->post();
			$data = array(
				'harga_denda'=>htmlentities($post['harga']),
				'stat'=>$post['status'],
				'tgl_tetap' => date('Y-m-d')
			);

			$this->db->where('id_biaya_denda',$post['edit']);
			$this->db->update('tb_biaya_denda', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Harga Denda  Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi/denda')); 	
		}

		if(!empty($this->input->get('denda_id')))
		{
			$this->db->where('id_biaya_denda',$this->input->get('denda_id'));
			$this->db->delete('tb_biaya_denda');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Harga Denda Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi/denda')); 
		}
	}

// untuk mengatur batasan pinjam
	public function result()
    {	
		// $d1 = $this->db->query;
		// $d2 = $this->db->query("SELECT tb_user.id_login from tb_user join tb_pinjam on tb_user.id_login=tb_pinjam.id_login where tb_pinjam.status != 'Dipinjam' and tb_pinjam.id_login != (SELECT id_login from tb_pinjam where status = 'Dipinjam')")->result_array();
		// $d3 = $this->db->query("");
		$user = $this->M_Admin->get_tableid_edit('tb_user','id_login',$this->input->post('kode_anggota'));
		error_reporting(0);
		if($user->nama != null)
		{
			$jumlah_pinjam = $this->db
			->where("status","Dipinjam")
			->where("id_login",$this->input->post('kode_anggota'))
			->get("tb_pinjam")
			->num_rows();
			$sisa = 3-$jumlah_pinjam;
			echo '<table class="table table-striped">
						<tr>
							<td>Nama Anggota</td>
							<td>:</td>
							<td>'.$user->nama.'</td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<td>'.$user->telepon.'</td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td>:</td>
							<td>'.$user->email.'</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>'.$user->alamat.'</td>
						</tr>
						<tr>
							<td>Level</td>
							<td>:</td>
							<td>'.$user->level.'</td>
						</tr>
						<tr>
							<td>Sisa Kuota</td>
							<td>:</td>
							<td>'.$sisa.' Buku</td>
							<input type="hidden" id="sisa_kuota" value="'.$sisa.'">
						</tr>
					</table>';
		}else{
			echo 'Anggota Tidak Ditemukan !';
		}
        
	}


	public function buku()
    {	
		$id = $this->input->post('kode_buku');
		$row = $this->db->query("SELECT * FROM tb_buku WHERE id_buku ='$id'" );
		
		if($row->num_rows() > 0)
		{
			$tes = $row->row();
			$item = array(
				'id'      => $id,
				'qty'     => 1,
                'price'   => '1000',
				'name'    => $tes->title,
				'options' => array('isbn' => $tes->isbn,'thn' => $tes->thn_buku,'penerbit' => $tes->penerbit)
			);
			if(!$this->session->has_userdata('cart')) {
				$cart = array($item);
				$this->session->set_userdata('cart', serialize($cart));
			} else {
				$index = $this->exists($id);
				$cart = array_values(unserialize($this->session->userdata('cart')));
				if($index == -1) {
					array_push($cart, $item);
					$this->session->set_userdata('cart', serialize($cart));
				} else {
					$cart[$index]['quantity']++;
					$this->session->set_userdata('cart', serialize($cart));
				}
			}
		}else{

		}
        
	}

	public function buku_list()
	{
	?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<!-- <th>id buku</th> -->
					<th>Title</th>
					<!-- <th>Penerbit</th>
					<th>Tahunnn</th> -->
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php $no=1;
				foreach(array_values(unserialize($this->session->userdata('cart'))) as $items){?>
				<tr>
					<td><?= $no;?></td>
					<!-- <td><= $items['id_buku'];?></td> -->
					<td><?= $items['name'];?></td>
					<!-- <td><= $items['options']['penerbit'];?></td>
					<td><= $items['options']['thn'];?></td> -->
					<td style="width:17%">
					<a href="javascript:void(0)" id="delete_buku<?=$no;?>" data_<?=$no;?>="<?= $items['id'];?>" class="btn btn-danger btn-sm">
						<i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<script>
					$(document).ready(function(){
						$("#delete_buku<?=$no;?>").click(function (e) {
							$.ajax({
								type: "POST",
								url: "<?php echo base_url('transaksi/del_cart');?>",
								data:'kode_buku='+$(this).attr("data_<?=$no;?>"),
								beforeSend: function(){
								},
								success: function(html){
									$("#tampil").html(html);
								}
							});
						});
					});
				</script>
			<?php $no++;}?>
			</tbody>
		</table>
		<?php foreach(array_values(unserialize($this->session->userdata('cart'))) as $items){?>
			<input type="hidden" value="<?= $items['id'];?>" class="idbuku" name="idbuku[]">
		<?php }?>
		<div id="tampil"></div>
	<?php
	}

	public function del_cart()
    {
		error_reporting(0);
        $id = $this->input->post('noinduk_buku');
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
       // redirect('jual/tambah');
		echo '<script>$("#result_buku").load("'.base_url('transaksi/buku_list').'");</script>';
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['noinduk_buku'] == $id) {
                return $i;
            }
        }
        return -1;
    }

	public function laporan_pengembalian()
	{	
		$this->data['title_web'] = 'laporan pengembalian ';
		$this->data['idbo'] = $this->session->userdata('ses_id');

		if($this->session->userdata('level') == 'Kepala perpus'){
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `id_login`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam WHERE id_login = ? AND status = 'Di Kembalikan' 
				ORDER BY id_pinjam DESC",array($this->session->userdata('id_login')));
		}else{
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `id_login`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam WHERE status = 'Di Kembalikan' ORDER BY id_pinjam DESC");
		}
		
	
		$this->load->view('laporan/laporan_pengembalian',$this->data);
		
	}

 
	public function daftar_denda()
	{	
		$this->data['title_web'] = 'daftar denda ';
		$this->data['idbo'] = $this->session->userdata('ses_id');

		if($this->session->userdata('level') == 'Kepala perpus'){
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `id_login`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam WHERE id_login = ? AND status = 'Di Kembalikan' 
				ORDER BY id_pinjam DESC",array($this->session->userdata('id_login')));
		}else{
			$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `id_login`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tb_pinjam WHERE status = 'Di Kembalikan' ORDER BY id_pinjam DESC");
		}
		
	
		
		$this->data['title_web'] = 'Kembali Pinjam Buku ';
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('denda/daftar_denda',$this->data);
		$this->load->view('footer_view',$this->data);
	}


	public function cetak_transaksi() 
	
	{
		$this->load->view('laporan/cetaktransaksi');
	}
}
