@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>FullName</th>
                <th>Email</th>
                <th>Hotel</th>
                <th>NameOnCard</th>
                {{-- <th>price</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->FullName }}</td>
                <td>{{ $user->Email }}</td>
                <td>{{ $user->Hotel }}</td>
                <td>{{ $user->NameOnCard }}</td>
                {{-- <td>{{ $prix->price}}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
