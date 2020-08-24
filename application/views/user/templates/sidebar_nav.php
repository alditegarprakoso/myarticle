<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-book"></i>
    </div>
    <div class="sidebar-brand-text mx-3">My Article</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php
if ($user['role_id'] == 1) {
?>
<li class="nav-item active">
    <a class="nav-link" href="<?= base_url('C_admin') ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>
<?php } ?>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>
<?php
if ($user['role_id'] == 1) {
?>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('C_add_article'); ?>">
    <i class="fas fa-fw fa-book"></i>
    <span>Manage Article</span></a>
</li>
<?php } ?>

<?php
if ($user['role_id'] == 2) {
?>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('C_add_article'); ?>">
    <i class="fas fa-fw fa-book"></i>
    <span>My Article</span></a>
</li>
<?php } ?>

<?php
if ($user['role_id'] == 1) {
?>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('C_admin/manage_user'); ?>">
    <i class="fas fa-fw fa-users"></i>
    <span>Manage Users</span></a>
</li>
<?php } ?>

<!-- Divider -->
<hr class="sidebar-divider">

<div class="sidebar-heading">
    Setting Account
</div>

<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('Edit') ?>">    
    <i class="fas fa-fw fa-user-edit"></i>
    <span>Edit Profile</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('edit/edit_password') ?>">
    <i class="fas fa-fw fa-key"></i>
    <span>Change Password</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('C_article/logout'); ?>">
    <i class="fas fa-fw fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>

<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>