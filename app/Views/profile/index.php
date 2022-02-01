<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Dashboard</a></div>
      <div class="breadcrumb-item">Profile</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Profile</h2>
    <p class="section-lead">
      Halaman profile.
    </p>
    <div class="row">
      <div class="col-6">
        <div class="card mb-3">
          <div class="row no-gutters">
            <div class="col-md-4 align-self-center">
              <img src="<?= base_url(); ?>/assets/img/avatar/<?= $user->user_image; ?>" class="card-img p-4 rounded-circle" alt="<?= $user->username; ?>'s image">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <p class="font-weight-bold text-primary mb-2">@<?= $user->username; ?></p>
                <?php if ($user->fullname) : ?>
                  <p class="mb-2"><?= $user->fullname; ?></p>
                <?php endif; ?>
                <p class="mb-2"><?= $user->email; ?></p>
                <span class="badge badge-<?= $user->rolename == 'admin' ? 'success' : 'primary'; ?>"><?= $user->rolename; ?></span>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h4>Edit Profile</h4>
          </div>
          <div class="card-body">
            <?= form_open_multipart('profile/' . user_id()); ?>
            <?= form_hidden('_method', 'PUT'); ?>
            <?= form_hidden('id', user_id()); ?>
            <div class="row">
              <div class="form-group col-12">
                <label>Nama</label>
                <input type="text" class="form-control <?= session('errors.fullname') ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" value="<?= old('fullname') ? old('fullname') : $user->fullname; ?>">
                <div class="invalid-feedback">
                  <?= session('errors.fullname'); ?>
                </div>
              </div>
              <div class="form-group col-12">
                <label for="email" class="col-form-label">Email</label>
                <input type="text" class="form-control <?= session('errors.email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ? old('email') : $user->email; ?>">
                <div class="invalid-feedback">
                  <?= session('errors.email'); ?>
                </div>
              </div>
              <div class="form-group col-12">
                <label for="username" class="col-form-label">Username</label>
                <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username') ? old('username') : $user->username; ?>">
                <div class="invalid-feedback">
                  <?= session('errors.username'); ?>
                </div>
              </div>
              <div class="form-group col-12">
                <label for="password" class="col-form-label">Password</label>
                <input type="password" class="form-control <?= session('errors.password') ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?= old('password'); ?>">
                <small id="emailHelp" class="form-text text-muted">Abaikan jika tidak ingin mengubah password.</small>
                <div class="invalid-feedback">
                  <?= session('errors.password'); ?>
                </div>
              </div>
              <div class="form-group col-12">
                <label for="user_image" class="col-form-label">Foto</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= session('errors.user_image') ? 'is-invalid' : ''; ?>" id="user_image" name="user_image" accept="image/*">
                  <label class="custom-file-label" for="customFile"><?= $user->user_image ? $user->user_image : "Choose file"; ?></label>
                  <div class="invalid-feedback">
                    <?= session('errors.user_image'); ?>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<?= $this->endSection(); ?>