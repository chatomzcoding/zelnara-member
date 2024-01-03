<div class="modal modal-{{ $classborder }}" id="{{$id}}" tabindex="-1">
    <div class="modal-dialog {{ $dialog }}">
        <div class="modal-content">
            @switch($kategori)
                @case('tambah')
                    <form action="{{ url($link)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $judul }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        {{ $slot }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> SIMPAN</button>
                        </div>
                    </form>
                    @break
                @case('edit')
                    <form action="{{ url($link)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $judul }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            {{ $slot }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                            <button type="submit" class="btn btn-success">SIMPAN PERUBAHAN</button>
                        </div>
                    </form>
                    @break
                @default
                    <div class="modal-header bg-{{ $warna}}">
                        <h5 class="modal-title">{{ $judul }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ $slot }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                    </div>
            @endswitch
        </div>
    </div>
</div>