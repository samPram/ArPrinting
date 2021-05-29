<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_admin extends CI_Controller
{

	/* tampil home admin */
	public function index()
	{
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
	/* END tampil home admin */
}
