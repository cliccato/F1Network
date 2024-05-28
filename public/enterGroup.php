<?php
require '../src/cross.php';
require '../src/connect.php';
require '../src/header.php';
require '../src/functions.php';

if(isset($_GET['groupid']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $group_id = sanitize_input($_GET['groupid']);

    $sql_check_membership = "SELECT * FROM UserGroups WHERE user_id = $user_id AND group_id = $group_id";
    $result_check_membership = mysqli_query($conn, $sql_check_membership);

    if(mysqli_num_rows($result_check_membership) > 0) {
        echo 'L\'utente è già membro di questo gruppo.';
    } else {

        $sql_add_membership = "INSERT INTO UserGroups (user_id, group_id) VALUES ($user_id, $group_id)";
        if(mysqli_query($conn, $sql_add_membership)) {
            header("Location: groups.php");
            exit();
        } else {
            header("Location: error.php?message=" . urlencode("Errore nell'aggiunta al gruppo"));
            exit();
        }
    }
} else {
    header("Location: error.php?message=" . urlencode("Id gruppo o utente non specificati"));
    exit();
}

require '../src/footer.php';
?>
