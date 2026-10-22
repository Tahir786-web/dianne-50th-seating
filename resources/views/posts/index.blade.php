<x-app-layout>

    {{-- Page Header --}}
    <x-slot name="header">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                <h2 class="h4 mb-1">
                    <i class="bi bi-file-earmark-text me-2"></i>
                    All Blog Posts
                </h2>

                <small class="text-muted">
                    Manage all your blog posts
                </small>
            </div>

            <a href="{{ route('posts.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle me-1"></i>
                Create New Post

            </a>

        </div>

    </x-slot>


    {{-- Page Content --}}
    <div class="container-fluid py-4">

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


        {{-- Posts --}}
        <div class="row">

            @forelse($posts as $post)

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="card h-100 shadow-sm border-0">

                        {{-- Post Image --}}
                        @if($post->image)

                            <img src="{{ asset('storage/' . $post->image) }}"
                                 class="card-img-top"
                                 alt="{{ $post->title }}"
                                 style="height: 200px; object-fit: cover;">

                        @else

                            <div class="bg-light d-flex align-items-center justify-content-center"
                                 style="height: 200px;">

                                <i class="bi bi-image text-muted"
                                   style="font-size: 3rem;">
                                </i>

                            </div>

                        @endif


                        {{-- Card Body --}}
                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title">

                                {{ $post->title }}

                            </h5>


                            {{-- Category --}}
                            @if($post->category)

                                <div class="mb-2">

                                    <span class="badge bg-primary">

                                        <i class="bi bi-folder me-1"></i>

                                        {{ $post->category->name }}

                                    </span>

                                </div>

                            @endif


                            {{-- Content --}}
                            <p class="card-text text-muted">

                                {{ Str::limit(strip_tags($post->content), 120) }}

                            </p>


                            {{-- Author --}}
                            @if($post->user)

                                <small class="text-muted mb-3">

                                    <i class="bi bi-person me-1"></i>

                                    {{ $post->user->name }}

                                </small>

                            @endif


                            {{-- Actions --}}
                            <div class="mt-auto d-flex gap-2">

                                <a href="{{ route('posts.show', $post) }}"
                                   class="btn btn-sm btn-outline-primary">

                                    <i class="bi bi-eye me-1"></i>
                                    View

                                </a>


                                <a href="{{ route('posts.edit', $post) }}"
                                   class="btn btn-sm btn-outline-warning">

                                    <i class="bi bi-pencil me-1"></i>
                                    Edit

                                </a>


                                <form action="{{ route('posts.destroy', $post) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this post?');">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger">

                                        <i class="bi bi-trash me-1"></i>
                                        Delete

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="card shadow-sm border-0">

                        <div class="card-body text-center py-5">

                            <i class="bi bi-file-earmark-x text-muted"
                               style="font-size: 4rem;">
                            </i>

                            <h4 class="mt-3">
                                No Posts Found
                            </h4>

                            <p class="text-muted">
                                You haven't created any blog posts yet.
                            </p>

                            <a href="{{ route('posts.create') }}"
                               class="btn btn-primary">

                                <i class="bi bi-plus-circle me-1"></i>

                                Create Your First Post

                            </a>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- Pagination --}}
        @if($posts->hasPages())

            <div class="d-flex justify-content-center mt-3">

                {{ $posts->links() }}

            </div>

        @endif

    </div>
{{-- Comments Section --}}
<div class="card shadow-sm border-0 mt-4">

    <div class="card-header bg-white py-3">

        <h5 class="mb-0">

            <i class="bi bi-chat-left-text me-2"></i>

            Comments

            <span class="badge bg-primary">
                {{ $post->comments->count() }}
            </span>

        </h5>

    </div>


    <div class="card-body p-4">


        {{-- Add Comment --}}
        @auth

            <form action="{{ route('comments.store', $post) }}"
                  method="POST"
                  class="mb-4">

                @csrf

                <label for="body"
                       class="form-label fw-semibold">

                    Write a Comment

                </label>

                <textarea
                    name="body"
                    id="body"
                    rows="4"
                    class="form-control @error('body') is-invalid @enderror"
                    placeholder="Write your comment..."
                >{{ old('body') }}</textarea>

                @error('body')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror


                <div class="mt-3">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-send me-1"></i>

                        Post Comment

                    </button>

                </div>

            </form>

        @else

            <div class="alert alert-info">

                <i class="bi bi-info-circle me-2"></i>

                Please
                <a href="{{ route('login') }}">
                    login
                </a>
                to post a comment.

            </div>

        @endauth


        {{-- Comments List --}}

        <hr>


        @forelse($post->comments as $comment)

            <div class="d-flex mb-4">

                {{-- User Icon --}}
                <div class="flex-shrink-0">

                    <div class="rounded-circle bg-primary text-white
                                d-flex align-items-center
                                justify-content-center"
                         style="width: 45px; height: 45px;">

                        <i class="bi bi-person"></i>

                    </div>

                </div>


                {{-- Comment Body --}}
                <div class="ms-3 flex-grow-1">

                    <div class="d-flex justify-content-between">

                        <div>

                            <h6 class="mb-1">

                                {{ $comment->user->name }}

                            </h6>

                            <small class="text-muted">

                                {{ $comment->created_at->diffForHumans() }}

                            </small>

                        </div>


                        {{-- Delete Button --}}
                        @if((int) $comment->user_id === (int) auth()->id())

                            <form action="{{ route('comments.destroy', $comment) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this comment?');">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        @endif

                    </div>


                    <div class="mt-2">

                        <p class="mb-0">
                            {{ $comment->body }}
                        </p>

                    </div>

                </div>

            </div>

        @empty

            <div class="text-center py-4">

                <i class="bi bi-chat-left text-muted"
                   style="font-size: 3rem;">
                </i>

                <h6 class="mt-3">
                    No comments yet
                </h6>

                <p class="text-muted mb-0">
                    Be the first person to comment on this post.
                </p>

            </div>

        @endforelse

    </div>

</div>
</x-app-layout>