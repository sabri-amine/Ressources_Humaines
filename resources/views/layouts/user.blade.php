<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="img" href="imageMyOcp\logo.png">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="app.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
</head>
<body>
    <div>
        <nav>
                <div class="flex items-center justify-between h-16 " style="padding-inline:100px">
                    <div class="flex items-center">
                        <a href="{{ route('Home') }}"><img src="{{ asset('imageMyOcp/Myocp.png') }}" alt="" style="width:100px ; height:77px;margin-top:-9px ;padding-top:5px"></a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            @if (Route::has('login'))
                                @auth
                                    <div x-data="{show: false}" x-on:click.away="show = false" class="ml-3 relative" >
                                        <div class="flex items-center">
                                            <button x-on:click="show = !show" type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                                <span class="sr-only">Open user menu</span>
                                                <img class="h-8 w-8 rounded-full" src="{{asset('uploads/'.$imageuser)  }}" alt="">
                                            </button>
                                            <h6 class="ml-2 mt-2"  style="font-weight:bold ; font-size:20px">{{ $username }}</h6>
                                        </div>
                                        <div x-show="show" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" style="width: 150px; height: 80px;">
                                            <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0" style="text-decoration: none ; font-weight:bold   ">Your Profile</a>
                                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" style="text-decoration: none ; font-weight:bold">Sign out</a>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}" class="font-semibold text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>  
        </nav>
        <main>
            <div >
                <div style="background-color:#e9f4e1">@yield('contents')</div>
            </div>
        </main>
    </div>
    {{-- <footer>
        @include('partials.footer')
    </footer> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

