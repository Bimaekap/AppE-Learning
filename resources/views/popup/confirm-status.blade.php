<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/layouts/confirm-style.css') }}">
</head>

<body>
    @include('sweetalert::alert')

    <div id="modal-ctn-confirm">
        <h1 class="head-modal-confirm">Lengkapi Data Anda</h1>
        <form class="form-confirm" action="{{route('store.confirm.status')}}" method="POST">
            @csrf
            @method('post')
            <label style="display: none">users_id</label>
            <input style="display: none" type="text" name="user_id" value="{{auth()->user()->id}}" readonly>
            <label>Nip</label>
            <input type="text" name="nomor_induk">
            @if ($errors->has('nip'))
            <p class="errors-style">
                {{ $errors->first('nip') }}
            </p>
            @endif
            <label>Nama</label>
            <input type="text" name="nama" value="{{ auth()->user()->nama }}" readonly>
            <label>Jabatan</label>
            <input type="text" name="jabatan">
            @if ($errors->has('jabatan'))
            <p class="errors-style">
                {{ $errors->first('jabatan') }}
            </p>
            @endif
            <label>Alamat</label>
            <input type="text" name="alamat">
            @if ($errors->has('alamat'))
            <p class="errors-style">
                {{ $errors->first('alamat') }}
            </p>
            @endif
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin">
                <option selected>Pilih Jenis Kelamin</option>
                <option value="pria">Pria</option>
                <option value="perempuan">Perempuan</option>
            </select>
            @if ($errors->has('jenis_kelamin'))
            <p class="errors-style">
                {{ $errors->first('nip') }}
            </p>
            @endif
            <label>No HP</label>
            <input type="text" name="nomor_hp">
            @if ($errors->has('nomor_hp'))
            <p class="errors-style">
                {{ $errors->first('nomor_hp') }}
            </p>
            @endif
            <div class="btn-ctn">
                <button class="button-confirm" type="submit">Selesai</button>
            </div>
        </form>

    </div>

</body>

</html>