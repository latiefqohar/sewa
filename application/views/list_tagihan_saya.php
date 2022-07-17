
<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Tagihan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
           
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Tagihan</th>
                        <th>Nama</th>
                        <th>Unit</th>
                        <th>Tanggal Tagihan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_tagihan as $tagihan){ ?>
                        <tr>
                            <td><?= $tagihan->id; ?></td>
                            <td><?= $tagihan->nama; ?></td>
                            <td><?= $tagihan->no_unit; ?></td>
                            <td><?= $tagihan->tanggal_tagihan; ?></td>
                            <td><?= rupiah($tagihan->total_tagihan); ?></td>
                            <td>
                               <?= $tagihan->status_bayar; ?>
                            </td>
                            <td><a href="<?= base_url("tagihan_saya/detail/".$tagihan->id) ?>" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Detail</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>

