<div class="col-md-10 p-5 pt-2 scrollit">
    <div class="container-fluid">
        <h3><i class="fa fa-edit"></i>Edit Data Tamu</h3>
        <a href="<?= base_url('User/daftar'); ?>" class=""></a>
        
        <?php foreach ($tamu2 as $tamu2) : ?>
            <form action="<?= base_url('User/ubah2'); ?>" method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="id" class="form-control" value="<?= $tamu2->id; ?>">
                    <input type="text" name="nama" class="form-control" value="<?= $tamu2->nama; ?>">
                </div>
                <div class="form-group">
                    <label>Instansi</label>
                    <input type="text" name="instansi" class="form-control" value="<?= $tamu2->instansi; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $tamu2->email; ?>">
                </div>
                <div class="form-group">
                    <label>Keperluan</label>
                    <input type="text" name="keperluan" class="form-control" value="<?= $tamu2->keperluan; ?>">
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="nohp" class="form-control" value="<?= $tamu2->nohp; ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </form>
        <?php endforeach; ?>
    </div>
</div>