@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body" style="min-width: 70%">
                <h3 class="card-title">{{ $product->name }}</h3>
                <div class="row mt-5">

                    <div class="row mb-3">
                        @if(!is_null($product->image_path))
                            <img style="display: block;
                                                margin-left: auto;
                                                margin-right: auto;
                                                max-width: 500px";
                                 src="{{ asset('storage/'.$product->image_path) }}" alt="Zdjęcie produktu">
                        @endif
                    </div>

                    <div>

                        <h4 class="box-title mt-5"> Opis produktu </h4>
                        <p>{{ $product->description }}</p>

                        <h2 class="mt-5">{{ $product->price }} zł</h2>


                        @if(Auth::user()->role == 'user')
                        <button type="submit" class="btn btn-outline-success mt-1 addToCartButton" data-id="{{ $product->id }}" @guest disabled @endguest>
                            <i class="fa fa-shopping-cart"></i> Dodaj do koszyka
                        </button>
                        @endif

                        <button class="btn btn-outline-primary mt-1" onclick="history.back()">
                            <i class="fa-solid fa-rotate-left"></i> Wróć do sklepu
                        </button>

                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">General Info</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-product">
                                <tbody>

                                <tr>
                                    <td width="390">Marka</td>
                                    <td>{{$product->brand->name}}</td>
                                </tr>

                                <tr>
                                    <td>Kategoria</td>
                                    <td>{{$product->category->name}}</td>
                                </tr>

                                <tr>
                                    <td>Zasilanie</td>
                                    @if(!is_null($product->powered_id))
                                    <td>{{$product->powered_id}}</td>
                                    @endif
                                </tr>

                                @if($product->powered->name == 'Sieciowe' && $product->hasPoweredPower())
                                    <tr>
                                        <td>Moc [W]</td>
                                        <td> {{$product->power}} </td>
                                    </tr>
                                @elseif($product->powered->name == 'Akumulatorowe' && $product->hasPoweredBattery_voltage())
                                    <tr>
                                        <td>Napięcię akumulatora [V]</td>
                                        <td> {{$product->battery_voltage }} </td>
                                    </tr>
                                @endif

                                <tr>
                                    <td>Maxymalna prędkość obrotowa	 [obr./min]</td>
                                    <td>{{  $product->maximum_rotational_speed  }}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

    const addToCart = '{{ url('cart') }}/';
    const goToCart = '{{ url('cart') }}';

@endsection


@section('js-files')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection
