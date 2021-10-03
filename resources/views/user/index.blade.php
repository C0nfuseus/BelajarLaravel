<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="min-height: 100vh">
        <div class="row vh-100">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-4 col-md-offset-4">
                    <h1 class="display-3">Index user</h1>    
                    <table class="table table-striped">
                      <thead>
                          <tr>
                            <td>nama user</td>
                            <td>username</td>
                            <td>jabatan</td>
                            <td>id_bidang</td>
                            <td>id_role</td>
                            <td colspan = 2>Actions</td>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($users as $user)
                          <tr>
                              <td>{{$user->nama_user}}</td>
                              <td>{{$user->username}}</td>
                              <td>{{$user->jabatan}}</td>
                              <td>{{$user->id_bidang}}</td>
                              <td>{{$user->id_role}}</td>
                              <td>
                                <a href="{{ route('user.edit',$user->id_user)}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('user.destroy', $user->id_user)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    <a href="{{ route('auth.register')}}" class="btn btn-primary">register a new user</a>
                     <br>
                    <a href="{{ route ('user.dashboard')}}">Back to dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>