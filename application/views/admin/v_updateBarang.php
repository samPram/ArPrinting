<div class="content">
  <div class="container">
    <div class="card-box table-responsive">
      <div class="row m-b-30">
        <div class="col-sm-12">
          <h4 class="m-t-0 header-title"><b>DATA BARANG</b></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <form action="<?= base_url(); ?>Barang/update/<?= $data['id_produk']; ?>" method="POST">
            <div class="form-group">
              <label for="id_produk">Id Barang</label>
              <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $data['id_produk']; ?>" disabled>
            </div>
            <div class="form-group">
              <label for="namaProduk">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama_produk']; ?>">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="satuan">Satuan</label>
              <select class="form-control" id="satuan" name="satuan" data-style="btn-white">
                <option value="Lembar" <?php if ($data['satuan'] == 'Lembar') : echo 'selected';
                                        endif; ?>>Lembar</option>
                <option value="Buah" <?php if ($data['satuan'] == 'Buah') : echo 'selected';
                                      endif; ?>>Buah</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>