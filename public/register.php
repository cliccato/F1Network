<?php
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

$query = "SELECT * FROM Users WHERE username='$username'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    header("Location: error.php?message=" . urlencode("User ".$username." already exist"));
    exit();
}

$query = "INSERT INTO Users (username, password) VALUES ('$username', '$password')";
if ($conn->query($query) === TRUE) {
    header("Location: home.php");
    exit();
} else {
    header("Location: error.php?message=" . urlencode("Error while creating new user"));
    exit();
}
?>
