<x-layouts.admin-layout>


    @push('styles')
    <link rel="stylesheet" href="{{asset('backend/css/lib/editor-katex.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/lib/editor.atom-one-dark.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/lib/editor.quill.snow.css')}}">
    @endpush

    <x-layouts.navbar />

    <x-breadcrumb :title="$title" />

    <div class="row gy-4">
        <div class="col-md-12">
            <form action="{{route('berita.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="d-flex align-items-end">
                            <h5 class="card-title">Input Data Program</h5>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                            <button type="submit"
                                class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1">
                                <iconify-icon icon="pepicons-pencil:paper-plane" class="text-xl"></iconify-icon>
                                Publish
                            </button>
                            <!-- <a href="javascript:void(0)"
                                class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
                                <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
                                Draf
                            </a> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-6">
                                <label class="form-label">Judul</label>
                                <input type="text" name="judul" class="form-control" placeholder="Masukan judul..">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Pilih Program Campaign</label>
                                <select name="prog" class="form-select">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($dataProg as $row )
                                    <option value="{{$row->id}}">{{ $row->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-8">
                                <label class="form-label">Kalimat Ajakan</label>
                                <textarea name="cta" class="form-control" rows="4" cols="50"
                                    placeholder="Masukan deskripsi singkat..."></textarea>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Flayer</label>
                                <div class="upload-image-wrapper d-flex align-items-center gap-3">
                                    <div
                                        class="uploaded-img d-none position-relative h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-solid bg-neutral-50">
                                        <button type="button"
                                            class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex">
                                            <iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600">
                                            </iconify-icon>
                                        </button>
                                        <img id="uploaded-img__preview" class="w-100 h-100 object-fit-cover"
                                            src="assets/images/user.png" alt="image">
                                    </div>
                                    <label
                                        class="upload-file h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-solid bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                        for="upload-file">
                                        <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light">
                                        </iconify-icon>
                                        <span class="fw-semibold text-secondary-light">Upload</span>
                                        <input id="upload-file" type="file" name="foto" hidden>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Detail Isi Berita</label>
                                <x-part.quill-editor>
                                    <!-- Editor start -->
                                    <input type="hidden" name="isi_berita">
                                    <div id="editor"></div>
                                </x-part.quill-editor>
                            </div>
                            <!-- @error('gambar')
                                <div class=" @error('nama')
                                    is-invalid
                                @enderror"></div>
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- card end -->

    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="{{ asset('backend/js/editor.highlighted.min.js')}}"></script>
    <script src="{{asset('backend/js/editor.quill.js')}}"></script>
    <script src="{{ asset('backend/js/editor.katex.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-compress@2.0/dist/quill.imageCompressor.min.js"></script>

    <script>
        //Remove flashdata massage
        $(".remove-button").on("click", function() {
            $(this).closest(".alert").addClass("d-none");
        });

        //Add image
        const fileInput = document.getElementById("upload-file");
        const imagePreview = document.getElementById("uploaded-img__preview");
        const uploadedImgContainer = document.querySelector(".uploaded-img");
        const removeButton = document.querySelector(".uploaded-img__remove");

        fileInput.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                imagePreview.src = src;
                uploadedImgContainer.classList.remove('d-none');
            }
        });
        removeButton.addEventListener("click", () => {
            imagePreview.src = "";
            uploadedImgContainer.classList.add('d-none');
            fileInput.value = "";
        });


        // Editor Js Start
        Quill.register("modules/imageCompressor", imageCompressor);

        const quill = new Quill('#editor', {
            modules: {
                syntax: true,
                toolbar: '#toolbar-container',
                imageCompressor: {
                    quality: 0.8,
                    maxWidth: 1000, // default
                    maxHeight: 1000, // default
                    imageType: 'image/jpeg'
                }
            },
            placeholder: 'Silahkan tulis detail tentang program..',
            theme: 'snow',
        });
        quill.on('text-change', function() {
            $("input[name='isi_berita']").val(quill.root.innerHTML);
        })


        // Editor Js End

        let table = new DataTable('#dataTable');
    </script>

    @endpush

</x-layouts.admin-layout>