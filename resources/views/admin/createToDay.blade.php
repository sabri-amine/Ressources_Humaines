@extends('Layouts.app')
@section('content')
<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Formulaire</div>
                <div class="card-body">
                    <form action="{{ route('daytoday.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="date">Date :</label><br/>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image :</label><br>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div><br>

                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
