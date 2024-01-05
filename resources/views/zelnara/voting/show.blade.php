<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $voting->nama }}</title>
    
    
    <link rel="shortcut icon" href="{{ asset('img/favicon-zelnara-voting.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('template/mazer/assets/compiled/css/app.css')}}">
  <link rel="stylesheet" href="{{ asset('template/mazer/assets/compiled/css/error.css')}}">

<link rel="stylesheet" href="{{ asset('template/mazer/assets/extensions/sweetalert2/sweetalert2.min.css')}}">

  <style>
    .img-logo {
        width: 100px;
    }

  </style>
</head>

<body>
    {{-- <script src="assets/static/js/initTheme.js"></script> --}}
    <div id="error">
        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                    <img class="img-logo" src="{{ asset('img/layanan/voting/'.$voting->gambar)}}" alt="Logo">
                    <h2 class="judul text-dark mt-2">{{ $voting->nama }}</h2>
                    <p class='fs-7 text-dark'>{{ $voting->keterangan}}</p>
                    @if (!$voting->statusTanggal())
                        <div class="alert alert-info text-center p-2">
                            Vote akan dibuka pada Tanggal <br>
                            <strong class="fs-4">
                                {{ $voting->getTanggal()}}
                            </strong>
                        </div>
                    @endif
                </div>
                <div class="row">
                    @forelse ($voting->votingpilihan as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card">
                                <div class="card-content p-2">
                                    <img class="card-img-top img-fluid" src="{{ asset('img/layanan/voting/'.$item->gambar)}}" alt="Card image cap"/>
                                    <div class="card-body">
                                        @if ($voting->statusTanggal())
                                            <h3 class="text-center" id="vote-{{ $item->id}}">{{ $item->jumlah }}</h3>
                                        @endif

                                        <h6 class="card-title text-center">{{ $item->nama }}</h6>
                                        @if ($voting->statusTanggal())
                                            <button class="btn btn-primary btn-block btn-vote" data-id="{{ Crypt::encryptString($item->id)}}" data-s="{{ Crypt::encryptString('vote_pilihan')}}">VOTE</button>
                                        @endif
                                        <p class="card-text text-dark mt-3">
                                           {{ $item->keterangan}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
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

<script src="{{ asset('template/mazer/assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>>


    <script>
        const Swal2 = Swal.mixin({
            customClass: {
                input: 'form-control'
            }
        });

        $(document).ready(function () {
            $('.btn-vote').on('click', function () {
                let id = $(this).data('id');
                let s = $(this).data('s');
                
                $.get("{{ url('api/ajax')}}", {'id':id,'s':s}, function (response) {
                    $.each(response, function (index,item) {
                       $("#vote-" + item.id).text(item.jumlah); 
                    });
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 429) {
                        // Tangani kasus ketika terlalu banyak permintaan
                        Swal2.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Terlalu Bersemangat Memberikan Voting hihi!",
                            footer: "Kami membatasi terlalu banyak vote (mencegah bot,DDOS, dkk), silahkan vote dengan normal dan coba lagi nanti! Terima Kasih",
                        });
                    } else {
                        // Tangani kesalahan lainnya
                        console.error('Error:', textStatus, errorThrown);
                    }
                });
            });
        });


    </script>
</body>

</html>