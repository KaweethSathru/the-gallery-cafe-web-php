<?php

include '../components/connect.php';

session_start();

$staff_id = $_SESSION['staff_id'];

if(!isset($staff_id)){
   header('location:staff_login.php');
};


if(isset($_POST['add_event'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   $select_event = $conn->prepare("SELECT * FROM `event` WHERE name = ?");
   $select_event->execute([$name]);

   if($select_event->rowCount() > 0){
      $message[] = 'event name already exists!';
   }else{
      if($image_size > 9000000){
         $message[] = 'image size is too large';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);

         $insert_product = $conn->prepare("INSERT INTO `event`(name, image) VALUES(?,?)");
         $insert_product->execute([$name, $image]);

         $message[] = 'new event added!';
      }

   }

}

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `event` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/'.$fetch_delete_image['image']);
   $delete_product = $conn->prepare("DELETE FROM `event` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   header('location:event.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>event</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/staff_header.php' ?>

<!-- add event section starts  -->

<section class="add-products">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>add event</h3>
      <input type="text" required placeholder="enter event name" name="name" maxlength="100" class="box">
      

      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
      <input type="submit" value="add event" name="add_event" class="btn">
   </form>

</section>

<!-- add event section ends -->

<!-- show event section starts  -->

<section class="show-products" style="padding-top: 0;">

   <div class="box-container">

   <?php
      $show_event = $conn->prepare("SELECT * FROM `event`");
      $show_event->execute();
      if($show_event->rowCount() > 0){
         while($fetch_event = $show_event->fetch(PDO::FETCH_ASSOC)){  
   ?>
   <div class="box">
      <img src="../uploaded_img/<?= $fetch_event['image']; ?>" alt="">
      <div class="name"><?= $fetch_event['name']; ?></div>
      <div class="flex-btn">
         <a href="event.php?delete=<?= $fetch_event['id']; ?>" class="delete-btn" onclick="return confirm('delete this event?');">delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no event added yet!</p>';
      }
   ?>

   </div>

</section>

<!-- show event section ends -->

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>