<?php
namespace App\Controllers;
use App\Models\PostingModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Validation\Validation;
class Admin extends BaseController
{
protected $postingModel;
public function __construct()
{
$this->postingModel = new PostingModel();
}
public function index()
{
$idPosting = $this->postingModel->findAll();
//id otomatis
$dariDB = $this->postingModel->cekkodeposting();
$nourut = (int) substr($dariDB, 3, 3);
$nourut++;
$huruf = "POS";
$noPosting = $huruf . sprintf("%03s", $nourut);
session();
 
 
$data = [
'title' => 'MyApp | Posting',
'posting' => $idPosting,
'kodeposting' => $noPosting,
'validasi' => \Config\Services::validation()
];
return view('admin/index', $data);
}
public function save()
{
if (!$this->validate([
'gambar' => [
'rules' => 
'uploaded[gambar]|max_size[gambar,1024]|ext_in[gambar,png,jpg,gif]',
'errors' => [
'max_size' => 'Ukuran Gambar Terlalu Besar, Max 
1024Kb',
'ext_in' => 'Format gambar tidak sesuai'
]
]
])) {
return redirect()->to(base_url('admin'))->withInput();
}
if (!empty($_FILES['gambar']['name'])) {
// Image upload
$avatar = $this->request->getFile('gambar');
$namabaru = str_replace(' ', '-', $avatar->getName());
$avatar->move(WRITEPATH . '../public/assets/img/', $namabaru);
// masuk database
$data = array(
'idPosting' => $this->request->getVar('idPosting'),
'judul' => $this->request->getVar('judul'),
'deskripsi' => $this->request->getVar('deskripsi'),
'link' => $this->request->getVar('link'),
'gambar' => $namabaru,
);
$this->postingModel->savePosting($data);
return redirect()->to(base_url('admin'));
}
}
public function delete($idPosting)
{
$this->postingModel->delete($idPosting);
return redirect()->to('admin');
}
public function edit()
{
if (!$this->validate([
'gambar' => [
'rules' => 
'uploaded[gambar]|max_size[gambar,1024]|ext_in[gambar,png,jpg,gif]',
'errors' => [
'max_size' => 'Ukuran Gambar Terlalu Besar, Max 
1024Kb',
'ext_in' => 'Format gambar tidak sesuai'
]
]
])) {
return redirect()->to(base_url('admin'))->withInput();
}
if (!empty($_FILES['gambar']['name'])) {
// Image upload
$avatar = $this->request->getFile('gambar');
$namabaru = str_replace(' ', '-', $avatar->getName());
$avatar->move(WRITEPATH . '../public/assets/img/', $namabaru);
$id = $this->request->getPost('idPosting');
$data = array(
'judul' => $this->request->getPost('judul'),
'deskripsi' => $this->request->getPost('deskripsi'),
'link' => $this->request->getPost('link'),
'gambar' => $namabaru,
);
$this->postingModel->updatePosting($data, $id);
return redirect()->to(base_url('admin'));
}
}
}
