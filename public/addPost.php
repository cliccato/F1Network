<?php
require '../src/connect.php';
require '../src/functions.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: error.php?message=" . urlencode("Request method not supported"));
    exit();
}

if(!isset($_POST['contenuto'])) {
    $error_message = 'contenuto has to exist';
    header("Location: error.php?message=" . urlencode($error_message));

}

if(empty($_POST['contenuto'])) {
    $error_message = 'contenuto cant be null';
    header("Location: error.php?message=" . urlencode($error_message));

}

if(strlen($_POST['contenuto']) > 200) {
    $error_message = 'contenuto cant be have more than 200 chars';
    header("Location: error.php?message=" . urlencode($error_message));
}

$ULR = null;

if(isset($_POST['URL']) && strlen($_POST['URL'])<100) {

    $URL = sanitize_input($_POST['URL']);
}

$contenuto = sanitize_input($_POST['contenuto']);

$userId = null;

if (isset($_COOKIE['user_id'])) {
    $userId = $_COOKIE['user_id'];
}else{
    header("Location: error.php?message=" . urlencode("Login first"));
    exit();
}

if($URL == null){
    $query = "INSERT INTO posts (content, user_id) VALUES ('$contenuto', '$userId')";
}else{
    $query = "INSERT INTO posts (content, image_url, user_id) VALUES ('$contenuto', '$URL', '$userId')";
}

$result = $conn->query($query);

if($result === TRUE){
    header("Location: homepage.php");
    exit();
} else {
    header("Location: error.php?message=" . urlencode("errore nell'aggiunta del post"));
    exit();
}
?>
