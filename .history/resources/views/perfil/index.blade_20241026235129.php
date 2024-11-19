@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Actualizar Imagen de Perfil</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.updateImage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="profile_image" class="form-label">Seleccionar Imagen de Perfil</label>
            <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
    </form>
</div>
@endsection
