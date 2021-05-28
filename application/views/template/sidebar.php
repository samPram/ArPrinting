<!-- Sidebar start -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Menu Utama</li>

                <li class="has_sub">
                    <a href="<?php echo base_url('/Home_admin'); ?>" class="waves-effect"><i class="ti-home"></i>
                        <span> Beranda </span> <span></span></a>

                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-dashboard"></i> <span> Master</span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('/Barang'); ?>">Produk</a></li>
                        <li><a href="<?php echo base_url('/User'); ?>">User</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="<?php echo base_url('/Transaksi/getAllTransaction'); ?>" class="waves-effect"><i class="ti-money"></i> Transaksi Penjualan</a>

                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-file"></i> <span> Laporan</span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url(); ?>Persediaan_barang">Kartu Persedian Barang</a></li>
                        <li><a href="<?= base_url(); ?>Laporan">Laporan Penjualan</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- End of sidebar -->

<div class="content-page">