<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>F1 Network</title>
</head>
<body>
    <div class="backgroud">
        <form id="authForm" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login" name="login">
            <input type="submit" value="Register" name="register">
        </form>
    </div>

    <script>
        var authForm = document.getElementById("authForm");

        authForm.addEventListener("submit", function(event) {
            var submitButton = event.submitter || document.activeElement;
            var action;

            if (submitButton.name === "login") {
                action = "login.php";
            } else if (submitButton.name === "register") {
                action = "register.php";
            }

            authForm.action = action;
        });
    </script>
</body>
</html>
