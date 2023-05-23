<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
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

	public function index()
	
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['buku'] =  $this->db->query("SELECT * FROM tb_buku left join tb_penerbit on tb_buku.id_penerbit=tb_penerbit.id_penerbit  ORDER BY id_buku DESC");
        $this->data['bukulaporan'] =  $this->db->query("SELECT DISTINCT title, sampul, id_buku, jenis_buku, status_buku, tgl_masuk, id_pengarang, thn_buku, harga_buku, id_penerbit from tb_buku group BY title DESC");
		// $this->data['jumlahtitle'] =  $this->db->query("SELECT title FROM tb_buku GROUP BY title")->num_row();

		$this->data['title_web'] = 'Data Buku';
	
		// $this->data['jumlahbuku'] =  $this->db->query("SELECT * FROM tb_buku where title ='$title'")->num_rows();

        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('buku/buku_view',$this->data);
        $this->load->view('footer_view',$this->data);
		
	}


	// controler index view buku untuk user kepala sekolah

	public function indexbukukaperpus()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['bukubyjudul'] =  $this->db->query("SELECT DISTINCT title, sampul, id_buku, jenis_buku, status_buku, tgl_masuk, id_pengarang, thn_buku, harga_buku, id_penerbit, id_kategori from tb_buku  group BY title DESC");
        $this->data['bukulaporan'] =  $this->db->query("SELECT DISTINCT title, sampul, id_buku, jenis_buku, status_buku, tgl_masuk, id_pengarang, thn_buku, harga_buku, id_penerbit from tb_buku  group BY title DESC");
		$this->data['jumlahtitle'] =  $this->db->query("SELECT title FROM tb_buku GROUP BY title")->num_rows();
		


		$this->data['title_web'] = 'Data Buku';
	
		// $this->data['jumlahbuku'] =  $this->db->query("SELECT * FROM tb_buku where title ='$title'")->num_rows();

        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('buku/buku_viewkaperpus',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	// end controler index view buku untuk user kepala sekolah




	public function bukudetail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tb_buku','id_buku',$this->uri->segment('3'));
		if($count > 0)
		{
			$this->data['buku'] = $this->M_Admin->get_tableid_edit('tb_buku','id_buku',$this->uri->segment('3'));
			$this->data['kats'] =  $this->db->query("SELECT * FROM tb_kategori ORDER BY id_kategori DESC")->result_array();
			$this->data['penerbit'] =  $this->db->query("SELECT * FROM tb_penerbit ORDER BY id_penerbit DESC")->result_array();
			$this->data['pengarang'] =  $this->db->query("SELECT * FROM tb_pengarang ORDER BY id_pengarang DESC")->result_array();
			$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tb_rak ORDER BY id_rak DESC")->result_array();

		}else{
			echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
		}

		$this->data['title_web'] = 'Data Buku Detail';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('buku/detail',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function bukuedit()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tb_buku','id_buku',$this->uri->segment('3'));
		if($count > 0)
		{
			
			$this->data['buku'] = $this->M_Admin->get_tableid_edit('tb_buku','id_buku',$this->uri->segment('3'));
	   
			$this->data['kats'] =  $this->db->query("SELECT * FROM tb_kategori ORDER BY id_kategori DESC")->result_array();
			$this->data['penerbit'] =  $this->db->query("SELECT * FROM tb_penerbit ORDER BY id_penerbit DESC")->result_array();
			$this->data['pengarang'] =  $this->db->query("SELECT * FROM tb_pengarang ORDER BY id_pengarang DESC")->result_array();
			$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tb_rak ORDER BY id_rak DESC")->result_array();

		}else{
			echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
		}

		$this->data['title_web'] = 'Data Buku Edit';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('buku/edit_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function bukutambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['kats'] =  $this->db->query("SELECT * FROM tb_kategori ORDER BY id_kategori DESC")->result_array();
		$this->data['penerbit'] =  $this->db->query("SELECT * FROM tb_penerbit ORDER BY id_penerbit DESC")->result_array();
		$this->data['pengarang'] =  $this->db->query("SELECT * FROM tb_pengarang ORDER BY id_pengarang DESC")->result_array();
		$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tb_rak ORDER BY id_rak DESC")->result_array();
		
		
		
		

        $this->data['title_web'] = 'Tambah Buku';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('buku/tambah_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

 


	public function prosesbuku()
	{
// NOTICE ME - INI PROSES GET NOMER INDUK
		if(!empty($this->input->get('id_buku')))
		{
        
			$buku = $this->M_Admin->get_tableid_edit('tb_buku','id_buku',htmlentities($this->input->get('id_buku')));
			
			$sampul = './assets_style/image/buku/'.$buku->sampul;
			if(file_exists($sampul))
			{
				unlink($sampul);
			}
		
			$this->M_Admin->delete_table('tb_buku','id_buku',$this->input->get('id_buku'));
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Berhasil Hapus Buku !</p>
			</div></div>');
			redirect(base_url('data'));  
		}
		if(!empty($this->input->post('tambah')))
		
		{
			
			$post= $this->input->post();
			// setting konfigurasi upload
			$config['upload_path'] = './assets_style/image/buku/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc'; 
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			// load library upload
			$this->load->library('upload',$config);
			// $noinduk_buku = $this->M_Admin->buat_kode('tb_buku','BK','id_buku','ORDER BY id_buku DESC limit 1 '); 

			// upload gambar 1
			if(!empty($_FILES['gambar']['name'] && $_FILES['lampiran']['name']))
			{

				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

				// script uplaod file kedua
				if ($this->upload->do_upload('lampiran')) {
					$this->upload->data();
					$file2 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}
				$data = array(
					// 'noinduk_buku'=>$noinduk_buku,
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => $file1['upload_data']['file_name'],
                    // 'lampiran' => $file2['upload_data']['file_name'],
					'title'  => htmlentities($post['title']), 
					'id_pengarang'=> htmlentities($post['pengarang']), 
					'id_penerbit'=> htmlentities($post['penerbit']),  
					'sumber_buku'=> htmlentities($post['sumber_buku']), 
					'jenis_buku'=> htmlentities($post['jenis_buku']), 
					'thn_buku' => htmlentities($post['thn']), 
					// 'isi' => $this->input->post('ket'), 
					'status_buku'=> 'tersedia', 
					// 'jml'=> '1', 
					'harga_buku'  => htmlentities($post['harga_buku']), 
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

				

			}elseif(!empty($_FILES['gambar']['name'])){
				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}
				$data = array(
					// 'noinduk_buku'=>$noinduk_buku,
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => $file1['upload_data']['file_name'],
                    // 'lampiran' => '0',
					'title'  => htmlentities($post['title']), 
					'id_pengarang'=> htmlentities($post['pengarang']), 
					'id_penerbit'=> htmlentities($post['penerbit']),  
					'sumber_buku'=> htmlentities($post['sumber_buku']), 
					'jenis_buku'=> htmlentities($post['jenis_buku']), 
					'thn_buku' => htmlentities($post['thn']), 
					// 'isi' => $this->input->post('ket'), 
					'status_buku'=> 'tersedia', 
					// 'jml'=> '1', 
					'harga_buku'  => htmlentities($post['harga_buku']), 
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

			}elseif(!empty($_FILES['lampiran']['name'])){

				$this->upload->initialize($config);

				// script uplaod file kedua
				if ($this->upload->do_upload('lampiran')) {
					$this->upload->data();
					$file2 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

				// script uplaod file kedua
				$this->upload->do_upload('lampiran');
				$file2 = array('upload_data' => $this->upload->data());
				$data = array(
					// 'noinduk_buku'=>$noinduk_buku,
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => '0',
                    // 'lampiran' => $file2['upload_data']['file_name'],
					'title'  => htmlentities($post['title']), 
					'id_pengarang'=> htmlentities($post['pengarang']), 
					'id_penerbit'=> htmlentities($post['penerbit']),  
					'sumber_buku'=> htmlentities($post['sumber_buku']), 
					'jenis_buku'=> htmlentities($post['jenis_buku']), 
					'thn_buku' => htmlentities($post['thn']), 
					// 'isi' => $this->input->post('ket'), 
					'status_buku'=> 'tersedia', 
					// 'jml'=> '1',  
					'harga_buku'  => htmlentities($post['harga_buku']), 
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

				
			}else{
				$data = array(
					// 'noinduk_buku'=>$noinduk_buku,
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => '0',
                    // 'lampiran' => '0',
					'title'  => htmlentities($post['title']), 
					'id_pengarang'=> htmlentities($post['pengarang']), 
					'id_penerbit'=> htmlentities($post['penerbit']), 
					'sumber_buku'=> htmlentities($post['sumber_buku']),  
					'jenis_buku'=> htmlentities($post['jenis_buku']),   
					'thn_buku' => htmlentities($post['thn']), 
					// 'isi' => $this->input->post('ket'),
					'status_buku'=> 'tersedia', 
					// 'jml'=> '1',
					'harga_buku'  => htmlentities($post['harga_buku']), 
					'tgl_masuk' => date('Y-m-d H:i:s')
				);
			}
// notice me ini untuk tambah banyak
			$i = 1;
			while($i<=$post['jml']){
				 $this->db->insert('tb_buku', $data) ;  $i++;
			}
			// end
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Buku Sukses !</p>
			</div></div>');
		
			redirect(base_url('data')); 
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			// setting konfigurasi upload
			$config['upload_path'] = './assets_style/image/buku/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png'; 
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			// load library upload
        	$this->load->library('upload',$config);
			// upload gambar 1
			if(!empty($_FILES['gambar']['name'] && $_FILES['lampiran']['name']))
			{

				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

	

				$gambar = './assets_style/image/buku/'.htmlentities($post['gmbr']);
				if(file_exists($gambar))
				{
					unlink($gambar);
				}

				

				$data = array(
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => $file1['upload_data']['file_name'],
                    // 'lampiran' => $file2['upload_data']['file_name'],
					'title'  => htmlentities($post['title']),
					'id_pengarang'=> htmlentities($post['pengarang']), 
					'penerbit'=> htmlentities($post['penerbit']), 
					'sumber_buku'=> htmlentities($post['sumber_buku']),
					'jenis_buku'=> htmlentities($post['jenis_buku']),   
					'thn_buku' => htmlentities($post['thn']), 
					// 'isi' => $this->input->post('ket'), 
					// 'jml'=> htmlentities($post['jml']),  
					'harga_buku'  => htmlentities($post['harga_buku']), 
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

				

			}elseif(!empty($_FILES['gambar']['name'])){
				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}


				$gambar = './assets_style/image/buku/'.htmlentities($post['gmbr']);
				if(file_exists($gambar))
				{
					unlink($gambar);
				}

				$data = array(
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => $file1['upload_data']['file_name'],
					'title'  => htmlentities($post['title']),
					'id_pengarang'=> htmlentities($post['pengarang']), 
					'penerbit'=> htmlentities($post['penerbit']),  
					'sumber_buku'=> htmlentities($post['sumber_buku']), 
					'jenis_buku'=> htmlentities($post['jenis_buku']), 
					'thn_buku' => htmlentities($post['thn']), 
					// 'isi' => $this->input->post('ket'), 
					// 'jml'=> htmlentities($post['jml']),  
					'harga_buku'  => htmlentities($post['harga_buku']), 
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

			}elseif(!empty($_FILES['lampiran']['name'])){

				$this->upload->initialize($config);

				// script uplaod file kedua
				if ($this->upload->do_upload('lampiran')) {
					$this->upload->data();
					$file2 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

				$lampiran = './assets_style/image/buku/'.htmlentities($post['lamp']);
				if(file_exists($lampiran))
				{
					unlink($lampiran);
				}

				// script uplaod file kedua
				$this->upload->do_upload('lampiran');
				$file2 = array('upload_data' => $this->upload->data());

				$data = array(
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    // 'lampiran' => $file2['upload_data']['file_name'],
					'title'  => htmlentities($post['title']),
					'id_pengarang'=> htmlentities($post['pengarang']), 
					'id_penerbit'=> htmlentities($post['penerbit']),  
					'sumber_buku'=> htmlentities($post['sumber_buku']), 
					'jenis_buku'=> htmlentities($post['jenis_buku']), 
					'thn_buku' => htmlentities($post['thn']), 
					// 'isi' => $this->input->post('ket'), 
					// 'jml'=> htmlentities($post['jml']),
					'harga_buku'  => htmlentities($post['harga_buku']),   
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

				
			}else{
				$data = array(
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
					'title'  => htmlentities($post['title']), 
					'id_pengarang'=> htmlentities($post['pengarang']), 
					'id_penerbit'=> htmlentities($post['penerbit']),   
					'sumber_buku'=> htmlentities($post['sumber_buku']),
					'jenis_buku'=> htmlentities($post['jenis_buku']),   
					'thn_buku' => htmlentities($post['thn']), 
					// 'isi' => $this->input->post('ket'), 
					// 'jml'=> htmlentities($post['jml']), 
					'harga_buku'  => htmlentities($post['harga_buku']),  
					'tgl_masuk' => date('Y-m-d H:i:s')
				);
			}

			$this->db->where('id_buku',htmlentities($post['edit']));
			$this->db->update('tb_buku', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data')); 
		}
		
	}

	public function kategori()
	{
		
        $this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['kategori'] =  $this->db->query("SELECT * FROM tb_kategori ORDER BY id_kategori DESC");

		if(!empty($this->input->get('id'))){
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tb_kategori','id_kategori',$id);
			if($count > 0)
			{			
				$this->data['kat'] = $this->db->query("SELECT *FROM tb_kategori WHERE id_kategori='$id'")->row();
			}else{
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="'.base_url('data/kategori').'"</script>';
			}
		}

        $this->data['title_web'] = 'Data Kategori ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('kategori/kat_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function katproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_kategori'=>htmlentities($post['kategori']),
			);

			$this->db->insert('tb_kategori', $data);

			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori'));  
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_kategori'=>htmlentities($post['kategori']),
			);
			$this->db->where('id_kategori',htmlentities($post['edit']));
			$this->db->update('tb_kategori', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori')); 		
		}

		if(!empty($this->input->get('kat_id')))
		{
			$this->db->where('id_kategori',$this->input->get('kat_id'));
			$this->db->delete('tb_kategori');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori')); 
		}
	}

	public function rak()
	{
		
        $this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tb_rak ORDER BY id_rak DESC");

		if(!empty($this->input->get('id'))){
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tb_rak','id_rak',$id);
			if($count > 0)
			{	
				$this->data['rak'] = $this->db->query("SELECT *FROM tb_rak WHERE id_rak='$id'")->row();
			}else{
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="'.base_url('data/rak').'"</script>';
			}
		}

        $this->data['title_web'] = 'Data Rak Buku ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('rak/rak_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function rakproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_rak'=>htmlentities($post['rak']),
			);

			$this->db->insert('tb_rak', $data);

			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Rak Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak'));  
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_rak'=>htmlentities($post['rak']),
			);
			$this->db->where('id_rak',htmlentities($post['edit']));
			$this->db->update('tb_rak', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Rak Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak')); 		
		}

		if(!empty($this->input->get('rak_id')))
		{
			$this->db->where('id_rak',$this->input->get('rak_id'));
			$this->db->delete('tb_rak');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Rak Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak')); 
		}
	}

	// INI SAYA TAMBAH PENERBIT

	public function penerbit()
	{
		
        $this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['penerbit'] =  $this->db->query("SELECT * FROM tb_penerbit ORDER BY id_penerbit DESC");

		if(!empty($this->input->get('id'))){
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tb_penerbit','id_penerbit',$id);
			if($count > 0)
			{	
				$this->data['penerbit'] = $this->db->query("SELECT *FROM tb_penerbit WHERE id_penerbit='$id'")->row();
			}else{
				echo '<script>alert("PENERBIT TIDAK DITEMUKAN");window.location="'.base_url('data/penerbit').'"</script>';
			}
		}

        $this->data['title_web'] = 'Data penerbit ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('penerbit/penerbit_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function penerbitproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_penerbit'=>htmlentities($post['penerbit']),
			);

			$this->db->insert('tb_penerbit', $data);

			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Penerbit Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/penerbit'));  
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_penerbit'=>htmlentities($post['penerbit']),
			);
			$this->db->where('id_penerbit',htmlentities($post['edit']));
			$this->db->update('tb_penerbit', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Penerbit Sukses !</p>
			</div></div>');
			redirect(base_url('data/penerbit')); 		
		}

		if(!empty($this->input->get('penerbit_id')))
		{
			$this->db->where('id_penerbit',$this->input->get('penerbit_id'));
			$this->db->delete('tb_penerbit');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Penerbit Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/penerbit')); 
		}
	}

// ini fungsi pengarang
	public function pengarang()
	{
		
        $this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['pengarang'] =  $this->db->query("SELECT * FROM tb_pengarang ORDER BY id_pengarang DESC");

		if(!empty($this->input->get('id'))){
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tb_pengarang','id_pengarang',$id);
			if($count > 0)
			{	
				$this->data['pengarang'] = $this->db->query("SELECT *FROM tb_pengarang WHERE id_pengarang='$id'")->row();
			}else{
				echo '<script>alert("PENGARANG TIDAK DITEMUKAN");window.location="'.base_url('data/pengarang').'"</script>';
			}
		}

        $this->data['title_web'] = 'Data pengarang ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('pengarang/pengarang_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function pengarangproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_pengarang'=>htmlentities($post['pengarang']),
			);

			$this->db->insert('tb_pengarang', $data);

			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Pengarang Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/pengarang'));  
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_pengarang'=>htmlentities($post['pengarang']),
			);
			$this->db->where('id_pengarang',htmlentities($post['edit']));
			$this->db->update('tb_pengarang', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Pengarang Sukses !</p>
			</div></div>');
			redirect(base_url('data/pengarang')); 		
		}

		if(!empty($this->input->get('pengarang_id')))
		{
			$this->db->where('id_pengarang',$this->input->get('pengarang_id'));
			$this->db->delete('tb_pengarang');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Pengarang Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/pengarang')); 
		}
	}

	public function cetak_buku()
	
	{
		$this->load->view('laporan/cetakbuku',$this->data);
	}
}
