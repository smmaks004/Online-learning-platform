<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lerner</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/reset.css') }}"/>
    



    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="{{ url('css/header.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('css/home.css') }}"/>

</head>
<body>

    {{-- Header section --}}
    <section class="top">
        <div class="header">
            <h1 id="logo" class="site-name left">Lerner</h1>
            {{-- <div><a style="color:black" href="{{ route('locale', 'ru') }}">Button</a></div> --}}
            <div class="language-block">
                <select onchange="window.location.href = this.options[this.selectedIndex].value">
                    <option value="https://lerner.dev/locale/en" {{ $currentLocale == 'en' ? 'selected' : '' }}>🇬🇧</option>   
                    <option value="https://lerner.dev/locale/ru" {{ $currentLocale == 'ru' ? 'selected' : '' }}>🇷🇺</option>  
                    <option value="https://lerner.dev/locale/lv" {{ $currentLocale == 'lv' ? 'selected' : '' }}>🇱🇻</option>    

                </select>                
            </div>

            <!-- Section for Login or Profile Info -->
            <div class="profile right">

                @auth

                    <ul class="menu-top">
                        <li class="menu-item has-sub-menu">
                            
                            <a href="">{{Auth::user()->name." ".Auth::user()->surname}}</a>
                            <ul class="dropdown-list">
                                <li><a href="{{ route('account.index') }}">@lang('home.profile')</a></li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                    </form>
                                    <button class="logout-button" form="logout-form" type="submit">@lang('home.log_out')</button>
                                </li>
                                {{-- <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li> --}}
                            </ul>
                            <img src="/img/unnown_user.jpg" alt="ImageError">

                        </li>
                    </ul>
                    
                @endauth
                @guest  
                    <div class="login-registr">
                        <a class="login-button" href="{{ route('login') }}">@lang('home.login')</a>
                        <a class="registr-button" href="{{ route('register') }}">@lang('home.register')</a>
                    </div>
                @endguest

            </div>

        </div>
    </section>

    <section class="main">

        {{-- Сarousel --}}
        <div class="bd carousel-block" style="height:500px;">
            <div id="carouselCaptions" class="carousel slide" data-ride="carousel"style="height:500px;">
            <ol class="carousel-indicators">
                <li data-target="#carouselCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselCaptions" data-slide-to="1"></li>
                <li data-target="#carouselCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                {{-- First Сarousel Image --}}
                <div class="carousel-item active">
                    <img src="img/carousel-1.jpg" class="d-block w-100" alt="NoImage" style="height:500px;object-fit:cover">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>@lang('home.carousel.first_text')</h5>
                        @guest<p id="join_us-link"><a href="https://lerner.dev/register">@lang('home.carousel.first_button')</a></p>@endguest
                        @auth<p><a>@lang('home.carousel.first_button')</a></p>@endauth
                    </div>
                </div>
                {{-- Second Сarousel Image --}}
                <div class="carousel-item">
                    <img src="img/carousel-2.jpg" class="d-block w-100" alt="NoImage" style="height:500px;object-fit:cover">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>@lang('home.carousel.second_text_1')</h5>
                        <p>@lang('home.carousel.second_text_2')</p>
                    </div>
                </div>
                {{-- Third Carousel Image --}}
                <div class="carousel-item">
                    <img src="img/carousel-3.jpg" class="d-block w-100" alt="NoImage" style="height:500px;object-fit:cover">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>@lang('home.carousel.third_text_1')</h5> 
                        <p>@lang('home.carousel.third_text_2')</p>
                    </div>
                </div>
            </div>
            {{-- Сarousel Control --}}
            <a class="carousel-control-prev" href="#carouselCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>


        {{-- Some Lessons --}}
        <div class="container">
            <div class="row">
                <div class="col-1"></div>
                    
                <div class="some-posts col-10">
                    @if($posts->count() <= 1)
                        {{-- <div>@lang('home.no_lessons_now')</div> --}}
                    @else
                        {{-- Post List --}}
                        @php $loop_count=0 @endphp
                        @foreach($posts as $post)
                            @if($post->text)
                                <div class="post">
                                    <div>
                                        <p class="title"><b>@lang('home.title'):</b> {{ $post->title }}</p>
                                        <p class="auther"><b>@lang('home.auther'):</b> {{ $post->teacher->user->name ." ". $post->teacher->user->surname }}</p>
                                    </div>
                                    <div class="post_text">{{ $post->text }}</div>
                                </div>
                                
                                @if($loop_count==4)
                                    @break
                                @else
                                    @php $loop_count++ @endphp
                                @endif
                            @endif
                        @endforeach
                    @endif

                    {{-- Button will redirect to main page --}}
                    <div class="gogo-button-box">
                        <form id="main" action="{{ route('main.index') }}" method="POST">
                            @method('GET')
                            @csrf
                            <button class="gogo-button" form="main" type="submit">@lang('home.see_more')</button>
                        </form>
                    </div>

                </div>

                <div class="col-1"></div>
            </div>
        </div>

    </section>


    {{-- Just Text --}}
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-content col-10">
                    <p>Copyright © 2023 Laravel Docs</p>
                    <p>Code highlighting provided by Torchlight</p>
                    <p>©2004–2024 Maksims Smuškovičs, for help whrite on email - maks@inbox.lv</p>
                </div>
            </div>
        </div>
    </section>


    {{-- Bootstrap JS --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
