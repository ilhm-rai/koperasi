<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">KSP Restu Bunda</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">KSPRB</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="<?= base_url(); ?>"><i class="fas fa-fw fa-fire"></i> <span>Dashboard</span></a></li>
      <?php if (in_groups('admin')) : ?>
        <li class="menu-header">Master Data</li>
        <li><a class="nav-link" href="<?= base_url('admin/user'); ?>"><i class="fas fa-fw fa-user-tie"></i> <span>User</span></a></li>
        <li><a class="nav-link" href="<?= base_url('admin/jenissimpanan'); ?>"><i class="fas fa-fw fa-dot-circle"></i> <span>Jenis Simpanan</span></a></li>
        <li><a class="nav-link" href="<?= base_url('admin/anggota'); ?>"><i class="fas fa-fw fa-users"></i> <span>Anggota Koperasi</span></a></li>
      <?php endif; ?>
      <li class="menu-header">Proses Bisnis</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-dot-circle"></i> <span>Simpanan</span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url('simpanan'); ?>">Simpanan</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-dot-circle"></i> <span>Transaksi Pinjaman</span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url('pinjaman'); ?>">Pinjaman</a></li>
          <li><a href="<?= base_url('angsuran'); ?>">Angsuran Pinjaman</a></li>
        </ul>
      </li>
      <li class="menu-header">Pengaturan</li>
      <li><a class="nav-link" href="<?= base_url('profile'); ?>"><i class="fas fa-fw fa-user"></i> <span>Profile</span></a></li>
      <li><a class="nav-link" href="<?= base_url('logout'); ?>"><i class="fas fa-fw fa-sign-out-alt"></i> <span>Logout</span></a></li>
    </ul>
  </aside>
</div>