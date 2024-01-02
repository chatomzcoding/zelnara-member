<x-mazer-layout title="Zelnara Link" menu="layanan">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Zelnara Link</h3>
                    <p class="text-subtitle text-muted">Detail Link {{ $linkmaster->judul}}.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/member/layanan')}}">Layanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Link</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Link - {{ $linkmaster->judul}}
                </div>
                <div class="card-body">
                    <header>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i> Tambah Link Button</button>
                    </header>
                    <main>
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Icon</th>
                                        <th>nama link</th>
                                        <th>Url</th>
                                        <th>Jumlah Klik</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($linkmaster->linkmasterbutton as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{!! $item->icon !!}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                <a href="{{ $item->url }}" target="_blank">
                                                    {{ $item->url }}
                                                </a>
                                            </td>
                                            <td class="text-center">{{ $item->jumlah_klik }}</td>
                                            <td class="text-center">
                                                <button
                                                    class="btn btn-success btn-sm btn-icon"
                                                    data-bs-target="#edit"
                                                    data-bs-toggle="modal"
                                                    data-nama = "{{ $item->nama }}"
                                                    data-icon = "{{ $item->icon }}"
                                                    data-url = "{{ $item->url }}"
                                                    data-id ="{{ $item->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <form action="{{ url('zelnaralink/linkmasterbutton/'.$item->id)}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="6">belum ada data</td>
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
            <form action="{{ url('zelnaralink/linkmasterbutton')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="linkmaster_id" value="{{ $linkmaster->id}}">
                <input type="hidden" name="jumlah_klik" value="0">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="">Nama Button</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Icon Link</label>
                        <select name="icon" id="" class="form-select">
                            <option value="">-- Pilih Icon --</option>
                            @foreach ($icon as $item)
                                <option value="{{ $item->keterangan}}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">url</label>
                        <input type="text" name="url" class="form-control" required>
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
            <form action="{{ url('zelnaralink/linkmasterbutton/id')}}" method="post">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Link Button</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-2">
                        <label for="">Nama Button</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Icon Link</label>
                        <select name="icon" id="icon" class="form-select">
                            <option value="">-- Pilih Icon --</option>
                            @foreach ($icon as $item)
                                <option value="{{ $item->keterangan}}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">url</label>
                        <input type="text" name="url" id="url" class="form-control" required>
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
                var icon = button.data('icon')
                var url = button.data('url')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #icon').val(icon);
                modal.find('.modal-body #url').val(url);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-mazer-layout>