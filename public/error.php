<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>
<body>
    <h1>Error</h1>
    <?php
    require '../src/functions.php';
    $error_message = isset($_GET['message']) ? sanitize_input($_GET['message']) : 'Si è verificato un errore.';
    echo "<p>$error_message</p>";
    ?>
</body>
</html>
