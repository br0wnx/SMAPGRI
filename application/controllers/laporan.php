<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->helper(array('form', 'url'));
     $this->load->model('M_Admin');
	 	 if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				 $url=base_url('login');
				 redirect($url);
		 }
	 }

	 public function laporanpengembalian()
	
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
				FROM tb_pinjam WHERE status = 'Di Kembalikan' ORDER BY id_pinjam DESC");
		}
		
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('kembali/home',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function cetak_laporan_pengembalian()
	
	{
		$this->load->view('laporan/cetak_laporan_pengembalian',$this->data);
	}

	public function laporan_peminjaman()
	
	{
		$this->load->view('laporan/laporan_peminjaman',$this->data);
	}


	public function cetak_buku()
	
	{
		$this->load->view('laporan/cetakbuku',$this->data);
	}

	public function cetak_transaksi()
	
	{
		$this->load->view('laporan/cetaktransaksi',$this->data);
	}

	public function cetak_user()
	
	{
		$this->load->view('laporan/cetakuser',$this->data);
	}

	public function cetak_denda()
	
	{
		$this->load->view('laporan/cetakdenda',$this->data);
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
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['title_web'] = 'Laporan ';
		$this->data['jumlahbuku']=$this->db->query("SELECT * FROM tb_buku")->num_rows();
		$this->data['userpetugas']=$this->db->query("SELECT * FROM tb_user where level ='petugas'")->num_rows();
		$this->data['useranggota']=$this->db->query("SELECT * FROM tb_user where level ='anggota'")->num_rows();
		$this->data['bukudipinjam']=$this->db->query("SELECT * FROM tb_buku where status_buku ='Dipinjam'")->num_rows();
		$this->data['peminjaman']=$this->db->query("SELECT DISTINCT pinjam_id from tb_pinjam where status ='Dipinjam'")->num_rows();
		$this->data['pengembalian']=$this->db->query("SELECT DISTINCT pinjam_id from tb_pinjam where status ='Di kembalikan'")->num_rows();
		$this->data['dendaaa']=$this->db->query("SELECT sum(denda) as denda from tb_denda")->row();;
		$this->data['count_kembali']=$this->db->query("SELECT * FROM tb_pinjam WHERE status = 'Di Kembalikan'")->num_rows();
		$this->load->view('header_view',$this->data); 
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('laporan/laporan_kaperpus_view',$this->data);
		$this->load->view('footer_view',$this->data);

	}

	public function dendaview()
	{	
		$this->data['title_web'] = 'Data Pinjam Buku ';
		$this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['transaksitelat']=$this->db->query("SELECT* from tb_denda 	where denda >'0' ")->num_rows();
		$this->data['dendaaa']=$this->db->query("SELECT sum(denda) as denda from tb_denda")->row();


		$this->data['denda'] = $this->db->query("SELECT `id_denda`, `pinjam_id`, 
				`denda`, `lama_waktu`, `tgl_denda`
				FROM tb_denda WHERE denda > '' ORDER BY id_denda DESC");
	

		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('denda/laporan_denda_view',$this->data);
		$this->load->view('footer_view',$this->data);
		
	}
}