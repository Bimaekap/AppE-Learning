@extends('content.guru.manajemen-bank-soal.manajemen-bank-soal-pilgan')
@section('content-bank-soal')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
@endpush

<div id="modal-ctn">
    <h1 class="head-modal">Pilih Kelas Dan Mapel</h1>
    <form action="{{ route('import-soal-pilgan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <label style="margin:.5rem 0rem">Pilih Mapel</label>
        <select name="lesson_id">
            @foreach ($teachers as $teacher)
            @foreach ($teacher->lessons as $item)
            <option value="{{ $item->id }}" selected>{{ $item->nama_lessons }}</option>
            @endforeach
            @endforeach
        </select>
        <label style="margin:.5rem 0rem">Pilih Kelas</label>
        <select name="kelas_id" id="">
            @foreach ($teachers as $teacher)
            @foreach ($teacher->kelas as $item)
            <option value="{{ $item->id }}" selected>{{ $item->kode_kelas }}</option>
            @endforeach
            @endforeach
        </select>
        <label>Upload File Excel</label>
        <input type="file" name="multiples" placeholder="isi judul materi">
        <div class="btn-ctn">
            <a href="{{ route('bank-soal-pilgan') }}">Tutup</a>
            <button type="submit">Simpan</button>
        </div>
        <div class="btn-ctn-modal">
            <a href="{{ route('bank-soal-pilgan') }}">Tutup</a>
            <button value="submit" type="submit">Simpan</button>
        </div>
    </form>

</div>

<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection