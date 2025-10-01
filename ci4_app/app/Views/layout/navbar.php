<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('dashboard') ?>">MyApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <?php if(session()->get('role') === 'student'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('courses') ?>">Daftar Course</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('my-courses') ?>">Kelas Saya</a>
          </li>
        <?php endif; ?>

        <?php if(session()->get('role') === 'admin'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('students') ?>">Kelola Students</a>
          </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
        <?php if(session()->get('isLoggedIn')): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
