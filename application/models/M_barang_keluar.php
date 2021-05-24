<?php

class M_barang_keluar extends CI_Model
{

  public function tampil_byIdTransaksi($data)
  {
    $this->db->select('a.*, b.nama_produk');
    $this->db->from('barang_keluar a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where('a.id_transaksi', $data['id_transaksi']);
    $this->db->where_not_in('a.id_keluar', $data['id_keluar']);
    $this->db->order_by('b.nama_produk', 'ASC');
    return $this->db->get()->result_array();
  }

  public function tampil_byId($data)
  {
    $this->db->select('a.*, b.nama_produk');
    $this->db->from('barang_keluar a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where('a.id_keluar', $data['id_keluar']);
    return $this->db->get()->row_array();
  }

  public function tambah_data($data)
  {
    $this->db->insert_batch('barang_keluar', $data);
    return $this->db->affected_rows();
  }

  public function ubah_data($data, $id)
  {
    $this->db->set($data);
    $this->db->where('id_keluar', $id);
    $this->db->update('barang_keluar');
    // echo $this->db->last_query();
    // die();
    return $this->db->affected_rows();
  }
}
