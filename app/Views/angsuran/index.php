<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Daftar Angsuran Anggota</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url('/'); ?>">Dashboard</a></div>
      <div class=" breadcrumb-item">Angsuran Anggota</div>
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
    <h2 class="section-title">Daftar Angsuran Anggota</h2>
    <p class="section-lead">
      Halaman manajemen data angsuran anggota.
    </p>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url('angsuran/create'); ?>" class="btn btn-primary rounded-pill"><span class="fa fa-plus mr-2"></span>Tambah</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped display" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>No. Angsuran</th>
                    <th>No. Pinjaman</th>
                    <th>No. Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Angsuran Ke-</th>
                    <th>Angsuran (Rp)</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($angsuran as $data) : ?>
                    <tr>
                      <th scope="row"><?= $i++; ?></td>
                      <td><?= $data->no_angsuran; ?></td>
                      <td><?= $data->no_pinjaman; ?></td>
                      <td><?= $data->no_anggota; ?></td>
                      <td><?= $data->nama; ?></td>
                      <td><?= $data->angsuran_ke; ?></td>
                      <td><?= strtorupiah($data->jml_angsuran); ?></td>
                      <td><?= $data->tgl_pembayaran; ?></td>
                      <td>
                        <a href="<?= base_url('angsuran/edit/' . $data->angsuranid); ?>" class="btn btn-sm btn-primary mb-1">Edit</a>
                        <?= form_open('angsuran/' . $data->angsuranid, ['class' => 'd-inline form-delete']) ?>
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
                    <th>No. Angsuran</th>
                    <th>No. Pinjaman</th>
                    <th>No. Anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Angsuran Ke-</th>
                    <th>Angsuran (Rp)</th>
                    <th>Tanggal Pembayaran</th>
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