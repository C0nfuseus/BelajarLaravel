<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="min-height: 100vh">
        <div class="row vh-100">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-md-4 col-md-offset-4">
                    <h1 class="display-3">Update surat</h1>
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
                    <form  action="{{ route('user.update', $surat->id_surat)}}"  method="POST">
                        @method('POST') 
                        @csrf
                        <div class="form-group">
                            <label>Id Surat</label>
                            <input type="text" class="form-control" name="no_surat" value="{{$surat->id_surat}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Terima Surat</label>
                            <input type="text" class="form-control" name="tgl_terimasurat" value= "{{$surat->tgl_terimasurat}}" />
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" class="form-control" name="tgl_surat" value="{{$surat->tgl_surat}}" >
                        </div>
                        <span class="text-danger">@error ('tgl_surat'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label>Nomor Surat</label>
                            <input type="text" class="form-control" name="no_surat" value="{{$surat->no_surat}}" >
                        </div>
                        <span class="text-danger">@error ('no_surat'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label>Instansi Pengirim</label>
                            <input type="text" class="form-control" name="instansi_pengirim" value="{{ $surat->instansi_pengirim }}" >
                        </div>
                        <span class="text-danger">@error ('instansi_pengirim'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label>Bidang Dalam Instansi Pengirim</label>
                            <input type="text" class="form-control" name="bidang_instansi" value="{{ $surat->bidang_instansi }}" >
                        </div>
                        <span class="text-danger">@error ('bidang_instansi'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label>Perihal</label>
                            <input type="text" class="form-control" name="perihal" value="{{ $surat->perihal}}" >
                        </div>
                        <span class="text-danger">@error ('perihal'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label for="kode_klas">kode klasifikasi</label>
                            <select id="kode_klas" name="kode_klas" class="form-control">
                                <option value="">Select Department</option>
                                @foreach ($data as $klas)
                                    <option value="{{ $klas->kode_klas }}">{{$klas->kode_klas}} - {{ $klas->keterangan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="text-danger">@error ('kode_klas'){{ $message }} @enderror</span>
                        <br>
                        <div class="form-group">
                            <label>File surat</label>
                            <input type="file" class="form-control-file" name="file_surat" value="{{ $surat->file_surat }}" >
                        </div>
                        <span class="text-danger">@error ('file_surat'){{ $message }} @enderror</span>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <a href="{{ route ('mail.index')}}">Back to index</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    
</body>
</html>