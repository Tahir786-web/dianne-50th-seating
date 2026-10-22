<x-app-layout>

    <x-slot name="header">

        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h2 class="h4 mb-0">
                    Category Details
                </h2>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </div>

        </div>

    </x-slot>


    <div class="container py-4">

        <div class="card shadow-sm mb-4">

            <div class="card-header">

                <h4 class="mb-0">
                    {{ $category->name }}
                </h4>

            </div>


            <div class="card-body">

                <p>
                    <strong>Total Posts:</strong>

                    <span class="badge bg-primary">
                        {{ $category->posts->count() }}
                    </span>
                </p>

                <p>
                    <strong>Created:</strong>
                    {{ $category->created_at->format('d M Y') }}
                </p>

            </div>

        </div>


        <div class="card shadow-sm">

            <div class="card-header">

                <h5 class="mb-0">
                    Posts in this Category
                </h5>

            </div>


            <div class="card-body">

                @forelse($category->posts as $post)

                    <div class="border-bottom py-3">

                        <h5>
                            {{ $post->title }}
                        </h5>

                        <p class="text-muted mb-0">

                            {{ Str::limit($post->content, 150) }}

                        </p>

                    </div>

                @empty

                    <p class="text-muted mb-0">
                        No posts in this category.
                    </p>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>