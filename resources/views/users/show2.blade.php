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

                            <h2 class="text-center m-4"> Adres użytkownika</h2>
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

                                <div class="row m-5">
                                    <div class="form-group text-center">
                                        <a href="{{route('users.edit',  $user->id)}}">
                                            <button type="submit" class="btn btn-lg btn-outline-dark edit">
                                                <i class="fa-regular fa-pen-to-square"></i>  {{ __('Edytuj') }}
                                            </button>
                                        </a>
                                        <a href="{{route('users.index')}}">
                                            <button type="submit" class="btn btn-lg btn-outline-dark edit">
                                                <i class="fa-solid fa-arrow-rotate-left"></i>  {{ __('Wróć') }}
                                            </button>
                                        </a>
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
