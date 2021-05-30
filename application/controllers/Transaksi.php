<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaksi');
		$this->load->model('M_barang');
		$this->load->model('M_barang_keluar');
		$this->load->model('M_barang_masuk');
		$this->load->model('M_view_transaksi');
		$this->load->model('M_histori_masuk');
		$this->load->library('form_validation');
	}

	/* tampil transaksi halaman kasir */
	public function index($id = null)
	{
		if ($this->session->userdata('level') == 'Kasir') {

			$data['data'] = $this->M_barang_masuk->tampil_stok();

			$this->load->view('template/header');
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar_kasir');
			$this->load->view('kasir/v_transaksi', $data);
			$this->load->view('template/footer');
		} else {
			$this->load->view('404_page');
		}
	}
	/* END tampil kasir */

	/* Proses request data tampil list card */
	public function list_card($id = null)
	{
		$data['list']  = $this->M_barang->tampil_data(['id_produk' => $id]);
		echo json_encode($data['list']);
		return;
	}
	/* END tampil list card */

	/* Tampil data transaksi halaman admin */
	public function getAllTransaction()
	{
		if ($this->session->userdata('level') == 'Admin') {
			$data['data'] = $this->M_view_transaksi->tampil_data();
			$this->load->view('template/header');
			$this->load->view('template/topbar');
			$this->load->view('template/sidebar');
			$this->load->view('admin/v_transaksi', $data);
			$this->load->view('template/footer');
		} else {
			$this->load->view('404_page');
		}
	}
	/* END tampil data transaksi */

	/* Proses request tampil data detail transaksi */
	public function detailTransaction($id = null)
	{
		$data = [
			'id_transaksi' => $id
		];
		$data['detail'] = $this->M_view_transaksi->tampil_detail($data);

		echo json_encode($data['detail']);
		return;
	}
	/* END proses tampil data detail */

	/* Proses insert transaksi */
	public function add()
	{
		if ($this->session->userdata('level') == 'Kasir') {

			/* DATA TRANSAKSI */
			$id_transaksi = date('YmdHis');
			$id_user = $this->session->userdata('id_user');
			$bayar = str_replace('.', '', $this->input->post('bayar', true));
			$total = str_replace('.', '', $this->input->post('total', true));
			$kembalian = str_replace('.', '', $this->input->post('kembalian', true));

			if ($total > $bayar) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Failed insert data!
		</div>');
				echo base_url() . '/Transaksi';
				die;
			}

			$data = [
				'id_transaksi' => $id_transaksi,
				'id_user' => $id_user,
				'tanggal' => date('Y-m-d'),
				'bayar' => $bayar,
				'total' => $total,
				'kembali' => $kembalian
			];

			/* DATA BARANG KELUAR */
			$id_masuk = $this->input->post('id_masuk', true);
			$id_produk = $this->input->post('id_produk', true);
			$harga_keluar = str_replace('.', '', $this->input->post('harga_keluar', true));
			$jumlah_masuk = $this->input->post('qty_produk', true);
			$jumlah_keluar = $this->input->post('jumlah_keluar', true);
			$total_harga_keluar = str_replace('.', '', $this->input->post('total_harga_keluar', true));

			if (!$id_masuk) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Failed insert data!
		</div>');
				echo base_url() . '/Transaksi';
				die;
			}

			$stok = $this->M_barang_masuk->tampil_stokCard($id_masuk);


			$result = [];
			for ($i = 0; $i < count($id_produk); $i++) {
				$result[$i]['id_produk'] = $id_produk[$i];
				$result[$i]['tgl_keluar'] = date('Y-m-d');
				$result[$i]['id_transaksi'] = $id_transaksi;
			}

			for ($i = 0; $i < count($harga_keluar); $i++) {
				$result[$i]['harga_keluar'] = $harga_keluar[$i];
			}

			for ($i = 0; $i < count($jumlah_keluar); $i++) {
				if ($jumlah_keluar[$i] == 0) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Failed insert data!
			</div>');
					echo base_url() . '/Transaksi';

					die;
				}

				if ($jumlah_keluar[$i] > $jumlah_masuk[$i]) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Failed insert data!
			</div>');
					echo base_url() . '/Transaksi';

					die;
				}
				$result[$i]['jumlah_keluar'] = $jumlah_keluar[$i];
			}

			for ($i = 0; $i < count($total_harga_keluar); $i++) {
				$result[$i]['total_harga_keluar'] = $total_harga_keluar[$i];
			}

			$dataMasuk = [];
			for ($i = 0; $i < count($stok); $i++) {
				$dataMasuk[$i]['id_masuk'] = $stok[$i]['id_masuk'];
				$dataMasuk[$i]['jumlah_masuk'] = $stok[$i]['jumlah_masuk'] -= $result[$i]['jumlah_keluar'];
			}

			if ($this->M_transaksi->tambah_data($data) > 0 && $this->M_barang_keluar->tambah_data($result) > 0 && $this->M_barang_masuk->ubah_stok_masuk($dataMasuk) > 0) {

				$id_keluar = $this->M_barang_keluar->tampil_maxId($id_transaksi);

				$dataHistori = [];
				for ($i = 0; $i < count($id_masuk); $i++) {
					$dataHistori[$i] = [
						'id_masuk' => $id_masuk[$i],
						'current_masuk' => $dataMasuk[$i]['jumlah_masuk'],
						'berkurang' => $jumlah_keluar[$i],
						'id_keluar' => $id_keluar[$i]['id_keluar']
					];
				}

				$this->M_histori_masuk->tambah_many($dataHistori);

				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Success inserting data.
			</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Failed insert data!
			</div>');
			}
			echo base_url() . '/Transaksi';
		} else {
			$this->load->view('404_page');
		}
	}
	/* END proses insert transaksi */
}
