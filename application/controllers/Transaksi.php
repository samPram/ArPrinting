<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi');
		$this->load->model('M_produk');
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	public function index($id = null)
	{
		if ($this->session->userdata('level') == 'Kasir') {
			$config['base_url'] = base_url() . 'Transaksi/index';
			$config['total_rows'] = $this->M_produk->total_data();
			$config['per_page'] = 5;

			$config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination">';
			$config['full_tag_close'] = '</ul></nav>';

			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li><a>';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);

			$data['start'] = $this->uri->segment(3);
			$data['data'] = $this->M_produk->tampil_list($config['per_page'], $data['start']);
			// echo var_dump($data['data']);
			// die;

			$this->load->view('template/header');
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar_kasir');
			$this->load->view('kasir/v_transaksi', $data);
			$this->load->view('template/footer');
		} else {
			$this->load->view('404_page');
		}
	}

	public function list_card($id = null)
	{
		$data['list']  = $this->M_produk->tampil_data(['id_produk' => $id]);
		echo json_encode($data['list']);
		return;
	}

	public function add()
	{
		$id_transaksi = $this->input->post('id_transaksi');

		if (empty($id_transaksi)) $this->m_transaksi->tambah_data();
	}

	public function delete()
	{
		$id_transaksi = $this->input->post('id_transaksi1');

		$this->m_transaksi->hapus_data($id_transaksi);
	}

	public function updateHarga()
	{
		$id_transaksi = $this->input->post('id_transaksi');

		if (empty($id_transaksi)) {
			$this->index();
		} else {
			$this->m_transaksi->ubah_harga($id_transaksi);
		}
	}
}
