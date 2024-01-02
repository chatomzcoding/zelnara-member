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
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Url</th>
                                        <th>View</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user->member->linkmaster as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('img/layanan/link/'.$item->gambar)}}" alt="" width="70px">
                                            </td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                <a href="https://link.zelnara.com/{{ $item->url}}" target="_blank">{{ $item->getUrl()}}</a>
                                            </td>
                                            <td class="text-center">{{ $item->view }}</td>
                                            <td class="text-center">
                                                <button
                                                    class="btn btn-success btn-sm btn-icon"
                                                    data-bs-target="#editlink"
                                                    data-bs-toggle="modal"
                                                    data-judul = "{{ $item->judul }}"
                                                    data-deskripsi = "{{ $item->deskripsi }}"
                                                    data-tema = "{{ $item->tema }}"
                                                    data-url = "{{ $item->url }}"
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
                        <select name="tema" id="" class="form-select">
                            <option value="">-- Pilih Tema --</option>
                            @foreach ($tema as $item)
                                <option value="{{ $item->keterangan}}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
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
    <div class="modal" id="editlink" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ url('zelnaralink/linkmaster/id')}}" method="post">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-2">
                        <label for="">Judul Link</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Tema</label>
                        <select name="tema" id="tema" class="form-select">
                            @foreach ($tema as $item)
                                <option value="{{ $item->keterangan}}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">url</label>
                        <input type="text" name="url" id="url" class="form-control" required>
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
            $('#editlink').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var judul = button.data('judul')
                var deskripsi = button.data('deskripsi')
                var url = button.data('url')
                var tema = button.data('tema')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #judul').val(judul);
                modal.find('.modal-body #deskripsi').val(deskripsi);
                modal.find('.modal-body #url').val(url);
                modal.find('.modal-body #tema').val(tema);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-mazer-layout>