<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CI4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f9a8d4, #60a5fa);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            margin: 0;
            color: #fff;
        }
        .navbar {
            background: linear-gradient(90deg, #f9a8d4, #60a5fa);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            padding: 1rem 2rem;
        }
        .navbar-brand {
            font-weight: 700;
            color: #fff;
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }
        .navbar-nav .nav-link {
            color: #fff;
            font-weight: 500;
            margin: 0 1rem;
            transition: background 0.3s ease, text-shadow 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.7);
            border-radius: 5px;
        }
        .navbar-nav .nav-link.active {
            background: rgba(255, 255, 255, 0.3);
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.7);
            border-radius: 5px;
        }
        .btn-logout {
            background: linear-gradient(90deg, #f9a8d4, #60a5fa);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            color: #fff;
            transition: background 0.3s ease;
        }
        .btn-logout:hover {
            background: linear-gradient(90deg, #60a5fa, #f9a8d4);
        }
        .btn-export {
            background: linear-gradient(90deg, #7c3aed, #ec4899);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            color: #fff;
            margin: 0 0.5rem;
            transition: background 0.3s ease;
        }
        .btn-export:hover {
            background: linear-gradient(90deg, #ec4899, #7c3aed);
        }
        .main-content {
            padding: 2rem;
        }
        .dashboard-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            border: 2px solid transparent;
            background-clip: padding-box;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }
        .dashboard-container::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #f9a8d4, #60a5fa);
            z-index: -1;
            border-radius: 17px;
            filter: blur(8px);
            animation: neon-glow 2s ease-in-out infinite;
        }
        .dashboard-container:hover {
            transform: translateY(-5px);
        }
        .welcome-title {
            color: #fff;
            font-weight: 600;
            font-size: 2rem;
            margin-bottom: 1rem;
            text-shadow: 0 0 10px rgba(249, 168, 212, 0.7), 0 0 15px rgba(96, 165, 250, 0.7);
        }
        .welcome-text {
            color: #fff;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        .username {
            color: #ec4899;
            font-weight: 500;
        }
        .table {
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            border-radius: 8px;
        }
        .table th {
            background: linear-gradient(90deg, #f9a8d4, #60a5fa);
            color: #fff;
        }
        .buttons {
            margin: 20px 0;
            text-align: center;
        }
        @keyframes neon-glow {
            0% { opacity: 0.7; }
            50% { opacity: 1; }
            100% { opacity: 0.7; }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CI4 Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/settings">Settings</a>
                    </li>
                </ul>
                <a href="/auth/logout" class="btn btn-logout">Logout</a>
            </div>
        </div>
    </nav>
    <div class="main-content">
        <div class="dashboard-container text-center">
            <h2 class="welcome-title">Selamat Datang, <span class="username"><?= esc(session()->get('username')) ?>!</span></h2>
            <p class="welcome-text">Daftar Semua User:</p>
            <div class="buttons">
                <a href="/dashboard/exportExcel" class="btn btn-export">Download Excel</a>
                <a href="/dashboard/generatePdf" class="btn btn-export">Download PDF</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($users) > 0): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= esc($user['id']) ?></td>
                                <td><?= esc($user['username']) ?></td>
                                <td><?= esc($user['email']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>