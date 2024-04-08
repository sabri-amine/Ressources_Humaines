@extends('layouts.app')

@section('content')

{{-- @foreach ($hotels as $hotel) --}}
<div class="container mt-5">
    <h1 class="mb-4">Modifier Hôtel</h1>
    <form action="{{ route('hotel.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $hotel->location }}" >
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" >
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $hotel->price }}" >
        </div>
        <div class="form-group">
            <label for="houses">Houses</label>
            <input type="number" class="form-control" id="houses" name="houses" value="{{ $hotel->houses }}" >
        </div>
        <div class="form-group">
            <label for="people">People</label>
            <input type="number" class="form-control" id="people" name="people" value="{{ $hotel->people }}" >
        </div>
        <div class="form-group">
            <label for="bathrooms">Bathrooms</label>
            <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{ $hotel->bathrooms }}" >
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image" >
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
{{-- @endforeach --}}
@endsection
