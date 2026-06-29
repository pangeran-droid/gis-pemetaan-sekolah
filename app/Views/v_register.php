<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GIS Sekolah | Register</title>

  <link rel="icon" type="image/png" href="<?= base_url('logo/logo.png') ?>">
  <link rel="stylesheet" href="<?= base_url('AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('AdminLTE/dist/css/adminlte.min.css') ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url('/') ?>" class="h1"><b>GIS</b>SEKOLAH</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Buat Akun Baru</p>

      <?php if (session()->getFlashdata('errors')): ?>
          <div class="alert alert-danger">
              <ul>
                  <?php foreach (session()->getFlashdata('errors') as $error): ?>
                      <li><?= esc($error) ?></li>
                  <?php endforeach; ?>
              </ul>
          </div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('pesan_sukses')): ?>
          <div class="alert alert-success"><?= session()->getFlashdata('pesan_sukses'); ?></div>
      <?php endif; ?>

      <?= form_open_multipart('Auth/SaveRegister') ?>
        <div class="input-group mb-3">
          <input type="text" name="nama_user" class="form-control" placeholder="Nama Lengkap" value="<?= old('nama_user') ?>">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="<?= old('email') ?>">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>

        <!-- <div class="input-group mb-1">
            <input type="file" name="foto" class="form-control">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-image"></span>
                </div>
            </div>
        </div>

        <small class="text-muted d-block mb-3">
            Opsional. Kosongkan jika tidak ingin mengunggah foto.
        </small> -->

        <div class="row">
          <div class="col-8">
            <a href="<?= base_url('Auth/Login') ?>">Sudah punya akun? Login</a>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
        </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script src="<?= base_url('AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('AdminLTE/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>