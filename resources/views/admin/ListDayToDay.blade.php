@extends('Layouts.app')

@section('content')
    <section class="container mt-4">
        <h1 class="font-bold text-2xl">Toutes les annonces</h1>
        <div class="mt-4">
            <a href="{{ route('daytoday.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i>Ajouter une activité quotidienne</a>
            <div class="row">
                @foreach ($images as $image)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/images/' . $image->image) }}" alt="Image" class="card-img-top">
                            <div class="card-body">
                                <p class="card-text">Date : {{ $image->date }}</p>
                                <div class="d-flex justify-content-between">
                                    {{-- <a href="{{ route('daytoday.index') }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a> --}}
                                    <form action="{{ route('daytoday.delete', $image->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
