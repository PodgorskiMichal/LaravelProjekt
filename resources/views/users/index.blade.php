@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">

            <div class="col-6">
                <h1> Lista użytkowników </h1>
            </div>

        </div>

        <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Telefon</th>
            <th scope="col">Email</th>
            <th scope="col">Akcje</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}">
                            X
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-7">
            {{__('Wyświetlono ')}} {{ $users->firstItem() }} - {{ $users->lastItem() }} {{__('z')}} {{ $users->total() }} {{__('użytkowników')}}
        </div>

        <div class="col-5">
            <div class="btn-group float-end"
                {{ $users->links() }} {{-- Paginacja przełączanie stron --}}
            </div>
        </div>
    </div>

    </div>
@endsection

@section('javascript')
    const deleteURL = "{{ url('users') }}/";
@endsection

@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection

