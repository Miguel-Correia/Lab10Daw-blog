<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <title>register_template</title>
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
        <h1 class="text-center">Register</h1>
        <hr>

        <div class="container">
            <form class="" action="{{ route('blog.register_action')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" placeholder="Enter username"  name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="pswd">
                </div>
                <div class="form-group">
                    <label for="pwd">Confirm Password:</label>
                    <input type="password" class="form-control" placeholder="Renter password" name="conf_pswd">
                </div>
                <button type="submit" class="btn btn-success" name="sub">Register</button>
            </form>
        </div>

    </body>
</html>
