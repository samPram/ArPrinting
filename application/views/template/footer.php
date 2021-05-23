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

    <script src="<?php echo base_url(); ?>assets/pages/datatables.init.js"></script>


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
            $('#datatable2-keytable').DataTable({
                keys: true
            });
            $('#datatable2-responsive').DataTable();
            $('#datatable2-colvid').DataTable({
                "dom": 'C<"clear">lfrtip',
                "colVis": {
                    "buttonText": "Change columns"
                }
            });
            $('#datatable2-scroller').DataTable({
                ajax: "assets/plugins/datatables/json/scroller-demo.json",
                deferRender: true,
                scrollY: 380,
                scrollCollapse: true,
                scroller: true
            });
            var table = $('#datatable2-fixed-header').DataTable({
                fixedHeader: true
            });
            var table = $('#datatable2-fixed-col').DataTable({
                scrollY: "300px",
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                fixedColumns: {
                    leftColumns: 1,
                    rightColumns: 1
                }
            });

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

            $('#btnAddBarangMasuk').attr('disabled', true);

            $('#delete-modal').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });

            $('#modal-removeCard').on('show.bs.modal', function(e) {
                // $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                let id = $(e.relatedTarget).data('id');
                $(this).find('.btn-ok').on('click', function(e) {
                    $(`tr[data-id='${id}']`).empty();
                    $(`.btnAddCard[data-id='${id}']`).attr('disabled', false)
                });
            });

            $('#btn-detailTransaksi').on('click', function(e) {
                let id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: `<?= base_url(); ?>Transaksi/detailTransaction/${id}`,
                    dataType: "json",
                    success: function(data) {
                        console.log(data)
                        let i = 1;
                        let row = '';
                        data.forEach(element => {
                            row += `<tr>
                                    <td>${i++}</td>
                                    <td>${element.nama_produk}</td>
                                    <td>${element.harga}</td>
                                    <td>${element.jumlah}</td>
                                    <td>${element.sub_total}</td>
                                    <td><a data-href="" class='on-default default-row btn btn-danger' data-toggle='modal' data-target='#delete-modal'>
                          <i class='ti-trash'></i></a></td>
                                </tr>`;
                        });
                        $('.data-detail').append(row);
                        $(`#btn-detailTransaksi[data-id='${id}']`).attr('disabled', true);
                    }
                });
            })

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

            $('#harga-masuk').keyup(function(e) {
                let harga = $('#harga-masuk').val().replace(/\./g, '');
                let jumlah = $('#jumlah-masuk').val();

                console.log(harga);
                let total = harga * jumlah;
                $('#total-masuk').attr('value', total);
            })

            // $(`p[id='hargaProduk']`).each(function(i) {
            //     // console.log($(this).data('id'))
            //     let id_produk = $(this).data('id')
            //     $.ajax({
            //         url: `<?= base_url(); ?>Barang_masuk/showFirst/${id_produk}`,
            //         type: 'GET',
            //         dataType: 'json',
            //         success: function(data) {
            //             let firstPrice = data.filter(element => {
            //                 return element.jumlah_masuk > 0
            //             });
            //             console.log(firstPrice)
            //             $(`#hargaProduk[data-id='${id_produk}']`).attr('data-data', `${firstPrice[0].harga_masuk}`)
            //             $(`#hargaProduk[data-id='${id_produk}']`).attr('data-idmasuk', `${firstPrice[0].id_masuk}`)
            //             $(`#hargaProduk[data-id='${id_produk}']`).append(`<b>Rp. ${firstPrice[0].harga_masuk}</b>`)
            //         }
            //     })
            // })
            // console.log()

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

        });
        TableManageButtons.init();

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
    </script>

    </body>

    <!-- Mirrored from coderthemes.com/_2.1/dark_leftbar/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Oct 2016 02:52:23 GMT -->

    </html>