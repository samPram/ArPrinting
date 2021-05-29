<?php

class M_transaksi extends CI_Model
{
	/* SELECT ALL DATA TRANSAKSI */
	function tampil_data($data)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		if ($data['id_transaksi']) $this->db->where('id_transaksi', $data['id_transaksi']);

		$this->db->order_by('id_transaksi', 'DESC');
		if ($data['id_transaksi']) return $this->db->get()->row_array();
		else return $this->db->get()->result_array();
	}

	/* SELECT COUNT DATA TRANSAKSI */
	public function tampil_getCountAll()
	{
		$this->db->select('COUNT(id_transaksi) as total');
		$this->db->from('transaksi');
		return $this->db->get()->row_array();
	}

	/* SELECT SUM TOTAL TRANSAKSI PER DAY */
	public function tampil_totalDay($data)
	{
		$this->db->select('SUM(total) as total');
		$this->db->from('transaksi');
		$this->db->where('DATE(tanggal)', $data['date']);
		return $this->db->get()->row_array();
	}

	/* SELECT COUNT DATA TRANSAKSI PER DAY */
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

	/* DELETE DATA TRANSAKSI */
	function hapus_data($id_transaksi)
	{
		$this->db->where(array('id_transaksi' => $id_transaksi));
		$this->db->delete(array('detail', 'transaksi'));
		redirect('../kasir/TransaksiControllerkasir');
	}

	/* UPDATE DATA TRANSAKSI */
	function ubah_harga($id_transaksi)
	{
		$data = array(
			'bayar' => $this->input->post('bayar'),
			'total' => $this->input->post('total'),
			'kembali' => $this->input->post('kembali'),
		);
		$this->db->where(array('id_transaksi' => $id_transaksi));
		$this->db->update('transaksi', $data);
		redirect('../kasir/TransaksiControllerkasir');
	}
}
