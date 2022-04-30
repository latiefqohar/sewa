
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
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus" aria-hidden="true"></i> Tambah Keluhan
        </button>
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
                            <td><a href="<?= base_url("keluhan_saya/delete/".$keluhan->id) ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Keluhan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
        <form action="<?= base_url("keluhan_saya/tambah"); ?>" method="POST">
            <div class="form-group">
                <label for="keluhan">Keluhan</label>
                <textarea class="form-control" name="keluhan" cols="30" rows="10"></textarea>
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            
        </form>
      </div>
    </div>
  </div>
</div>

