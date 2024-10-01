<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="swiper-container home-slider">

        <div class="swiper-wrapper wrapper">

            <div class="swiper-slide slide">
                <div class="content">
                    <span>Our special dish</span>
                    <h3>Spaghetti</h3>
                    <p>This classic Chinese dish features al dente spaghetti with fresh cherry tomatoes and fragrant basil leaves, 
                        drizzled with olive oil and seasoned with salt and pepper. Making it a favorite of pasta lovers.</p>
                    <a href="menu.php" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="images/home img 1.png" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3>Seafood Paella</h3>
                    <p>Seafood Paella is a flavorful Italian dish featuring shrimp, mussels, vegetables, and saffron-infused rice, 
                       giving it a distinctive yellow hue and rich taste. Known for its communal nature and deep roots in Italian culinary tradition, 
                       it is often a centerpiece for gatherings and celebrations.</p>
                    <a href="menu.php" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="images/home img 2.png" alt="">
                </div>
            </div>

            <div class="swiper-slide slide">
                <div class="content">
                    <span>our special dish</span>
                    <h3>Fusilli Pasta</h3>
                    <p>This fusilli pasta salad, fresh greens, cherry tomatoes, and broccoli, tossed in a light vinaigrette with basil and Parmesan cheese.
                       It's a versatile and healthy dish, perfect for warm weather, offering a delicious way to enjoy a variety of vegetables in one meal.</p>
                    <a href="menu.php" class="btn">order now</a>
                </div>
                <div class="image">
                    <img src="images/home img 3.png" alt="">
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- home section ends -->

<!-- category section start -->

<section class="category" id="category">
    
    <h1 class="title">food category</h1>
    
    <div class="box-container">
        
        <a href="category.php?category=Italian Cuisine" class="box">
            <img src="images/cat_1.png" alt="">
            <h3>Italian Cuisine</h3>
        </a>
        
        <a href="category.php?category=Sri Lankan Cuisine" class="box">
            <img src="images/cat_2.png" alt="">
            <h3>Sri Lankan Cuisine</h3>
        </a>
            <a href="category.php?category=Chinese Cuisine" class="box">
                <img src="images/cat_3.png" alt="">
                <h3>Chinese Cuisine </h3>
            </a>
            <a href="category.php?category=American Cuisine" class="box">
                <img src="images/cat_4.png" alt="">
                <h3>American Cuisine  </h3>
            </a>
        </div>

</section>

<!-- category section ends -->

<!-- promotion section starts  -->

<section class="promotion" id="promotion">
    <h1 class="heading">Our Promotions</h1>
    <div class="box-container">
        <?php
            $select_promotion = $conn->prepare("SELECT * FROM `promotion`");
            $select_promotion->execute();
            if($select_promotion->rowCount() > 0){
                while($fetch_promotion = $select_promotion->fetch(PDO::FETCH_ASSOC)){
        ?>
        <figure class="box">
            <img src="uploaded_img/<?= $fetch_promotion['image']; ?>" alt="<?= $fetch_promotion['name']; ?>">
            <figcaption class="name"><?= $fetch_promotion['name']; ?></figcaption>
        </figure>
        <?php
                }
            } else {
                echo '<p class="empty">No promotions added yet!</p>';
            }
        ?>
    </div>
</section>

<!-- promotion section ends -->

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

<!-- menu section starts  -->

<section class="products" id="products">

    <h3 class="sub-heading"> our menu </h3>
    <h1 class="heading"> today's speciality </h1>

    <div class="box-container">

    <?php
         $select_products = $conn->prepare("SELECT * FROM `products`");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><b><?= $fetch_products['name']; ?></b></div>
         <div class="flex">
            <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
         <button type="submit" class="btn" name="add_to_cart">add to cart</> </button>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>
      </div>
</section>

<!-- menu section ends -->

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

<!-- footer section starts  -->
 
<footer class="footer" id="footer">
    <div class="footer-container">

        <div class="footer-section">
            <h3>Locations</h3>
            <ul>
                <li><a href="#">Italy</a></li>
                <li><a href="#">Sri Lanka</a></li>
                <li><a href="#">China</a></li>
                <li><a href="#">America</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Contact Info</h3>
            <ul>
                <li><a href="tel:+94761234558">+94-761-234-558</a></li>
                <li><a href="tel:+94719481698">+94-719-481-698</a></li>
                <li><a href="mailto:gallerycafe@gmail.com">gallerycafe@gmail.com</a></li>
                <li><span>Colombo, Sri Lanka - 254/1</span></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3>Follow Us</h3>
            <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
        </div>

    </div>

    <div class="credit"> Copyright &copy; 2024 By <span>Kaweeth Liyanage</span> </div>
</footer>

<!-- footer section ends -->

<!-- custom js file link  -->

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".home-slider", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 7500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            loop:true,
        });
        
    </script>

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

<script>
navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   profile.classList.remove('active');
}

function loader(){
   document.querySelector('.loader').style.display = 'none';
}

function fadeOut(){
   setInterval(loader, 2000);
}

window.onload = fadeOut;

document.querySelectorAll('input[type="number"]').forEach(numberInput => {
   numberInput.oninput = () =>{
      if(numberInput.value.length > numberInput.maxLength) numberInput.value = numberInput.value.slice(0, numberInput.maxLength);
   };
});
</script>

</body>

</html>