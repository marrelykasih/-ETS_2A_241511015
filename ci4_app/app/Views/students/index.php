<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
Kelola Students
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <h2>Daftar Students</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <a href="<?= base_url('students/create') ?>" class="btn btn-primary mb-3">+ Tambah Student</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Entry Year</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($students)): ?>
            <?php foreach($students as $s): ?>
            <tr>
                <td><?= $s['student_id'] ?></td>
                <td><?= esc($s['fullname']) ?></td>
                <td><?= esc($s['username']) ?></td>
                <td><?= esc($s['entry_year']) ?></td>
                <td>
                    <a href="<?= base_url('students/edit/'.$s['student_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    
                    <a href="<?= base_url('students/delete/'.$s['student_id']) ?>" 
                       class="btn btn-danger btn-sm btn-delete" 
                       data-name="<?= esc($s['fullname']) ?>">
                       Hapus
                    </a>
                    
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">Kembali</a>

<?= $this->endSection() ?>