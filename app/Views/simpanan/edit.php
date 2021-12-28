<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Edit User</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url('admin/user'); ?>">User</a></div>
      <div class="breadcrumb-item">Edit</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Edit User</h2>
    <p class="section-lead">
      Halaman edit data user.
    </p>
    <div class="row">
      <div class="col-12">
        <?= form_open('admin/user/edit/' . $user->userid); ?>
        <?= form_hidden('_method', 'PUT'); ?>
        <div class="card">
          <div class="card-body">
            <div class="form-group row">
              <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.fullname') ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" placeholder="<?= 'Fullname' ?>" value="<?= old('fullname') ? old('fullname') : $user->fullname; ?>">
                <div class="invalid-feedback">
                  <?= session('errors.fullname'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.email') ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ? old('email') : $user->email; ?>">
                <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                <div class="invalid-feedback">
                  <?= session('errors.email'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ? old('username') : $user->username; ?>">
                <div class="invalid-feedback">
                  <?= session('errors.username'); ?>
                </div>
              </div>
            </div>
            <fieldset class="form-group row">
              <label class="col-form-label col-sm-2 float-sm-left pt-0">Role</label>
              <div class="col-sm-10">
                <?php $i = 0; ?>
                <?php foreach ($roles as $role) : ?>
                  <div class="form-check d-inline mr-2">
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