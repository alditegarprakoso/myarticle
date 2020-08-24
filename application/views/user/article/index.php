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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 mb-5"><?= $title; ?></h1> 
          
          <?php echo $this->session->flashdata('message'); ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <?php if($user['role_id'] == 1){
                echo '<h6 class="m-0 font-weight-bold text-primary">Manage Articles</h6>';
              }else{
                echo '<h6 class="m-0 font-weight-bold text-primary">My Articles</h6>';
              } ?> 
            </div>            
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <a href="<?= base_url('C_add_article/add_article') ?>" class="btn btn-primary mb-3"><i class="fas fa-plus mr-2"></i>Add Article</a>
                </div>
                <div class="col-md-3 ml-auto">
                  <form method="post" action="#">
                    <div class="input-group">
                      <input type="text" name="search" class="form-control" placeholder="Search title..." autocomplete="off">
                      <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" value="Go">                          
                      </div>
                    </div>
                  </form>
                </div>
              </div>                          
              <div class="table-responsive text-center">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Author</th>
                      <th>Date</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>    
                  <?php $i=1; foreach ($data as $article) : ?>                  
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $article['title'];  ?></td>
                      <td><?php echo $article['name'];  ?></td>
                      <td><?php echo $article['date'];  ?></td>
                      <td><a href="<?= base_url('C_add_article/edit_article') ?>?id=<?= $article['id'] ?>" class="badge badge-success"><i class="fas fa-edit"></i>Edit</a></td>
                      <td><a href="<?= base_url('C_add_article/delete_article') ?>?id=<?= $article['id'] ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Delete</a></td>
                    </tr>                     
                  <?php endforeach; ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

<?php $this->load->view('user/templates/footer'); ?>