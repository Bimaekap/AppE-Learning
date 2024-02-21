@extends('content.guru.manajemen-materi.manajemen-materi')
@section('edit-materi')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/guru/popup/data-kelas-guru.css') }}">
@endpush


<div>
    <div id="modal-ctn">
        <h3 class="head-modal">Edit Materi Pada Kelas</span>
        </h3>
        <form action="{{route('subjects.update',$id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label>Judul Materi</label>
            <input type="text" name="nama_materi" value="{{ $id->nama_materi }}" placeholder="ubah judul materi">

            <label>Mata Pelajaran</label>
            <input type="text" name="nama_mapel_get" value="{{ $id->nama_mapel_get }}" readonly>

            {{-- Data Tambahan Di Hide Disini --}}
            <input style="display: none" type="text" name="lesson_id" value="{{ $id->lesson_id }}">
            <input type="text" name="nama_kelas_get" value="{{ $id->nama_kelas_get }}" readonly>
            {{-- --}}
            <label>File</label>
            <input type="file" name="nama_file">

            <div class="btn-ctn-modal">
                <a href="{{ route('subjects.index') }}">Kembali</a>
                <button type="submit">Simpan</button>
            </div>

        </form>

    </div>
</div>
<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection