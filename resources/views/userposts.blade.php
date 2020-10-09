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
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-analytics.js"></script>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;0,700;1,300;1,500&display=swap" rel="stylesheet">

<!-- Styles -->
<link href="/css/style.css" rel="stylesheet">
</head>

<body>

    <div class="m-cont">


        <div class="side-1">
            <div>
                <h1>Posted</h1>
            </div>
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
            <div class="bar">
                <div>
                    <a class="link-b" href="/home"> <i class="fas fa-home"></i> Home</a>
                </div>
                <div class="ml">
                    <a class="link-b" href="/posts/{{$user->id}}"><i class="fas fa-list"></i> My posts</a>
                </div>
            </div>
            <div>
                <center>
                    <h1>My posts</h1>
                </center>
            </div>


            <div class="posts-list">

                <div class="posts-a">
                    <div class="posts">
                        @foreach($postsuser as $post)
                        <div class="post-card">
                            <div class="card-top">
                                <div class="user-part">
                                    <div> <img src="{{$post->user_picture}}" alt="{{$post->user_name}}" class="post-profile-img"></div>
                                    <div class="flex">
                                        <div>
                                            <p>{{$post->user_name}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <p class="date">{{date('d M Y H:i:s', strtotime($post->created_at))}}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="post-data">
                                <p>{{$post->data}}</p>
                            </div>
                            @if($post->imageURL)
                            <div>
                                <img class="post-image" src="{{$post->imageURL}}" alt="{{$post->imageURL}}">
                            </div>
                            @endif
                            <div class="btn">
                                <a href="/post/{{$post->id}}">View post</a>
                            </div>
                            <div>
                                <form action="/remove-post" method="post">
                                    @csrf
                                    @method('delete')

                                    <input type="hidden" name="postid" value="{{$post->id}}">
                                    <div class="btn">
                                        <input type="submit" class="d-btn" value="Delete">
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/firebase.js"></script>
    <script src="/js/fileupload.js"></script>
</body>

</html>