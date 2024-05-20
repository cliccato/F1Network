<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/error.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title>Error</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="error-container text-center mt-5">
                    <h1 class="display-4"><i class="fas fa-exclamation-triangle text-danger"></i> Error</h1>
                    <?php
                    require '../src/functions.php';
                    $error_message = isset($_GET['message']) ? sanitize_input($_GET['message']) : 'An error occurred.';
                    echo "<p class='lead'>$error_message</p>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
