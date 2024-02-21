@extends('app-admin')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/admin/master-mapel.css') }}">

@endpush

<section class="container-section">
    <div class="card-explanation">
        <h1>menu master mapel </h1>
    </div>
</section>
<section class="sub-container-section">
    <div class="card-head-tabel">
        <h1>Daftar Master Mata Pelajaran</h1>
        <div class="container-link">
            <a class="btn-ctn" href="{{ route('MasterMapel.create') }}">
                <img class="icon-size" src="{{ asset('assets/img/add.png') }}" alt="">
                Tambah Data
            </a>

        </div>

    </div>
    <table>
        <thead>
            <tr>
                <th class="th-size-1">No</th>
                <th>Nama Mapel</th>
                <th class="th-size-2">Hapus</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lessons as $lesson)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="td-size-1">
                    {{ $lesson->nama_mapel }}
                </td>

                <td class="td-size-2">
                    <form action="{{ route('MasterMapel.destroy',$lesson) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="icon-crud-delete" type="submit">
                            <img class="icon-delete-size" src="{{ asset('assets/img/trash-can.png') }}" alt="">

                        </button>
                    </form>
                </td>
                @empty
            </tr>

            @endforelse

        </tbody>
    </table>
    {{ $lessons->links('pagination::bootstrap-5') }}
    <div id="modal">
        <div>
            @yield('content-materi')
        </div>
        <div>
            @yield('master-register')
        </div>
    </div>
</section>
</div>
@endsection