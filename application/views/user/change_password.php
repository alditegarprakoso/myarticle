<?php $this->load->view('templates/header');?>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><i class="fas fa-arrow-left mr-2"></i> Back <i class="fas fa-home"></i></a>
        </div>
        </nav>
    </header>

    <div class="container login" style="margin-bottom:132px;">
        <div class="row">
            <div class="col-md-8 mx-auto card shadow mb-5">
                <div class="mb-3 mt-3">
                    <h3 class="text-center mt-5 mb-1">Change your Password for </h3><br><h5 class="text-center"><?= $email; ?></h5>
                    
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <form action="<?php echo base_url('C_article/changePassword'); ?>" method="POST">
                <div class="form-group mb-3">                    
                    <input type="password" name="password1" id="password1" class="form-control" placeholder="Enter new password. . .">
                    <?php echo form_error('password1','<small class="text-danger">','</small>'); ?>
                </div>                
                <div class="form-group mb-3">                    
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Repeat password. . .">
                    <?php echo form_error('password2','<small class="text-danger">','</small>'); ?>
                </div>                
                <div class="form-group">
                    <button class="btn btn-primary mb-4 float-right form-control">Change Password</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php $this->load->view('templates/footer');?>