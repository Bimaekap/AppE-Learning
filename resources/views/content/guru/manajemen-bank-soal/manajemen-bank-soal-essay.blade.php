@extends('app-guru')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/manajemen-bank-soal.css') }}">
@endpush
<div class="container-section">
    <div class="card-explanation">
        <h1>menu manajemen bank soal</h1>
    </div>
</div>
<section class="sub-container-section">
    <div class="card-head-tabel">
        <h1>Soal essay yang anda buat</h1>
        <div class="a-tag-tabel-bank-soal-ctn">
            <a class="btn-add-soal" href="{{ route('create.bankSoalEssay') }}">
                <img class="icon-crud-guru-size" src="{{ asset('assets/img/add.png') }}" alt="">
                Add Soal
            </a>
            <a class="btn-upload-excel" href="{{ route('upload-bank-soal-essay') }}">
                <img class="icon-crud-guru-size" src="{{ asset('assets/img/upload.png') }}" alt="">
                Upload Excel
            </a>
            <a class="btn-contoh-excel" href="#">
                <img class="icon-crud-guru-size" src="{{ asset('assets/img/excel.png') }}" alt="">
                Contoh Excel
            </a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th class="no-th">No</th>
                <th class="soal-th">Soal</th>
                <th>Mapel</th>
                <th>Edit</th>
                <th>Hapus </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>X TKJ</td>
                <td>Jaringan Komputer</td>
                <td>
                    <a class="icon-crud-master" href="">
                        <img class="icon-crud-master-size-bank-soal" src="{{ asset('assets/img/edit-pen.png') }}"
                            alt="">
                        edit
                    </a>
                </td>
                <td>
                    <a class="icon-crud-master-delete" href="">
                        <img class="icon-crud-master-size-bank-soal icon-delete"
                            src="{{ asset('assets/img/trash-can.png') }}" alt="">
                        hapus
                    </a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>X TKJ</td>
                <td>Jaringan Komputer</td>
                <td>
                    <a class="icon-crud-master" href="">
                        <img class="icon-crud-master-size-bank-soal" src="{{ asset('assets/img/edit-pen.png') }}"
                            alt="">
                        edit
                    </a>
                </td>
                <td>
                    <a class="icon-crud-master-delete" href="">
                        <img class="icon-crud-master-size-bank-soal icon-delete"
                            src="{{ asset('assets/img/trash-can.png') }}" alt="">
                        hapus
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <div id="modal">
        <div>
            @yield('content-bank-soal')
        </div>
        <div>
            @yield('edit-materi-bank-soal')
        </div>
    </div>
</section>
@endsection