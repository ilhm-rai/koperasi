<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Tambah Anggota</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url('admin/anggota'); ?>">Anggota</a></div>
      <div class="breadcrumb-item">Tambah</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Tambah Anggota</h2>
    <p class="section-lead">
      Halaman tambah data anggota koperasi.
    </p>
    <div class="row">
      <div class="col-12">
        <?= form_open_multipart('admin/anggota/create'); ?>
        <div class="card">
          <div class="card-body">
            <div class="form-group row">
              <label for="nik" class="col-sm-2 col-form-label">NIK</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.nik') ? 'is-invalid' : ''; ?>" id="nik" name="nik" placeholder="NIK" value="<?= old('nik') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.nik'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Nama" value="<?= old('nama') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.nama'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
              <div class="col-sm-10">
                <div class="form-group row">
                  <div class="col-sm-6 mb-2">
                    <input type="text" class="form-control <?= session('errors.tempat_lahir') ? 'is-invalid' : '' ?>" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat" value="<?= old('tempat_lahir'); ?>">
                    <div class="invalid-feedback">
                      <?= session('errors.tempat_lahir'); ?>
                    </div>
                  </div>
                  <div class="col-sm-6 mb-2">
                    <input type="date" class="form-control <?= session('errors.tgl_lahir') ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir">
                    <div class="invalid-feedback">
                      <?= session('errors.tgl_lahir'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <fieldset class="form-group row">
              <label class="col-form-label col-sm-2 float-sm-left pt-0">Jenis Kelamin</label>
              <div class="col-sm-10">
                <?php $i = 0; ?>
                <?php foreach ($genders as $gender) : ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input <?= session('errors.jenis_kelamin') ? 'is-invalid' : ''; ?>" type="radio" name="jenis_kelamin" id="jenis_kelamin<?= $i++; ?>" value="<?= $gender; ?>" <?= old('jenis_kelamin') == $gender || $i == 1 ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="jenis_kelamin<?= $i++; ?>">
                      <?= ucwords($gender); ?>
                    </label>
                    <div class="invalid-feedback">
                      <?= session('errors.jenis_kelamin'); ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </fieldset>
            <div class="form-group row">
              <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="Alamat" value="<?= old('alamat') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.alamat'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="agama" class="col-sm-2 col-form-label">Agama</label>
              <div class="col-sm-10">
                <select class="form-control <?= session('errors.agama') ? 'is-invalid' : ''; ?>" name="agama" id="agama">
                  <option value="">Agama</option>
                  <?php foreach ($religions as $religion) : ?>
                    <option value="<?= $religion; ?>" <?= $religion == old('agama') ? 'selected' : ''; ?>><?= $religion; ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <?= session('errors.agama'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="status_perkawinan" class="col-sm-2 col-form-label">Status Perkawinan</label>
              <div class="col-sm-10">
                <select class="form-control <?= session('errors.status_perkawinan') ? 'is-invalid' : ''; ?>" name="status_perkawinan" id="status_perkawinan">
                  <option value="">Status Perkawinan</option>
                  <option value="Kawin" <?= old('status_perkawinan') == 'Kawin' ? 'selected' : ''; ?>>Kawin</option>
                  <option value="Belum Kawin" <?= old('status_perkawinan') == 'Belum Kawin' ? 'selected' : ''; ?>>Belum Kawin</option>
                </select>
                <div class="invalid-feedback">
                  <?= session('errors.status_perkawinan'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.pekerjaan') ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="<?= old('pekerjaan') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.pekerjaan'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="foto_ktp" class="col-sm-2 col-form-label">Foto KTP</label>
              <div class="col-sm-10">
                <div class="custom-file">
                  <input type="file" class="custom-file-input <?= session('errors.foto_ktp') ? 'is-invalid' : ''; ?>" id="foto_ktp" name="foto_ktp" accept="image/*">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                  <div class="invalid-feedback">
                    <?= session('errors.foto_ktp'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="tgl_daftar" class="col-sm-2 col-form-label">Tanggal Daftar</label>
              <div class="col-sm-10">
                <input type="date" class="form-control <?= session('errors.tgl_daftar') ? 'is-invalid' : ''; ?>" id="tgl_daftar" name="tgl_daftar">
                <div class="invalid-feedback">
                  <?= session('errors.tgl_daftar'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="saldo" class="col-sm-2 col-form-label pt-0">Bayar Simpanan Pokok (Rp. 50.000,00)</label>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input <?= session('errors.saldo') ? 'is-invalid' : ''; ?>" type="checkbox" id="saldo" name="saldo" value="1">
                  <div class="invalid-feedback">
                    <?= session('errors.saldo'); ?>
                  </div>
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

<?= $this->section('_script'); ?>
<script>
  $(document).ready(() => {
    <?php
    if (old('tgl_daftar')) :
      $date = date_default_format(old('tgl_daftar'));
    ?>
      $('#tgl_daftar').val(new Date('<?= $date; ?>').toDateInputValue());
    <?php else : ?>
      $('#tgl_daftar').val(new Date().toDateInputValue());
    <?php endif; ?>

    <?php
    if (old('tgl_lahir')) :
      $date = date_default_format(old('tgl_lahir'));
    ?>
      $('#tgl_lahir').val(new Date('<?= $date; ?>').toDateInputValue());
    <?php endif; ?>
  })
</script>
<?= $this->endSection(); ?>