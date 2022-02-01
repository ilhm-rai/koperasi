<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Daftar Pinjaman Anggota</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url('/'); ?>">Dashboard</a></div>
      <div class=" breadcrumb-item">Pinjaman Anggota</div>
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
    <h2 class="section-title">Daftar Pinjaman Anggota</h2>
    <p class="section-lead">
      Halaman manajemen data pinjaman anggota.
    </p>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url('pinjaman/create'); ?>" class="btn btn-primary rounded-pill"><span class="fa fa-plus mr-2"></span>Tambah</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped display" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>No. Pinjaman</th>
                    <th>No. Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Jumlah Pinjaman (Rp)</th>
                    <th>Sisa Angsuran (Rp)</th>
                    <th>Tanggal Pinjaman</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($pinjaman as $data) : ?>
                    <tr>
                      <th scope="row"><?= $i++; ?></td>
                      <td><?= $data->no_pinjaman; ?></td>
                      <td><?= $data->no_anggota; ?></td>
                      <td><?= $data->nama; ?></td>
                      <td><?= strtorupiah($data->jml_pinjaman); ?></td>
                      <td><?= strtorupiah($data->sisa_angsuran); ?></td>
                      <td><?= $data->tgl_pinjaman; ?></td>
                      <td> <?= $data->status == 0 ? '<span class="badge badge-danger">Belum Lunas</span>' : '<span class="badge badge-sm badge-success">Lunas</span>'; ?></td>
                      <td><?= $data->keterangan; ?></td>
                      <td>
                        <?= form_open('pinjaman/' . $data->pinjamanid, ['class' => 'd-inline form-delete']) ?>
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
                    <th>No. Pinjaman</th>
                    <th>No. Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Jumlah Pinjaman (Rp)</th>
                    <th>Sisa Angsuran</th>
                    <th>Tanggal Pinjaman</th>
                    <th>Status</th>
                    <th>Keterangan</th>
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