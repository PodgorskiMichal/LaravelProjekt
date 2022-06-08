@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div  class="padding container d-flex justify-content-center">
                        <div class="col-md-10 col-md-offset-1">

                            <h2 class="text-center m-4"> {{ __('Dodawanie kategorii') }} </h2>
                            <hr>


                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{__('Nazwa')}}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" maxlength="500" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row m-5">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-lg btn-outline-dark">
                                        {{__('Zapisz')}}
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
