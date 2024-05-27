<?php
require '../src/cross.php';
require '../src/connect.php';
require '../src/functions.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: error.php?message=" . urlencode("Request method not supported"));
    exit();
}

$fields = array('email', 'password', "username", "date", "cell");
$fieldsSizes = array(100, 100, 50, NULL, 20);
$error_message = '';

foreach(array_combine($fields, $fieldsSizes) as $field => $fieldSize) {
    if ($field === 'cell') {
        continue;
    }

    if(!isset($_POST[$field])) {
        $error_message = $field . ' has to exist';
        break;
    }

    if(empty($_POST[$field])) {
        if ($field === 'cell') {
            continue;
        }

        $error_message = $field . ' cant be null';
        break;
    }

    if(strlen($_POST[$field]) > $fieldSize) {
        if ($field === 'date') {
            continue;
        }
        $error_message = $field . ' cant be long more than ' . $fieldSize . ' chars';
        break;
    }      
}

if(!empty($error_message)) {
    header("Location: error.php?message=" . urlencode($error_message));
    exit();
}

$email = sanitize_input($_POST['email']);
$password = sha1(sanitize_input($_POST['password']));
$username = sanitize_input($_POST['username']);
$date = sanitize_input($_POST['date']);
$cell = sanitize_input($_POST['cell']);

$query = "SELECT * FROM Users WHERE email='$email'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    header("Location: error.php?message=" . urlencode("Mail ".$email." is already being used"));
    exit();
}

$query = "SELECT * FROM Users WHERE username='$username'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    header("Location: error.php?message=" . urlencode("User ".$username." already exist"));
    exit();
}

$query = "INSERT INTO Users (email, password, username, birth_date, cell) VALUES ('$email', '$password', '$username', '$date', '$cell')";
if ($conn->query($query) === TRUE) {
    $query = "SELECT * FROM Users WHERE username='$username'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION["user_id"] = $user['id'];
        header("Location: homepage.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: error.php?message=" . urlencode("Error while creating new user"));
    exit();
}
?>
