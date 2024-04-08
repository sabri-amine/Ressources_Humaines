@extends('layouts.user')
@section('title', 'Administratif')
@section('contents')
<section style="background-color: #f8f9fa; padding: 20px;padding-top:4%">
    {{-- <h1 style=" color: #333; text-align:center;font-weight: bold;">ADMINISTRATIF</h1> --}}
    <div style="display: flex;margin-top:2%">
        <img src="{{ asset('imageMyOcp/administratif1.png') }}" alt="administratif" style="height:550px;width:50% ;">

        <form action="/reserver" method="POST" style="width:100%;padding:150px 50px 0 50px;">
            @csrf
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 18px; color: #333;font-weight: bold;">Date De Reservations</label>
                <input type="date" name="date" required style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 18px; color: #333;font-weight: bold;">Type de demande</label>
                <select name="choix" id="" style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
                    <option value="action 1">Action 1</option>
                    <option value="action 2">Action 2</option>
                    <option value="action 3">Action 3</option>
                    <option value="action 4">Action 4</option>
                </select>
            </div>
            <div>
                <button type="submit" id="" class="btn btn-primary" href="#" role="button" style="display: block; width: 100%; padding: 10px; font-size: 18px; text-align: center;font-weight: bold; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Submit</button>
            </div>
        </form>
    </div>
</section>
    <x-footer />
@endsection