<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_transaksi');
		$this->load->model('M_barang');
		$this->load->model('M_return_barang');
	}

	/* Tampil home admin */
	public function index()
	{
		if ($this->session->userdata('level') == 'Admin') {
			$data['user'] = $this->M_user->tampil_getCountAll();
			$data['transaksi'] = $this->M_transaksi->tampil_getCountAll();
			$data['barang'] = $this->M_barang->tampil_getCountAll();
			$data['return'] = $this->M_return_barang->tampil_getCountAll();

			$this->load->view('template/header');
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('admin/v_home', $data);
			$this->load->view('template/footer');
		} else {
			$this->load->view('404_page');
		}
	}
	/* END tampil home admin */
}
