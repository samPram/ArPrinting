<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_barang_masuk');
    $this->load->model('M_barang');
    $this->load->library('form_validation');
  }
  public function index()
  {
    # code...
  }

  public function showById($id = null)
  {
    $data = ['id_produk' => $id, 'id_masuk' => null];
    $result['data'] = $this->M_barang_masuk->tampil_data($data);
    echo json_encode($result['data']);
    return;
  }

  public function add()
  {
    if ($this->session->userdata('level') == 'Admin') {

      $id_prdouk = htmlspecialchars($this->input->post('id_produk', true));
      $jumlah = htmlspecialchars($this->input->post('jumlah_masuk', true));
      $harga = str_replace('.', '', $this->input->post('harga_masuk', true));
      $total = htmlspecialchars($this->input->post('total_harga', true));

      if ($jumlah <= 0) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Jumlah value can\'t 0 value or negativ value!
                  </div>');
        redirect('barang');
        die;
      }

      $data = [
        'id_produk' => $id_prdouk,
        'tgl_masuk' => date('Y-m-d'),
        'jumlah_masuk' => $jumlah,
        'harga_masuk' => $harga,
        'total_harga_masuk' => $total
      ];

      // echo var_dump($data);
      // die;

      if ($this->M_barang_masuk->tambah_data($data) > 0 && $this->M_barang->ubah_stok($id_prdouk) > 0) {
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
      redirect('barang');
    } else {
      $this->load->view('404_page');
    }
  }

  public function tampil_update($id = null)
  {
    $data['data'] = $this->M_barang_masuk->tampil_detail(['id_masuk' => $id]);
    if ($this->session->userdata('level') == 'Admin') {
      // echo var_dump($data['data']);
      // die;
      $this->load->view('template/header');
      $this->load->view('template/topbar');
      $this->load->view('template/sidebar');
      $this->load->view('admin/v_updateBarangMasuk', $data);
      $this->load->view('template/footer');
    } else {
      $this->load->view('404_page');
    }
  }

  public function update()
  {
    $id = htmlspecialchars($this->input->post('id_masuk', true));
    $id_produk = htmlspecialchars($this->input->post('id_produk', true));
    $jumlah = htmlspecialchars($this->input->post('jumlah_masuk', true));
    $harga = str_replace('.', '', $this->input->post('harga_masuk', true));
    $total = htmlspecialchars($this->input->post('total_harga', true));

    if ($jumlah <= 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Jumlah value can\'t 0 value or negativ value!
                </div>');
      redirect('barang');
      die;
    }

    $data = [
      'jumlah_masuk' => $jumlah,
      'harga_masuk' => $harga,
      'total_harga_masuk' => $total
    ];

    // echo var_dump($data);
    // echo $id . '<br>';
    // echo $id_produk;
    // die;

    if ($this->M_barang_masuk->ubah_data($data, $id) > 0 && $this->M_barang->ubah_stok($id_produk) > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Success update data.
    </div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Failed update data!
    </div>');
    }
    redirect('barang');
  }

  public function delete($id_masuk = null, $id_prdouk = null)
  {
    if ($this->session->userdata('level') == 'Admin') {
      if ($this->M_barang_masuk->delete_data($id_masuk) > 0 && $this->M_barang->ubah_stok($id_prdouk) > 0) {
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
      redirect('barang');
    } else {
      $this->load->view('404_page');
    }
  }
}
