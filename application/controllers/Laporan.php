<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_view_transaksi');
    $this->load->model('M_barang_keluar');
    $this->load->model('M_return_barang');
    $this->load->library('Pdf');
  }

  /* Tampil laporan transaksi penjualan */
  public function index()
  {
    if ($this->session->userdata('level') == 'Admin') {
      $data['data'] = $this->M_view_transaksi->tampil_data();

      $this->load->view('template/header');
      $this->load->view('template/topbar');
      $this->load->view('template/sidebar');
      $this->load->view('admin/v_laporanTransaksi', $data);
      $this->load->view('template/footer');
    } else {
      $this->load->view('404_page');
    }
  }
  /* END tampil */

  /* Proses request date range laporan */
  public function getPeriode()
  {
    $start = date("Y-m-d", strtotime($this->input->post('start', true)));
    $end = date("Y-m-d", strtotime($this->input->post('end', true)));

    $data = ['start' => $start, 'end' => $end];
    $result['data'] = $this->M_view_transaksi->tampil_periode($data);
    echo json_encode($result['data']);
    return;
  }
  /* END proses date range */

  /* Proses print laporan transaksi */
  public function print_transaksi($start = null, $end = null)
  {
    if ($this->session->userdata('level') == 'Admin') {
      if ($start && $end) {
        $startDate = str_replace('-', '/', $start);
        $endDate = str_replace('-', '/', $end);

        $startConvert = date("Y-m-d", strtotime($startDate));
        $endConvert = date("Y-m-d", strtotime($endDate));

        $data = ['start' => $startConvert, 'end' => $endConvert];
        $result = $this->M_view_transaksi->tampil_periode($data);
      } else {
        $result = $this->M_view_transaksi->tampil_data();
      }

      $pdf = new TCPDF('L', 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);

      // set document information
      $pdf->SetTitle('Laporan Transaksi');

      // set default header data

      // set header and footer fonts
      $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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

      $total = 0;
      $i = 1;
      $startPeriode = ($start) ? $startConvert : null;
      $endPeriode = ($end) ? $endConvert : null;
      // Set some content to print
      $html = '
              <h1 align="center">Laporan Transaksi Penjualan<br>UD Nafi Kota Madiun</h1>
        <table>
          <tr>
            <td width="10%">Periode</td>
            <td > : ' . $startPeriode . ' s/d ' . $endPeriode . '</td>
          </tr>
        </table>

              <table cellpadding="2" border="1" align="center">
                  
                      <tr>
                      <th width="5%">No</th>
                      <th>Id Transaksi</th>
                      <th>Tanggal</th>
                      <th>User Kasir</th>
                      <th>Jumlah Barang</th>
                      <th>Total (Rp. )</th>
                      <th>Total Bayar (Rp. )</th>
                      <th>Kembalian (Rp. )</th>
                      </tr>
                 <tbody>';

      foreach ($result as $val) {
        $html .= ' <tr>
                    <td width="5%">' . $i++ . '</td>
                    <td>' . $val['id_transaksi'] . '</td>
                    <td>' . $val['tanggal'] . '</td>
                    <td>' . $val['username'] . '</td>
                    <td>' . $val['jumlah_item'] . '</td>
                    <td align="right">' . number_format($val['total'], 0, '', '.') . '</td>
                    <td align="right">' . number_format($val['bayar'], 0, '', '.') . '</td>
                    <td align="right">' . number_format($val['kembali'], 0, '', '.') . '</td>
                  </tr>';

        $total += $val['total'];
      }

      $html .= '<tr>
      <td width="5%">total</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right"><b>' . number_format($total, 0, '', '.') . '</b></td>
      <td></td>
      <td></td>
    </tr>';

      $html .= ' </tbody></table>
    
        ';
      $pdf->writeHTML($html, true, false, true, false, '');

      // ---------------------------------------------------------

      // Close and output PDF document
      // This method has several options, check the source code documentation for more information.
      $pdf->Output('laporan_transkasi.pdf', 'I');

      //============================================================+
      // END OF FILE
      //============================================================+

    } else {
      $this->load->view('404_page');
    }
  }
  /* END print laporan transaksi */

  /* Proses print detail transaksi */
  public function print_barangKeluar($id_transaksi = null)
  {
    $allIdKeluar = [];
    $id_keluar = $this->M_return_barang->tampil_idKeluar();
    foreach ($id_keluar as $val) {
      array_push($allIdKeluar, $val['id_keluar']);
    }

    $result = $this->M_barang_keluar->tampil_byIdTransaksi(['id_transaksi' => $id_transaksi, 'id_keluar' => $allIdKeluar]);


    $pdf = new TCPDF('L', 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetTitle('Laporan Detail Transaksi');

    // set default header data

    // set header and footer fonts
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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

    $total = 0;
    $i = 1;
    // Set some content to print
    $html = '
              <h1 align="center">Laporan Detail Transaksi Penjualan<br>UD Nafi Kota Madiun</h1>
        <table>
          <tr>
            <td>Id Transaksi</td>
            <td> : ' . $id_transaksi . '</td>
          </tr>
        </table>

              <table cellpadding="2" border="1" align="center">
                  
                      <tr>
                      <th width="5%">No</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Barang Keluar</th>
                      <th>Harga Barang Keluar (Rp. )</th>
                      <th>Total Harga Keluar (Rp. )</th>
                      </tr>
                 <tbody>';

    foreach ($result as $val) {
      $html .= ' <tr>
                    <td>' . $i++ . '</td>
                    <td>' . $val['nama_produk'] . '</td>
                    <td>' . $val['jumlah_keluar'] . '</td>
                    <td align="right">' . number_format($val['harga_keluar'], 0, '', '.') . '</td>
                    <td align="right">' . number_format($val['total_harga_keluar'], 0, '', '.') . '</td>
                  </tr>';

      $total += $val['total_harga_keluar'];
    }

    $html .= '<tr>
      <td width="5%">total</td>
      <td></td>
      <td></td>
      <td></td>
      <td align="right"><b>' . number_format($total, 0, '', '.') . '</b></td>
    </tr>';

    $html .= ' </tbody></table>
    
        ';
    $pdf->writeHTML($html, true, false, true, false, '');

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('laporan_detail_transaksi.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+
  }
  /* END detail transaksi */
}
