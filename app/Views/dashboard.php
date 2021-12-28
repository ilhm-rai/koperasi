<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <?php if (in_groups('admin')) : ?>

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-user-tie"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Admin</h4>
              </div>
              <div class="card-body">
                <?= $admin; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-user-tie"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Karyawan</h4>
              </div>
              <div class="card-body">
                <?= $karyawan; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Anggota</h4>
              </div>
              <div class="card-body">
                <?= $anggota; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-money-bill-wave"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Simpanan</h4>
            </div>
            <div class="card-body">
              <?= strtorupiah($simpanan->jml_simpanan); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-money-check-alt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pinjaman</h4>
            </div>
            <div class="card-body">
              <?= strtorupiah($pinjaman->jml_pinjaman); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-gift"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Angsuran</h4>
            </div>
            <div class="card-body">
              <?= strtorupiah($angsuran->angsuran); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>