<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Tambah Jenis Simpanan</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url('admin/jenissimpanan'); ?>">Jenis Simpanan</a></div>
      <div class="breadcrumb-item">Tambah</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Tambah Jenis Simpanan</h2>
    <p class="section-lead">
      Halaman tambah data jenis simpanan.
    </p>
    <div class="row">
      <div class="col-12">
        <?= form_open('admin/jenissimpanan/create'); ?>
        <div class="card">
          <div class="card-body">
            <div class="form-group row">
              <label for="nama_simpanan" class="col-sm-2 col-form-label">Nama Simpanan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.nama_simpanan') ? 'is-invalid' : ''; ?>" id="nama_simpanan" name="nama_simpanan" placeholder="Nama Simpanan" value="<?= old('nama_simpanan') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.nama_simpanan'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="besaran_simpanan" class="col-sm-2 col-form-label">Besaran Simpanan</label>
              <div class="col-sm-10">
                <input type="number" class="form-control <?= session('errors.besaran_simpanan') ? 'is-invalid' : ''; ?>" id="besaran_simpanan" name="besaran_simpanan" placeholder="Besaran Simpanan" value="<?= old('besaran_simpanan') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.besaran_simpanan'); ?>
                </div>
              </div>
            </div>
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