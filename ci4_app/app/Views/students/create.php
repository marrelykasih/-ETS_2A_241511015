<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
Tambah Student
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card shadow-lg p-4 mx-auto" style="max-width: 500px;">
    <h2 class="text-center mb-4 text-primary">Tambah Student</h2>

    <form action="<?= base_url('students/store') ?>" method="post" id="form-add-student">
        <div class="mb-3">
            <label for="full_name" class="form-label">Nama Lengkap</label>
            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Masukkan nama lengkap">
            <div class="error-message"></div>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username">
            <div class="error-message"></div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password">
            <div class="error-message"></div>
        </div>

        <div class="mb-3">
            <label for="entry_year" class="form-label">Entry Year</label>
            <input type="number" name="entry_year" id="entry_year" class="form-control" placeholder="Contoh: 2023">
            <div class="error-message"></div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button type="submit" class="btn btn-success px-4">Simpan</button>
            <a href="<?= base_url('students') ?>" class="btn btn-outline-secondary px-4">Batal</a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>