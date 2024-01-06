<x-mazer-layout title="Data Visitor" menu="visitor">
    <div class="page-heading">
        <x-mzheader
            judul="Visitor"
            deskripsi="Kelola dan Manajemen Visitor."
            halaman="Daftar Visitor">
        </x-mzheader>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Tanggal</th>
                                    <th>IP</th>
                                    <th>Browser</th>
                                    <th>Link</th>
                                    <th>Hits</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($visitor as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ date_indo($item->tanggal) }}</td>
                                        <td>{{ $item->ip }}</td>
                                        <td>{{ $item->browser }}</td>
                                        <td>{{ $item->link }}</td>
                                        <td class="text-center">{{ $item->hits }}</td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7">belum ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </section>
    </div>

</x-mazer-layout>