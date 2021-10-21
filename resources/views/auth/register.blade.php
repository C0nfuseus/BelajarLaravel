<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="min-height: 100vh">
        <div class="row vh-100">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-4 col-md-offset-4">
                    <h3>Register TNDE DisBudPar Jawa Timur</h3>
                    <hr>
                    <form action="{{ route('auth.save') }}" method="POST">

                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label>nama user</label>
                            <input type="text" class="form-control" name="nama_user" placeholder="masukan nama lengkap"
                                value="{{ old('nama_user') }}">
                        </div>
                        <span class="text-danger">@error('nama_user'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="number" class="form-control" name="username" placeholder="masukan NIP"
                                value="{{ old('username') }}">
                        </div>
                        <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                        </div>
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label for="id_bidang">bidang</label>
                            <select id="id_bidang" name="id_bidang" class="form-control">
                                <option value="">pilih bidang</option>
                                @foreach ($data1 as $bidang)
                                    <option value="{{ $bidang->id_bidang }}">{{ $bidang->id_bidang }} -
                                        {{ $bidang->nama_bidang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="text-danger">@error('id_bidang'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label for="id_role">user_role</label>
                            <select id="id_role" name="id_role" class="form-control">
                                <option value="">pilih role untuk pengguna</option>
                                @foreach ($data2 as $role)
                                    <option value="{{ $role->id_role }}">{{ $role->id_role }} -
                                        {{ $role->role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="text-danger">@error('id_role'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label>jabatan</label>
                            <input type="text" class="form-control" name="jabatan" placeholder="masukan jabatan"
                                value="{{ old('jabatan') }}">
                        </div>
                        <span class="text-danger">@error('jabatan'){{ $message }} @enderror</span>
                        <br>
                        <button type="submit" class="btn btn-block btn-primary">Daftarkan User</button>
                        <br>
                        <a href="{{ route('user.index') }}">Back to index</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

</body>

</html>
