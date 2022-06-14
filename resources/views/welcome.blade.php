@extends('layouts.app')

@section('content')

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 order-md-2 col-lg-9">
                <div class="container-fluid">

                    <div class="row   mb-5"></div>

                    <div class="row" id="products-wrapper">
                        @foreach($products as $product)
                            <div class="col-6 col-md-6 col-lg-4 mb-3">
                                <div class="card h-100 border-1">
                                    <div class="card-img-top">
                                        @if(!is_null($product->image_path))
                                                <img style="height: 250px" src="{{ asset('storage/' . $product->image_path) }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                        @else
                                                <img style="height: 250px" src="{{ $defaultImage }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                        @endif
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 class="card-title">

                                            {{ $product->name }}

                                        </h4>
                                        <h5 class="card-price small">
                                            <i>PLN {{ $product->price }}</i>
                                        </h5>

                                        <button class="btn btn-outline-primary mt-1 w-100 info"  href="{{route('products.show',  $product->id)}}" data-id="{{ $product->id }}" @guest disabled @endguest>
                                            <i class="fa-solid fa-circle-info"></i> Informacje
                                        </button>
                                        <button class="btn btn-outline-success mt-1 w-100 addToCartButton" data-id="{{ $product->id }}" @guest disabled @endguest>
                                            <i class="fa-solid fa-cart-plus"></i> Dodaj do koszyka
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <div class="row sorting mb-5 mt-5">
                                <div class="col-12">
                                    <div  id="pagination" class="btn-group float-md-end ml-3 paginationClass">
                                        {{ $products->links() }}
                                    </div>
                                    <div class="btn-group float-md-start ml-3">
                                        {{__('Wyświetlono ')}} {{ $products->firstItem() }} - {{ $products->lastItem() }} {{__('z')}} {{ $products->total() }} {{__('produktów')}}
                                    </div>
                                </div>
                            </div>
                    </div>


                </div>
            </div>

            <form id="sidebar-filter" class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
                <h3 class="mt-0 mb-5">Produkty <span class="text-primary">{{ $products->total() }}</span></h3>

                <h6 class="text-uppercase font-weight-bold mb-3">Kategorie</h6>

                @foreach($categories as $category)
                <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="filter[categories][]" id="category-{{ $category->id }}" value="{{ $category->id }}">
                        <label class="custom-control-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
                    </div>
                </div>
                @endforeach

                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                <h6 class="text-uppercase mt-5 mb-3 font-weight-bold"><i class="fa-light fa-dollar-sign"></i> Cena</h6>
                <div class="price-filter-control">
                    <input type="number" class="form-control w-50 pull-left mb-2" name="filter[price_min]" placeholder="50" id="price-min-control">
                    <input type="number" class="form-control w-50 pull-right" name="filter[price_max]" placeholder="150" id="price-max-control">
                </div>
                <input id="ex2" type="text" class="slider " value="50,150" data-slider-min="10" data-slider-max="200" data-slider-step="5" data-slider-value="[50,150]" data-value="50,150" style="display: none;">
                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                <a href="#" class="btn btn-lg btn-block btn-primary mt-5 w-100" id="filter"> <i class="fas fa-filter"></i> ZASTOSUJ FILTRY</a>
                <a href="{{ url('/') }}" class="btn btn-lg btn-block btn-primary mt-3 w-100"> <i class="fa-solid fa-rotate-left"></i> COFNIJ FILTRY</a>
            </form>

        </div>
    </div>
@endsection

@section('javascript')
    const storagePath = '{{ asset('storage') }}/';
    const defaultImage = '{{ $defaultImage }}';
    const addToCart = '{{ url('cart') }}/';
    const goToCart = '{{ url('cart') }}';
    const goToShow = '{{ url('products')}}/';
    const isGuest = '{{ $isGuest }}';
    const isUser = '{{ $isUser }}';
@endsection

@section('js-files')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection
