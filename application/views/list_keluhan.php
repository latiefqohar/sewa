
<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Keluhan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Tanggal Keluhan</th>
                        <th>Keluhan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_keluhan as $keluhan){ ?>
                        <tr>
                            <td><?= $keluhan->id; ?></td>
                            <td><?= $keluhan->nama; ?></td>
                            <td><?= $keluhan->tanggal; ?></td>
                            <td><?= $keluhan->keluhan; ?></td>
                            <td>
                               <?= $keluhan->status_keluhan; ?>
                            </td>
                            <td><a href="<?= base_url("keluhan/detail/".$keluhan->id) ?>" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Detail</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>

