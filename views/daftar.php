<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
<title><?php echo $judul; ?></title>
        <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>aset/assets/img/logo.ico" />
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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>home/tambah">Form</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>home/daftar3">Daftar</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>assets/data_xml.php">XML</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>assets/data_json.php">JSON</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>auth/index/login">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section" id="contact">
  <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>aset/assets/img/favicon.ico" />
        <!-- Begin Page Content -->
        <div class="container-fluid">

<center>
    <?php
  date_default_timezone_set("Asia/Bangkok");
  ?>

  <script type="text/javascript">
  function date_time(id)
  {
  date = new Date;
  year = date.getFullYear();
  month = date.getMonth();
months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
d = date.getDate();
day = date.getDay();
days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
h = date.getHours();
  if(h<10)
  {
  h = "0"+h;
  }
  m = date.getMinutes();
  if(m<10)
  {
  m = "0"+m;
  }
  s = date.getSeconds();
  if(s<10)
  {
  s = "0"+s;
  }
  result = ''+days[day]+' '+d+' '+months[month]+' '+year+' '+h+':'+m+':'+s;
  document.getElementById(id).innerHTML = result;
  setTimeout('date_time("'+id+'");','1000');
  return true;
  }
  </script>

 <span id="date_time"></span>
<script type="text/javascript">window.onload = date_time('date_time');</script><h2 class="section-heading text-uppercase">Daftar Tamu</h2>
<h3 class="section-subheading text-muted">DINAS KOMUNIKASI INFORMATIKA DAN STATISTIK</h3></center>
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
      <td><?= $tamu2['waktu']; ?></td>
    </tr><?php endforeach; ?>
  </tbody>
</table>
</div>
</section>