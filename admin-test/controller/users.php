<?php
include("../partial/config/db_config.php");

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'admin') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        try {
            echo $sql = "select * from `users` where `user_username`= '$username' and `user_password`= '$password'";
            $result = mysqli_query($users->db, $sql);
            if (mysqli_num_rows($result) == 1) {
                session_start();
                $_SESSION['username'] = $username;
                header('index.php');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
