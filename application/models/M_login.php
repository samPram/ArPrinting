<?php
class M_login extends CI_Model
{

	/* SELECT USERNAME & PASSWORD LOGIN */
	public function auth($data)
	{
		$this->db->select('id_user, username, level, status_user');
		$this->db->from('ms_user');
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);

		return $this->db->get()->row_array();
	}
	/* END SELECT */
}
