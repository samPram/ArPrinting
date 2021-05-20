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
		// $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		// $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

		// $query = $this->db->query("SELECT * FROM ms_user WHERE username='" . $username . "' AND password='" . MD5($password) . "'");
		// foreach ($query->result() as $row) {
		// 	$this->session->set_userdata('submit', TRUE);
		// 	$this->session->set_userdata('id', $row->id_user);
		// 	$this->session->set_userdata('username', $row->username);
		// 	if ($row->level == 'Admin') {
		// 		$this->session->set_userdata('akses', '1');
		// 		redirect('admin/welcome');
		// 	} else {
		// 		$this->session->set_userdata('akses', '2');
		// 		redirect('kasir/welcome');
		// 	}
		// }
		// echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
		// redirect(base_url());

		//echo "<script>
		//	alert('Username Atau Password Salah');
		//	window.location.replace('".base_url()."');
		//</script>";
	}
}
