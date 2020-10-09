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
            <div class="bar">
                <div>
                    <a class="link-b" href="/home">Home</a>
                </div>
                <div class="ml">
                    <a class="link-b" href="/posts/{{$user->id}}">My posts</a>
                </div>
            </div>
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
                                    <button class="submit-btn" type="submit">Post <i class="fas fa-share"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>


            <div class="post-card width-c">
                <div class="card-top">
                    <div class="user-part">
                        <div> <img src="{{$postData->user_picture}}" alt="{{$postData->user_name}}" class="post-profile-img"></div>
                        <div class="flex">
                            <div>
                                <p>{{$postData->user_name}}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <p class="date">{{date('d M Y H:i:s', strtotime($postData->created_at))}}</p>
                        </div>
                    </div>

                </div>
                <div class="post-data">
                    <p>{{$postData->data}}</p>
                </div>
                <div>
                    <img class="post-image" src="https://via.placeholder.com/150" alt="">
                </div>

                <h1>Comments</h1>
                <div>
                    <form action="/comments" method="POST">
                        @csrf
                        <textarea required class="form-control small-a" placeholder="Got a comment?" name="commentData" rows="3"></textarea>
                        <input type="hidden" name="userID" value="{{$user->id}}">
                        <input type="hidden" name="postID" value="{{$postData->id}}">
                        <input type="hidden" name="userName" value="{{$user->name}}">
                        <input type="hidden" name="userImage" value="{{$user->imageURL}}">
                        <button class="submit-btn mt" type="submit">Submit <i class="fas fa-share"></i></button>
                    </form>
                </div>

                <div class="comments">
                    @foreach($comments as $comment)
                    <div class="comment">
                        <div class="card-top">
                            <div class="user-part">
                                <div> <img src="{{$comment->user_picture}}" alt="{{$comment->user_name}}" class="post-profile-img"></div>
                                <div class="flex">
                                    <div>
                                        <p>{{$comment->user_name}}</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <p class="date">{{date('d M Y H:i:s', strtotime($comment->created_at))}}</p>
                                </div>
                            </div>

                        </div>
                        <div class="post-data">
                            <p>{{$comment->message}}</p>
                        </div>
                    </div>


                    @endforeach
                </div>
            </div>

        </div>
    </div>

</body>

</html>