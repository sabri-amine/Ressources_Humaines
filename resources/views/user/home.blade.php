@extends('layouts.user')
@section('title','Home')
@section('contents')
<div>
    <img src="{{ asset('imageMyOcp/chimie1.jpg') }}" alt="" style="height:400px ;width:100%">
    <div style=" height:150px;display: flex;align-items: center;justify-content: center;position: relative; top:-300px;"  >
        {{-- <div class="loader" style="position:relative;top:-120px ; left:40px"></div>
        <div class="loader" style="position:relative;top:120px ; right:15px"></div>
        <div class="loader" style="position:relative;top:-120px ; left:87.5%"></div>
        <div class="loader" style="position:relative;top:120px ; left:84%"></div> --}}
        <marquee behavior="scroll" direction="left" scrollamount="12" style="font-size:80px; font-weight:bold;
          ;margin-right:120px; margin-left:80px; border-radius: 10px ;padding-bottom:12px ;color:#fff" >
         <span style="color: #ffffff">My</span><span style="color: #3fd24c">OCP</span> Nous Sommes Á Votre Service                 
        </marquee>
    </div>
</div>
    {{-- <h1 style="text-align: center ;margin-top:50px ; font-weight:bold">Les Service  De My<span style="color: #94CD59">Ocp</span></h1> --}}
    <div style="display: flex;margin:-240px 0 0 345px;">
        <a href="{{ url('/userForm') }}" style="text-decoration: none; color: #fff; width: 190px;">
            <div class="a" style="background-color:#51C4CB; height: 160px; width: 190px; margin-right: 30px; display: inline-block; text-align: center; border-radius: 8px; padding: 20px;">
                <i class="fas fa-calendar-alt" style="font-size: 48px; color: #fff;"></i>
                <h4 style="margin-top: 10px;">Espace Administratifs</h4>
            </div>
        </a>
        
        
        <a href="{{ route('userHotels.show') }}" style="text-decoration: none; color: #fff;width: 190px; margin-left:30px" >
            <div class="a" style="background-color:#F8B64E; border-radius: 8px; height: 160px; width: 190px; margin-right: 30px; padding: 20px; text-align: center;">
                <i class="fas fa-hotel" style="font-size: 48px; color: #fff;"></i>
                <h4 style="margin-top: 10px;">Espace<br/> Hôtel</h4>
            </div>
        </a>
        
        
        <a href="{{ route('medicals.show') }}" style="text-decoration: none; color: #fff; width: 190px ;margin-left:30px">
            <div class="a" style="background-color:#50a6d4; border-radius: 8px; height: 160px; width: 190px; margin-right: 30px;
                    padding: 20px; text-align: center;">
                <i class="fas fa-user-md" style="font-size: 48px; color: #fff;"></i>
                <h4 style="margin-top: 10px;">Espace Medical</h4>
            </div>
        </a>
        
        <a href="{{ route('today.show') }}" style="text-decoration: none; color: #fff; width: 190px; ; margin-left:30px">
            <div class="a" style="background-color:#F4676B; border-radius: 8px; height: 160px; width: 190px; margin-right: 30px;
                    padding: 20px; text-align: center;">
                <i class="fas fa-file-alt" style="font-size: 48px; color: #fff;"></i>
                <h4 style="margin-top: 10px;">Espace <br/> Day to Day</h4>
            </div>
        </a>
        
    </div>

    <div style="text-align: center;margin-top:100px ;">
        <h1 style="font-weight: bold">UNE  STRATEGIE DURABLE AUTRE <br/> DES 17 ODDs | GROUP OCP</h1>
        <dir style="margin-top:80px; margin-left:15%">
            <img src="{{ asset("imageMyOcp/Chaine.png")}}" alt="" style="width: 80%">
        </dir>
    </div>

    <div style="text-align: center;margin-top:80px;padding:50px;">
        <div>
            <h1 style="font-weight: bold">Á PROPOS DE NOUS</h1>
        </div>
        <div style="display: flex;justify-content: center;margin-top:70px ;">
            <div style="width:30%;display:flex; height:500px ;box-shadow:2px 2px 0px rgba(0,0,0,0.5);border-radius: 30px">
                <img src="{{ asset("imageMyOcp/44658.jpg") }}" alt="image vide" style="width: 100% ;box-shadow:0px 2px 0px 5px #524f4f80;border-radius: 30px">
            </div>    
                
                <p style=" width:30%;font-weight: bold;font-size:25px;height:500px;box-shadow:0px 2px 0px 5px #524f4f80;border-radius: 30px;padding:20px"> <span style="font-size:40px">My<span style="color: #3fd24c;font-size:40px">OCP</span></span><br>
                     Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa excepturi,
                 dolorum quaerat vel fuga animi dolor ex accusamus cupiditate Dolore,
                  voluptatum consectetur. Minus voluptates minima vel id quisquam totam
                  Minus voluptates minima vel id quisquam totam !</p>
        </div>
    </div>
    <x-footer />
@endsection
