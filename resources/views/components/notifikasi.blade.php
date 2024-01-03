<section>
    {{-- notifikasi validate form --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</section>