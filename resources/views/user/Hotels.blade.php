@extends('Layouts.user')
@section('title', 'Hôtel')
@section('contents')

<form action="{{ route('userHotels.show') }}" method="GET" class="filter-form"">
    <label for="location_filter">Filtrer par ville:</label>
    <select name="location_filter" id="location_filter">
        <option value="">Tous les villes</option>
        <option value="Safi">Safi</option>
        <option value="Marrakech">Marrakech</option>
        <option value="Rabat">Rabat</option>
    </select>

    <label for="price_filter">Filtrer par prix:</label>
    <select name="price_filter" id="price_filter">
        <option value="">Tous les prix</option>
        <option value="0-100">0 - 100 DH</option>
        <option value="100-200">100 - 200 DH</option>
        <option value="200-300">200 - 300 DH</option>
    </select>

    <button type="submit">Filtrer</button>
</form>
<section style="display: flex;flex-wrap:wrap;justify-content: center;">
    

@foreach($hotels as $hotel)
<a type="button" data-toggle="modal" data-target="#exampleModal">
<div class ='cader'>
    <img src="{{ asset('storage/images/'.$hotel->image) }}" alt="image">
    <div style="display: flex;justify-content: space-around;margin-top:10px ;margin-left: 13px;">
        <h5 style="font-weight:bold">{{ $hotel->name }}</h5>
        <p style="color: #ff9100;; background-color:#ff69b441; border-radius: 10px; font-weight: bold;"><i class="far fa-star"></i> 4.75</p>
        <p ><i class="bi bi-geo-alt" style="font-size:14px"></i> {{ $hotel->location}}</p>
    </div>
    <div style="display: flex ;margin-left: 15px;">
        <h3 style="">{{ $hotel->price }}DH<span style="color: grey; font-size:20px">/night</span></h3>
    </div>
    <div style="display: flex; justify-content: space-around;margin-left: 12px;">
        <p style="color: grey;"><i class="fas fa-bed" style="color: grey;"></i> {{ $hotel->houses }} Beds</p>
        <p style="color: grey;"><i class="fa-solid fa-user-group" style="color: grey;"></i> {{ $hotel->people }} Guests</p>
        <p style="color: grey;"><i class="fa-solid fa-sink" style="color: grey;"></i> {{ $hotel->bathrooms }} Bathrooms</p>
    </div>
</div>
</a>
@endforeach
</section>
{{-- {{ $hotels->links() }} --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered container" style="max-width:640px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{ route('payments.store') }}" method="POST" onsubmit="afficherAlerte()">
                    @csrf <!-- Cette directive génère un jeton CSRF pour protéger votre application contre les attaques de type Cross-Site Request Forgery -->
                
                    <div class="row">
                        <div class="col">
                            <h3 style="font-weight:bold">Payment</h3>
                            <div class="inputBox">
                                <span>Cards Accepted:</span>
                                <img src="{{ asset("imageMyOcp/card_img.png") }}" alt="">
                            </div>
                            <div class="inputBox">
                                <span>Full Name:</span>
                                <input type="text" name="FullName">
                            </div>
                            <div class="inputBox">
                                <span>Email:</span>
                                <input type="text" name="Email">
                            </div>
                            <div class="inputBox">
                                <span>Hôtel:</span>
                                <input type="text" name="Hotel">
                            </div>
                            <div class="inputBox">
                                <span>Name on Card:</span>
                                <input type="text" name="NameOnCard">
                            </div>
                            <div class="inputBox">
                                <span>Credit Card Number:</span>
                                <input type="text" name="CreditCardNumber" placeholder="1111-2222-3333-4444">
                            </div>
                            <div class="inputBox">
                                <span>Exp Month:</span>
                                <input type="text" name="ExpMonth" placeholder="January">
                            </div>
                            <div class="flex">
                                <div class="inputBox">
                                    <span>Exp Year:</span>
                                    <input type="text" name="ExpYear" placeholder="2022">
                                </div>
                                <div class="inputBox">
                                    <span>CVV:</span>
                                    <input type="text" name="CVV" placeholder="1234">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="submit-btn" type="submit">Payment</button>
                </form>                
            </div>
        </div>
    </div>
</div>


<x-footer />
<style>

.cader{
    /* border: 2px solid grey; */
    box-shadow:2px 2px 5px rgba(0,0,0,0.5);
    width: 380px;
    border-radius: 10px;
    margin: 20px
}
img{
    width:380px;
    height: 200px;
    border-radius: 10px 10px 0 0;
    
}

.filter-form {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        padding-top:50px
    }

    .filter-form label {
        margin-right: 10px;
        font-weight: bold;
    }

    .filter-form select {
        margin-right: 10px;
        padding: 10px 20px;
        border: 1px solid #ccc;
        border-radius: 20px;
        width: 300px;
    }

    .filter-form button {
        padding: 5px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-weight:bold
    }

    .filter-form button:hover {
        background-color: #0056b3;
    }

    .container{
  display: flex;justify-content: center;align-items: center;padding:25px;
  min-height: 100vh;
  /* border: 2px solid red */
}

.container form{
  padding:20px;width:550px;background: #fff;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
  border-radius: 20px;
  border: 3px solid #8b8b8b
}

.container form .row{
  display: flex;flex-wrap: wrap;
  gap:15px;
}

.container form .row .col{
  flex:1 1 250px;
}

.container form .row .col .title{
  font-size: 20px;color:#333;padding-bottom: 5px;
  text-transform: uppercase;
}

.container form .row .col .inputBox{
  margin:15px 0;
}

.container form .row .col .inputBox span{
  margin-bottom: 10px;
  display: block;
}

.container form .row .col .inputBox input{
  width: 100%;border:1px solid #ccc;padding:10px 15px;font-size: 15px;
  text-transform: none;

}

.container form .row .col .inputBox input:focus{
  border:1px solid #000;
}

.container form .row .col .flex{
  display: flex;
  gap:15px;
}

.container form .row .col .flex .inputBox{
  margin-top: 5px;
}

.container form .row .col .inputBox img{
  height: 34px;margin-top: 5px;filter: drop-shadow(0 0 1px #000);
}

.container form .submit-btn{
  width: 100%;padding:12px;font-size: 17px;border-radius:20px;
  background: #27ae60;color:#fff;margin-top: 5px;cursor: pointer;

}

.container form .submit-btn:hover{
  background: #2ecc71;
}
</style>

<script>
    // Cette fonction sera appelée lors de la soumission réussie du formulaire de paiement
    function afficherAlerte() {
        alert('Paiement effectué avec succès');
    }
</script>

@endsection






























