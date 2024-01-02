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
                    <h1 class="judul text-dark">{{ $linkmaster->judul }}</h1>
                    <p class='fs-5 text-white'>{{ $linkmaster->deskripsi}}</p>
                </div>
                <div>
                    {{--button  --}}
                    <div class="buttons p-3">
                        @foreach ($linkmaster->linkmasterbutton as $item)
                            <a href="{{ $item->url}}" target="_blank" data-s="{{ Crypt::encryptString('jumlah_link_button')}}" data-id="{{ Crypt::encryptString($item->id)}}" class="btn btn-block btn-light icon icon-left">{!! $item->icon !!} {{$item->nama}}</a> <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('template/mazer/assets/extensions/jquery/jquery.min.js')}}"></script>

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