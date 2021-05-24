<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

        function __construct()
        {
                parent::__construct();
                $this->load->model('M_barang');
                $this->load->library('form_validation');
        }

        public function index()
        {
                if ($this->session->userdata('level') == 'Admin') {
                        $id = ($this->input->get('id_produk', true)) ? htmlspecialchars($this->input->get('id_produk', true)) : null;

                        $data = [
                                'id_produk' => $id
                        ];
                        $data['data'] = $this->M_barang->tampil_data($data);

                        $this->load->view('template/header');
                        $this->load->view('template/topbar');
                        $this->load->view('template/sidebar');
                        $this->load->view('admin/v_barang', $data);
                        $this->load->view('template/footer');
                } else {
                        $this->load->view('404_page');
                }
        }

        public function showById($id = null)
        {
                $data = ['id_produk' => $id];
                $result['data'] = $this->M_barang->tampil_data($data);
                echo json_encode($result['data']);
                return;
        }

        public function getCountAll()
        {
                $data['data'] = $this->M_barang->tampil_getCountAll();
                echo json_encode($data['data']);
                return;
        }

        public function add()
        {
                if ($this->session->userdata('level') == 'Admin') {

                        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
                        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');

                        if ($this->form_validation->run() == false) {
                                $this->load->view('template/header');
                                $this->load->view('template/topbar');
                                $this->load->view('template/sidebar');
                                $this->load->view('admin/v_tambahBarang');
                                $this->load->view('template/footer');
                        } else {
                                $nama = htmlspecialchars($this->input->post('nama', true));
                                $satuan = htmlspecialchars($this->input->post('satuan', true));
                                $data = [
                                        'nama_produk' => $nama,
                                        'satuan' => $satuan,
                                        'quantity' => 0
                                ];

                                if ($this->M_barang->tambah_data($data) > 0) {
                                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Success inserting data.
                            </div>');
                                } else {
                                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Failed insert data!
                                    </div>');
                                }

                                redirect('barang');
                        }
                } else {
                        $this->load->view('404_page');
                }
        }

        public function delete($id = null)
        {
                if ($this->M_barang->hapus_data($id) > 0) {
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
                redirect('barang');
        }

        public function update($id = null)
        {
                $data = ['id_produk' => $id];
                $result['data'] = $this->M_barang->tampil_data($data);
                $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
                $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');

                if ($this->form_validation->run() == false) {
                        $this->load->view('template/header');
                        $this->load->view('template/topbar');
                        $this->load->view('template/sidebar');
                        $this->load->view('admin/v_updateBarang', $result);
                        $this->load->view('template/footer');
                } else {
                        $nama = htmlspecialchars($this->input->post('nama', true));
                        $satuan = htmlspecialchars($this->input->post('satuan', true));
                        // $harga = str_replace('.', '', $this->input->post('harga', true));
                        // $quantity = htmlspecialchars($this->input->post('jumlah', true));

                        $data = [
                                'nama_produk' => $nama,
                                'satuan' => $satuan
                        ];

                        if ($this->M_barang->ubah_data($data, $id) > 0) {
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

                        redirect('barang');
                }
        }
}
