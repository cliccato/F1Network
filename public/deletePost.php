<?php
require '../src/connect.php';
require '../src/functions.php';

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    header("Location: error.php?message=" . urlencode("Request method not supported"));
    exit();
}

if(!isset($_GET['post_id'])) {
    $error_message = 'contenuto has to exist';
    header("Location: error.php?message=" . urlencode($error_message));

}

if(empty($_GET['post_id'])) {
    $error_message = 'contenuto cant be null';
    header("Location: error.php?message=" . urlencode($error_message));

}

$post_id = sanitize_input($_GET['post_id']);

$sql = "SELECT user_id FROM Posts WHERE id = $post_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row["user_id"];
} else {
    header("Location: error.php?message=" . urlencode("Post dont exists"));
    exit();
}

if ($_SESSION['user_id'] !== $user_id) {
    header("Location: error.php?message=" . urlencode("Only original creator can delete post"));
    exit();
}


$sql = "DELETE FROM Posts WHERE id = $post_id";
if ($conn->query($sql) === TRUE) {
    header("Location: user.php");
    exit();
} else {
    header("Location: error.php?message=" . urlencode("Error while deleting the post"));
    exit();
}



?>
