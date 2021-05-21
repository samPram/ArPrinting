<?php

class M_transaksi extends CI_Model
{
	function tampil_data()
	{
		// $this->db->select('*');
		// $this->db->from('');
	}

	function tambah_data($data)
	{
		$this->db->insert('transaksi', $data);
		return $this->db->affected_rows();
	}

	function hapus_data($id_transaksi)
	{
		$this->db->where(array('id_transaksi' => $id_transaksi));
		$this->db->delete(array('detail', 'transaksi'));
		redirect('../kasir/TransaksiControllerkasir');
	}

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
