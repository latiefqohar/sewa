
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Kontrakan</h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url("kontrakan/tambah"); ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>No Unit</th>
                        <th>Tipe</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_kontrakan as $kontrakan){ ?>
                        <?php 
                            $data = $this->main_model->find_data(['no_unit'=>$kontrakan->no_unit,'status'=>'Aktif'],'penyewa')->num_rows();
                            
                            ?>
                        <tr>
                            <td><?= $kontrakan->id; ?></td>
                            <td><?= $kontrakan->no_unit; ?></td>
                            <td><?= $kontrakan->tipe; ?></td>
                            <td><?php if($data>0){echo"Tidak";}else{echo"Ya";} ?></td>
                            <td>
                          
                            <a href="<?= base_url("kontrakan/edit/".$kontrakan->id) ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                            <a href="<?= base_url("kontrakan/delete/".$kontrakan->id) ?>" class="btn btn-danger"><i class="fas fa-pencil-alt"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>

