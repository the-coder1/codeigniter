<?php

namespace App\Controllers;
use App\Models\UserModel;

class Welcome extends BaseController
{
    public function index()
    {
        $data = [];
        $session = \Config\Services::session();
        $id = $session->get("user");

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->select('*')->where('id =', $id)->get()->getResult();

        if (sizeof($query) > 0) {
            if ($query[0]->isAdmin) {
                return redirect()->to("http://localhost/admin");
            } else {
                return view("Welcome/index", $data);
            }
        } else {
            return redirect()->to("http://localhost");
        }
    }
}
