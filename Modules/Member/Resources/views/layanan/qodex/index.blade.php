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
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i> Tambah Qodex</button>
                    </header>
                    <main>
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>isi</th>
                                        <th>Kategori</th>
                                        <th>Keterangan</th>
                                        <th>Qodex</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user->member->qodexmaster as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                @if (!is_null($item->gambar))
                                                    <img src="{{ asset('img/layanan/qodex/'.$item->gambar)}}" alt=""     width="70px">
                                                @endif
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->isi }}</td>
                                            <td>{{ $item->kategori }}</td>
                                            <td>
                                                {{ $item->keterangan }}
                                                @if (!is_null($item->ukuran))
                                                    <br> Ukuran : {{ $item->ukuran}}
                                                @endif
                                                @if (!is_null($item->kode))
                                                    <br> Kode : {{ $item->kode}}
                                                @endif
                                            </td>
                                            <td>
                                                @if (!is_null($item->gambar))
                                                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size($item->getUkuran())->merge('/public/img/layanan/qrcode/'.$item->gambar)->generate($item->isi)) !!}">
                                                @else
                                                    {!! QrCode::size($item->getUkuran())->generate($item->isi); !!}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button
                                                    class="btn btn-success btn-sm btn-icon"
                                                    data-bs-target="#edit"
                                                    data-bs-toggle="modal"
                                                    data-nama = "{{ $item->nama }}"
                                                    data-keterangan = "{{ $item->keterangan }}"
                                                    data-kategori = "{{ $item->kategori }}"
                                                    data-kode = "{{ $item->kode }}"
                                                    data-ukuran = "{{ $item->ukuran }}"
                                                    data-isi = "{{ $item->isi }}"
                                                    data-id ="{{ $item->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <form action="{{ url('layanan/qodexmaster/'.$item->id)}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="8">belum ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </main>
                </div>
            </div>
        </section>
    </div>
    <div class="modal" id="tambah" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ url('layanan/qodexmaster')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="member_id" value="{{ $user->member->id}}">
                <input type="hidden" name="layanan_id" value="{{ $layanan->id}}">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Qodex</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="">Nama Qodex</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="">Kategori</label>
                        <select name="kategori" id="" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="qrcode">Qr Code</option>
                            <option value="barcode">Barcode</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">isi Qodex</label>
                        <input type="text" name="isi" class="form-control" maxlength="225" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Kode</label>
                        <input type="text" name="kode" class="form-control" maxlength="225">
                    </div>
                    <div class="mb-2">
                        <label for="">Ukuran</label>
                        <input type="number" name="ukuran" min="1" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    <div class="modal" id="edit" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ url('layanan/qodexmaster/id')}}" method="post">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Qodex</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">SIMPAN PERUBAHAN</button>
                </div>
            </form>
          </div>
        </div>
    </div>

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