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
    <title>review</title>

    
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>

<body>

<?php include 'components/user_header.php'; ?>

<div class="head">
   <h3>review</h3>
</div>

<!-- review section starts  -->

<section class="review" id="review">

    <h3 class="sub-heading"> customer's review </h3>
    <h1 class="heading"> what they say </h1>

    <div class="swiper-container review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pro 1.jpg" alt="">
                    <div class="user-info">
                        <h3>Bill Michael</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Very good service, good menu … not overly extensive. Food was very good quality all around. 
                    They know how to prepare home fries and their omelets are top-notch. Prices were reasonable.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pro 2.jpg" alt="">
                    <div class="user-info">
                        <h3>Heung Min</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>The food was excellent and so was the service.  I had the mushroom risotto with scallops which was awesome.
                   My wife had a burger over greens (gluten-free) which was also very good. They were very conscientious about gluten allergies.
                   The restaurant has a vey nice ambiance and a cozy bar.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pro 3.jpg" alt="">
                    <div class="user-info">
                        <h3>Paul Bettany</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Normally wings are wings, but theirs are lean meaty and tender, and delicious homemade teriaki glaze.
                   Gluten free pizza way better than most. Great wait staff too.
                   Came here after finding the best gluten free muffins anywhere.</p>
            </div>

            <div class="swiper-slide slide">
                <i class="fas fa-quote-right"></i>
                <div class="user">
                    <img src="images/pro 4.jpg" alt="">
                    <div class="user-info">
                        <h3>Sanath Nishantha</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>My husband and I had our Anniversary dinner at the Fairway last night. We sat outside on the terrace which was very pretty and private. 
                   Our waitress was wonderful and the food was absolutely delicious!! It could not have been more spectacular! We would highly recommend it to everyone!!</p>
            </div>

        </div>

    </div>
    
</section>

<!-- review section ends -->

<?php include 'components/footer.php'; ?>

<script>
    var swiper = new Swiper(".review-slider", {
        spaceBetween: 20,
        centeredSlides: false,
        autoplay: {
            delay: 7500,
            disableOnInteraction: false,
        },
        loop: true,
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
</script>

</body>
</html>