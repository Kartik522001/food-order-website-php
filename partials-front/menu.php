<?php include('config/constants.php'); ?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-1.0">
    <meta charset="UTF-8">
    <title>Restaurant web site</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="logo">
                    <img src="images/logo.png" alt="Restaurant logo" class="img-responsive">
                </a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="#">Content</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>