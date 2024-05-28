<?php
require '../src/cross.php';
require '../src/connect.php';
require '../src/header.php';
require '../src/functions.php';

echo "<h1>Formula 1 Groups</h1>";

$user_id = $_SESSION['user_id'];

$sql_groups = "SELECT * FROM Groups ORDER BY name";
$result_groups = mysqli_query($conn, $sql_groups);

if (mysqli_num_rows($result_groups) > 0) {
    echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
    while ($row_groups = mysqli_fetch_assoc($result_groups)) {
        $group_id = $row_groups['id'];
        $name = $row_groups['name'];
        $description = $row_groups['description'];

        $sql_check_membership = "SELECT COUNT(*) AS membership_count FROM usergroups WHERE user_id = $user_id AND group_id = $group_id";
        $result_check_membership = mysqli_query($conn, $sql_check_membership);
        $row_check_membership = mysqli_fetch_assoc($result_check_membership);
        $membership_count = $row_check_membership['membership_count'];

        echo '<div class="col mb-4">';
        echo '<div class="news-card">';
        echo "<h2><a href='showGroupPosts.php?groupid=$group_id'>" . sanitize_input($name) . '</a></h2>';
        echo '<p>' . $description . '</p>';

        if ($membership_count == 0 || !isset($user_id)) {
            echo "<br><a class='button' href='enterGroup.php?groupid=$group_id'>Entra</a>";
        }

        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<div class="alert alert-warning" role="alert">Nessun gruppo trovato.</div>';
}

require '../src/footer.php';
?>
