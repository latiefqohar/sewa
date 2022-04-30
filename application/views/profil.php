<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penyewa</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url("profil/update"); ?>" enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="col-lg-6 col-sm-16 col-xs-12">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data_penyewa['nama']; ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" value="<?= $data_penyewa['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK KTP</label>
                        <input type="text" class="form-control" name="nik" value="<?= $data_penyewa['nik']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $data_penyewa['tanggal_lahir']; ?>">
                    </div>
            </div>
            <div class="col-lg-6 col-sm-16 col-xs-12">
                <div class="form-group">
                    <label for="no_unit">No.Unit</label>
                    <input type="text" class="form-control" name="no_unit" value="<?= $data_penyewa['no_unit'];?> " readonly>
                </div>
               
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" name="status" value="<?= $data_penyewa['status']; ?>" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h3>Foto KTP</h3>
                <?php if($data_penyewa['foto_ktp']== null){ ?>
                    <img src="<?= base_url('assets/img/noimage.png'); ?>"  width ="300px" alt="">
                <?php }else { ?>
                    <img src="<?= base_url('uploads/'.$data_penyewa['foto_ktp']); ?>"  width ="300px" alt="">
                <?php  } ?>
                <input type="file" name="file_ktp">
            </div>
        </div>
        <button class="btn btn-success float-right mt-3">Update</button>
        </form>
    </div>

</div>
