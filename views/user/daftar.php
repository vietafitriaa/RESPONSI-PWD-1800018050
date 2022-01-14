  <title><?php echo $judul; ?></title>
  <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>aset/assets/img/logo.ico" />
        <!-- Begin Page Content -->

        <div class="container">
    <div class="container-fluid">
        <center><h3><i class="far fa-address-book"></i>  <b>Daftar Tamu</b> </h3></center>

<div class="container">
  <div class="col-md-3">
    <form action="" method="post">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari data tamu. . ." name="keyword" autocomplete="off" autofocus="">
        <div>
          <button class="btn btn-primary" type="button">Cari</button>
        </div></div>
    </form>
  </div>
</div>

<div class="container">
<table class="table table-striped table-light align-right">
  <thead style="background-color: #90caf9">
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Instansi</th>
      <th scope="col">Keperluan</th>
      <th scope="col">Email</th>
      <th scope="col">No HP</th>
      <th scope="col">Waktu</th>
      <?php foreach( $tamu2 as $tamu2 ) : ?>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= $tamu2['nama']; ?></td>
      <td><?= $tamu2['instansi']; ?></td>
      <td><?= $tamu2['keperluan']; ?></td>
      <td><?= $tamu2['email']; ?></td>
      <td><?= $tamu2['nohp']; ?></td>
      <td><?= $tamu2['waktu']; ?>
      <a href="<?= base_url(); ?>User/hapus/<?= $tamu2['id']; ?>" 
      onclick="return confirm('yakin?');" ><i class="fas fa-trash-alt col-sm-2" style="color: red"></i></a>
      <a href="<?= base_url(); ?>User/ubah/<?= $tamu2['id']; ?>"><i class="fas fa-edit" style="color: green"></i></a>
    </tr></td><?php endforeach; ?>
  </tbody>
</table>
</div>
       
    </div>
</div> <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->