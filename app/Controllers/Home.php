<?php
namespace App\Controllers;

    use App\Models\PostingModel;
    class Home extends BaseController
    
{
    protected $postingModel;
    public function __construct()
{
    $this->postingModel = new PostingModel();
}
    public function index()
    {
        $idPosting = $this->postingModel->findAll();
        $data = [
        'title' => "MyApp | Dashboard",
        'posting' => $idPosting,
        ];
         return view('index', $data);
}
}
