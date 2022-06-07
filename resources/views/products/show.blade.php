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
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" maxlength="500" class="form-control" name="name" value="{{ $product->name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Opis') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="description" maxlength="2000" class="form-control" name="description" disabled>{{ $product->description }}</textarea>
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

                                    <div class="row mb-3">
                                        @if(!is_null($product->image_path))
                                            <img style="display: block;
                                            margin-left: auto;
                                            margin-right: auto;
                                            max-width: 500px";
                                                 src="{{ asset('storage/'.$product->image_path) }}" alt="Zdjęcie produktu">
                                        @endif
                                    </div>

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection