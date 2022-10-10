<?php

namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController
{
    public function register()
    {
        $data = [];

        $session = \Config\Services::session();
        $db = \Config\Database::connect();

        $builder = $db->table('users');

        if ($session->get("user")) {
            return redirect()->to("http://localhost/welcome");
        } else {
            if (sizeof($_POST) > 0) {
                $email = $_POST["email"];
    
                $query = $builder->select('*')->where('email =', $email)->get()->getResult();
    
                if (sizeof($query) > 0) {
                    $data['validation'] = 'Această adresă de email este deja înregistrată.';
                    return view("User/register", $data);
                } else {
                    $model = new UserModel();
    
                    $model->save([
                        'name' => $this->request->getPost('name'),
                        'email' => $this->request->getPost('email'),
                        'password' => $this->request->getPost('password'),
                    ]);

                    $updated = $builder->select('id')->where('email =', $email)->get()->getResult();

                    $session->set("user", $updated[0]->id);
    
                    return redirect()->to("http://localhost/welcome");
                }
            } else {
                return view("User/register");
            }
        }
    }

    public function login()
    {
        $data = [];

        $session = \Config\Services::session();
        $db = \Config\Database::connect();

        $builder = $db->table('users');

        if ($session->get("user")) {
            return redirect()->to("http://localhost/welcome");
        } else {
            if (sizeof($_POST) > 0) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                $query = $builder->select("*")->where("email =", $email)->get()->getResult();
    
                if (sizeof($query) > 0 && $query[0]->password == $password) {
                    $session->set("user", $query[0]->id);
                    return redirect()->to("http://localhost/welcome");
                } else {
                    $data['validation'] = 'Emailul sau parola sunt greșite.';
                    return view("User/login", $data);
                }
            } else {
                return view("User/login");
            }
        }
    }
}
