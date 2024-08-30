<?php 

namespace Dev\Mo\controllers;

use Dev\Mo\core\db;

class users extends controller
{
    public function register()
    {
        return $this->view("register");
    }
    

    public function store()
    {
        $users = new db('user');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password =$_POST['password']; 

        $users->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ])->execute();

        header("location: login");
    }


    public function login()
    {
        return $this->view("login");
    }



    public function loginRequest()
    {
        session_start();
        $email = $_POST['email'];
        $password =$_POST['password']; 
        $users = new db('user');
        $data = $users->select()->where('email', '=', $email)
            ->andWhere('password', '=', $password)
            ->get();

        if (!empty($data)) {
            $_SESSION['login'] = $data;
            header('location: ../category/index');
        } else {
            header('location: login');
        }
    }


    public function logout()
    {
        session_destroy();
        header("location: login");
    }

    public function index()
    {
        $db = new db("user");
        $users = $db->select()->all();

        return $this->view('users', compact('users'));
    }

    public function create()
    {
        return $this->view('create_user');
    }

    public function edit($id)
    {
        $db = new db("user");
        $data = $db->select()->where("id", "=", $id)->get();
        return $this->view("edit_user", compact('data'));
    }

    public function update()
    {
        $id = $_POST['id'];
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_pass = md5($_POST['password']); // Use md5() as per original code
        $db = new db("user");
        $db->update([
            "name" => $user_name,
            "email" => $user_email,
            "password" => $user_pass
        ])->where("id", "=", $id)->execute();
        
        header("location: index");
        exit;
    }

    public function delete($id)
    {
        $db = new db("user");
        $db->delete()->where("id", "=", $id)->execute();
        
        header("location: ../index");
        exit;
    }
}
