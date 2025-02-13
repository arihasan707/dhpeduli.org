<x-layouts.admin-layout>
    <x-layouts.navbar />

    <x-breadcrumb :title="$title" />

    <div class="row gy-6">
        <div class="col-lg-6">
            @if (session('status'))
            <x-massage-data>
                {{ session('status') }}
            </x-massage-data>
            @endif
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Daftar Kategori</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table striped-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>
                                        <img src="{{asset('upload/' . $row->img)}}" width="110px">
                                    </td>
                                    <td>
                                        <form action="{{route('kategori.destroy',$row->id)}}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"> <i
                                                    class="ri-delete-bin-line text-md"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- card end -->
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tambah Kategori</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('kategori.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="row gy-3">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control @error('nama')
                                    is-invalid
                                @enderror" placeholder="Masukan nama kategori" value="{{old('nama')}}">
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Gambar</label>
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
                                        <input id="upload-file" type="file" name="gambar" hidden>
                                    </label>
                                </div>
                                @error('gambar')
                                <div class=" @error('nama')
                                    is-invalid
                                @enderror"></div>
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary-600">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
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
    </script>
    @endpush

</x-layouts.admin-layout>