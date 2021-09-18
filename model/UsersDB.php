<?php


namespace Model;


use JetBrains\PhpStorm\Pure;

class UsersDB
{
    public DBConnection $connection;
    #[Pure] public function __construct()
    {
        $this->connection = new DBConnection();
    }

    public function addUser(object $user)
    {
        try {
            $sql = "INSERT INTO users(username, password, email, numberPhone, address, image) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->connect()->prepare($sql);
            $stmt->bindParam(1, $user->username);
            $stmt->bindParam(2, $user->password);
            $stmt->bindParam(3, $user->email);
            $stmt->bindParam(4, $user->numberPhone);
            $stmt->bindParam(5, $user->address);
            $stmt->bindParam(6, $user->image);
            $stmt->execute();
        } catch (\PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            die();
        }
    }


    public function getInfor($username)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function updateProfile($id, $user)
    {
        $sql = "UPDATE users SET username = ?, email = ?, numberPhone = ?, address = ? WHERE id = ?";
        $stmt = $this->connection->connect()->prepare($sql);
        $stmt->bindParam(1, $user->username);
        $stmt->bindParam(2, $user->email);
        $stmt->bindParam(3, $user->numberPhone);
        $stmt->bindParam(4, $user->address);
        $stmt->bindParam(5, $id);
        return $stmt->execute();
    }

    public function checkLogin($username, $password)
    {
        $data = $this->getInfor($username);
        if ($data) {
            if ($username == $data->username && $password == $data->password) {
                return true;
            }
        }
        return false;
    }

    public function login($username, $password)
    {
        if ($this->checkLogin($username, $password)) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
//            var_dump($username);die();
            header("Location:index.php?page=home");
        }
    }

    public function getInforByUsername()
    {
        session_start();
        $username = $_SESSION['username'];
        $user = $this->getInfor($username);
        return $user;
    }

}