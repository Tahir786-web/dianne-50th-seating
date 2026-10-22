<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

    <div class="container-fluid">

        {{-- Brand --}}
        <a class="navbar-brand fw-bold"
           href="{{ route('dashboard') }}">

            {{ config('app.name', 'Laravel Blog') }}

        </a>


        {{-- Mobile Toggle --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- Navbar Content --}}
        <div class="collapse navbar-collapse"
             id="mainNavbar">

            {{-- Left Navigation --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                {{-- Dashboard --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">

                        <i class="bi bi-speedometer2 me-1"></i>

                        Dashboard

                    </a>

                </li>


                {{-- Posts --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}"
                       href="{{ route('posts.index') }}">

                        <i class="bi bi-file-earmark-text me-1"></i>

                        Posts

                    </a>

                </li>


                {{-- Categories --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                       href="{{ route('categories.index') }}">

                        <i class="bi bi-folder me-1"></i>

                        Categories

                    </a>

                </li>

            </ul>


            {{-- Right Navigation --}}
            <ul class="navbar-nav">

                {{-- User Dropdown --}}
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       id="userDropdown"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        <i class="bi bi-person-circle me-1"></i>

                        {{ Auth::user()->name }}

                    </a>


                    <ul class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="userDropdown">

                        {{-- Profile --}}
                        <li>

                            <a class="dropdown-item"
                               href="{{ route('profile.edit') }}">

                                <i class="bi bi-person me-2"></i>

                                Profile

                            </a>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        {{-- Logout --}}
                        <li>

                            <form method="POST"
                                  action="{{ route('logout') }}">

                                @csrf

                                <button type="submit"
                                        class="dropdown-item">

                                    <i class="bi bi-box-arrow-right me-2"></i>

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </div>

</nav>