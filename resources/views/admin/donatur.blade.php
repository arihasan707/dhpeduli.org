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
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                <a href="" data-bs-toggle="modal" data-bs-target="#tambah"
                    class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="ic:baseline-download" class="text-xl"></iconify-icon>
                    Export to Excel
                </a>
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
                        <th scope="col">No. Telp</th>
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
                        <td>{{ $row->telp }}</td>
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

    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class=" fw-semibold mb-0" id="exampleModalLabel">Filter Tanggal</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('donasi.export')}}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="exampleInputEmail1" class="form-label">Start Date</label>
                                <input class="form-control" type="date" name="start_date">
                            </div>
                            <div class="col-6">
                                <label for="exampleInputEmail1" class="form-label">End Date</label>
                                <input class="form-control" type="date" name="end_date">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-success">Export</button>
                </div>
                </form>
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
            }, {
                "width": ""
            }]
        });
    </script>
    @endpush

</x-layouts.admin-layout>