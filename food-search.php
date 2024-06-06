<?php

include("partials-front/menu.php");


?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
            // Get the Search Keyword
            // $search=$_POST['search'];
            $search=mysqli_real_escape_string($conn, $_POST['search']);

            ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search;   ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

            // Sql Query to get based on search Keybord
            // $search =burger'; Drop database name;   
            // "SELECT * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger'%'";

            $query="SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            // Execute the query
            $res= $conn->query($query) or die($conn->error);

             // Count rows to check Wheather the food is available or not
             $count = mysqli_num_rows($res);

            //  Check Wheather food available or not

            if ($count>0) {
                // Food Available
                while ($row=mysqli_fetch_assoc($res)) {
                    // GEt The Details
                    $id=$row['id'];
                    $title=$row['title'];
                    $description=$row['description'];
                    $price=$row['price'];
                    $image_name=$row['image_name'];

                    ?>
                <div class="food-menu-box">
                <div class="food-menu-img">
                <?php
                    if ($image_name ="") {
                        // Image is not Available
                        echo "<div class='error'>Image Is not Available</div>";
                    }
                    else {
                        // Image Available
                        ?>
                        <img src="./images/food/<?php echo $row['image_name']?> " alt="Pizza" class="img-responsive img-curve">

                        <?php
                    }
                    ?>
                   
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price"><?php echo $price; ?></p>
                    <p class="food-detail">
                    <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="order.php" class="btn btn-primary">Order Now</a>
                </div>
            </div>
                    
                    <?php
                }
            }
            else {
                // Food is Not Available
                echo "<div class='error'>Food Not Found</div>";
            }


            ?>

       

           

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php

include("partials-front/footer.php");


?>