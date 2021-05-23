<?php

class M_barang_keluar extends CI_Model
{

  public function tambah_data($data)
  {
    $this->db->insert_batch('barang_keluar', $data);
    return $this->db->affected_rows();
  }
}
