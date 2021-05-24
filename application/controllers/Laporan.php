<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_view_transaksi');
  }

  public function index()
  {
    if ($this->session->userdata('level') == 'Admin') {
      $data['data'] = $this->M_view_transaksi->tampil_data();

      $this->load->view('template/header');
      $this->load->view('template/topbar');
      $this->load->view('template/sidebar');
      $this->load->view('admin/v_laporanTransaksi', $data);
      $this->load->view('template/footer');
    } else {
      $this->load->view('404_page');
    }
  }

  public function getPeriode()
  {
    $start = date("Y-m-d", strtotime($this->input->post('start', true)));
    $end = date("Y-m-d", strtotime($this->input->post('end', true)));

    $data = ['start' => $start, 'end' => $end];
    $result['data'] = $this->M_view_transaksi->tampil_periode($data);
    echo json_encode($result['data']);
    return;
  }
}
