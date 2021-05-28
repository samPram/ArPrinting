<?php
class M_histori_masuk extends CI_Model
{
  public function tampil_dataByIdMasuk($id_masuk)
  {
    $this->db->select('*');
    $this->db->from('histori_masuk');
    $this->db->where('id_masuk', $id_masuk);
    return $this->db->get()->result_array();
  }

  public function tambah_data($data)
  {
    $this->db->insert('histori_masuk', $data);
    return $this->db->affected_rows();
  }

  public function tambah_many($data)
  {
    $this->db->insert_batch('histori_masuk', $data);
    return $this->db->affected_rows();
  }

  public function ubah_currentMasuk($data)
  {
    $this->db->update_batch('histori_masuk', $data, 'id_histori');
    return $this->db->affected_rows();
  }

  public function ubah_data($data, $id)
  {
    $this->db->set($data);
    $this->db->where('id_masuk', $id);
    $this->db->where('id_keluar', null);
    $this->db->update('histori_masuk');
    return $this->db->affected_rows();
  }
}
