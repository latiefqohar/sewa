

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit User Admin</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <form action="<?= base_url('kontrakan/update'); ?>" method="POST">
                    
                    <div class="form-group">
                        <label for="no_unit">NO Unit</label>
                        <input type="hidden" name="id" value="<?= $kontrakan['id']; ?>">
                        <input type="text" class="form-control" name="no_unit" value="<?= $kontrakan['no_unit']; ?>" placeholder="Masukkan NO.  Unit" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="tipe">tipe</label>
                        <input type="text" class="form-control" name="tipe" value="<?= $kontrakan['tipe']; ?>"  placeholder="Masukkan tipe" required>
                    </div>
                    <div class="form-group float-right">
                        <button  class="btn  btn-success"><i class="fa fa-check-circle"></i> Update kontrakan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
