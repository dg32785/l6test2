<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/login.css')}}">



</head>
<?php // echo "<pre>";print_r($error->all());exit; ?>


<body>

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">

            <div id="first">
                <div class="myform form ">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1 >Register</h1>
                        </div>
                    </div>
                    <form  action="register" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text"  name="name" class="form-control" id="name" value="{{ old('name') }}" aria-describedby="emailHelp" placeholder="Enter Name">
                            @error('name')
                            <span style="color: red">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" name="email"  value="{{ old('email') }}" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
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

                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password_confirmation" id="password-confirm"   class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">

                        </div>

                        <div class="col-md-12 text-center mb-3">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Register</button>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <p class="text-center"><a href="{{url('/')}}" id="signin">Already have an account?</a></p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>