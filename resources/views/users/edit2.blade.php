@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center m-4"> <i class="fa fa-user" aria-hidden="true"></i>
                    Edytuj profil użytkownika </h2>
                <div class="card">
                    <div  class="padding container d-flex justify-content-center">

                        <div class="col-md-10 col-md-offset-1">

                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                    @csrf

                                <h2 class="text-center m-4"></i> Dane użytkownika </h2>
                                <hr>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Imię</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko</label>

                                        <div class="col-md-6">
                                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $user->surname }}" required autocomplete="surname" autofocus>

                                            @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">Numer telefonu</label>

                                        <div class="col-md-6">
                                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number}}" required autocomplete="phone_number" autofocus>

                                            @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                        <div class="col-md-6">
                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <h2 class="text-center m-4"></i> Adres użytkownika </h2>
                                <hr>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="city" class="col-md-4 col-form-label text-md-right">Miasto</label>

                                        <div class="col-md-6">
                                            <input id="city" type="text" maxlength="255" class="form-control @error('city') is-invalid @enderror" name="address[city]" value="@if($user->hasAddress()){{ $user->address->city }}@endif" required autocomplete="city" autofocus>

                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="zip_code" class="col-md-4 col-form-label text-md-right">Kod pocztowy</label>

                                        <div class="col-md-6">
                                            <input id="zip_code" type="text" maxlength="6" class="form-control @error('zip_code') is-invalid @enderror" name="address[zip_code]" value="@if($user->hasAddress()){{ $user->address->zip_code }}@endif" required autocomplete="zip_code" autofocus>

                                            @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="street" class="col-md-4 col-form-label text-md-right">Ulica</label>

                                        <div class="col-md-6">
                                            <input id="street" type="text" maxlength="255" class="form-control @error('street') is-invalid @enderror" name="address[street]" value="@if($user->hasAddress()){{ $user->address->street}}@endif" required autocomplete="street" autofocus>

                                            @error('street')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="home_number" class="col-md-4 col-form-label text-md-right">Numer domu</label>

                                        <div class="col-md-6">
                                            <input id="home_number" type="text" maxlength="5" class="form-control @error('home_number') is-invalid @enderror" name="address[home_number]" value="@if($user->hasAddress()){{ $user->address->home_number}}@endif" required autocomplete="home_number" autofocus>

                                            @error('home_number')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row m-5">
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-lg btn-outline-dark">
                                            <i class="fa-solid fa-floppy-disk"></i>  {{ __('Zapisz') }}
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
@endsection

