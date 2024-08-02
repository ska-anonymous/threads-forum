<?php
include 'partials/_dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>iDiscuss - Coding Forums</title>
</head>

<body>
    <!-- header -->
    <?php include 'partials/_header.php'; ?>

    <?php
    $showAlert = false;
    // insert comment to database if post comment button is clicked
    if (isset($_POST['btn-post-comment'])) {
        $thread_id = $_GET['threadid'];
        $comment_content = $_POST['comment'];
        $comment_content = str_replace("<", "&lt;", $comment_content);
        $comment_content = str_replace(">", "&gt;", $comment_content);
        $comment_user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO `comments`(`comment_content`,`comment_thread_id`,`comment_user_id`)VALUES('$comment_content','$thread_id','$comment_user_id')";
        $qry = mysqli_query($conn, $sql);
        if ($qry) {
            $showAlert = true;
        } else {
            $showAlert = false;
        }
    }

    ?>




    <!-- Alert -->
    <?php
    if ($showAlert) {
        echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong>Comment Added Succesfully. Thanks for you support
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
    }
    ?>

    <div class="container my-3">
        <?php
        $thread_id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE `thread_id`='$thread_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $thread_user_id = $row['thread_user_id'];
        $sql2 = "SELECT user_email FROM users WHERE user_id='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $user_email = $row2['user_email'];

        ?>

        <div class="jumbotron p-3" style="background-color: #d8d8db;">
            <h1 class="display-4"><?php echo $row['thread_title']; ?></h1>
            <p class="lead"><?php echo $row['thread_desc']; ?></p>
            <hr class="my-4">
            <p>Keep it friendly.
                Be courteous and respectful. Appreciate that others may have an opinion different from yours.
                Stay on topic.
                Share your knowledge.
                Refrain from demeaning, discriminatory, or harassing behaviour and speech.</p>
            <p class="lead">
            <p><b>Posted by: </b><em><?php echo $user_email; ?></em></p>
            </p>
        </div>
        <hr>
    </div>

    <?php
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    ?>
        <div class="container">
            <h1 class="my-4">Post a Comment</h1>
            <form action="thread.php?threadid=<?php echo $thread_id; ?>" method="post" class="my-3">
                <div class="mb-3">
                    <label for="comment" class="form-label">Type Your Comment</label>
                    <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success" name="btn-post-comment">post comment</button>
            </form>
            <hr>
        </div>
    <?php
    } else {
    ?>
        <div class="container">
            <h1 class="my-4">Post a Comment</h1>
            <p class="lead text-warning">Please Login to post a comment</p>
            <hr>
        </div>

    <?php
    }
    ?>

    <div class="container">
        <h1 class="my-3">Discussions</h1>
        <?php
        $noResults = true;
        $sql = "SELECT * FROM `comments` WHERE `comment_thread_id`='$thread_id'";
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($results)) {
            $noResults = false;
            $comment_user_id = $row['comment_user_id'];
            $sql2 = "SELECT user_email FROM users WHERE user_id='$comment_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $user_email = $row2['user_email'];

        ?>
            <div class="media d-flex my-3">
                <img class="mr-3" src="img/user-default.png" height="50" alt="User Image">
                <div class="media-body">
                    <p class="my-0"><b><?php echo $user_email . " at " . date('d-m-Y h:i:s a', strtotime($row['comment_time'])); ?></b></p>
                    <?php echo $row['comment_content']; ?>
                </div>
            </div>
        <?php
        }

        if ($noResults) {
            echo '
                <div class="jumbotron jumbotron-fluid p-2" style="background-color: #d8d8db;">
                    <div class="container">
                    <p class="display-5">No Comments found for this thread</p>
                    <p class="lead">Be the first to post a comment.</p>
                    </div>
                </div>
            ';
        }
        ?>
    </div>

    <!-- footer -->
    <?php include 'partials/_footer.php'; ?>

    <script src="bootstrap/js/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>