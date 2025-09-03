<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <!-- Brand/Logo -->
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <i class="fas fa-newspaper me-2"></i>NewsPortal
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Main Navigation -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-globe me-1"></i> News
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-newspaper me-2"></i> Headlines</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-bolt me-2"></i> Breaking News</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-tag me-2"></i> Popular</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-layer-group me-1"></i> Categories
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-briefcase me-2"></i> Business</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-microchip me-2"></i> Technology</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-basketball-ball me-2"></i> Sports</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-heartbeat me-2"></i> Health</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-film me-2"></i> Entertainment</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-info-circle me-1"></i> About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-phone me-1"></i> Contact
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link" style="display:inline; padding:0; border:none; background:none;">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </button>
                    </form>
                </li> -->



            </ul>

            <!-- Search Form -->
            <form class=" d-flex me-2 my-2 my-lg-0">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search news..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>

            <!-- User Actions -->
            <div class="d-flex">
                @guest
                <!-- Show when user is not logged in -->
                <a href="{{ route('login.form') }}" class="btn btn-outline-light me-2">
                    <i class="fas fa-sign-in-alt me-1"></i> Login
                </a>
                <a href="{{ route('register.form') }}" class="btn btn-primary">
                    <i class="fas fa-user-plus me-1"></i> Register
                </a>
                @endguest

                @auth
                <div class="dropdown">
                    <a class="btn btn-outline-light dropdown-toggle" href="#" role="button"
                        id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-1"></i> {{ auth()->user()->first_name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-user me-2"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item w-100 text-start">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth

            </div>


        </div>
    </div>
</nav>

<!-- Breaking News Ticker -->
<div class="bg-danger text-white py-2">
    <div class="container">
        <div class="d-flex align-items-center">
            <span class="badge bg-light text-danger me-3">BREAKING</span>
            <marquee behavior="scroll" direction="left" class="breaking-news">
                Major climate agreement reached at international summit • New technology breakthrough promises faster internet speeds • Local team wins national championship after 20-year drought
            </marquee>
        </div>
    </div>
</div>




<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .navbar {
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%) !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        padding: 0.5rem 0;
    }

    .navbar-brand {
        font-size: 1.5rem;
        display: flex;
        align-items: center;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 0.5rem 1rem !important;
        border-radius: 4px;
        margin: 0 2px;
        transition: all 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-1px);
    }

    .dropdown-menu {
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    }

    .dropdown-item {
        color: #fff;
        display: flex;
        align-items: center;
        padding: 0.5rem 1rem;
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }

    .breaking-news {
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .navbar-nav {
            margin: 0.5rem 0;
        }

        .nav-link {
            padding: 0.75rem 1rem !important;
        }

        .d-flex {
            margin: 0.5rem 0;
        }
    }
</style>