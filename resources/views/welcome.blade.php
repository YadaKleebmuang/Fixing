<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: black;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        .welcome-container {
            text-align: center;
            background: rgba(54, 54, 54, 0.8);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        }
        h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .btn {
            margin: 10px;
            padding: 10px 30px;
            font-size: 20px;
            border-radius: 10px;
        }
    </style>
  </head>
  <body>
    <div class="welcome-container">
        <h1>Welcome to Repair Management System</h1>
        <p>ระบบจัดการงานซ่อมวัสดุอุปกรณ์ไฟฟ้าที่ช่วยให้คุณติดตามงานซ่อมได้อย่างมีประสิทธิภาพ</p>
        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
