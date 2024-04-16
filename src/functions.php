<?php
function sanitize_input($input) {
    return htmlspecialchars(stripcslashes(trim($input)));
}
?>
