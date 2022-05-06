
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Penyewa</h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url("sewa/tambah"); ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Unit</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_penyewa as $penyewa){ ?>
                        <tr>
                            <td><?= $penyewa->id; ?></td>
                            <td><?= $penyewa->nama; ?></td>
                            <td><?= $penyewa->email; ?></td>
                            <td><?= $penyewa->no_unit; ?></td>
                            <td>
                               <?= $penyewa->status; ?>
                            </td>
                            <td>
                            <?php if($penyewa->status == "Aktif"){?>
                            <a href="<?= base_url("sewa/nonaktifkan/".$penyewa->id) ?>" class="btn btn-danger"><i class="fas fa-user-slash"></i> Nonaktifkan</a>
                            <?php }else{ ?>
                                <a href="<?= base_url("sewa/aktifkan/".$penyewa->id) ?>" class="btn btn-success"><i class="fas fa-user-slash"></i> Aktifkan</a>
                            <?php } ?>
                            <a href="<?= base_url("sewa/detail/".$penyewa->id) ?>" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>

