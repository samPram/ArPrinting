<?php

class M_view_transaksi extends CI_Model
{
  public function tampil_data()
  {
    $this->db->select('*');
    $this->db->from('view_transaksi');
    $this->db->order_by('DATE(tanggal)', 'DESC');
    return $this->db->get()->result_array();
  }

  public function tampil_detail($data)
  {
    $this->db->select('id_produk, nama_produk, harga, jumlah, sub_total');
    $this->db->from('view_transaksi');
    $this->db->where('id_transaksi', $data['id_transaksi']);
    $this->db->order_by('nama_produk', 'ASC');
    return $this->db->get()->result_array();
  }

  public function tampil_periode($data)
  {
    $this->db->select('*');
    $this->db->from('view_transaksi');
    $this->db->where('DATE(tanggal) >= ', $data['start']);
    $this->db->where('DATE(tanggal) <= ', $data['end']);
    $this->db->order_by('tanggal', 'DESC');
    return $this->db->get()->result_array();
  }
}
