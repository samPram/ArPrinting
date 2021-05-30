<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_kasir extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang_keluar');
		$this->load->model('M_transaksi');
	}
	public function index()
	{
		if ($this->session->userdata('level') == 'Kasir') {
			$data['total'] = $this->M_transaksi->tampil_totalDay(['date' => date('Y-m-d')]);
			$data['transaksi'] = $this->M_transaksi->tampil_CountDay(['date' => date('Y-m-d')]);
			$data['high_total'] = $this->M_barang_keluar->tampil_hargaTotal(['date' => date('Y-m-d')]);
			$data['data'] = $this->M_barang_keluar->tampil_bestSell(['date' => date('Y-m-d')]);

			$this->load->view('template/header');
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar_kasir');
			$this->load->view('kasir/v_home', $data);
			$this->load->view('template/footer');
		} else {
			$this->load->view('404_page');
		}
	}
}
