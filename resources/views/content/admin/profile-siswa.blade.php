@extends('app-admin')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/admin/master-data-pendidik.css') }}">
@endpush
<section class="container-section">
    <div class="card-explanation">
        <h1>Menu Profile</h1>
    </div>
</section>
<section class="sub-container-section">
    <div class="card-head-tabel">
        <h1>Profile Siswa</h1>

    </div>
    <div class="profile-ctn">
        <form action="" class="form">
            <div class="img-ctn">
            </div>
            <input type="file">
            <h1>Nama :</h1>
            <input class="profile-input-style" type="text">
            <h1>Status :</h1>
            <input class="profile-input-style" type="text">

        </form>
    </div>
    <div>
        <a class="btn-back-from-profile" href="{{ URL::previous() }}">Kembali</a>
    </div>
    <div id="modal">
        <div>
            @yield('content-materi')
        </div>
    </div>
</section>
@endsection