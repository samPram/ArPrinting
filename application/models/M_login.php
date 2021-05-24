<?php
class M_login extends CI_Model
{

	public function auth($data)
	{
		$this->db->select('id_user, username, level, status_user');
		$this->db->from('ms_user');
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		// echo $this->db->last_query();
		// die();
		return $this->db->get()->row_array();
	}
}
