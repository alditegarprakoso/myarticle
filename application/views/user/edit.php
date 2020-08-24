<?php
if (!$this->session->userdata('email')) {
  redirect('C_article/login');
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
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-6">
                  <?php echo $this->session->flashdata('message'); ?>
                </div>
              </div>
              <?php echo form_open_multipart('edit'); ?>

              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-md-10">
                  <input type="text" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-md-10">
                  <input type="text" name="name" id="email" class="form-control" value="<?= $user['name']; ?>">
                  <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Picture</label>
                <div class="col-md-10">
                  <div class="row">
                    <div class="col-md-4">
                      <img src="<?= base_url() ?>/assets/img/profile/<?= $user['image']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-md-8">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image">
                        <label for="image" class="custom-file-label">Choose File</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-2 mt-5 ml-auto">
                  <button class="btn btn-primary form-control" type="submit"><i class="fas fa-edit"></i> Edit</button>
                </div>
              </div>

              </form>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php $this->load->view('user/templates/footer'); ?>