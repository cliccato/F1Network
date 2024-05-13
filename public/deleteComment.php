<?php
require '../src/connect.php';
require '../src/functions.php';

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    header("Location: error.php?message=" . urlencode("Request method not supported"));
    exit();
}

if(!isset($_GET['comment_id'])) {
    $error_message = 'content has to exist';
    header("Location: error.php?message=" . urlencode($error_message));

}

if(empty($_GET['post_id'])) {
    $error_message = 'content cant be null';
    header("Location: error.php?message=" . urlencode($error_message));

}

$comment_id = sanitize_input($_GET['comment_id']);

$sql = "SELECT user_id FROM Comments WHERE id = $comment_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row["user_id"];
} else {
    header("Location: error.php?message=" . urlencode("Comment doesn't exists"));
    exit();
}

if ($_SESSION['user_id'] !== $user_id) {
    header("Location: error.php?message=" . urlencode("Only original creator can delete comments"));
    exit();
}


$sql = "DELETE FROM Comments WHERE id = $comment_id";
if ($conn->query($sql) === TRUE) {
    header("Location: homepage.php");
    exit();
} else {
    header("Location: error.php?message=" . urlencode("Error while deleting the comment"));
    exit();
}
?>
