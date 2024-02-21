@extends('content.guru.manajemen-materi.manajemen-materi')
@section('edit-materi')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/guru/popup/data-kelas-guru.css') }}">
@endpush


<div>
    <div id="modal-ctn">
        <h3 class="head-modal">Tambah Materi Pada Kelas <span>{{ $kelas->nama_kelas }}</span>
        </h3>
        <form action="{{route('subjects.store',$kelas->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="">Id Kelas</label>
            <input type="text" name="kelas_id" value="{{ $kelas->id }}">
            <label>Judul Materi</label>
            <input type="text" name="nama_materi" value="" placeholder="ubah judul materi">
            <label for="">nama Kelas</label>
            <select name="nama_kelas" id="" class="select-master-kelas">
                <option value="">{{$kelas->nama_kelas}}</option>
            </select>
            <label>Mata Pelajaran</label>
            <select name="lesson_id" class="select-master-kelas">
                @foreach ($kelas->lessons as $lesson )
                <option value="{{ $lesson->id }}" selected>{{ $lesson->nama_mapel }} </option>
                @endforeach
            </select>
            <input style="display:none;" type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
            <label>File</label>
            <input type="file" name="nama_file">
            <div class="btn-ctn-modal">
                <a href="{{ url()->previous() }}">Kembali</a>
                <button type="submit">Simpan</button>
            </div>

        </form>

    </div>
</div>
<script src="{{ asset(' assets/js/popup-modal.js') }}"></script>
@endsection