<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title>F1 Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #222;
            color: #fff;
            background-image: url('../images/background.jpg');
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            overflow-y: hidden;
            display: flex;
            align-items: center;
        }

        #logo {
            width: 25%;
            height: auto;
            opacity: 0;
            animation: fade-in 3s ease-in-out forwards;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .content {
            text-align: center;
        }

        .site-presentation {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .site-presentation h2 {
            color: #fff;
            font-size: 24px;
        }

        .site-presentation p {
            color: #fff;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .btn-login {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
        <img id="logo" src="images/logo.png" alt="F1 Network Logo">
        <div class="site-presentation">
            <h2>Benvenuto su F1 Network</h2>
            <p>Il sito di riferimento per trovare altri appassionati come te!<br> Leggi i post, commenta, organizza gruppi per andare ai gran premi, e molto altro!</p>
            <a href="access.php" class="btn btn-danger btn-login">
                <i class="fas fa-sign-in-alt"></i> Unisciti
            </a>
        </div>
    </div>

    <script>
        var logo = document.getElementById("logo");

        logo.addEventListener("animationend", function() {
            document.querySelector(".site-presentation").style.display = 'block';
        });
    </script>
</body>
</html>
