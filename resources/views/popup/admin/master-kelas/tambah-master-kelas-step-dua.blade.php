@extends('content.admin.master-kelas')
@section('content-materi')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
@endpush
@include('sweetalert::alert')

<div id="modal-ctn-step-dua">
    <h1 class="head-modal">Tentukan Mapel</h1>
    <form action="{{route('storeToKelasLesson',$kelas)}}" method="POST">
        @csrf
        @method('POST')
        <label style="margin-top:1rem;">Pilih Kelas</label>
        <select class="select-master-kelas" name="kelas_id">
            <option style="font-weight: 700;color:black" disabled>Pilih Kelas</option>
            @foreach ($kelas as $data )
            <option value="{{ $data->id }}">{{ $data->nama_kelas }}</option>
            @endforeach
        </select>
        <label style="margin-top:1rem;">Pilih Mapel</label>
        <select class="select-master-kelas" name="lesson_id">
            <option style="font-weight: 700;color:black" disabled>Pilih Mapel</option>
            @foreach ($mapels as $data)
            <option value="{{ $data->id }}">{{ $data->nama_mapel }}</option>
            @endforeach
        </select>
        <div class="btn-ctn-modal">
            <button type="submit">Simpan</button>
        </div>
    </form>
    <div class="information">

        <p>Tentukan Mata Pelajaran Sesuai Dengan Kelas Yang Akan Di Pilih</p>

    </div>
</div>

<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection