<?php

namespace App\Controllers;
use App\Models\UserModel;

class Admin extends BaseController
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
            $data['name'] = $query[0]->name;

            if ($query[0]->isAdmin) {
                $data['users'] = $builder->select('*')->where("email !=", $query[0]->email)->get()->getResult();
                return view("Admin/index", $data);
            } else {
                return redirect()->to("http://localhost");
            }
        } else {
            return redirect()->to("http://localhost");
        }
    }

    public function add_user()
    {
        $data = [];
        $session = \Config\Services::session();
        $id = $session->get("user");

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->select('*')->where('id =', $id)->get()->getResult();

        if (sizeof($query) > 0) {
            if ($query[0]->isAdmin) {
                if (sizeof($_POST) > 0) {
                    $email = $_POST["email"];
        
                    $query = $builder->select('*')->where('email =', $email)->get()->getResult();
        
                    if (sizeof($query) > 0) {
                        $data['validation'] = 'Această adresă de email este deja înregistrată.';
                        return view("Admin/add_user", $data);
                    } else {
                        $model = new UserModel();
        
                        $model->save([
                            'name' => $this->request->getPost('name'),
                            'email' => $this->request->getPost('email'),
                            'password' => $this->request->getPost('password'),
                            'isAdmin' => $this->request->getPost('isAdmin') == 'on' ? 1 : 0
                        ]);
        
                        return redirect()->to("http://localhost/admin");
                    }
                } else {
                    return view("Admin/add_user");
                }
            } else {
                return redirect()->to("http://localhost");
            }
        } else {
            return redirect()->to("http://localhost");
        }
    }

    public function edit_user($id)
    {
        $data = [];
        $session = \Config\Services::session();
        $admin = $session->get("user");

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->select('*')->where('id =', $admin)->get()->getResult();

        if (sizeof($query) > 0) {
            if ($query[0]->isAdmin) {
                if (sizeof($_POST) > 0) {
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $isAdmin = $this->request->getPost("isAdmin");
        
                    $builder->set("name", $name)->set('email', $email)->where("id =", $id)->update();
                    $builder->set('isAdmin', $isAdmin == 'on' ? 1 : 0)->where("id =", $id)->update();
        
                    $query = $builder->select('*')->where('id =', $id)->get()->getResult();
                    $data["user"] = $query[0];
        
                    return view("Admin/edit_user", $data);
                } else {
                    $query = $builder->select('*')->where('id =', $id)->get()->getResult();
                    $data["user"] = $query[0];
        
                    return view("Admin/edit_user", $data);
                }
            } else {
                return redirect()->to("http://localhost");
            }
        } else {
            return redirect()->to("http://localhost");
        }
    }

    public function delete_user($id)
    {
        $data = [];
        $session = \Config\Services::session();
        $idAdmin = $session->get("user");

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $query = $builder->select('*')->where('id =', $idAdmin)->get()->getResult();
        $data['name'] = $query[0]->name;

        $builder->where("id =", $id)->delete();

        if ($query[0]->isAdmin) {
            $data['users'] = $builder->select('*')->where("email !=", $query[0]->email)->get()->getResult();
            return view("Admin/index", $data);
        } else {
            return redirect()->to("http://localhost");
        }
    }
}
