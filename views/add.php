<!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <?php if( $this->session->flashdata('flash') ) : ?>
<div class="row mt-3">
<div class="col-md-6">
<div class="alert alert-success alert-dissmissible fade show" role="alert">
 Data Tamu <strong>berhasil</strong>
 <?= $this->session->flashdata('flash');  ?>.
 <button type="button" class="close" data-dissmiss="alert" aria-label="close">
 <span aria-hidden="true">&times;</span>
 </button>
</div>
</div></div>
<?php endif; ?>
                    <h2 class="section-heading text-uppercase">Silahkan Isi Identitas Anda</h2>
                    <h3 class="section-subheading text-muted">Buku Tamu DKIS</h3>
                </div>
                <form class="tamu" method="post" action="<?= base_url(); ?>home/tambah" novalidate="novalidate">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6 mx-auto">
                            <div class="form-group">
                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Your Name *" data-validation-required-message="Please enter your name." />
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="instansi" type="text" name="instansi" placeholder="Your Email *"data-validation-required-message="Please enter your email address." />
                                <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>       
                            <div class="form-group">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Your Name *" data-validation-required-message="Please enter your name." />
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>                     
                            <div class="form-group">
                                <input class="form-control" id="keperluan" type="text" name="keperluan" placeholder="Your Necessary *"data-validation-required-message="Please enter your keperluan." />
                                <?= form_error('keperluan', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>                            
                            <div class="form-group">
                                <input class="form-control" id="nohp" type="text" name="nohp" placeholder="Your Email *"data-validation-required-message="Please enter your email address." />
                                <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        