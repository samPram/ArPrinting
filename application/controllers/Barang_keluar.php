<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_keluar extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_barang_keluar');
    $this->load->model('M_return_barang');
  }

  /* Proses tampil data barang keluar by Id transaksi */
  public function showByIdTransaction($id = null)
  {
    $allIdKeluar = [];
    $id_keluar = $this->M_return_barang->tampil_idKeluar();
    foreach ($id_keluar as $val) {
      array_push($allIdKeluar, $val['id_keluar']);
    }
    $data['data'] = $this->M_barang_keluar->tampil_byIdTransaksi(['id_transaksi' => $id, 'id_keluar' => $allIdKeluar]);
    echo json_encode($data['data']);
    return;
  }
  /* END proses tampil data */

  /* proses request data barang keluar by Id keluar */
  public function showById($id = null)
  {
    $data['data'] = $this->M_barang_keluar->tampil_byId(['id_keluar' => $id]);
    echo json_encode($data['data']);
    return;
  }
  /* END request */
}
