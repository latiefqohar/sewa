<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penyewa</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-sm-16 col-xs-12">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?= $data_penyewa['nama']; ?>"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" id="email" value="<?= $data_penyewa['email']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK KTP</label>
                        <input type="text" class="form-control" id="nik" value="<?= $data_penyewa['nik']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tanggal_lahir" value="<?= $data_penyewa['tanggal_lahir']; ?>" readonly>
                    </div>
            </div>
            <div class="col-lg-6 col-sm-16 col-xs-12">
                <div class="form-group">
                    <label for="no_unit">No.Unit</label>
                    <input type="text" class="form-control" id="no_unit" value="<?= $data_penyewa['no_unit']; ?>"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="mulai_sewa">Tanggal mulai sewa</label>
                    <input type="date" class="form-control" id="mulai_sewa" value="<?= $data_penyewa['mulai_sewa']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="selesai_sewa">Tanggal Selesai Sewa</label>
                    <input type="date" class="form-control" id="selesai_sewa" value="<?= $data_penyewa['selesai_sewa']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" value="<?= $data_penyewa['status']; ?>" readonly>
                </div>
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