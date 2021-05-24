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
    <div class="card-box table-responsive">
      <div class="row m-b-30">
        <div class="col-sm-12">
          <h4 class="m-t-0 header-title"><b>DATA PROFIL</b></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <form action="<?= base_url(); ?>Profil/view_profil/<?= $data['id_user']; ?>" method="POST">
            <div class="form-group">
              <label for="id_user">Id User</label>
              <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $data['id_user']; ?>" readonly>
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
              <label for="re_password">Repeat Password</label>
              <input class="form-control" type="password" name="re_password" placeholder="Repeat Password">
              <?= form_error('re_password', '<small class="text-danger pl-3">', '</small>'); ?>

            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>