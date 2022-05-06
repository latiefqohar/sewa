
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List User</h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url("user/tambah"); ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_user as $user){ ?>
                        <tr>
                            <td><?= $user->id; ?></td>
                            <td><?= $user->nama; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><?= $user->role; ?></td>
                            <td>
                               <?= $user->status; ?>
                            </td>
                            <td>
                            <?php if($user->status == "Aktif"){?>
                            <a href="<?= base_url("user/nonaktifkan/".$user->id) ?>" class="btn btn-warning"><i class="fas fa-user-slash"></i> Nonaktifkan</a>
                            <?php }else{ ?>
                                <a href="<?= base_url("user/aktifkan/".$user->id) ?>" class="btn btn-success"><i class="fas fa-user-slash"></i> Aktifkan</a>
                            <?php } ?>
                            <a href="<?= base_url("user/edit/".$user->id) ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                            <a href="<?= base_url("user/delete/".$user->id) ?>" class="btn btn-danger"><i class="fas fa-pencil-alt"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>

