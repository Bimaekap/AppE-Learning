@extends('app-siswa')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/halaman-siswa/dashboard-siswa.css') }}">
@endpush
<section class="container-section">
    <div class="card-explanation">
        <h1>BERANDA</h1>
    </div>
</section>
<section class="sub-container-section" style="overflow:scroll; height:80h">

    <div class="container">
        @foreach ($dataTableSubject as $materiPerKelas )
        <div class="column item-1">
            <div class="flex-head-detail">
                <div class="head-card-detail">
                    <h2>Materi {{ $loop->iteration }}</h2>
                    <h1>{{ $materiPerKelas->nama_mapel_get }}</h1>
                </div>
                <div class="detail-class">
                    <h1>{{ $materiPerKelas->nama_kelas_get }}</h1>
                </div>
            </div>
            <div class="flex-footer-detail">
                <div class="footer-card-detail">
                    <h1>{{ $materiPerKelas->nama_guru }}</h1>
                </div>
                <div class="footer-class">
                    <div class="btn-ctn">
                        <a class="btn-unduh" href="{{ route('getFileMateri',$materiPerKelas->id) }}">Unduh
                            Materi</a>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
        @endforeach

        {{-- <div class="column item-2">

        </div>
        <div class="column item-3">
            <h1>Card</h1>
        </div> --}}
    </div>

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