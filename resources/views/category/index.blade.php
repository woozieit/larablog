@extends('layouts.app')

@section('content')

    <div class="mt-5 card">
        <div class="card-header">
            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary my-3">Nuevo Registro</a>
        </div>
        <div class="card-body">

            @if ( Session::has('success') )
                <div class="alert alert-success my-5" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $categories as $key => $category )
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-primary mr-2">Editar</a>

                                <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:  inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
