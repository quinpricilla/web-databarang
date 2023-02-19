<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/fontawesome/css/all.css">
</head>
<body class="bg-dark">
<div class="container">
<div class="row justify-content-center mt-5">
<div class="col-lg-5">
<div class="card o-hidden border-1 my-5">
<div class="card-body p-0">
<div class="row">
<div class="col-lg">
<div class="p-5">
<div class="text-center mb-4">
<h4>Welcome to MyApp</h4>
</div>
<?php if (session()->getFlashData('gagal')) : ?>
<div class="alert alert-warning 
alert-dismissible fade show" role="alert">
<?= session()->getFlashData('gagal'); ?>
</div>
<?php endif; ?>
<form class="user" action="<?=
base_url('login/cekLogin'); ?>" method="post">
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
<input type="text"
class="form-control form-control-user" placeholder="Username.."
name="username" required oninvalid="this.setCustomValidity('username 
tidak boleh kosong')" oninput="setCustomValidity('')">
</div>
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
<input type="password"
class="form-control form-control-user" placeholder="Password.."
name="password" required oninvalid="this.setCustomValidity('password 
tidak boleh kosong')" oninput="setCustomValidity('')">
</div>
<input type="submit" class="btn 
btn-info btn-user form-control" value="Login" />
<hr>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
