<?php 

namespace Dev\Mo\controllers;
use Dev\Mo\core\db;

class category extends controller
{
public function __construct()
    {
        session_start();
        if(empty($_SESSION['login'])){
            header('location: ../users/login');
        }
    }

    public function index()
    {
        $db = new db("category");
        $category = $db->select()->all();
        return $this->view('category', compact('category'));
    }

    public function create()
    {
        return $this->view("create_cat");
    }

    public function store()
    {
        $categoryname = $_POST['name'];
        $db = new db("category");
        $db->insert(["name" => $categoryname])->execute();
        header("location: index");
    }

    public function edit($id)
    {
        $db = new db("category");
        $data = $db->select()->where("id", "=", $id)->get();
        return $this->view("edit_cat", compact('data'));
    }

    public function update()
    {
        $categoryname = $_POST['name'];
        $id = $_POST['id'];
        $db = new db("category");
        $db->update(["name" => $categoryname])->where("id", "=", $id)->execute();
        header("location: index");
    }

    public function delete($id)
    {
        $db = new db("category");
        $db->delete()->where("id", "=", $id)->execute();
        header("location: ../index");
    }
}
