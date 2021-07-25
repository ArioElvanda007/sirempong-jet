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
            modal.find('.modal-body #nama_product').val(val_mynama);
            modal.find('.modal-body #id_jenis').val(val_myidjenis);
            modal.find('.modal-body #harga_product').val(val_myhargaproduct);
            modal.find('.modal-body #harga_promo').val(val_myhargapromo);
            modal.find('.modal-body #jumlah_product').val(val_myjumlahproduct);
            modal.find('.modal-body #id_gambar').val(val_mygambar);
            if (val_mystatuspromo == 1) {
                modal.find('.modal-body #customCheckbox2').prop("checked", true);                
            } else {
                modal.find('.modal-body #customCheckbox2').prop("checked", false);                
            }

            $('.modal-img').html('');//clear image
            modal.find('.modal-img').append("<img src='"+ "/img/" + val_mygambar +"'>" );

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

    //preview image create
    $('#gambar').change(function(){   
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); 
    });

    // //preview image create
    // $('#gambar2').change(function(){   
    //     // let reader = new FileReader();
    //     // reader.onload = (e) => {
    //     //     $('#preview_image2').attr('src', e.target.result);
    //     // }
    //     // reader.readAsDataURL(this.files[0]);



    // });

    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {
            $('.modal-img').html('');//clear image

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gambar').on('change', function() {
            imagesPreview(this, 'div.modal-img');
        });

        $('#gambar2').on('change', function() {
            imagesPreview(this, 'div.modal-img');
        });

    });

</script>