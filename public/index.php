<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title>F1 Network</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #000;
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
    </style>
</head>
<body>
    <img id="logo" src="images/logo.png">
    
    <script>
        var logo = document.getElementById("logo");

        logo.addEventListener("animationend", function() {
            window.location.href = "access.php";
        });
    </script>
</body>
</html>
