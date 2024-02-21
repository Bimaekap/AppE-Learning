@extends('content.admin.master-register')
@section('master-register')
    <link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">

    <div>
        <div id="modal-ctn">
            <h1 class="head-modal">Edit Mata Pelajaran</h1>
            <form action="">
                <label>Nama Pengguna</label>
                <input type="text" name="name" placeholder="username">
                <label>Password</label>
                <input type="password" name="password" placeholder="ketik password">
                <label>Nama Pengguna</label>
                <input type="text" name="role" placeholder="admin/guru/siswa">
            </form>
            <div class="btn-ctn">
                <a href="{{ URL::previous() }}">Tutup</a>
                <button type="submit">Simpan</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection
