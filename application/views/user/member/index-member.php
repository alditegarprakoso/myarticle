<?php 
  if ($this->session->userdata('role_id') != '2') {
      $role_id = $this->session->userdata('role_id');
      if ($role_id = '1') {
        redirect('C_admin/blank');
      }      
  } 
?>
<?php $this->load->view('user/templates/header'); ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('user/templates/sidebar_nav'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view('user/templates/topbar_nav'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>            
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="card mb-3 col-md-6" style="max-width: 540;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img class="mt-2 mb-2 ml-3" src="<?= base_url() ?>/assets/img/profile/<?= $user['image']; ?>" alt="" style="width: 150px;">
                </div>
                <div class="col-md-8">
                  <div class="card-body ml-3">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"><small class="text-mutted">Join since - <?= date('d F Y', $user['date_create']); ?></small></p>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php $this->load->view('user/templates/footer'); ?>