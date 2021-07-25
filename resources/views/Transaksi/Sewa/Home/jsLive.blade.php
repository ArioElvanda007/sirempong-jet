<script>
    $(function () {
        // page table script
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        
        $('#delete_data').on('show.bs.modal', function(event){//menampilkan form modal & mengambil kata kunci
            var button = $(event.relatedTarget)
            // parsing data dari class data-target ke dalam variable val
            var val_myid_sewa = button.data('myid')

            // mengisi value yang ada di div modal-body
            var modal = $(this)
            // modal-body adalah <div class="modal-body"> yang ada di form modal home
            modal.find('.modal-body #id_sewa').val(val_myid_sewa);
        })
        

    });
</script>