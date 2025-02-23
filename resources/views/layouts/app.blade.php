<!-- Layout หลัก (Header, Footer, Navbar) -->
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Repair Management</title>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('/logo.png') }}" width="30" height="30"> Repair Management
            </a>
            <div class="ms-auto">
                <a href="{{ route('repair.index') }}" class="btn btn-outline-light me-2">หน้าหลัก</a>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown">
                        แจ้งซ่อม
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('repair.track') }}">ติดตามงานซ่อม</a></li>
                        <li><a class="dropdown-item" href="{{ route('repair.index') }}">รายการซ่อม</a></li>
                        <li><a class="dropdown-item" href="{{ route('repair.create') }}">แจ้งซ่อม</a></li>
                    </ul>
                </div>
                <a href="#" class="btn btn-outline-light ms-2">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>