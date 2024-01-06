<x-mazer-layout title="Data Info" menu="kategori">
    <div class="page-heading">
        <x-mzheader
            judul="Kategori"
            deskripsi="Kelola dan Manajemen Kategori."
            halaman="Daftar Kategori">
        </x-mzheader>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i> TAMBAH</button>
                </div>
                <div class="card-body">
                    <section>
                        <form action="" method="get">
                            <input type="hidden" name="s" value="label">
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="label" id="" class="form-select" onchange="this.form.submit()" required>
                                        <option value="semua">-- SEMUA --</option>
                                        @foreach (data_label() as $item)
                                            <option value="{{ $item}}" @if ($label == $item)
                                                selected
                                            @endif>{{ $item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </section>
                    <div class="table-responsive mt-3">
                        <table class="table table-datatables">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Label</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->label }}</td>
                                        <td>
                                            @switch($item->label)
                                                @case('link-icon')
                                                    Icon {!! $item->keterangan !!}
                                                    @break
                                                @case('link-tema')
                                                    <div class="text-center" style="background: {{ $item->keterangan}}">
                                                        {{ $item->nama}}
                                                    </div>
                                                    @break
                                                @default
                                                    {{ $item->keterangan }}
                                            @endswitch
                                        </td>
                                        <td class="text-center">
                                            <x-aksi :id="$item->id" link="superadmin/kategori">
                                                <button
                                                    class="btn btn-success btn-sm btn-icon"
                                                    data-bs-target="#edit"
                                                    data-bs-toggle="modal"
                                                    data-nama = "{{ $item->nama }}"
                                                    data-label="{{ $item->label }}"
                                                    data-keterangan="{{ $item->keterangan }}"
                                                    data-id ="{{ $item->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            </x-aksi>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="5">belum ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </section>
    </div>

    <x-bsmodal id="tambah" kategori="tambah" judul="Tambah Kategori" link="superadmin/kategori">
        <div class="mb-2">
            <label for="">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Label Kategori</label>
            <select name="label" id="" class="form-select" required>
                <option value="">-- pilih label --</option>
                @foreach (data_label() as $item)
                    <option value="{{ $item}}">{{ $item}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label for="">Keterangan</label>
            <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
    </x-bsmodal>

    <x-bsmodal id="edit" kategori="edit" judul="Edit Kategori" link="superadmin/kategori/id">
        <div class="mb-2">
            <label for="">Nama Kategori</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Label Kategori</label>
            <select name="label" id="label" class="form-select" required>
                <option value="">-- pilih label --</option>
                @foreach (data_label() as $item)
                    <option value="{{ $item}}">{{ $item}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label for="">Keterangan</label>
            <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"></textarea>
        </div>
    </x-bsmodal>

    <x-slot name="kodejs">
        <script>
            $('#edit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama = button.data('nama')
                var label = button.data('label')
                var keterangan = button.data('keterangan')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #label').val(label);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-mazer-layout>