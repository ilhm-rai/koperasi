<?= $this->extend('templates/index'); ?>

<?= $this->section('main'); ?>
<section class="section">
  <div class="section-header">
    <h1>Profile</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?= base_url(); ?>">Dashboard</a></div>
      <div class="breadcrumb-item">Profile</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Profile</h2>
    <p class="section-lead">
      Halaman profile.
    </p>
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4 align-self-center">
          <img src="<?= base_url(); ?>/assets/img/avatar/<?= $user->user_image; ?>" class="card-img p-4 rounded-circle" alt="<?= $user->username; ?>'s image">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <p class="font-weight-bold text-primary mb-2">@<?= $user->username; ?></p>
            <?php if ($user->fullname) : ?>
              <p class="mb-2"><?= $user->fullname; ?></p>
            <?php endif; ?>
            <p class="mb-2"><?= $user->email; ?></p>
            <span class="badge badge-<?= $user->rolename == 'admin' ? 'success' : 'primary'; ?>"><?= $user->rolename; ?></span>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>