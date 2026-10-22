<x-app-layout>

    <x-slot name="header">

        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h2 class="h4 mb-0">
                    Categories
                </h2>

                <a href="{{ route('categories.create') }}"
                   class="btn btn-primary">

                    <i class="bi bi-plus-circle"></i>
                    Add Category

                </a>

            </div>

        </div>

    </x-slot>


    <div class="container-fluid py-4">

        {{-- Success Message --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        {{-- Error Message --}}
        @if(session('error'))

            <div class="alert alert-danger alert-dismissible fade show">

                {{ session('error') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>

        @endif


        <div class="card shadow-sm">

            <div class="card-header bg-white">

                <h5 class="mb-0">
                    All Categories
                </h5>

            </div>


            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover table-bordered mb-0">

                        <thead class="table-light">

                            <tr>

                                <th width="80">
                                    #
                                </th>

                                <th>
                                    Category Name
                                </th>

                                <th>
                                    Posts
                                </th>

                                <th>
                                    Created
                                </th>

                                <th width="220">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($categories as $category)

                                <tr>

                                    <td>
                                        {{ $categories->firstItem() + $loop->index }}
                                    </td>

                                    <td>

                                        <strong>
                                            {{ $category->name }}
                                        </strong>

                                    </td>

                                    <td>

                                        <span class="badge bg-info">
                                            {{ $category->posts_count }}
                                        </span>

                                    </td>

                                    <td>
                                        {{ $category->created_at->format('d M Y') }}
                                    </td>

                                    <td>

                                        <a href="{{ route('categories.show', $category) }}"
                                           class="btn btn-sm btn-info text-white">

                                            View

                                        </a>


                                        <a href="{{ route('categories.edit', $category) }}"
                                           class="btn btn-sm btn-warning">

                                            Edit

                                        </a>


                                        <form action="{{ route('categories.destroy', $category) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this category?');">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger">

                                                Delete

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5"
                                        class="text-center py-4">

                                        No categories found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            @if($categories->hasPages())

                <div class="card-footer">

                    {{ $categories->links() }}

                </div>

            @endif

        </div>

    </div>

</x-app-layout>