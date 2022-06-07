@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-6">
                <h1> Lista produktów </h1>
            </div>

            <div class="col-6">
                <a class="float-end" href="{{ route('products.create') }}">
                    <button type="button" class="btn btn-outline-dark border-1">{{ __('Dodaj')  }}</button>
                </a>
            </div>

        </div>

            <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Opis</th>
                <th scope="col">Ilość</th>
                <th scope="col">Cena</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->amount}}</td>
                        <td>{{$product->price}}</td>
                        <td>

                            <a href="{{route('products.show',  $product->id)}}">
                                <button class="btn btn-primary btn-sm">I</button>
                            </a>

                            <a href="{{route('products.edit',  $product->id)}}">
                                <button class="btn btn-success btn-sm">E</button>
                            </a>

                            <button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}">
                                X
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>

    <div class="row">
        <div class="col-7">
        Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }}
        </div>

        <div class="col-5">
            <div class="btn-group float-end"
                {{ $products->links() }}  {{-- Paginacja przełączanie stron --}}
            </div>
        </div>
    </div>

    </div>
@endsection

@section('javascript')
    const deleteURL = "{{ url('products') }}/";
@endsection

@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection

