@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                @if(session('status'))
                    <div class="alert alert-success">
                       <button class="btn-close float-end" data-bs-dismiss="alert" aria-hidden="true"></button>
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h1> <i class="fas fa-users"></i>  Lista użytkowników </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form class="input-group" action="{{route('users.index')}}" method="GET">
                    <input type="text" class="form-control" placeholder="search" name="search"/>

                    <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
                </form>
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
            <th scope="col">Adres</th>
            <th scope="col">Akcje</th>
        </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('users.show',  $user->id)}}">
                            <button class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i></button>
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}">
                            <i class="far regular fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
                @empty
                    <p class="text-center">
                        Nie znaleziono wyników dla: <strong>{{ request()->query('search') }}</strong>
                    </p>
                @endforelse        </tbody>
    </table>

    <div class="row">
        <div class="col-7">
            {{__('Wyświetlono ')}} {{ $users->firstItem() }} - {{ $users->lastItem() }} {{__('z')}} {{ $users->total() }} {{__('użytkowników')}}
        </div>

        <div class="col-5">
            <div class="btn-group float-end"
                {{ $users->appends(['search' => request() ->query('search')])->links() }} {{-- Paginacja przełączanie stron --}}
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

