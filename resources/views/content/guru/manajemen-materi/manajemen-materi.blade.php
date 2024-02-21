@extends('app-guru')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/manajemen-materi.css') }}">
@endpush
<section class="container-section">
    <div class="card-explanation">
        <h1>Menu Manajemen Materi</h1>
    </div>
</section>
<section class="sub-container-section">
    <div class="card-head-tabel">
        <h1>Daftar Materi Yang Anda Upload</h1>
        <div class="container-link">
            <a class="btn-ctn" href="{{ route('show.data-kelas-guru') }}">
                <img class="img-icon-size-container-link" src="{{ asset('assets/img/add.png') }}" alt="">
                Tambah Data
            </a>

        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th class="th-size-1">No</th>
                <th class="th-size-2">Judul Materi</th>
                <th class="th-size-3">Mapel</th>
                <th class="th-size-small">File</th>
                <th class="th-size-small">Edit</th>
                <th class="th-size-small">Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTableSubjects as $items )

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $items->nama_materi}}</td>
                <td>{{ $items->nama_mapel_get}}</td>
                <td>
                    <a class="icon-crud-master file" href="{{ route('getFileMateri',$items->id) }}">
                        <img class="icon-crud-size-file" src="{{ asset('assets/img/google-docs.png') }}" alt="">
                        Lihat Materi
                    </a>
                </td>
                <td>
                    <a class="icon-crud-master" href="{{ route('edit-materi-after',$items->id) }}">
                        <img class="icon-crud-size" src="{{ asset('assets/img/edit-pen.png') }}" alt="">
                    </a>
                </td>
                <td>
                    <form action="{{ route('subjects.destroy',$items) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="icon-crud-master-delete" type="submit"> <img class=" icon-delete"
                                src="{{ asset('assets/img/trash-can.png') }}" alt="">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div id="modal">
        <div>
            @yield('content-materi')
        </div>
        <div>
            @yield('edit-materi')
        </div>
    </div>

</section>
@endsection