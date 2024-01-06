<x-mazer-layout title="Data Layanan" menu="layanan">
    <div class="page-heading">
        <x-mzheader
            judul="{{ $layanan->nama }}"
            deskripsi="Layanan {{ $layanan->link }}"
            :link="['/member/layanan' => 'Layanan']"
            halaman="detail">
        </x-mzheader>
        
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <header>
                        <a href="{{ url('member/layanan')}}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahlink"><i class="bi bi-plus-circle"></i> Tambah Link</button>
                    </header>
                    <main>
                        <div class="table-responsive mt-3">
                            <table class="table table-datatables">
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
                                                <x-aksi :id="$item->id" link="zelnaralink/linkmaster" :detail="'member/layananlink/'.Crypt::encryptString($item->id)">
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
                                                </x-aksi>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="7">belum ada data</td>
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
    <x-bsmodal id="tambahlink" kategori="tambah" judul="Tambah Link" link="zelnaralink/linkmaster">
        <input type="hidden" name="member_id" value="{{ $user->member->id}}">
        <input type="hidden" name="layanan_id" value="{{ $layanan->id}}">
        <div class="mb-2">
            <label for="">Judul Link</label>
            <input type="text" name="judul" value="{{ old('judul')}}" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Deskripsi</label>
            <input type="text" name="deskripsi" value="{{ old('deskripsi')}}" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Tema</label>
            <select name="tema" id="" class="form-select">
                <option value="">-- Pilih Tema --</option>
                @foreach ($tema as $item)
                    <option value="{{ $item->keterangan}}" @if (old('tema') == $item->keterangan)
                        selected
                    @endif>{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label for="">url</label>
            <input type="text" name="url"  value="{{ old('url')}}" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
    </x-bsmodal>

    <x-bsmodal id="editlink" kategori="edit" judul="Edit Link" link="zelnaralink/linkmaster/id">
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
            <input type="text" name="url" id="url" class="form-control" readonly>
        </div>
        <div class="mb-2">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
    </x-bsmodal>

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