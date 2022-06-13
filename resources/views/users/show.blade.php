@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center m-4"> <i class="fa fa-user" aria-hidden="true"></i>
                    Profil użytkownika </h2>

                <div class="card">
                    <div  class="padding container d-flex justify-content-center">

                        <div class="col-md-10 col-md-offset-1">

                            <h2 class="text-center m-4"> Dane użytkownika </h2>
                            <hr>

                            <div class="card-body">


                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">Imię</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="surname" class="col-md-4 col-form-label text-md-end">Nazwisko</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-end">Numer telefonu</label>

                                    <div class="col-md-6">
                                        <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" disabled>
                                    </div>
                                </div>


                            </div>



                            <h2 class="text-center m-4"> Adres użytkownika </h2>
                            <hr>

                            <div class="card-body">


                                <div class="row mb-3">
                                    <label for="city" class="col-md-4 col-form-label text-md-end">Miasto</label>

                                    <div class="col-md-6">
                                        <input id="city" type="text" class="form-control" name="address[city]" value="@if($user->hasAddress()){{ $user->address->city }}@endif" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="zip_code" class="col-md-4 col-form-label text-md-end">Kod pocztowy</label>

                                    <div class="col-md-6">
                                        <input id="zip_code" type="text" class="form-control" name="address[zip_code]" value="@if($user->hasAddress()){{ $user->address->zip_code }}@endif" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="street" class="col-md-4 col-form-label text-md-end">Ulica</label>

                                    <div class="col-md-6">
                                        <input id="street" type="text" class="form-control" name="address[street]" value="@if($user->hasAddress()){{ $user->address->street}}@endif" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="home_number" class="col-md-4 col-form-label text-md-end">Numer domu</label>

                                    <div class="col-md-6">
                                        <input id="home_number" type="text" class="form-control" name="address[home_number]" value="@if($user->hasAddress()){{ $user->address->home_number}}@endif" disabled>
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
