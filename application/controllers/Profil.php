<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_user');
    $this->load->library('form_validation');
  }

  public function view_profil($id = null)
  {
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
    $this->form_validation->set_rules('re_password', 'Repeat password', 'required|trim|matches[password]');
    if ($this->form_validation->run() == FALSE) {
      $data['data'] = $this->M_user->tampil_data(['id_user' => $id]);
      $this->load->view('template/header');
      $this->load->view('template/topbar');
      $this->load->view('template/sidebar');
      $this->load->view('admin/v_profil', $data);
      $this->load->view('template/footer');
    } else {
      $id_user = htmlspecialchars($this->input->post('id_user', true));
      $username = htmlspecialchars($this->input->post('username', true));
      $password = md5($this->input->post('password', true));

      $data = ['username' => $username, 'password' => $password];
      if ($this->M_user->ubah_data($data, $id_user) > 0) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Success update profil.
                            </div>');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				Failed update profil!
		</div>');
      }
      redirect('profil/view_profil/' . $id_user);
    }
  }
}
