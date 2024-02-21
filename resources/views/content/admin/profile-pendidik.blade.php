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
        <h1>Profile Pendidik</h1>

    </div>
    <div class="profile-ctn">

    </div>
    <div id="modal">
        <div>
            @yield('content-materi')
        </div>
    </div>
</section>
@endsection