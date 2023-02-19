<?php
namespace App\Controllers;
use App\Models\LoginModel;
use CodeIgniter\HTTP\Request;
class Login extends BaseController
{
    protected $loginModel;
    public function __construct()
{
        $this->loginModel = new LoginModel();
}
public function index()
{
        $data = [
        'title' => 'Halaman Login'
];
        return view('login', $data);
}
public function cekLogin()
{
        $username = $this->request->getPost('username');
        $password = sha1($this->request->getPost('password'));
        $row = $this->loginModel->cekLogin($username, $password);

if (($row['username'] == $username) && ($row['password'] == 
$password)) {
    session()->set('username', $row['username']);
    session()->set('nmUser', $row['nmUser']);
    session()->set('level', $row['level']);
return redirect()->to(base_url('home'));
} else {
    session()->setFlashdata('gagal', 'Username dan Password 
Salah !!!');
return redirect()->to(base_url('login'));
}
}
public function logout()
{
    session()->destroy();
return redirect()->to(base_url('home'));
}
}