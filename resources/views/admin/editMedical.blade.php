@extends('Layouts.app')
@section('content')
<section style="margin-top: 20px;">
    <form action="{{ route('medical.update',$medical->id) }}" method="POST" enctype="multipart/form-data" style="background-color: #f9f9f9; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold; color: #333;">Nom :</label>
            <input type="text" name="name" value="{{ $medical->name }}" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px; width: 100%;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold; color: #333;">Localisation :</label>
            <input type="text" name="location" value="{{ $medical->location }}" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px; width: 100%;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold; color: #333;">Numéro de téléphone :</label>
            <input type="tel" name="phone_number" value="{{ $medical->phone_number }}" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px; width: 100%;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold; color: #333;">Adresse :</label>
            <textarea name="address" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px; width: 100%;">{{ $medical->address }}</textarea>
        </div>
        <button type="submit" style="background-color: #4caf50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Modifier</button>
    </form>
</section>


@endsection