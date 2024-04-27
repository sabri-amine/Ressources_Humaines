<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="app.css">
    <style>
        body {
            padding-top: 80px; 
        }

        .sidebar {
            position: fixed;
            height: 100%;
            top: 4rem;
            left: 0;
        }
    </style>
</head>
<body>
    <header class="px-4 py-2 shadow fixed top-0 w-full bg-white">
        <div class="flex justify-between">
            <div class="flex items-center">
                <img src="{{ asset('imageMyOcp/Myocp.png') }}" alt="" style="width:100px ; height:77px;margin-top:-9px ;padding-top:5px">
            </div>
            <div class="flex items-center">
                <button data-dropdown class="flex items-center px-3 py-2 focus:outline-none hover:bg-gray-200 hover:rounded-md" type="button" x-data="{ open: false }" @click="open = true" :class="{ 'bg-gray-200 rounded-md': open }">
                    <img src="{{asset('uploads/'.$imageuser)  }}" alt="Profle" class="h-8 w-8 rounded-full">
                    <span class="ml-4 text-sm hidden md:inline-block" style="font-weight: bold; font-size:20px">{{ $username }}</span>
                    <svg class="fill-current w-3 ml-4" viewBox="0 0 407.437 407.437">
                        <path d="M386.258 91.567l-182.54 181.945L21.179 91.567 0 112.815 203.718 315.87l203.719-203.055z" />
                    </svg>
                    <div data-dropdown-items class="text-sm text-left absolute top-0 right-0 mt-16 mr-6 bg-white rounded border border-gray-400 shadow" x-show="open" @click.away="open = false" style="width: 150px; height: 80px;">
                        <ul>
                            <li class="px-2 py-2 " ><a href="{{ route('admin.profile') }}" style="text-decoration: none ;color:black ; font-weight:bold">My Profile</a></li>
                            <li class="px-2 py-2"><a href="{{ route('logout') }}" style="text-decoration: none ; color:black ; font-weight:bold">Log out</a></li>
                        </ul>
                    </div>
                </button>
            </div>
        </div>
    </header>
    <div class="flex flex-row" >
        <div class="sidebar flex flex-col w-64 h-screen overflow-y-auto  " style="margin-top:20px ;background-color:#94CD59">
            <div class=" text-center " style="background-color:#94CD59">
                <div class="text-gray-100 text-xl">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer text-white">
                        {{-- <i class="bi bi-app-indicator px-2 py-1 rounded-md bg-blue-600"></i> --}}
                        <i class="fa-solid fa-user-tie"></i>
                        <h4 class="font-bold  text-[10px] ml-3 mt-2">{{ $username }}</h4>
                    </div>
                    <div class="my-2 bg-gray-600 h-[1px]"></div>
                </div>
                <a href="{{ route('admin/home') }}" style="text-decoration: none">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-900 text-white">
                        <i class="bi bi-house-door-fill"></i>
                        <span class="text-[15px] ml-4  font-bold">List  Des Employés</span>
                    </div>
                </a>
                <a href="{{ route('admin/certificat') }}" style="text-decoration: none">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-900 text-white">
                        <i class="fas fa-calendar-alt" style="font-size:20px; color: #ffffff;"></i>
                        <span class="text-[15px] ml-4  font-bold">Administratif</span>
                    </div>
                </a>
                <a href="{{ route('hotel.index') }}" style="text-decoration: none">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-900 text-white">
                        <i class="fas fa-hotel" style="font-size:20px; color: #ffffff;"></i>
                        <span class="text-[15px] ml-4  font-bold">Hotel</span>
                    </div>
                </a>
                <a href="{{ route('medical.index') }}" style="text-decoration: none">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-900 text-white">
                        <i class="fas fa-user-md" style="font-size:20px; color: #ffffff;"></i>
                        <span class="text-[15px] ml-4  font-bold">Medical</span>
                    </div>
                </a>
                <a href="{{ route('daytoday.index') }}" style="text-decoration: none">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-900 text-white">
                        <i class="fas fa-file-alt" style="font-size:20px; color: #ffffff;"></i>
                        <span class="text-[15px] ml-4  font-bold">Day To Day</span>
                    </div>
                </a>
                <a href="{{ route('payments.index') }}" style="text-decoration: none">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-900 text-white">
                        <i class="fab fa-cc-visa" style="font-size:20px; color: #ffffff;"></i>
                        <span class="text-[15px] ml-4  font-bold">Payment</span>
                    </div>
                </a>
                <a href="{{ route('admin.profile') }}" style="text-decoration: none">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-900 text-white">
                        <i class="fa-solid fa-address-card"></i>
                        <span class="text-[15px] ml-4 font-bold">Profile</span>
                    </div>
                </a>
                <a href="{{ route('logout') }}" style="text-decoration: none">
                    <div class=" bg-gray-600 h-[1px]"></div>
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-green-900 text-white">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span class="text-[15px] ml-4 font-bold">Logout</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex flex-col w-full h-screen px-4 py-8 mt-4 ml-80">
            <div>@yield('content')</div>
        </div>
    </div>
</body>
</html>
