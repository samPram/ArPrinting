<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

        function __construct()
        {
                parent::__construct();
                $this->load->model('M_user');
                $this->load->library('form_validation');
        }

        public function index()
        {
                if ($this->session->userdata('level') == 'Admin') {
                        $data['data'] = $this->M_user->tampil_data(['id_user' => null]);
                        $this->load->view('template/header');
                        $this->load->view('template/topbar');
                        $this->load->view('template/sidebar');
                        $this->load->view('admin/v_user', $data);
                        $this->load->view('template/footer');
                } else {
                        $this->load->view('404_page');
                }
        }

        public function getCountAll()
        {
                $data['data'] = $this->M_user->tampil_getCountAll();
                echo json_encode($data['data']);
                return;
        }

        public function add()
        {
                $id_user = $this->input->post('id_user');

                if (empty($id_user))
                        $this->m_user->tambah_data();

                else
                        $this->m_user->ubah_data($id_user);
        }

        public function update($id = null)
        {
                $data = ['id_user' => $id];
                $result['data'] = $this->M_user->tampil_data($data);
                $this->form_validation->set_rules('username', 'Username', 'required|trim');
                $this->form_validation->set_rules('password', 'Password', 'required|trim');
                $this->form_validation->set_rules('level', 'Level', 'required|trim');
                $this->form_validation->set_rules('status', 'Status', 'required|trim');

                if ($this->form_validation->run() == false) {
                        $this->load->view('template/header');
                        $this->load->view('template/topbar');
                        $this->load->view('template/sidebar');
                        $this->load->view('admin/v_updateUser', $result);
                        $this->load->view('template/footer');
                } else {
                        $username = htmlspecialchars($this->input->post('username', true));
                        $password = htmlspecialchars($this->input->post('password', true));
                        $level = str_replace('.', '', $this->input->post('level', true));
                        $status = htmlspecialchars($this->input->post('status', true));

                        $data = [
                                'username' => $username,
                                'password' => md5($password),
                                'level' => $level,
                                'status_user' => $status
                        ];

                        if ($this->M_user->ubah_data($data, $id) > 0) {
                                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Success update data.
                            </div>');
                        } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Failed update data!
                                    </div>');
                        }

                        redirect('user');
                }
        }


        public function delete($id = null)
        {
                if ($this->M_user->hapus_data($id) > 0) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Success deleting data.
                    </div>');
                } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Failed delete data!
                    </div>');
                }
                redirect('user');
        }
}
