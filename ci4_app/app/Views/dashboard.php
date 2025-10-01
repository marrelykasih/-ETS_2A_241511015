<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-lg p-4" style="width: 550px;">
        <h1 class="text-center mb-3 text-primary">Selamat Datang di Dashboard</h1>
        
        <p class="text-center">
            Halo, <strong><?= esc($fullname) ?></strong> 
            <br>(username: <em><?= esc($username) ?></em>)<br>
            Kamu berhasil login sebagai <strong class="text-success"><?= esc($role) ?></strong>.
        </p>

        <div class="d-flex justify-content-center gap-2 my-3">
            <?php if ($role === 'admin'): ?>
                <a href="<?= site_url('courses') ?>" class="btn btn-primary px-4">Kelola Courses</a>
                <a href="<?= site_url('students') ?>" class="btn btn-secondary px-4">Kelola Students</a>
            <?php elseif ($role === 'student'): ?>
                <a href="<?= site_url('courses') ?>" class="btn btn-info px-4">Lihat Courses</a>
            <?php endif; ?>
        </div>

        <div class="text-center mt-3">
            <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger px-4">Logout</a>
        </div>
    </div>

</body>
</html>
