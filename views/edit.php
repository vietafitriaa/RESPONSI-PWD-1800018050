<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
<title><?php echo $judul; ?></title>
        <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>aset/assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url(); ?>aset/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">BUKU TAMU</a>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>User/tambah">form</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>User/daftar3">daftar</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>auth/index/login">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section" id="contact">
<div class="container">
    <div class="text-center">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                    <h2 class="section-heading text-uppercase">Silahkan edit Identitas Anda</h2>
                    <h3 class="section-subheading text-muted">Buku Tamu DKIS</h3>
                </div>
               <form class="tamu" method="post" action="<?= base_url(); ?>home/ubah" novalidate="novalidate">
               	<input type="hidden" name="id" value="<?= $tamu2['id']; ?>">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6 mx-auto">
                            <div class="form-group">
                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama *" value="<?= $tamu2['nama']; ?>" />
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="instansi" type="text" name="instansi" placeholder="Instansi *" value="<?= $tamu2['instansi']; ?>"/>
                                <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>       
                            <div class="form-group">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Email *"  value="<?= $tamu2['email']; ?>"/>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>                     
                            <div class="form-group">
                                <input class="form-control" id="keperluan" type="text" name="keperluan" placeholder="Keperluan *" value="<?= $tamu2['keperluan']; ?>"/>
                                <?= form_error('keperluan', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>                            
                            <div class="form-group">
                                <input class="form-control" id="nohp" type="text" name="nohp" placeholder="No HP *" value="<?= $tamu2['nohp']; ?>"/>
                                <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" name="ubah" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>