@extends('content.admin.master-data-siswa')
@section('content-materi')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
    @endpush

    <div id="modal-ctn">
        <h1 class="head-modal">Upload Data Siswa</h1>
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
