<?php 


namespace Dev\Mo\controllers;

use Dev\Mo\core\db;

class product extends controller
{

    public function __construct()
    {
        session_start();
        if(!empty($_SESSION["login"])){
            header("location: ../users/login");
        }
    }
    public function index()
    {
        $db = new db("product");
        $product = $db->select()->all();
        return $this->view('product', compact('product'));
    }

    public function create()
    {
        $category = (new db('category'))->select()->all();
        $users = (new db('user'))->select()->all();
        return $this->view("create_pro", compact("category", "users"));
    }

    public function store()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $user_id = $_POST['user_id'];

        $img = $_FILES['img'];
        $imgName = $img['name'];  // Generate a unique name
        $targetDir = "uploads/";  // Define your upload directory
        $targetFile = $targetDir . basename($imgName);

        if (move_uploaded_file($img['tmp_name'], $targetFile)) {
            $db = new db("product");
            $db->insert([
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'img' => $imgName,  
                'category_id' => $category_id,
                'user_id' => $user_id
            ])->execute();
            header("Location: index");
        } else {
            echo "Error uploading image.";
        }
    }

    public function edit($id)
    {
        $db = new db("product");
        $data = $db->select()->where("id", "=", $id)->get();
        return $this->view("edit_pro", compact('data'));
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $user_id = $_POST['user_id'];

        $img = $_FILES['img'];
        $imgName =  $img['name'];  
        $targetDir = "uploads/";  
        $targetFile = $targetDir . basename($imgName);

        if ($img['tmp_name']) {
            if (move_uploaded_file($img['tmp_name'], $targetFile)) {
                $db = new db("product");
                $db->update([
                    'name' => $name,
                    'price' => $price,
                    'description' => $description,
                    'img' => $imgName,  
                    'category_id' => $category_id,
                    'user_id' => $user_id
                ])->where('id', '=', $id)->execute();
                header("Location: index");
            } else {
                echo "Error uploading image.";
            }
        } else {
            // If no new image, update the other fields
            $db = new db("product");
            $db->update([
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'category_id' => $category_id,
                'user_id' => $user_id
            ])->where('id', '=', $id)->execute();
            header("Location: index");
        }
    }

    public function delete($id)
    {
        $db = new db("product");
        $db->delete()->where("id", "=", $id)->execute();
        header("Location: ../index");
    }
}
