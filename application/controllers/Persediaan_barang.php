<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persediaan_barang extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_view_persediaan');
    $this->load->model('M_barang');
    $this->load->library('Pdf');
  }

  /* Tampil kartu persedian barang */
  public function index()
  {
    if ($this->session->userdata('level') == 'Admin') {
      $data['data'] = $this->M_barang->tampil_data(['id_produk' => null]);

      $this->load->view('template/header');
      $this->load->view('template/topbar');
      $this->load->view('template/sidebar');
      $this->load->view('admin/v_persediaan', $data);
      $this->load->view('template/footer');
    } else {
      $this->load->view('404_page');
    }
  }

  public function getPersediaan($id_barang = null)
  {
    $data = ['id_produk' => $id_barang];
    $result['data'] = $this->M_view_persediaan->tampil_data($data);
    echo json_encode($result['data']);
    return;
  }
  /* END tampil */

  /* print kartu persedian barang */
  public function create_pdf($id_barang = null, $nama_barang = null)
  {
    if ($this->session->userdata('level') == 'Admin') {
      $data = ['id_produk' => $id_barang];
      $result = $this->M_view_persediaan->tampil_data($data);

      $pdf = new TCPDF('L', 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);

      // set document information
      $pdf->SetTitle('Laporan Persedian Barang');

      // set margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(0);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

      // set auto page breaks
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      // ---------------------------------------------------------

      $pdf->SetDisplayMode('real', 'default');

      // Add a page
      // This method has several options, check the source code documentation for more information.
      $pdf->AddPage();

      $totalUnitMasuk = 0;
      $totalUnitKeluar = 0;
      $totalPersedian = 0;
      $totalHargaMasuk = 0;
      $totalHargaKeluar = 0;
      $totalHarga = 0;
      $i = 0;
      // Set some content to print
      $html = '
              <h1 align="center">Laporan Kartu Persedian Barang<br>UD Nafi Kota Madiun</h1>
      
        <table>
          <tr>
            <td width="10%">Id Barang</td>
            <td> : ' . $id_barang . '</td>
          </tr>
          <tr>
            <td width="10%">Nama Barang</td>
            <td> : ' . $nama_barang . '</td>
          </tr>
        </table>
  
              <table cellspacing="1" cellpadding="2" border="1" align="center">
                      <tr>
                        <th widht="5%" rowspan="2">No</th>
                        <th rowspan="2">Tanggal</th>
                        <th colspan="3">Pembelian</th>
                        <th colspan="3">Harga Pokok Penjualan</th>
                        <th colspan="3">Persediaan</th>
                      </tr>
                      <tr>
                          <th>Unit</th>
                          <th>Harga/Unit (Rp.)</th>
                          <th>Total Harga (Rp.)</th>
                          <th>Unit</th>
                          <th>Harga/Unit (Rp.)</th>
                          <th>Total Harga (Rp.)</th>
                          <th>Unit</th>
                          <th>Harga/Unit (Rp.)</th>
                          <th>Total Harga (Rp.)</th>
                      </tr>
  <tbody>';

      foreach ($result as $val) {
        $jumlah_masuk = ($val['id_keluar'] == null) ? $val['current_masuk'] : 0;
        $tanggal = ($val['id_keluar']) ? $val['tgl_keluar'] : $val['tgl_masuk'];
        $total_harga_masuk = $jumlah_masuk * $val['harga_masuk'];
        $html .= ' <tr>
                    <td widht="5%">' . $i++ . '</td>
                    <td>' . $tanggal . '</td>
                    <td align="right">' . $jumlah_masuk . '</td>
                    <td align="right">' . number_format($val['harga_masuk'], 0, '', '.') . '</td>
                    <td align="right">' . number_format($total_harga_masuk, 0, '', '.') . '</td>
                    <td align="right">' . $val['jumlah_keluar'] . '</td>
                    <td align="right">' . number_format($val['harga_keluar'], 0, '', '.') . '</td>
                    <td align="right">' . number_format($val['total_harga_keluar'], 0, '', '.') . '</td>
                    <td align="right">' . $val['current_masuk'] . '</td>
                    <td align="right">' . number_format($val['harga_masuk'], 0, '', '.') . '</td>
                    <td align="right">' . number_format($val['total'], 0, '', '.') . '</td>
                  </tr>';
        $totalUnitMasuk += $jumlah_masuk;
        $totalUnitKeluar += $val['jumlah_keluar'];
        $totalHargaMasuk += $total_harga_masuk;
        $totalHargaKeluar += $val['total_harga_keluar'];
        $totalHarga += $val['total'];
      }

      $totalPersediaan = $totalUnitMasuk - $totalUnitKeluar;
      $html .= '<tr>
      <td widht="5%">total</td>
      <td></td>
      <td align="right"><b>' . $totalUnitMasuk . '</b></td>
      <td></td>
      <td align="right"><b>' . number_format($totalHargaMasuk, 0, '', '.') . '</b></td>
      <td align="right"><b>' . $totalUnitKeluar . '</b></td>
      <td></td>
      <td align="right"><b>' . number_format($totalHargaKeluar, 0, '', '.') . '</b></td>
      <td align="right"><b>' . $totalPersediaan . '</b></td>
      <td></td>
      <td align="right"><b>' . number_format($totalHarga, 0, '', '.') . '</b></td>
    </tr>';

      $html .= ' </tbody></table>';
      $pdf->writeHTML($html, true, false, true, false, '');

      // ---------------------------------------------------------

      // Close and output PDF document
      // This method has several options, check the source code documentation for more information.
      $pdf->Output('kartu_persediaan_barang.pdf', 'I');

      //============================================================+
      // END OF FILE
      //============================================================+
    } else {
      $this->load->view('404_page');
    }
  }
  /* END print kartu persedian */
}
