<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_kasir extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('level') == 'Kasir') {
			$this->load->view('template/header');
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar_kasir');
			$this->load->view('kasir/v_home');
			$this->load->view('template/footer');
		} else {
			$this->load->view('404_page');
		}
	}
}
