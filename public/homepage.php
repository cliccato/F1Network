<?php
require '../src/connect.php';
require '../src/header.php';

function getComments($conn, $postId) {
    $sql = "SELECT Comments.*, Users.username 
            FROM Comments 
            INNER JOIN Users ON Comments.user_id = Users.id 
            WHERE Comments.post_id = $postId 
            ORDER BY Comments.pubblish_date DESC 
            LIMIT 20";
    $result = mysqli_query($conn, $sql);

    $comments = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $comments .= '<div class="comment">';
            $comments .= '<div><strong>Username:</strong> ' . $row['username'] . '</div>';
            $comments .= '<div><strong>Content:</strong> ' . $row['content'] . '</div>';
            $comments .= '<div><strong>Date:</strong> ' . $row['pubblish_date'] . '</div>';
            $comments .= '</div>';
        }
    } else {
        $comments = 'No comments found.';
    }

    return $comments;
}

$sql_posts = "SELECT Posts.*, Users.username 
              FROM Posts 
              INNER JOIN Users ON Posts.user_id = Users.id 
              ORDER BY Posts.pubblish_date DESC 
              LIMIT 20";
$result_posts = mysqli_query($conn, $sql_posts);

if (mysqli_num_rows($result_posts) > 0) {
    while ($row_posts = mysqli_fetch_assoc($result_posts)) {
        $post_id = $row_posts['id'];
        $username = $row_posts['username'];
        $content = $row_posts['content'];
        $pubblish_date = $row_posts['pubblish_date'];

        $sql_comments_count = "SELECT COUNT(*) AS comment_count FROM Comments WHERE post_id = $post_id";
        $result_comments_count = mysqli_query($conn, $sql_comments_count);
        $row_comments_count = mysqli_fetch_assoc($result_comments_count);
        $comment_count = $row_comments_count['comment_count'];

        echo '<div class="post-card">';
        echo '<div><strong>Username:</strong> ' . $username . '</div>';
        echo '<div><strong>Content:</strong> ' . $content . '</div>';
        echo '<div><strong>Date:</strong> ' . $pubblish_date . '</div>';
        echo '<div><strong>Comments:</strong> ' . $comment_count . '</div>';
        echo '<div>';
        echo '<button class="show-comments" onclick="toggleComments(' . $post_id . ')">Show Comments</button>';
        echo '<div class="comments" id="comments-' . $post_id . '" style="display: none;">';
        echo getComments($conn, $post_id);
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo 'No posts found.';
}

require '../src/footer.php';
?>

<script src="js/postCommentsScript.js"></script>