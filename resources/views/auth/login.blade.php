@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div  class="col-md-6">
                <div class="card-body">
                    <div  class="card">
                        <div  class="padding container d-flex justify-content-center">
                            <div class="col-md-10 col-md-offset-1">

                                <h2 class="text-center m-4"> {{ __('Logowanie') }} </h2>
                                <hr>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Hasło') }}" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="row m-5">
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-lg btn-outline-dark">
                                                {{ __('Zaloguj się') }}
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
