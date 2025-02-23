<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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

        .dashboard-header {
            margin-top: 20px;
            text-align: center;
        }

        .card {
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <!-- โลโก้ (วางไฟล์ไว้ที่ public/assets/images/logo.png) -->
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <img src="{{ asset('/logo.png') }}" width="30" height="30"> Repair Management
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left side menu -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">หน้าหลัก</a>
                        </li>

                        <!-- Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                งานซ่อม
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('repair.create') }}">แจ้งซ่อม</a></li>
                                <li><a class="dropdown-item" href="{{ route('repair.track') }}">ติดตามการสั่งซ่อมของฉัน</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('repair.index') }}">รายการซ่อม (ช่างซ่อม)</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>

                    <!-- Search Bar -->
                    <form class="d-flex me-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <!-- User Dropdown -->
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Scamp
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-id-card"></i> แก้ไขข้อมูลส่วนตัว</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mt-4">
        <h2 class="dashboard-header">Dashboard</h2>

        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">งานซ่อมทั้งหมด</h5>
                        <p class="card-text">ดูจำนวนงานซ่อมที่มีอยู่ทั้งหมด</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="{{ route('repair.index') }}" class="text-white">ดูรายละเอียด</a>
                        <i class="fas fa-wrench"></i>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">งานที่เสร็จสิ้น</h5>
                        <p class="card-text">จำนวนงานที่ซ่อมเสร็จเรียบร้อย</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="#" class="text-white">ดูรายละเอียด</a>
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">งานที่กำลังดำเนินการ</h5>
                        <p class="card-text">ดูงานซ่อมที่อยู่ระหว่างดำเนินการ</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="#" class="text-white">ดูรายละเอียด</a>
                        <i class="fas fa-spinner"></i>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <h5 class="card-title">งานที่ยังไม่ได้เริ่ม</h5>
                        <p class="card-text">งานซ่อมที่ยังไม่ได้ดำเนินการ</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="#" class="text-white">ดูรายละเอียด</a>
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 mb-3">
        <small>© 2025 Repair Management System</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>