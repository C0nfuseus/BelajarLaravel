<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{url('css/login-tnde.css')}}" rel="stylesheet" type="text/css">
    <title>Sistem Tata Naskah Dinas Elektronik Disbudpar Jawa Timur</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel=icon type="image/png" sizes="16x16" href="../resources/asset/favicon-16x16.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="min-height: 100vh">
        <div class="row vh-100">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-4 col-md-offset-4 justify-content-center">
                    <h4 class="d-flex justify-content-center">Login TNDE Disbudpar Jatim</h4><hr>
                    <div class="d-flex justify-content-center" id="container-logo">
                    <img src="{{url('asset/logo-disbudpar.png')}}" alt="Image"/>
                    </div>
                    <form action="{{ route('auth.check') }}" method="POST">

                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{Session::get('fail') }}
                            </div>
                        @endif
                        
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan username sesuai role" value="{{ old('username') }}" >
                        </div>
                        <span class="text-danger">@error ('username'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="Masukkan password" placeholder="Masukkan password" >
                        </div>
                        <span class="text-danger">@error ('password'){{ $message }} @enderror</span>
                        <br>
                        <button type="submit" class="btn btn-block btn-primary justify-content-center">Login</button>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
</body>
</html>