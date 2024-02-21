@extends('app-admin')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/admin/master-kelas.css') }}">
@endpush
@include('sweetalert::alert')
<section class="container-section">
    <div class="card-explanation">
        <h1>menu master kelas</h1>
    </div>
</section>
<section class="sub-container-section">
    <div class="card-head-tabel">
        <h1>Daftar Master Kelas</h1>
        <div class="container-link">
            <a class="btn-ctn" href="{{ route('MasterKelas.create') }}">
                <img class="icon-size" src="{{ asset('assets/img/add.png') }}" alt="">
                Tambah Data
            </a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th class="th-size-1">No</th>
                <th class="th-size-2">Guru</th>
                <th class="th-size-3">Kode Kelas</th>
                <th class="th-size-4">Nama Kelas</th>
                <th class="th-size-7">Nama Mapel</th>
                <th class="th-size-5">Tambah Siswa</th>
                <th class="th-size-6 ">Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $items)
            <tr>
                <td>{{ $loop->iteration }}</td>
                @foreach ($items->teachers as $teacher )
                <td>{{ $teacher->nama}}</td>
                @endforeach
                <td>

                    <p class="bg-text"> {{ $items->kode_kelas }} </p>
                    </p>

                </td>
                <td>

                    <p class="bg-text"> {{ $items->nama_kelas }}
                    </p>

                </td>
                @foreach ($items->lessons as $lesson )
                <td>{{ $lesson->nama_mapel}}</td>
                @endforeach
                <td>
                    <div style="margin: 1rem 0" class="ctn-link-tambah-siswa">
                        <a class="icon-crud" href="{{ route('show.tambah-siswa',$items) }}">
                            <img class="icon-crud-size" src="{{ asset('assets/img/edit-pen.png') }}" alt="">
                            tambah siswa
                        </a>
                    </div>
                </td>
                <td>
                    <form action="{{ route('MasterKelas.destroy',$items) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="icon-crud-delete" type="submit">
                            <img class="icon-crud-size-delete" src="{{ asset('assets/img/trash-can.png') }}" alt="">
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $kelas->links('pagination::bootstrap-5') }}

    <div id="modal">
        <div>
            @yield('content-materi')
        </div>
        <div>
            @yield('tambah-siswa')
        </div>
    </div>
</section>
@endsection