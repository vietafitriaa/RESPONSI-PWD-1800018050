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
<div class="container">
  <center><h2>Silahkan Isi Form</h2></center>
  <?php if( validation_errors() ) : ?>
  <div class="alert alert-danger" role="alert">
  <?= validation_errors(); ?>
  </div>
  <?php endif; ?>

<div class="container">
  <table>
  <form action="" method="post" class="form-horizontal">
    <br>
  <div class="form-inline my-2 my-lg-0">
            <br><label class="control-label col-sm-2" for="nama">Nama</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" id="nama">
        </div></div><br>
        <div class="form-inline my-2 my-lg-0">
            <br><label class="control-label col-sm-2" for="instansi">Instansi</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="instansi" id="instansi">
        </div></div><br>
        <div class="form-inline my-2 my-lg-0">
            <br><label class="control-label col-sm-2" for="email">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email">
        </div></div><br>
        <div class="form-inline my-2 my-lg-0">
            <br><label class="control-label col-sm-2" for="keperluan">Keperluan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="keperluan" id="keperluan">
        </div></div><br>
        <div class="form-inline my-2 my-lg-0">
            <br><label class="control-label col-sm-2" for="nohp">No HP</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nohp" id="nohp">
        </div></div><br>
        <div class="col-sm-offset-2 col-sm-10"><button class="btn" style="background-color: #d6eaf8" type="submit" title="Send Message">Submit</button>
      </div>
  </form></div></table>
</div>

