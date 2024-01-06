<form id="data-{{ $nilaiid }}" action="{{url($link,$id)}}" method="post">
    @csrf
    @method('delete')
</form>
<section class="d-flex gap-1 justify-content-center">
    @if (!is_null($detail))
        <a href="{{ url($detail)}}" class="btn btn-primary btn-sm"><i class="bi bi-file-text"></i></a>
    @endif
    {{ $slot }}
    @if ($hapus)
        <button class="btn btn-danger btn-sm" onclick="deleteRow({{ $nilaiid }})"><i class="bi bi-trash"></i></button>
    @endif
</section>


