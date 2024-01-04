<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $linkmaster->judul }}</title>
    
    
    <link rel="shortcut icon" href="{{ asset('img/favicon-zelnara-link.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('template/mazer/assets/compiled/css/app.css')}}">
  <link rel="stylesheet" href="{{ asset('template/mazer/assets/compiled/css/error.css')}}">
  <style>
    .img-logo {
        width: 100px;
    }

    .grad {
        background-image: {{ $linkmaster->tema }};
    }

  </style>
</head>

<body>
    {{-- <script src="assets/static/js/initTheme.js"></script> --}}
    {{-- <div id="error" style="background-color: {{ $linkmaster->tema}}"> --}}
    <div id="error" class="grad">
        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                    <img class="img-logo" src="{{ asset('img/layanan/link/'.$linkmaster->gambar)}}" alt="Logo">
                    <h2 class="judul text-dark mt-2">{{ $linkmaster->judul }}</h2>
                    <p class='fs-7 text-white'>{{ $linkmaster->deskripsi}}</p>
                </div>
                <div>
                    {{--button  --}}
                    <div class="buttons p-3">
                        @foreach ($linkmaster->linkmasterbutton as $item)
                            <a href="{{ $item->url}}" target="_blank" data-s="{{ Crypt::encryptString('jumlah_link_button')}}" data-id="{{ Crypt::encryptString($item->id)}}" class="btn btn-block btn-light icon icon-left">{!! $item->icon !!} {{$item->nama}}</a> <br>
                        @endforeach
                    </div>
                    @if ($linkmaster->linkmasterkatalog->count() > 0)
                        <div class="buttons mt-2 p-3">
                            <p class="text-center border-bottom text-dark text-shadow">Katalog</p>
                            <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                                @foreach ($linkmaster->linkmasterkatalog as $item)
                                    @php
                                        $no = $loop->iteration - 1;
                                    @endphp
                                    <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2 position-relative">
                                        <div class="position-relative">
                                            @if (!is_null($item->tagline))
                                                <span class="badge bg-primary position-absolute top-0 end-0">{{ $item->tagline }}</span>
                                            @endif
                                            <a href="#">
                                                <img class="w-100 rounded @if ($loop->iteration == 1) active @endif" src="{{ asset('img/layanan/link/'.$item->gambar)}}" data-bs-target="#Gallerycarousel" data-bs-slide-to="{{ $no}}">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog"
                            aria-labelledby="galleryModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header py-1">
                                            <h5 class="modal-title" id="galleryModalTitle">Katalog</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach ($linkmaster->linkmasterkatalog as $item)
                                                        <div class="carousel-item position-relative @if ($loop->iteration == 1)
                                                            active
                                                            @endif">
                                                            <p class="text-center mb-1 fw-bold">{{ $item->nama }}</p>
                                                            <img class="d-block rounded w-100" src="{{ asset('img/layanan/link/'.$item->gambar)}}">
                                                            <h6 class="text-end mt-1 me-2">Rp. {{ norupiah($item->harga)}}</h6>
                                                            <p class="small">{{ $item->deskripsi }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#Gallerycarousel" role="button" type="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                </a>
                                                <a class="carousel-control-next" href="#Gallerycarousel" role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="modal-footer p-2">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    @endif
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                @if (!is_null($linkmaster->alamat))
                                    <tr>
                                        <td class="text-white">
                                            <i class="bi bi-geo-alt"></i>
                                        </td>
                                        <td class="text-white">
                                            {{ $linkmaster->alamat}}
                                        </td>
                                    </tr>
                                @endif
                                @if (!is_null($linkmaster->no_telp))
                                    <tr>
                                        <td class="text-white">
                                            <i class="bi bi-phone"></i>
                                        </td>
                                        <td class="text-white">
                                            {{ $linkmaster->no_telp}}
                                        </td>
                                    </tr>
                                @endif
                                @if (!is_null($linkmaster->no_wa))
                                    <tr>
                                        <td class="text-white">
                                            <i class="bi bi-whatsapp"></i>
                                        </td>
                                        <td class="text-white">
                                            {{ $linkmaster->no_wa}}
                                        </td>
                                    </tr>
                                    
                                @endif
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                @if (!is_null($linkmaster->jam_kerja))
                                    <tr>
                                        <td class="text-white">
                                            <i class="bi bi-clock"></i>
                                        </td>
                                        <td class="text-white">
                                            Jam Kerja | {{ $linkmaster->jam_kerja}}
                                        </td>
                                    </tr>
                                @endif
                                @if (!is_null($linkmaster->email))
                                    <tr>
                                        <td class="text-white">
                                            <i class="bi bi-envelope"></i>
                                        </td>
                                        <td class="text-white">
                                            {{ $linkmaster->email}}
                                        </td>
                                    </tr>
                                    
                                @endif
                                @if (!is_null($linkmaster->situs_web))
                                    <tr>
                                        <td class="text-white">
                                            <i class="bi bi-globe"></i>
                                        </td>
                                        <td class="text-white">
                                            {{ $linkmaster->situs_web}}
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center">
        Copyright © {{ ambil_tahun()}} Zelnara
    </footer>
    <script src="{{ asset('template/mazer/assets/extensions/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('template/mazer/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    
    <script src="{{ asset('template/mazer/assets/compiled/js/app.js')}}"></script>

    <script>
        $('.btn').on('click', function () {
            let id = $(this).data('id');
            let s = $(this).data('s');
            
            $.get("{{ url('api/ajax')}}", {'id':id,'s':s}, function (response) {
                
            });
        });
    </script>
</body>

</html>