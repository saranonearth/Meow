<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ __('Posted') }}</title>
<script src="https://kit.fontawesome.com/e19e904283.js" crossorigin="anonymous"></script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;0,700;1,300;1,500&display=swap" rel="stylesheet">

<!-- Styles -->
<link href="/css/style.css" rel="stylesheet">
</head>

<body>

    <div class="m-cont">

        <div class="side-1">
            <div>
                <div>
                    <img class="profile-image" src="{{$user->imageURL}}" alt="user-image">
                </div>
                <p class="username">{{$user->name}}</p>

            </div>
            <div>
                <p class="num">{{$count}}</p>
                <p>Posts</p>
            </div>
            <div class="logout">
                <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


            </div>
        </div>

        <div class="side-2">
            <div class="post-input">
                <div>
                    <form action="/posts" method="POST">
                        @csrf
                        <div class="cross">
                            <div class="i-col">
                                <div>
                                    <textarea class="form-control" placeholder="Got anything in mind? Share!" name="postData" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="userId" value="{{$user->id}}">
                                <input type="hidden" name="userName" value="{{$user->name}}">
                                <input type="hidden" name="userImage" value="{{$user->imageURL}}">
                                <input type="hidden" name="imageURL" value="">
                            </div>


                            <div class="col-span">

                                <div>


                                    <input type="file" id="post-image-upload" capture="filesystem" name="post-image" accept="image/*" style="display: none;">
                                    <input class="media-btn" type="button" value="Media" onclick="document.getElementById('post-image-upload').click();">

                                </div>
                                <div>
                                    <button class="submit-btn" type="submit">Submit <i class="fas fa-share"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>

            <h1>POST</h1>
        </div>
    </div>

</body>

</html>