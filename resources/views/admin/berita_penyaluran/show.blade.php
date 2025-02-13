<x-layouts.admin-layout>

    @push('styles')
    <link rel="stylesheet" href="{{asset('backend/css/lib/editor-katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/lib/editor.atom-one-dark.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/lib/editor.quill.snow.css')}}">

    @endpush

    <x-layouts.navbar />

    <x-breadcrumb-berita-penyaluran :title="$title" :program="$program->judul" />

    @if ($errors->any())
    <div class=" alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row gy-4 mb-36">
        @if (session('status'))
        <x-massage-data>
            {{ session('status') }}
        </x-massage-data>
        @endif
        <div class="col-md-12">
            <form action="{{route('list-berita.store')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="program_id" value="{{ $program_id }}">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="d-flex align-items-end">
                            <h5 class="card-title">Tambah {{ $title }}</h5>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                            <button type="submit"
                                class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                                <iconify-icon icon="pepicons-pencil:paper-plane" class="text-xl"></iconify-icon>
                                Publish
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-12">
                                <label class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control"
                                    placeholder="Masukan judul berita..">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Keterangan Detail</label>
                                <div class="card basic-data-table radius-12 overflow-hidden">
                                    <div class="card-body p-0">
                                        <!-- Editor Toolbar Start -->
                                        <div id="toolbar-container">
                                            <span class="ql-formats">
                                                <select class="ql-font"></select>
                                                <select class="ql-size"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-bold"></button>
                                                <button class="ql-italic"></button>
                                                <button class="ql-underline"></button>
                                                <button class="ql-strike"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <select class="ql-color"></select>
                                                <select class="ql-background"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-script" value="sub"></button>
                                                <button class="ql-script" value="super"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-header" value="1"></button>
                                                <button class="ql-header" value="2"></button>
                                                <button class="ql-blockquote"></button>
                                                <button class="ql-code-block"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-list" value="ordered"></button>
                                                <button class="ql-list" value="bullet"></button>
                                                <button class="ql-indent" value="-1"></button>
                                                <button class="ql-indent" value="+1"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-direction" value="rtl"></button>
                                                <select class="ql-align"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-link"></button>
                                                <!--<button class="ql-image"></button>-->
                                                <!--<button class="ql-video"></button>-->
                                                <button class="ql-formula"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-clean"></button>
                                            </span>
                                        </div>
                                        <!-- Editor Toolbar Start -->

                                        <!-- Editor start -->
                                        <input type="hidden" name="ket_detail">
                                        <div id="editor"></div>

                                        <!-- Edit End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- card end -->

    <div class="card basic-data-table">
        <div class="card-header d-flex justify-content-between">
            <div class="d-flex align-items-end">
                <h5 class="card-title lh-1">Daftar {{ $title }}</h5>
            </div>
        </div>
        <div class="card-body overflow-x-auto">
            <table class="table bordered-table" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Waktu dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_berita as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->judul }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>
                            <form action="" method="POST">
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
    <script src="{{ asset('backend/js/editor.highlighted.min.js')}}"></script>
    <script src="{{asset('backend/js/editor.quill.js')}}"></script>
    <script src="{{ asset('backend/js/editor.katex.min.js') }}"></script>

    <script>
        let table = new DataTable("#dataTable");

        // Editor Js Start
        const quill = new Quill('#editor', {
            modules: {
                syntax: true,
                toolbar: '#toolbar-container',
            },
            placeholder: 'Silahkan tulis keterangan detail..',
            theme: 'snow',
        });
        quill.on('text-change', function() {
            $("input[name='ket_detail']").val(quill.root.innerHTML);
        })


        // Editor Js End
    </script>
    @endpush

</x-layouts.admin-layout>