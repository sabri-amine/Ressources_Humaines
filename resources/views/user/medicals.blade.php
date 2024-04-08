@extends('Layouts.user')
@section('title', 'Médical')
@section('contents')
    <div>
        <img src="{{ asset('imageMyOcp/headerMedical.jpg') }}" alt="medical" style="height:250px ;width:100%">
    </div>
    <h1 style="text-align: center;margin-top:50px;font-weight:bold">Médecin généraliste – Safi</h1>
    <section style="margin-top:50px ;display:flex;justify-content:center;flex-wrap:wrap">
        @foreach ($medicals as $medical)
        <div  style="display: flex;justify-content:center;width:36%;box-shadow:2px 2px 5px rgba(0,0,0,0.5);border-radius:10px;margin:20px">
            <div  style="width:200px ;border-radius:10px 0 0 10px"> 
                <img fetchpriority="high" decoding="async" style="width:200px;height:212px ;border-radius:10px 0 0 10px;" src="https://nour.ma/wp-content/uploads/2022/03/SOS-Medecin-Generaliste-domicile-Maroc-1-500x480.png"  alt="Elfatmi Karima - Safi - +212 678-083724">
            </div>
            <div style="background-color:#fff;width:350px;padding-top:5px ;border-radius:0 10px 10px 0">
                <div class="item-title">    
                    <h6 style="font-weight:bold; font-family: sans-serif; margin-left: 13px;">
                        {{ $medical->name }} – {{ $medical->location }} – {{ $medical->phone_number }}
                    </h6>
                </div>
                <div class="item-rating">   
                    <span style="width:96%; color: #efc843; margin-left: 13px;">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </span>
                </div>
                <hr width="347px" color="#000">
                <div>
                    <div  style="margin-left: 13px;"> 
                        <span style="font-weight:bold">Localisation :</span> 
                        <span style="font-weight:bold ;color:blue"> 
                            {{ $medical->location }}
                        </span>
                    </div>
                    <hr width="347px" color="#000">
                    <div style="margin-left: 13px;"> 
                        <span style="font-weight:bold">Adresse</span> 
                        <span style="color:gray">{{ $medical->address }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>
    <div style="margin-inline: 200px">
        {{ $medicals->links() }}
    </div>
    <x-footer />
@endsection