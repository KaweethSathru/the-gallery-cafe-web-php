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
   <title>promotion</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include 'components/user_header.php'; ?>

<div class="head">
   <h3>promotion</h3>
</div>

<!-- promotion section starts  -->

<section class="promotion" id="promotion">

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

<?php include 'components/footer.php'; ?>

<!-- promotion section ends -->


</body>
</html>