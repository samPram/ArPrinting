<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_admin extends CI_Controller
{

	public function index()
	{
		// echo var_dump($this->session->userdata());
		if ($this->session->userdata('level') == 'Admin') {
			$this->load->view('template/header');
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('admin/v_home');
			$this->load->view('template/footer');
		} else {
			$this->load->view('404_page');
		}
	}
}
