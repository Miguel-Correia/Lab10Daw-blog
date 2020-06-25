<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title>blog</title>
    </head>
    <body>

        <nav class="navbar navbar-expand-sm bg-dark">
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
        </nav>
    
        <h1 class="text-center">Blog</h1>
        <hr>

        <div class="form-body container mt-5 pt-5 pb-5">
            <div class="form-group col-10 container">
                <form class="" action="{{route($action, $blog_id)}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <textarea class="w-100" type="text" style="height:200px;" class="form-control" name="blog_content">{{$content}}</textarea>
                    <p class="text-danger"><small></small></p>

                    <button type="submit" class="btn btn-success" name="btn">{{$btn_text}}</button>
                    <a class="btn btn-danger" href="{{route('blog')}}" id="btnsignup">Cancel</a>
                </form>
            </div>
        </div>

    </body>
</html>
