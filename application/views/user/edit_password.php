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

          <div class="col-md-6">
            <?php echo $this->session->flashdata('message'); ?>
            <form action="<?php echo base_url('edit/edit_password') ?>" method="post">

            <div class="form-group">
                <label for="currentPassword">Current Password</label>
                <input type="password" name="currentpassword" id="currentpassword" class="form-control">
                <?php echo form_error('currentpassword','<small class="text-danger">','</small>'); ?>
            </div>

            <div class="form-group">
                <label for="newPassword1">New Password</label>
                <input type="password" name="newpassword1" id="newpassword1" class="form-control">
                <?php echo form_error('newpassword1','<small class="text-danger">','</small>'); ?>
            </div>
            
            <div class="form-group">
                <label for="newPassword2">Repeat Password</label>
                <input type="password" name="newpassword2" id="newpassword2" class="form-control">
                <?php echo form_error('newpassword2','<small class="text-danger">','</small>'); ?>
            </div>
            
            <div class="form-group">
                <div class="col-md-5 mt-5 ml-auto">
                    <button class="btn btn-primary form-control" type="submit"><i class="fas fa-edit"></i> Change Password</button>                
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