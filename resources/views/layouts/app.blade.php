<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Repair Management')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        .card {
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        footer {
            margin-top: 50px;
            text-align: center;
        }
    </style>

    @stack('styles') <!-- สำหรับสไตล์เพิ่มเติมในแต่ละหน้า -->
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="">
                <img src="{{ asset('/logo.png') }}" width="30" height="30" alt="Logo">
                <span class="ms-2">Repair Management</span>
            </a>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item d-flex align-items-center">
                    <img src="{{ asset('management.png') }}" width="30" height="30" alt="Management" class="me-2">

                        <a class="nav-link" href="#">
                            <i class="fas fa-user-circle"></i> {{ auth()->user()->name }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-outline-danger ms-2" type="submit">
                                <i class="fas fa-sign-out-alt"></i> ออกจากระบบ
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="">เข้าสู่ระบบ</a>
                    </li>
                @endauth
            </ul>
        </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <small>© 2025 Repair Management System</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts') <!-- สำหรับสคริปต์เพิ่มเติมในแต่ละหน้า -->

</body>

</html>
