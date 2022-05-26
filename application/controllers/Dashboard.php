<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model','data');
		$this->load->model('User_model','user');
        
    }

	// Register untuk user
	public function register(){
		$data['title'] = 'Halaman Register';
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('landing/data_perseorangan',$data);
		} else {
			// Encrypt password
			$enc_password = md5($this->input->post('password'));
			$id_user = $this->user->register($enc_password);
			$data['user_id'] = $id_user;
			$data['username'] = $this->input->post('username');
 			$data['is_login'] = TRUE;
			$this->session->set_flashdata('user_loggedin','Selamat Anda Berhasil Login');
			$this->session->set_userdata($data);
			redirect('dashboard/form_input');
		}
	}

	public function form_input()
	{
		$data['title'] = 'Halaman Pendataan';
		// Cek apakah login?
		if(empty($this->session->userdata('is_login')))
        {
			redirect('dashboard/login');
		}
		$id_user = $this->session->userdata('id_user');
		$cek_data = $this->user->check_data($id_user);
		if($cek_data){
			$data['status'] = 'update';
			$data['user'] = $this->user->get_data_user($id_user);
		} else {
			$data['status'] = 'insert';
			$data['user'] = '';
			$data['register'] = $this->user->get_data_register($id_user);;
		}
		$this->load->view('landing/data_input_pendanaan',$data);
	}

	// Login untuk user
	public function login(){
		$data['title'] = 'Halaman Login';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){                    
			$this->load->view('landing/data_perseorangan_login', $data);
				
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			// Login user
			$user_id = $this->user->login($username, $password);
			// var_dump($user_id);
			if($user_id){
				// Create session
				$user_data = array(
					'id_user' => $user_id,
					'username' => $username,
					'is_login' => TRUE
				);

				$this->session->set_userdata($user_data);

				// Set message
				$this->session->set_flashdata('user_loggedin','Selamat Anda Berhasil Login');

				redirect('dashboard/form_input');
			} else {
				// Set message
				$this->session->set_flashdata('login_failed', '<div class="alert alert-danger text-center">username dan password salah!</div>');
				redirect('dashboard/login');
			}        
		}
	}

	// Logout user
	public function logout(){
		// Unset user data
		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');

		// Set message
		$this->session->set_flashdata('user_loggedout', '<div class="alert alert-danger text-center">Anda telah berhasil keluar sistem.</div>');
		redirect('dashboard/login');
	}

	// Cek apakah username sudah ada
	public function check_username_exists($username){
		$this->form_validation->set_message('check_username_exists', '<div class="alert alert-danger text-center">Username Sudah diambil. Silahkan gunakan username lain.</div>');
		if($this->user->check_username_exists($username)){
			return true;
		} else {
			return false;
		}
	}

	// Cek apakah email sudah ada (ini seharusnya juga ada agar email tidak dipakai oleh sembarang user dan membingungkan query db)
	public function check_email_exists($email){
		$this->form_validation->set_message('check_email_exists', '<div class="alert alert-danger text-center">Email Sudah diambil. Silahkan lupa password.</div>');
		if($this->user->check_email_exists($email)){
			return true;
		} else {
			return false;
		}
	}

	public function check_data($id){
		if($this->user->check_data($id)){
			return true;
		} else {
			return false;
		}
	}

	public function tambah(){

		if(empty($this->session->userdata('is_login')))
        {
			redirect('dashboard/login');
		}

		// Insert tanpa validation
		$foto_ktp = $_FILES['foto_ktp']['name'];
		$skck = $_FILES['skck']['name'];
		$slik_ojk = $_FILES['slik_ojk']['name'];
		$rekening_koran = $_FILES['rekening_koran']['name'];
		// config upload file
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size']     = '1048';
		$config['upload_path'] = './assets/img/data_pengguna/';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		// Cek satu-satu upload file 
		// Foto KTP cek
		if ($foto_ktp != ''){
			if (!$this->upload->do_upload('foto_ktp')) {
    			$error = array('error' => $this->upload->display_errors());
				print_r($error);
  			} else {
    			$fileDataktp = $this->upload->data();
    			$foto_ktp_fix = $fileDataktp['file_name'];
  			}
		} else {
			$foto_ktp_fix = $this->input->post("foto_ktp_old");
		}
		// SKCK cek
		if ($skck != ''){
			if (!$this->upload->do_upload('skck')) {
    			$error = array('error' => $this->upload->display_errors());
				print_r($error);
  			} else {
    			$fileDataskck = $this->upload->data();
    			$skck_fix = $fileDataskck['file_name'];
  			}
		} else {
			$skck_fix = $this->input->post("skck_old");
		}
		// Slik OJK Cek
		if ($slik_ojk != ''){
			if (!$this->upload->do_upload('slik_ojk')) {
    			$error = array('error' => $this->upload->display_errors());
				print_r($error);
  			} else {
    			$fileDataslikojk = $this->upload->data();
    			$slik_ojk_fix = $fileDataslikojk['file_name'];
  			}
		} else {
			$slik_ojk_fix = $this->input->post("slik_ojk_old");
		}
		// Rekening Koran cek
		if ($rekening_koran != ''){
			if (!$this->upload->do_upload('rekening_koran')) {
    			$error = array('error' => $this->upload->display_errors());
				print_r($error);
  			} else {
    			$fileDatarekeningkoran = $this->upload->data();
    			$rekening_koran_fix = $fileDatarekeningkoran['file_name'];
  			}
		} else {
			$rekening_koran_fix = $this->input->post("rekening_koran_old");
		}

		$data = array(
			"user_id" => $this->session->userdata('id_user'),
			"email" => $this->input->post('email'),
			"nama_ktp" => $this->input->post('nama_ktp'),
			"t_tempat" => $this->input->post('t_tempat'),
			"t_lahir" => $this->input->post('t_lahir'),                        
			"agama" => $this->input->post('agama'),
			"jk" => $this->input->post('jk'),
			"no_ktp" => $this->input->post('no_ktp'),
			"ibu_kandung" => $this->input->post('ibu_kandung'),
			"status_pernikahan" => $this->input->post('status_pernikahan'),
			"pendidikan_terakhir" => $this->input->post('pendidikan_terakhir'),
			"pekerjaan" => $this->input->post('pekerjaan'),
			"bidang_pekerjaan" => $this->input->post('bidang_pekerjaan'),
			"pendapatan_per_bulan" => $this->input->post('pendapatan_per_bulan'),
			"sumber_dana" => $this->input->post('sumber_dana'),
			"pengalaman_kerja" => $this->input->post('pengalaman_kerja'),
			"npwp" => $this->input->post('npwp'),
			"no_hp" => $this->input->post('no_hp'),
			"alamat_ktp" => $this->input->post('alamat_ktp'),
			"nama_bank" => $this->input->post('nama_bank'),
			"no_rek" => $this->input->post('no_rek'),
			"nama_pemilik" => $this->input->post('nama_pemilik'),
			"no_gopay" => $this->input->post('no_gopay'),
			"no_dana" => $this->input->post('no_dana'),
			"nama_ahli_waris" => $this->input->post('nama_ahli_waris'),
			"nik_ahli_waris" => $this->input->post('nik_ahli_waris'),
			"hubungan_ahli_waris" => $this->input->post('hubungan_ahli_waris'),
			"alamat_ahli_waris" => $this->input->post('alamat_ahli_waris'),
			"no_ahli_waris" => $this->input->post('no_ahli_waris'),
			"foto_ktp" => $foto_ktp_fix,
			"skck" => $skck_fix,
			"slik_ojk" => $rekening_koran_fix,
			"rekening_koran" => $rekening_koran_fix,
		);
		// var_dump($data);
		$insert_data_perorangan = $this->user->insertdata($data);
		if ($insert_data_perorangan == TRUE){
			// Set message
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center">Data berhasil disimpan.</div>');
		} else {
			// Set message
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Data gagal disimpan.</div>');
		}
		redirect('dashboard/form_input');
	}

	public function update(){

		if(empty($this->session->userdata('is_login')))
        {
			redirect('dashboard/login');
		}

		// Update tanpa validation
		$id = $this->input->post("id");
		$foto_ktp = $_FILES['foto_ktp']['name'];
		$skck = $_FILES['skck']['name'];
		$slik_ojk = $_FILES['slik_ojk']['name'];
		$rekening_koran = $_FILES['rekening_koran']['name'];
		// config upload file
		$config['allowed_types'] = 'jpg|png|jpeg|pdf';
		$config['max_size']     = '1048';
		$config['upload_path'] = './assets/img/data_pengguna/';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		// Cek satu-satu upload file 
		// Foto KTP cek
		if ($foto_ktp != ''){
			if (!$this->upload->do_upload('foto_ktp')) {
    			$error = array('error' => $this->upload->display_errors());
				print_r($error);
  			} else {
    			$fileDataktp = $this->upload->data();
    			$foto_ktp_fix = $fileDataktp['file_name'];
  			}
		} else {
			$foto_ktp_fix = $this->input->post("foto_ktp_old");
		}
		// SKCK cek
		if ($skck != ''){
			if (!$this->upload->do_upload('skck')) {
    			$error = array('error' => $this->upload->display_errors());
				print_r($error);
  			} else {
    			$fileDataskck = $this->upload->data();
    			$skck_fix = $fileDataskck['file_name'];
  			}
		} else {
			$skck_fix = $this->input->post("skck_old");
		}
		// Slik OJK Cek
		if ($slik_ojk != ''){
			if (!$this->upload->do_upload('slik_ojk')) {
    			$error = array('error' => $this->upload->display_errors());
				print_r($error);
  			} else {
    			$fileDataslikojk = $this->upload->data();
    			$slik_ojk_fix = $fileDataslikojk['file_name'];
  			}
		} else {
			$slik_ojk_fix = $this->input->post("slik_ojk_old");
		}
		// Rekening Koran cek
		if ($rekening_koran != ''){
			if (!$this->upload->do_upload('rekening_koran')) {
    			$error = array('error' => $this->upload->display_errors());
				print_r($error);
  			} else {
    			$fileDatarekeningkoran = $this->upload->data();
    			$rekening_koran_fix = $fileDatarekeningkoran['file_name'];
  			}
		} else {
			$rekening_koran_fix = $this->input->post("rekening_koran_old");
		}
		//echo $foto_ktp_fix.'<br>'.$skck_fix.'<br>'.$slik_ojk_fix.'<br>'.$rekening_koran_fix;
		$data = array(
			"email" => $this->input->post('email'),
			"nama_ktp" => $this->input->post('nama_ktp'),
			"t_tempat" => $this->input->post('t_tempat'),
			"t_lahir" => $this->input->post('t_lahir'),                        
			"agama" => $this->input->post('agama'),
			"jk" => $this->input->post('jk'),
			"no_ktp" => $this->input->post('no_ktp'),
			"ibu_kandung" => $this->input->post('ibu_kandung'),
			"status_pernikahan" => $this->input->post('status_pernikahan'),
			"pendidikan_terakhir" => $this->input->post('pendidikan_terakhir'),
			"pekerjaan" => $this->input->post('pekerjaan'),
			"bidang_pekerjaan" => $this->input->post('bidang_pekerjaan'),
			"pendapatan_per_bulan" => $this->input->post('pendapatan_per_bulan'),
			"sumber_dana" => $this->input->post('sumber_dana'),
			"pengalaman_kerja" => $this->input->post('pengalaman_kerja'),
			"npwp" => $this->input->post('npwp'),
			"no_hp" => $this->input->post('no_hp'),
			"alamat_ktp" => $this->input->post('alamat_ktp'),
			"nama_bank" => $this->input->post('nama_bank'),
			"no_rek" => $this->input->post('no_rek'),
			"nama_pemilik" => $this->input->post('nama_pemilik'),
			"no_gopay" => $this->input->post('no_gopay'),
			"no_dana" => $this->input->post('no_dana'),
			"nama_ahli_waris" => $this->input->post('nama_ahli_waris'),
			"nik_ahli_waris" => $this->input->post('nik_ahli_waris'),
			"hubungan_ahli_waris" => $this->input->post('hubungan_ahli_waris'),
			"alamat_ahli_waris" => $this->input->post('alamat_ahli_waris'),
			"no_ahli_waris" => $this->input->post('no_ahli_waris'),
			"foto_ktp" => $foto_ktp_fix,
			"skck" => $skck_fix,
			"slik_ojk" => $rekening_koran_fix,
			"rekening_koran" => $rekening_koran_fix,
		);
		// var_dump($data);
		$update_data_perorangan = $this->user->updatedata($id, $data);
		if ($update_data_perorangan == TRUE){
			// Set message
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center">Data berhasil dirubah.</div>');
		} else {
			// Set message
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Data gagal dirubah.</div>');
		}
		redirect('dashboard/form_input');
	}
	public function index()
	{
		$data['title'] = 'Dashboard';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('dashboard/index');
		$this->load->view('templates/footer');
	}


	public function landing_page()
	{
		$this->load->view('landing/utama');
	}

	// public function login()
	// {
	// 	$this->load->view('landing/data_perseorangan_login');
	// }

	// public function form_one()
	// {
	// 	$this->load->view('landing/data_perseorangan');
	// }

	// public function register()
	// {
		
	// 		$data['nama'] = $this->input->post('nama');
	// 		$data['username'] = $this->input->post('username');
	// 		$data['email']  =  $this->input->post('email');
	// 		$data['password'] = md5($this->input->post('password'));

	// 		$this->db->insert('users',$data);
	// 		redirect('dashboard/form_input');

	// }

	// public function form_input()
	// {
	// 	$this->load->view('landing/data_input_pendanaan');
	// }

	public function tambahlama()
	{

		$foto_ktp = $_FILES['foto_ktp']['name'];
		$skck = $_FILES['skck']['name'];
		$slik_ojk = $_FILES['slik_ojk']['name'];
		$rekening_koran = $_FILES['rekening_koran']['name'];

		if ($foto_ktp = '' || $skck = '' ||$slik_ojk = '' ||$rekening_koran = '') {
			
		} else {
			$config['allowed_types'] = 'jpg|png|jpeg|pdf';
			$config['max_size']     = '1048';
			$config['upload_path'] = './assets/img/data_pengguna/';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto_ktp')) {
				$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
					<i class="fas fa-exclamation-triangle "></i>
					Berita gagal ditambahkan, cek kembali ukuran foto_ktp dan tipe file foto_ktp!..
					</div>
					');
				redirect('dashboard/form_one');
			}elseif(!$this->upload->do_upload('skck')) {
				$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
					<i class="fas fa-exclamation-triangle "></i>
					Berita gagal ditambahkan, cek kembali ukuran skck dan tipe file skck!..
					</div>
					');
				redirect('dashboard/form_one');
			}elseif (!$this->upload->do_upload('slik_ojk')) {
				$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
					<i class="fas fa-exclamation-triangle "></i>
					Berita gagal ditambahkan, cek kembali ukuran slik_ojk dan tipe file slik_ojk!..
					</div>
					');
				redirect('dashboard/form_one');
			}elseif(!$this->upload->do_upload('rekening_koran')) {
				$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
					<i class="fas fa-exclamation-triangle "></i>
					Berita gagal ditambahkan, cek kembali ukuran rekening_koran dan tipe file rekening_koran!..
					</div>
					');
				redirect('dashboard/form_one');
			} else {
				$foto_ktp = $this->upload->data('file_name');
				$skck = $this->upload->data('file_name');
				$slik_ojk = $this->upload->data('file_name');
				$rekening_koran = $this->upload->data('file_name');

				$data = array(
					"email" => $this->input->post('email'),
					"nama_ktp" => $this->input->post('nama_ktp'),
					"t_tempat" => $this->input->post('t_tempat'),
					"t_lahir" => $this->input->post('t_lahir'),                        
					"agama" => $this->input->post('agama'),
					"jk" => $this->input->post('jk'),
					"no_ktp" => $this->input->post('no_ktp'),
					"ibu_kandung" => $this->input->post('ibu_kandung'),
					"status_pernikahan" => $this->input->post('status_pernikahan'),
					"pendidikan_terakhir" => $this->input->post('pendidikan_terakhir'),
					"pekerjaan" => $this->input->post('pekerjaan'),
					"bidang_pekerjaan" => $this->input->post('bidang_pekerjaan'),
					"pendapatan_per_bulan" => $this->input->post('pendapatan_per_bulan'),
					"sumber_dana" => $this->input->post('sumber_dana'),
					"pengalaman_kerja" => $this->input->post('pengalaman_kerja'),
					"npwp" => $this->input->post('npwp'),
					"no_hp" => $this->input->post('no_hp'),
					"alamat_ktp" => $this->input->post('alamat_ktp'),
					"nama_bank" => $this->input->post('nama_bank'),
					"no_rek" => $this->input->post('no_rek'),
					"nama_pemilik" => $this->input->post('nama_pemilik'),
					"no_gopay" => $this->input->post('no_gopay'),
					"no_dana" => $this->input->post('no_dana'),
					"nama_ahli_waris" => $this->input->post('nama_ahli_waris'),
					"nik_ahli_waris" => $this->input->post('nik_ahli_waris'),
					"hubungan_ahli_waris" => $this->input->post('hubungan_ahli_waris'),
					"alamat_ahli_waris" => $this->input->post('alamat_ahli_waris'),
					"no_ahli_waris" => $this->input->post('no_ahli_waris'),
					"foto_ktp" => $foto_ktp,
					"skck" => $skck,
					"slik_ojk" => $rekening_koran,
					"rekening_koran" => $rekening_koran,
				);
			// $this->berita->tambahBerita($data, 'berita');
			$this->db->insert('table_data',$data);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success" role="alert">
				<i class="fas fa-check-circle"></i>
				data Sukses Ditambahkan!..
				</div>
				');
			redirect('dashboard/form_one');
			}

		}
	}

}
