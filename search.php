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



    <!-- search results here -->
    <?php
    $search = $_GET['search'];
    // replace angular brackets for matching in database and to avoid XSS
    $search = str_replace("<", "&lt;", $search);
    $search = str_replace(">", "&gt;", $search);
    ?>
    <div class="container my-3">
        <h1>Search results for <em>"<?php echo $search; ?>"</em></h1>
        <hr>
        <?php
        $sql = "SELECT * FROM `threads` WHERE `thread_title` LIKE '%$search%' OR `thread_desc` LIKE '%$search%'";
        $results = mysqli_query($conn, $sql);
        $noResults = true;
        while ($row = mysqli_fetch_assoc($results)) {
            $noResults = false;
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
        ?>
            <div class="result">
                <h3><a href="/forum/thread.php?threadid=<?php echo $thread_id ?>" class="text-dark"><?php echo $title; ?></a></h3>
                <p><?php echo $desc; ?></p>
            </div>

        <?php
        }

        if ($noResults) {
            echo '
                <div class="jumbotron jumbotron-fluid p-2" style="background-color: #d8d8db;">
                    <div class="container">
                    <p class="display-5">No Results Found</p>
                    <p class="lead">Suggestions:</p>
                    <ul>
                        <li>Make sure that all words are spelled correctly</li>
                        <li>Try different keywords</li>
                        <li>Try more general keywords</li>
                    </ul>
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