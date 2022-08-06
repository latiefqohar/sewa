

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kontrakan</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <form action="<?= base_url('kontrakan/aksi_tambah'); ?>" method="POST">
                    
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" class="form-control" name="no_unit" placeholder="Masukkan unit" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="tipe">tipe</label>
                        <input type="text" class="form-control" name="tipe" placeholder="Masukkan tipe" required>
                    </div>
                    <div class="form-group float-right">
                        <button  class="btn  btn-success"><i class="fa fa-check-circle"></i> Simpan Unit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
