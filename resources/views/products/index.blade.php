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
                <h1> <i class="fa-solid fa-list"></i> Lista produktów </h1>
            </div>

            <div class="col-6">
                <a class="float-end" href="{{ route('products.create') }}">
                    <button type="button" class="btn btn-outline-dark border-1"> <i class="fa-regular fa-plus"></i> {{ __('Dodaj')  }}</button>
                </a>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <form class="input-group" action="{{route('products.index')}}" method="GET">
                    <input type="text" class="form-control" placeholder="search" name="search1"/>

                    <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
                </form>
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
                <th scope="col">Kategoria</th>
                <th scope="col">Akcje</th>
            </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->amount}}</td>
                        <td>{{$product->price}}</td>
                        <td>@if($product->hasCategory()){{ $product->category->name }}@endif</td>
                        <td>

                            <a href="{{route('products.show',  $product->id)}}">
                                <button class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i></button>
                            </a>

                            <a href="{{route('products.edit',  $product->id)}}">
                                <button class="btn btn-success btn-sm"><i class="fa-regular fa-pen-to-square"></i></button>
                            </a>

                            <button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <p class="text-center">
                        Nie znaleziono wyników dla: <strong>{{ request()->query('search1') }}</strong>
                    </p>
                @endforelse
            </tbody>
            </table>

    <div class="row">
        <div class="col-7">
            {{__('Wyświetlono ')}} {{ $products->firstItem() }} - {{ $products->lastItem() }} {{__('z')}} {{ $products->total() }} {{__('produktów')}}
        </div>

        <div class="col-5">
            <div class="btn-group float-end"
            {{ $products->appends(['search1' => request() ->query('search1')])->links() }}  {{-- Paginacja przełączanie stron --}}
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

