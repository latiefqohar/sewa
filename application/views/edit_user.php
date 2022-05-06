

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit User Admin</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <form action="<?= base_url('user/update'); ?>" method="POST">
                    
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="id" value="<?= $user['id']; ?>">
                        <input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>" placeholder="Masukkan Nama" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" value="<?= $user['email']; ?>"  placeholder="Masukkan email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password"   placeholder="masukkan password">
                        <small class="text-danger">Isi jika ingin mengganti password</small>
                    </div>
                    <div class="form-group float-right">
                        <button  class="btn  btn-success"><i class="fa fa-check-circle"></i> Update user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
