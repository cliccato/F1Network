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

$query = "SELECT username FROM users WHERE id = $userId";
$result = mysqli_query($conn, $query);

if($result) {
    if(mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];

        if (substr($username, -1) === 's') {

            echo "<h1>$username' posts</h1>";
        } else {

            echo "<h1>$username's posts</h1>";
        }
    } else {
        echo "<h1>User's posts</h1>";
    }
} else {
    header("Location: error.php?message=" . urlencode("Query error"));
    exit();}


getUserPosts($conn, $userId);

require '../src/footer.php';
?>

<script src="js/postCommentsScript.js"></script>