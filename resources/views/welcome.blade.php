@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <div class="row">


                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-6 col-md-6 col-lg-4 mb-3">
                                <div class="card h-100 border-1">
                                    <div class="card-img-top">
                                        @if(!is_null($product->image_path))
                                            <img src="{{ asset('storage/'.$product->image_path) }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                        @else
                                            <img src="https://via.placeholder.com/240x240/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                        @endif
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 class="card-title">
                                            {{--                                            <a href="product.html" class=" font-weight-bold text-dark text-uppercase small">--}}
                                            {{ $product->name }}
                                            {{--                                            </a>--}}
                                        </h4>
                                        <h5 class="card-price small">
                                            <i>PLN {{ $product->price }}</i>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="row">
                        <div class="col-7">
                            Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }}
                        </div>

                        <div class="col-5">
                            <div class="btn-group float-end"
                            {{ $products->links() }} {{-- Paginacja przełączanie stron --}}
                            </div>
                        </div>
                    </div>

        </div>
    </div>
@endsection
