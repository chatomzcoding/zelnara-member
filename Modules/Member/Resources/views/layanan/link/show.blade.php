<x-mazer-layout title="Zelnara Link" menu="layanan">
    <div class="page-heading">
        <x-mzheader 
            judul="{{ $linkmaster->layanan->nama}}"
            deskripsi="Detail Link {{ $linkmaster->judul}}"
            :link="[
                '/member/layanan' => 'Layanan',
                '/member/layanan/'.$linkmaster->layanan->kode => $linkmaster->layanan->nama
            ]"
            halaman="Detail Link"
        >
    
        </x-mzheader>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Informasi Kontak
                </div>
                <div class="card-body">
                    <form action="{{ url('zelnaralink/linkmaster/id')}}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id" value="{{ $linkmaster->id}}">
                        <input type="hidden" name="s" value="kontak">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="">No Telepon</label>
                                    <input type="text" name="no_telp" value="{{ $linkmaster->no_telp}}" class="form-control" maxlength="20">
                                </div>
                                <div class="mb-2">
                                    <label for="">No Whatsapp</label>
                                    <input type="text" name="no_wa" value="{{ $linkmaster->no_wa}}" class="form-control" maxlength="20">
                                </div>
                                <div class="mb-2">
                                    <label for="">No Faksimili</label>
                                    <input type="text" name="no_faks" value="{{ $linkmaster->no_faks}}" class="form-control" maxlength="20">
                                </div>
                                <div class="mb-2">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="{{ $linkmaster->email}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="">Jam Kerja</label>
                                    <input type="text" name="jam_kerja" value="{{ $linkmaster->jam_kerja}}" class="form-control" maxlength="20">
                                </div>
                                <div class="mb-2">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $linkmaster->alamat}}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label for="">Situs Web</label>
                                    <input type="text" name="situs_web" value="{{ $linkmaster->situs_web}}" class="form-control">
                                </div>
                                <div class="mb-2 text-end">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> SIMPAN PERUBAHAN</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">
                    Button Link
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
            <div class="card mt-2">
                <div class="card-header">
                    Katalog
                </div>
                <div class="card-body">
                    <header>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahkatalog"><i class="bi bi-plus-circle"></i> Tambah Katalog</button>
                    </header>
                    <main>
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">Gambar</th>
                                        <th>nama</th>
                                        <th>Deskripsi</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($linkmaster->linkmasterkatalog as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('img/layanan/link/'.$item->gambar)}}" alt="" width="100%">
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                @if (!is_null($item->tagline))
                                                    Tagline : 
                                                    {{ $item->tagline }}
                                                @endif
                                                @if (!is_null($item->harga))
                                                <br> Harga : {{ norupiah($item->harga) }} <br>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button
                                                    class="btn btn-success btn-sm btn-icon"
                                                    data-bs-target="#editkatalog"
                                                    data-bs-toggle="modal"
                                                    data-nama = "{{ $item->nama }}"
                                                    data-deskripsi = "{{ $item->deskripsi }}"
                                                    data-tagline = "{{ $item->tagline }}"
                                                    data-harga = "{{ $item->harga }}"
                                                    data-id ="{{ $item->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <form action="{{ url('zelnaralink/linkmasterkatalog/'.$item->id)}}" method="post" class="d-inline">
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
    <x-bsmodal id="tambah" kategori="tambah" judul="Tambah Link" link="zelnaralink/linkmasterbutton">
        <input type="hidden" name="linkmaster_id" value="{{ $linkmaster->id}}">
        <input type="hidden" name="jumlah_klik" value="0">
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
    </x-bsmodal>
    <x-bsmodal id="tambahkatalog" kategori="tambah" judul="Tambah Katalog" link="zelnaralink/linkmasterkatalog">
        <input type="hidden" name="linkmaster_id" value="{{ $linkmaster->id}}">
        <div class="mb-2">
            <label for="">Nama Katalog</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Tagline/Promo (max 20 huruf)</label>
            <input type="text" name="tagline" class="form-control" maxlength="20">
        </div>
        <div class="mb-2">
            <label for="">Harga</label>
            <input type="text" name="harga" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" id="" cols="30" rows="4" class="form-control" required></textarea>
        </div>
        <div class="mb-2">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
    </x-bsmodal>
    <x-bsmodal id="edit" kategori="edit" judul="Edit Link Button" link="zelnaralink/linkmasterbutton/id">
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
    </x-bsmodal> 
    <x-bsmodal id="editkatalog" kategori="edit" judul="Edit Katalog" link="zelnaralink/linkmasterkatalog/id">
        <div class="mb-2">
            <label for="">Nama Katalog</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Tagline/Promo (max 20 huruf)</label>
            <input type="text" name="tagline" id="tagline" class="form-control" maxlength="20">
        </div>
        <div class="mb-2">
            <label for="">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="4" class="form-control" required></textarea>
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
                var icon = button.data('icon')
                var url = button.data('url')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #icon').val(icon);
                modal.find('.modal-body #url').val(url);
                modal.find('.modal-body #id').val(id);
            });

            $('#editkatalog').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama = button.data('nama')
                var deskripsi = button.data('deskripsi')
                var harga = button.data('harga')
                var tagline = button.data('tagline')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #deskripsi').val(deskripsi);
                modal.find('.modal-body #harga').val(harga);
                modal.find('.modal-body #tagline').val(tagline);
                modal.find('.modal-body #id').val(id);
            });
        </script>
    </x-slot>
</x-mazer-layout>