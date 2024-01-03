<x-mazer-layout title="Data Member" menu="member">
    <div class="page-heading">
        <x-mzheader
            judul="Member"
            deskripsi="Kelola dan Manajemen Member."
            halaman="Detail Member">
        </x-mzheader>
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