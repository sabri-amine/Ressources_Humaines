@extends('Layouts.app')
@section('content')
    <section>
        <div class="container light-style flex-grow-1 container-p-y" >
            <div class="card overflow-hidden" style=" margin-top:50px;height:500px;width:800px ;border-radius: 20px;">
                <div style="display: flex">
                    <div class="col-md-2 ms-4 pt-0" >
                            <img src="{{ asset('uploads/' . $user->image) }}" style="border-radius:50%; margin:20px 0 0 6px">
                    </div>
                    <div class="col-md-9">
                        
                            <div style="margin:70px 0 0 40px">
                                {{-- <h2 style="font-weight:bold;padding-left:50px">Le Profile De {{ $user->name }}</h2> --}}
                                <div class="card-body" style="width:500px;">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control mb-1" value="{{ $user->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">National ID</label>
                                        <input type="text" class="form-control mb-1" value="{{ $user->national_id }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Service</label>
                                        <input type="text" class="form-control" value="{{ $user->service }}" readonly>
                                    </div>
                                    <div  style="margin-top:10px;display:flex;justify-content: end">
                                        {{-- <button  >Modifier</button> --}}
                                        <a href="{{ route('profile.edit',$user->id) }}" class="btn btn-primary">Modifier</a>
                                    </div>
                                </div>
                            </div>            
                    </div>
                </div>
            </div>                  
        </div>
    </section>
@endsection

<style>

.container{
    /* border: 2px solid red; */
    display: flex;
    justify-content: center;
    padding-bottom:100px;
    position: fixed;
    right: 20px;
    

    
}

</style>