<?php

class M_barang_masuk extends CI_Model
{
  /* SELECT BARANG_MASUK */
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
  /* END SELECT */

  /* SELECT BARANG_MASUK JOIN MS_PRODUK WHERE ID_MASUK */
  public function tampil_detail($data)
  {
    $this->db->select('a.id_masuk, a.id_produk, b.nama_produk, a.tgl_masuk, a.jumlah_masuk, a.harga_masuk, a.total_harga_masuk');
    $this->db->from('barang_masuk a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where('a.id_masuk', $data['id_masuk']);
    return $this->db->get()->row_array();
  }
  /* END SELECT */

  /* SELECT BARANG_MASUK JOIN MS_PRODUK WHERE NOT IN JUMLAH_MASUK = 0 GROUP BY ID_PRODUK */
  public function tampil_stok()
  {

    $this->db->select('a.id_masuk, a.id_produk, a.tgl_masuk, a.jumlah_masuk, a.harga_masuk, a.total_harga_masuk, b.nama_produk, b.image');
    $this->db->from('barang_masuk a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where_not_in('a.jumlah_masuk', 0);
    $this->db->group_by('a.id_produk');
    $this->db->order_by('a.tgl_masuk', 'ASC');
    return $this->db->get()->result_array();
  }
  /* END SELECT */

  /* SELECT BARANG_MASUK JOIN MS_PRODUK WHERE IN ID MASUK WHERE NOT IN JUMLAH_MASUK = 0 GROUP BY ID_PRODUK */
  public function tampil_stokCard($data)
  {

    $this->db->select('a.id_masuk, a.id_produk, a.tgl_masuk, a.jumlah_masuk, a.harga_masuk, a.total_harga_masuk, b.nama_produk, b.image');
    $this->db->from('barang_masuk a');
    $this->db->join('ms_produk b', 'b.id_produk = a.id_produk');
    $this->db->where_in('a.id_masuk', $data);
    $this->db->where_not_in('a.jumlah_masuk', 0);
    $this->db->group_by('a.id_produk');
    $this->db->order_by('a.tgl_masuk', 'ASC');
    return $this->db->get()->result_array();
  }
  /* END SELECT */

  /* SELECT MAX(ID_MASUK) ROM BARANG_MASUK */
  public function tampil_maxId()
  {
    $this->db->select_max('id_masuk');
    $this->db->from('barang_masuk');
    return $this->db->get()->row_array();
  }
  /* END SELECT */

  /* INSERT BARANG MASUK */
  public function tambah_data($data)
  {
    $this->db->insert('barang_masuk', $data);
    return $this->db->affected_rows();
  }
  /* END INSERT */

  /* UPDATE BARANG MASUK BY ID */
  public function ubah_data($data, $id)
  {
    $this->db->set($data);
    $this->db->where('id_masuk', $id);
    $this->db->update('barang_masuk');
    return $this->db->affected_rows();
  }
  /* END UPDATE */

  /* UPDATE STOK BARANG MASUK BY ID */
  public function ubah_stok_masuk($data)
  {
    $this->db->update_batch('barang_masuk', $data, 'id_masuk');
    return $this->db->affected_rows();
  }
  /* END UPDATE */

  /* DELETE BARANG MASUK BY ID */
  public function delete_data($id)
  {
    $this->db->delete('barang_masuk', ['id_masuk' => $id]);
    return $this->db->affected_rows();
  }
  /* END DELETE */
}
