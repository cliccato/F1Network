<?php
require '../src/connect.php';
require '../src/header.php';
require '../src/functions.php';

$sql_posts = "SELECT Posts.*, Users.* 
              FROM Posts 
              INNER JOIN Users ON Posts.user_id = Users.id 
              ORDER BY Posts.pubblish_date DESC 
              LIMIT 20";
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
        echo getComments($conn, $post_id);
        echo '</div>';
        echo '</div>';


    }
} else {
    echo 'No posts found.';
}

require '../src/footer.php';
?>

<script src="js/postCommentsScript.js"></script>