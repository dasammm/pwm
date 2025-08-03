<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Database configuration
$host = 'localhost';
$dbname = 'pwm_db';
$username = 'pwm_user';
$password = 'pwm_password';

// Connect to database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to get data from database
function getData($pdo, $table, $limit = 10) {
    $stmt = $pdo->prepare("SELECT * FROM $table LIMIT $limit");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get data for dashboard
$pelanggan = getData($pdo, 'master_pelanggan');
$wilayah = getData($pdo, 'master_wilayah');
$masalah = getData($pdo, 'master_masalah');
$liveData = getData($pdo, 'data_live');

// Count total records
$totalPelanggan = $pdo->query("SELECT COUNT(*) FROM master_pelanggan")->fetchColumn();
$totalWilayah = $pdo->query("SELECT COUNT(*) FROM master_wilayah")->fetchColumn();
$totalMasalah = $pdo->query("SELECT COUNT(*) FROM master_masalah")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prepaid Water Meter (PWM) - Ling Water Solution</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0 !important;
            font-weight: bold;
        }
        .stat-card {
            text-align: center;
            padding: 20px;
        }
        .stat-card i {
            font-size: 3rem;
            margin-bottom: 10px;
            color: #007bff;
        }
        .stat-card .count {
            font-size: 2rem;
            font-weight: bold;
        }
        .stat-card .label {
            font-size: 1rem;
            color: #6c757d;
        }
        .table-responsive {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">PWM - Ling Water Solution</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-users"></i> Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-marker-alt"></i> Wilayah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-exclamation-triangle"></i> Masalah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-chart-line"></i> Data Live</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle"></i> <?= htmlspecialchars($_SESSION['nama_lengkap']) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="mb-4">Dashboard</h2>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card stat-card">
                    <i class="fas fa-users"></i>
                    <div class="count"><?= $totalPelanggan ?></div>
                    <div class="label">Total Pelanggan</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="count"><?= $totalWilayah ?></div>
                    <div class="label">Total Wilayah</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div class="count"><?= $totalMasalah ?></div>
                    <div class="label">Total Masalah</div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-users me-2"></i> Data Pelanggan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No. Pelanggan</th>
                                        <th>Nama</th>
                                        <th>Kota</th>
                                        <th>Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pelanggan as $p): ?>
                                    <tr>
                                        <td><?= $p['no_pelanggan'] ?></td>
                                        <td><?= $p['nama_pelanggan'] ?></td>
                                        <td><?= $p['kota_pelanggan'] ?></td>
                                        <td><?= $p['nomor_telepon'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-map-marker-alt me-2"></i> Data Wilayah
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Wilayah</th>
                                        <th>Nama Wilayah</th>
                                        <th>Kota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($wilayah as $w): ?>
                                    <tr>
                                        <td><?= $w['kode_wilayah'] ?></td>
                                        <td><?= $w['nama_wilayah'] ?></td>
                                        <td><?= $w['kota'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-exclamation-triangle me-2"></i> Data Masalah
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Masalah</th>
                                        <th>Nama Masalah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($masalah as $m): ?>
                                    <tr>
                                        <td><?= $m['kode_masalah'] ?></td>
                                        <td><?= $m['nama_masalah'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-chart-line me-2"></i> Data Live
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No. Pelanggan</th>
                                        <th>Data Air</th>
                                        <th>Data Pulsa</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($liveData as $ld): ?>
                                    <tr>
                                        <td><?= $ld['no_pelanggan'] ?></td>
                                        <td><?= $ld['data_air'] ?> m³</td>
                                        <td>Rp <?= number_format($ld['data_pulsa'], 0, ',', '.') ?></td>
                                        <td>
                                            <span class="badge bg-<?= $ld['status'] == 'Active' ? 'success' : 'danger' ?>">
                                                <?= $ld['status'] ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center text-muted py-3 mt-5">
        <div class="container">
            <p class="mb-0">© 2025 Prepaid Water Meter (PWM) - Ling Water Solution</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>