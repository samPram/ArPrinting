<?php

class M_transaksi extends CI_Model
{
	/* SELECT TRANSAKSI */
	function tampil_data($data)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		if ($data['id_transaksi']) $this->db->where('id_transaksi', $data['id_transaksi']);

		$this->db->order_by('id_transaksi', 'DESC');
		if ($data['id_transaksi']) return $this->db->get()->row_array();
		else return $this->db->get()->result_array();
	}
	/* END SELECT */

	/* SELECT COUNT(ID_TRANSAKSI) FROM TRANSAKSI */
	public function tampil_getCountAll()
	{
		$this->db->select('COUNT(id_transaksi) as total');
		$this->db->from('transaksi');
		return $this->db->get()->row_array();
	}
	/* END SELECT */

	/* SELECT SUM(TOTAL) FROM TRANSAKSI PER DAY */
	public function tampil_totalDay($data)
	{
		$this->db->select('SUM(total) as total');
		$this->db->from('transaksi');
		$this->db->where('DATE(tanggal)', $data['date']);
		return $this->db->get()->row_array();
	}
	/* END SELECT */

	/* SELECT COUNT(ID_TRANSAKASI) TRANSAKSI PER DAY */
	public function tampil_CountDay()
	{
		$this->db->select('COUNT(id_transaksi) as total');
		$this->db->from('transaksi');
		$this->db->where('DATE(tanggal)=current_date()');
		return $this->db->get()->row_array();
	}
	/* END SELECT COUNT DATA */

	/* INSERT DATA TRANSAKSI */
	function tambah_data($data)
	{
		$this->db->insert('transaksi', $data);
		return $this->db->affected_rows();
	}
	/* END INSERT */

	/* DELETE TRANSAKSI BY ID */
	public function hapus_data($id)
	{
		$this->db->delete('transaksi', ['id_transaksi' => $id]);
		return $this->db->affected_rows();
	}
	/* END DELETE */
}
