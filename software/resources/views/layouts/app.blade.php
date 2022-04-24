
{{-- {{ use App\Model\Category; }} --}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- categories --}}
    <meta name="nav" content="{{ $categorys=App\Model\Category::select()->get()}} ">
    {{-- <meta name="nav" content="{{}}" > --}}
    <title>BOOKY</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/logo/favicon.png') }}" />
    @if(Auth::user() !=null )
        <meta name="nav" content="{{$carts=App\Model\Cart::select()->where('users_id',Auth::user()->id)->count() }} ">
    @endif
    @if(Auth::user() ==null )
        <meta name="sad" content="{{$carts=0}} ">
    @endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"rel="stylesheet"/>
 <!-- Styles -->

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
 <link href="{{ asset('css/style.css') }}" rel="stylesheet">
<body>
</head>

    <div id="app">
    <header class="header">
        <nav class="main-nav">
          <div class="flex-nav-left">

                <a class="navbar-brand logo" href="{{ url('/all') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="{{ asset('images/logo/logo.png')}}" alt="Booky logo" />
                </a>


                <form action="{{ url('search') }}" method="GET">
                    <div class="search-container">
                <input
                type="text"
                class="search-field"
                name="name"
                placeholder="search books..."
              />
              <button type="submit" class="search-btn">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="search-icon"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  stroke-width="2"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  />
                </svg>
            </button>
        </div>
            </form>
          </div>
          <div class="flex-nav-right">
            <a href="{{ url('/about') }}" class="nav-link"> About Us </a>

            <a href="{{ url('addtocard') }}"style="position: relative;" class="nav-icon-link">
                <span id="cartNu" style="background-color: #1766af;
                position: absolute;
                right: 11px;
                top: -7px;
                color: #fff;
                font-weight: bold;
                border-radius: 4px;
                padding: 1px;">{{  $carts }}
                </span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon cart-icon"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                />
              </svg>
            </a>

            <div class="register">
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link sign-up" href="{{ route('register') }}" style="font-size: 15px;">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                    <div class="register">
                        <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span style="font-weight:bold;">Wellcome , </span>
                    {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <span style="font-weight: bold;font-size:13px;">{{ __('Logout') }}</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    </div>
                </ul>
            </div>
          </div>
        </nav>

      </header>

      <div class="nav-secondary">
        <nav class="category-nav">
          <button class="menu-all-btn">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="icon menu-all-icon"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </button>
          <div class="category-list">
            <a class="category-btn" href="{{ url('home') }}">Home</a>
            @foreach($categorys as $category)

            <a class="navbar-brand category-btn" href="{{ url('/categorybook/'.$category->id ) }}">
                {{  $category->name }}
            </a>
        @endforeach

          </div>
        </nav>
      </div>
    </div>























{{--

      <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">


                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>


                    @foreach($categorys as $category)

                        <a class="navbar-brand" href="{{ url('/categorybook/'.$category->id ) }}">
                            {{  $category->name }}
                        </a>
                    @endforeach

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="footer-grid-2-col">
              <div class="footer-left">
                <div>
                  <img
                    src="{{ asset('images/logo/logo-footer.png') }}"
                    alt="Booky logo"
                    class="footer-logo"
                  />
                </div>

                <div class="footer-social-icons">
                  <a href="#" class="f-icon-link">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      x="0px"
                      y="0px"
                      width="30"
                      height="30"
                      viewBox="0 0 172 172"
                      style="fill: #000000"
                    >
                      <g
                        fill="none"
                        fill-rule="nonzero"
                        stroke="none"
                        stroke-width="1"
                        stroke-linecap="butt"
                        stroke-linejoin="miter"
                        stroke-miterlimit="10"
                        stroke-dasharray=""
                        stroke-dashoffset="0"
                        font-family="none"
                        font-weight="none"
                        font-size="none"
                        text-anchor="none"
                        style="mix-blend-mode: normal"
                      >
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g class="footer-icon" fill="#516271">
                          <path
                            d="M55.04,10.32c-24.65626,0 -44.72,20.06374 -44.72,44.72v61.92c0,24.65626 20.06374,44.72 44.72,44.72h61.92c24.65626,0 44.72,-20.06374 44.72,-44.72v-61.92c0,-24.65626 -20.06374,-44.72 -44.72,-44.72zM55.04,17.2h61.92c20.9375,0 37.84,16.9025 37.84,37.84v61.92c0,20.9375 -16.9025,37.84 -37.84,37.84h-61.92c-20.9375,0 -37.84,-16.9025 -37.84,-37.84v-61.92c0,-20.9375 16.9025,-37.84 37.84,-37.84zM127.28,37.84c-3.79972,0 -6.88,3.08028 -6.88,6.88c0,3.79972 3.08028,6.88 6.88,6.88c3.79972,0 6.88,-3.08028 6.88,-6.88c0,-3.79972 -3.08028,-6.88 -6.88,-6.88zM86,48.16c-20.85771,0 -37.84,16.98229 -37.84,37.84c0,20.85771 16.98229,37.84 37.84,37.84c20.85771,0 37.84,-16.98229 37.84,-37.84c0,-20.85771 -16.98229,-37.84 -37.84,-37.84zM86,55.04c17.13948,0 30.96,13.82052 30.96,30.96c0,17.13948 -13.82052,30.96 -30.96,30.96c-17.13948,0 -30.96,-13.82052 -30.96,-30.96c0,-17.13948 13.82052,-30.96 30.96,-30.96z"
                          ></path>
                        </g>
                      </g>
                    </svg>
                  </a>
                  <a href="#" class="f-icon-link">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      x="0px"
                      y="0px"
                      width="30"
                      height="30"
                      viewBox="0 0 172 172"
                      style="fill: #000000"
                    >
                      <g
                        fill="none"
                        fill-rule="nonzero"
                        stroke="none"
                        stroke-width="1"
                        stroke-linecap="butt"
                        stroke-linejoin="miter"
                        stroke-miterlimit="10"
                        stroke-dasharray=""
                        stroke-dashoffset="0"
                        font-family="none"
                        font-weight="none"
                        font-size="none"
                        text-anchor="none"
                        style="mix-blend-mode: normal"
                      >
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g class="footer-icon" fill="#516271">
                          <path
                            d="M86,17.2c-37.9948,0 -68.8,30.8052 -68.8,68.8c0,34.49173 25.41013,62.97493 58.5144,67.95147v-49.71947h-17.02227v-18.08293h17.02227v-12.03427c0,-19.92333 9.70653,-28.66667 26.2644,-28.66667c7.9292,0 12.126,0.59053 14.10973,0.85427v15.78387h-11.29467c-7.02907,0 -9.48293,6.66787 -9.48293,14.17853v9.88427h20.59987l-2.79213,18.08293h-17.80773v49.8628c33.58013,-4.55227 59.48907,-33.2648 59.48907,-68.0948c0,-37.9948 -30.8052,-68.8 -68.8,-68.8z"
                          ></path>
                        </g>
                      </g>
                    </svg>
                  </a>
                  <a href="#" class="f-icon-link">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      x="0px"
                      y="0px"
                      width="30"
                      height="30"
                      viewBox="0 0 172 172"
                      style="fill: #000000"
                    >
                      <g
                        fill="none"
                        fill-rule="nonzero"
                        stroke="none"
                        stroke-width="1"
                        stroke-linecap="butt"
                        stroke-linejoin="miter"
                        stroke-miterlimit="10"
                        stroke-dasharray=""
                        stroke-dashoffset="0"
                        font-family="none"
                        font-weight="none"
                        font-size="none"
                        text-anchor="none"
                        style="mix-blend-mode: normal"
                      >
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g class="footer-icon" fill="#516271">
                          <path
                            d="M160.53333,39.77213c-5.4868,2.43667 -11.38067,4.0764 -17.56693,4.816c6.31813,-3.784 11.1628,-9.77533 13.44467,-16.91907c-5.90533,3.50307 -12.4528,6.04867 -19.42453,7.42467c-5.57853,-5.94547 -13.52493,-9.66067 -22.31987,-9.66067c-16.8904,0 -30.5816,13.69693 -30.5816,30.5816c0,2.39653 0.2752,4.73573 0.7912,6.966c-25.41587,-1.2728 -47.94787,-13.4504 -63.038,-31.9576c-2.62587,4.51787 -4.13373,9.7696 -4.13373,15.38253c0,10.60667 5.39507,19.9692 13.59947,25.45027c-5.01093,-0.16053 -9.72947,-1.53653 -13.85173,-3.82413c0,0.13187 0,0.25227 0,0.38413c0,14.82067 10.53787,27.18173 24.53293,29.98533c-2.5628,0.69947 -5.26893,1.07213 -8.06107,1.07213c-1.96653,0 -3.8872,-0.19493 -5.75053,-0.54467c3.89293,12.14893 15.1876,20.99547 28.5692,21.242c-10.46333,8.2044 -23.65,13.09493 -37.98333,13.09493c-2.46533,0 -4.902,-0.14333 -7.29853,-0.43c13.5364,8.67453 29.60693,13.73707 46.88147,13.73707c56.25547,0 87.00907,-46.60053 87.00907,-87.0148c0,-1.3244 -0.02867,-2.64307 -0.086,-3.956c5.97987,-4.3172 11.16853,-9.7008 15.26787,-15.82973z"
                          ></path>
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>
              </div>

              <div class="footer-middle">
                <div class="footer-other-links">
                  {{-- <a href="#" style="font-size: 18px;
                  font-weight: bold;
                  color: #a6a8a9b3;
              " class="footer-link">About Us</a> --}}
                  {{-- <a href="#" class="footer-link">Contact Us</a> --}}
                </div>
              </div>

              <div class="footer-right">
                <div class="footer-copyright">
                  <p>Copyright &copy; 2022 Inc. All rights reserved.</p>
                  <p>Design & Front-end by: <span>Muhammed Said El-Sawy.</span></p>
                  <p>Back-end by: <span> Ahmed Alaa Ramadan.</span></p>
                  <p>Documentation by: <span style="    position: absolute">Mohmamed Ahmed Refat,<br><br> Mai Ahmed Shaban ,<br><br> Reem Khaled.</span></p>
                </div>
              </div>
            </div>
          </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@yield('script')
</body>
</html>
