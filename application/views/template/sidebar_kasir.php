        <!-- ========== Left Sidebar Start ========== -->

        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>

                        <li class="text-muted menu-title">Menu Utama</li>

                        <li class="has_sub">
                            <a href="<?php echo base_url('Home_kasir'); ?>" class="waves-effect"><i class="ti-home"></i>
                                <span> Beranda </span> <span></span></a>

                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-dashboard"></i> <span> Master</span> <span class="menu-arrow"></span> </a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url('Barang/view'); ?>">Produk</a></li>
                            </ul>
                        </li>


                        <li class="has_sub">
                            <a href="<?php echo base_url('Transaksi'); ?>" class="waves-effect"><i class="ti-money"></i> Transaksi Penjualan</a>

                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-back-left"></i> <span> Retur Barang</span> <span class="menu-arrow"></span> </a>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url(); ?>Return_barang">View</a></li>
                                <li><a href="<?php echo base_url('Return_barang/view'); ?>">Tambah Data</a></li>
                            </ul>
                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->
        <div class="content-page">