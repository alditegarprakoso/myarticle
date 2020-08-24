<?php 
  if (!$this->session->userdata('role_id')) {
        redirect('C_articel/login');
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
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800 mb-5"><?= $title; ?></h1>          
          </div>
        <!-- Begin Page Content -->
        <div class="container-fluid col-md-10">

          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
            </div>
            <div class="row">
                <div class="card-body">
                <?php echo form_open_multipart('C_admin/edit_user?id='.$data['id']); ?>
                      <div class="form-group col-md-10 mx-auto">
                          <strong><h5>Name</h5></strong>
                          <input class="form-control" type="text" name="name" id="name" value="<?php echo $data['name'];?>">
                          <?php echo form_error('name','<small class="text-danger">','</small>'); ?>
                      </div>                
                      <div class="form-group col-md-10 mx-auto">
                          <strong><h5>Email</h5></strong>                        
                          <input class="form-control" type="text" name="email" id="email" value="<?php echo $data['email']; ?>">
                          <?php echo form_error('email','<small class="text-danger">','</small>'); ?>
                      </div>                
                                          
                      <div class="form-group col-md-10 mx-auto">
                          <strong><h5>Role</h5></strong>
                          <?php if($data['role_id'] == 1){
                                    $role = 'Administrator';                           
                                }
                                else{
                                    $role = 'Member';
                                } 
                          ?>
                            <select name="role_id" id="role_id" class="form-control">
                              <option value="<?= $data['role_id']?>">Now Role -> <?= $role; ?></option>
                              <?php if($data['role_id'] == 1){                                    
                                        echo '<option value="2">Change to -> Member</option>';
                                    }
                                    else{
                                        echo '<option value="1">Change to -> Administrator</option>';
                                    } 
                                ?>
                            </select>            
                          <?php echo form_error('role_id','<small class="text-danger">','</small>'); ?>
                      </div>                
                      <div class="form-group col-md-3 mx-auto">
                        <input class="form-control btn btn-primary" type="submit" name="add" id="add" value="Edit User">
                      </div>
                  </form>
                  <div class="col-md-3 mx-auto">
                    <a href="<?= base_url('C_admin/manage_user'); ?>" class="btn btn-danger form-control">Back</a>
                  </div>
                </div>            
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->      
<?php $this->load->view('user/templates/footer'); ?>