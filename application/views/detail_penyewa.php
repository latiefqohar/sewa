<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penyewa</h6>
    </div>
    <div class="card-body">
    <form action="<?= base_url("sewa/update"); ?>" method="POST">
        <div class="row">
          
            <div class="col-lg-6 col-sm-16 col-xs-12">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="hidden" class="form-control" name="id" value="<?= $data_penyewa['id']; ?>">
                        <input type="text" class="form-control" name="nama" value="<?= $data_penyewa['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" value="<?= $data_penyewa['email']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK KTP</label>
                        <input type="text" class="form-control" name="nik" value="<?= $data_penyewa['nik']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $data_penyewa['tanggal_lahir']; ?>" >
                    </div>
            </div>
            <div class="col-lg-6 col-sm-16 col-xs-12">
                <div class="form-group">
                    <label for="no_unit">No.Unit</label>
                    <input type="text" class="form-control" name="no_unit" value="<?= $data_penyewa['no_unit']; ?>"
                        >
                </div>
                <!-- <div class="form-group">
                    <label for="mulai_sewa">Tanggal mulai sewa</label>
                    <input type="date" class="form-control" id="mulai_sewa" value="<?= $data_penyewa['mulai_sewa']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="selesai_sewa">Tanggal Selesai Sewa</label>
                    <input type="date" class="form-control" id="selesai_sewa" value="<?= $data_penyewa['selesai_sewa']; ?>" readonly>
                </div> -->
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="">Silahkan Pilih</option>
                        <option value="Aktif" <?php if($data_penyewa['status']=="Aktif"){echo "selected";}; ?>>Aktif</option>
                        <option value="Tidak Aktif" <?php if($data_penyewa['status']=="Tidak Aktif"){echo "selected";}; ?>>Tidak Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                   <button class="btn btn-primary btn-block">Update</button>
                </div>
            </div>
            
        </div>
        </form>
        <div class="row">
            <div class="col-lg-6">
                <h3>Foto KTP</h3>
                <?php if($data_penyewa['foto_ktp']== null){ ?>
                    <img src="<?= base_url('assets/img/noimage.png'); ?>"  width ="300px" alt="">
                <?php }else { ?>
                    <img src="<?= base_url('uploads/'.$data_penyewa['foto_ktp']); ?>"  width ="300px" alt="">
                <?php  } ?>
            </div>
        </div>
    </div>

</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tagihan</h6>
    </div>
    <div class="card-body">
        <table class="table table-stripped">
            <tr>
                <th>Tanggal Tagihan</th>
                <th>Total Tagihan</th>
                <th>Status Pembayaran</th>
                <th>Tagihan</th>
            </tr>
            <?php foreach($data_tagihan as $tagihan){ ?>
               <tr>
                   <td><?= $tagihan->tanggal_tagihan; ?></td>
                   <td><?= $tagihan->total_tagihan; ?></td>
                   <td><?= $tagihan->status_bayar; ?></td>
                   <td><?= $tagihan->tipe_tagihan; ?></td>
               </tr> 
            <?php } ?>

        </table>
    </div>

</div>