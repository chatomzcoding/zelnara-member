<x-mazer-layout title="Dashboard" menu="dashboard">
    <div class="page-heading">
        <h3>Profile Statistics</h3>
    </div> 
    <div class="page-content"> 
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Visit</h6>
                                        <h6 class="font-extrabold mb-0">{{ $statistik['visit']}}</h6>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card"> 
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Visitor</h6>
                                        <h6 class="font-extrabold mb-0">{{ $statistik['visitor']}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldFolder"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Layanan</h6>
                                        <h6 class="font-extrabold mb-0">{{ $statistik['layanan']}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Member</h6>
                                        <h6 class="font-extrabold mb-0">{{ $statistik['member']}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Visit Bulan {{ bulan_indo()}} {{ ambil_tahun()}}</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Statistik Harian</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-primary" width="32" height="32" fill="blue"
                                                style="width:10px">
                                                <use
                                                    xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">Visitor</h5>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="mb-0 text-end">{{ $statistik['visitor-harian']}}</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-europe"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-success" width="32" height="32" fill="blue"
                                                style="width:10px">
                                                <use
                                                    xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">Visit</h5>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="mb-0 text-end">{{ $statistik['visit-harian']}}</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-america"></div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-7">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-danger" width="32" height="32" fill="blue"
                                                style="width:10px">
                                                <use
                                                    xlink:href="assets/static/images/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">Indonesia</h5>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="mb-0 text-end">1025</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-indonesia"></div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Layanan Terbaru</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($layanan as $item)
                                                <tr>
                                                    <td class="col-4">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <img src="{{ asset('img/sistem/'.$item->logo)}}" alt="Face 1">
                                                            </div>
                                                            <p class="font-bold ms-3 mb-0 small">{{ $item->nama}}</p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0">{{ $item->deskripsi }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-md">
                                <img src="{{ asset('img/sistem/'.$datapokok->favicon)}}" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Zelnara Official</h5>
                                <h6 class="text-muted mb-0">@zelnara</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pb-1">
                        <h4>Voting</h4>
                    </div>
                    <div class="card-content pb-2">
                        @foreach ($voting as $item)
                            <div class="recent-message d-flex px-4 py-2">
                                <div class="avatar avatar-lg">
                                    <img src="{{ asset('img/layanan/voting/'.$item->gambar)}}" alt="Face 1">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1 small">{{ $item->nama }}</h5>
                                    <h6 class="text-muted mb-0 small">{{ $item->view}} Dilihat</h6>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="px-4">
                            <a href="{{ url('superadmin/layanan')}}" class='btn btn-block btn-outline-primary font-bold mt-3'>Selengkapnya</a>
                        </div> --}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pb-1">
                        <h4>Link</h4>
                    </div>
                    <div class="card-content pb-2">
                        @foreach ($link as $item)
                            <div class="recent-message d-flex px-4 py-2">
                                <div class="avatar avatar-lg">
                                    <img src="{{ asset('img/layanan/link/'.$item->gambar)}}" alt="Face 1">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1 small">{{ $item->judul }}</h5>
                                    <h6 class="text-muted mb-0 small">{{ $item->view}} Dilihat</h6>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="px-4">
                            <a href="{{ url('superadmin/layanan')}}" class='btn btn-block btn-outline-primary font-bold mt-3'>Selengkapnya</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-slot name="kodejs">
        <script src="{{ url('vendor/mazer/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
        {{-- <script>
            var optionsProfileVisit = {
                annotations: {
                    position: "back",
                },
                dataLabels: {
                    enabled: false,
                },
                chart: {
                    type: "bar",
                    height: 300,
                },
                fill: {
                    opacity: 1,
                },
                plotOptions: {},
                series: [
                    {
                    name: "visit",
                    data: @json($statistik->grafik['nilai']),
                    },
                ],
                colors: "#435ebe",
                xaxis: {
                    categories: @json($statistik->grafik['label']),
                },
                }
                let optionsVisitorsProfile = {
                series: [70, 30],
                labels: ["Male", "Female"],
                colors: ["#435ebe", "#55c6e8"],
                chart: {
                    type: "donut",
                    width: "100%",
                    height: "350px",
                },
                legend: {
                    position: "bottom",
                },
                plotOptions: {
                    pie: {
                    donut: {
                        size: "30%",
                    },
                    },
                },
                }

                var optionsEurope = {
                series: [
                    {
                    name: "series1",
                    data: [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605],
                    },
                ],
                chart: {
                    height: 80,
                    type: "area",
                    toolbar: {
                    show: false,
                    },
                },
                colors: ["#5350e9"],
                stroke: {
                    width: 2,
                },
                grid: {
                    show: false,
                },
                dataLabels: {
                    enabled: false,
                },
                xaxis: {
                    type: "datetime",
                    categories: [
                    "2018-09-19T00:00:00.000Z",
                    "2018-09-19T01:30:00.000Z",
                    "2018-09-19T02:30:00.000Z",
                    "2018-09-19T03:30:00.000Z",
                    "2018-09-19T04:30:00.000Z",
                    "2018-09-19T05:30:00.000Z",
                    "2018-09-19T06:30:00.000Z",
                    "2018-09-19T07:30:00.000Z",
                    "2018-09-19T08:30:00.000Z",
                    "2018-09-19T09:30:00.000Z",
                    "2018-09-19T10:30:00.000Z",
                    "2018-09-19T11:30:00.000Z",
                    ],
                    axisBorder: {
                    show: false,
                    },
                    axisTicks: {
                    show: false,
                    },
                    labels: {
                    show: false,
                    },
                },
                show: false,
                yaxis: {
                    labels: {
                    show: false,
                    },
                },
                tooltip: {
                    x: {
                    format: "dd/MM/yy HH:mm",
                    },
                },
                }

                let optionsAmerica = {
                ...optionsEurope,
                colors: ["#008b75"],
                }
                let optionsIndonesia = {
                ...optionsEurope,
                colors: ["#dc3545"],
                }

                var chartProfileVisit = new ApexCharts(
                document.querySelector("#chart-profile-visit"),
                optionsProfileVisit
                )
                var chartVisitorsProfile = new ApexCharts(
                document.getElementById("chart-visitors-profile"),
                optionsVisitorsProfile
                )
                var chartEurope = new ApexCharts(
                document.querySelector("#chart-europe"),
                optionsEurope
                )
                var chartAmerica = new ApexCharts(
                document.querySelector("#chart-america"),
                optionsAmerica
                )
                var chartIndonesia = new ApexCharts(
                document.querySelector("#chart-indonesia"),
                optionsIndonesia
                )

                chartIndonesia.render()
                chartAmerica.render()
                chartEurope.render()
                chartProfileVisit.render()
                chartVisitorsProfile.render()

        </script> --}}
    </x-slot>
</x-mazer-layout>


