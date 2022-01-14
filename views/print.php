<html>
<head>
  <title>Cetak PDF</title>
  <style>
    .table {
        border-collapse:collapse;
        table-layout:fixed;width: 630px;
    }
    .table th {
        padding: 5px;
    }
    .table td {
        word-wrap:break-word;
        width: 20%;
        padding: 5px;
    }
    .line-title{
        border: 0;
        border-style: inset;
        border-top: 5px solid #000;
    }
  </style>
</head>
<body>
    <img src="assets/img/dkis.png" style="position: absolute; width: 60px; height: auto;">
    <div class="container" align="center">
                <span style="line-height: 1.6; font-weight: bold; font-size: 20px;">
                    DINAS KOMUNIKASI INFORMATIKA DAN STATISTIK
                </span></div>
    <hr class="line-title">
  <br>
  <p align="center" style="font-size: 15px">
      LAPORAN BUKU TAMU
  </p>
  <table class="table" border="1" width="100%" style="margin-top: 10px;">
    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Email</th>
                        <th>Keperluan</th>
                        <th>No HP</th>
    </tr>

    <?php
        if(empty($tamu2)){ // Jika data tidak ada
            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
        }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            foreach($tamu2 as $data){ // Looping hasil data transaksi
                $waktu = date('d-m-Y', strtotime($data->waktu)); // Ubah format tanggal jadi dd-mm-yyyy

                echo "<tr>";
                echo "<td style='width: 80px;'>".$waktu."</td>";
                echo "<td style='width: 100px;'>".$data->nama."</td>";
                echo "<td style='width: 80px;'>".$data->instansi."</td>";
                echo "<td style='width: 150px;'>".$data->email."</td>";
                echo "<td style='width: 100px;'>".$data->keperluan."</td>";
                echo "<td style='width: 100px;'>".$data->nohp."</td>";
                echo "</tr>";
            }
        }
    ?>
  </table>
</body>
</html>