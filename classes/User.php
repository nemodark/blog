<?php
require_once "Database.php";

class User extends Database
{

    public function getUsers()
    {
        $sql = "SELECT * FROM users INNER JOIN profile ON users.user_id = profile.user_id";
        $result = $this->conn->query($sql);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getSpecificUser($id)
    {
        $sql = "SELECT * FROM users INNER JOIN profile ON users.user_id = profile.user_id WHERE users.user_id = $id";

        $result = $this->conn->query($sql);

        $row = $result->fetch_assoc();

        return $row;
    }

    public function createUser($username, $password, $email, $firstname, $lastname, $birthdate)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $msg = "Username or Email already exist";
        } else {
            $newpass = md5($password);
            $sql = "INSERT INTO users(username, password, email) VALUES('$username', '$newpass', '$email')";
            $result = $this->conn->query($sql);
            if ($result) {
                $id = mysqli_insert_id($this->conn);
                $sql = "INSERT INTO profile(user_id, firstname, lastname, birthdate) VALUES('$id', '$firstname', '$lastname', '$birthdate')";
                $result = $this->conn->query($sql);
                if ($result) {
                    header("location: index.php");
                }
            }
        }
    }

    public function login($useremail, $password)
    {
        $newpass = md5($password);
        $sql = "SELECT * FROM users WHERE username='$useremail' OR email='$useremail' AND password='$newpass'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['is_admin'] == 1) {
                $_SESSION['userid'] = $row['user_id'];
                $_SESSION['type'] = 1;
                header("location: admin/index.php");
            } elseif ($row['is_admin'] == 0) {
                $_SESSION['userid'] = $row['user_id'];
                $_SESSION['type'] = 0;
                header("location: web/index.php");
            }
        } else {
            return false;
        }
    }

    public function checkLogin($sessID)
    {
        if (!$sessID) {
            header("location: ../index.php");
        }
    }
}
