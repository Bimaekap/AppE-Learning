@extends('content.admin.master-mapel')
@section('content-materi')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
@endpush
@include('sweetalert::alert')

<div id="modal-ctn-tambah-master-mapel">
    <h1 class="head-modal">Tambah Mata Pelajaran Baru</h1>
    <form action="{{route('MasterMapel.store')}}" method="POST">
        @csrf
        @method('POST')
        <label>Nama Pata Pelajaran</label>
        <input type="text" name="nama_mapel">
        <div class="information">
            <p>Isi field di atas untuk menambah data mata pelajaran baru</p>
        </div>
        <div class="btn-ctn-modal">
            <a href="{{route('MasterMapel.index')}}">Tutup</a>
            <button type="submit">Simpan</button>
        </div>
    </form>

</div>

<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection