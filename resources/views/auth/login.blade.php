<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            background: black;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-weight: bold;
            text-align: center;
            color: #222;
            margin-bottom: 20px;
        }

        .form-label {
            color: #444;
        }

        .form-control {
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            color: #333;
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #000;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .btn-primary {
            background-color: #444;
            border: none;
            color: #fff;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #000;
        }

        .btn-secondary {
            border-color: #444;
            color: #444;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            margin-top: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #444;
            color: #fff;
        }

        .alert-danger {
            font-size: 0.9rem;
        }

        .text-center {
            color: #555;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Login</h1>

        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif


        <form action="{{ route('login.authenticate') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email">
                <label for="email">Email</label>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                <label for="password">Password</label>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Sign In</button>
            <p class="text-center my-4">
                Don't have an account yet? <a href="./register">Sign Up</a>
            </p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
