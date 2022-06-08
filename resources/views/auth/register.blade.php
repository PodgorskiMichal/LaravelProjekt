@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div  class="col-md-8">
            <div class="card-body">
                <div class="card">
                    <div  class="padding container d-flex justify-content-center">
                        <div class="col-md-10 col-md-offset-1">

                            <h2 class="text-center m-4"> {{ __('Załóż konto') }} </h2>
                            <hr>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                        <div class="form-group mb-3">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Imię') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <input id="name" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="{{ __('Nazwisko') }}" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                            @error('surname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="{{ __('Numer telefonu') }}" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Hasło') }}" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Potwierdź hasło') }}" required autocomplete="new-password">
                                        </div>

                                        <div class="row m-5">
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-lg btn-outline-dark">
                                                    {{ __('Załóż konto') }}
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
