<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Dashboard Admin</h4>
                <h1 class="text-muted page-title-alt text-center">Welcome <?= ucfirst($this->session->userdata('username')); ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-white">
                    <i class="md md-attach-money text-primary"></i>
                    <h2 class="m-0 text-dark counter font-600" id="totalTransaksi"></h2>
                    <div class="text-muted m-t-5">Total Transaksi</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-white">
                    <i class="md md-add-shopping-cart text-pink"></i>
                    <h2 class="m-0 text-dark counter font-600" id='totalBarang'></h2>
                    <div class="text-muted m-t-5">Total Barang</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-white">
                    <i class="md md-swap-horiz text-info"></i>
                    <h2 class="m-0 text-dark counter font-600" id="totalRetur"></h2>
                    <div class="text-muted m-t-5">Total Retur</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-white">
                    <i class="md md-account-child text-custom"></i>
                    <h2 class="m-0 text-dark counter font-600" id="totalUser"></h2>
                    <div class="text-muted m-t-5">Total Users</div>
                </div>
            </div>
        </div>

    </div> <!-- container -->

</div> <!-- content -->