<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title>index</title>
    </head>
    <body>

        <nav class="navbar navbar-expand-sm bg-dark">
            @if(session('id') != 0)
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog.post')}}">Blog</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{session('name')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog.logout')}}">Logout</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog.login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog.register')}}">Register</a>
                    </li>
                </ul>
            @endif
        </nav>
    
        <h1 class="text-center">Posts</h1>
        <hr>

        @foreach ($posts as $post)
        <div class="container">
            <div class="row">
                <div class="col-sm-3">User: {{$post->name}}</div>
                <div class="col-sm-3">Updated: {{$post->updated_at}}</div>
                <div class="col-sm-3">Created: {{$post->created_at}}</div>
                @if(session('id') != 0 and session('id') == $post->user_id)
                    <div class="col-sm-3">
                        <a class="nav-link" href="{{route('blog.update_post', $post->id)}}">Update</a>
                    </div>
                @endif
            </div>
            <div class="jumbotron">
                {{$post->content}}
            </div>
        </div>
        @endforeach
        <p></p>

    </body>
</html>
