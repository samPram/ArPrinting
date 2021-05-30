<?php

class M_user extends CI_Model
{
	/* SELECT DATA MS_USER */
	function tampil_data($data)
	{
		$this->db->select('*');
		$this->db->from('ms_user');
		if ($data['id_user']) {
			$this->db->where('id_user', $data['id_user']);
		}

		$this->db->order_by('id_user', 'DESC');
		if ($data['id_user']) return $this->db->get()->row_array();
		else return  $this->db->get()->result_array();
	}
	/* END SELECT */

	/* SELECT COUNT ALL DATA */
	public function tampil_getCountAll()
	{
		$this->db->select('COUNT(id_user) as total');
		$this->db->from('ms_user');
		return $this->db->get()->row_array();
	}
	/* END SELECT */

	/* INSERT DATA MS_USER */
	function tambah_data($data)
	{
		$this->db->insert('ms_user', $data);
		return $this->db->affected_rows();
	}
	/* END INSERT */

	/* UPDATE DATA MS_USER BY ID */
	function ubah_data($data, $id_user)
	{
		$this->db->set($data);
		$this->db->where('id_user', $id_user);
		$this->db->update('ms_user');

		return $this->db->affected_rows();
	}
	/* END UPDATE */

	/* DELETE DATA MS_USER BY ID */
	function hapus_data($id_user)
	{
		$this->db->delete('ms_user', ['id_user' => $id_user]);
		return $this->db->affected_rows();
	}
	/* END DELETE */
}
