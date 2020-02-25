<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/login.css')}}">



</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div id="first">
                <div class="myform form ">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Login</h1>
                        <?php /*if(isset($errormessage)){
                                echo $errormessage;
                                */?><!--

                            --><?php /*}else{
                                echo "hello";
                            } */?>
                            @if (session('errormgs'))
                                <div class="alert alert-danger">
                                    {{ session('errormgs') }}
                                </div>
                            @endif
                            @if (session('emailmgs'))
                                <div class="alert alert-success">
                                    {{ session('emailmgs') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="login" method="post" name="login">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" value="{{old('email')}}" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            @error('email')
                            <span style="color: red">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                            @error('password')
                            <span style="color: red">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-12 text-center ">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                        </div>

                        <div class="form-group">
                            <p class="text-center">Don't have account? <a href="register" id="signup">Register here</a></p>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>

</html>