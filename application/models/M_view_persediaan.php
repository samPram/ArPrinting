<?php

class M_view_persediaan extends CI_Model
{
  public function tampil_data($data)
  {
    $this->db->select('*');
    $this->db->from('view_persediaan');
    $this->db->where('id_produk', $data['id_produk']);
    $this->db->order_by('id_histori', 'ASC');
    // $this->db->order_by('tgl_keluar', 'ASC');
    return $this->db->get()->result_array();
  }
}
