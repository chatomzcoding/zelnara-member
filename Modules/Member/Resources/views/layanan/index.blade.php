<x-mazer-layout title="Data Layanan" menu="layanan">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Layanan</h3>
                    <p class="text-subtitle text-muted">Layanan Zelnara.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Layanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                @forelse ($layanan as $item)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-content">
                                <img class="card-img-top img-fluid" src="{{ asset('img/sistem/'.$item->logo)}}" alt="Card image cap"
                                    style="height: 20rem" />
                                <div class="card-body">
                                    <h4 class="card-title">{{ $item->nama }}</h4>
                                    <p class="card-text">
                                       {{ $item->deskripsi}}
                                    </p>
                                    {{-- <p class="card-text">
                                        Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin.
                                    </p> --}}
                                    <a href="{{ url('member/layanan/'.$item->kode)}}" class="btn btn-primary block">BUAT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    
                @endforelse
            </div>
        </section>
    </div>
</x-mazer-layout>