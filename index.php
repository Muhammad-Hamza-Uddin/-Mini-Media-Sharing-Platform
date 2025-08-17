<?php
session_start();

// Initialize posts array
if (!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = [
        ['user' => 'User 1', 'text' => 'This is a dummy post!', 'image' => 'https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg'],
    ];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['post_text'])) {
    $new_post = [
        'user' => 'User 2', // Dummy user
        'text' => htmlspecialchars($_POST['post_text']),
        'image' => 'https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg',
    ];
    array_unshift($_SESSION['posts'], $new_post); // Add new post at the top
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Sharing Platform</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .post {
            background: white;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .profile-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">Media Share</a>
</nav>

<div class="container">
    <div class="post mb-3">
        <div class="d-flex align-items-center">
            <img src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" alt="Profile" class="profile-image">
            <form method="POST" class="ml-3 w-100">
                <div class="form-group">
                    <input type="text" name="post_text" class="form-control" placeholder="What's on your mind?" required>
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
        </div>
    </div>

    <div class="posts-feed">
        <?php foreach ($_SESSION['posts'] as $post): ?>
            <div class="post">
                <div class="d-flex align-items-center">
                    <img src="<?php echo $post['image']; ?>" alt="Profile" class="profile-image">
                    <div class="ml-3">
                        <strong><?php echo $post['user']; ?></strong>
                        <p><?php echo $post['text']; ?></p>
                        <button class="btn btn-link">Like</button>
                        <button class="btn btn-link">Comment</button>
                        <button class="btn btn-link">Share</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"></script>
<script src="https://static.vecteezy.com/system/resources/thumbnails/005/544/718/small_2x/profile-icon-design-free-vector.jpg"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
