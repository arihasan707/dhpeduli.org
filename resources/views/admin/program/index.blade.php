<x-layouts.admin-layout>
    <x-layouts.navbar />

    <x-breadcumb>
        <h6 class="fw-semibold mb-0">{{ $title }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>- {{ $title }}</li>
        </ul>
    </x-breadcumb>

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
                <a href="{{route('program.create')}}"
                    class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="pepicons-pencil:paper-plane" class="text-xl"></iconify-icon>
                    Tambah
                </a>
            </div>
        </div>
        <div class="card-body overflow-x-auto">
            <table class="table bordered-table" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Program</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Kebutuhan Dana</th>
                        <th scope="col">Terkumpul</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex">
                                <img src="{{asset('upload/'. $row->img)}}" width="135px" alt="gambar_program"
                                    style="height: 90px;">
                                <p class="p-3">{{ $row->judul }}
                                </p>
                            </div>
                        </td>
                        <td>{{ $row->Kategori->nama }}</td>
                        <td>@rupiah($row->kebutuhan)</td>
                        <td>@rupiah($row->terkumpul)</td>
                        <td> <span
                                class="badge badge-sm text-sm rounded-pill fw-semibold bg-success-600 px-20 py-9 radius-4 text-white">Aktif</span>
                        </td>
                        <td>
                            <form action="{{route('program.destroy', $row->id)}}" method="POST">
                                <a href="{{route('program.show', $row->id)}}"
                                    class="w-32-px h-32-px bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="{{route('program.edit', $row->id)}}"
                                    class="w-32-px h-32-px bg-success text-white text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
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
    <script>
        let table = new DataTable("#dataTable", {
            "autoWidth": false,
            "columns": [{
                "width": ""
            }, {
                "width": "490px"
            }, {
                "width": "125px"
            }, {
                "width": "225px"
            }, {
                "width": "225px"
            }, {
                "width": "125px"
            }, {
                "width": "140px"
            }, ]
        });
    </script>
    @endpush

</x-layouts.admin-layout>