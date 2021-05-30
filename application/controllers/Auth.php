<?php

/* First call when app running */
class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->model('M_user');
		$this->load->library('form_validation');
	}

	/* Tampil login */
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
	/* END tampil login */

	/* Proses login */
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
	/* END proses login */

	/* Proses registrasi */
	public function registrasi()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('re_password', 'Repeat password', 'required|trim|matches[password]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_registrasi');
		} else {
			$username = htmlspecialchars($this->input->post('username', true));
			$password = md5($this->input->post('password', true));

			$data = [
				'username' => $username,
				'password' => $password,
				'level' => null,
				'status_user' => 'Nonaktif'
			];

			if ($this->M_user->tambah_data($data) > 0) {
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Success create account.
                            </div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Failed create account!
		</div>');
			}
			redirect('auth');
		}
	}
	/* END proses registrasi */

	/* Proses logout */
	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
	/* END proses logout */
}
