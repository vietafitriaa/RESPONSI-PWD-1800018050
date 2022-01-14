<title><?php echo $judul; ?></title>

    <!-- Include library Bootstrap Datepicker -->
    <link href="<?php echo base_url('aset3/assets/libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">

    <!-- Include File jQuery -->
    <script src="<?php echo base_url('aset3/assets/js/jquery.min.js') ?>"></script>
</head>
<body>
    <div style="padding: 15px;" class="container">
        <center><h3 style="margin-top: 0;"><i class="far fa-file-pdf"></i>  <b>Laporan Buku Tamu</b></h3></center>
        <hr />

        <form method="get" action="<?php echo base_url('index.php/laporan/index') ?>">
            <div class="row">
                <div class="col-sm-8 col-md-5">
                    <div class="form-group">
                        <label>Filter Tanggal</label>
                        <div class="input-group">
                            <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
                            <span class="input-group-text" id="basic-addon1">s/d</span>
                            <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
            </div>
            

            <?php
            if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                echo '<a href="'.base_url('laporan/index').'" class="btn btn-default">RESET</a>';
            ?>
        </form>

        <hr />
        <div class="container">
            <h4 style="margin-bottom: 5px;"><b>Data Buku Tamu</b></h4>
        <?php echo $label ?><br />
        </div>
        

        <div class="container" style="margin-top: 5px;">
            <a href="<?php echo $url_cetak ?>">CETAK PDF</a>
        </div>

        <div class="container" style="margin-top: 10px;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Email</th>
                        <th>Keperluan</th>
                        <th>No HP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(empty($tamu2)){ // Jika data tidak ada
                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                    }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                        foreach($tamu2 as $data){ // Looping hasil data transaksi
                            $waktu = date('d-m-Y H:i:s', strtotime($data->waktu)); // Ubah format tanggal jadi dd-mm-yyyy

                            echo "<tr>";
                            echo "<td>".$waktu."</td>";
                            echo "<td>".$data->nama."</td>";
                            echo "<td>".$data->instansi."</td>";
                            echo "<td>".$data->email."</td>";
                            echo "<td>".$data->keperluan."</td>";
                            echo "<td>".$data->nohp."</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include File JS Bootstrap -->
    <script src="<?php echo base_url('aset3/assets/js/bootstrap.min.js') ?>"></script>

    <!-- Include library Bootstrap Datepicker -->
    <script src="<?php echo base_url('aset3/assets/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>

    <!-- Include File JS Custom (untuk fungsi Datepicker) -->
    <script src="<?php echo base_url('aset3/assets/js/custom.js') ?>"></script>

    <script>
    $(document).ready(function(){
        setDateRangePicker(".tgl_awal", ".tgl_akhir")
    });
    </script>
</body>
</html>