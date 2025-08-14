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
