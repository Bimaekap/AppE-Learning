@extends('content.admin.master-kelas')
@section('content-materi')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
@endpush

<div id="modal-ctn-step-satu">
    <h1 class="head-modal">Tambah Kelas Baru</h1>
    <form action="{{route('MasterKelas.store')}}" method="POST">
        @csrf
        @method('POST')
        <label>Pilih Guru</label>
        <select class="select-master-kelas" name="teacher_id">
            <option style="font-weight: 700;color:black" disabled>Pilih Guru</option>
            @foreach ($teachers as $data )
            <option value="{{ $data->id }}">{{ $data->nama }}</option>
            @endforeach
        </select>

        <label style="margin-top:1rem;">Kode Kelas</label>
        <input type="text" name="kode_kelas" placeholder="isi kode kelas">
        <label>Nama Kelas</label>
        <input type="text" name="nama_kelas" placeholder="isi nama kelas">
        <label>Pilih Mapel</label>
        <select class="select-master-kelas" name="lesson_id">
            <option style="font-weight: 700;color:black" disabled>Pilih Mata Pelajaran</option>
            @foreach ($mapels as $data )
            <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
            @endforeach
        </select>
        <div class="btn-ctn-modal">
            <a href="{{route('MasterKelas.index')}}">Tutup</a>
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>

<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection