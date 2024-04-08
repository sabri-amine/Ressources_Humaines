@extends('Layouts.app')
@section('content')
    <section>
        <div class="container light-style flex-grow-1 container-p-y" >
            <div class="card overflow-hidden" style=" ;height:500px;width:800px ;border-radius: 20px;">
                <div style="display: flex;justify-content:center;">
                            <div class="mt-5">
                                <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="card-body" style="width:500px;">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control mb-1" name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">National ID</label>
                                        <input type="text" class="form-control mb-1" name="national_id" value="{{ $user->national_id }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Service</label>
                                        <input type="text" class="form-control" name="service" value="{{ $user->service }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image" value="{{ $user->service }}">
                                    </div>
                                    <div  style="margin-top:10px;display:flex;justify-content: end">
                                        <button class="btn btn-primary" >Save</button>
                                    </div>
                                </div>
                                </form>
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
    padding-top: 50px;
    position: fixed;
    right: 20px;
    

    
}






</style>