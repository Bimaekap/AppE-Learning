@extends('content.admin.master-data-pendidik')
@section('content-materi')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
@endpush
<div id="modal-ctn">
    <h1 class="head-modal">Tentukan Mapel Guru</h1>
    <form action="" method="POST">
        @csrf
        @method('post')
        <label style="margin: .5rem 0">Pilih Guru</label>
        <select name=" teacher_id" class="select-ctn">

            <option value="" selected> </option>

        </select>
        <label style="margin: .5rem 0">Pilih Mapel</label>
        <select name=" lesson_id" class="select-ctn">

            <option value="" selected> </option>
        </select>
        <label style="margin: .5rem 0">Pilih Kelas</label>
        <select name="kelas_id" class="select-ctn">
            <option value="" selected> </option>
        </select>


        <div class="btn-ctn">
            <a href="{{route('data-pendidik')}}">Tutup</a>
            <button value="submit" type="submit">Submit</button>

        </div>

    </form>

</div>

<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection