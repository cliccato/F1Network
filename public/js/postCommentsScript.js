function toggleComments(postId) {
    let commentsDiv = document.getElementById('comments-' + postId);
    if (commentsDiv.style.display === 'none') {
        commentsDiv.style.display = 'block';
    } else {
        commentsDiv.style.display = 'none';
    }
}