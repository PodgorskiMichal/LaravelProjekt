@extends('layouts.app')

@section('css-files')
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                @if(session('status'))
                    <div class="alert alert-success">
                        <button class="btn-close float-end" data-bs-dismiss="alert" aria-hidden="true"></button>
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>


        <div class="container-fluid">
            <h2 class="text"><i class="fas fa-shopping-basket"></i> Koszyk ({{$cart->getItems()->count()}}) </h2>

            <div class="row">

                <aside class="col-lg-9">

                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-borderless table-shopping-cart">
                                <thead class="text-muted">

                                <tr class="small text-uppercase">
                                    <th scope="col">Produkt</th>
                                    <th scope="col" width="120">Ilość</th>
                                    <th scope="col" width="120">Cena [PLN]</th>
                                    <th scope="col" width="120">Suma [PLN]</th>
                                    <th scope="col" width="120">Usuń</th>
                                </tr>

                                </thead>
                                @foreach($cart->getItems() as $item)
                                    <tbody>
                                        <tr class="border-top">
                                            <td>
                                                <figure class="itemside align-items-center">
                                                    <div class="aside"><img src="{{$item->getImage()}}" class="img-sm"></div>
                                                    <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">{{ $item->getName() }}</a>
                                                        <p class="text-muted small"> <br>  </p>
                                                    </figcaption>
                                                </figure>
                                            </td>

                                            <td>
                                                <div class="quantity-wrap"> {{ $item->getQuantity() }}</div>

                                            </td>
                                            <td>
                                                <div class="price-wrap"> <var class="price">{{ $item->getPrice() }}</var></div>
                                            </td>
                                            <td>
                                                <div class="price-total-wrap"> <var class="price-total">{{ $item->getSum() }}</var></div>
                                            </td>
                                            <td class="text-right d-none d-md-block">
                                                <button class="btn btn-danger btn-sm deleteCart" data-id="{{ $item->getProductId() }}">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </aside>

                <aside class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <dl class="dlist-align">
                                <div><b>Suma zamówienia:</b> {{ $cart->getSum() }} zł</div>
                            </dl>
                            <hr>
                            <a href="#" class="btn btn-outline-success w-100" data-abc="true"> Złóż zamówienie </a>
                            <a href="{{ url('/') }}" class="btn btn-outline-primary w-100 mt-2" data-abc="true">Kontynuuj zakupy</a>
                        </div>
                    </div>
                </aside>

            </div>
        </div>

    </div>
@endsection

@section('javascript')
    const deleteURL = "{{ url('cart') }}/";
@endsection

@section('js-files')
    <script src="{{ asset('js/deleteCart.js') }}"></script>
@endsection

