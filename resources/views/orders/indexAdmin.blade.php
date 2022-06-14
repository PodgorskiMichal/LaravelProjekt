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
                <th scope="col">#</th>
                <th scope="col"># Users</th>
                <th scope="col">Ilość</th>
                <th scope="col">Cena</th>
                <th scope="col">Produkty</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <th scope="row">{{$order->user->id}}</th>
                        <th scope="row">{{$order->quantity}}</th>
                        <th scope="row">{{$order->price}} zł</th>
                        <th scope="row">
                        @foreach($order->products as $product)
                            <ul>
                                <li>{{$product->name}} - {{$product->description}}</li>
                            </ul>
                        @endforeach
                        </th>
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
