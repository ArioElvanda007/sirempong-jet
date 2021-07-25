<script>
    $(function () {
        //datetime
        //Initialize Select2 Elements
        $('.select2').select2()
    
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()
    
        //Date range picker
        $('#reservationdate').datetimepicker({
            // format: 'L'
            format: 'DD-MMM-YYYY'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
            format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
            ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
            },
            function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )
    
        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })
        
        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
    
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
    
        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });
    
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
        
        // // page table script
        // $("#example1").DataTable({
        //     "responsive": true,
        //     "autoWidth": false,
        // });

        // $('#delete_data').on('show.bs.modal', function(event){//menampilkan form modal & mengambil kata kunci
        //     var button = $(event.relatedTarget)
        //     // parsing data dari class data-target ke dalam variable val
        //     var val_myid = button.data('myid')

        //     // mengisi value yang ada di div modal-body
        //     var modal = $(this)
        //     // modal-body adalah <div class="modal-body"> yang ada di form modal home
        //     modal.find('.modal-body #id').val(val_myid);
        // })

        // form modal
        $('#create_data').on('show.bs.modal', function(event){//menampilkan form modal & mengambil kata kunci
            var button = $(event.relatedTarget)//ketikan tombol di click
            // parsing data dari class data-target ke dalam variable val
            var val_myid = button.data('myid')
            var val_mynama = button.data('mynama')
            var val_myidjenis = button.data('myidjenis')
            var val_mynamajenis = button.data('mynamajenis')
            var val_myhargaproduct = button.data('myhargaproduct')
            var val_myhargapromo = button.data('myhargapromo')
            var val_myjumlahproduct = button.data('myjumlahproduct')
            var val_mystatuspromo = button.data('mystatuspromo')
            var val_mygambar = button.data('mygambar')

            // mengisi value yang ada di div modal-body
            var modal = $(this)
            // modal-body adalah <div class="modal-body"> yang ada di form home
            modal.find('.modal-body #id').val(val_myid);
            modal.find('.modal-body #harga_product').val(val_myhargaproduct);
            modal.find('.modal-body #harga_productx').val(val_myhargaproduct);
            modal.find('.modal-body #jumlah_product').val(1);
            if (val_mystatuspromo == 1) {
                modal.find('.modal-body #harga_promo').val(val_myhargapromo);
                modal.find('.modal-body #harga_promox').val(val_myhargapromo);
            } else {
                modal.find('.modal-body #harga_promo').val(0);
                modal.find('.modal-body #harga_promox').val(0);
            }

            $('.lbl-product').html('');//clear html
            modal.find('.lbl-product').append("<h3>" + val_mynamajenis + " - " + val_mynama + "</h3>");

            $('.modal-img').html('');//clear image
            modal.find('.modal-img').append("<img src='"+ "/img/" + val_mygambar +"'>" );

        })     
    });

    function hitung_total() {
        var txtjml_hari = document.getElementById('jumlah_hari').value;
        var txtjml_unit = document.getElementById('jumlah_product').value;

        var txtharga_product = document.getElementById('harga_product').value;
        var txtharga_promo = document.getElementById('harga_promo').value;
        var txtsub_total = parseInt(txtharga_product) - parseInt(txtharga_promo); 
        var resultx = (parseInt(txtharga_product) * parseInt(txtjml_hari)) * parseInt(txtjml_unit);

        var txtjml_harix = document.getElementById('jumlah_hari').value;
        var txtjml_unitx = document.getElementById('jumlah_product').value;
        var txtharga_productx = document.getElementById('harga_product').value;
        var txtharga_promox = document.getElementById('harga_promo').value;

        document.getElementById('jumlah_harix').value = txtjml_harix;
        document.getElementById('jumlah_productx').value = txtjml_unitx;
        document.getElementById('harga_productx').value = txtharga_productx;
        document.getElementById('harga_promox').value = txtharga_promox;

        if (!isNaN(resultx)) {
            document.getElementById('total_sewa').value = resultx;
        }
    }

</script>

{{-- <script type="text/javascript">
</script> --}}