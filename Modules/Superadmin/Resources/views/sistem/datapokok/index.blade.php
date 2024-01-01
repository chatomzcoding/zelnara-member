<x-mazer-layout title="Data Pokok" menu="datapokok">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Pokok</h3>
                    <p class="text-subtitle text-muted">Kelola dan Manajemen Data Pokok.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Pokok</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('superadmin/datapokok/'.$datapokok->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="">Nama Brand</label>
                                    <input type="text" name="nama" value="{{ $datapokok->nama}}" class="form-control" required>
                                </div>
                                <div class="mb-2">
                                    <label for="">Footer</label>
                                    <input type="text" name="footer" value="{{ $datapokok->footer}}" class="form-control" required>
                                </div>
                                <div class="mb-2">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" id="" cols="30" rows="5" maxlength="225" class="form-control">{{ $datapokok->deskripsi }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                {{-- <div class="mb-2">
                                    <label for="">Link Instagram</label>
                                    <input type="url" name="link_ig" value="{{ $datapokok->link_ig}}" class="form-control" required>
                                </div> --}}
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('img/sistem/'.$datapokok->logo)}}" alt="" width="100%">
                                        </div>
                                        <div class="col">
                                            <label for="">Logo Brand</label>
                                            <input type="file" name="logo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('img/sistem/'.$datapokok->favicon)}}" alt="" width="100%">
                                        </div>
                                        <div class="col">
                                            <label for="">Favicon</label>
                                            <input type="file" name="favicon" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary btn-sm">SIMPAN PERUBAHAN</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    
        </section>
    </div>
</x-mazer-layout>