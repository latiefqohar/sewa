

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Penyewa</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <form action="<?= base_url('sewa/aksi_tambah'); ?>" method="POST">
                    
                    <div class="form-group">
                        <label for="no_unit">No Unit</label>
                        <input type="text" class="form-control" name="no_unit" placeholder="Masukkan No Unit" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat_unit" placeholder="Masukkan Alamat Unit" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telpon">No Telpon</label>
                        <input type="number" class="form-control" name="no_telpon" placeholder="0854141xxx" required>
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK KTP</label>
                        <input type="text" class="form-control" name="nik"  placeholder="masukkan NIK" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe_sewa">Tipe Sewa</label>
                       <select name="tipe_sewa" name="tipe_sewa" class="form-control" requied>
                           <option value="">Silahkan Pilih</option>
                           <option value="Bulanan">Bulanan</option>
                           <option value="Tahunan">Tahunan</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="harga_sewa">Harga Sewa</label>
                        <input type="number" class="form-control" name="harga_sewa" required>
                    </div>
                    <div class="form-group float-right">
                        <button  class="btn  btn-warning"><i class="fa fa-undo"></i> Batal</button>
                        <button  class="btn  btn-success"><i class="fa fa-check-circle"></i> Simpan dan buat user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
