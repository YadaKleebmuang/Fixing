<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        body {
            background: black;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .form-signing {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #222;
        }

        .form-floating label {
            color: #444;
        }

        .form-control {
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            color: #333;
        }

        .form-control:focus {
            border-color: #000;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .btn-success {
            background-color: #444;
            border: none;
            color: #fff;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
        }

        .btn-success:hover {
            background-color: #000;
        }

        .btn-outline-secondary {
            border-color: #444;
            color: #444;
        }

        .btn-outline-secondary:hover {
            background-color: #444;
            color: #fff;
        }

        p.text-center {
            margin: 20px 0;
            color: #555;
        }

        .message.text-danger {
            font-size: 0.9rem;
        }
    </style>

</head>

<body>

    <main class="form-signing">
        <form action="{{ route('register.auth') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>Register</h1>

            <div class="form-floating mb-3">
                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                <label for="name">Name</label>
                @error('name')
                <div class="message text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                <label for="email">Email</label>
                @error('email')
                <div class="message text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                <div class="message text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Sign Up</button>
            <p class="text-center my-4">
                Already have an account yet? <a href="/">Sign In</a>
            </p>

        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>