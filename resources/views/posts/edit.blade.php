<x-app-layout>

    {{-- Page Header --}}
    <x-slot name="header">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h2 class="h4 mb-1">
                    <i class="bi bi-pencil-square me-2"></i>
                    Edit Blog Post
                </h2>

                <small class="text-muted">
                    Update your blog post
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


                {{-- Edit Post Card --}}
                <div class="card shadow-sm border-0">

                    {{-- Card Header --}}
                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">

                            <i class="bi bi-pencil-square me-2"></i>

                            Edit Post Information

                        </h5>

                    </div>


                    {{-- Card Body --}}
                    <div class="card-body p-4">

                        <form action="{{ route('posts.update', $post) }}"
                              method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            @method('PUT')


                            {{-- Post Title --}}
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
                                    value="{{ old('title', $post->title) }}"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    placeholder="Enter post title"
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
                                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
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
                                >{{ old('content', $post->content) }}</textarea>

                                @error('content')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                                <div class="form-text">

                                    Update your blog post content here.

                                </div>

                            </div>


                            {{-- Current Image --}}
                            @if($post->image)

                                <div class="mb-4">

                                    <label class="form-label fw-semibold">

                                        Current Featured Image

                                    </label>

                                    <div class="mb-2">

                                        <img
                                            src="{{ asset('storage/' . $post->image) }}"
                                            alt="{{ $post->title }}"
                                            class="img-thumbnail"
                                            style="max-width: 300px; max-height: 250px; object-fit: cover;"
                                        >

                                    </div>

                                    <small class="text-muted">

                                        Upload a new image below if you want to replace it.

                                    </small>

                                </div>

                            @endif


                            {{-- New Image --}}
                            <div class="mb-4">

                                <label for="image"
                                       class="form-label fw-semibold">

                                    {{ $post->image ? 'Replace Featured Image' : 'Featured Image' }}

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


                            {{-- New Image Preview --}}
                            <div class="mb-4 d-none"
                                 id="imagePreviewContainer">

                                <label class="form-label fw-semibold">

                                    New Image Preview

                                </label>

                                <div>

                                    <img
                                        id="imagePreview"
                                        src=""
                                        alt="New Image Preview"
                                        class="img-thumbnail"
                                        style="max-width: 300px; max-height: 250px; object-fit: cover;"
                                    >

                                </div>

                            </div>


                            {{-- Buttons --}}
                            <div class="border-top pt-4">

                                <div class="d-flex flex-wrap gap-2">

                                    <button type="submit"
                                            class="btn btn-success">

                                        <i class="bi bi-check-circle me-1"></i>

                                        Update Post

                                    </button>


                                    <a href="{{ route('posts.show', $post) }}"
                                       class="btn btn-info text-white">

                                        <i class="bi bi-eye me-1"></i>

                                        View Post

                                    </a>


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