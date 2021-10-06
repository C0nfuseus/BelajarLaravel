<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disposisi Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="min-height: 100vh">
        <div class="row vh-100">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-4 col-md-offset-4">
                    <h4>Disposisi Surat</h4>
                    <hr>
                    <form action="{{ route('disposisi.save') }}" method="POST">

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
                            <label for="id_bidang">bidang</label>
                            <select id="id_bidang" name="id_bidang" class="form-control">
                                <option value="">pilih bidang</option>
                                @foreach ($data3 as $bidang)
                                    <option value="{{ $bidang->id_bidang }}">{{ $bidang->id_bidang }} -
                                        {{ $bidang->nama_bidang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_surat">surat</label>
                            <select id="id_surat" name="id_surat" class="form-control">
                                <option value="">pilih surat</option>
                                @foreach ($data2 as $surat)
                                    <option value="{{ $surat->id_surat }}">{{ $surat->no_surat }} -
                                        {{ $surat->instansi_pengirim }} - {{ $surat->perihal }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_user">penerima</label>
                            <select id="id_user" name="id_user" class="form-control">
                                <option value="">pilih penerima</option>
                                @foreach ($data4 as $user)
                                    <option value="{{ $user->id_user }}">{{ $user->nama_user }} -
                                        {{ $user->jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>jabatan</label>
                            <select id="jabatan" class="form-control">
                                <option value="">Pilih jabatan</option>
                                <option value="Kabid">Kabid</option>
                                <option value="Kadis">Kadis</option>
                                <option value="Kasi">Kasi</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>catatan disposisi</label>
                            <input type="text" class="form-control" name="cat_kabid">
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Disposisikan surat</button>
                        <br>
                        <a href="{{ route('mail.index') }}">Back to index</a>
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
