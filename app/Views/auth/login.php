<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e40af, #2dd4bf);
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.15) 2px, transparent 2px);
            background-size: 20px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 2px solid transparent;
            background-clip: padding-box;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }
        .login-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(135deg, #a78bfa, #f472b6);
            z-index: -1;
            border-radius: 17px;
        }
        .login-container:hover {
            transform: translateY(-5px);
        }
        .login-title {
            color: #f9a8d4;
            font-weight: 700;
            font-size: 2.5rem;
            text-shadow: 0 0 10px rgba(249, 168, 212, 0.5);
            text-align: center;
            margin-bottom: 20px;
        }
        .error {
            border-radius: 8px;
            background-color: #fce7f3;
            color: #be185d;
            text-align: center;
            margin-bottom: 10px;
            padding: 10px;
        }
        .success {
            border-radius: 8px;
            background-color: #d4edda;
            color: #155724;
            text-align: center;
            margin-bottom: 10px;
            padding: 10px;
        }
        .form-label {
            font-weight: 500;
            color: #6b7280;
        }
        input {
            width: 100%;
            padding: 0.75rem;
            margin: 10px 0;
            border: 1px solid #c4b5fd;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        input:focus {
            border-color: #f472b6;
            box-shadow: 0 0 10px rgba(244, 114, 182, 0.7);
            outline: none;
        }
        .btn-login {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(90deg, #7c3aed, #ec4899);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            position: relative;
            transition: background 0.3s ease;
            overflow: hidden;
        }
        .above-btn {
            text-align: center;
            margin-top: 10px;
        }
        .above-btn a {
            color: #000000;
            text-decoration: none;
            font-weight: 500;
        }
        .above-btn a:hover {
            text-decoration: underline;
        }
        .btn-login::after {
            content: '→';
            position: absolute;
            right: 15px;
            font-size: 1.2rem;
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .btn-login:hover::after {
            opacity: 1;
            transform: translateX(5px);
        }
        .btn-login:hover {
            background: linear-gradient(90deg, #ec4899, #7c3aed);
        }
        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .register-link p {
            color: #000000;
        }
        .register-link a {
            color: #000000;
            text-decoration: none;
            font-weight: 500;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h2 class="login-title">Login</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <p class="error"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <p class="success"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>
        <form action="/auth/attempt" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
        <div class="register-link">
            <p>Belum punya akun? <a href="/auth/register">Register di sini</a></p>
        </div>
    </div>
</body>
</html>