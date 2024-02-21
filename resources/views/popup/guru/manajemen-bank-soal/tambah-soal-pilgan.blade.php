@extends('content.guru.manajemen-bank-soal.manajemen-bank-soal-pilgan')
@section('edit-materi-bank-soal')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
@endpush
<div id="modal-ctn" style="height:90vh; top:-10%;">
    <h1 class="head-modal">Tambahkan ke Bank Soal Piligan Ganda</h1>
    <form action="" method="post">
        <label>Mata Pelajan</label>
        <input type="text" placeholder="isi mata pelajaran">
        <label>Pertanyaan</label>
        <textarea name="textarea" id="default"></textarea>
        <label>Jawaban A</label>
        <textarea name="textarea" id="default"></textarea>
        <label>Jawaban B</label>
        <textarea name="textarea" id="default"></textarea>
        <label>Jawaban C</label>
        <textarea name="textarea" id="default"></textarea>
        <label>Jawaban D</label>
        <textarea name="textarea" id="default"></textarea>
        <label>Jawaban E</label>
        <textarea name="textarea" id="default"></textarea>
        <input type="submit" value="submit">
        <div class="flex-checkbox">
            <label>Kunci Jawaban</label>
            <input type="checkbox" name="check" onclick="onlyOne(this)"> A
            <input type="checkbox" name="check" onclick="onlyOne(this)"> B
            <input type="checkbox" name="check" onclick="onlyOne(this)"> C
            <input type="checkbox" name="check" onclick="onlyOne(this)"> D
            <input type="checkbox" name="check" onclick="onlyOne(this)"> E
        </div>
    </form>
    <div class="btn-ctn-modal">
        <a href="{{ URL::previous() }}">Tutup</a>
        <button type="submit">Simpan</button>
    </div>
</div>

<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection