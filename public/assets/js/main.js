// Sweetalert 2
function notification(status, message){
    Swal.fire({
        position: "top-end",
        icon: status,
        title: message,
        showConfirmButton: false,
        timer: 2000,
        toast: true,
        padding: "10px",
        timerProgressBar: true,
        customClass: {
            title: 'swal-title-custom',
            popup: 'swal-custom-popup'
        }
    });
}

// bulk checked
function select_all() {
    if($('#select_all:checked').length == 1){
        $('.select_data').prop('checked',true);
        if($('.select_data:checked').length >= 1)
        {
            $('.delete_btn').removeClass('d-none');
        }
    }else{
        $('.select_data').prop('checked',false);
        $('.delete_btn').addClass('d-none');
    }
}

// single checkbox
function select_single_item(id){
    var total = $('.select_data').length; //count total checkbox
    var total_checked =  $('.select_data:checked').length;//count total checked checkbox
    (total == total_checked) ? $('#select_all').prop('checked',true) : $('#select_all').prop('checked',false);
    (total_checked > 0) ?  $('.delete_btn').removeClass('d-none') : $('.delete_btn').addClass('d-none');
}

// multi delete
function bulk_delete(ids,url,rows){
    Swal.fire({
        title: 'Are you sure to delete all checked data?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Confirm',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    ids: ids,
                    _token: _token
                },
                dataType: "JSON",
            }).done(function (response) {
                if(response.status == "success") {
                    $('#select_all').prop('checked',false);
                    $('.delete_btn').addClass('d-none');
                    notification('success', 'Bulk deleted successfull.');
                }
                if (response.status == "error") {
                    Swal.fire('Oops...', response.message, "error");
                }
            }).fail(function () {
                Swal.fire('Oops...', "Somthing went wrong with ajax!", "error");
            });
        }
    });
}

// delete item
function deleteItem(id){
    Swal.fire({
        title: 'Are you sure to delete?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Confirm',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            document.getElementById('delete_form_'+id).submit();
        }
    });
}
