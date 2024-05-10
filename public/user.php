<?php
require '../src/connect.php';
require '../src/header.php';
require '../src/functions.php';

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    header("Location: error.php?message=" . urlencode("Request method not supported"));
    exit();
}

if(isset($_GET['userid'])) {
    if(empty($_GET['userid'])) {
        $error_message = 'userid cant be null';
        header("Location: error.php?message=" . urlencode($error_message));
    }

    $userId = sanitize_input($_GET['userid']);
}else {
    if (isset($_COOKIE['user_id'])) {
        $userId = $_COOKIE['user_id'];
    }else{
        header("Location: error.php?message=" . urlencode("Login first"));
        exit();
    }
}

getUserPosts($conn, $userId);

require '../src/footer.php';
?>

<script src="js/postCommentsScript.js"></script>