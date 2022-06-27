@extends('layouts.app')

@section('content')

    <div class="container pt-5">
        <div class="row">
            <div class="col-md-8 order-md-2 col-lg-9">
                <div class="container-fluid">

                    <div class="row mb-5"></div>

                    <div class="row" id="products-wrapper">

                            <div class="col-12 mb-2">
                                <form class="input-group">
                                   <div class="input-group">
                                    <input type="text" class="form-control rounded" placeholder="search" name="search3" id="search3"/>

                                     <button type="submit" class="btn btn-outline-primary search" id="search">search</button>

                                   </div>
                                </form>
                            </div>

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

                                        <button class="btn btn-outline-primary mt-1 w-100 info"  href="{{route('products.show',  $product->id)}}" data-id="{{ $product->id }}">
                                            <i class="fa-solid fa-circle-info"></i> Informacje
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="row sorting mb-5 mt-5">
                            <div class="col-12">
                                <div  id="pagination" class="btn-group float-md-end ml-3 paginationClass">
                                    {{ $products->appends(['search3' => request() ->query('search3')])->links() }}
                                </div>
                                <div class="btn-group float-md-start ml-3">
                                    {{__('Wyświetlono ')}} {{ $products->firstItem() }} - {{ $products->lastItem() }} {{__('z')}} {{ $products->total() }} {{__('produktów')}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <form id="sidebar-filter" class="col-md-4 order-md-1 col-lg-3 sidebar-filter ">
                <h3 class="mt-0 mb-5">Produkty <span class="text-primary">{{ $products->total() }}</span></h3>

                <h6 class="text-uppercase font-weight-bold mb-3">Kategorie</h6>

                <div class="checkbox-filter">
                    @foreach($categories as $category)
                        <div class="mt-2 mb-2 pl-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="filter[categories][]" id="category-{{ $category->id }}" value="{{ $category->id }}">
                                <label class="custom-control-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>

                <h6 class="text-uppercase font-weight-bold mb-3">Marki</h6>

                <div class="checkbox-filter">
                    @foreach($brands as $brand)
                        <div class="mt-2 mb-2 pl-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="filter[brands][]" id="brand-{{ $brand->id }}" value="{{ $brand->id }}">
                                <label class="custom-control-label" for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>

                <h6 class="text-uppercase font-weight-bold mb-3">Rodzaj zasilania</h6>

                @foreach($powereds as $powered)
                <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="filter[powereds][]" id="powered-{{ $powered->id }}" value="{{ $powered->id }}">
                        <label class="custom-control-label" for="powered-{{ $powered->id }}">{{ $powered->name }}</label>
                    </div>
                </div>
                @endforeach

                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                <h6 class="text-uppercase mt-5 mb-3 font-weight-bold"><i class="fa-light fa-dollar-sign"></i> Cena</h6>
                <div class="price-filter-control">
                    <input type="number" min="0" class="form-control w-50 pull-left mb-2" name="filter[price_min]" placeholder="od" id="price-min-control">
                    <input type="number" class="form-control w-50 pull-right" name="filter[price_max]" placeholder="do" id="price-max-control">
                </div>

                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Moc [W]</h6>
                <div class="power-filter-control">
                    <input type="number" min="0" class="form-control w-50 pull-left mb-2" name="filter[power_min]" placeholder="od" id="power-min-control">
                    <input type="number" class="form-control w-50 pull-right" name="filter[power_max]" placeholder="do" id="power-max-control">
                </div>

                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Napięcię akumulatora [V]</h6>
                <div class="battery_voltage-filter-control">
                    <input type="number" min="0" step="0.01" class="form-control w-50 pull-left mb-2" name="filter[battery_voltage_min]" placeholder="od" id="battery_voltage-min-control">
                    <input type="number" step="0.01" class="form-control w-50 pull-right" name="filter[battery_voltage_max]" placeholder="do" id="battery_voltage-max-control">
                </div>

                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Maxymalna prędkość obrotowa [obr./min]</h6>
                <div class="maximum_rotational_speed-filter-control">
                    <input type="number" min="0" class="form-control w-50 pull-left mb-2" name="filter[maximum_rotational_speed_min]" placeholder="od" id="maximum_rotational_speed-min-control">
                    <input type="number" class="form-control w-50 pull-right" name="filter[maximum_rotational_speed_max]" placeholder="do" id="maximum_rotational_speed-max-control">
                </div>

{{--                <input id="ex2" type="text" class="slider " value="50,150" data-slider-min="10" data-slider-max="200" data-slider-step="5" data-slider-value="[50,150]" data-value="50,150" style="display: none;">--}}
                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                <a href="#" class="btn btn-lg btn-block btn-primary mt-5 w-100" id="filter"> <i class="fas fa-filter"></i> ZASTOSUJ FILTRY</a>
                <a href="{{ url('/') }}" class="btn btn-lg btn-block btn-primary mt-3 w-100"> <i class="fa-solid fa-rotate-left"></i> COFNIJ FILTRY</a>
            </form>

        </div>
    </div>
@endsection
@section('css-files')
    <link href="{{ asset('css/scroll.css') }}" rel="stylesheet">
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
