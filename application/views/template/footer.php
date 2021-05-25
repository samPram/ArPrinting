    <footer class="footer">
        © 2019. AR Printing.
    </footer>
    </div>
    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.maskMoney.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>

    <!-- Plugins -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.colVis.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

    <script src="<?= base_url(); ?>assets/plugins/moment/moment.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="<?= base_url(); ?>assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/switchery/js/switchery.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

    <script src="<?= base_url(); ?>assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>


    <!-- datatabales -->
    <script src="<?php echo base_url(); ?>assets/pages/datatables.init.js"></script>

    <!-- date-picker -->
    <script src="<?php echo base_url(); ?>assets/pages/jquery.form-pickers.init.js"></script>

    <!-- form-advance -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/pages/jquery.form-advanced.init.js"></script>


    <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
                keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-colvid').DataTable({
                "dom": 'C<"clear">lfrtip',
                "colVis": {
                    "buttonText": "Change columns"
                }
            });
            $('#datatable-scroller').DataTable({
                ajax: "assets/plugins/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
                fixedHeader: true
            });
            var table = $('#datatable-fixed-col').DataTable({
                scrollY: "300px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    leftColumns: 1,
                    rightColumns: 1
                }
            });

            $('#datatable2').dataTable();

            $("#harga-masuk").maskMoney({
                thousands: '.',
                decimal: ',',
                affixesStay: false,
                precision: 0
            });

            // $("#bayar").maskMoney({
            //     thousands: '.',
            //     decimal: ',',
            //     affixesStay: false,
            //     precision: 0
            // });

            // $("#kembalian").maskMoney({
            //     thousands: '.',
            //     decimal: ',',
            //     affixesStay: false,
            //     precision: 0
            // });

            /* Disable button when add new barang */
            $('#btnAddBarangMasuk').attr('disabled', true);

            /* Execute delete with modal */
            $('#delete-modal').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });

            /* Execute delete data retur with modal */
            $('#modal-deleteReturn').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });

            /* Execute delete list keranjang belanja  */
            $('#modal-removeCard').on('show.bs.modal', function(e) {
                // $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                let id = $(e.relatedTarget).data('id');
                $(this).find('.btn-ok').on('click', function(e) {
                    $(`tr[data-id='${id}']`).empty();
                    $(`.btnAddCard[data-id='${id}']`).attr('disabled', false)
                });
            });

            /* Request detail data transaksi by Id transaksi */
            $('.btndetailTransaksi').on('click', function(e) {
                console.log('ok')
                $('.data-detail').empty();
                $(`.btndetailTransaksi`).attr('disabled', false);
                let id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: `<?= base_url(); ?>Barang_keluar/showByIdTransaction/${id}`,
                    dataType: "json",
                    success: function(data) {
                        console.log(data)
                        let i = 1;
                        let row = '';
                        data.forEach(element => {
                            let harga = formatRupiah(element.harga_keluar);
                            let total = formatRupiah(element.total_harga_keluar);
                            row += `<tr>
                                    <td>${i++}</td>
                                    <td>${element.nama_produk}</td>
                                    <td>Rp. ${harga}</td>
                                    <td>${element.jumlah_keluar}</td>
                                    <td>Rp. ${total}</td>
                                  
                                </tr>`;
                        });
                        $('.data-detail').html(row);
                        $(`.btndetailTransaksi[data-id='${id}']`).attr('disabled', true);
                    }
                });

            })

            /* Request data barang masuk by Id Produk */
            $('.btnBarangMasuk').on('click', function(e) {
                $(`.btnBarangMasuk`).attr('disabled', false);
                $('.data-barangMasuk').empty();

                let id = $(this).data('id');
                $('#btnAddBarangMasuk').attr('data-id', `${id}`);
                $.ajax({
                    url: `<?= base_url(); ?>Barang_masuk/showById/${id}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let i = 1;
                        let row = '';
                        // console.log(data)
                        data.forEach(element => {
                            row += `
                        <tr>
                            <td>${i++}</td>
                            <td>${element.tgl_masuk}</td>
                            <td>${element.harga_masuk}</td>
                            <td>${element.jumlah_masuk}</td>
                            <td>${element.total_harga_masuk}</td>
                            <td>
                            <a href='<?= base_url(); ?>Barang_masuk/tampil_update/${element.id_masuk}' class='on-default edit-row btn btn-primary btnUpdateBarangMasuk' class='col-sm-6 col-md-4 col-lg-3'>
                                                <i class='ti-pencil'></i></a>

                                            <a data-href="<?= base_url(); ?>Barang_masuk/delete/${element.id_masuk}/${element.id_produk}" class='on-default default-row btn btn-danger' data-toggle='modal' data-target='#delete-modal'>
                                                <i class='ti-trash'></i></a>

                            </td>
                        </tr>
                        `;
                        });

                        $('.data-barangMasuk').append(row);
                        $(`.btnBarangMasuk[data-id='${id}']`).attr('disabled', true);
                        $('#btnAddBarangMasuk').attr('disabled', false);
                    },
                })
            })

            /* Request insert data barang masuk */
            $('#btnAddBarangMasuk').on('click', function(e) {
                $('#jumlah-masuk').empty()
                $('#harga-masuk').empty()
                $('#total-masuk').empty()
                let id = $(this).data('id');
                $.ajax({
                    url: `<?= base_url(); ?>Barang/showById/${id}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data)
                        $('#id_produk').attr(`value`, `${data.id_produk}`)
                        $('#nama').attr(`value`, `${data.nama_produk}`)
                    }
                })
            })

            /* Auto multiplication harga and jumlah barang masuk */
            $('#harga-masuk').keyup(function(e) {
                let harga = $('#harga-masuk').val().replace(/\./g, '');
                let jumlah = $('#jumlah-masuk').val();

                let total = harga * jumlah;
                $('#total-masuk').attr('value', total);
            })

            $('.btnAddCard').on('click', function(e) {
                let id = $(this).data('id');
                let id_masuk = $(this).data('idmasuk');
                // console.log(id)
                let namaBarang = $(`#namaProduk[data-id='${id}']`).data('data');
                let hargaBarang = $(`#hargaProduk[data-id='${id}']`).data('data');

                let row = `
                <tr data-id='${id}'>
                                        <td>
                                            ${id}
                                            <input type='hidden' name='id_produk[]' value='${id}'>
                                            <input type='hidden' name='id_masuk[]' value='${id_masuk}'>
                                        </td>
                                         <td>${namaBarang}</td>
                                         <td>${hargaBarang}<input type='hidden' name='harga_keluar[]' value='${hargaBarang}'></td>
                                         <td>
                                             <div class="form-group">
                                             <input type="number" class="form-control" id="jumlah-keluar" data-id="${id}" name="jumlah_keluar[]" onkeyup='coba(${id})' required>
                                             </div>
                                         </td>
                                         <td>
                                            <div class="form-group">
                                             <input type="number" class="form-control" id="total_harga_keluar" data-id="${id}" name="total_harga_keluar[]"  required readonly>
                                             </div>
                                         </td>
                                         <td>
                                            <button id='btnRemoveCard' data-id='${id}' class='on-default default-row btn btn-danger' data-toggle='modal' data-target='#modal-removeCard'>
                                                <i class='ti-trash'></i>
                                            </button>
                                         </td>
                                     </tr>
                `;
                $('.list-card').append(row);
                $(`.btnAddCard[data-id='${id}']`).attr('disabled', true)
            });

            $('#btnAddTransaction').click(function(e) {
                // console.log();
                var data = $('#formTransaksi').serialize();
                $.ajax({
                    type: 'POST',
                    url: `<?= base_url(); ?>Transaksi/add`,
                    data: data,
                    success: function(data) {
                        // console.log('success')
                        window.location.href = data;
                    }
                })
            });

            /* Request barang keluar by Id transaction */
            $('.btnViewBarangKeluar').click(function(e) {
                $(`.btnViewBarangKeluar`).attr('disabled', false);
                $('.data-viewBarangKeluar').empty();
                let id = $(this).data('id');
                $.ajax({
                    url: `<?= base_url(); ?>Barang_keluar/showByIdTransaction/${id}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let row = ``;
                        let i = 1
                        data.forEach(element => {
                            let harga = formatRupiah(element.harga_keluar);
                            let total = formatRupiah(element.total_harga_keluar);
                            row += `
                            <tr>
                                <td>${i++}</td>
                                <td>${element.nama_produk}</td>
                                <td>${element.jumlah_keluar}</td>
                                <td>Rp. ${harga}</td>
                                <td>Rp. ${total}</td>
                            </tr>
                            `;
                        });

                        $('.data-viewBarangKeluar').html(row);
                        $(`.btnViewBarangKeluar[data-id='${id}']`).attr('disabled', true);
                    }
                });
            })

            $('#btnSubmitDateRange').click(function(e) {
                $('#data-view').empty();
                var data = $('#form-dateRange').serialize();
                $.ajax({
                    url: `<?= base_url(); ?>Laporan/getPeriode`,
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        let row = ``;
                        let i = 1;
                        data.forEach(element => {
                            row += `
                            <tr>
                                        <td>${i++}</td>
                                        <td>${element.id_transaksi}</td>
                                        <td>${element.tanggal}</td>
                                        <td>${element.username}</td>
                                        <td>${element.jumlah_item}</td>
                                        <td>${element.bayar}</td>
                                        <td>${element.total}</td>
                                        <td>${element.kembali}</td>
                                        <td>

                                            <button data-id="${element.id_transaksi}" class='on-default default-row btn btn-info btnViewBarangKeluar' onclick='detailTransaksi2(${element.id_transaksi})'>
                                                <i class='ti-eye'></i></button>
                                        </td>
                                    </tr>
                            `;
                        });
                        $('#data-view').html(row);
                    }
                })
            })

            $('.btnDetailTransaksi').click(function(e) {
                $(`.btnDetailTransaksi`).attr('disabled', false);
                $('.data-viewDetailTransaksi').empty();
                let id = $(this).data('id');
                $.ajax({
                    url: `<?= base_url(); ?>Barang_keluar/showByIdTransaction/${id}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        let row = ``;
                        let i = 1
                        data.forEach(element => {
                            row += `
                            <tr data-id='${element.id_keluar}'>
                                <td>${i++}</td>
                                <td>${element.nama_produk}</td>
                                <td>${element.jumlah_keluar}</td>
                                <td>${element.harga_keluar}</td>
                                <td>${element.total_harga_keluar}</td>
                                <td>
                                <button data-id="${element.id_keluar}" class='on-default default-row btn btn-success btnDetailTranskasi' onclick='showByIdKeluar(${element.id_keluar})' data-toggle='modal' data-target='#modal-return-add'>
                          <i class='ti-plus'></i></button>
                                </td>
                            </tr>
                            `;
                        });

                        $('.data-viewDetailTransaksi').html(row);
                        $(`.btnDetailTransaksi[data-id='${id}']`).attr('disabled', true);
                    }
                });
            })

            $('#jumlah-return').keyup(function(e) {
                let hargaReturn = $('#harga-return').val();
                let jumlahReturn = $('#jumlah-return').val();
                let result = hargaReturn * jumlahReturn;
                $('#total-return').attr('value', result);
            })

            $('.btnUpdateReturn').click(function(e) {
                let id = $(this).data('id');
                $.ajax({
                    url: `<?= base_url(); ?>Return_barang/showById/${id}`,
                    data: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        $('#id-return').attr('value', data.id_return);
                        $('#id-transaksi-return').attr('value', data.id_transaksi);
                        $('#id-keluar').attr('value', data.id_keluar);
                        $('#nama-return').attr('value', data.nama_produk);
                        $('#jumlah-return').attr('value', data.jumlah_barang);
                        $('#jumlah-keluar').attr('value', data.jumlah_keluar);
                        $('#jumlah-return-cur').attr('value', data.jumlah_barang);
                        $('#harga-return').attr('value', data.harga_barang);
                        $('#total-return').attr('value', data.total_barang);
                    }
                })
            })

            $.ajax({
                url: `<?= base_url(); ?>User/getCountAll`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#totalUser').text(data.total);
                }
            });

            $.ajax({
                url: `<?= base_url(); ?>Transaksi/getCountAll`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#totalTransaksi').text(data.total);
                }
            });

            $.ajax({
                url: `<?= base_url(); ?>Barang/getCountAll`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#totalBarang').text(data.total);
                }
            });

            $.ajax({
                url: `<?= base_url(); ?>Return_barang/getCountAll`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#totalRetur').text(data.total);
                }
            });

        });
        TableManageButtons.init();

        function formatRupiah(nominal) {
            var reverse = nominal.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }

        function coba(id) {
            // console.log(id)
            let jumlahKeluar = $(`#jumlah-keluar[data-id='${id}']`).val();
            let hargaKeluar = $(`#hargaProduk[data-id='${id}']`).data('data');
            let reuslt = jumlahKeluar * hargaKeluar;
            // console.log(jumlahKeluar)
            let subHarga = $(`#total_harga_keluar[data-id='${id}']`).attr('value', `${reuslt}`)
            // let current = parseInt($('#total').val());
            // let totalHarga = current + parseInt(subHarga.val());
            // console.log(totalHarga)
            // $('#total').attr('value', totalHarga);
            totalHarga();
        }

        function totalHarga() {
            let result = 0;
            $(`input[id='total_harga_keluar']`).each(function(i) {
                let subHarga = parseInt($(this).val());
                result += subHarga
                // console.log(subHarga)
            })
            $('#total').attr('value', result);
        }

        $('#bayar').keyup(function(e) {
            let totalBayar = $('#total').val();
            let bayar = $(this).val();
            let result = bayar - totalBayar;
            $('#kembalian').attr('value', result)
        })

        function detailTransaksi(id) {
            $(`.btnViewBarangKeluar`).attr('disabled', false);
            $('.data-viewBarangKeluar').empty();
            // let id = $('.btnViewBarangKeluar').data('id');
            $.ajax({
                url: `<?= base_url(); ?>Barang_keluar/showByIdTransaction/${id}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    let row = ``;
                    let i = 1
                    data.forEach(element => {
                        row += `
                            <tr>
                                <td>${i++}</td>
                                <td>${element.nama_produk}</td>
                                <td>${element.jumlah_keluar}</td>
                                <td>${element.harga_keluar}</td>
                                <td>${element.total_harga_keluar}</td>
                            </tr>
                            `;
                    });

                    $('.data-viewBarangKeluar').html(row);
                    $(`.btnViewBarangKeluar[data-id='${id}']`).attr('disabled', true);
                }
            });
        }

        function showByIdKeluar(id) {
            $.ajax({
                url: `<?= base_url(); ?>Barang_keluar/showById/${id}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#id-keluar-return').attr('value', data.id_keluar);
                    $('#id-transaksi-return').attr('value', data.id_transaksi);
                    $('#nama-return').attr('value', data.nama_produk);
                    $('#harga-return').attr('value', data.harga_keluar);
                    $('#jumlah-keluar-return').attr('value', data.jumlah_keluar);
                }
            })
        }
    </script>

    </body>

    <!-- Mirrored from coderthemes.com/_2.1/dark_leftbar/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Oct 2016 02:52:23 GMT -->

    </html>