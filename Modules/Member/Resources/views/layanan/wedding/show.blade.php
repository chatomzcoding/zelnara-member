<x-mazer-layout title="Data Layanan" menu="layanan">
    <div class="page-heading">
        <x-mzheader
            judul="{{ $wedding->nama }}"
            deskripsi="Kelola Wedding {{ $wedding->nama }}"
            :link="['/member/layanan' => 'Layanan','/member/layanan/wedding' => 'Data Wedding']"
            halaman="detail">
        </x-mzheader>
        
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <header>
                        <a href="{{ url('member/layanan/wedding')}}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
                    </header>
                    <main>
                        <form action="{{ url('zelnarawedding/wedding/'.$wedding->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <input type="hidden" name="s" value="update">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="">Nama Pernikahan</label>
                                        <input type="text" name="nama" value="{{ $wedding->nama}}" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Link Pernikahan</label>
                                        <input type="text" name="link" value="{{ $wedding->link}}" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Tempat Pernikahan</label>
                                        <input type="text" name="tempat_pernikahan" value="{{ $wedding->tempat_pernikahan}}" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Alamat Pernikahan</label>
                                        <input type="text" name="alamat_pernikahan" value="{{ $wedding->alamat_pernikahan}}"  class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Tanggal Pernikahan</label>
                                        <input type="date" name="tanggal_pernikahan" value="{{ $wedding->tanggal_pernikahan}}" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Jam</label>
                                        <div class="row">
                                            <div class="col">
                                                <label for="">Akad</label>
                                                <input type="string" name="jam_akad" value="{{ $wedding->jam_akad}}" class="form-control" required>
                                            </div>
                                            <div class="col">
                                                <label for="">Resepsi</label>
                                                <input type="string" name="jam_resepsi" value="{{ $wedding->jam_resepsi}}" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Gambar</label>
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="">Maps Link</label>
                                        <input type="text" name="maps_link" value="{{ $wedding->maps_link}}" class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Maps Source</label>
                                        <textarea name="maps" id="" cols="30" rows="3" class="form-control">{{ $wedding->maps }}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">link Bank/Ewallet/dll</label>
                                        <input type="text" name="hadiah_nama1" value="{{ $wedding->hadiah_nama1}}" class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">No Bank/Ewallet/dll</label>
                                        <input type="text" name="hadiah_no1" value="{{ $wedding->hadiah_no1}}" class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Atas Nama Bank/Ewallet/dll</label>
                                        <input type="text" name="hadiah_an1" value="{{ $wedding->hadiah_an1}}" class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Nama Bank/Ewallet/dll (2)</label>
                                        <input type="text" name="hadiah_nama2" value="{{ $wedding->hadiah_nama2}}" class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">No Bank/Ewallet/dll (2)</label>
                                        <input type="text" name="hadiah_no2" value="{{ $wedding->hadiah_no2}}" class="form-control">
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Atas Nama Bank/Ewallet/dll (2)</label>
                                        <input type="text" name="hadiah_an2" value="{{ $wedding->hadiah_an2}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-success btn-sm">SIMPAN PERUBAHAN</button>
                                </div>
                            </div>
                        </form>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Data Pasangan Pria
                                    </div>
                                    <div class="card-body">
                                        @if ($pria)
                                            <form action="{{ url('zelnarawedding/weddingpasangan/'.$pria->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-2 text-center">
                                                    <img src="{{ asset('img/layanan/wedding/'.$pria->photo)}}" width="100px" alt="">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Lengkap</label>
                                                    <input type="text" name="nama" value="{{ $pria->nama}}" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Singkat/Panggilan</label>
                                                    <input type="text" name="nama_singkat" value="{{ $pria->nama_singkat}}" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Ayah</label>
                                                    <input type="text" name="nama_ayah" value="{{ $pria->nama_ayah}}" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Ibu</label>
                                                    <input type="text" name="nama_ibu" value="{{ $pria->nama_ibu}}" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Ubah Photo</label>
                                                    <input type="file" name="photo" class="form-control">
                                                </div>
                                                <div class="mb-2 text-center">
                                                    <button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
                                                </div>
                                            </form>
                                        @else
                                            <form action="{{ url('zelnarawedding/weddingpasangan')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="wedding_id" value="{{ $wedding->id}}">
                                                <input type="hidden" name="jk" value="l">
                                                <div class="mb-2">
                                                    <label for="">Nama Lengkap</label>
                                                    <input type="text" name="nama" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Singkat/Panggilan</label>
                                                    <input type="text" name="nama_singkat" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Ayah</label>
                                                    <input type="text" name="nama_ayah" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Ibu</label>
                                                    <input type="text" name="nama_ibu" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Photo</label>
                                                    <input type="file" name="photo" class="form-control" required>
                                                </div>
                                                <div class="mb-2 text-center">
                                                    <button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        Data Pasangan Wanita
                                    </div>
                                    <div class="card-body">
                                        @if ($wanita)
                                            <form action="{{ url('zelnarawedding/weddingpasangan/'.$wanita->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-2 text-center">
                                                    <img src="{{ asset('img/layanan/wedding/'.$wanita->photo)}}" width="100px" alt="">
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Lengkap</label>
                                                    <input type="text" name="nama" value="{{ $wanita->nama}}" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Singkat/Panggilan</label>
                                                    <input type="text" name="nama_singkat" value="{{ $wanita->nama_singkat}}" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Ayah</label>
                                                    <input type="text" name="nama_ayah" value="{{ $wanita->nama_ayah}}" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Ibu</label>
                                                    <input type="text" name="nama_ibu" value="{{ $wanita->nama_ibu}}" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Ubah Photo</label>
                                                    <input type="file" name="photo" class="form-control">
                                                </div>
                                                <div class="mb-2 text-center">
                                                    <button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
                                                </div>
                                            </form>
                                        @else
                                            <form action="{{ url('zelnarawedding/weddingpasangan')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="wedding_id" value="{{ $wedding->id}}">
                                                <input type="hidden" name="jk" value="p">
                                                <div class="mb-2">
                                                    <label for="">Nama Lengkap</label>
                                                    <input type="text" name="nama" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Singkat/Panggilan</label>
                                                    <input type="text" name="nama_singkat" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Ayah</label>
                                                    <input type="text" name="nama_ayah" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Nama Ibu</label>
                                                    <input type="text" name="nama_ibu" class="form-control" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="">Photo</label>
                                                    <input type="file" name="photo" class="form-control" required>
                                                </div>
                                                <div class="mb-2 text-center">
                                                    <button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-2">
                            <div class="card-header">
                                Data Galeri
                            </div>
                            <div class="card-body">
                                <header>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahgaleri"><i class="bi bi-plus-circle"></i> Tambah Galeri</button>
                                </header>
                                <main>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-datatables">
                                            <thead class="text-center">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Gambar</th>
                                                    <th>Nama</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($wedding->weddinggaleri as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img src="{{ asset('img/layanan/wedding/'.$item->photo)}}" alt="" width="100px">
                                                        </td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td class="text-center">
                                                            <x-aksi :id="$item->id" link="zelnarawedding/weddinggaleri">
                                                                <button
                                                                    class="btn btn-success btn-sm btn-icon"
                                                                    data-bs-target="#editgaleri"
                                                                    data-bs-toggle="modal"
                                                                    data-nama = "{{ $item->nama }}"
                                                                    data-id ="{{ $item->id }}">
                                                                    <i class="bi bi-pencil"></i>
                                                                </button>
                                                            </x-aksi>
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
                        <div class="card mt-2">
                            <div class="card-header">
                                Data Cerita
                            </div>
                            <div class="card-body">
                                <header>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahcerita"><i class="bi bi-plus-circle"></i> Tambah Cerita</button>
                                </header>
                                <main>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-datatables">
                                            <thead class="text-center">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Gambar</th>
                                                    <th>Nama Cerita</th>
                                                    <th>Tanggal</th>
                                                    <th>Deskripsi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($wedding->weddingcerita as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img src="{{ asset('img/layanan/wedding/'.$item->photo)}}" alt="" width="100px">
                                                        </td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>{{ date_indo($item->tanggal) }}</td>
                                                        <td>{{ $item->deskripsi }}</td>
                                                        <td class="text-center">
                                                            <x-aksi :id="$item->id" link="zelnarawedding/weddingcerita">
                                                                <button
                                                                    class="btn btn-success btn-sm btn-icon"
                                                                    data-bs-target="#editcerita"
                                                                    data-bs-toggle="modal"
                                                                    data-nama = "{{ $item->nama }}"
                                                                    data-tanggal = "{{ $item->tanggal }}"
                                                                    data-deskripsi = "{{ $item->deskripsi }}"
                                                                    data-id ="{{ $item->id }}">
                                                                    <i class="bi bi-pencil"></i>
                                                                </button>
                                                            </x-aksi>
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
                    </main>
                </div>
            </div>
        </section>
    </div>

    <x-bsmodal id="tambahgaleri" kategori="tambah" judul="Tambah Galeri" link="zelnarawedding/weddinggaleri">
        <input type="hidden" name="wedding_id" value="{{ $wedding->id}}">
        <div class="mb-2">
            <label for="">Nama Galeri (opsional)</label>
            <input type="text" name="nama" value="{{ old('nama')}}" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Photo</label>
            <input type="file" name="photo" class="form-control" required>
        </div>
    </x-bsmodal>

    <x-bsmodal id="editgaleri" kategori="edit" judul="Edit Galeri" link="zelnarawedding/weddinggaleri/id">
        <div class="mb-2">
            <label for="">Nama Galeri (opsional)</label>
            <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
    </x-bsmodal>
    <x-bsmodal id="tambahcerita" kategori="tambah" judul="Tambah Cerita" link="zelnarawedding/weddingcerita">
        <input type="hidden" name="wedding_id" value="{{ $wedding->id}}">
        <div class="mb-2">
            <label for="">Nama Cerita</label>
            <input type="text" name="nama" value="{{ old('nama')}}" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Tanggal Cerita</label>
            <input type="date" name="tanggal" value="{{ old('tanggal')}}" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Deskripsi Cerita</label>
            <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control" required></textarea>
        </div>
        <div class="mb-2">
            <label for="">Photo</label>
            <input type="file" name="photo" class="form-control" required>
        </div>
    </x-bsmodal>

    <x-bsmodal id="editgaleri" kategori="edit" judul="Edit Cerita" link="zelnarawedding/weddingcerita/id">
        <div class="mb-2">
            <label for="">Nama Cerita</label>
            <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Tanggal Cerita</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Deskripsi Cerita</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control" required></textarea>
        </div>
        <div class="mb-2">
            <label for="">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
    </x-bsmodal>

    <x-slot name="kodejs">
        <script>
            $('#editgaleri').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var nama = button.data('nama')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-mazer-layout>