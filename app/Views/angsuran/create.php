<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Tambah Angsuran Anggota</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Dashboard</a></div>
      <div class="breadcrumb-item active"><a href="<?= base_url('angsuran'); ?>">Angsuran Anggota</a></div>
      <div class="breadcrumb-item">Tambah</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Tambah Angsuran Anggota</h2>
    <p class="section-lead">
      Halaman tambah data angsuran anggota koperasi.
    </p>
    <div class="row">
      <div class="col-12">
        <?= form_open('angsuran/create'); ?>
        <div class="card">
          <div class="card-body">
            <div class="form-group row">
              <label for="pinjaman_id" class="col-sm-2 col-form-label">No. Pinjaman :</label>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-6 mb-2">
                    <select class="form-control select2 <?= session('errors.pinjaman_id') ? 'is-invalid' : ''; ?>" id="pinjaman_id" name="pinjaman_id">
                      <option value="">- Pilih -</option>
                      <?php foreach ($pinjaman as $data) : ?>
                        <option value="<?= $data->pinjamanid; ?>" <?= $data->pinjamanid == old('pinjaman_id') ? 'selected' : ''; ?>><?= $data->no_pinjaman; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                      <?= session('errors.pinjaman_id'); ?>
                    </div>
                  </div>
                  <div class="col-sm-6 mb-2">
                    <input type="text" class="form-control js-automation <?= session('errors.no_anggota') ? 'is-invalid' : ''; ?>" id="no_anggota" name="no_anggota" placeholder="No. Anggota" value="<?= old('no_anggota') ?>" readonly>
                    <div class="invalid-feedback">
                      <?= session('errors.no_anggota'); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama Anggota :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control js-automation <?= session('errors.nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Nama" value="<?= old('nama') ?>" readonly>
                <div class="invalid-feedback">
                  <?= session('errors.nama'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="sisa_angsuran" class="col-sm-2 col-form-label">Sisa Angsuran (Rp) :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control js-automation <?= session('errors.sisa_angsuran') ? 'is-invalid' : ''; ?>" id="sisa_angsuran" name="sisa_angsuran" placeholder="0" value="<?= old('sisa_angsuran') ?>" readonly>
                <div class="invalid-feedback">
                  <?= session('errors.sisa_angsuran'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="angsuran_ke" class="col-sm-2 col-form-label">Angsuran Ke :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.angsuran_ke') ? 'is-invalid' : ''; ?>" id="angsuran_ke" name="angsuran_ke" placeholder="0" value="<?= old('angsuran_ke') ?>" readonly>
                <div class="invalid-feedback">
                  <?= session('errors.angsuran_ke'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="jml_angsuran" class="col-sm-2 col-form-label">Jumlah Angsuran (Rp / bulan) :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control <?= session('errors.jml_angsuran') ? 'is-invalid' : ''; ?>" id="jml_angsuran" name="jml_angsuran" placeholder="0" value="<?= old('jml_angsuran') ?>" readonly>
                <div class="invalid-feedback">
                  <?= session('errors.jml_angsuran'); ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="tgl_pembayaran" class="col-sm-2 col-form-label">Tanggal Pembayaran :</label>
              <div class="col-sm-10">
                <input type="date" class="form-control <?= session('errors.tgl_pembayaran') ? 'is-invalid' : ''; ?>" id="tgl_pembayaran" name="tgl_pembayaran">
                <div class="invalid-feedback">
                  <?= session('errors.tgl_pembayaran'); ?>
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
    if (old('tgl_pembayaran')) :
      $date = date_default_format(old('tgl_pembayaran'));
    ?>
      $('#tgl_pembayaran').val(new Date('<?= $date; ?>').toDateInputValue());
    <?php else : ?>
      $('#tgl_pembayaran').val(new Date().toDateInputValue());
    <?php endif; ?>

    $("#pinjaman_id").on("change", function() {
      let id = $(this).val();
      if (id) {
        $.ajax({
          url: "<?= base_url('ajaxHandler/getPinjamanById') ?>",
          type: "GET",
          dataType: 'json',
          data: {
            id: id,
          },
          beforeSend: function() {
            $('.js-automation').val('Loading...');
          },
          success: function(data) {
            let angsuran = parseInt(data['total_angsuran'] / data['lama_angsuran']);
            $('#no_anggota').val(data['no_anggota']);
            $('#nama').val(data['nama']);
            $('#sisa_angsuran').val(data['sisa_angsuran']);
            $('#jml_angsuran').val(angsuran);
            $.ajax({
              url: "<?= base_url('ajaxHandler/getAngsuranKe') ?>",
              type: "GET",
              dataType: 'json',
              data: {
                id: id,
              },
              success: function(data) {
                $('#angsuran_ke').val(data);
              }
            });
          }
        });
      } else {
        $('.js-automation').val('');
      }
    });
  })
</script>
<?= $this->endSection(); ?>