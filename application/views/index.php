<?php $this->load->view('templates/header'); ?>

<body>
    <?php $this->load->view('templates/navigasi'); ?>  

    <section class="mb-5">
        <div class="jumbotron text-center shadow">
            <div class="container">
                <div class="row landing">
                    <div class="col-md-5 mb-4">
                        <img src="<?php echo base_url(); ?>assets/img/aldi.jpg" class="rounded-circle pict1 mb-3 shadow">
                        <h2 class="mb-3">Aldi Tegar Prakoso</h2>
                        <h5>as Owner</h5>
                    </div>
                    <div class="col-md-7">
                        <img src="<?php echo base_url(); ?>assets/img/hello.svg" class="pict2 text-center">
                    </div>
                </div>
            </div>      
        </div>
    </section>
  
    <section class="article" id="article">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h1>Article</h1>
                </div>
            </div>

            <div class="row">       
                <div class="col-md-7 mx-auto">
                    <?php foreach ($data as $article) : ?>                    
                        <h4 class="text-dark pt-3 mb-4">
                            <?php echo $article->title; ?>                            
                        </h4>
                        <img class="img-thumbnail mb-3" src="<?= base_url(); ?>/assets/img/cover/<?= $article->cover; ?>" alt="">
                        <p class="text-justify"><?php echo $article->content; ?></p>
                        <div class="row">
                            <div class="col-md-6">
                            <h4><span class="badge badge-secondary"><?php echo $article->date; ?></span></h4>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <a href="<?php base_url(); ?>C_article/detailArticle/<?php echo $article->url; ?>">
                                    <button class="btn btn-primary float-right">
                                        Baca selengkapnya <i class="fas fa-arrow-right ml-3"></i>
                                    </button>
                                </a>                                
                            </div>
                        </div>
                        <br><br>
                    <?php endforeach; ?>                                                     
                </div>

                <div class="col-md-4 ml-1">
                
                    <form action="">
                        <div class="form-group mb-5">
                            <table>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" placeholder='Search Article . . .' size="30">
                                    </td>
                                    <td>
                                        <button class="btn btn-primary ml-2" type="submit"><i class="fas fa-search"></i></button>
                                    </td>
                                </tr>
                            </table>                                                        
                        </div>
                    </form>
                                            
                    <div class="card shadow mb-5">
                        <h6 class="text-center mb-4 mt-3">Most Article Popular</h6>
                            <table class="table">
                                <tr>
                                    <td>
                                        1. Belajar Web
                                    </td>
                                    <td>
                                        <i class="ml-5">100 views </i><i class="fas fa-eye"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2. Belajar CSS
                                    </td>
                                    <td>
                                        <i class="ml-5">80 views </i><i class="fas fa-eye"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3. Belajar HTML
                                    </td>
                                    <td>
                                        <i class="ml-5">50 views </i><i class="fas fa-eye"></i>
                                    </td>
                                </tr>
                            </table>
                    </div>

                    <div class="card shadow">
                        <h6 class="text-center mb-4 mt-3">Most Writter Popular</h6>
                            <table class="table">
                                <tr>
                                    <td>
                                        1. Aldi Tegar Prakoso
                                    </td>
                                    <td>
                                        <i class="ml-2">100 subscriber </i><i class="fas fa-user"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2. Shandika Galih
                                    </td>
                                    <td>
                                        <i class="ml-2">80 subscriber </i><i class="fas fa-user"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3. Tere Liye
                                    </td>
                                    <td>
                                        <i class="ml-2">50 subscriber </i><i class="fas fa-user"></i>
                                    </td>
                                </tr>
                            </table>
                    </div>
                </div>
                
            </div>

        </div>
    </section>

    <?php $this->load->view('templates/footer'); ?>  
</body>
</html>