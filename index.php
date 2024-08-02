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

    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1200x300/?coding,python" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1200x300/?coding,JavaScript" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1200x300/?coding,PHP" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Categories container starts here -->
    <div class="container my-3">
        <h2 class="text-center">iDiscuss - Browse Categories</h2>
        <hr>
        <div class="row my-3">
            <?php
            // fetch all the categories
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            //  a loop to iterate through categories 
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                        <div class="col-md-4 my-2">
                            <div class="card" style="width: 18rem;">
                                <img src="https://source.unsplash.com/150x140/?coding,'.$row['category_name'].'" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['category_name'].'</h5>
                                    <p class="card-text">'.$row['category_description'].'</p>
                                    <a href="threadlist.php?catid='.$row['category_id'].'" class="btn btn-primary">View Threads</a>
                                </div>
                            </div>
                        </div>
                ';
            }
            ?>

        </div>

    </div>

    <!-- footer -->
    <?php include 'partials/_footer.php'; ?>

    <script src="bootstrap/js/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>