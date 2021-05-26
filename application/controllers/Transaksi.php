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
		$this->load->library('form_validation');
		$this->load->library('pagination');
	}

	/* view all data transaksi */
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

	/* Execute search data barang */
	public function getSearchStok($nama = null)
	{
		$data['data'] = $this->M_barang_masuk->tampil_searchStok(['nama_produk' => $nama]);
		echo json_encode($data['data']);
		return;
	}

	/* Execute data barang by Id Produk */
	public function list_card($id = null)
	{
		$data['list']  = $this->M_barang->tampil_data(['id_produk' => $id]);
		echo json_encode($data['list']);
		return;
	}

	/* show all transaksi */
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

	/* show data transaksi by Id transaksi */
	public function detailTransaction($id = null)
	{
		$data = [
			'id_transaksi' => $id
		];
		$data['detail'] = $this->M_view_transaksi->tampil_detail($data);

		echo json_encode($data['detail']);
		return;
	}

	/* show count all data transaksi */
	public function getCountAll()
	{
		$data['data'] = $this->M_transaksi->tampil_getCountAll();
		echo json_encode($data['data']);
		return;
	}

	/* show total pendapatan per hari ini */
	public function getTotalDay()
	{
		$data = ['date' => date('Y-m-d')];
		$result['data'] = $this->M_transaksi->tampil_totalDay($data);
		echo json_encode($result['data']);
		return;
	}

	/* add barang transaksi */
	public function add()
	{
		if ($this->session->userdata('level') == 'Kasir') {
			// echo json_encode($this->input->post());
			// return;

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

			// echo json_encode($data);
			// return;
			// die();

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

			// echo json_encode($stok);
			// return;
			// die();

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
					// break;
					die;
				}

				if ($jumlah_keluar[$i] > $jumlah_masuk[$i]) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					Failed insert data!
			</div>');
					echo base_url() . '/Transaksi';
					// break;
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

			// echo json_encode($result);
			// return;
			// die();
			if ($this->M_transaksi->tambah_data($data) > 0 && $this->M_barang_keluar->tambah_data($result) > 0 && $this->M_barang_masuk->ubah_stok_masuk($dataMasuk) > 0) {

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

	/* delete data transaksi */
	public function delete()
	{
		$id_transaksi = $this->input->post('id_transaksi1');

		$this->m_transaksi->hapus_data($id_transaksi);
	}

	/* update harga transaksi */
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
