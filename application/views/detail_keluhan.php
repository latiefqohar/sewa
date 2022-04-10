<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penyewa</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-sm-16 col-xs-12">
                    <div class="form-group">
                        <label for="nama">Tanggal Keluhan</label>
                        <input type="text" class="form-control" id="nama" value="<?= $keluhan['tanggal']; ?>"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="total_tagihan">Keluhan</label>
                        <textarea class="form-control" cols="30" rows="10" readonly><?= $keluhan['keluhan']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status_bayar">Status Keluhan</label>
                        <input type="text" class="form-control" id="status_bayar" value="<?= $keluhan['status_keluhan']; ?>" readonly>
                    </div>
                   
            </div>
            <div class="col-lg-6 col-sm-16 col-xs-12">
               
                <form action="" method="POST">
                    
                    <div class="form-group">
                        <label for="tipe_tagihan">Update Keluhan</label>
                        <select name="status" class="form-control" required>
                            <option value="">Silahkan Pilih</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Belum Selesai">Belum Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Catatan</label>
                       <textarea name="catatan"class="form-control" cols="30" rows="10"><?= $keluhan['catatan']; ?></textarea>
                    </div>
                    <div class="form-group float-right">
                    <a href="<?= base_url('keluhan'); ?>" type="submit" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
