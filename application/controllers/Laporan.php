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

  public function getPeriode()
  {
    $start = date("Y-m-d", strtotime($this->input->post('start', true)));
    $end = date("Y-m-d", strtotime($this->input->post('end', true)));

    $data = ['start' => $start, 'end' => $end];
    $result['data'] = $this->M_view_transaksi->tampil_periode($data);
    echo json_encode($result['data']);
    return;
  }

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

      // echo var_dump($result);
      // die;

      $pdf = new TCPDF('L', 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);

      // set document information
      // $pdf->SetCreator(PDF_CREATOR);
      // $pdf->SetAuthor('Nicola Asuni');
      $pdf->SetTitle('Laporan Transaksi');
      // $pdf->SetSubject('TCPDF Tutorial');
      // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

      // set default header data
      // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
      // $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

      // set header and footer fonts
      $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

      // set default monospaced font
      // $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

      // set margins
      $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(0);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      // $pdf->SetHeaderMargin(0);
      // $pdf->SetTopMargin(0);

      // set auto page breaks
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      // set image scale factor
      // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

      // set some language-dependent strings (optional)
      // if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
      //   require_once(dirname(__FILE__) . '/lang/eng.php');
      //   $pdf->setLanguageArray($l);
      // }

      // ---------------------------------------------------------

      // set default font subsetting mode
      // $pdf->setFontSubsetting(true);

      // Set font
      // dejavusans is a UTF-8 Unicode font, if you only need to
      // print standard ASCII chars, you can use core fonts like
      // helvetica or times to reduce file size.
      // $pdf->SetFont('dejavusans', '', 14, '', true);

      $pdf->SetDisplayMode('real', 'default');

      // Add a page
      // This method has several options, check the source code documentation for more information.
      $pdf->AddPage();

      // set text shadow effect
      // $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

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

      // $this->load->view('admin/persedian_pdf');
    } else {
      $this->load->view('404_page');
    }
  }

  public function print_barangKeluar($id_transaksi = null)
  {
    $allIdKeluar = [];
    $id_keluar = $this->M_return_barang->tampil_idKeluar();
    foreach ($id_keluar as $val) {
      array_push($allIdKeluar, $val['id_keluar']);
    }

    $result = $this->M_barang_keluar->tampil_byIdTransaksi(['id_transaksi' => $id_transaksi, 'id_keluar' => $allIdKeluar]);

    // echo var_dump($result);
    // die;

    $pdf = new TCPDF('L', 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    // $pdf->SetCreator(PDF_CREATOR);
    // $pdf->SetAuthor('Nicola Asuni');
    $pdf->SetTitle('Laporan Detail Transaksi');
    // $pdf->SetSubject('TCPDF Tutorial');
    // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

    // set default header data
    // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
    // $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

    // set header and footer fonts
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    // $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(0);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    // $pdf->SetHeaderMargin(0);
    // $pdf->SetTopMargin(0);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    // if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    //   require_once(dirname(__FILE__) . '/lang/eng.php');
    //   $pdf->setLanguageArray($l);
    // }

    // ---------------------------------------------------------

    // set default font subsetting mode
    // $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    // $pdf->SetFont('dejavusans', '', 14, '', true);

    $pdf->SetDisplayMode('real', 'default');

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

    // set text shadow effect
    // $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

    $total = 0;
    $i = 1;
    // Set some content to print
    $html = '
              <h1 align="center">Laporan Detail Transaksi Penjualan<br>UD Nafi Kota Madiun</h1>
        <table width="30%">
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
}
