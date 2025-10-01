<?php if($this->session->userdata('role') == 'admin'): ?>
    <a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
    <a href="<?= base_url('admin/manage_courses') ?>">Manage Courses</a>
    <a href="<?= base_url('admin/manage_students') ?>">Manage Students</a>
<?php else: ?>
    <a href="<?= base_url('student/courses') ?>">View Courses</a>
    <a href="<?= base_url('student/enroll') ?>">Enroll Courses</a>
<?php endif; ?>
<a href="<?= base_url('auth/logout') ?>">Logout</a>
