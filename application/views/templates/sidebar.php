 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
  <div class="sidebar-brand-icon rotate-n-15">
  <i class="fas fa-tools"></i>
  </div>
  <div class="sidebar-brand-text mx-3">CP Admin <sup>0.1</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->

<?php if($title == 'Dashboard' ): ?>
    <li class="nav-item active">
  <?php else : ?>
    <li class="nav-item">
<?php endif; ?>

  <a class="nav-link" href="<?= base_url('dashboard'); ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Heading -->
<div class="sidebar-heading">
  Menu :
</div>


<!-- Nav Item - Berita -->
<?php if($title == 'Berita'): ?>
  <li class="nav-item active">
    <?php else: ?>
  <li class="nav-item">
<?php endif; ?>
  <a class="nav-link" href="<?= base_url('berita');?>">
  <i class="far fa-newspaper"></i>
    <span>Berita</span></a>
</li>

<!-- Nav Item - Poling -->
<?php if($title == 'Poling'): ?>  
    <li class="nav-item active">
      <?php else : ?>
    <li class="nav-item">
<?php endif; ?>

  <a class="nav-link" href="<?= base_url('poling');?>">
  <i class="fas fa-fw fa-chart-area"></i>
    <span>Poling</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="#">
  <i class="fas fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

