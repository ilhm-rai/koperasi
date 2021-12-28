<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Tambah User</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url('admin/user'); ?>">User</a></div>
      <div class="breadcrumb-item">Tambah</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Tambah User</h2>
    <p class="section-lead">
      Halaman tambah data user.
    </p>
    <div class="row">
      <div class="col-12">
        <?= form_open('admin/user/create'); ?>
        <div class="card">
          <div class="card-body">
            <div class="form-group row">
              <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.fullname') ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" placeholder="Fullname" value="<?= old('fullname') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.fullname'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                <div class="invalid-feedback">
                  <?= session('errors.email'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.username'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-6 mb-2">
                    <input type="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" name="password" id="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                    <div class="invalid-feedback">
                      <?= session('errors.password'); ?>
                    </div>
                  </div>
                  <div class="col-sm-6 mb-2">
                    <input type="password" class="form-control <?= session('errors.pass_confirm') ? 'is-invalid' : '' ?>" name="pass_confirm" id="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                    <div class="invalid-feedback">
                      <?= session('errors.pass_confirm'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <fieldset class="form-group row">
              <label class="col-form-label col-sm-2 float-sm-left pt-0">Role</label>
              <div class="col-sm-10">
                <?php $i = 0; ?>
                <?php foreach ($roles as $role) : ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" id="role<?= $i++; ?>" value="<?= $role->name; ?>" <?= old('role') == $role->name || $i == 1 ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="role<?= $i++; ?>">
                      <?= ucwords($role->name); ?>
                    </label>
                  </div>
                <?php endforeach; ?>
              </div>
            </fieldset>
            <div class="row">
              <div class="col-sm-10 offset-2">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>