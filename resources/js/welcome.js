$(function () {

        cartButoon()
        info()

        $('a#filter').click(function() {
        const form = $('form.sidebar-filter').serialize();
        $.ajax({
            method: "GET",
            url: "/",
            data: form
        })

            .done(function( response ) {
                $('div#products-wrapper').empty();
                 $.each(response.data, function (index, product) {

                     cartButoon()
                     info()

                     const html = '<div class="col-6 col-md-6 col-lg-4 mb-3">\n' +
                         '              <div class="card h-100 border-1">\n' +
                         '                  <div class="card-img-top">\n' +
                         '                      <img style="height: 250px" src="'+ getImage(product) +'" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">\n' +
                         '                  </div>\n' +
                         '                  <div class="card-body text-center">\n' +
                         '                      <h4 class="card-title">\n' +
                                                        product.name +
                         '                      </h4>\n' +
                         '                      <h5 class="card-price small">\n' +
                         '                          <i>PLN ' + product.price + '</i>\n' +
                         '                      </h5>\n' +
                         '                      <button class="btn btn-outline-primary mt-1 w-100 info"' + getDisabled() + ' href=" ' + goToShow +  product.id + ' " ' + ' data-id="' + product.id + ' ">' +
                         '                          <i class="fa-solid fa-circle-info"></i> Informacje' +
                         '                      </button>' +
                         '                      <button class="btn btn-outline-success mt-1 w-100 addToCartButton"' + getDisabled() + ' data-id="' + product.id + '">' +
                         '                          <i class="fas fa-cart-plus"></i> Dodaj do koszyka' +
                         '                      </button>' +
                         '                  </div>\n' +
                         '              </div>\n' +
                         '         </div> '
                     $('div#products-wrapper').append(html);

                 });
            })
        });




    function cartButoon() {
        $('button.addToCartButton').click(function (event) {
            event.preventDefault();
            $.ajax({
                method: "POST",
                url: addToCart + $(this).data('id')
            }).done(function () {
                Swal.fire({
                    title: 'Brawo!',
                    text: 'Produkt dodany do koszyka!',
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonText: '<i class="fas fa-cart-plus"></i> Przejdź do koszyka',
                    cancelButtonText: '<i class="fas fa-shopping-bag"></i> Kontynuuj zakupy'
                }).then(function (result) {
                    if (result.isConfirmed) {
                        event.preventDefault();
                        window.location = goToCart;

                    }
                });
            }).fail(function () {
                Swal.fire('Oops...', 'Wystąpił błąd', 'error');
            });
        });
    }
function info() {
    $('button.info').click(function (event) {
        event.preventDefault();
        $.ajax({
            method: "GET",
            url: "/products/" + $(this).attr("data-id")
        }).done(function () {
            const id = event.currentTarget.getAttribute("data-id")
            console.log(id)
            if (isUser) {
                window.location = "/products/" + id
            }

        }).fail(function () {
            Swal.fire('Oops...', 'Wystąpił błąd', 'error');
        });
    });
}

    function getImage(product) {

        if (!!product.image_path) {
            return storagePath + product.image_path;
        }
        return defaultImage;
    }

    function getDisabled() {
        if (!isUser) {
            return ' disabled';
        }
        return '';
    }
});
