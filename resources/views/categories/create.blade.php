<x-app-layout>

    <x-slot name="header">

        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h2 class="h4 mb-0">
                    Add Category
                </h2>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </div>

        </div>

    </x-slot>


    <div class="container py-4">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-header">
                        <h5 class="mb-0">
                            Create New Category
                        </h5>
                    </div>


                    <div class="card-body">

                        <form action="{{ route('categories.store') }}"
                              method="POST">

                            @csrf


                            <div class="mb-3">

                                <label for="name"
                                       class="form-label">

                                    Category Name

                                </label>

                                <input type="text"
                                       name="name"
                                       id="name"
                                       value="{{ old('name') }}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Enter category name">


                                @error('name')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <div class="d-flex gap-2">

                                <button type="submit"
                                        class="btn btn-primary">

                                    Create Category

                                </button>


                                <a href="{{ route('categories.index') }}"
                                   class="btn btn-secondary">

                                    Cancel

                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>