@extends('app-guru')
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
        <form action="{{ route('store.profile',$user) }}" class="form" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="img-ctn">
            </div>
            <input type="file" name="foto_profil">
            <input style="display:none;" class="profile-input-style" type="text" name="nama"
                value="{{ auth()->user()->nama }}">
            <input style="display:none;" type="text" name="role" value="guru" readonly>

            <button type="submit" class="btn-simpan">Simpan Foto</button>
        </form>
    </div>
    <div>
        <a class="btn-back-from-profile" href="{{ route('dashboard.guru') }}">Kembali</a>
    </div>
    <div id="modal">
        <div>
            @yield('content-materi')
        </div>
    </div>
</section>
@endsection