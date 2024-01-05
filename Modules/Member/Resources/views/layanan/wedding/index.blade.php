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
                        <div class="row">
                            @foreach ($user->member->wedding as $item)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-content">
                                        <img class="card-img-top img-fluid" src="{{ asset('img/layanan/wedding/'.$item->photo)}}" alt="Card image cap"/>
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $item->tanggal_pernikahan }}</h4>
                                            <p class="card-text text-muted">
                                            {{ $item->tempat_pernikahan}}
                                            </p>
                                            {{-- <a href="{{ url('member/layanan/'.$item->kode)}}" class="btn btn-primary btn-block">SELENGKAPNYA</a> --}}
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
    
    <x-bsmodal id="edit" kategori="edit" judul="Edit Qodex" link="layanan/qodexmaster/id'">
        <div class="mb-2">
            <label for="">Nama Qodex</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Kategori</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option value="qrcode">Qr Code</option>
                <option value="barcode">Barcode</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="">isi Qodex</label>
            <input type="text" name="isi" id="isi" class="form-control" maxlength="225" required>
        </div>
        <div class="mb-2">
            <label for="">Kode</label>
            <input type="text" name="kode" id="kode" class="form-control" maxlength="225">
        </div>
        <div class="mb-2">
            <label for="">Ukuran</label>
            <input type="number" name="ukuran" id="ukuran" min="1" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
    </x-bsmodal>

    <x-slot name="kodejs">
        <script>
            $('#edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama = button.data('nama')
                var keterangan = button.data('keterangan')
                var kode = button.data('kode')
                var ukuran = button.data('ukuran')
                var isi = button.data('isi')
                var kategori = button.data('kategori')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #kode').val(kode);
                modal.find('.modal-body #ukuran').val(ukuran);
                modal.find('.modal-body #isi').val(isi);
                modal.find('.modal-body #kategori').val(kategori);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-mazer-layout>