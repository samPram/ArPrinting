<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Return_barang extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_view_transaksi');
    $this->load->model('M_return_barang');
    $this->load->model('M_barang_keluar');
  }

  public function index()
  {
    if ($this->session->userdata('level') == 'Kasir') {
      $data['data'] = $this->M_return_barang->tampil_data();

      $this->load->view('template/header');
      $this->load->view('template/topbar');
      $this->load->view('template/sidebar_kasir');
      $this->load->view('kasir/v_return', $data);
      $this->load->view('template/footer');
    } else {
      $this->load->view('404_page');
    }
  }

  public function view()
  {
    if ($this->session->userdata('level') == 'Kasir') {
      $data['data'] = $this->M_view_transaksi->tampil_data();

      $this->load->view('template/header');
      $this->load->view('template/topbar');
      $this->load->view('template/sidebar_kasir');
      $this->load->view('kasir/v_addReturn', $data);
      $this->load->view('template/footer');
    } else {
      $this->load->view('404_page');
    }
  }

  public function showById($id = null)
  {
    $data['data'] = $this->M_return_barang->tampil_byId(['id_return' => $id]);
    echo json_encode($data['data']);
    return;
  }

  public function add()
  {
    $id_keluar = $this->input->post('id_keluar', true);
    $jumlah = $this->input->post('jumlah_return', true);
    $harga = $this->input->post('harga_return', true);
    $total = $this->input->post('total_return', true);
    $jumlah_keluar = $this->input->post('jumlah_keluar', true);

    /* DATA REUTRN */
    $data = [
      'id_keluar' => $id_keluar,
      'jumlah_barang' => $jumlah,
      'harga_barang' => $harga,
      'total_barang' => $total
    ];

    /* DATA BARANG KELUAR */
    $data2 = [
      'jumlah_keluar' => $jumlah_keluar - $jumlah
    ];

    // echo $this->M_barang_keluar->ubah_data($data2, $id_keluar);
    // die();

    if ($this->M_return_barang->add($data) > 0 && $this->M_barang_keluar->ubah_data($data2, $id_keluar) > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Success insert data.
                            </div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Failed insert data!
                                    </div>');
    }

    redirect('return_barang');
    // echo var_dump($data);
    // die;
  }

  public function update()
  {
    $id_return = $this->input->post('id_return', true);
    $id_keluar = $this->input->post('id_keluar', true);
    $jumlah_keluar = $this->input->post('jumlah_keluar', true);
    $jumlah_return_cur = $this->input->post('jumlah_return_cur', true);
    $jumlah = $this->input->post('jumlah_return', true);
    $harga = $this->input->post('harga_return', true);
    $total = $this->input->post('total_return', true);

    $result = 0;
    if ($jumlah > $jumlah_return_cur) {
      $result = $jumlah_keluar - ($jumlah - $jumlah_return_cur);
    } else {
      $result = $jumlah_keluar + ($jumlah_return_cur - $jumlah);
    }

    /* DATA RETURN */
    $data = [
      'jumlah_barang' => $jumlah,
      'total_barang' => $total
    ];

    /* DATA BARANG KELUAR */
    $data2 = ['jumlah_keluar' => $result];

    // echo var_dump($data2);
    // die;

    if ($this->M_return_barang->ubah_data($data, $id_return) > 0 &&  $this->M_barang_keluar->ubah_data($data2, $id_keluar) > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Success update data.
  </div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Failed insert data!
                                    </div>');
    }

    redirect('return_barang');
  }

  public function delete($id_keluar = null, $jumlah_barang = null, $id_return = null)
  {
    $data = $this->M_barang_keluar->tampil_byId(['id_keluar' => $id_keluar]);
    $result = ['jumlah_keluar' => $data['jumlah_keluar'] + $jumlah_barang];

    if ($this->M_return_barang->hapus_data($id_return) > 0 && $this->M_barang_keluar->ubah_data($result, $id_keluar) > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Success deleting data.
    </div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Failed delete data!
    </div>');
    }
    redirect('Return_barang');
  }
}
