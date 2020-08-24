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
              <h6 class="m-0 font-weight-bold text-primary">Form Add Articles</h6>
            </div>
            <div class="row">
                <div class="card-body">                
                <?php echo form_open_multipart('C_add_article/add_article'); ?>
                      <div class="form-group col-md-10 mx-auto">
                          <strong><h5>Title</h5></strong>
                          <input class="form-control" type="text" name="title" id="title" onkeyup="createSlug()" autofocus autocomplete="off" value="<?php echo set_value('title'); ?>">
                          <?php echo form_error('title','<small class="text-danger">','</small>'); ?>
                      </div>                
                      <div class="form-group col-md-10 mx-auto">
                          <strong><h5>Content</h5></strong>                        
                          <textarea class="ckeditor" id="content" name="content"><?php echo set_value('content'); ?></textarea>
                          <?php echo form_error('content','<small class="text-danger">','</small>'); ?>
                      </div>                
                      <div class="form-group col-md-10 mx-auto">
                          <strong><h5>Url</h5></strong>
                          <input type="text" id="url" name="url" class="form-control" required readonly value="<?php echo set_value('url'); ?>">
                          <?php echo form_error('url','<small class="text-danger">','</small>'); ?>
                      </div>                
                      <div class="form-group col-md-10 mx-auto">
                          <strong><h5>Cover</h5></strong>
                          <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="image" id="image">    
                                  <label for="image" class="custom-file-label">Choose File</label>
                              </div>
                      </div>                          
                      <div class="form-group col-md-3 mx-auto">
                        <input class="form-control btn btn-primary" type="submit" name="add" id="add" value="Add Article">
                      </div>
                  </form>              
                  <div class="col-md-3 mx-auto">
                    <a href="<?= base_url('C_add_article'); ?>" class="btn btn-danger form-control">Back</a>
                  </div>
                </div>            
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->      
<?php $this->load->view('user/templates/footer'); ?>