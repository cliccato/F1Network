<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Racing+Sans+One:wght@400;700&display=swap">
    <link rel="stylesheet" href="css/index.css">
    <title>F1 Network</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
    <div class="form-backgroud">
        <form id="authForm" method="post" action="addPost.php">
        <img src="images/logo.png">
            <p>Nuovo post</p>
            <input type="text" id="contenuto" name="contenuto" placeholder="Contenuto" required><br>
            <input type="text" id="URL" name="URL" placeholder="URL immagine">
            <input type="submit" value="Crea" name="register">
        </form>
    </div>
</body>