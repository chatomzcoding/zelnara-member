<x-mazer-layout title="Data Layanan" menu="layanan">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $layanan->nama }}</h3>
                    <p class="text-subtitle text-muted">Layanan {{ $layanan->link }}</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/member/layanan')}}">Layanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <header>
                        <a href="{{ url('member/layanan')}}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i> Tambah Voting</button>
                    </header>
                    <main>
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead class="text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Link</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Sistem</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user->member->Voting as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>
                                                @if (!is_null($item->gambar))
                                                    <img src="{{ asset('img/layanan/voting/'.$item->gambar)}}" alt=""     width="70px">
                                                @endif
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                <a href="https://voting.zelnara.com/{{ $item->link}}" target="_blank">{{ $item->link}}</a>
                                            </td>
                                            <td>{{ date_indo($item->tanggal_mulai).' - '.date_indo($item->tanggal_akhir) }}</td>
                                            <td>
                                                {{ $item->keterangan }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->sistem }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->status }}
                                            </td>
                                            <td class="text-center">
                                                <x-aksi :id="$item->id" link="layanan/voting">
                                                    <a href="{{ url('member/layananvoting/'.Crypt::encryptString($item->id))}}" class="btn btn-primary btn-sm"><i class="bi bi-file-text"></i></a>
                                                    <button
                                                        class="btn btn-success btn-sm btn-icon"
                                                        data-bs-target="#edit"
                                                        data-bs-toggle="modal"
                                                        data-nama = "{{ $item->nama }}"
                                                        data-link = "{{ $item->link }}"
                                                        data-keterangan = "{{ $item->keterangan }}"
                                                        data-tanggal_mulai = "{{ $item->tanggal_mulai }}"
                                                        data-tanggal_akhir = "{{ $item->tanggal_akhir }}"
                                                        data-status = "{{ $item->status }}"
                                                        data-sistem = "{{ $item->sistem }}"
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
    <x-bsmodal id="tambah" kategori="tambah" judul="Tambah Voting" link="layanan/voting">
        <input type="hidden" name="member_id" value="{{ $user->member->id}}">
        <input type="hidden" name="layanan_id" value="{{ $layanan->id}}">
        <div class="mb-2">
            <label for="">Nama Voting</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Link Voting</label>
            <input type="text" name="link" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Status Voting</label>
            <select name="status" id="" class="form-select" required>
                <option value="aktif">AKTIF</option>
                <option value="tidak aktif">TIDAK AKTIF</option>
                <option value="tutup">TUTUP</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="">Sistem Voting</label>
            <select name="sistem" id="" class="form-select" required>
                <option value="war">WAR VOTING</option>
                <option value="basic">BASIC VOTING</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
    </x-bsmodal>
    
    <x-bsmodal id="edit" kategori="edit" judul="Edit Voting" link="layanan/voting/id'">
        <div class="mb-2">
            <label for="">Nama Voting</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Link Voting</label>
            <input type="text" name="link" id="link" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control">
        </div>
        <div class="mb-2">
            <label for="">Status Voting</label>
            <select name="status" id="status" class="form-select" required>
                <option value="aktif">AKTIF</option>
                <option value="tidak aktif">TIDAK AKTIF</option>
                <option value="tutup">TUTUP</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="">Sistem Voting</label>
            <select name="sistem" id="sistem" class="form-select" required>
                <option value="war">WAR VOTING</option>
                <option value="basic">BASIC VOTING</option>
            </select>
        </div>
        <div class="mb-2">
            <label for="">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
        </div>
        <div class="mb-2">
            <label for="">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" required>
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
                var link = button.data('link')
                var keterangan = button.data('keterangan')
                var tanggal_akhir = button.data('tanggal_akhir')
                var status = button.data('status')
                var sistem = button.data('sistem')
                var tanggal_mulai = button.data('tanggal_mulai')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #link').val(link);
                modal.find('.modal-body #keterangan').val(keterangan);
                modal.find('.modal-body #tanggal_akhir').val(tanggal_akhir);
                modal.find('.modal-body #status').val(status);
                modal.find('.modal-body #sistem').val(sistem);
                modal.find('.modal-body #tanggal_mulai').val(tanggal_mulai);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-mazer-layout>