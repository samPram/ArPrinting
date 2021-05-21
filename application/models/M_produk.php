<?php

class M_produk extends CI_Model
{

	public function tampil_data($data)
	{
		$this->db->select('*');
		$this->db->from('ms_produk');
		if ($data['id_produk']) $this->db->where('id_produk', $data['id_produk']);

		$this->db->order_by('nama_produk', 'ASC');
		if ($data['id_produk']) return $this->db->get()->row_array();
		else return  $this->db->get()->result_array();
	}

	public function total_data()
	{
		return $this->db->get('ms_produk')->num_rows();
	}

	public function tampil_list($limit, $offset)
	{
		return $this->db->get('ms_produk', $limit, $offset)->result_array();
	}

	function tambah_data($data)
	{
		$this->db->insert('ms_produk', $data);
		return $this->db->affected_rows();
	}

	function ubah_data($data, $id_produk)
	{
		$this->db->set($data);
		$this->db->where('id_produk', $id_produk);
		$this->db->update('ms_produk');
		// echo $this->db->last_query();
		// die();
		return $this->db->affected_rows();
	}

	function hapus_data($id_produk)
	{
		$this->db->delete('ms_produk', ['id_produk' => $id_produk]);
		return $this->db->affected_rows();
	}
}
