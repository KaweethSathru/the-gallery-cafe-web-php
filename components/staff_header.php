<?php
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

      <a href="dashboard.php" class="logo">Staff<span>Panel</span></a>

      <nav class="navbar">
         <a href="dashboard.php">home</a>
         <a href="products.php">products</a>
         <a href="orders.php">orders</a>
         <a href="reservation.php">reservation</a>
         <a href="event.php">event</a>
         <a href="promotion.php">promotion</a>
         <a href="users_accounts.php">users</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">


         <div class="flex-btn">
            <a href="staff_login.php" class="option-btn">login</a>
            <a href="register_staff.php" class="option-btn">register</a>
         </div>
         <a href="../components/staff_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
      </div>

   </section>

</header>