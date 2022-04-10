<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penyewa</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-sm-16 col-xs-12">
                    <div class="form-group">
                        <label for="nama">Tanggal Tagihan</label>
                        <input type="text" class="form-control" id="nama" value="<?= $tagihan['tanggal_tagihan']; ?>"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="total_tagihan">Total Tagihan</label>
                        <input type="text" class="form-control" id="total_tagihan" value="<?= $tagihan['total_tagihan']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status_bayar">Status_pembayaran</label>
                        <input type="text" class="form-control" id="status_bayar" value="<?= $tagihan['status_bayar']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tipe_tagihan">Tipe Tagihan</label>
                        <input type="text" class="form-control" id="tipe_tagihan" value="<?= $tagihan['tipe_tagihan']; ?>" readonly>
                    </div>
                   
            </div>
            <div class="col-lg-6 col-sm-16 col-xs-12">
                <label> Bukti Pembayaran</label>
                <?php if($tagihan['bukti_pembayaran']== null){ ?>
                    <img src="<?= base_url('assets/img/noimage.png'); ?>"  width ="300px" alt="">
                <?php }else { ?>
                    <img src="<?= base_url('uploads/'.$tagihan['bukti_pembayaran']); ?>"  width ="300px" alt="">
                 <?php  } ?>

                <div class="form-group">
                        <label for="tipe_tagihan">Update Tagihan</label>
                        <select name="update_tagihan" class="form-control">
                            <option value="">Silahkan Pilih</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Lunas</option>
                        </select>
                    </div>
              
            </div>
        </div>
    </div>

</div>
