<script>
    $(function () {
        // page table script
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });

        // form modal
        $('#edit_data').on('show.bs.modal', function(event){//menampilkan form modal & mengambil kata kunci
            var button = $(event.relatedTarget)//ketikan tombol di click
            // parsing data dari class data-target ke dalam variable val
            var val_myid = button.data('myid')
            var val_myjenis = button.data('myjenis')

            // mengisi value yang ada di div modal-body
            var modal = $(this)
            // modal-body adalah <div class="modal-body"> yang ada di form home
            modal.find('.modal-body #id').val(val_myid);
            modal.find('.modal-body #jenis').val(val_myjenis);
        })     
        
        $('#delete_data').on('show.bs.modal', function(event){//menampilkan form modal & mengambil kata kunci
            var button = $(event.relatedTarget)
            // parsing data dari class data-target ke dalam variable val
            var val_myid = button.data('myid')

            // mengisi value yang ada di div modal-body
            var modal = $(this)
            // modal-body adalah <div class="modal-body"> yang ada di form modal home
            modal.find('.modal-body #id').val(val_myid);
        })
        

    });
</script>