<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f8f9fa; }
    </style>
</head>
<body class="py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Kelas yang Saya Ikuti</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($courses)): ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Kelas</th>
                                        <th scope="col">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($courses as $c): ?>
                                    <tr class="align-middle">
                                        <td><?= $no++ ?></td>
                                        <td><?= esc($c['course_name']) ?></td>
                                        <td><?= esc($c['description']) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center p-5">
                            <i class="bi bi-journal-x" style="font-size: 4rem; color: #6c757d;"></i>
                            <h5 class="mt-3">Anda Belum Terdaftar di Kelas Apapun</h5>
                            <p class="text-muted">Silakan jelajahi daftar course yang tersedia dan enroll sekarang!</p>
                            <a href="<?= site_url('courses')  ?>" class="btn btn-primary mt-2">
                                Jelajahi Course
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-footer text-end">
                     <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>