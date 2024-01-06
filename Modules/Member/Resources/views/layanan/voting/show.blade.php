<x-mazer-layout title="Data Layanan" menu="layanan">
    <div class="page-heading">
        <x-mzheader
        judul="{{ $layanan->nama }}"
        deskripsi="Layanan {{ $layanan->link }}"
        :link="[
            '/member/layanan' => 'Layanan',
            '/member/layanan/'.$layanan->kode => $layanan->nama,
            ]"
        halaman="detail">
    </x-mzheader>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <header>
                        <a href="{{ url('member/layanan/'.$layanan->kode)}}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i> Tambah Pilihan</button>
                    </header>
                    <main>
                        <div class="table-responsive mt-3">
                            <table class="table table-datatables">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Urutan</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($voting->votingpilihan as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('img/layanan/voting/'.$item->gambar)}}" alt=""    width="70px">
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->urutan }}</td>
                                            <td>
                                                {{ $item->keterangan }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->jumlah }}
                                            </td>
                                            <td class="text-center">
                                                <x-aksi :id="$item->id" link="layanan/votingpilihan">
                                                    <button
                                                        class="btn btn-success btn-sm btn-icon"
                                                        data-bs-target="#edit"
                                                        data-bs-toggle="modal"
                                                        data-nama = "{{ $item->nama }}"
                                                        data-keterangan = "{{ $item->keterangan }}"
                                                        data-urutan = "{{ $item->urutan }}"
                                                        data-id ="{{ $item->id }}">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                </x-aksi>
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
    <x-bsmodal id="tambah" kategori="tambah" judul="Tambah Pilihan" link="layanan/votingpilihan">
        <input type="hidden" name="voting_id" value="{{ $voting->id}}">
        <input type="hidden" name="jumlah" value="0">
        <div class="mb-2">
            <label for="">Nama Pilihan</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Urutan</label>
            <input type="number" name="urutan" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
    </x-bsmodal>
    
    <x-bsmodal id="edit" kategori="edit" judul="Edit Voting" link="layanan/votingpilihan/id'">
        <div class="mb-2">
            <label for="">Nama Pilihan</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Urutan</label>
            <input type="number" name="urutan" id="urutan" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control" required>
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
                var keterangan = button.data('keterangan')
                var urutan = button.data('urutan')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #urutan').val(urutan);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-mazer-layout>