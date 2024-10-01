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
   <title>event</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include 'components/user_header.php'; ?>

<div class="head">
   <h3>event</h3>
</div>

<!-- event section starts  -->

<section class="event" id="event">

    <div class="box-container">

    <?php
         $select_event = $conn->prepare("SELECT * FROM `event`");
         $select_event->execute();
         if($select_event->rowCount() > 0){
            while($fetch_event = $select_event->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_event['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_event['name']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_event['image']; ?>">
         <img src="uploaded_img/<?= $fetch_event['image']; ?>" alt="">
         <div class="name"><b><?= $fetch_event['name']; ?></b></div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no event added yet!</p>';
         }
      ?>
      </div>
</section>

<?php include 'components/footer.php'; ?>

<!-- event section ends -->

</body>
</html>