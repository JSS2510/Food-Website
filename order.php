<?php

include("partials-front/menu.php");


?>

<?php

// Check Whether food id is Set or Not 
if (isset($_GET['food_id'])){
    // Get The Food Id and details of the selected food 

     // Food Id Is set and get the id
     $food_id=$_GET['food_id'];

     // Get The Food Title Based On Food ID 
     $query="SELECT * FROM tbl_food WHERE id=$food_id";
 
     // Execute the Query
     $res= $conn->query($query) or die($conn->error);

    //  Count The Rows
    $count = mysqli_num_rows($res);
    
     // Check Whether the data is available or not
     if ($count == 1){
        // We Have Data
        // Get The Data from Data Base
        $row=mysqli_fetch_assoc($res);
        // Get The titel, price, image name
        $id=$row['id'];
        $title=$row['title'];
        $price=$row['price'];
        $image_name=$row['image_name'];

     }
     else {
        // Food Not Availabel
        // Redirect to Home Page
        header('location:index.php');
     }
}
else {
   // Food Not passed
    // Redirect To Home Page
    header('location:index.php');
}


?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php

                        // Check Wheather the image is available or not
                        if ($image_name=="") {
                            // Image is not available
                            echo "<div class='error'>Image is Not Available</div>";
                        }  
                        else {
                            // Image is Available
                            ?>
                               <img src="./images/food/<?php echo $image_name;?> " alt="Pizza" class="img-responsive img-curve">
                            <?php
                        }
                          

                        ?>
                       
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title   ?></h3>
                        <input type="hidden" name="food" value="<?php  echo $title;  ?>">

                        <p class="food-price">₹<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php  echo $price;  ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Jayesh Sharma" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. jayesh@gmail.com.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary" >
                </fieldset>

            </form>

          <?php
           
        //    Check Whether Image Button Click or Not
        if (isset($_POST['submit'])) {
            // Get all The Details From the Form

            $food=$_POST['food'];
            $price=$_POST['price'];
            $qty=$_POST['qty'];

            $total=$price * $qty;    // total =price * qty

            $order_date=date("Y-m-d h:i:sa");   //Order Date Or Time

            $status="Ordered";   //Ordered , on Delivery, Delivered, Cancel 

            $customer_name=$_POST['full-name'];
            $customer_contact=$_POST['contact'];
            $customer_email=$_POST['email'];
            $customer_address=$_POST['address'];

            // Save the order in database
            // Create the sql query to save the data 

            $q="INSERT INTO `tbl_order`(`food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES ('$food','$price','$qty','$total','$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address')";

            // echo $q; die();

             // Execute the query
            $res2= $conn->query($q) or die($conn->error);
            
            // Check whether Query Executed or Not
            if ($res2==True) {
                // Query Exceuted and order send
                $_SESSION['order']= "<div class='success text-center' >Order Placed</div>";
                header('location:index.php');
            }
            else {
                // Failed to Save Order
                $_SESSION['order']= "<div class='error text-center'>Order Failed </div>";
                header('location:index.php');
            }

        }

          ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

   

    <?php

include("partials-front/footer.php");


?>