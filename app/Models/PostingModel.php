<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class PostingModel extends Model
{
    protected $table = 'posting';
    protected $primaryKey = 'idPosting';
    protected $allowedFields = ['idPosting', 'judul', 'deskripsi', 
    'link', 'gambar'];
    public function savePosting($data)
{

    $query = $this->db->table($this->table)->insert($data);
    return $query;
}

    public function getPosting($id = false)
{
    if ($id === false) {
    return $this->findAll();

} else {
    return $this->getWhere(['idPosting' => $id]);
    }
}
    public function updatePosting($data, $id)
{
    $query = $this->db->table($this->table)->update($data, 
    array('idPosting' => $id));
    return $query;
    }
 

    public function cekkodeposting()
{
        $query = $this->db->query("SELECT MAX(idPosting) as idTerbesar 
        from posting");
        $hasil = $query->getRow();
        return $hasil->idTerbesar;
        }
}