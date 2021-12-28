<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<section class="section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
          <img src="<?= base_url(); ?>/assets/img/logo.png" alt="logo" width="100" class="shadow-light rounded-circle p-2 bg-white">
        </div>

        <div class="card card-primary">
          <div class="card-header">
            <h4><?= lang('Auth.loginTitle') ?></h4>
          </div>

          <div class="card-body">
            <?= view('Myth\Auth\Views\_message_block') ?>

            <form action="<?= route_to('login') ?>" method="post">
              <?= csrf_field() ?>
              <?php if ($config->validFields === ['email']) : ?>
                <div class="form-group">
                  <label for="login"><?= lang('Auth.email') ?></label>
                  <input id="login" type="login" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" tabindex="1" placeholder="<?= lang('Auth.email') ?>" autofocus>
                  <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                  </div>
                </div>
              <?php else : ?>
                <div class="form-group">
                  <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                  <input id="login" type="login" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" tabindex="1" placeholder="<?= lang('Auth.emailOrUsername') ?>" autofocus>
                  <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                  </div>
                </div>
              <?php endif; ?>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label"><?= lang('Auth.password') ?></label>
                  <?php if ($config->activeResetter) : ?>
                    <div class="float-right">
                      <a href="<?= route_to('forgot') ?>" class="text-small">
                        <?= lang('Auth.forgotYourPassword') ?>
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
                <input id="password" type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" tabindex="2" placeholder="<?= lang('Auth.password') ?>">
                <div class="invalid-feedback">
                  <?= session('errors.password') ?>
                </div>
              </div>
              <?php if ($config->allowRemembering) : ?>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" <?php if (old('remember')) : ?> checked <?php endif ?>>
                    <label class="custom-control-label" for="remember-me"><?= lang('Auth.rememberMe') ?></label>
                  </div>
                </div>
              <?php endif; ?>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                  <?= lang('Auth.loginAction') ?>
                </button>
              </div>
            </form>

          </div>
        </div>
        <?php if ($config->allowRegistration) : ?>
          <div class="mt-5 text-muted text-center">
            Don't have an account? <a href="<?= route_to('register') ?>">Create One</a>
          </div>
        <?php endif; ?>
        <div class="simple-footer">
          Copyright &copy; <?= date('Y'); ?> <div class="bullet"></div> Build with <span class="fas fa-heart text-danger"></span> KSP Restu Bunda &mdash;</a>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>