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
        <form id="authForm" method="post">
        <img src="images/logo.png">
        <p>Login</p>
            <input type="text" id="username" name="username" placeholder="Username" required><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" value="Invia" name="login">
            <br>
            <small>Non hai un account? <a href="register.php">Registrati qui</a></small>
        </form>
    </div>

    <script>
        var authForm = document.getElementById("authForm");

        authForm.addEventListener("submit", function(event) {
            var submitButton = event.submitter || document.activeElement;
            var action;
            action = "login.php";

            authForm.action = action;
        });
    </script>
</body>
</html>
