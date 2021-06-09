<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('login');
		$this->load->view('templates/auth_header');
		$this->load->view('templates/auth_footer');
	}

	public function dashboard()
	{
		$this->load->view('login-khusus');
	}

	// Controller Aksi Login
	public function CekLogin()
	{

		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$dimana = array(
			'user' => ($user),
			'pass' => md5($pass)
		);
		$cekSiswa = $this->m_login->cekSiswa('tb_siswa', $dimana)->num_rows();
		$cekAdmin = $this->m_login->cekAdmin('tb_admin', $dimana)->num_rows();
		$cekguru = $this->m_login->cekguru('tb_guru', $dimana)->num_rows();
		if ($cekSiswa > 0) {
			$data_session = array(
				'user' => $user,
				'status' => 'siswa',
			);

			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('login_siswa', 'Anda berhasil login sebagai Mahasiswa!');
			redirect('siswa');
		} else {
			$this->session->set_flashdata('login_gagal', 'Maaf username atau password tidak terdaftar!');
			redirect('login');
		}
	}

	public function cekSpesial()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$dimana = array(
			'user' => $user,
			'pass' => $pass
		);
		$cekSiswa = $this->m_login->cekSiswa('tb_siswa', $dimana)->num_rows();
		$cekAdmin = $this->m_login->cekAdmin('tb_admin', $dimana)->num_rows();
		$cekguru = $this->m_login->cekguru('tb_guru', $dimana)->num_rows();
		if ($cekAdmin > 0) {
			$data_session = array(
				'nama' => $user,
				'status' => 'admin',
			);

			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('login_admin', 'Anda berhasil login sebagai admin!');
			redirect('admin');
		} else if ($cekguru > 0) {
			$data_session = array(
				'guru' => $user,
				'status' => 'guru',
			);

			$this->session->set_userdata($data_session);
			$this->session->set_flashdata('login_guru', 'Anda berhasil login sebagai dosen!');
			redirect('guru');
		} else {
			$this->session->set_flashdata('login_gagal', 'Maaf username atau password tidak terdaftar!');
			redirect('login/dashboard');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function registration()
	{
		$this->form_validation->set_rules('nim', 'Nim', 'required|trim');
		$this->form_validation->set_rules('user', 'User', 'required|trim|valid_email');
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header');
			$this->load->view('siswa/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'nim'  => $this->input->post('nim'),
				'user' => $this->input->post('user'),
				'nama_siswa' => $this->input->post('name'),
				'foto' => 'man.png',
				'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT)
			];

			$this->db->insert('tb_siswa', $data);
			redirect('login');
		}
	}
}
