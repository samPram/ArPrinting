<div class="content">
  <div class="container">
    <div class="card-box table-responsive">
      <div class="row m-b-30">
        <div class="col-sm-12">
          <h4 class="m-t-0 header-title"><b>DATA USER</b></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <form action="<?= base_url(); ?>User/update/<?= $data['id_user']; ?>" method="POST">
            <div class="form-group">
              <label for="id_user">Id User</label>
              <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $data['id_user']; ?>" disabled>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?= $data['username']; ?>">
              <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="<?= $data['password']; ?>">
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="level">Level</label>
              <select class="form-control" id="level" name="level" data-style="btn-white">
                <option value="Admin" <?php if ($data['level'] == 'Admin') : echo 'selected';
                                      endif; ?>>Admin</option>
                <option value="Kasir" <?php if ($data['level'] == 'Kasir') : echo 'selected';
                                      endif; ?>>Kasir</option>
              </select>
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select class="form-control" id="status" name="status" data-style="btn-white">
                <option value="Aktif" <?php if ($data['status_user'] == 'Aktif') : echo 'selected';
                                      endif; ?>>Aktif</option>
                <option value="Nonaktif" <?php if ($data['status_user'] == 'Nonaktif') : echo 'selected';
                                          endif; ?>>Nonaktif</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>