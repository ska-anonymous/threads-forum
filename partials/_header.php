<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-body-tertiary" style="position: sticky; top:0; z-index:5;">
    <div class="container-fluid">
        <a class="navbar-brand" href="./">iDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Top Categories
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <?php
                        $sql = "SELECT * FROM categories LIMIT 10";
                        $results = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo '
                                <li><a class="dropdown-item" href="/forum/threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>
                            ';                            
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="search.php" method="GET">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" required>
                <button class="btn btn-success" type="submit">Search</button>
            </form>
            <?php
            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            ?>
                <div class="mx-2 my-2 d-flex align-items-center">
                    <p class="text-light my-0 mx-2">Welcome <?php echo $_SESSION['user_email']; ?></p>
                    <a href="/forum/partials/_logout.php" class="btn btn-outline-warning">Log Out</a>
                </div>
            <?php
            } else {
            ?>
                <div class="mx-2 my-2">
                    <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button>
                    <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</nav>

<?php
include '_loginmodal.php';
include '_signupmodal.php';

if (isset($_GET['signup']) && $_GET['signup'] == "true") {
    echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success: </strong>User account created successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
} elseif (isset($_GET['signup']) && $_GET['signup'] == "false" && isset($_GET['error']) && $_GET['error'] != "false") {
    echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failure: </strong>' . $_GET['error'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
}


if (isset($_GET['login']) && $_GET['login'] == "false" && isset($_GET['error']) && $_GET['error'] != "false") {
    echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Failed: </strong>' . $_GET['error'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
}
?>