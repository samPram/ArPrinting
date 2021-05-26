<?php

class M_barang_keluar extends CI_Model
{

  /* SELECT DATA BARANG KELUAR BY ID TRANSAKSI */
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

  /* SELECT DATA BARANG KELUAR BY ID KELUAR */
  public function tampil_byId($data)
  {
    $this->db->select('a.*, b.nama_produk');
    $this->db->from('barang_keluar a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where('a.id_keluar', $data['id_keluar']);
    return $this->db->get()->row_array();
  }

  /* SELECT BARANG BEST SELL PER DAY */
  public function tampil_bestSell($data)
  {
    $this->db->select('b.nama_produk as barang');
    $this->db->from('barang_keluar a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where('DATE(a.tgl_keluar)', $data['date']);
    $this->db->where('a.jumlah_keluar', 'select MAX(jumlah_keluar) from barang_keluar where date(tgl_keluar) = current_date()');
    return $this->db->get()->row_array();
  }

  /* SELECT HIGH TOTAL PER DAY */
  public function tampil_hargaTotal($data)
  {
    $this->db->select('total_harga_keluar');
    $this->db->from('barang_keluar');
    $this->db->where('DATE(tgl_keluar)', $data['date']);
    $this->db->where('total_harga_keluar = (select MAX(total_harga_keluar) from barang_keluar where date(tgl_keluar) = current_date())');
    // $this->db->get();
    // echo $this->db->last_query();
    // die;
    return $this->db->get()->row_array();
  }

  /* INSERT DATA BARANG KELUAR */
  public function tambah_data($data)
  {
    $this->db->insert_batch('barang_keluar', $data);
    return $this->db->affected_rows();
  }

  /* UPDATE DATA BARANG KELUAR */
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
