<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lerner</title>

    {{-- Bootstrap Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    {{-- Styles --}}
    <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('css/header.css') }}"/>

</head>
<body>

    <section class="top">
        <div class="header" style="padding-bottom: 0">
            <h1 id="logo" class="site-name left"><a style="color: #000;text-decoration:none;" href="http://lerner.dev/home">Lerner</a></h1>
            {{-- Language Selector --}}
            <div class="language-block">
                <select onchange="window.location.href = this.options[this.selectedIndex].value">
                    <option value="https://lerner.dev/locale/en" {{ $currentLocale == 'en' ? 'selected' : '' }}>🇬🇧</option>   
                    <option value="https://lerner.dev/locale/ru" {{ $currentLocale == 'ru' ? 'selected' : '' }}>🇷🇺</option>  
                    <option value="https://lerner.dev/locale/lv" {{ $currentLocale == 'lv' ? 'selected' : '' }}>🇱🇻</option>    

                </select>                
            </div>

            <!-- Section for Login or Profile Info -->
            <div class="profile right">
                <ul style="padding-left:0px" class="menu-top">
                    <li class="menu-item has-sub-menu">
                        
                        <a href="">{{Auth::user()->name." ".Auth::user()->surname}}</a>
                        <ul class="dropdown-list" style="list-style-type: none; padding: 0;">
                            <li style="padding: 2px 2px 2px 5px;"><a href="{{ route('account.index') }}">@lang('home.profile')</a></li>
                            <li style="padding: 2px 2px 2px 5px;">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                </form>
                                <button class="logout-button" form="logout-form" type="submit">@lang('home.log_out')</button>
                            </li>
                        </ul>
                        <img src="/img/unnown_user.jpg" alt="ImageError">

                    </li>
                </ul>
            </div>

        </div>
    </section>


    {{-- Main Section --}}
    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-1" style="padding: 0"></div>
                <div class="col-10">
                
                    {{-- Search Box --}}
                    <div class="search-label"><p>@lang('main.search_your_teacher')</p></div>
                    <div class="search-box"> 
                        <div>
                            <div class="container-fluid">
                                <form id="form" action="{{ route('main.update') }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <div id="search"><input type="text" name="query" placeholder="Search..."></div>

                                    <div class="row search-settings">
                                        {{-- Level Selector --}}
                                        <div class="col" ><p>@lang('main.level')</p></div>
                                        <div class="col">
                                            <ul class="level-input" style="list-style: none;padding-left:0px;">
                                                <li>
                                                    <input type="radio" name="level" id="level1" value="Low level">
                                                    <label for="level1">@lang('main.low_level')</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="level" id="level2" value="1-3">
                                                    <label for="level2">1-3</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="level" id="level3" value="4-6">
                                                    <label for="level3">4-6</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="level" id="level4" value="7-9">
                                                    <label for="level4">7-9</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="level" id="level5" value="10-12">
                                                    <label for="level5">10-12</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="level" id="level6" value="Hight Level">
                                                    <label for="level6">@lang('main.hight_level')</label>
                                                </li>
                                            </ul>
                                        </div>

                                        {{-- Category Selector --}}
                                        <div class="col"><p>@lang('main.category')</p></div>
                                        <div class="col">
                                            <ul class="category-input" style="list-style: none;padding-left:0px;">
                                                <li>
                                                    <input type="radio" name="category" id="category1" value="Mathimatics">
                                                    <label for="category1">@lang('main.mathematics')</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="category" id="category2" value="Physics">
                                                    <label for="category2">@lang('main.physics')</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="category" id="category3" value="Geografy">
                                                    <label for="category3">@lang('main.geografy')</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="category" id="category4" value="Languages">
                                                    <label for="category4">@lang('main.languages')</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="category" id="category5" value="Chemestry">
                                                    <label for="category5">@lang('main.chemestry')</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="category" id="category6" value="Biology">
                                                    <label for="category6">@lang('main.biology')</label>
                                                </li>
                                            
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="category-input" style="list-style: none;padding-left:0px;">
                                                <li>
                                                    <input type="radio" name="category" id="category7" value="IT">
                                                    <label for="category7">IT</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="category" id="category8" value="History">
                                                    <label for="category8">@lang('main.history')</label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="category" id="category9" value="Other">
                                                    <label for="category9">@lang('main.other')</label>
                                                </li>
                                            </ul>
                                        </div>

                                        {{-- Cost Slider --}}
                                        <div class="col" >
                                            <div class="cost-box">
                                                <label for="cost">@lang('main.cost')</label><p><input type="checkbox" id="disabler"></p>
                                                <div><input type="range" id="cost" name="cost" min="0" max="50" disabled></div>
                                                <div id="valueBox" class="value-box"><p id="value"></p></div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                <button class="search-submit-button" type="submit">@lang('main.search')</button>
                                </form>
                            </div>
                        </div>


                        <script>
                            const valueBox = document.querySelector("#value");
                            const input = document.querySelector("#cost");
                            valueBox.textContent = input.value;
                            input.addEventListener("input", (event) => {
                                if(input.value == null){console.log('asdsda')}

                                valueBox.textContent = event.target.value;
                            });

                            let checkBox = document.getElementById('disabler');
                            let valueDiv = document.getElementById("valueBox");

                            valueDiv.style.display = "none";

                            checkBox.onclick = function(){
                                // if(!checkBox.checked){ console.log('wwwww') }
                                if (!checkBox.checked) {
                                    valueDiv.style.display = "none";
                                    document.getElementById('cost').setAttribute('disabled', "");

                                } else {
                                    valueDiv.style.display = "flex";
                                    document.getElementById('cost').removeAttribute("disabled");
                                }

                            };
                        </script>

                        {{-- Lessons that match your search requirements --}}
                        <div class="search_results">
                            <h3>@lang('main.search_results')</h3>
                            <div class="posts-block">
                                @if($posts->isEmpty())
                                    <p>@lang('main.no_results')</p>
                                @else
                                    @foreach($posts as $post)

                                    <div id="lesson-box" class="container" style="margin-top: 10px">
                                        <div class="row" >
                                            <div class="col-2">
                                                <img src="img/unnown_user.jpg" alt="..." width="125px" height="125px">
                                            </div>
                                            <div class="col-10 lesson-content">
                                                <div class="cut-info" style="display:flex;justify-content:space-between">
                                                    <div><b>@lang('account.auther'):</b> {{ $post->teacher->user->name." ".$post->teacher->user->surname }}</div>
                                                    <div style="display:flex;">
                                                        <div class="lesson-category-box"><b>@lang('main.category'):</b> {{ $post->category }}</div>
                                                        <div class="lesson-cost-box"><b>@lang('main.cost'):</b> {{ $post->cost."€" }}</div>
                                                        <div class="lesson-level-box"><b>@lang('main.level'):</b> {{ $post->level }}</div>
                                                    </div>
                                                </div>
                                                <div class="lesson-title"><b>@lang('account.title'):</b> {{ $post->title }}</div>
                                                <div class="lessons-text">
                                                    <div class="about-auther"><b>@lang('main.about_me'):</b> </div>
                                                    <div class="text truncate">{{ $post->text }}</div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div style="display:flex; justify-content:space-between;margin-top:8px">
                                            <div class="lesson-email"><b>@lang('account.email'):</b> {{ $post->teacher->user->email }}</div>
                                            @if($post->teacher->user->phone_number)<div><b>@lang('account.phone_number'):</b> {{ $post->teacher->user->phone_number }}</div>@endif

                                        </div>
                                    </div>

                                    @endforeach

                                @endif
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="col-1" style="padding: 0"></div>
            </div>
        
        </div>

    </section>
  

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>