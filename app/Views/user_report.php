<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Report</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #8b5cf6, #d946ef); /* Gradient ungu */
            margin: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9); /* Background putih transparan */
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* Shadow dari dashboard */
        }
        h2 {
            color: #d946ef; /* Warna ungu pink untuk tulisan "User Report" */
            text-align: center;
            font-weight: 600;
            font-size: 2rem;
            text-shadow: 0 0 10px rgba(139, 92, 246, 0.7), 0 0 15px rgba(217, 70, 239, 0.7); /* Efek shadow ungu */
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #a78bfa; /* Ungu muda untuk border */
            padding: 10px;
            text-align: left;
        }
        th {
            background: #8b5cf6; /* Ungu solid untuk header */
            color: #ffffff;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #f5f3ff; /* Ungu sangat muda untuk baris genap */
        }
        .no-data {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Report</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users) && count($users) > 0): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= esc($user['id']) ?></td>
                            <td><?= esc($user['username']) ?></td>
                            <td><?= esc($user['email']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="no-data">No users found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>