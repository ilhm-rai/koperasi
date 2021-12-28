<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Daftar Jenis Simpanan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url('/'); ?>">Dashboard</a></div>
      <div class="breadcrumb-item">Jenis Simpanan</div>
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
    <h2 class="section-title">Daftar Jenis Simpanan</h2>
    <p class="section-lead">
      Halaman manajemen data jenis simpanan.
    </p>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url('admin/jenissimpanan/create'); ?>" class="btn btn-primary rounded-pill"><span class="fa fa-plus mr-2"></span>Tambah</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped display" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Simpanan</th>
                    <th>Besaran Simpanan (Rp)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($jenissimpanan as $data) : ?>
                    <tr>
                      <th scope="row"><?= $i++; ?></td>
                      <td><?= $data->nama_simpanan; ?></td>
                      <td><?= $data->besaran_simpanan; ?></td>
                      <td>
                        <a href="<?= base_url('admin/jenissimpanan/edit/' . $data->id); ?>" class="btn btn-sm btn-primary mb-1">Edit</a>
                        <?= form_open('admin/jenissimpanan/' . $data->id, ['class' => 'd-inline form-delete']) ?>
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
                    <th>Nama Simpanan</th>
                    <th>Besaran Simpanan</th>
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