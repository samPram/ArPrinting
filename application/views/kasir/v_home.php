<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Dashboard Kasir</h4>
                <h1 class="text-muted page-title-alt text-center">Welcome <?= ucfirst($this->session->userdata('username')); ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-info">
                                    <i class="icon-wallet"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b id="totalPendapatan">Rp. </b></h4>
                                <p class="text-muted m-b-0 m-t-0">Total Pendapatan Hari ini</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-custom">
                                    <i class="icon-badge"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b id="barangTerlaris"></b></h4>
                                <p class="text-muted m-b-0 m-t-0">Barang Terlaris Hari ini</p>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-box">
                    <div class="bar-widget">
                        <div class="table-box">
                            <div class="table-detail">
                                <div class="iconbox bg-danger">
                                    <i class="icon-fire"></i>
                                </div>
                            </div>

                            <div class="table-detail">
                                <h4 class="m-t-0 m-b-5"><b id="penjualanTertinggi">Rp. </b></h4>
                                <p class="text-muted m-b-0 m-t-0">Total Penjualan Tertinggi Hari Ini</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>