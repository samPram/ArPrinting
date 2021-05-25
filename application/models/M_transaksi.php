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
