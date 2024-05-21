<?php
require '../src/cross.php';
require '../src/connect.php';
require '../src/functions.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: error.php?message=" . urlencode("Request method not supported"));
    exit();
}

    if(!isset($_POST['contenuto'])) {
        $error_message ='content has to exist';
        header("Location: error.php?message=" . urlencode($error_message));

    }

    if(empty($_POST['contenuto'])) {
        $error_message = 'content cant be null';
        header("Location: error.php?message=" . urlencode($error_message));

    }

    if(strlen($_POST['contenuto']) > 200) {
        $error_message = 'content can\'t be longer than 200 characters';
        header("Location: error.php?message=" . urlencode($error_message));
    }

$contenuto = sanitize_input($_POST['contenuto']);

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
}else{
    header("Location: error.php?message=" . urlencode("You have to login to comment"));
    exit();
}

if(isset($_POST['post_id'])){
    $postId = $_POST['post_id'];
}else{
    header("Location: error.php?message=" . urlencode("Post not found"));
    exit();
}

$query = "INSERT INTO comments (content, post_id, user_id) VALUES ('$contenuto', '$postId', '$userId')";

$result = $conn->query($query);

if($result === TRUE){
    header("Location: homepage.php");
    exit();
} else {
    header("Location: error.php?message=" . urlencode("error in adding comment"));
    exit();
}
?>
