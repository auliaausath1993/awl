<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model','data');
        
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

	public function login()
	{
		$this->load->view('landing/data_perseorangan_login');
	}

	public function form_one()
	{
		$this->load->view('landing/data_perseorangan');
	}

	public function register()
	{
		
			$data['nama'] = $this->input->post('nama');
			$data['username'] = $this->input->post('username');
			$data['email']  =  $this->input->post('email');
			$data['password'] = md5($this->input->post('password'));

			$this->db->insert('users',$data);
			redirect('dashboard/form_input');

	}

	public function form_input()
	{
		$this->load->view('landing/data_input_pendanaan');
	}

	public function tambah()
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
