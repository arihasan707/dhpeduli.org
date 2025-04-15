<x-layouts.admin-layout>
    <x-layouts.navbar />

    <x-breadcrumb :title="$title" />

    <div class="row gy-4">
        <div class="col-md-12">
            <form action="{{route('banner.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="d-flex align-items-end">
                            <h5 class="card-title">Input Data Banner</h5>
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
                            <div class="col-lg-8">
                                <label class="form-label">Link</label>
                                <textarea name="link" class="form-control" rows="4" cols="50"
                                    placeholder="Masukan Link Tujuan...">{{ $data->link }}</textarea>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Banner</label>
                                <div class="upload-image-wrapper d-flex align-items-center gap-3">
                                    <div
                                        class="uploaded-img d-none position-relative h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-solid bg-neutral-50">
                                        <button type="button"
                                            class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex">
                                            <iconify-icon icon="radix-icons:cross-2" class="text-xl text-danger-600">
                                            </iconify-icon>
                                        </button>
                                        <img id="uploaded-img__preview" class="w-100 h-100 object-fit-cover"
                                            src="{{asset('upload/banner/' . $data->img)}}" alt="image">
                                    </div>
                                    <label
                                        class="upload-file h-120-px w-120-px border input-form-light radius-8 overflow-hidden border-solid bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1"
                                        for="upload-file">
                                        <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light">
                                        </iconify-icon>
                                        <span class="fw-semibold text-secondary-light">Upload</span>
                                        <input id="upload-file" type="file" name="img" hidden>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- card end -->

    @push('scripts')
    <script>
        //Add image
        const fileInput = document.getElementById("upload-file");
        const imagePreview = document.getElementById("uploaded-img__preview");
        const uploadedImgContainer = document.querySelector(".uploaded-img");
        const removeButton = document.querySelector(".uploaded-img__remove");

        uploadedImgContainer.classList.remove('d-none')

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