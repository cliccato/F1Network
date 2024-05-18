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
        <form action="insert.php" method="post">
        <img src="images/logo.png">
        <p>Registrazione</p>
            <input type="text" id="email" name="email" placeholder="Email" required><br>
            <input type="password" id="password" name="password" placeholder="Password" minlength="8" required><br>
            <input type="text" id="username" name="username" placeholder="Nome utente" required><br>
            <small>Data di nascita:</samll>
            <input type="date" id="date" name="date" placeholder="Data di nascita" required><br>
            <input type="tel" id="cell" name="cell" placeholder="Numero di telefono (facoltativo)" ><br><br>

            <input type="submit" value="Invia" name="register">
        </form>
    </div>
</body>
</html>