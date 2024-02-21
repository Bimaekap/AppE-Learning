@extends('content.guru.manajemen-materi.manajemen-materi')
@section('content-materi')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/guru/popup/data-kelas-guru.css') }}">
@endpush

<div id="modal-ctn-data-kelas-guru">
    <h1 class="head-modal">Daftar Kelas Yang Anda Ajar</h1>
    <table>
        <thead>
            <tr>
                <th class="th-size-1">No</th>
                <th class="th-size-2">Kelas</th>
                <th class="th-size-3">Mapel</th>
                <th class="th-size-small">Tambah Materi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataKelas as $kelas)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $kelas->nama_kelas }}
                </td>
                @foreach ($kelas->lessons as $lesson)
                <td>
                    {{ $lesson->nama_mapel}}
                </td>
                @endforeach
                <td>
                    <a class="icon-crud-master-data-kelas-guru" href="{{ route('subjects.edit',$kelas) }}">
                        <img class="icon-crud-size-data-kelas-guru" src="{{ asset('assets/img/edit-pen.png') }}" alt="">

                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
        <div class="btn-ctn-modal">
            <a href="{{ route('subjects.index')}}">Tutup</a>
        </div>
    </table>

</div>

<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection