@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Ajouter un Hôtel</h1>
    <form action="{{ route('hotel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="houses">Houses</label>
            <input type="number" class="form-control" id="houses" name="houses" required>
        </div>
        <div class="form-group">
            <label for="people">People</label>
            <input type="number" class="form-control" id="people" name="people" required>
        </div>
        <div class="form-group">
            <label for="bathrooms">Bathrooms</label>
            <input type="number" class="form-control" id="bathrooms" name="bathrooms" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
