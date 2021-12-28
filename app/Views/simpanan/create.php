<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Tambah Simpanan Anggota</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url('simpanan'); ?>">Simpanan Anggota</a></div>
      <div class="breadcrumb-item">Tambah</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Tambah Simpanan Anggota</h2>
    <p class="section-lead">
      Halaman tambah data simpanan anggota koperasi.
    </p>
    <div class="row">
      <div class="col-12">
        <?= form_open('simpanan/create'); ?>
        <div class="card">
          <div class="card-body">
            <div class="form-group row">
              <label for="anggota_id" class="col-sm-2 col-form-label">Anggota</label>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-6 mb-2">
                    <select class="form-control select2 <?= session('errors.anggota_id') ? 'is-invalid' : ''; ?>" id="anggota_id" name="anggota_id">
                      <option value="">- Pilih -</option>
                      <?php foreach ($anggota as $data) : ?>
                        <option value="<?= $data->id; ?>" <?= $data->id == old('anggota_id') ? 'selected' : ''; ?>><?= $data->no_anggota; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                      <?= session('errors.anggota_id'); ?>
                    </div>
                  </div>
                  <div class="col-sm-6 mb-2">
                    <input type="text" class="form-control <?= session('errors.nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Nama" value="<?= old('nama') ?>" readonly>
                    <div class="invalid-feedback">
                      <?= session('errors.nama'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="tgl_simpanan" class="col-sm-2 col-form-label">Tanggal Simpanan</label>
              <div class="col-sm-10">
                <input type="date" class="form-control <?= session('errors.tgl_simpanan') ? 'is-invalid' : ''; ?>" id="tgl_simpanan" name="tgl_simpanan">
                <div class="invalid-feedback">
                  <?= session('errors.tgl_simpanan'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="jenis_simpanan_id" class="col-sm-2 col-form-label">Jenis Simpanan</label>
              <div class="col-sm-10">
                <select class="form-control <?= session('errors.jenis_simpanan_id') ? 'is-invalid' : ''; ?>" id="jenis_simpanan_id" name="jenis_simpanan_id">
                  <option>- Pilih -</option>
                  <?php foreach ($jenissimpanan as $data) : ?>
                    <option value="<?= $data->id; ?>" <?= $data->id == old('jenis_simpanan_id') ? 'selected' : ''; ?>><?= $data->nama_simpanan; ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <?= session('errors.jenis_simpanan_id'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="jml_simpanan" class="col-sm-2 col-form-label">Jumlah Simpanan (Rp)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.jml_simpanan') ? 'is-invalid' : ''; ?>" id="jml_simpanan" name="jml_simpanan" placeholder="0" value="<?= old('jml_simpanan') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.jml_simpanan'); ?>
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
    if (old('tgl_simpanan')) :
      $date = date_default_format(old('tgl_simpanan'));
    ?>
      $('#tgl_simpanan').val(new Date('<?= $date; ?>').toDateInputValue());
    <?php else : ?>
      $('#tgl_simpanan').val(new Date().toDateInputValue());
    <?php endif; ?>

    $("#anggota_id").on("change", function() {
      let id = $(this).val();
      if (id) {
        $.ajax({
          url: "<?= base_url('ajaxHandler/getAnggota') ?>",
          type: "GET",
          dataType: 'json',
          data: {
            id: id,
          },
          beforeSend: function() {
            $('#nama').val('Loading...');
          },
          success: function(data) {
            $('#nama').val(data['nama']);
          }
        });
      } else {
        $('#nama').val('');
      }
    });

    $('#jenis_simpanan_id').on('change', (e) => {
      let id = $(e.target).find(':selected').val();
      $.ajax({
        url: "<?= base_url('ajaxHandler/getJenisSimpanan') ?>",
        type: "GET",
        dataType: 'json',
        data: {
          id: id,
        },
        beforeSend: function() {
          $('#jml_simpanan').val('Loading...');
        },
        success: function(data) {
          if (data['nama_simpanan'] == 'Sukarela') {
            $('#jml_simpanan').removeAttr('readonly');
          } else {
            $('#jml_simpanan').attr('readonly', '');
          }
          $('#jml_simpanan').val(data['besaran_simpanan']);
        }
      });
    })
  })
</script>
<?= $this->endSection(); ?>