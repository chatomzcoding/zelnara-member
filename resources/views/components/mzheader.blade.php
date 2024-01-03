<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>{{ $judul }}</h3>
            <p class="text-subtitle text-muted">{{ $deskripsi}}</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Dashboard</a></li>
                    @foreach ($link as $url => $nama)
                        <li class="breadcrumb-item"><a href="{{ url($url)}}">{{$nama}}</a></li>
                    @endforeach
                    <li class="breadcrumb-item active" aria-current="page">{{$halaman}}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<x-notifikasi></x-notifikasi>