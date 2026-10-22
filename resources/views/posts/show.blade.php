<x-app-layout>

    {{-- Page Header --}}
    <x-slot name="header">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h2 class="h4 mb-1">
                    <i class="bi bi-file-earmark-text me-2"></i>
                    Blog Post
                </h2>

                <small class="text-muted">
                    View post details
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

                {{-- Success Message --}}
                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show"
                         role="alert">

                        <i class="bi bi-check-circle me-2"></i>

                        {{ session('success') }}

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif


                {{-- Post Card --}}
                <div class="card shadow-sm border-0 overflow-hidden">

                    {{-- Featured Image --}}
                    @if($post->image)

                        <img src="{{ asset('storage/' . $post->image) }}"
                             alt="{{ $post->title }}"
                             class="w-100"
                             style="max-height: 500px; object-fit: cover;">

                    @else

                        <div class="bg-light d-flex align-items-center justify-content-center"
                             style="height: 300px;">

                            <div class="text-center text-muted">

                                <i class="bi bi-image"
                                   style="font-size: 5rem;">
                                </i>

                                <p class="mt-2 mb-0">
                                    No Featured Image
                                </p>

                            </div>

                        </div>

                    @endif


                    {{-- Post Body --}}
                    <div class="card-body p-4 p-md-5">

                        {{-- Category --}}
                        @if($post->category)

                            <div class="mb-3">

                                <span class="badge bg-primary">

                                    <i class="bi bi-folder me-1"></i>

                                    {{ $post->category->name }}

                                </span>

                            </div>

                        @endif


                        {{-- Title --}}
                        <h1 class="display-5 fw-bold mb-3">

                            {{ $post->title }}

                        </h1>


                        {{-- Post Information --}}
                        <div class="d-flex flex-wrap gap-3 text-muted mb-4">

                            {{-- Author --}}
                            @if($post->user)

                                <div>

                                    <i class="bi bi-person-circle me-1"></i>

                                    {{ $post->user->name }}

                                </div>

                            @endif


                            {{-- Created Date --}}
                            <div>

                                <i class="bi bi-calendar3 me-1"></i>

                                {{ $post->created_at->format('d M Y') }}

                            </div>


                            {{-- Updated Date --}}
                            @if($post->updated_at->gt($post->created_at))

                                <div>

                                    <i class="bi bi-clock me-1"></i>

                                    Updated
                                    {{ $post->updated_at->format('d M Y') }}

                                </div>

                            @endif

                        </div>


                        <hr>


                        {{-- Content --}}
                        <div class="post-content mt-4">

                            {!! nl2br(e($post->content)) !!}

                        </div>


                        {{-- Post Actions --}}
                        <div class="border-top mt-5 pt-4">

                            <div class="d-flex flex-wrap gap-2">

                                <a href="{{ route('posts.edit', $post) }}"
                                   class="btn btn-warning">

                                    <i class="bi bi-pencil me-1"></i>

                                    Edit Post

                                </a>


                                <form action="{{ route('posts.destroy', $post) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this post?');">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger">

                                        <i class="bi bi-trash me-1"></i>

                                        Delete Post

                                    </button>

                                </form>


                                <a href="{{ route('posts.index') }}"
                                   class="btn btn-secondary">

                                    <i class="bi bi-arrow-left me-1"></i>

                                    Back

                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- COMMENTS SECTION --}}
                {{-- ================================================= --}}

                <div class="card shadow-sm border-0 mt-4">

                    {{-- Comments Header --}}
                    <div class="card-header bg-white py-3">

                        <div class="d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">

                                <i class="bi bi-chat-left-text me-2"></i>

                                Comments

                            </h5>

                            <span class="badge bg-primary">

                                {{ $post->comments->count() }}

                            </span>

                        </div>

                    </div>


                    <div class="card-body p-4">


                        {{-- Add Comment --}}
                        @auth

                            <div class="mb-4">

                                <h6 class="fw-bold mb-3">

                                    <i class="bi bi-pencil-square me-1"></i>

                                    Write a Comment

                                </h6>


                                <form action="{{ route('comments.store', $post) }}"
                                      method="POST">

                                    @csrf


                                    <div class="mb-3">

                                        <textarea
                                            name="body"
                                            rows="4"
                                            class="form-control @error('body') is-invalid @enderror"
                                            placeholder="Write your comment here..."
                                        >{{ old('body') }}</textarea>


                                        @error('body')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    <button type="submit"
                                            class="btn btn-primary">

                                        <i class="bi bi-send me-1"></i>

                                        Post Comment

                                    </button>

                                </form>

                            </div>

                        @else

                            <div class="alert alert-info">

                                <i class="bi bi-info-circle me-2"></i>

                                You must be logged in to post a comment.

                                <a href="{{ route('login') }}"
                                   class="fw-bold">

                                    Login

                                </a>

                            </div>

                        @endauth


                        <hr class="my-4">


                        {{-- ================================================= --}}
                        {{-- THIS POST'S COMMENTS ONLY --}}
                        {{-- ================================================= --}}

                        <h6 class="fw-bold mb-4">

                            <i class="bi bi-chat-dots me-1"></i>

                            Comments on this post

                        </h6>


                        @forelse($post->comments as $comment)

                            <div class="comment-item border rounded p-3 mb-3">

                                <div class="d-flex">


                                    {{-- User Avatar --}}
                                    <div class="flex-shrink-0">

                                        <div class="rounded-circle bg-primary text-white
                                                    d-flex align-items-center
                                                    justify-content-center"
                                             style="width: 45px; height: 45px;">

                                            <i class="bi bi-person"></i>

                                        </div>

                                    </div>


                                    {{-- Comment Information --}}
                                    <div class="ms-3 flex-grow-1">


                                        {{-- User + Date --}}
                                        <div class="d-flex justify-content-between align-items-start">

                                            <div>

                                                <h6 class="mb-1 fw-bold">

                                                    {{ $comment->user->name }}

                                                </h6>

                                                <small class="text-muted">

                                                    <i class="bi bi-clock me-1"></i>

                                                    {{ $comment->created_at->diffForHumans() }}

                                                </small>

                                            </div>


                                            {{-- Delete Own Comment --}}
                                            @auth

                                                @if((int) $comment->user_id === (int) auth()->id())

                                                    <form action="{{ route('comments.destroy', $comment) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Are you sure you want to delete this comment?');">

                                                        @csrf

                                                        @method('DELETE')

                                                        <button type="submit"
                                                                class="btn btn-sm btn-outline-danger"
                                                                title="Delete Comment">

                                                            <i class="bi bi-trash"></i>

                                                        </button>

                                                    </form>

                                                @endif

                                            @endauth

                                        </div>


                                        {{-- Comment Text --}}
                                        <div class="mt-3">

                                            <p class="mb-0">

                                                {{ $comment->body }}

                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        @empty

                            {{-- No Comments --}}
                            <div class="text-center py-5">

                                <div class="mb-3">

                                    <i class="bi bi-chat-left-text text-muted"
                                       style="font-size: 3.5rem;">
                                    </i>

                                </div>

                                <h6 class="fw-bold">

                                    No Comments Yet

                                </h6>

                                <p class="text-muted mb-0">

                                    Be the first person to comment on this post.

                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Custom Styling --}}
    <style>

        .post-content {
            font-size: 1.1rem;
            line-height: 1.9;
            color: #343a40;
            white-space: normal;
            word-wrap: break-word;
        }

        .post-content p {
            margin-bottom: 1rem;
        }

        .comment-item {
            transition: background-color 0.2s ease;
        }

        .comment-item:hover {
            background-color: #f8f9fa;
        }

    </style>

</x-app-layout>