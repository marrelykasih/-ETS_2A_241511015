<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-lg p-4" style="width: 450px;">
        <h2 class="text-center mb-4 text-warning">Edit Student</h2>
<form action="<?= base_url('students/update/'.$student['student_id']) ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="full_name" class="form-control" 
               value="<?= esc($student['fullname']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" 
               value="<?= esc($student['username']) ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Entry Year</label>
        <input type="number" name="entry_year" class="form-control" 
               value="<?= esc($student['entry_year']) ?>" required>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success px-4">Update</button>
        <a href="<?= base_url('students') ?>" class="btn btn-outline-secondary px-4">Batal</a>
    </div>
</form>
    </div>

</body>
</html>
