<?php

include 'connect.php';

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">
      <a href="#" class="logo"><i class="fas fa-utensils"></i>The Gallery Cafe</a>
      <nav class="navbar">
         <a class="nav-link active" href="home.php#home">home</a>
         <a class="nav-link" href="#category">category</a>
         <a class="nav-link" href="promotion.php#promotion">promotion</a>
         <a class="nav-link" href="about.php#about">about</a>
         <a class="nav-link" href="menu.php#products">menu</a>
         <a class="nav-link" href="review.php#review">review</a>
         <a class="nav-link" href="event.php#event">event</a>
         <a class="nav-link" href="reservation.php#reservation">reservation</a>
      </nav>

      <div class="icons">
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         </div>
         <p class="account">
            <a href="login.php">login</a> or
            <a href="register.php">register</a>
         </p> 
         <?php
            }else{
         ?>
            <p class="name">please login first!</p>
            <a href="login.php" class="btn">login</a>
         <?php
          }
         ?>
      </div>

   </section>

</header>

<script>
document.getElementById('user-btn').onclick = function() {
   var profile = document.getElementById('profile');
   if(profile.style.display === 'block') {
      profile.style.display = 'none';
   } else {
      profile.style.display = 'block';
   }
};

document.addEventListener('DOMContentLoaded', () => {
   const navLinks = document.querySelectorAll('.nav-link');

   // Add click event to update active link
   navLinks.forEach(link => {
      link.addEventListener('click', function() {
         // Remove 'active' class from all links
         navLinks.forEach(nav => nav.classList.remove('active'));

         // Add 'active' class to the clicked link
         this.classList.add('active');
      });
   });

   // Function to update active link based on scroll position
   const updateActiveLinkOnScroll = () => {
      let currentSection = '';
      const sections = document.querySelectorAll('section[id]');

      sections.forEach(section => {
         const sectionTop = section.offsetTop;
         if (scrollY >= sectionTop - 150) {
            currentSection = section.getAttribute('id');
         }
      });

      navLinks.forEach(link => {
         link.classList.remove('active');
         if (link.getAttribute('href').includes(`#${currentSection}`)) {
            link.classList.add('active');
         }
      });
   };

   // Add scroll event listener
   window.addEventListener('scroll', updateActiveLinkOnScroll);

   // Initial call to set active link based on scroll position
   updateActiveLinkOnScroll();
});
</script>
