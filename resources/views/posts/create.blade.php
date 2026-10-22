<x-app-layout>

    {{-- Page Header --}}
    <x-slot name="header">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h2 class="h4 mb-1">
                    <i class="bi bi-file-earmark-plus me-2"></i>
                    Create New Post
                </h2>

                <small class="text-muted">
                    Create a new blog post
                </small>
            </div>

            <a href="{{ route('posts.index') }}"
               class="btn btn-outline-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Back to Posts

            </a>

        </div>

    </x-slot>


    {{-- Page Content --}}
    <div class="container-fluid py-4">

        <div class="row justify-content-center">

            <div class="col-12 col-xl-9">

                {{-- Validation Errors --}}
                @if($errors->any())

                    <div class="alert alert-danger alert-dismissible fade show"
                         role="alert">

                        <div class="fw-bold mb-2">

                            <i class="bi bi-exclamation-triangle me-1"></i>

                            Please fix the following errors:

                        </div>

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif


                <div class="card shadow-sm border-0">

                    {{-- Card Header --}}
                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">

                            <i class="bi bi-pencil-square me-2"></i>

                            Post Information

                        </h5>

                    </div>


                    {{-- Card Body --}}
                    <div class="card-body p-4">

                        <form action="{{ route('posts.store') }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf


                            {{-- Title --}}
                            <div class="mb-4">

                                <label for="title"
                                       class="form-label fw-semibold">

                                    Post Title
                                    <span class="text-danger">*</span>

                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    value="{{ old('title') }}"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    placeholder="Enter post title"
                                    autofocus
                                >

                                @error('title')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Category --}}
                            <div class="mb-4">

                                <label for="category_id"
                                       class="form-label fw-semibold">

                                    Category
                                    <span class="text-danger">*</span>

                                </label>

                                <select
                                    name="category_id"
                                    id="category_id"
                                    class="form-select @error('category_id') is-invalid @enderror"
                                >

                                    <option value="">
                                        Select Category
                                    </option>

                                    @foreach($categories as $category)

                                        <option
                                            value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                                        >

                                            {{ $category->name }}

                                        </option>

                                    @endforeach

                                </select>

                                @error('category_id')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- Content --}}
                            <div class="mb-4">

                                <label for="content"
                                       class="form-label fw-semibold">

                                    Post Content
                                    <span class="text-danger">*</span>

                                </label>

                                <textarea
                                    name="content"
                                    id="content"
                                    rows="12"
                                    class="form-control @error('content') is-invalid @enderror"
                                    placeholder="Write your blog post content here..."
                                >{{ old('content') }}</textarea>

                                @error('content')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                                <div class="form-text">
                                    Write clear and engaging content for your readers.
                                </div>

                            </div>


                            {{-- Featured Image --}}
                            <div class="mb-4">

                                <label for="image"
                                       class="form-label fw-semibold">

                                    Featured Image

                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    accept="image/jpeg,image/png,image/jpg,image/webp"
                                    class="form-control @error('image') is-invalid @enderror"
                                >

                                @error('image')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                                <div class="form-text">

                                    Recommended formats:
                                    JPG, JPEG, PNG, or WebP.

                                </div>

                            </div>


                            {{-- Image Preview --}}
                            <div class="mb-4 d-none"
                                 id="imagePreviewContainer">

                                <label class="form-label fw-semibold">
                                    Image Preview
                                </label>

                                <div>

                                    <img id="imagePreview"
                                         src=""
                                         alt="Image Preview"
                                         class="img-thumbnail"
                                         style="max-height: 250px;">

                                </div>

                            </div>


                            {{-- Buttons --}}
                            <div class="border-top pt-4">

                                <div class="d-flex flex-wrap gap-2">

                                    <button type="submit"
                                            class="btn btn-primary">

                                        <i class="bi bi-save me-1"></i>

                                        Create Post

                                    </button>


                                    <a href="{{ route('posts.index') }}"
                                       class="btn btn-secondary">

                                        <i class="bi bi-x-circle me-1"></i>

                                        Cancel

                                    </a>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Image Preview Script --}}
    @push('scripts')

        <script>

            document.getElementById('image').addEventListener('change', function (event) {

                const file = event.target.files[0];

                const previewContainer =
                    document.getElementById('imagePreviewContainer');

                const preview =
                    document.getElementById('imagePreview');


                if (file) {

                    preview.src = URL.createObjectURL(file);

                    previewContainer.classList.remove('d-none');

                } else {

                    preview.src = '';

                    previewContainer.classList.add('d-none');

                }

            });

        </script>

    @endpush

</x-app-layout>