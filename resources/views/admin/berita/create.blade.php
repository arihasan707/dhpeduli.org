<x-layouts.admin-layout>

    <x-layouts.navbar />

    <x-breadcrumb :title="$title" />


    <div class="row gy-4">
        <div class="col-md-12">
            <form action="{{route('program.store')}}" method="POST" enctype="multipart/form-data">
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
                            <a href="javascript:void(0)"
                                class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
                                <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
                                Draf
                            </a>
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
                                <label class="form-label">Deskripsi Singkat/Ajakan</label>
                                <textarea name="desc_singkat" class="form-control" rows="4" cols="50"
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
                                        <input id="upload-file" type="file" name="img" hidden>
                                    </label>
                                </div>
                            </div>
                            <!-- @error('gambar')
                                <div class=" @error('nama')
                                    is-invalid
                                @enderror"></div>
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror -->


                            <div class="col-12">
                                <label class="form-label">Deskripsi Detail Program</label>
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
                                        <input type="hidden" name="detail_program">
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

</x-layouts.admin-layout>