<form id="data-{{ $nilaiid }}" action="{{url($link,$id)}}" method="post">
    @csrf
    @method('delete')
</form>
<section>
    {{ $slot }}
    @if ($hapus)
        <button class="btn btn-danger btn-sm" onclick="deleteRow({{ $nilaiid }})"><i class="bi bi-trash"></i></button>
    @endif
</section>


