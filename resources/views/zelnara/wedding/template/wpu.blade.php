<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $wedding->nama }}</title>

  <link rel="shortcut icon" href="{{ asset('img/favicon-zelnara-wedding.png')}}" type="image/x-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:wght@100;300;400;600;700&display=swap"
    rel="stylesheet">

  <!-- simplyCountdown -->
  <link rel="stylesheet" href="{{ asset('wedding/wpu/countdown/simplyCountdown.theme.default.css')}}" />
  <script src="{{ asset('wedding/wpu/countdown/simplyCountdown.min.js')}}"></script>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link rel="stylesheet" href="{{ asset('wedding/wpu/style.css')}}">
  <link rel="stylesheet" href="{{ asset('template/mazer/assets/extensions/sweetalert2/sweetalert2.min.css')}}">

</head>

<body>

  <section id="hero"
    class="hero w-100 h-100 p-3 mx-auto text-center d-flex justify-content-center align-items-center text-white">
    <main>
      <h4>Kepada <span>Bapak/Ibu/Saudara/i, </span></h4>
      <h1>{{ $wedding->nama }}</h1>
      <p>Akan melangsungkan resepsi pernikahan dalam:</p>
      <div class="simply-countdown"></div>
      <a href="#home" class="btn btn-lg mt-4" onClick="enableScroll()">Lihat Undangan</a>
    </main>

  </section>

  <nav class="navbar navbar-expand-md bg-transparent sticky-top mynavbar">
    <div class="container">
      <a class="navbar-brand" href="#">Dino</a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dino</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="navbar-nav ms-auto">
            <a class="nav-link" href="#home">Beranda</a>
            <a class="nav-link" href="#info">Info</a>
            <a class="nav-link" href="#story">Cerita</a>
            <a class="nav-link" href="#gallery">Galeri</a>
            <a class="nav-link" href="#rsvp">Kehadiran</a>
            <a class="nav-link" href="#gifts">Kirim Hadiah</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <section id="home" class="home">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 text-center">
          <h2>Acara Pernikahan</h2>
          <h4>Assalamualaikum warahmatullahi wabarakatuh.</h4>
          <p>Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk dapat menghadiri acara pernikahan kami</p>
        </div>
      </div>

      <div class="row couple">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-8 text-end">
              <h3>{{ $pria->nama }}</h3>
              {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque praesentium aut ipsa perferendis, --}}
                {{-- incidunt soluta?</p> --}}
              <p>Putra dari Bpk. {{ $pria->nama_ayah}} <br> dan <br> Ibu {{ $pria->nama_ayah }}</p>
            </div>
            <div class="col-4">
              <img src="{{ asset('img/layanan/wedding/'.$pria->photo)}}" alt="{{ $pria->nama}}" class="img-responsive rounded-circle">
            </div>
          </div>
        </div>

        <span class="heart"><i class="bi bi-heart-fill"></i></span>

        <div class="col-lg-6">
          <div class="row">
            <div class="col-4">
              <img src="{{ asset('img/layanan/wedding/'.$wanita->photo)}}" alt="{{$wanita->nama}}" class="img-responsive rounded-circle">
            </div>
            <div class="col-8">
              <h3>{{$wanita->nama}}</h3>
              {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque praesentium aut ipsa perferendis, --}}
                {{-- incidunt soluta?</p> --}}
              <p>Putri dari Bpk. {{$wanita->nama_ayah}} <br> dan <br> Ibu {{$wanita->nama_ibu}} </p>
            </div>
          </div>
        </div>
      </div>
      <section class="text-center" style="margin-top: 20px">
        وَمِنْ اٰيٰتِهٖٓ اَنْ خَلَقَ لَكُمْ مِّنْ اَنْفُسِكُمْ اَزْوَاجًا لِّتَسْكُنُوْٓا اِلَيْهَا وَجَعَلَ بَيْنَكُمْ مَّوَدَّةً وَّرَحْمَةً ۗاِنَّ فِيْ ذٰلِكَ لَاٰيٰتٍ لِّقَوْمٍ يَّتَفَكَّرُوْنَ
        <p>
          Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir. (QS. Ar-Rum: 21)
        </p>
      </section>
    </div>
  </section>


  <section id="info" class="info">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-10 text-center">
          <h2>Informasi Acara</h2>
          <p class="alamat">
            {{ $wedding->tempat_pernikahan}}
             <br>
            {{ $wedding->alamat_pernikahan}} 
            </p>

            {!! $wedding->maps !!}

          <a href="{{ $wedding->maps_link}}" target="_blank" class="btn btn-light btn-sm my-3">Klik untuk
            membuka peta</a>
          <p class="description">Diharapkan untuk tidak salah alamat dan tanggal. Manakala tiba di tujuan namun tidak
            ada tanda-tanda sedang dilangsungkan pernikahan, boleh jadi Anda salah jadwal, atau salah tempat.</p>
        </div>
      </div>

      <div class="row justify-content-center mt-4">
        <div class="col-md-5 col-10">
          <div class="card text-center text-bg-light mb-5">
            <div class="card-header">Akad Nikah</div>
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-md-6">
                  <i class="bi bi-clock d-block"></i>
                  <span>{{ $wedding->jam_akad }}</span>
                </div>
                <div class="col-md-6">
                  <i class="bi bi-calendar3 d-block"></i>
                  <span>{{hari_indo($wedding->tanggal_pernikahan)}}, {{ date_indo($wedding->tanggal_pernikahan) }}</span>
                </div>
              </div>
            </div>
            <div class="card-footer">
              Saat acara akad diharapkan untuk kondusif menjaga kekhidmatan dan kekhusyuan seluruh prosesi.
            </div>
          </div>
        </div>
        <div class="col-md-5 col-10">
          <div class="card text-center text-bg-light">
            <div class="card-header">Resepsi</div>
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-md-6">
                  <i class="bi bi-clock d-block"></i>
                  <span>{{ $wedding->jam_resepsi }}</span>
                </div>
                <div class="col-md-6">
                  <i class="bi bi-calendar3 d-block"></i>
                  <span>{{hari_indo($wedding->tanggal_pernikahan)}}, {{ date_indo($wedding->tanggal_pernikahan) }}</span>
                </div>
              </div>
            </div>
            <div class="card-footer">
              Saat acara akad diharapkan untuk kondusif menjaga kekhidmatan dan kekhusyuan seluruh prosesi.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="story" class="story">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-10 text-center">
          <span>Bagaimana Cinta Kami Bersemi</span>
          <h2>Cerita Kami</h2>
          {{-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, similique non soluta nulla asperiores --}}
            {{-- voluptatem.</p> --}}
        </div>
      </div>

      <div class="row">
        <div class="col">
          <ul class="timeline">
            @foreach ($wedding->weddingcerita as $item)
                  <li class="@if ($loop->even)
                    timeline-inverted
                  @endif">
                    <div class="timeline-image" style="background-image: url('{{ asset("img/layanan/wedding/".$item->photo)}}');"></div>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h3>{{ $item->nama }}</h3>
                        <span>{{ date_indo($item->tanggal)}}</span>
                      </div>
                      <div class="timeline-body">
                        <p>{{ $item->deskripsi}}</p>
                      </div>
                    </div>
                  </li>
            @endforeach 
            
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="gallery" class="gallery">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-10 text-center">
          <span>Memori Kisah Kami</span>
          <h2>Galeri Foto</h2>
          {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, itaque?</p> --}}
        </div>
      </div>

      <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center">
        @foreach ($wedding->weddinggaleri as $item)
          <div class="col mt-3">
            <a href="{{ asset('img/layanan/wedding/'.$item->photo)}}" data-toggle="lightbox" data-caption="{{ $item->nama}}" data-gallery="mygallery">
              <img src="{{ asset('img/layanan/wedding/'.$item->photo)}}" alt="Galeri" class="img-fluid w-100 rounded">
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <section id="rsvp" class="rsvp">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-10 text-center">
          <h2>Konfirmasi Kehadiran</h2>
          <p>Isi form di bawah ini untuk melakukan konfirmasi kehadiran.</p>
        </div>
      </div>

      <form class="row row-cols-md-auto g-3 align-items-center justify-content-center" method="POST"
        action=""
        id="form-kehadiran">
        @csrf
        <input type="hidden" name="s" value="kehadiran">
        <input type="hidden" name="wedding_id" value="{{ Crypt::encryptString($wedding->id)}}">
        <div class="col-12">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama">
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" min="1" max="5" length="1" value="1">
          </div>
        </div>
        <div class="col-12">
          <div class="mb-3">
            <label for="status" class="form-label">Konfirmasi</label>
            <select name="status" class="form-select" required>
              <option selected>Pilih salah satu</option>
              <option value="Hadir">Hadir</option>
              <option value="Tidak Hadir">Tidak Hadir</option>
            </select>
          </div>
        </div>
        <div class="col-12" style="margin-top: 35px;">
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </form>

      <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <section>
              <form class="row row-cols-md-auto g-3 align-items-center justify-content-center" action="" method="post" id="form-ucapan">
                @csrf
                <div class="col-12">
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama">
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label for="isi" class="form-label">Ucapan</label>
                    <textarea name="isi" id="" cols="30" rows="3" class="form-control"></textarea>
                  </div>
                </div>
                <div class="col-12" style="margin-top: 35px;">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </form>
            </section>
        </div>
      </div>

    </div>
  </section>

  <section id="gifts" class="gifts">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-10 text-center">
          <span>ungkapan tanda kasih</span>
          <h2>Kirim Hadiah</h2>
          {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam iure perferendis provident ab aliquam nemo. --}}
          </p>
        </div>
      </div>

      <div class="row justify-content-center text-center">
        <div class="col-md-6">
          <ul class="list-group">
            @if (!is_null($wedding->hadiah_nama1) AND !is_null($wedding->hadiah_no1) AND !is_null($wedding->hadiah_an1))
              <li class="list-group-item">
                <div class="fw-bold">{{ $wedding->hadiah_nama1}}</div>
                {{ $wedding->hadiah_no1}} - {{ $wedding->hadiah_an1}}
              </li>
            @endif
            @if (!is_null($wedding->hadiah_nama2) AND !is_null($wedding->hadiah_no2) AND !is_null($wedding->hadiah_an2))
              <li class="list-group-item">
                <div class="fw-bold">{{ $wedding->hadiah_nama2}}</div>
                {{ $wedding->hadiah_no2}} - {{ $wedding->hadiah_an2}}
              </li>
            @endif
            {{-- <li class="list-group-item">
              <div class="fw-bold">Saweria</div>
              <img src="{{ asset('wedding/wpu/img/saweria.png')}}" alt="Saweria QR" class="img-thumbnail" width="150">
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <small class="block">&copy; {{ ambil_tahun()}} {{ $wedding->weddingtemplate->nama}} . All Rights Reserved.</small>
          <small class="block">Design by {{ $wedding->weddingtemplate->design}} .</small>

          {{-- <ul class="mt-3">
            <li><a href="#"><i class="bi bi-instagram"></i></a></li>
            <li><a href="#"><i class="bi bi-youtube"></i></a></li>
            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
            <li><a href="#"><i class="bi bi-tiktok"></i></a></li>
          </ul> --}}
        </div>
      </div>
    </div>
  </footer>

  <div id="audio-container">
    <audio id="song" autoplay loop>
      <source src="{{ asset('wedding/wpu/audio/save-and-sound.mp3')}}" type="audio/mp3">
    </audio>

    <div class="audio-icon-wrapper" style="display: none;">
      <i class="bi bi-disc"></i>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.3/dist/index.bundle.min.js"></script>

  <script src="{{ asset('template/mazer/assets/extensions/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('template/mazer/assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>

  <script>
    let tanggal = @json($tanggal);
    simplyCountdown('.simply-countdown', {
      year: tanggal.year, // required
      month: tanggal.month, // required
      day: tanggal.day, // required
      hours: 0, // Default is 0 [0-23] integer
      words: { //words displayed into the countdown
        days: { singular: 'hari', plural: 'hari' },
        hours: { singular: 'jam', plural: 'jam' },
        minutes: { singular: 'menit', plural: 'menit' },
        seconds: { singular: 'detik', plural: 'detik' }
      },
    });
  </script>

  <script>
    const stickyTop = document.querySelector('.sticky-top');
    const offcanvas = document.querySelector('.offcanvas');

    offcanvas.addEventListener('show.bs.offcanvas', function () {
      stickyTop.style.overflow = 'visible';
    });

    offcanvas.addEventListener('hidden.bs.offcanvas', function () {
      stickyTop.style.overflow = 'hidden';
    });

  </script>

  <script>
    const rootElement = document.querySelector(":root");
    const audioIconWrapper = document.querySelector('.audio-icon-wrapper');
    const audioIcon = document.querySelector('.audio-icon-wrapper i');
    const song = document.querySelector('#song');
    let isPlaying = false;

    function disableScroll() {
      scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

      window.onscroll = function () {
        window.scrollTo(scrollTop, scrollLeft);
      }

      rootElement.style.scrollBehavior = 'auto';
    }

    function enableScroll() {
      window.onscroll = function () { }
      rootElement.style.scrollBehavior = 'smooth';
      // localStorage.setItem('opened', 'true');
      playAudio();
    }

    function playAudio() {
      song.volume = 0.1;
      audioIconWrapper.style.display = 'flex';
      song.play();
      isPlaying = true;
    }

    audioIconWrapper.onclick = function () {
      if (isPlaying) {
        song.pause();
        audioIcon.classList.remove('bi-disc');
        audioIcon.classList.add('bi-pause-circle');
      } else {
        song.play();
        audioIcon.classList.add('bi-disc');
        audioIcon.classList.remove('bi-pause-circle');
      }

      isPlaying = !isPlaying;
    }

    // if (!localStorage.getItem('opened')) {
    //   disableScroll();
    // }
    disableScroll();
  </script>
  <script>
    const Swal2 = Swal.mixin({
      customClass: {
        input: 'form-control'
      }
    })
      $('#form-kehadiran').submit(function (e) {
        e.preventDefault();

        let formData = $(this).serialize();

        $.post("{{ url('layananwedding')}}", formData, function (response) {
          $('#form-kehadiran')[0].reset();
        Swal2.fire("Konfirmasi Terkirim!", "Terima Kasih telah mengirim formulir kehadiran", "success")
        });
      });
  </script>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const nama = urlParams.get('n') || '';
    const pronoun = urlParams.get('p') || 'Bapak/Ibu/Saudara/i';
    const namaContainer = document.querySelector('.hero h4 span');
    namaContainer.innerText = `${pronoun} ${nama},`.replace(/ ,$/, ',');

    document.querySelector('#nama').value = nama;
  </script>
</body>

</html>