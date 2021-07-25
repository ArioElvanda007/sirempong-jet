<script>
    $(function () {
        // page table script
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });

        // form modal
        $('#edit_user').on('show.bs.modal', function(event){//menampilkan form modal & mengambil kata kunci
            var button = $(event.relatedTarget)//ketikan tombol di click
            // parsing data dari class data-target ke dalam variable val
            var val_myiduser = button.data('myiduser')
            var val_mynameuser = button.data('mynameuser')
            var val_myemailuser = button.data('myemailuser')
            var val_mynotelp = button.data('mynotelp')
            var val_mypassword = button.data('password_user')
            // var val_myidaksesn = button.data('myidaksesn')
            // var val_myhakaksesn = button.data('myhakaksesn')

            // mengisi value yang ada di div modal-body
            var modal = $(this)
            // modal-body adalah <div class="modal-body"> yang ada di form home
            modal.find('.modal-body #id_user').val(val_myiduser);
            modal.find('.modal-body #name_user').val(val_mynameuser);
            modal.find('.modal-body #email_user').val(val_myemailuser);
            modal.find('.modal-body #no_telp').val(val_mynotelp);  
            // modal.find('.modal-body #password_user').val(val_mypassword);
            // modal.find('.modal-body #konfirmasi_password').val(val_mypassword);
            //kondisi berdasarkan id nya
            // if (val_myidaksesn == 0) {
            //     modal.find('.modal-body #hak_aksesn').val(val_myidaksesn).data("New User");                
            // } else {
            //     if (val_myidaksesn == 1) {
            //         modal.find('.modal-body #hak_aksesn').val(val_myidaksesn).data("Administrator");                                    
            //     } else {
            //         modal.find('.modal-body #hak_aksesn').val(val_myidaksesn).data("User");                                                        
            //     }                
            // }
        })     
        
        $('#delete_user').on('show.bs.modal', function(event){//menampilkan form modal & mengambil kata kunci
            var button = $(event.relatedTarget)
            // parsing data dari class data-target ke dalam variable val
            var val_myiduser = button.data('myiduser')

            // mengisi value yang ada di div modal-body
            var modal = $(this)
            // modal-body adalah <div class="modal-body"> yang ada di form modal home
            modal.find('.modal-body #id_user').val(val_myiduser);
        })
        

    });
</script>