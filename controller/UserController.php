<?php


namespace Controller;


use Model\DBConnection;
use Model\Users;
use Model\UsersDB;

class UserController
{
    public UsersDB $userDB;

    public function __construct()
    {
        $connection = new DBConnection();
        $this->userDB = new UsersDB();
    }

    public function error(): array
    {
        $username = $_POST['username'];
        $data = $this->userDB->getInfor($username);

        $errors = [];
        $fields = ['username', 'password', 'email'];
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                $errors[$field] = 'Không được để trống';
            }
        }



        if (strlen($_POST['password']) < 6) {
            $errors['password'] = "Không đủ 6 kí tự";
        }
        return $errors;
    }


    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include "view/users/register.php";
        } else {
            $errors = $this->error();
            if (empty($errors)) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password = md5($password);
                $email = $_POST['email'];
                $numberPhone = $_POST['numberPhone'];
                $address = $_POST['address'];
                $target_dir = "view/users/uploads/";
                $filename = $_FILES['image']['name'];
                $target_file = $target_dir . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $image = $filename;
                $data = [
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'numberPhone' => $numberPhone,
                    'address' => $address,
                    'image' => $image
                ];
//                var_dump($data['username']);die();
                $user = new Users($data);
                $this->userDB->addUser($user);
                header("location: index.php?page=login");
            }else {
                include_once "view/users/register.php";
            }

        }
    }

    public function updateProfile()
    {
        $result = $this->userDB->getInforByUsername();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "view/users/update-profile.php";
        } else {
            $id = $result->id;
            $image = $result->image;
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'numberPhone' => $_POST['numberPhone'],
                'password' => $_POST['password'],
                'address' => $_POST['address'],
                'image' => $image
            ];
            $user = new Users($data);
//            var_dump($user);die();
            $this->userDB->updateProfile($id, $user);
//            var_dump($result);die();
            header("Location:index.php?page=profile");
        }
    }

    public function checkInput()
    {
        $errors = [];
        $username = $_POST['username'];
        $data = $this->userDB->getInfor($username);
        if ($_POST['username'] != $data['username']) {
            $errors['username'] = "Tài khoản không tồn tại";
        }


        return $errors;
    }

    public function loginUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "view/users/login.php";
        } else {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password = md5($password);
                $this->userDB->login($username, $password);
        }

    }

    public function getProfile()
    {

        $result = $this->userDB->getInforByUsername();
//        var_dump($result);
        include_once "view/users/profile.php";
    }




}