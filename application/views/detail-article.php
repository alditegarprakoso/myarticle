<?php $this->load->view('templates/header'); ?>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><i class="fas fa-arrow-left mr-2"></i> Back <i class="fas fa-home"></i></a>
        </div>
        </nav>
    </header>
        
    <div class="container landing">
    <?php foreach ($data as $article) : ?>
        <div class="row mb-3">            
            <div class="col-md-12 text-center">
            <h1><?php echo $article->title; ?></h1>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-7 mx-auto">
                <img class="img-fluid" src="<?= base_url(); ?>/assets/img/cover/<?= $article->cover; ?>" alt="">
            </div>
        </div>

        <div class="row text-justify">
            <div class="col-md-12 text-justify mb-5">
                <p><?php echo $article->content; ?></p>
            </div>
        </div>        
    <?php endforeach; ?>
    </div>

    <?php $this->load->view('templates/footer'); ?>  
</body>
</html>