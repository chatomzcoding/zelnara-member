<x-mazer-layout title="Data Member" menu="member">
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
                            <li class="breadcrumb-item active" aria-current="page">Detail Member</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <section>
                                <form action="{{ url('member')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="member_id" value="{{ $user->member->id}}">
                                    <div class="mb-2">
                                        <label for="">Nama Member</label>
                                        <input type="text" name="nama" value="{{ $user->member->nama}}" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" value="{{ $user->member->alamat}}" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Telephone</label>
                                        <input type="tel" name="telp" value="{{ $user->member->telp}}" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="{{ $user->member->email}}" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> SIMPAN PERUBAHAN</button>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-mazer-layout>