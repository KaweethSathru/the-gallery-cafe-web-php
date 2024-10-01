<?php
include 'components/connect.php';

// Start session only if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include 'components/user_header.php'; ?>

<div class="head">
   <h3>about</h3>
</div>

<!-- about section starts  -->

<section class="about" id="about">

    <h3 class="sub-heading"> about us </h3>
    <h1 class="heading"> why choose us? </h1>

    <div class="row">

        <div class="image">
            <img src="images/about img.png" alt="">
        </div>

        <div class="content">
            <h3>best food in the country</h3>
            <p>The Gallery Cafe is a chain of gourmet bakery and patisserie shops catering to a wide range of daily, 
               indulgence and celebration needs with its scrumptious array of Fast Food, Main Dishes, Desserts and cookies.
               A heaven for cakes and pastries, the bakery offers freshly prepared appetizing treats ranging from the traditional to the exotic, 
               to the "made to order" recipes.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>free delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>easy payments</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 service</span>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- about section ends -->

<?php include 'components/footer.php'; ?>