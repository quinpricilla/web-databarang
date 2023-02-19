<?= $this->extend('admin/tema'); ?>
<?= $this->section('kontenAdmin'); ?>
<div class="row">
<div class="col mt-3">
<h4>Postingan</h4>
</div>
</div>
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg 
xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 
0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' 
fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Postingan</li>
</ol>
</nav>
<div class="row">
<div class="col">
<?php if ($validasi->getError('gambar')) { ?>
<div class="alert alert-danger alert-dismissible fade show"
role="alert">
<i class="fas fa-exclamation-triangle"></i> Postingan 
Gagal Disimpan karena <strong><?= $validasi->getError('gambar'); 
?></strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#tambahdata"><i class="fas fa-plus"></i>
Tambah Data</a>
</div>
</div>
<table class="table table-striped table-sm mt-1">
<tr>
<th>No</th>
<th>Judul</th>
<th width=30%>Deskripsi</th>
<th width=30%>Link</th>
<th>Gambar</th>
<th>Action</th>
</tr>
<?php
$no = 1;
foreach ($posting as $row) : ?>
<tr>
<td class="align-middle"><?= $no++; ?></td>
<td class="align-middle"><?= $row['judul']; ?></td>
<td class="align-middle"><?= $row['deskripsi']; ?></td>
<td class="align-middle"><a href="<?= $row['link'] ?>"
target="_blank"><?= $row['link'] ?></a></td>
<td class="align-middle"><img src="/assets/img/<?=
$row['gambar'] ?>" width="100" height="100"></td>
<td class="align-middle"><a data-href="#" class="btn btn-warning btn-sm update" data-bs-toggle="modal" data-bs-target="#editdata"
data-idPosting="<?= $row['idPosting'] ?>" data-judul="<?= $row['judul'] 
?>" data-deskripsi="<?= $row['deskripsi'] ?>" data-link="<?= $row['link'] 
?>"><i class="fas fa-pen"></i></a> <a href="admin/delete/<?=
$row['idPosting'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
</tr>
<?php endforeach; ?>
</table>
</div>
 
<!-- Modal tambah data-->
<div class="modal fade" id="tambahdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" ariahidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="staticBackdropLabel">Buat 
Postingan</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form action="admin/save" method="POST"
enctype="multipart/form-data">
<div class="row mb-3">
<label for="idPosting" class="col-sm-3 col-form-label">IdPosting</label>
<div class="col-sm-9">
<input type="text" name="idPosting"
class="form-control" value="<?= $kodeposting ?>" readonly>
</div>
</div>
<div class="row mb-3">
<label for="judul" class="col-sm-3 col-form-label">Judul</label>
<div class="col-sm-9">
<input type="text" name="judul" class="form-control">
</div>
</div>
<div class="row mb-3">
<label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
<div class="col-sm-9">
<textarea name="deskripsi" id="deskripsi"
cols="5" rows="3" class="form-control"></textarea>
</div>
</div>
 
<div class="row mb-3">
<label for="link" class="col-sm-3 col-form-label">URL / Link</label>
<div class="col-sm-9">
<input type="text" name="link" class="form-control" id="link">
</div>
</div>
<div class="row mb-3">
<label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
<div class="col-sm-9">
<input type="file" name="gambar" class="form-control" id="gambar">
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
<button type="submit" name="simpanposting" class="btn btn-primary">Simpan</button>
</form>
</div>
</div>
</div>
</div>
<!-- Modal edit -->
<div class="modal fade" id="editdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" ariahidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="staticBackdropLabel">Edit 
Postingan</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form action="admin/edit" method="POST"
enctype="multipart/form-data">
<div class="row mb-3">
<label for="idPosting" class="col-sm-3 col-form-label">ID Posting</label>
<div class="col-sm-9">
<input type="text" name="idPosting"
class="form-control" id="idPosting_u" readonly>
</div>
</div>
<div class="row mb-3">
<label for="judul" class="col-sm-3 col-form-label">Judul</label>
<div class="col-sm-9">
<input type="text" name="judul" class="form-control" id="judul_u" required>
</div>
</div>
<div class="row mb-3">
<label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
<div class="col-sm-9">
<textarea name="deskripsi" id="deskripsi_u"
cols="5" rows="3" class="form-control" required></textarea>
</div>
</div>
<div class="row mb-3">
<label for="link" class="col-sm-3 col-form-label">URL / Link</label>
<div class="col-sm-9">
<input type="text" name="link" class="form-control" id="link_u" required>
</div>
</div>
<div class="row mb-3">
<label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
<div class="col-sm-9">
<input type="file" name="gambar" class="form-control" id="gambar" required>
</div>
</div>
</div>
I. Berikut tampilan aplikasi ketika di running.
1. Dashboard admin
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
<button type="submit" name="editposting" class="btn btn-primary">Edit</button>
</form>
</div>
</div>
</div>
</div>
<?= $this->endSection(); ?>
