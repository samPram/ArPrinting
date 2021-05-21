<?php

class M_view_transaksi extends CI_Model
{
  public function tampil_data()
  {
    $this->db->select('id_transaksi, id_user, tanggal, bayar, total, kembali, COUNT(id_transaksi) AS jumlah');
    $this->db->from('view_transaksi');
    $this->db->group_by('id_transaksi');
    $this->db->order_by('id_transaksi', 'DESC');
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
}
