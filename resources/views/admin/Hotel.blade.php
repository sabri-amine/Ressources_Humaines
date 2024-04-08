@extends('Layouts.app')
@section('content')
   <section>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

       <h1 class="font-bold text-2xl ml-3">Lists des Hôtels</h1>
    <div class="container mt-4">
        <a href="{{ route('hotel.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Ajouter un hôtel</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Houses</th>
                    <th>People</th>
                    <th>Bathrooms</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->location }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->price }}</td>
                    <td>{{ $hotel->houses }}</td>
                    <td>{{ $hotel->people }}</td>
                    <td>{{ $hotel->bathrooms }}</td>
                    <td><img src="{{ asset('storage/images/'.$hotel->image) }}" alt="{{ $hotel->name }}" style="width: 100px; border-radius:50%"></td>
                    <td>
                        <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                        <form action="{{ route('hotel.delete', $hotel->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this card?')">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </section>
    
@endsection