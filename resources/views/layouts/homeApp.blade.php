<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/d5016733a7.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="outer">
        <div class="rectangle1">

            <div class="logo"></div>
                
            
            <div  class="search">
                <input  type="text" placeholder="Search">
                <i class="fas fa-search search-icon"></i>
            </div>

            <div onclick="document.location='/'">  
                <i class="fas fa-home fa-lg home" onMouseOver="this.style.color='#f1f1f1'"
                onMouseOut="this.style.color='white'"></i>
                <label style="position: absolute;
                width: 98px;
                height: 21px;
                left:630px;
                top: 34px;
                color: white;
                font-style: normal;
                font-weight: normal;
                font-size: 14px;
                line-height: 21px">Home</label>
                </div>
        
            <div>
                <i class="fas fa-shopping-cart fa-2x cart-icon" onclick="document.location='{{ route('cart.index') }}'"></i>
            </div>
            @guest

                <div class="sign-up">
                    <label onclick="document.location='{{ route('register') }}'">Signup</label>
                </div>
        
        
                <div class="login">
                    <button onclick="document.location='{{ route('login') }}'">Login</button>
                </div>
            @else
                <div class="notification" onclick="document.location='Page2.html'">
                    <i class="far fa-bell fa-lg bell-icon"></i>
                    <label>Notification</label>
                </div>
                <div class="user">
                    <i class="far fa-user-circle fa-lg user-icon"></i>
                    <label>{{ Auth::user()->name }}</label>
                    <div class="dropdown-content">
                        <a href="{{ route('profile.index') }}">My Account</a>
                        <a href="{{ route('cart.index') }}">My Purchases</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest  
    
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
