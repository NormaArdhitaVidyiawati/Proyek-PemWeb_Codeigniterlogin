<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; }
        .container { margin: 50px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Selamat Datang, <?= session()->get('username') ?>!</h2>
        <a href="/auth/logout">Logout</a>
    </div>
</body>
</html>