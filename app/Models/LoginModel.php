<?php
namespace App\Models;
use CodeIgniter\Model;
class LoginModel extends Model
{
    public function cekLogin($username, $password)
{
    return $this->db->table('user')->where(
        array(
            'username' => $username,
            'password' => $password
        )
    )->get()->getRowArray();
}
}
