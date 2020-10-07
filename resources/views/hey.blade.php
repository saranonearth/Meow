    @extends('layout.layout')

    @section('content')
    <div>

        <h1>Posts</h1>

        @foreach($posts as $post)
        <p>{{$post->data}}</p>
        @endforeach
    </div>

    @endsection