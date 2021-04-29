<?php
class LoginController extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function index()
	{
		$this->load->view('v_login');
	}

	function auth()
	{
		$this->M_login->auth();
	}

	function logout()
	{
		$this->session->sess_destroy();
		$url = base_url('');
		redirect($url);
	}
}
