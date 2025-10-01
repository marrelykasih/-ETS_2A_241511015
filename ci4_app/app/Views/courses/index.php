<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
Daftar Courses
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Daftar Courses</h2>

<?php if (session()->get('role') === 'admin'): ?>
    <a href="<?= site_url('courses/create') ?>" class="btn btn-success mb-3">+ Tambah Course</a>
<?php endif; ?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama Course</th>
      <th>Deskripsi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($courses as $c): ?>
      <tr>
        <td><?= $c['id'] ?></td>
        <td><?= $c['course_name'] ?></td>
        <td><?= $c['description'] ?></td>
        <td>
          <a href="<?= base_url('courses/enroll/'.$c['id']) ?>" class="btn btn-primary btn-sm">Enroll</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?= $this->endSection() ?>
