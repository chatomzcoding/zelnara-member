<x-mazer-layout title="Data {{ $layanan->nama}}" menu="superadmin-layanan">
    <div class="page-heading">
        <x-mzheader
            judul="{{ $layanan->nama}}"
            keterangan="Kelola dan managemen  {{ $layanan->nama}}."
            halaman="Detail Layanan">
        </x-mzheader>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Wedding Template
                </div>
                <div class="card-body">
                    <header>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i> Tambah Template</button>
                    </header>
                    <main>
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                        <th>Design</th>
                                        <th>Keterangan</th>
                                        <th>Demo</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($layanan->weddingtemplate as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('img/layanan/wedding/'.$item->gambar)}}" alt="" width="70px">
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->design }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                <a href="{{ url('zelnarawedding/weddingtemplate/'.Crypt::encryptString($item->id).'?s=demo')}}" target="_blank">Demo Link</a>
                                            </td>
                                            <td class="text-center">{{ $item->status }}</td>
                                            <td class="text-center">
                                                <button
                                                    class="btn btn-success btn-sm btn-icon"
                                                    data-bs-target="#edit"
                                                    data-bs-toggle="modal"
                                                    data-nama = "{{ $item->nama }}"
                                                    data-kode = "{{ $item->kode }}"
                                                    data-design = "{{ $item->design }}"
                                                    data-keterangan = "{{ $item->keterangan }}"
                                                    data-status = "{{ $item->status }}"
                                                    data-id ="{{ $item->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <form action="{{ url('zelnarawedding/weddingtemplate/'.$item->id)}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="9">belum ada data</td>
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
    <x-bsmodal id="tambah" kategori="tambah" link="zelnarawedding/weddingtemplate" judul="Tambah Template Wedding">
        <input type="hidden" name="layanan_id" value="{{ $layanan->id}}">
        <div class="mb-2">
            <label for="">Nama</label>
            <input type="text" name="nama" value="{{ old('nama')}}" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Design By</label>
            <input type="text" name="design" value="{{ old('design')}}" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Kode</label>
            <input type="text" name="kode" value="{{ old('kode')}}" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" value="{{ old('keterangan')}}" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Gambar Template</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
    </x-bsmodal>

    <x-bsmodal id="edit" kategori="edit" judul="Edit Template Wedding" link="zelnarawedding/weddingtemplate/id">
        <div class="mb-2">
            <label for="">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Design By</label>
            <input type="text" name="design" id="design" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Kode</label>
            <input type="text" name="kode" id="kode" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="aktif">AKTIF</option>
                <option value="tidak aktif">TIDAK AKTIF</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="">Gambar Template</label>
            <input type="file" name="gambar" class="form-control">
        </div>
    </x-bsmodal>

    <x-slot name="kodejs">
        <script>
            $('#edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama = button.data('nama')
                var kode = button.data('kode')
                var design = button.data('design')
                var keterangan = button.data('keterangan')
                var status = button.data('status')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #kode').val(kode);
                modal.find('.modal-body #design').val(design);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-mazer-layout>