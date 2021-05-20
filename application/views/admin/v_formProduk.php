<div class="content">
  <div class="container">
    <div class="card-box table-responsive">
      <div class="row m-b-30">
        <div class="col-sm-12">
          <h4 class="m-t-0 header-title"><b>DATA PRODUK</b></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <form action="<?= base_url(); ?>Produk/add" method="POST">
            <div class="form-group">
              <label for="namaProduk">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="satuan">Satuan</label>
              <select class="form-control" id="satuan" name="satuan" data-style="btn-white">
                <option value="Lembar">Lembar</option>
                <option value="Buah">Buah</option>
              </select>
            </div>
            <div class="form-group">
              <label for="harga">Harga Satuan (Rp.)</label>
              <input type="text" class="form-control harga" id="harga" name="harga" data-affixes-stay="true" data-thousands="." data-decimal="," data-precision="0" value="<?= set_value('harga'); ?>">
              <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah (Qty)</label>
              <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= set_value('jumlah'); ?>">
              <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>