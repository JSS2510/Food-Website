<?php

include("partials-front/menu.php");


?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php

            //  Display All food That are active

            $query ="SELECT * FROM tbl_category WHERE active='Yes'";

            // Execute the query
            $res= $conn->query($query) or die($conn->error);

            
            // Count rows to check Wheather the food is available or not
            $count = mysqli_num_rows($res);

            // Check Whether Food available or not

            if ($count>0) {
                // Food Available
                while($row=mysqli_fetch_assoc($res)) {
                    // Get The values like id tittle image_name
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>
                        <a href="category-foods.php?category_id=<?php echo $id ?>">
                        <div class="box-3 float-container">
                            <?php
                            // Check Wheather image is available or not
                               if ($image_name == "") {
                                //   Display the message Image is Not Avaliable
                                echo "<div class='error'>Image Not Available</div>";
                               }
                               else {
                                // Image Available
                                  ?>
                                    
                                    <img src="<?php ?>images/category/<?php echo $image_name;   ?> " alt="Pizza" class="img-responsive img-curve">
 
                                  <?php
                               }
                            ?>
                        

                        <h3 class="float-text text-white"><?php echo $title;?></h3>
                        </div>
                      </a>
                       

                    <?php
                }
            }
            else {
                // Category is not Available
                echo "<div class='error'>Category not added</div>";
            }



           ?>            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php

include("partials-front/footer.php");


?>