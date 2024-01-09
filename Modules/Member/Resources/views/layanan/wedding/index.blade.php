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
            <div class="card">
                <div class="card-body">
                    <header>
                        <a href="{{ url('member/layanan')}}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i> Tambah Wedding</button>
                    </header>
                    <main>
                        <div class="row mt-2">
                            @foreach ($user->member->wedding as $item)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-content">
                                        <img class="card-img-top img-fluid" src="{{ asset('img/layanan/wedding/'.$item->photo)}}" alt="Card image cap"/>
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $item->nama }}</h4>
                                            <p class="card-text text-muted">
                                            {{ $item->tempat_pernikahan}} <br>
                                            {{ date_indo($item->tanggal_pernikahan)}}
                                            </p>

                                            {{-- <a href="{{ url('member/layanan/'.$item->kode)}}" class="btn btn-primary">SELENGKAPNYA</a> --}}
                                        </div>
                                        <div class="card-footer">
                                            <x-aksi :id="$item->id" link="zelnarawedding/wedding" :detail="'member/layananwedding/'.Crypt::encryptString($item->id)">
                                                <a href="https://wedding.zelnara.com/{{ $item->link}}" target="_blank" class="btn btn-info btn-sm"><i class="bi-send"></i></a>
                                            </x-aksi>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </main>
                </div>
            </div>
        </section>
    </div>
    <x-bsmodal id="tambah" kategori="tambah" judul="Tambah Wedding" link="zelnarawedding/wedding">
        <input type="hidden" name="member_id" value="{{ $user->member->id}}">
        <input type="hidden" name="layanan_id" value="{{ $layanan->id}}">
        <div class="mb-2">
            <label for="">Nama Pernikahan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Link Pernikahan</label>
            <input type="text" name="link" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Tempat Pernikahan</label>
            <input type="text" name="tempat_pernikahan" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Alamat Pernikahan</label>
            <input type="text" name="alamat_pernikahan" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Tanggal Pernikahan</label>
            <input type="date" name="tanggal_pernikahan" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Template</label>
            <select name="weddingtemplate_id" id="" class="form-select" required>
                <option value="">-- Pilih Template --</option>
                @foreach ($template as $item)
                    <option value="{{ $item->id}}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label for="">Gambar</label>
            <input type="file" name="photo" class="form-control">
        </div>
    </x-bsmodal>
</x-mazer-layout>