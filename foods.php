<?php

include("partials-front/menu.php");


?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            // Display Foods That Are active
            $query ="SELECT * FROM tbl_food WHERE active='Yes'";
             // Execute the query
             $res= $conn->query($query) or die($conn->error);
 
            // Count rows to check Wheather the Food  is available or not
            $count = mysqli_num_rows($res);

            // Check Whether Food available or not
            if ($count>0) {
                // Foods AvaILABLE
                while ($row=mysqli_fetch_assoc($res)) {
                    // Get The Values
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

                    <a href="order.php?food_id=<?php echo $id  ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>

                    <?php
                }
            }
            else {
                // Food Not Available
                echo "<div class='erroe'>Foods Not Available</div>";
            }

            ?>

            
           


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php

include("partials-front/footer.php");


?>