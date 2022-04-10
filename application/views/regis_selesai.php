

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Data Penyewa</h6>
    </div>
    <div class="card-body">
        <center><h3><i class="fa fa-check-circle text-success"></i> Data Berhasil Dibuat</h3></center>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
               
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $penyewa['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK KTP</label>
                        <input type="text" class="form-control" name="nik"  value="<?= $penyewa['nik']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" value="<?= $penyewa['email'];?>" >
                    </div>
                  
                    <div class="form-group">
                        <label for="tanggal_lahir">Password</label>
                        <input type="text" class="form-control" name="tanggal_lahir" value="<?= $penyewa['password']; ?>">
                    </div>
                    <div class="form-group float-right">
                        <a href="<?= base_url("sewa/tambah"); ?>"  class="btn  btn-success"><i class="fa fa-check-circle"></i> Selesai</a>
                    </div>
            </div>
        </div>
    </div>

</div>
