@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div  class="padding container d-flex justify-content-center">
                        <div class="col-md-10 col-md-offset-1">

                            <h2 class="text-center m-4">  {{ __('Dodawanie produktu') }} </h2>
                            <hr>


                    <div class="card-body">
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{__('Nazwa  *')}}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" maxlength="500" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="brand" class="col-md-4 col-form-label text-md-end">{{ __('Marka  *') }}</label>

                                <div class="col-md-6">
                                    <select id="brand" class="form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                                        <option value="">Brak</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('brand_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{__('Opis  *')}}</label>

                                <div class="col-md-6">
                                    <textarea id="description" maxlength="1500" class="form-control @error('description') is-invalid @enderror" name="description" required autofocus>{{ old('description') }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="powered" class="col-md-4 col-form-label text-md-end">{{ __('Zasilanie *') }}</label>

                                <div class="col-md-6">
                                    <select id="powered" class="form-control @error('powered_id') is-invalid @enderror" name="powered_id">
                                        <option value="">Brak</option>
                                        @foreach($powereds as $powered)
                                            <option value="{{ $powered->id }}">{{ $powered->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('powered_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="power" class="col-md-4 col-form-label text-md-end">{{__('Moc [W]')}}</label>

                                <div class="col-md-6">

                                    <input id="power" type="number" min="0" class="form-control @error('power') is-invalid @enderror" name="power" value="{{ old('power') }}" autocomplete="power" autofocus>

                                    @error('power')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="battery_voltage" class="col-md-4 col-form-label text-md-end">{{__('Napięcię akumulatora [V]')}}</label>

                                <div class="col-md-6">
                                    <input id="battery_voltage" type="number" step="0.01"  min="0" class="form-control @error('battery_voltage') is-invalid @enderror" name="battery_voltage" value="{{ old('battery_voltage') }}" autocomplete="battery_voltage" autofocus>

                                    @error('battery_voltage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">

                                <label for="maximum_rotational_speed" class="col-md-4 col-form-label text-md-end">{{__('Maxymalna prędkość obrotowa	 [obr./min]')}}</label>

                                <div class="col-md-6">

                                    <input id="maximum_rotational_speed" type="number" min="0" class="form-control @error('maximum_rotational_speed') is-invalid @enderror" name="maximum_rotational_speed" value="{{ old('maximum_rotational_speed') }}" autocomplete="maximum_rotational_speed" autofocus>

                                    @error('maximum_rotational_speed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="amount" class="col-md-4 col-form-label text-md-end">{{__('Ilość  *')}}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" min="0" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">{{__('Cena  *')}}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Kategoria  *') }}</label>

                                <div class="col-md-6">
                                    <select id="price" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                        <option value="">Brak</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">{{__('Zdjęcie')}}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <p>* - pole obowiązkowe</p>

                            <div class="row m-5">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-lg btn-outline-dark">
                                        <i class="fa-solid fa-floppy-disk"></i> {{__('Zapisz')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-files')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection
