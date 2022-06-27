@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div  class="padding container d-flex justify-content-center">
                    <div class="col-md-10 col-md-offset-1">

                        <h2 class="text-center m-4"> {{ __('Podgląd produktu') }} </h2>
                        <hr>

                            <div class="card-body">

                                    <div class="row mb-3">
                                        @if(!is_null($product->image_path))
                                            <img style="display: block;
                                                margin-left: auto;
                                                margin-right: auto;
                                                max-width: 500px";
                                                 src="{{ asset('storage/'.$product->image_path) }}" alt="Zdjęcie produktu">
                                        @endif
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" maxlength="500" class="form-control" name="name" value="{{ $product->name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="brand" class="col-md-4 col-form-label text-md-end">{{ __('Marka') }}</label>

                                        <div class="col-md-6">
                                            <select id="brand" class="form-control" name="brand_id" disabled>
                                                @if($product->hasCategory())
                                                    <option>{{ $product->brand->name }}</option>
                                                @else
                                                    <option>Brak</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Opis') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" maxlength="2000" class="form-control" name="description" disabled>{{ $product->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="powered" class="col-md-4 col-form-label text-md-end">{{ __('Zasilanie') }}</label>

                                        <div class="col-md-6">
                                            <select id="powered" class="form-control" name="powered_id" disabled>
                                                @if($product->hasPowered())
                                                    <option>{{ $product->powered->name }}</option>
                                                @else
                                                    <option>---</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="power" class="col-md-4 col-form-label text-md-end">{{ __('Moc [W]') }}</label>

                                        <div class="col-md-6">
                                            <input id="power" type="number" min="0"  class="form-control" name="power" value="{{  $product->power  }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="battery_voltage" class="col-md-4 col-form-label text-md-end">{{ __('Napięcię akumulatora [V]') }}</label>

                                        <div class="col-md-6">
                                            <input id="battery_voltage" type="number" min="0"  class="form-control" name="battery_voltage" value="{{  $product->battery_voltage  }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="maximum_rotational_speed" class="col-md-4 col-form-label text-md-end">{{ __('Maxymalna prędkość obrotowa	 [obr./min]') }}</label>

                                        <div class="col-md-6">
                                            <input id="maximum_rotational_speed" type="number" min="0"  class="form-control" name="maximum_rotational_speed" value="{{  $product->maximum_rotational_speed  }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Ilość') }}</label>

                                        <div class="col-md-6">
                                            <input id="amount" type="number" min="0"  class="form-control" name="amount" value="{{  $product->amount  }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Cena') }}</label>

                                        <div class="col-md-6">
                                            <input id="price" type="number" step="0.01" min="0" class="form-control" name="price" value="{{ $product->price }}" disabled>
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Kategoria') }}</label>

                                    <div class="col-md-6">
                                        <select id="category" class="form-control" name="category_id" disabled>
                                            @if($product->hasCategory())
                                                <option>{{ $product->category->name }}</option>
                                            @else
                                                <option>Brak</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-outline-success mt-1 w-100 addToCartButton" data-id="{{ $product->id }}" @guest disabled @endguest>
                                    <i class="fa-solid fa-cart-plus"></i> Dodaj do koszyka
                                </button>

                                <button onclick="history.back()" class="btn btn-lg btn-block btn-primary mt-3 w-100"> <i class="fa-solid fa-rotate-left"></i> COFNIJ </button>

                            </div>

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
