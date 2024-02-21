@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
@endpush
<nav>
    <div id="profile">
        <div>
            <h1 href="">{{ auth()->user()->nama }}</h1>
            <h1> <span style="font-weight: 400;font-size:.6rem">status :</span>
                {{ auth()->user()->role }}</h1>
        </div>
        <div class="ctn-profile">
            <img class="img-sizing" src="{{ url('storage/profiles/'.auth()->user()->foto) }}" alt="">
        </div>
    </div>
    <div class="setting-ctn" style="width: fit-content; height:fit-content;">

        <a class="btn-keluar" href="{{ route('keluar') }}">Keluar</a>
    </div>
    <hr class="line-nav">
</nav>