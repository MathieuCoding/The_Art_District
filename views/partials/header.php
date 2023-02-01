<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Art District</title>
    <!-- Favicons -->
    <link href="images\pngegg.png" rel="icon">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/custom.css">


</head>
<header class="p-3 text-bg-dark fixed-top">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <h1 id="headerTitle" class="">The Art District</h1>
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($categories as $category) {
                            echo "<li><a class='dropdown-item' href='category.php?id=" . $category->getId_category() . "'>" . $category->getCategory_name() . "</a></li>";
                        }
                        ?>
                    </ul>
                </li>
                <?php if (isset($_SESSION['user']) && !empty(['user'])) { ?>
                    <li><a href="addPost.php" class="nav-link px-2 text-white">New article</a></li>
                <?php } ?>
            </ul>


                    
                        

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
                <?php if (isset($_SESSION['user']) && !empty(['user'])) { ?>
                    <a href="logout.php"><button type="button" class="btn btn-outline-light me-2">Logout</button></a>
                <?php } else { ?>
                    <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                    <a href="signup.php"><button type="button" class="btn btn-primary">Sign-up</button></a>
                <?php } ?>
            </div>
        </div>
    </div>
</header>

<body style='background:url("images/output-onlinepngtools.png") no-repeat center center fixed; background-size: cover; margin-top: 100px;'>
    <div class="allButFooter">