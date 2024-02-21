@extends('content.guru.manajemen-materi.manajemen-materi')
@section('content-materi')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
@endpush

<div id="modal-ctn">
    <h1 class="head-modal">Tambah Materi</h1>
    <form action="{{ route('subjects.store',$kelas) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <label>Judul Materi</label>
        <input type="text" name="nama_materi">
        <label>Nama Kelas</label>
        <select name="nama_kelas" id="" class="select-master-kelas">
            @foreach ($dataKelas as $kelas )
            <option value="">{{$kelas->nama_kelas}}</option>
            @endforeach
        </select>
        <label>Mata Pelajaran</label>
        @foreach ($data_kelas as $kelas )
        <select name="lesson_id" class="select-master-kelas">
            @foreach ($kelas->kelas as $item )
            @foreach ($item->lesson as $mapel)
            <option value="{{ $mapel->id }}" selected> {{ $mapel->nama_mapel }}</option>
            @endforeach
            @endforeach
        </select>
        @endforeach
        @foreach ($teacher as $item )

        @endforeach
        <label>File</label>
        <input type="file" name="nama_file" placeholder="isi judul materi">
        <div class="btn-ctn-modal">
            <a href="{{ URL::previous() }}">Tutup</a>
            <button type="submit">Simpan</button>
        </div>
    </form>

</div>

<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection