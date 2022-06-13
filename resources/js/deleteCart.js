$(function() {

    $('.deleteCart').click( function() {
        Swal.fire({
            title: 'Czy na pewno chcesz usunąć produkt z koszyka?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5aae00',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Tak',
            cancelButtonText: 'Nie'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: "DELETE",
                    url: deleteURL + $(this).data("id")
                })
                    .done(function( data ) {
                        window.location.reload();
                    })
                    .fail(function( data ) {
                        Swal.fire({
                            icon: data.responseJSON.status,
                            title: 'Uups...',
                            text: data.responseJSON.message
                        })
                    });
            }
        })
    });

});
