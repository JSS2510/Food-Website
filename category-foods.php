<?php

include("partials-front/menu.php");


?>

<?php
// Check Wheather the id is passed or not
if (isset($_GET['category_id'])) {
    // Category Id Is set and get the id
    $category_id=$_GET['category_id'];

    // Get The Category Title Based On Category ID 
    $query="SELECT title FROM tbl_category WHERE id=$category_id";

    // Execute the Query
    $res= $conn->query($query) or die($conn->error);
   

    // Get the Value from Database
    $row=mysqli_fetch_assoc($res);
   // Get The titel
    $category_title=$row['title'];

}
else {
    // Category Not passed
    // Redirect To Home Page
    header('location:index.php');
}

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white"><?php echo $category_title;   ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            //  Create Sql Query to Get Foods on Selected Category
            $q="SELECT * FROM tbl_food WHERE category_id=$category_id";
      
            // Execute the Query
            $res2= $conn->query($q) or die($conn->error);
      

            // Count rows to check Wheather the ctegory is available or not
            $count = mysqli_num_rows($res2);

            // Check wheather Food is Available or not
            if ($count>0) {
                // Food is Available
                while($row2=mysqli_fetch_assoc($res2)) {
                    // Get The values like id tittle image_name
                    $id=$row2['id'];
                    $title=$row2['title'];
                    $description=$row2['description'];
                    $price=$row2['price'];
                    $image_name=$row2['image_name'];

                    ?>
                        
                <div class="food-menu-box">
                <div class="food-menu-img">
                <?php
                    if ($image_name =="") {
                        // Image is not Available
                        echo "<div class='error'>Image  not Available</div>";
                    }
                    else {
                        // Image Available
                        ?>
                        <img src="./images/food/<?php echo $image_name;?> " alt="Pizza" class="img-responsive img-curve">

                        <?php
                    }
                    ?>

                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">₹<?php echo $price; ?></p>
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
                // Food IS not Available
                echo "<div class='error'>Food is Not Available</div>";
            }

            ?>
           

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    
    <?php

include("partials-front/footer.php");


?>