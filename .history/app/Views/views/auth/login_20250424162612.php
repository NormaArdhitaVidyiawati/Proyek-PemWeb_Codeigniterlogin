<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; }
        .container { width: 300px; margin: 50px auto; }
        .error { color: red; }
        input { width: 100%; padding: 8px; margin: 5px 0; }
        button { padding: 10px; width: 100%; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <p class="error"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <form action="/auth/attempt" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>