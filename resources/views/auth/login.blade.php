<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            background-color: #f8fafc; /* bg-gray-50 */
        }
        .card {
    border-radius: 0.5rem; /* rounded-lg */
    border: none; /* shadow-lg */

    max-width: 450px; /* Set maximum width */
    width: 90%; /* Set width to a percentage */
    margin: 0 auto; /* Center the card horizontally */
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
        .form-check-input {
            margin-top: 0.25rem; /* mt-1 */
            margin-right: 0.3125rem; /* mr-1 */
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
        .mb-0 {
            margin-bottom: 0; /* mb-0 */
        }
        .text-center {
            text-align: center; /* text-center */
            font-weight: bold
        }
        
    </style>
</head>
<body>
    <section>
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body d-flex flex-column align-items-center"> <!-- Added flexbox classes -->
                            <img src="{{ asset('imageMyOcp/Myocp.png') }}" alt="" style="width:150px;">
                            <h4 class="text-center">Log in to your account</h4>
                            <form method="post" action="{{ route('login.action') }}" style="margin-top: 40px">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Your Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="name@company.com" >
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Your Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="••••••" >
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-check">
                                    <input name="remember" id="remember" type="checkbox" class="form-check-input" required="">
                                    <label for="remember" class="form-check-label">Remember me</label>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Log In</button>
                                </div>
                                <p class="mt-3 mb-0 text-center">
                                    Don't have an account yet? <a href="{{ route('register') }}" style="color:#3f3d3d">Sign Up</a>
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
