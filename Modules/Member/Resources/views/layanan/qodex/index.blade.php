<x-mazer-layout title="Data Layanan" menu="layanan">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $layanan->nama }}</h3>
                    <p class="text-subtitle text-muted">Layanan {{ $layanan->link }}</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/member/layanan')}}">Layanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="visible-print text-center">
                {!! QrCode::size(200)->generate('https://link.zelnara.com/djuraganprestige'); !!}
                <p>Scan me to return to the original page.</p>
            </div>

            {!! QrCode::generate('Make me into a QrCode!'); !!}

        </section>
    </div>
</x-mazer-layout>