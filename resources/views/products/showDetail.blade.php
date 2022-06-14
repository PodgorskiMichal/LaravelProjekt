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
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
