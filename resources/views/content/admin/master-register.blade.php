@extends('app-admin')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/layouts/admin/master-data-pendidik.css') }}">
    @endpush
    <section class="container-section">
        <div class="card-explanation">
            <h1>Menu Daftar Akun Pengguna</h1>
        </div>
    </section>
    <section class="sub-container-section">
        <div class="card-head-tabel">
            <h1>Register Pengguna</h1>
            <div class="a-tag-tabel-bank-soal-ctn-master">
                <a class="btn-contoh-excel" href="">
                    <img class="icon-master-data-pendidik" src="{{ asset('assets/img/excel.png') }}" alt="">
                    Register Akun Pengguna
                </a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Bima</td>
                    <td>Admin</td>
                    <td>
                        <a class="icon-crud-master" href="">
                            <img class="icon-crud-master-size" src="{{ asset('assets/img/eye.png') }}" alt="">
                            view
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="modal">
            <div>
                @yield('content-materi')
            </div>
        </div>
    </section>
@endsection
