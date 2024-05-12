<?php
require '../src/connect.php';
require '../src/header.php';
require '../src/functions.php';
    
echo "<h1>Formula 1 Search</h1>";

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    header("Location: error.php?message=" . urlencode("Request method not supported"));
    exit();
} else {

    echo '<div>';
    echo '<form class="search-form" action="search.php" method="GET">';
    echo '<input type="text" id="parola" name="parola" placeholder="Cerca post con parola chiave" size="50" required>';
    echo '<input type="submit" value="Invia">';
    echo '</form>';
    echo '</div>';

    // Esegue la ricerca solo se è stato inviato il form con una parola chiave valida
    if(isset($_GET['parola']) && !empty(trim($_GET['parola']))) {
        $parola = sanitize_input($_GET['parola']);

        $sql_posts = "SELECT Posts.*, Users.* 
                      FROM Posts 
                      INNER JOIN Users ON Posts.user_id = Users.id 
                      WHERE Posts.content LIKE '%$parola%'
                      ORDER BY Posts.pubblish_date DESC";

        $result_posts = mysqli_query($conn, $sql_posts);

        if (mysqli_num_rows($result_posts) > 0) {
            while ($row_posts = mysqli_fetch_assoc($result_posts)) {
                $post_id = $row_posts['id'];
                $user_id = $row_posts['user_id'];
                $username = $row_posts['username'];
                $content = $row_posts['content'];
                $pubblish_date = $row_posts['pubblish_date'];
        
        
                $sql_comments_count = "SELECT COUNT(*) AS comment_count FROM Comments WHERE post_id = $post_id";
                $result_comments_count = mysqli_query($conn, $sql_comments_count);
                $row_comments_count = mysqli_fetch_assoc($result_comments_count);
                $comment_count = $row_comments_count['comment_count'];
        
                echo '<div class="post-card rounded">';
                echo '<div><a href="user.php?userid='.$user_id.'"><b>' . $username . '</b></a> ' . $pubblish_date . '</div>';
                echo '<div>' . $content . '</div>';
                if(isset($row_posts['image_url'])) {
                    echo '<div><img class="post-image" src="'. $row_posts['image_url'] .'"></div>';
                }
                echo '<div>';
                echo '<i class="fa-regular fa-comment" onclick="toggleComments(' . $post_id . ')"></i> ' . $comment_count;
                echo '</div>';
                echo '<div class="comments" id="comments-' . $post_id . '" style="display: none;">';
                echo '<div class="mb-0 mx-auto">';
                echo '<form class="comment-form" action="addComments.php" method="post">';
                echo '<input type="hidden" name="post_id" value="' . $post_id . '">';
                echo '<input type="text" id="contenuto" name="contenuto" placeholder="Aggiungi un commento" required>';
                echo '<input type="submit" value="Commenta" name="register">';
                echo '</form></div>';
                echo getComments($conn, $post_id);
                echo '</div></div>';
            }
        } else {
            echo 'No posts found.';
        }
    }
}

require '../src/footer.php';

?>

<script src="js/postCommentsScript.js"></script>