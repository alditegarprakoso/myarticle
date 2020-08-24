<?php $this->load->view('templates/header');?>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><i class="fas fa-arrow-left mr-2"></i> Back <i class="fas fa-home"></i></a>
        </div>
        </nav>
    </header>

    <div class="container login">
        <div class="row">
            <div class="col-md-8 mx-auto card shadow mb-5">
                <div class="mb-3 mt-3">
                    <h3 class="text-center mt-5 mb-4">Login to My Article</h3>
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <form action="<?php echo base_url('C_article/login'); ?>" method="POST">
                <div class="form-group mb-3">                    
                    <input type="text" value="<?php echo set_value('email') ?>" name="email" id="email" class="form-control" placeholder="Insert Email . . .">
                    <?php echo form_error('email','<small class="text-danger">','</small>'); ?>
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Insert Password . . .">
                    <?php echo form_error('password','<small class="text-danger">','</small>'); ?>
                </div>                
                <div class="form-group">
                    <button class="btn btn-primary float-right mb-4 form-control">Login</button>
                </div>
                </form>
                <div class="text-center mx-auto mb-3">
                    <a href="<?= base_url('C_article/forgot_password') ?>">Forgot Password?</a><br><br>
                    <a href="<?= base_url('C_article/register'); ?>">Create an Account now !</a>
                </div>                
            </div>
        </div>
    </div>

    <?php $this->load->view('templates/footer');?>