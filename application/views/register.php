<?php $this->load->view('templates/header');?>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><i class="fas fa-arrow-left mr-2"></i> Back <i class="fas fa-home"></i></a>
        </div>
        </nav>
    </header>

    <div class="container landing">
        <div class="row">
            <div class="col-md-8 mx-auto shadow mb-5">
                <div>
                    <h3 class="text-center mt-5 mb-5">Create Account</h3>
                </div>
                <form action="<?= base_url('C_article/register')?>" method="POST">
                <div class="form-group mb-3">
                    <input type="text" value="<?= set_value('name'); ?>" name="name" id="name" class="form-control" placeholder="Full Name . . .">
                    <?php echo form_error('name','<small class="text-danger mt-2">','</small>'); ?>
                </div>
                <div class="form-group mb-3">
                    <input type="text" value="<?= set_value('email'); ?>" name="email" id="email" class="form-control" placeholder="Email . . .">
                    <?php echo form_error('email','<small class="text-danger mt-2">','</small>'); ?>
                </div>
                <div class="form-group row mb-3">
                    <div class="col-md-6">
                        <input type="password" name="password1" id="password1" class="form-control" placeholder="Password . . .">                        
                    </div>                    
                    <div class="col-md-6">
                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Repeat Password . . .">                    
                    </div>
                    <div class="col-md-12 mt-2">
                        <?php echo form_error('password1','<small class="text-danger">','</small>'); ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    
                </div>
                <div class="form-group">
                    <button class="btn btn-primary float-right mb-4 form-control">Register</button>
                </div>
                </form>
                <div class="text-center mx-auto mb-3">
                    <a href="<?= base_url('C_article/login');?>">Already have an Account ? Login now !</a>
                </div>                
            </div>
        </div>
    </div>

    <?php $this->load->view('templates/footer');?>