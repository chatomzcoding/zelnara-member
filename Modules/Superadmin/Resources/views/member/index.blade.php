<x-mazer-layout title="Data Member" menu="superadmin-member">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Member</h3>
                    <p class="text-subtitle text-muted">Kelola dan Manajemen Member.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Member</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                @if ($user->isNotEmpty())
                    <div class="card-header">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-plus-circle"></i> TAMBAH</button>
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($member as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->telp }}</td>
                                        <td>{{ $item->level }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td class="text-center">
                                            <button
                                                class="btn btn-success btn-sm btn-icon"
                                                data-bs-target="#edit"
                                                data-bs-toggle="modal"
                                                data-nama = "{{ $item->nama }}"
                                                data-alamat="{{ $item->alamat }}"
                                                data-telp="{{ $item->telp }}"
                                                data-email="{{ $item->email }}"
                                                data-level="{{ $item->level }}"
                                                data-id ="{{ $item->id }}">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <form action="{{ url('superadmin/member/'.$item->id)}}" method="post" class="d-inline">
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
                </div>
            </div>
    
        </section>
    </div>

    <div class="modal" id="tambah" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ url('superadmin/member')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="">Nama Member</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Telephone</label>
                        <input type="tel" name="telp" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Level</label>
                        <select name="level" id="" class="form-select" required>
                            <option value="">-- pilih level --</option>
                            @foreach (data_level() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="">User</label>
                        <select name="user_id" id="" class="form-select" required>
                            <option value="">-- pilih user --</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id}}">{{ $item->name}}</option>
                            @endforeach
                        </select>
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
            <form action="{{ url('superadmin/member/id')}}" method="post">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-2">
                        <label for="">Nama Member</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Telephone</label>
                        <input type="tel" name="telp" id="telp" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Level</label>
                        <select name="level" id="level" class="form-select" required>
                            <option value="">-- pilih level --</option>
                            @foreach (data_level() as $item)
                                <option value="{{ $item}}">{{ $item}}</option>
                            @endforeach
                        </select>
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
                var alamat = button.data('alamat')
                var email = button.data('email')
                var telp = button.data('telp')
                var level = button.data('level')
                var id = button.data('id')
        
                var modal = $(this)
        
                modal.find('.modal-body #nama').val(nama);
                modal.find('.modal-body #alamat').val(alamat);
                modal.find('.modal-body #email').val(email);
                modal.find('.modal-body #telp').val(telp);
                modal.find('.modal-body #level').val(level);
                modal.find('.modal-body #id').val(id);
            })
        </script>
    </x-slot>
</x-mazer-layout>