@extends('Layouts.user')
@section('title', 'ToDay')
@section('contents')
    <div style="display: flex; justify-content: center; height: 700px; align-items: center;">
        @if ($images->isNotEmpty())
            @foreach ($images as $image)
                <div style="box-shadow: 2px 2px 5px #00000080; margin: 10px; border-radius:10px;max-width:70%;">
                    <img src="{{ asset('storage/images/' . $image->image) }}" alt="Image" style="max-width:100%;border-radius:10px">
                </div>
            @endforeach
        @else
            <div>
                <i class="fas fa-file-alt" style="font-size: 48px; color: grey"></i>
            </div>
        @endif
    </div>
@endsection

