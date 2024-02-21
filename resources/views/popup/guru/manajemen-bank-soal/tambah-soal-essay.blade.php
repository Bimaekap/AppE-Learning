@extends('content.guru.manajemen-bank-soal.manajemen-bank-soal-essay')
@section('edit-materi-bank-soal')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
@endpush
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="modal-ctn">
        <h1 class="head-modal">Tambahkan ke Bank Soal Essay</h1>
        <form action="">
            <label>Mata Pelajaran</label>
            <input type="text" placeholder="isi soal essay">
            <label>soal</label>
            <input type="text">
        </form>
        <div class="btn-ctn-modal">
            <a href="{{ URL::previous() }}">Tutup</a>
            <button type="submit">Simpan</button>
        </div>
    </div>


    <script src="{{ asset('assets/js/popup-modal.js') }}"></script>
</body>

</html>
@endsection