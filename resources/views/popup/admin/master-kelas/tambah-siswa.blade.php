{{-- ! Proses Tambah Data Siswa Baru Pada Kelas yang dipilih --}}

@extends('content.admin.master-kelas')
@section('tambah-siswa')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">

<div>
    <div id="modal-ctn-tambah-siswa">
        <h1 class="head-modal">Tambah Siswa</h1>
        <form action="{{ route('store.tambah-siswa',$kelasId) }}" method="post">
            @csrf
            @method('post')

            <label>Pilih Kelas</label>
            <select class="select-master-kelas" name="kelas_id">
                <option value="{{ $kelasId->id }}" selected>{{ $kelasId->nama_kelas}}</option>
            </select>

            <label>Pilih Siswa</label>
            <select class="select-master-kelas" name="student_id" id="">
                @foreach ($students as $student)
                <option value="{{ $student->id }}" selected>{{ $student->nama }}</option>
                @endforeach
            </select>
            <div class="information">
                <p style="margin: 1rem 0;font-size:.8rem;">Tambah Siswa Yang Akan di masukkan ke dalam kelas</p>
            </div>
            <div class="btn-ctn-modal">
                <a href="{{ route('MasterKelas.index') }}">Tutup</a>
                <button type="submit">Simpan</button>
            </div>
        </form>

    </div>
</div>
<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection