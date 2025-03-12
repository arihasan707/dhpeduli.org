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
                <a href="{{route('berita.create')}}"
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
                        <th scope="col">Foto</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Program Terkait</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berita as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{asset('upload/berita/' . $row->foto)}}" width="150"></td>
                        <td>{{ $row->judul }}</td>
                        <td>{{ $row->Program->judul }}</td>
                        <td>
                            <form action="{{route('berita.destroy', $row->id)}}" method="POST">
                                <!-- <a href="{{route('program.show', $row->id)}}"
                                    class="w-32-px h-32-px bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a>
                                <a href="{{route('program.edit', $row->id)}}"
                                    class="w-32-px h-32-px bg-success text-white text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a> -->
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

    @push('scripts')
    <script>
        let table = new DataTable("#dataTable");
    </script>
    @endpush

</x-layouts.admin-layout>