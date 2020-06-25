<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title>login_template</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark">
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
        </nav>
        <h1 class="text-center">Login</h1>
        <hr>

        <div class="container">
            <form class="" action="{{ route('blog.login_action')}}" method="post">    
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if ($errors->any() || isset($err_auth))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            @if(isset($err_auth))
                                <li>{{$err_auth}}</li>
                            @endif
                        </ul>
                    </div>
                @endif     
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" placeholder="Enter Email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="pswd">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
                <p>
                    <input class ="pt-5" type="checkbox"name="remember"> Remember me
                </p>
            </form>
        </div>

    </body>
</html>
