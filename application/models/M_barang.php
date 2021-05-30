<?php

class M_barang extends CI_Model
{

	/* SELECT MS_PRODUK */
	public function tampil_data($data)
	{
		$this->db->select('*');
		$this->db->from('ms_produk');
		if ($data['id_produk']) $this->db->where('id_produk', $data['id_produk']);

		$this->db->order_by('id_produk', 'DESC');
		if ($data['id_produk']) return $this->db->get()->row_array();
		else return  $this->db->get()->result_array();
	}
	/* END SELECT */

	/* SELECT COUNT DATA MS_PRODUK */
	public function total_data()
	{
		return $this->db->get('ms_produk')->num_rows();
	}
	/* END SELECT */

	/* SELECT COUNT(ID_PRODUK) FROM MS_PRODUK */
	public function tampil_getCountAll()
	{
		$this->db->select('COUNT(id_produk) as total');
		$this->db->from('ms_produk');
		return $this->db->get()->row_array();
	}
	/* END SELECT */

	/* INSERT MS_PRODUK */
	function tambah_data($data)
	{
		$this->db->insert('ms_produk', $data);
		return $this->db->affected_rows();
	}
	/* END INSERT */

	/* UPDATE MS_PRODUK BY ID */
	function ubah_data($data, $id_produk)
	{
		$this->db->set($data);
		$this->db->where('id_produk', $id_produk);
		$this->db->update('ms_produk');
		return $this->db->affected_rows();
	}
	/* END UPDATE */

	/* UPDATE MS_PRODUK BY ID */
	public function ubah_stok($id)
	{
		$this->db->select('SUM(jumlah_masuk) AS total');
		$this->db->from('barang_masuk');
		$this->db->where('id_produk', $id);
		$data = $this->db->get()->row_array();
		$this->db->set(['quantity' => $data['total']]);
		$this->db->where('id_produk', $id);
		$this->db->update('ms_produk');

		return $this->db->affected_rows();
	}
	/* END UPDATE */

	/* DELETE MS_PRODUK BY ID */
	function hapus_data($id_produk)
	{
		$this->db->delete('ms_produk', ['id_produk' => $id_produk]);
		return $this->db->affected_rows();
	}
	/* END DELETE */
}
