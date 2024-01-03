<x-mazer-layout title="Data Layanan" menu="layanan">
    <div class="page-heading">
        <x-mzheader
            judul="Layanan"
            deskripsi="Layanan Zelnara."
            halaman="Data Layanan">
        </x-mzheader>
        <section class="section">
            <div class="row">
                @forelse ($layanan as $item)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-content">
                                <img class="card-img-top img-fluid" src="{{ asset('img/sistem/'.$item->logo)}}" alt="Card image cap"/>
                                <div class="card-body">
                                    <h4 class="card-title">{{ $item->nama }}</h4>
                                    <p class="card-text text-muted">
                                       {{ $item->deskripsi}}
                                    </p>
                                    <a href="{{ url('member/layanan/'.$item->kode)}}" class="btn btn-primary btn-block">SELENGKAPNYA</a>
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