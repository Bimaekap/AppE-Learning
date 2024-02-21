@extends('app-siswa')
@section('content')
<section class="cpanel-pilihan-materi-siswa">
    <div class="pilihan-materi-siswa-ctn">
        <h1> materi </h1>
    </div>
    <div class="sub--ctn">

        <h1>Mata Pelajaran <span>:</span> {{ $id->nama_mapel_get }}</h1>
        <h1>Guru Pengajar <span>:</span> {{ $id->nama_guru }}</h1>

        <a class="btn-back-sub--ctn" href="{{ route('materi-siswa') }}">Kembali</a>
    </div>
    <section class="tabel-data-pilihan-materi-siswa">
        <div class="header-tabel-data-pilihan-materi-siswa">
            <h1>Pilih Materi Sesuai Mata Pelajaran</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th class="th-no">No</th>
                    <th class="th-judul">Judul Materi</th>
                    <th class="th-unduh">Unduh Materi</th>
                    <th class="th-upload">Kumpul Tugas</th>
                    <th class="th-tugas">Tugas</th>
                    <th class="th-status">Status</th>
                </tr>
            </thead>
            <tbody>

                <tr>

                    <td>1</td>
                    <td>{{ $id->nama_materi }}</td>
                    <td class="td=-file">
                        <a class="icon-crud-master-file" href="{{ route('getFileMateri',$id->id) }}">
                            <img class="icon-crud-size-file" src="{{ asset('assets/img/google-docs.png') }}" alt="">
                            Lihat Materi
                        </a>
                    </td>
                    <td>
                        <form style="display: flex;" action="{{ route('store.pilihan-materi') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            @if ($isHasTugas === null)
                            <input type="file" name="file_tugas" style="width:14vw;">
                            <button class="btn-kirim">Kirim</button>


                            {{-- data tambahan saja --}}
                            <input type="text" style="display: none" name="nama_tugas" value="{{ $id->nama_materi }}">
                            <input type="text" style="display: none" name="subject_id" value="{{ $id->id }}">
                            <input type="text" style="display: none" name="kelas_id" value="{{ $id->kelas_id }}">
                            <input type="text" style="display: none" name="nama_mapel"
                                value="{{ $id->nama_mapel_get }}">
                        </form>
                        @else
                        <a class="btn-ubah" href="{{ route('delete.data-tugas', $id) }}" method="post">
                            Ubah
                        </a>
                        @endif

                    </td>
                    <td class="td=-file">
                        <a class="icon-crud-master-file" href="{{ route('getFileTugas',$id->id) }}">
                            <img class="icon-crud-size-file-pilihan" src="{{ asset('assets/img/google-docs.png') }}"
                                alt="">
                            Lihat Tugas
                        </a>
                    </td>
                    @if ($isHasTugas === null)
                    <td>
                        <p class="info-belum-selesai">Belum Selesai</p>
                    </td>
                    @else
                    <td>
                        <p class="info-sudah-selesai">Sudah Selesai</p>
                    </td>
                    @endif

                </tr>
            </tbody>
        </table>

    </section>
</section>
@endsection