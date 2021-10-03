<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="min-height: 100vh">
        <div class="row vh-100">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-4 col-md-offset-4">
                    <h1 class="display-3">Update user</h1>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br> 
                    @endif
                    <form method="post" action="{{ route('user.update', $user->id_user) }}">
                        @method('PUT') 
                        @csrf
                        <div class="form-group">
                            <label for="nama_user">Nama User</label>
                            <input type="text" class="form-control" name="nama_user" value={{ $user->nama_user }} />
                        </div>
                        
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value={{ $user->username }} readonly/>
                        </div>
            
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value={{ $user->jabatan }} />
                        </div>
                        <div class="form-group">
                            <label for="id_bidang">nomor bidang</label>
                            <input type="text" class="form-control" name="id_bidang" value={{ $user->id_bidang }} />
                        </div>
                        <div class="form-group">
                            <label for="id_role">role</label>
                            <input type="text" class="form-control" name="id_role" value={{ $user->id_role }} />
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <a href="{{ route ('user.index')}}">Back to index</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
</body>
</html>