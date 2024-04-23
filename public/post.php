<?php
require '../src/connect.php'; 
require '../src/functions.php'; 

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: error.php?message=" . urlencode("Request method not supported"));
    exit();
}

$fields = array('username', 'password', 'content');
$fieldsSizes = array(50, 100, 200);

$error_message = '';

foreach(array_combine($fields, $fieldsSizes) as $field => $fieldSize) {
    if(!isset($_POST[$field])) {
        $error_message = $field . ' has to exist';
        break;
    }

    if(empty($_POST[$field])) {
        $error_message = $field . ' can''t be null';
        break;
    }

    if(strlen($_POST[$field]) > $fieldSize) {
        $error_message = $field . ' can''t be longer than ' . $fieldSize . ' chars';
        break;
    }      
}

if(!empty($error_message)) {
    header("Location: error.php?message=" . urlencode($error_message));
    exit();
}

$user_id = getUserId($_POST['username'], $_POST['password']); // Assuming this function retrieves the user's ID based on username and password
if($user_id) {
    $content = $_POST['content'];
    if(insertPost($content, $user_id)) {
        // Post inserted successfully
        header("Location: success.php?message=" . urlencode("Post created successfully"));
        exit();
    } else {
        // Error inserting post
        header("Location: error.php?message=" . urlencode("Error creating post"));
        exit();
    }
} else {
    // Invalid username or password
    header("Location: error.php?message=" . urlencode("Invalid username or password"));
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Write Post</title>
</head>
<body>
    <h2>Write Post</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

