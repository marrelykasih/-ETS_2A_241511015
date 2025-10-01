<!DOCTYPE html>
<html>
<head>
    <title>Tambah Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Tambah Course Baru</h2>

    <form action="<?= site_url('courses/store') ?>" method="post">
        <div class="mb-3">
            <label for="course_name" class="form-label">Nama Course</label>
            <input type="text" class="form-control" id="course_name" name="course_name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= site_url('courses') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>
