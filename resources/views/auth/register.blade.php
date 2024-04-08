<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Custom styles */
        body {
            background-color: #f8fafc; /* bg-gray-50 */
        }
        .card {
            border-radius: 10px; /* rounded-lg */
            border: none; /* shadow-lg */
            /* box-shadow: 0 4px 6px rgba(0.5, 0, 0, 0.3); */
            margin-top: 50px;
            margin-bottom: 100px;
        
        }
        .card-body {
            padding: 1.25rem; /* p-5 */
        }
        .form-label {
            margin-bottom: 0.5rem; /* mb-3 */
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 0.5rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.375rem; /* rounded */
            border: 1px solid #ced4da; /* border */
        }
        .btn {
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.375rem; /* rounded */
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            cursor: pointer;
        }
        .btn-primary {
            color: #fff;
            background-color: #94CD59; /* bg-primary */
            border-color: #94CD59; /* border-primary */
        }
        .btn-primary:hover {
            background-color: #87c249; /* hover:bg-primary */
            border-color: #87c249; /* hover:border-primary */
        }
        .mt-3 {
            margin-top: 0.75rem; /* mt-3 */
        }
        
        img{
            text-align: center
        }
        .account {
            text-align: center ;
        }
      
    
    </style>
</head>
<body>
    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6" style="margin-top:60px">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center"> <!-- Added flexbox classes -->
                            <img src="{{ asset('imageMyOcp/Myocp.png') }}" alt="" style="width:150px ;">
                            <h3 class="account">Create an Account</h3>
                            <form action="{{ route('register.save') }}" method="POST" class="space-y-4 md:space-y-6 " style="margin-top: 40px" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">
                                    @error('name')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Your Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="name@company.com" required="">
                                    @error('email')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="national_id" class="form-label">Your National ID</label>
                                    <input type="text" name="national_id" id="national_id" class="form-control" placeholder="National ID" required="">
                                    @error('national_id')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="service" class="form-label">Your Service</label>
                                    <select name="service" id="service" class="form-control" required="">
                                        <option value="" disabled selected>Select service</option>
                                        <option value="service1">Service 1</option>
                                        <option value="service2">Service 2</option>
                                        <option value="service3">Service 3</option>
                                    </select>
                                    @error('service')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Your Password</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••" class="form-control" required="">
                                    @error('password')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="form-control" required="">
                                    @error('password_confirmation')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Your Photo</label>
                                    <input type="file" name="image" id="file" class="form-control" required="">
                                    @error('file')
                                    <span class="text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-check">
                                    <input id="terms" aria-describedby="terms" type="checkbox" class="form-check-input" required="">
                                    <label for="terms" class="form-check-label">I accept the  <a href="#" style="color: #4C4C4C ;font-weight: bold" >Terms and Conditions</a></label>
                                </div>
                                <button type="submit" class="btn btn-primary">Create an Account</button>
                                <p class="mt-3 mb-0 text-center">
                                    Already have an account? <a href="{{ route('login') }}" style="color: #3f3d3d ;font-weight: bold">Log in here</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>