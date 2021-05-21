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

            $("#harga").maskMoney({
                thousands: '.',
                decimal: ',',
                affixesStay: false,
                precision: 0
            });

            $("#bayar").maskMoney({
                thousands: '.',
                decimal: ',',
                affixesStay: false,
                precision: 0
            });

            $("#kembalian").maskMoney({
                thousands: '.',
                decimal: ',',
                affixesStay: false,
                precision: 0
            });
        });
        TableManageButtons.init();

        $('#delete-modal').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });

        // $('.btnAddCard').on('click', function(e) {
        //     let id = $(this).data('id');
        //     $.ajax({
        //         type: 'GET',
        //         url: `<?= base_url(); ?>Transaksi/list_card/${id}`,
        //         dataType: "json",
        //         success: function(data) {
        //             let list = `<tr>
        //                             <td>${data.nama_produk}</td>
        //                             <td>${data.harga}</td>
        //                             <td>
        //                                 <div class="form-group">
        //                                 <input type="number" class="form-control" id="quantity" name="quantity" required>
        //                                 </div>
        //                             </td>
        //                             <td></td>
        //                             <td></td>
        //                         </tr>`
        //             // console.log(data);
        //             $('.list-card').append(list);
        //             e.preventDefault();
        //             $(`.btnAddCard[data-id='${id}']`).attr('disabled', true)
        //         }

        //     });
        // });
    </script>

    </body>

    <!-- Mirrored from coderthemes.com/_2.1/dark_leftbar/tables-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Oct 2016 02:52:23 GMT -->

    </html>