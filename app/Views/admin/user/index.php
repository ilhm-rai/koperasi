<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Daftar User</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url('/'); ?>">Dashboard</a></div>
      <div class="breadcrumb-item">User</div>
    </div>
  </div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('message'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>

  <div class="section-body">
    <h2 class="section-title">Daftar User</h2>
    <p class="section-lead">
      Halaman manajemen data user.
    </p>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url('admin/user/create'); ?>" class="btn btn-primary rounded-pill"><span class="fa fa-plus mr-2"></span>Tambah</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped display" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($users as $user) : ?>
                    <tr>
                      <th scope="row"><?= $i++; ?></td>
                      <td><?= $user->username; ?></td>
                      <td><?= $user->email; ?></td>
                      <td><?= ucwords($user->rolename) ?></td>
                      <td>
                        <a href="<?= base_url('admin/user/' . $user->userid); ?>" class="btn btn-sm btn-primary mb-1">Detail</a>
                        <a href="<?= base_url('admin/user/edit/' . $user->userid); ?>" class="btn btn-sm btn-primary mb-1">Edit</a>
                        <?= form_open('admin/user/' . $user->userid, ['class' => 'd-inline form-delete']) ?>
                        <?= form_hidden('_method', 'DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-secondary btn-delete mb-1">Delete</button>
                        <?= form_close(); ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<?= $this->endSection(); ?>