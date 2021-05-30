<?php

class M_return_barang extends CI_Model
{
  /* SELECT DATA RETURN_BARANG JOIN BARANG_KELUAR JOIN MS_PRODUK */
  public function tampil_data()
  {
    $this->db->select('a.*, b.id_produk, b.id_transaksi, c.nama_produk');
    $this->db->from('return_barang a');
    $this->db->join('barang_keluar b', 'b.id_keluar = a.id_keluar');
    $this->db->join('ms_produk c', 'c.id_produk = b.id_produk');
    $this->db->order_by('a.id_return', 'DESC');
    return $this->db->get()->result_array();
  }
  /* END SELECT */

  /* SELECT ID KELUAR FROM RETURN_BARANG */
  public function tampil_idKeluar()
  {
    $this->db->select('id_keluar');
    $this->db->from('return_barang');
    return $this->db->get()->result_array();
  }
  /* END SELECT */

  /* SELECT RETURN_BARANG JOIN BARANG_KELUAR JOIN MS_PRODUK BY ID RETURN */
  public function tampil_byId($data)
  {
    $this->db->select('a.*, b.jumlah_keluar, b.id_produk, b.id_transaksi, c.nama_produk');
    $this->db->from('return_barang a');
    $this->db->join('barang_keluar b', 'b.id_keluar = a.id_keluar');
    $this->db->join('ms_produk c', 'c.id_produk = b.id_produk');
    $this->db->where('a.id_return', $data['id_return']);
    return $this->db->get()->row_array();
  }
  /* END SELECT */

  /* SELECT COUNT(ID_RETURN) FROM RETURN_BARANG */
  public function tampil_getCountAll()
  {
    $this->db->select('COUNT(id_return) as total');
    $this->db->from('return_barang');
    return $this->db->get()->row_array();
  }
  /* END SELECT */

  /* INSERT RETURN_BARANG */
  public function add($data)
  {
    $this->db->insert('return_barang', $data);
    return $this->db->affected_rows();
  }
  /* END INSERT BARANG */

  /* UPDATE RETURN_BARANG BY ID */
  public function ubah_data($data, $id)
  {
    $this->db->set($data);
    $this->db->where('id_return', $id);
    $this->db->update('return_barang');
    return $this->db->affected_rows();
  }
  /* END UPDATE */

  /* DELETE RETURN_BARANG BY ID */
  public function hapus_data($id)
  {
    $this->db->delete('return_barang', ['id_return' => $id]);
    return $this->db->affected_rows();
  }
  /* END DELETE */
}
