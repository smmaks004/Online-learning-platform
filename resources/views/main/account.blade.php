<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Lerner</title>

        <link rel="stylesheet" type="text/css" href="{{ url('css/profile.css') }}"/>

    </head>
    <body>
        

        <div class="container main-container">
            <div class="row">
                {{-- Left Side of Site --}}
                <div class="col-3 panel left-side">
                    <div class="panel">

                        <div class="panel-img">
                            <img src="img/unnown_user.jpg" alt="ImageError" width="180px" height="180px">
                        </div>
                        <ul class="panel-menu">
                            <li onclick="change('home')"><a>@lang('account.home_page')</a></li>  
                            <li onclick="change('profile')"><a>@lang('home.profile')</a></li>
                            <li onclick="change('edit')"><a>@lang('account.edit_profile')</a></li>

                            @if($user->role == "teacher" || $user->role == "admin")
                                <li onclick="change('lessons')"><a>@lang('account.lessons_control')</a></li>
                                @if($user->role == "admin")
                                    <li onclick="change('control')"><a>@lang('account.user_control')</a></li>
                                @endif
                            @endif

                            <li onclick="change('setting')"><a>@lang('account.settings')</a></li>
                            {{-- <li onclick="change('logout')"><a>Log Out</a></li> --}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            <li onclick="change('logout')"><a>@lang('home.log_out')</a></li>

                        </ul>

                    </div>
                </div>

                {{-- Right Side of Site --}}
                <div class="col-9 right-side">
                    <div id="info-block">
                        
                        <div class="container">

                            {{-- Profile --}}
                            <div class="row">
                                <div class="col-12 page-title">
                                    @lang('account.your_information')
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div>
                                        <label for="name">@lang('account.name'): </label>
                                        <a id="name" class="name">{{$user->name}}</a>
                                    </div>
                                    <div>
                                        <label for="phone_number">@lang('account.phone_number'): </label>
                                        @if(is_null($user->phone_number))
                                            <a>@lang('account.none')</a>
                                        @else
                                            <a id="phone_number" class="phone_number">{{ $user->phone_number }}</a>
                                        @endif 
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <label for="surname">@lang('account.surname'): </label>
                                        <a id="surname" class="surname">{{$user->surname}}</a>
                                    </div>
                                    <div>
                                        <label for="email">@lang('account.email'): </label>
                                        <a id="email" class="email">{{$user->email}}</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div id="edit-block" style="display: none">
                        <form action="{{ route('account.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="name-input">{{-- Name Input --}}
                                <label for="name">@lang('account.name'): </label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="surname-input">{{-- Surname Input --}}
                                <label for="surname">@lang('account.surname'): </label>
                                <input type="text" id="surname" name="surname" value="{{ $user->surname }}" required>
                            </div>
                            <div class="phone_number-input">{{-- Phone Number Input --}}
                                <label for="phone_number">@lang('account.phone_number'): </label>
                                <input type="number" id="phone_number" name="phone_number" placeholder="00111222" value="{{ $user->phone_number }}">
                            </div>

                            <button type="submit">@lang('account.submit')</button>
                        </form>

                    </div>

                    <div id="setting-block" style="display: none">
                        <div>@lang('account.settings')</div>
                    </div>

                    
                    {{-- Lessons --}}
                    @if($user->role == "teacher" || $user->role == "admin")
                        <div id="lessons-block" style="display: none">
                            <div class="lesson-title-block" @if($user->role == "teacher")style="padding-bottom: 5px" @endif>
                                <div @if($user->role == "teacher") style="font-size:25px" @endif>@lang('account.lessons')</div>
                                @if($user->role == "teacher")

                                <div><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal{{$user->id}}" >@lang('account.create_lesson')</button></div>
                                
                                
                                
                                @endif
                            </div>
                            <div>
                                <table class="lessons-list" style="width:100%;">
                                    
                                    <tr>
                                        <td>@lang('account.title')</td>
                                        <td>@lang('account.auther')</td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    {{-- @if($user->role == "admin") --}}
                                    {{-- @if($allPosts) --}}
                                        @foreach($allPosts as $post)
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                @if($user->role == "admin")
                                                    <td>{{ $post->teacher->user->name . " " . $post->teacher->user->surname }}</td>
                                                @endif

                                                
                                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal{{$post->id}}" >@lang('account.edit_post')</button></td>
                                                <div class="modal fade" id="Modal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="ModalLabel">@lang('account.edit_post')</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="EditLessonForm{{ $post->id }}" action="{{ route('editLesson', $post->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        {{-- Title --}}
                                                                        <div class="col-md-12">
                                                                            <label for="recipient-name" class="col-form-label">@lang('account.title'):</label>
                                                                            <input name="title" type="text" class="form-control" id="recipient-name" value="{{ $post->title }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        {{-- Category --}}
                                                                        <div class="col-md-4">
                                                                            <label for="category-name" class="col-form-label">@lang('main.category'):</label>
                                                                            <select name="category" class="form-control" id="category-name">
                                                                                <option value="Mathematics" {{ $post->category == 'Mathematics' ? 'selected' : '' }}>@lang('main.mathematics')</option>
                                                                                <option value="Physics" {{ $post->category == 'Physics' ? 'selected' : '' }}>@lang('main.physics')</option>
                                                                                <option value="Geografy" {{ $post->category == 'Geografy' ? 'selected' : '' }}>@lang('main.geografy')</option>
                                                                                <option value="Languages" {{ $post->category == 'Languages' ? 'selected' : '' }}>@lang('main.languages')</option>
                                                                                <option value="Chemestry" {{ $post->category == 'Chemestry' ? 'selected' : '' }}>@lang('main.chemestry')</option>
                                                                                <option value="Biology" {{ $post->category == 'Biology' ? 'selected' : '' }}>@lang('main.biology')</option>
                                                                                <option value="IT" {{ $post->category == 'IT' ? 'selected' : '' }}>IT</option>
                                                                                <option value="History" {{ $post->category == 'History' ? 'selected' : '' }}>@lang('main.history')</option>
                                                                                <option value="Other" {{ $post->category == 'Other' ? 'selected' : '' }}>@lang('main.other')</option>
                        
                                                                            </select>
                                                                        </div>
                                                                        {{-- Level --}}
                                                                        <div class="col-md-4">
                                                                            <label for="level-name" class="col-form-label">@lang('main.level'):</label>
                                                                            <select name="level" class="form-control" id="level-name">
                                                                                <option value="Low Level" {{ $post->level == 'Low Level' ? 'selected' : '' }}>@lang('main.low_level')</option>
                                                                                <option value="1-3" {{ $post->level == '1-3' ? 'selected' : '' }}>1-3</option>
                                                                                <option value="4-6" {{ $post->level == '4-6' ? 'selected' : '' }}>4-6</option>
                                                                                <option value="7-9" {{ $post->level == '7-9' ? 'selected' : '' }}>7-9</option>
                                                                                <option value="10-12" {{ $post->level == '10-12' ? 'selected' : '' }}>10-12</option>
                                                                                <option value="Hight Level" {{ $post->level == 'Hight Level' ? 'selected' : '' }}>@lang('main.hight_level')</option>
                                                                            </select>
                                                                        </div>
                                                                        {{-- Cost --}}
                                                                        <div class="col-md-4">
                                                                            <label for="cost-name" class="col-form-label">@lang('main.cost'):</label>
                                                                            <input name="cost" type="number" class="form-control" id="cost-name" value="{{ $post->cost }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        {{-- Text --}}
                                                                        <div class="col-md-12">
                                                                            <label for="message-text" class="col-form-label">@lang('account.text'):</label>
                                                                            <textarea name="text" style="height:300px" class="form-control" id="message-text">{{ $post->text }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('account.close')</button>
                                                            <button form="EditLessonForm{{ $post->id }}" type="submit" class="btn btn-primary">@lang('account.confirm')</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <td>
                                                    <form class="delete-form" action="{{ route('deletePost', $post->id) }}" method="GET">
                                                        @csrf
                                                        @method('GET')
                                                        <button type="submit">@lang('account.delete')</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        
                                        @endforeach

                                </table>
                            </div>
                        </div>
                    @endif
                    

                    @if($user->role == "admin")
                        <div id="control-block" style="display: none">
                            <div>@lang('account.user_control')</div>
                            <div>
                                <table style="width: 100%">
                                    <tr>
                                        <td>ID</td>
                                        <td>@lang('account.name_and_surname')</td>
                                        <td>@lang('account.email')</td>
                                        <td>@lang('account.role')</td>
                                        <td>{{--@lang('account.delete')--}}</td>
                                    </tr>
                                        
                                    @foreach($allUsers as $randomUser)
                                        <tr id="{{ $randomUser->id }}">
                                            <td>{{ $randomUser->id }}</td>
                                            <td>{{ $randomUser->name." ".$randomUser->surname }}</td>
                                            <td>{{ $randomUser->email }}</td>
                                            <td id="role" name="role">
                                                <form action="{{ route('account.update', $randomUser->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    
                                                    <label for="role">{{--@lang('account.role'):--}}</label>
                                                    <select name="role" id="role">
                                                        <option value="student" {{ $randomUser->role == 'student' ? 'selected' : '' }}>@lang('account.student')</option>
                                                        <option value="teacher" {{ $randomUser->role == 'teacher' ? 'selected' : '' }}>@lang('account.teacher')</option>
                                                        <option value="admin" {{ $randomUser->role == 'admin' ? 'selected' : '' }}>@lang('account.admin')</option>
                                                        
                                                    </select>
                                                    
                                                    <button class="update_role-button" type="submit">@lang('account.update_role')</button>
                                                </form>
                                            </td>
                                            <td>
                                                @if($user->id != $randomUser->id)
                                                    <form class="delete_user-form" action="{{ route('deleteUser', $randomUser->id) }}" method="GET">
                                                        @csrf
                                                        @method('GET')
                                                        <button type="submit">@lang('account.delete')</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif

                </div>

            </div>

            </div>
        </div>


        {{-- Modal for creting lessons --}}
        <div class="modal fade" id="Modal{{ $user->id }}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalLabel">Your Lesson</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="CreateLessonForm{{ $user->id }}" action="{{ route('createLesson', $user->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="container-fluid">
                            <div class="row">
                                {{-- Title --}}
                                <div class="col-md-12">
                                    <label for="title-name" class="col-form-label">@lang('account.title'):</label>
                                    <input name="title" type="text" class="form-control" id="title-name" required>
                                </div>
                            </div>
                            <div class="row">
                                {{-- Category --}}
                                <div class="col-md-4">
                                    <label for="category-name" class="col-form-label">@lang('main.category'):</label>
                                    <select name="category" class="form-control" id="category-name">
                                        <option value="Mathematics">@lang('main.mathematics')</option>
                                        <option value="Physics">@lang('main.physics')</option>
                                        <option value="Geografy">@lang('main.geografy')</option>
                                        <option value="Languages">@lang('main.languages')</option>
                                        <option value="Chemestry">@lang('main.chemestry')</option>
                                        <option value="Biology">@lang('main.biology')</option>
                                        <option value="IT">IT</option>
                                        <option value="History">@lang('main.history')</option>
                                        <option value="Other">@lang('main.other')</option>
                                    </select>
                                </div>
                                {{-- Level --}}
                                <div class="col-md-4">
                                    <label for="level-name" class="col-form-label">@lang('main.level'):</label>
                                    <select name="level" class="form-control" id="level-name">
                                        <option value="Low Level">@lang('main.low_level')</option>
                                        <option value="1-3">1-3</option>
                                        <option value="4-6">4-6</option>
                                        <option value="7-9">7-9</option>
                                        <option value="10-12">10-12</option>
                                        <option value="Hight Level">@lang('main.hight_level')</option>
                                    </select>
                                </div>
                                {{-- Cost --}}
                                <div class="col-md-4">
                                    <label for="cost-name" class="col-form-label">@lang('main.cost'):</label>
                                    <input name="cost" type="number" class="form-control" id="cost-name" required>
                                </div>
                            </div>
                            <div class="row">
                                {{-- Text --}}
                                <div class="col-md-12">
                                    <label for="message-text" class="col-form-label">@lang('account.text'):</label>
                                    <textarea name="text" style="height:300px" class="form-control" id="message-text"></textarea>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('account.close')</button>
                    <button form="CreateLessonForm{{ $user->id }}" type="submit" class="btn btn-primary">@lang('account.confirm')</button>
                </div>
                </div>
            </div>
        </div>
        



    
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="js/profile.js"></script>
    </body>
</html>