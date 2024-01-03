<x-mazer-layout title="Data Layanan" menu="superadmin-layanan">
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
            <div class="card">
                <div class="card-body">
                    <header>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i> Tambah Layanan</button>
                    </header>
                    <main>
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Logo</th>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                        <th>Tagline</th>
                                        <th>Deskripsi</th>
                                        <th>Penggunaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($layanan as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('img/sistem/'.$item->logo)}}" alt="" width="70px">
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->tagline }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td class="text-center">
                                                @switch($item->kode)
                                                    @case('link')
                                                        {{ $item->linkmaster()->count()}} link
                                                        @break
                                                    @case('qodex')
                                                        {{ $item->qodexmaster()->count()}} Qodex
                                                        @break
                                                    @default
                                                        
                                                @endswitch

                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('member/layananlink/'.Crypt::encryptString($item->id))}}" class="btn btn-primary btn-sm btn-icon"><i class="bi bi-file-text"></i></a>
                                                <button
                                                    class="btn btn-success btn-sm btn-icon"
                                                    data-bs-target="#editlink"
                                                    data-bs-toggle="modal"
                                                    data-nama = "{{ $item->nama }}"
                                                    data-kode = "{{ $item->kode }}"
                                                    data-tagline = "{{ $item->tagline }}"
                                                    data-deskripsi = "{{ $item->deskripsi }}"
                                                    data-url = "{{ $item->url }}"
                                                    data-id ="{{ $item->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <form action="{{ url('superadmin/layanan/'.$item->id)}}" method="post" class="d-inline">
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
            <form action="{{ url('superadmin/layanan')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Tagline</label>
                        <input type="text" name="tagline" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Kode</label>
                        <input type="text" name="kode" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">url</label>
                        <input type="text" name="url" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Logo</label>
                        <input type="file" name="logo" class="form-control" required>
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
    <div class="modal" id="editlink" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ url('superadmin/layanan/id')}}" method="post">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-2">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Tagline</label>
                        <input type="text" name="tagline" id="tagline" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Kode</label>
                        <input type="text" name="kode" id="kode" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">url</label>
                        <input type="text" name="url" id="url" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Logo</label>
                        <input type="file" name="logo" class="form-control">
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
            $('#editlink').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama = button.data('nama')
                var kode = button.data('kode')
                var tagline = button.data('tagline')
                var deskripsi = button.data('deskripsi')
                var url = button.data('url')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #kode').val(kode);
                modal.find('.modal-body #tagline').val(tagline);
                modal.find('.modal-body #deskripsi').val(deskripsi);
                modal.find('.modal-body #url').val(url);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-mazer-layout>