@extends('Layouts.app')
@section('content')
   <section>
       <h1 class="font-bold text-2xl ml-3">list les Medecins</h1>
       @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="container mt-4">
        <a href="{{ route('createMedical.create') }}" class="btn btn-success mb-3"><i class="bi bi-person-plus-fill"></i> Ajouter un médecin</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>location</th>
                    <th>Phone</th>
                    <th>Adress</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($medicals as $medical)
                <tr>
                    <td>{{ $medical->name }}</td>
                    <td>{{ $medical->location }}</td>
                    <td>{{ $medical->phone_number}}</td>
                    <td>{{ $medical->address }}</td>
                    <td>
                        <a href="{{ route('medical.edit', $medical->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                        <form action="{{ route('medical.delete', $medical->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this medical record?')">
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