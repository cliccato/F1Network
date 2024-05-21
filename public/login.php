<?php
require '../src/cross.php';
require '../src/connect.php';
require '../src/functions.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: error.php?message=" . urlencode("Request method not supported"));
    exit();
}

$fields = array('username', 'password');
$fieldsSizes = array(50, 100);
$error_message = '';

foreach(array_combine($fields, $fieldsSizes) as $field => $fieldSize) {
    if(!isset($_POST[$field])) {
        $error_message = $field . ' has to exist';
        break;
    }

    if(empty($_POST[$field])) {
        $error_message = $field . ' cant be null';
        break;
    }

    if(strlen($_POST[$field]) > $fieldSize) {
        $error_message = $field . ' cant be long more than ' . $fieldSize . ' chars';
        break;
    }      
}

if(!empty($error_message)) {
    header("Location: error.php?message=" . urlencode($error_message));
    exit();
}

$username = sanitize_input($_POST['username']);
$password = sha1(sanitize_input($_POST['password']));

$query = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $_SESSION["user_id"] = $user['id'];
    header("Location: homepage.php");
    exit();
} else {
    header("Location: error.php?message=" . urlencode("Incorrect username or password"));
    exit();
}
?>
