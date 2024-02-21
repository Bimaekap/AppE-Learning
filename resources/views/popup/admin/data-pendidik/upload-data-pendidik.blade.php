@extends('content.admin.master-data-pendidik')
@section('content-materi')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
    @endpush
    <h1>Sudah</h1>
    <div id="modal-ctn">
        <h1 class="head-modal">Upload Data Pendidik</h1>
        <form action="">
            <label>File</label>
            <input type="file">
        </form>
        <div class="btn-ctn">
            <a href="{{ URL::previous() }}">Tutup</a>
            <button type="submit">Simpan</button>
        </div>
    </div>

    <script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection
