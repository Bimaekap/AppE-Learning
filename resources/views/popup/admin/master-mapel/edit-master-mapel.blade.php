@extends('content.admin.master-mapel')
@section('edit-master-mapel')
    <link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">

    <div>
        <div id="modal-ctn">
            <h1 class="head-modal">Edit Mata Pelajaran</h1>
            <form action="">
                <label>Nama Mata Pelajaran</label>
                <input type="text" placeholder="ubah judul materi">
            </form>
            <div class="btn-ctn">
                <a href="{{ URL::previous() }}">Tutup</a>
                <button type="submit">Simpan</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection
