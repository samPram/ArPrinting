<?php

class M_barang_masuk extends CI_Model
{
  /* SELECT ALL DATA BARANG MASUK */
  public function tampil_data($data)
  {
    $this->db->select('*');
    $this->db->from('barang_masuk');
    if ($data['id_masuk']) $this->db->where('id_masuk', $data['id_masuk']);
    if ($data['id_produk']) $this->db->where('id_produk', $data['id_produk']);

    $this->db->order_by('id_masuk', 'DESC');
    if ($data['id_masuk']) return $this->db->get()->row_array();
    else return $this->db->get()->result_array();
  }

  /* SELECT DATA BARANG MASUK BY ID MASUK */
  public function tampil_detail($data)
  {
    $this->db->select('a.id_masuk, a.id_produk, b.nama_produk, a.tgl_masuk, a.jumlah_masuk, a.harga_masuk, a.total_harga_masuk');
    $this->db->from('barang_masuk a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where('a.id_masuk', $data['id_masuk']);
    return $this->db->get()->row_array();
  }

  /* SELECT FIRST ROW DATA BARANG MASUK */
  public function tampil_firs($data)
  {
    $this->db->select('a.id_masuk, a.id_produk, b.nama_produk, a.tgl_masuk, a.jumlah_masuk, a.harga_masuk, a.total_harga_masuk');
    $this->db->from('barang_masuk a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where('a.id_produk', $data['id_produk']);
    $this->db->order_by('a.id_masuk', 'ASC');
    return $this->db->get()->result_array();
  }

  /* SELECT STOK DATA BARANG MASUK */
  public function tampil_stok()
  {
    // SELECT a.id_masuk, a.id_produk, a.tgl_masuk, a.jumlah_masuk, a.harga_masuk, a.total_harga_masuk, b.nama_produk FROM barang_masuk a JOIN ms_produk b ON b.id_produk = a.id_produk WHERE a.jumlah_masuk NOT IN(0) GROUP by id_produk ORDER BY tgl_masuk ASC

    $this->db->select('a.id_masuk, a.id_produk, a.tgl_masuk, a.jumlah_masuk, a.harga_masuk, a.total_harga_masuk, b.nama_produk, b.image');
    $this->db->from('barang_masuk a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where_not_in('a.jumlah_masuk', 0);
    $this->db->group_by('a.id_produk');
    $this->db->order_by('a.tgl_masuk', 'ASC');
    return $this->db->get()->result_array();
  }

  public function tampil_searchStok($data)
  {
    $this->db->select('a.id_masuk, a.id_produk, a.tgl_masuk, a.jumlah_masuk, a.harga_masuk, a.total_harga_masuk, b.nama_produk, b.image');
    $this->db->from('barang_masuk a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->like('b.nama_produk', $data['nama_produk']);
    $this->db->where_not_in('a.jumlah_masuk', 0);
    $this->db->group_by('a.id_produk');
    $this->db->order_by('a.tgl_masuk', 'ASC');
    return $this->db->get()->result_array();
  }

  public function tampil_stokCard($data)
  {
    // SELECT a.id_masuk, a.id_produk, a.tgl_masuk, a.jumlah_masuk, a.harga_masuk, a.total_harga_masuk, b.nama_produk FROM barang_masuk a JOIN ms_produk b ON b.id_produk = a.id_produk WHERE a.jumlah_masuk NOT IN(0) GROUP by id_produk ORDER BY tgl_masuk ASC

    $this->db->select('a.id_masuk, a.id_produk, a.tgl_masuk, a.jumlah_masuk, a.harga_masuk, a.total_harga_masuk, b.nama_produk, b.image');
    $this->db->from('barang_masuk a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where_in('a.id_masuk', $data);
    $this->db->where_not_in('a.jumlah_masuk', 0);
    $this->db->group_by('a.id_produk');
    $this->db->order_by('a.tgl_masuk', 'ASC');
    return $this->db->get()->result_array();
  }

  /* SELECT MAX ID BARANG MASUK */
  public function tampil_maxId()
  {
    $this->db->select_max('id_masuk');
    $this->db->from('barang_masuk');
    return $this->db->get()->row_array();
  }

  /* INSERT DATA BARANG MASUK */
  public function tambah_data($data)
  {
    $this->db->insert('barang_masuk', $data);
    return $this->db->affected_rows();
  }

  /* UPDATE DATA BARANG MASUK */
  public function ubah_data($data, $id)
  {
    $this->db->set($data);
    $this->db->where('id_masuk', $id);
    $this->db->update('barang_masuk');
    return $this->db->affected_rows();
  }

  /* UPDATE STOK BARANG MASUK */
  public function ubah_stok_masuk($data)
  {
    $this->db->update_batch('barang_masuk', $data, 'id_masuk');
    // return $this->db->last_query();
    return $this->db->affected_rows();
  }

  /* DELETE DATA BARANG MASUK */
  public function delete_data($id)
  {
    $this->db->delete('barang_masuk', ['id_masuk' => $id]);
    return $this->db->affected_rows();
  }
}
