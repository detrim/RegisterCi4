<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PhotoProfileModel;

class User extends BaseController
{
    protected  $photoProfileModel;

    public function __construct()
    {
        $this->photoProfileModel = new PhotoProfileModel();
       
    }
    public function index()
    {
        $session = session();
        $id_user = $session->get('id');
        $userRelation = $this->photoProfileModel->user($id_user);
        // echo '<pre>';
        // print_r($userRelation);
        // echo '</pre>';
        // die;
        // Tampilkan data photo profile dan relasi pengguna iWakSekiL0
        return view('user/index', ['user' => $userRelation]);
    }
}