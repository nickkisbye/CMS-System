<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "kisbyecms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function get_online() {
    $loggedtime = time() - 60;
    global $conn;
    $data = array();

    $sql = "SELECT * FROM brugere WHERE `logged` > '".$loggedtime."'";
    $results = mysqli_query($conn, $sql);

    while ($details = mysqli_fetch_assoc($results)) {
        $data[] = $details;
    }

    return $data;
}

function get_roles() {
    global $conn;
    $roles = array();

    $sql = "SELECT * FROM roles";
    $results = mysqli_query($conn, $sql);

    while ($details = mysqli_fetch_assoc($results)) {
        $roles[] = $details;
    }

    return $roles;
}

function get_user_info() {
    global $conn;
    $userDetails = array();

    $sql = "SELECT * FROM brugere";
    $results = mysqli_query($conn, $sql);

    while ($details = mysqli_fetch_assoc($results)) {
        $userDetails[] = $details;
    }

    return $userDetails;
}

function edit_user_info($id) {
    global $conn;
    $userDetails = array();

    $sql = "SELECT * FROM brugere WHERE id='$id'";
    $results = mysqli_query($conn, $sql);

    while ($details = mysqli_fetch_assoc($results)) {
        $userDetails[] = $details;
    }

    return $userDetails;
}

function create_user(array $data) {

    global $conn;

    $sql = "INSERT INTO brugere (fullName, email, role, username, password) VALUES ('{$data['name']}', '{$data['email']}', '{$data['role']}', '{$data['username']}', '{$data['password']}')";

    if (mysqli_query($conn, $sql)) {
        header("Location: /login");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}

function edit_user(array $data) {
    global $conn;
    $sql = "UPDATE brugere SET fullName='{$data['name']}', email='{$data['email']}', role='{$data['role']}', username='{$data['username']}', password='{$data['password']}'  WHERE id='{$data['id']}'";
    mysqli_query($conn, $sql);
    header("Location: /login/users.php");
}

function delete_user($id) {
    global $conn;
    $sql = "DELETE FROM brugere WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location: /login/users.php");
}

function send_message(array $data) {
    global $conn;
    $sql = "INSERT INTO `messages` (title, user1, user2, message) VALUES ('{$data['subject']}', '{$data['user']}', '{$data['user2']}', '{$data['message']}')";

    mysqli_query($conn, $sql);

    header("Location: /login/messages.php");
}

function get_message($name) {
    global $conn;
    $messages = array();

    $sql = "SELECT * FROM messages WHERE user2='$name'";
    $results = mysqli_query($conn, $sql);

    while ($message = mysqli_fetch_assoc($results)) {
        $messages[] = $message;
    }

    return $messages;
}

function view_message($id) {
    global $conn;
    $messages = array();

    $sql = "SELECT * FROM messages WHERE id='$id'";
    $results = mysqli_query($conn, $sql);

    while ($message = mysqli_fetch_assoc($results)) {
        $messages[] = $message;
    }

    return $messages;
}

function delete_message($id) {
    global $conn;

    $sql = "DELETE FROM messages WHERE id='$id'";
    mysqli_query($conn, $sql);


}