@extends('layouts.app')

@section('content')
<div class="mt-5 card">
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input
                    type="text"
                    class="form-control @if( $errors->has('name') ) is-invalid @endif"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                >

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
