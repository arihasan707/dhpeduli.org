<x-layouts.admin-layout>
    <x-layouts.navbar />
    <x-breadcrumb :title="$title" />

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

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
                        <th>No</th>
                        <th>Nama Program</th>
                        <th>Berita Terbaru</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berita as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->Program->judul }}</td>
                        <td>
                            @switch($row->ListBerita->first())
                            @case(null)
                            -
                            @break
                            @default
                            {{ $row->ListBerita->first()->judul }}
                            @endswitch
                        </td>
                        <td>
                            <form action="" method="POST">
                                <a href="{{route('list-berita.show',[$row->id,$row->program_id])}}"
                                    class="w-32-px h-32-px bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="qlementine-icons:plus-16"></iconify-icon>
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

    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class=" fw-semibold mb-0" id="exampleModalLabel">Tambah Berita & Penyaluran</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('berita-penyaluran.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pilih Program Campaign</label>
                            <select class="form-select" name="program_id" id="">
                                <option value="">-- Pilihan Program --</option>
                                @foreach ($program as $row)
                                <option value="{{$row->id}}">{{ $row->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        //Remove flashdata massage
        $(".remove-button").on("click", function() {
            $(this).closest(".alert").addClass("d-none");
        });

        let table = new DataTable("#dataTable");
    </script>
    @endpush

</x-layouts.admin-layout>