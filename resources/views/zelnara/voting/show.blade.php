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
            <header class="text-end">
                <a href="#" data-bs-toggle="modal" data-bs-target="#term">Syarat & Ketentuan Penggunaan Zelnara Voting</a>
            </header>
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

       <!--scrolling content Modal -->
       <div class="modal fade" id="term" tabindex="-1" role="dialog"
       aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-scrollable" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalScrollableTitle">Syarat dan Ketentuan</h5>
                   <button type="button" class="close" data-bs-dismiss="modal"
                       aria-label="Close">
                       <i data-feather="x"></i>
                   </button>
               </div>
               <div class="modal-body">
                <strong>
                    PENGANTAR
                </strong>
                <br>
                Aplikasi voting ini disediakan sebagai sarana hiburan untuk pengguna. Harap dibaca dengan seksama syarat dan ketentuan ini sebelum menggunakan aplikasi.
                <br>
                <strong>
                    
                    SYARAT DAN KETENTUAN
                </strong>
                <br>
                <ol>
                    <li>
                        Partisipasi:
                        <ul>
                            <li>
                                Siapapun yang memiliki link ini dapat berpartisipasi dalam voting.
                            </li>
                            <li>
                                Setiap pengguna diperbolehkan memberikan lebih dari satu vote untuk setiap pilihan yang tersedia.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Batasan Waktu:
                        <ul>
                            <li>
                                Setiap sesi voting akan memiliki batasan waktu yang ditentukan. Setelah waktu tersebut berakhir, voting akan ditutup.
                            </li>
                            <li>
                                Pengguna diberikan hak untuk memberikan suara selama periode waktu voting yang telah ditentukan.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Batasan Jumlah Vote:
                        <ul>
                            <li>
                                Meskipun setiap pengguna diperbolehkan memberikan lebih dari satu vote, akan ada batasan jumlah maksimum vote yang dapat diberikan oleh satu pengguna untuk setiap pilihan.
                            </li>
                            <li>
                                Batasan vote dihitung dari frekuensi vote yang tidak wajar dalam waktu singkat, hal ini mencegah vote yang tidak normal seperti penggunaan bot, serangan DDOS dan lain sebagainya.
                            </li>
                            <li>
                                Apabila pengguna mendapatkan peringatan batasan vote, pengguna dapat memberikan vote dalam beberapa menit selanjutnya
                            </li>
                        </ul>
                    </li>
                    <li>
                        Keterbukaan Hasil:
                        <ul>
                            <li>
                                Hasil dari voting bersifat hiburan dan tidak memiliki dampak resmi atau keputusan tertentu.
                            </li>
                            <li>
                                Hasil tidak akan menjadi acuan utama atau digunakan sebagai dasar untuk keputusan apapun.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Pengaturan Hak Kekayaan Intelektual:
                        <ul>
                            <li>
                                Aplikasi ini memiliki hak kekayaan intelektual. Seluruh konten, termasuk namun tidak terbatas pada pilihan dan hasil voting, merupakan milik dari pemilik aplikasi.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Perubahan Syarat dan Ketentuan:
                        <ul>
                            <li>
                                Pemilik aplikasi berhak untuk mengubah syarat dan ketentuan ini tanpa pemberitahuan sebelumnya. Perubahan tersebut akan berlaku sejak tanggal diumumkan.
                            </li>
                        </ul>
                    </li>
                    <li>
                        Penutupan Aplikasi:
                        <ul>
                            <li>
                                Pemilik aplikasi berhak untuk menutup aplikasi ini tanpa pemberitahuan sebelumnya.
                            </li>
                        </ul>
                    </li>
                </ol>
                <strong>
                    PENUTUP
                </strong>
                <br>
                Dengan menggunakan aplikasi ini, pengguna dianggap telah membaca, memahami, dan menyetujui semua syarat dan ketentuan yang tercantum di atas. Syarat dan ketentuan ini dapat diubah sewaktu-waktu oleh pemilik aplikasi. Jika Anda tidak setuju dengan syarat dan ketentuan ini, mohon untuk tidak menggunakan aplikasi ini.
                <br>
                Terima kasih atas partisipasi Anda!
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-light-secondary"
                       data-bs-dismiss="modal">
                       <i class="bx bx-x d-block d-sm-none"></i>
                       <span class="d-none d-sm-block">TUTUP</span>
                   </button>
                   <button type="button" class="btn btn-success ms-1" data-bs-dismiss="modal">
                       <i class="bx bx-check d-block d-sm-none"></i>
                       <span class="d-none d-sm-block">SAYA MENGERTI</span>
                   </button>
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