<x-layouts.admin-layout>
    <x-layouts.navbar />

    <x-breadcrumb :title="$title" />

    <div class="card basic-data-table">
        @if (session('status'))
        <x-massage-data>
            {{ session('status') }}
        </x-massage-data>
        @endif
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex align-items-end">
                <h5 class="card-title lh-1">Daftar {{ $title }}</h5>
            </div>
        </div>
        <div class="card-body overflow-x-auto">
            <table class="table bordered-table" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Program Terkait</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Dari</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donasi as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><span
                                class="badge text-sm fw-semibold rounded-pill bg-light-600 px-20 py-9 radius-4 text-dark">{{ $row->kode }}
                            </span></td>
                        <td>
                            <div>
                                <span>{{ $row->program->judul }}</span>
                            </div>
                        </td>
                        <td>{{ date_format($row->created_at, 'd-M-Y') }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>@rupiah($row->amount)</td>
                        <td>
                            @switch($row->status)
                            @case('expire')
                            <span
                                class="badge badge-sm text-xs rounded-pill fw-semibold bg-danger-700 px-20 py-9 radius-4 text-white">Expired</span>
                            @break
                            @case('settlement')
                            <span
                                class="badge badge-sm text-xs rounded-pill fw-semibold bg-success-700 px-20 py-9 radius-4 text-white">Success</span>
                            @break
                            @default
                            <span
                                class="badge badge-sm text-xs rounded-pill fw-semibold bg-warning-700 px-20 py-9 radius-4 text-white">Pending</span>
                            @break
                            @endswitch
                        </td>
                        <td>
                            <form action="{{route('donasi.destroy', $row->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="position: relative; bottom:4px;"
                                    class="w-32-px h-32-px bg-danger text-white text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

    @push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    <script>
        let table = new DataTable("#dataTable", {
            "autoWidth": false,
            "columns": [{
                "width": ""
            }, {
                "width": ""
            }, {
                "width": "505px"
            }, {
                "width": ""
            }, {
                "width": ""
            }, {
                "width": ""
            }, {
                "width": ""
            }, {
                "width": ""
            }, ]
        });
    </script>
    @endpush

</x-layouts.admin-layout>