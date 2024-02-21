@extends('content.guru.manajemen-tugas.manajemen-tugas')
@section('content-materi')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
@endpush

<div id="modal-ctn-input-nilai">
    <h1 class="head-modal">Tambah Materi</h1>
    <form action="{{ route('penilaian.store', $evaluation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Beri Nilai</label>
        <input class="input-nilai" type="number" value="0" id="quantity" min="0" max="100" name="nilai">

        <div class="btn-ctn-modal">
            <a href="{{ URL::previous() }}">Tutup</a>
            <button type="submit">Simpan</button>
        </div>
    </form>

</div>

<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection