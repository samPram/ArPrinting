        <!-- ========== Left Sidebar Start ========== -->

        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>

                        <li class="text-muted menu-title">Menu Utama</li>

                        <li class="has_sub">
                            <a href="<?php echo base_url('welcome'); ?>" class="waves-effect"><i class="ti-home"></i>
                                <span> Beranda </span> <span></span></a>

                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-dashboard"></i> <span> Master</span> <span class="menu-arrow"></span> </a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url('kasir/Produk'); ?>">Produk</a></li>
                            </ul>
                        </li>


                        <li class="has_sub">
                            <a href="<?php echo base_url('Transaksi'); ?>" class="waves-effect"><i class="ti-money"></i> Transaksi Penjualan</a>

                        </li>

                        <li class="has_sub">
                            <a href="<?php echo base_url('kasir/LaporanController'); ?>" class="waves-effect"><i class="ti-file"></i> Laporan Penjualan</a>

                        </li>



                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->
        <div class="content-page">