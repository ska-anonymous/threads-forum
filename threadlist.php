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
    // submit thread if submit button is clicked
    if (isset($_POST['btn-submit'])) {
        $th_cat_id = $_GET['catid'];
        $th_title = $_POST['title'];
        $th_description = $_POST['desc'];
        
        // validate if it contains tags
        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_description = str_replace("<", "&lt;", $th_description);
        $th_description = str_replace(">", "&gt;", $th_description);

        $th_user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO `threads`(`thread_title`,`thread_desc`,`thread_cat_id`,`thread_user_id`)VALUES('$th_title','$th_description','$th_cat_id','$th_user_id')";
        $qry = mysqli_query($conn, $sql);
        if ($qry) {
            $showAlert = true;
        } else {
            $showAlert = false;
            // echo "thread not added ". mysqli_error($conn);
        }
    }

    ?>



    <!-- Alert -->
    <?php
    if ($showAlert) {
        echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong>Thread Added Succesfully. Please wait for community to respond
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
    }
    ?>

    <?php
    //  fetch category based on catid 
    $catid = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE `category_id`='$catid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    ?>
    <div class="container my-3">
        <div class="jumbotron p-3" style="background-color: #d8d8db;">
            <h1 class="display-4">Welcome to <?php echo $row['category_name']; ?> Forums</h1>
            <p class="lead"><?php echo $row['category_description']; ?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other.</p>
            <p>Keep it friendly.
                Be courteous and respectful. Appreciate that others may have an opinion different from yours.
                Stay on topic.
                Share your knowledge.
                Refrain from demeaning, discriminatory, or harassing behaviour and speech.</p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
        <hr>
    </div>

    <?php
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    ?>
        <div class="container">
            <h1 class="">Ask a question</h1>
            <form action="threadlist.php?catid=<?php echo $catid; ?>" method="post" class="my-3">
                <div class="mb-3">
                    <label for="title" class="form-label">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible.</div>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Elaborate Your Problem</label>
                    <textarea class="form-control" name="desc" id="desc" rows="7" required></textarea>
                </div>
                <button type="submit" class="btn btn-success" name="btn-submit">Submit</button>
            </form>
            <hr>
        </div>

    <?php
    } else {
    ?>
        <div class="container">
            <h1 class="">Ask a question</h1>
            <p class="lead text-warning">Please Login to ask a question</p>
            <hr>
        </div>

    <?php
    }
    ?>

    <div class="container">
        <h1 class="my-4">Browse Questions</h1>
        <?php
        $sql = "SELECT * FROM `threads` WHERE `thread_cat_id`=$catid";
        $results = mysqli_query($conn, $sql);

        $noResults = true;
        while ($row = mysqli_fetch_assoc($results)) {
            $noResults = false;
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT user_email FROM users WHERE user_id='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $user_email = $row2['user_email'];
        ?>
            <div class="media d-flex my-3">
                <img class="mr-3" src="img/user-default.png" height="50" alt="User Image">
                <div class="media-body">
                    <h6 class="mt-0"><a href="thread.php?threadid=<?php echo $row['thread_id']; ?>"><?php echo $row['thread_title']; ?></a></h6>
                    <p class="my-0"><b><?php echo $user_email . " at " . date('d-m-Y h:i:s a', strtotime($row['timestamp'])); ?></b></p>
                    <?php echo $row['thread_desc']; ?>
                </div>
            </div>

        <?php
        }

        if ($noResults) {
            echo '
                <div class="jumbotron jumbotron-fluid p-2" style="background-color: #d8d8db;">
                    <div class="container">
                    <p class="display-5">No Threads found</p>
                    <p class="lead">Be the first to ask a question.</p>
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