<?php include('./partials-front/menu.php'); ?>

<section class="food-search text-center">
    <div class="container">
        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" placeholder="Search For Foods..." name="search" required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>

<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>

<section class="categories">
    <div class=" container">
        <h2 class="text-center">Explore Food</h2>
        <?php

        //Display all the cateories that are active
        //Sql Query
        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);

        //CHeck whether categories available or not
        if ($count > 0) {
            //CAtegories Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the Values
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
        ?>

        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
            <div class="box-3 float-container">
                <?php
                        if ($image_name == "") {
                            //Image not Available
                            echo "<div class='error'>Image not found.</div>";
                        } else {
                            //Image Available
                        ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza"
                    class="img-responsive img-curve">
                <?php
                        }
                        ?>


                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
        </a>

        <?php
            }
        } else {
            //CAtegories Not Available
            echo "<div class='error'>Category not found.</div>";
        }

        ?>


        <div class="clearfix"></div>
    </div>
</section>

<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu </h2>
        <?php

        //Getting Foods from Database that are active and featured
        //SQL Query
        $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

        //Execute the Query
        $res2 = mysqli_query($conn, $sql2);

        //Count Rows
        $count2 = mysqli_num_rows($res2);

        //CHeck whether food available or not
        if ($count2 > 0) {
            //Food Available
            while ($row = mysqli_fetch_assoc($res2)) {
                //Get all the values
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
        ?>

        <div class="food-menu-box">
            <div class="food-menu-img">
                <?php
                        //Check whether image available or not
                        if ($image_name == "") {
                            //Image not Available
                            echo "<div class='error'>Image not available.</div>";
                        } else {
                            //Image Available
                        ?>
                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza"
                    class="img-responsive img-curve">
                <?php
                        }
                        ?>

            </div>

            <div class="food-menu-desc">
                <h4><?php echo $title; ?></h4>
                <p class="food-price">$<?php echo $price; ?></p>
                <p class="food-detail">
                    <?php echo $description; ?>
                </p>
                <br>

                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order
                    Now</a>
            </div>
        </div>

        <?php
            }
        } else {
            //Food Not Available 
            echo "<div class='error'>Food not available.</div>";
        }

        ?>
        <div class="clearfix"></div>
    </div>
    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>

<?php include('partials-front/footer.php'); ?>