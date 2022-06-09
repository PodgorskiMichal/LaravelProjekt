@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="row justify-content-center w-50">

                <div class="col-6">
                    <h1> Lista kategorii </h1>
                </div>

                <div class="col-6">
                    <a class="float-end" href="{{ route('categories.create') }}">
                        <button type="button" class="btn btn-outline-dark border-1">{{ __('Dodaj')  }}</button>
                    </a>
                </div>

                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nazwa</th>
                            <th scope="col">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)
                        <tr>
                            <th class="col-md-1" scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td class="col-md-1">
                                <button class="btn btn-danger btn-sm deleteCategory" data-id="{{ $category->id }}">
                                    X
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <div class="row">
                    <div class="col-7">
                        {{__('Wyświetlono ')}} {{ $categories->firstItem() }} - {{ $categories->lastItem() }} {{__('z')}} {{ $categories->total() }} {{__('kategorii')}}
                    </div>

                    <div class="col-5">
                        <div class="btn-group float-end"
                        {{ $categories->links() }}  {{-- Paginacja przełączanie stron --}}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    const deleteURL = "{{ url('categories') }}/";
@endsection

@section('js-files')
    <script src="{{ asset('js/deleteCategory.js') }}"></script>
@endsection
