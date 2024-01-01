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
            <div class="card">
                <div class="card-header">
                    Zelnara Link
                </div>
                <div class="card-body">
                    <header>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahlink"><i class="bi bi-plus-circle"></i> Tambah Link</button>
                    </header>
                    <main>
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Url</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user->member->linkmaster as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                <a href="https://link.zelnara.com/{{ $item->url}}" target="_blank">{{ $item->getUrl()}}</a>
                                            </td>
                                            <td>
                                                <img src="{{ asset('img/layanan/link/'.$item->gambar)}}" alt="" width="100px">
                                            </td>
                                            <td class="text-center">
                                                <button
                                                    class="btn btn-success btn-sm btn-icon"
                                                    data-bs-target="#edit"
                                                    data-bs-toggle="modal"
                                                    data-nama = "{{ $item->nama }}"
                                                    data-id ="{{ $item->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <form action="{{ url('zelnaralink/linkmaster/'.$item->id)}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="4">belum ada data</td>
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
    <div class="modal" id="tambahlink" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ url('zelnaralink/linkmaster')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="member_id" value="{{ $user->member->id}}">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="">Judul Link</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Tema</label>
                        <input type="color" name="tema" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">url</label>
                        <input type="text" name="url" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
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
</x-mazer-layout>