<div class="row">
    <?php if($penyewa['foto_ktp']==null){ ?>
    <div class="col-lg-12">
        <div class="alert alert-danger" role="alert">
            Anda belum melengkapin data diri anda, silahkan lengkapi data diri anda di menu Profile
        </div>
    </div>
    <?php } ?>
    
</div>

<div class="row">


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Tagihan Saya</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.
                            <?= number_format($tagihan['tagihan'],0,',','.'); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Keluhan Saya</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $keluhan; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tagihan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tanggal Tagihan</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data_tagihan as $tagihan){ ?>
                            <tr>
                                <td><?= $tagihan->id; ?></td>
                                <td><?= $tagihan->nama; ?></td>
                                <td><?= $tagihan->tanggal_tagihan; ?></td>
                                <td><?= $tagihan->total_tagihan; ?></td>
                                <td>
                                   <?= $tagihan->status_bayar; ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>