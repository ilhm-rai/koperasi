<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Tambah Pinjaman Anggota</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url('pinjaman'); ?>">Pinjaman Anggota</a></div>
      <div class="breadcrumb-item">Tambah</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Tambah Pinjaman Anggota</h2>
    <p class="section-lead">
      Halaman tambah data pinjaman anggota koperasi.
    </p>
    <div class="row">
      <div class="col-12">
        <?= form_open('pinjaman/create'); ?>
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
                    <input type="text" class="form-control js-automation <?= session('errors.nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Nama" value="<?= old('nama') ?>" readonly>
                    <div class="invalid-feedback">
                      <?= session('errors.nama'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="max_pinjaman" class="col-sm-2 col-form-label">Max Pinjaman (Rp)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control js-automation <?= session('errors.max_pinjaman') ? 'is-invalid' : ''; ?>" id="max_pinjaman" name="max_pinjaman" placeholder="0" value="<?= old('max_pinjaman') ?>" readonly>
                <div class="invalid-feedback">
                  <?= session('errors.max_pinjaman'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="bunga" class="col-sm-2 col-form-label">Bunga (%)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.bunga') ? 'is-invalid' : ''; ?>" id="bunga" name="bunga" placeholder="0" value="<?= old('bunga') ? old('bunga') : '2.5'; ?>">
                <div class="invalid-feedback">
                  <?= session('errors.bunga'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="lama_angsuran" class="col-sm-2 col-form-label">Lama Angsuran (Bulan)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control js-angsuran <?= session('errors.lama_angsuran') ? 'is-invalid' : ''; ?>" id="lama_angsuran" name="lama_angsuran" placeholder="0" value="<?= old('lama_angsuran') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.lama_angsuran'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="jml_pinjaman" class="col-sm-2 col-form-label">Jumlah Pinjaman (Rp)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control js-angsuran <?= session('errors.jml_pinjaman') ? 'is-invalid' : ''; ?>" id="jml_pinjaman" name="jml_pinjaman" placeholder="0" value="<?= old('jml_pinjaman') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.jml_pinjaman'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="total_angsuran" class="col-sm-2 col-form-label">Total Angsuran (Rp)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.total_angsuran') ? 'is-invalid' : ''; ?>" id="total_angsuran" name="total_angsuran" placeholder="0" value="<?= old('total_angsuran') ?>" readonly>
                <div class="invalid-feedback">
                  <?= session('errors.total_angsuran'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="tgl_pinjaman" class="col-sm-2 col-form-label">Tanggal Pinjaman</label>
              <div class="col-sm-10">
                <input type="date" class="form-control <?= session('errors.tgl_pinjaman') ? 'is-invalid' : ''; ?>" id="tgl_pinjaman" name="tgl_pinjaman">
                <div class="invalid-feedback">
                  <?= session('errors.tgl_pinjaman'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.keterangan') ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= old('keterangan') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.keterangan'); ?>
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
    if (old('tgl_pinjaman')) :
      $date = date_default_format(old('tgl_pinjaman'));
    ?>
      $('#tgl_pinjaman').val(new Date('<?= $date; ?>').toDateInputValue());
    <?php else : ?>
      $('#tgl_pinjaman').val(new Date().toDateInputValue());
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
            $('.js-automation').val('Loading...');
          },
          success: function(data) {
            $('#nama').val(data['nama']);
            $('#max_pinjaman').val(data['saldo'] * 3);
          }
        });
      } else {
        $('.js-automation').val('');
      }
    });

    $('.js-angsuran').on('keyup keypress change', function() {
      let bunga = Number($('#bunga').val());
      let jml_pinjaman = Number($('#jml_pinjaman').val());
      let lama = Number($('#lama_angsuran').val());

      if (bunga && jml_pinjaman && lama) {
        let angsuran = parseInt((jml_pinjaman + jml_pinjaman * (bunga / 100) * lama));
        $('#total_angsuran').val(angsuran);
      }

    });
  })
</script>
<?= $this->endSection(); ?>