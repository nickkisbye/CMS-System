<?php
include "../includes/db.php";
if(isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['id'])) {
    $data = array(
    'username' => $_POST['username'],
    'password' => md5($_POST['password']),
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'role' => $_POST['role']
    );
    create_user($data);
} else if(isset($_GET['delete'])){
    delete_user($_GET['delete']);
} else if(isset($_POST['id'])) {
    $data = array(
        'username' => $_POST['username'],
        'password' => md5($_POST['password']),
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'role' => $_POST['role'],
        'id' => $_POST['id']
    );
    if (empty($_POST['password'])) {
        header("Location: /login/edit.php?id={$_POST['id']}&error=true");
    } else {
        edit_user($data);
    }
}