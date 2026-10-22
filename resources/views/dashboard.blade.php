<x-app-layout>

    {{-- Page Header --}}
    <x-slot name="header">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h2 class="h4 mb-1">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </h2>

                <small class="text-muted">
                    Welcome to your Blog Management System
                </small>

            </div>

            <a href="{{ route('posts.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle me-1"></i>

                Create New Post

            </a>

        </div>

    </x-slot>


    {{-- Dashboard Content --}}
    <div class="container-fluid py-4">

        {{-- Welcome Message --}}
        <div class="alert alert-primary border-0 shadow-sm mb-4">

            <div class="d-flex align-items-center">

                <div class="me-3">

                    <i class="bi bi-person-circle"
                       style="font-size: 2rem;">
                    </i>

                </div>

                <div>

                    <h5 class="mb-1">
                        Welcome, {{ Auth::user()->name }}!
                    </h5>

                    <p class="mb-0">
                        Manage your blog posts and categories from your dashboard.
                    </p>

                </div>

            </div>

        </div>


        {{-- Statistics --}}
        <div class="row g-4 mb-4">


            {{-- Total Posts --}}
            <div class="col-12 col-sm-6 col-xl-3">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <p class="text-muted mb-1">
                                    Total Posts
                                </p>

                                <h2 class="fw-bold mb-0">
                                    {{ \App\Models\Post::count() }}
                                </h2>

                            </div>

                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3">

                                <i class="bi bi-file-earmark-text"
                                   style="font-size: 1.5rem;">
                                </i>

                            </div>

                        </div>

                        <a href="{{ route('posts.index') }}"
                           class="small text-decoration-none">

                            View Posts
                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Total Categories --}}
            <div class="col-12 col-sm-6 col-xl-3">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <p class="text-muted mb-1">
                                    Categories
                                </p>

                                <h2 class="fw-bold mb-0">
                                    {{ \App\Models\Category::count() }}
                                </h2>

                            </div>

                            <div class="bg-success bg-opacity-10 text-success rounded-circle p-3">

                                <i class="bi bi-folder"
                                   style="font-size: 1.5rem;">
                                </i>

                            </div>

                        </div>

                        <a href="{{ route('categories.index') }}"
                           class="small text-decoration-none text-success">

                            View Categories
                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- My Posts --}}
            <div class="col-12 col-sm-6 col-xl-3">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <p class="text-muted mb-1">
                                    My Posts
                                </p>

                                <h2 class="fw-bold mb-0">
                                    {{ \App\Models\Post::where('user_id', Auth::id())->count() }}
                                </h2>

                            </div>

                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-3">

                                <i class="bi bi-person-lines-fill"
                                   style="font-size: 1.5rem;">
                                </i>

                            </div>

                        </div>

                        <a href="{{ route('posts.index') }}"
                           class="small text-decoration-none text-warning">

                            Manage Posts
                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Today's Posts --}}
            <div class="col-12 col-sm-6 col-xl-3">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <p class="text-muted mb-1">
                                    Today's Posts
                                </p>

                                <h2 class="fw-bold mb-0">
                                    {{ \App\Models\Post::whereDate('created_at', today())->count() }}
                                </h2>

                            </div>

                            <div class="bg-info bg-opacity-10 text-info rounded-circle p-3">

                                <i class="bi bi-calendar-check"
                                   style="font-size: 1.5rem;">
                                </i>

                            </div>

                        </div>

                        <span class="small text-muted">
                            Posts created today
                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- Quick Actions --}}
        <div class="row g-4">


            {{-- Quick Actions --}}
            <div class="col-12 col-lg-8">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">

                            <i class="bi bi-lightning-charge me-2"></i>

                            Quick Actions

                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="row g-3">


                            {{-- Create Post --}}
                            <div class="col-12 col-md-6">

                                <a href="{{ route('posts.create') }}"
                                   class="btn btn-primary w-100 py-3">

                                    <i class="bi bi-plus-circle me-2"></i>

                                    Create New Post

                                </a>

                            </div>


                            {{-- View Posts --}}
                            <div class="col-12 col-md-6">

                                <a href="{{ route('posts.index') }}"
                                   class="btn btn-outline-primary w-100 py-3">

                                    <i class="bi bi-file-earmark-text me-2"></i>

                                    Manage Posts

                                </a>

                            </div>


                            {{-- Create Category --}}
                            <div class="col-12 col-md-6">

                                <a href="{{ route('categories.create') }}"
                                   class="btn btn-success w-100 py-3">

                                    <i class="bi bi-folder-plus me-2"></i>

                                    Add Category

                                </a>

                            </div>


                            {{-- Manage Categories --}}
                            <div class="col-12 col-md-6">

                                <a href="{{ route('categories.index') }}"
                                   class="btn btn-outline-success w-100 py-3">

                                    <i class="bi bi-folder me-2"></i>

                                    Manage Categories

                                </a>

                            </div>


                        </div>

                    </div>

                </div>

            </div>


            {{-- System Information --}}
            <div class="col-12 col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-header bg-white py-3">

                        <h5 class="mb-0">

                            <i class="bi bi-info-circle me-2"></i>

                            System Information

                        </h5>

                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Application
                            </span>

                            <strong>
                                {{ config('app.name', 'Laravel Blog') }}
                            </strong>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Laravel
                            </span>

                            <strong>
                                {{ app()->version() }}
                            </strong>

                        </div>


                        <div class="d-flex justify-content-between mb-3">

                            <span class="text-muted">
                                Environment
                            </span>

                            <span class="badge bg-success">
                                {{ app()->environment() }}
                            </span>

                        </div>


                        <div class="d-flex justify-content-between">

                            <span class="text-muted">
                                Status
                            </span>

                            <span class="badge bg-success">

                                <i class="bi bi-check-circle me-1"></i>

                                Active

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>