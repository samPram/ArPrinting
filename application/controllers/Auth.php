<?php
class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('v_login');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = ($this->input->post('username', true) == null) ? null :  htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$password = ($this->input->post('password', true) == null) ? null : md5(htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES));

		$data = [
			'username' => $username,
			'password' => $password
		];
		$result = $this->M_login->auth($data);

		if (!$result) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed login, please check username and password!</div>');
			redirect('auth');
		} else {
			if ($result['status_user'] === 'Aktif') {
				if ($result['level'] === 'Admin') {
					# code...
					$this->session->set_userdata($result);
					redirect('home_admin');
				} else {
					$this->session->set_userdata($result);
					redirect('home_kasir');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User has not been activated!</div>');
				redirect('auth');
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
