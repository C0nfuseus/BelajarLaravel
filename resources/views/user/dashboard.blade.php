<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="min-height: 100vh">
        <div class="row vh-100">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-4 col-md-offset-4">
                    <h4>Ini Dashboard TNDE DisBudPar Jawa Timur</h4><hr>
                     <a href="{{ route('mail.index')}}">index surat</a>
                     <br>
                     <a href="{{ route('user.index')}}">index user</a>
                     <br>
                    <a href="{{ route('auth.logout')}}">logout</a>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>