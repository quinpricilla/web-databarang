<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title; ?></title>
<link rel="stylesheet" href="/assets/fontawesome/css/all.css">
<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="#">MyApp</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" arialabel="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse"
id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
 
<a class="nav-link active" aria-current="page" href="#">Home</a>
</li>
</ul>
<?php if (session('username') == false) { ?>
<li class="nav-item d-flex">
<a href="login" class="btn btn-outline-primary btn-sm">Login</a>
</li>
<?php } else { ?>
<div class="dropdown">
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
<b><?php echo $_SESSION['nmUser']; 
?></b>
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
<li><a class="dropdown-item"
href="admin">Dashboard Admin</a></li>
<li><a class="dropdown-item"
href="login/logout">Logout</a></li>
</ul>
</div>
<?php } ?>
</div>
</div>
</nav>
</div>
<div class="container mt-2">
<?= $this->renderSection('konten'); ?>
</div>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>
