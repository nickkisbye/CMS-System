<?php
require_once '../includes/db.php';

if (isset($_POST['subject']) && isset($_POST['message'])) {

    $data = array(
        'user' => $_POST['user'],
        'user2' => $_POST['user2'],
        'subject' => $_POST['subject'],
        'message' => $_POST['message']
    );
    send_message($data);
}