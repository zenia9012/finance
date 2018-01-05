<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Головна
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="#">Замовлення</a></li>
                <li><a href="#">Витрати</a></li>
                <li><a href="#">Статистика</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                <li><a href="{{ route('login') }}">Увійти</a></li>
                <li><a href="{{ route('register') }}">Зареєструватися</a></li>
                @else
                    <li><a href="#">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a></li>
                    <li><a href="{{ route('logout') }}">Вийти</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>