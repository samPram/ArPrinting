    <!-- Start content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <?php if ($this->session->flashdata('message')) {
              echo $this->session->flashdata('message');
            }
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <h4 class="m-t-0 header-title"><b>DATA BARANG</b></h4>
              <!-- Full width modal -->

              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($data as $val) :  ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $val['nama_produk']; ?></td>
                      <td><?= $val['satuan']; ?></td>
                      <td><?= $val['quantity']; ?></td>
                      <td>

                        <button data-id="<?= $val['id_produk']; ?>" data-nama="<?= $val['nama_produk']; ?>" class='on-default default-row btn btn-info btnViewPersediaan'>
                          <i class='ti-eye'></i></button>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <h4 class="m-t-0 header-title"><b>DATA BARANG MASUK</b></h4>
              <div style="text-align: right; margin-bottom: 10px;">
                <button class="on-default edit-row btn btn-success" id="btnPrintPdf" class="col-sm-6 col-md-4 col-lg-3">
                  <i class="ti-printer"></i> Print PDF
                </button>
              </div>
              <div id="page-print"></div>
              <table id="" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Masuk</th>
                    <th>Jumlah Masuk</th>
                    <th>Harga Masuk</th>
                    <th>Total Masuk</th>
                    <th>Jumlah Keluar</th>
                    <th>Harga Keluar</th>
                    <th>Total Keluar</th>
                    <th>Persediaan</th>
                    <th>Harga</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody class="data-persediaan">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>