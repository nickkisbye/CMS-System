<?php
session_start();
include 'login/includes/db.php';
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM brugere WHERE username='$username' and password='$password'";
    $results = mysqli_query($conn, $sql);

    if(mysqli_num_rows($results) == 1) {
        $row = mysqli_fetch_assoc($results);
        $role = $row['role'];

            if($role == 'Admin') {
            $_SESSION['admin'] = $role;
            $_SESSION['fullName'] = $row['fullName'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['created_at'] = $row['created_at'];
            $_SESSION['id'] = $row['id'];
            header("Location: /login/index.php");
        } elseif($role == 'Bruger') {
            $_SESSION['user'] = $role;
            $_SESSION['fullName'] = $row['fullName'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['created_at'] = $row['created_at'];
            $_SESSION['id'] = $row['id'];
            header("Location: /login/index.php");
        }

    } else {
        header("Location: /");
    }

}