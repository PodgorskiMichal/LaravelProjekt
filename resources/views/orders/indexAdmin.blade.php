@extends('layouts.app')

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
        <div class="row">
            <div class="col-6">
                <h1> <i class="fa-solid fa-list"></i> Lista zamówień </h1>
            </div>
        </div>

            <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col"># Nr. Zamówienia</th>
                <th scope="col"># ID użytkownika</th>
                <th scope="col">Ilość</th>
                <th scope="col">Cena</th>
                <th scope="col">Produkty</th>
                <th scope="col">Data zamówienia</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td scope="row">{{$order->id}}</td>
                        <td scope="row">{{$order->user->id}}</td>
                        <td scope="row">{{$order->quantity}}</td>
                        <td scope="row">{{$order->price}} zł</td>
                        <td scope="row">
                            @foreach($order->products as $product)
                                <div class="ms-2 me-auto">
                                    <div>[{{$product->pivot->qty }}] x {{ $product->name}}</div>
                                </div>
                            @endforeach
                        </td>
                        <td scope="row"> {{$product->created_at->format('Y-m-d')  }} </td>
                    </tr>
                @endforeach
            </tbody>
            </table>

    <div class="row">
        <div class="col-7">
            {{__('Wyświetlono ')}} {{ $orders->firstItem() }} - {{ $orders->lastItem() }} {{__('z')}} {{ $orders->total() }} {{__('zamówień')}}
        </div>

        <div class="col-5">
            <div class="btn-group float-end"
                {{ $orders->links() }}  {{-- Paginacja przełączanie stron --}}
            </div>
        </div>
    </div>

    </div>
@endsection
