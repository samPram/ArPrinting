<?php

class M_barang_keluar extends CI_Model
{

  /* SELECT BARANG KELUAR JOIN MS_PRODUK BY ID TRANSAKSI */
  public function tampil_byIdTransaksi($data)
  {
    $this->db->select('a.*, b.nama_produk');
    $this->db->from('barang_keluar a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where('a.id_transaksi', $data['id_transaksi']);
    if ($data['id_keluar'] != null) $this->db->where_not_in('a.id_keluar', $data['id_keluar']);
    $this->db->order_by('b.nama_produk', 'ASC');
    return $this->db->get()->result_array();
  }
  /* END SELECT */

  /* SELECT BARANG_KELUAR BY ID KELUAR */
  public function tampil_byId($data)
  {
    $this->db->select('a.*, b.nama_produk');
    $this->db->from('barang_keluar a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where('a.id_keluar', $data['id_keluar']);
    return $this->db->get()->row_array();
  }
  /* END SELECT */

  /* SELECT BARANG_KELUAR JOIN MS_PRODUK WHERE MAX(JUMLAH_KELUAR) PER DAY */
  public function tampil_bestSell($data)
  {
    $this->db->select('a.*, b.nama_produk');
    $this->db->from('barang_keluar a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where('DATE(a.tgl_keluar)', $data['date']);
    $this->db->where('a.jumlah_keluar=(select MAX(jumlah_keluar) from barang_keluar where date(tgl_keluar) = current_date())');
    return $this->db->get()->result_array();
  }
  /* END SELECT */

  /* SELECT BARANG_KELUAR WHERE MAX(TOTAL_HARGA_KELUAR) PER DAY */
  public function tampil_hargaTotal($data)
  {
    $this->db->select('total_harga_keluar');
    $this->db->from('barang_keluar');
    $this->db->where('DATE(tgl_keluar)', $data['date']);
    $this->db->where('total_harga_keluar = (select MAX(total_harga_keluar) from barang_keluar where date(tgl_keluar) = current_date())');
    return $this->db->get()->row_array();
  }
  /* END SELECT */

  /* SELECT ID_KELUAR FROM BARANG_kELUAR BY ID TRANSAKSI */
  public function tampil_maxId($id_transaksi)
  {
    $this->db->select('id_keluar');
    $this->db->from('barang_keluar');
    $this->db->where('id_transaksi', $id_transaksi);
    $this->db->order_by('id_keluar', 'ASC');
    return $this->db->get()->result_array();
  }
  /* END SELECT */

  /* INSERT BARANG_KELUAR */
  public function tambah_data($data)
  {
    $this->db->insert_batch('barang_keluar', $data);
    return $this->db->affected_rows();
  }
  /* END INSERT */

  /* UPDATE BARANG_KELUAR BY ID */
  public function ubah_data($data, $id)
  {
    $this->db->set($data);
    $this->db->where('id_keluar', $id);
    $this->db->update('barang_keluar');
    return $this->db->affected_rows();
  }
  /* END UPDATE */
}
