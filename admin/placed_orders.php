<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
};

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
    $delete_order->execute([$delete_id]);
    header('location:placed_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Placed Orders</title>

   <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Custom CSS File Link -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- Placed Orders Section Starts -->

<section class="placed-orders">

   <?php
   $select_orders = $conn->prepare("SELECT * FROM `orders`");
   $select_orders->execute();
   $numbers_of_orders = $select_orders->rowCount();

   $total_pendings = 0;
   $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
   $select_pendings->execute(['pending']);
   while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
       $total_pendings += $fetch_pendings['total_price'];
   }
   ?>

   <h1 class="heading">Total Orders <?= $numbers_of_orders; ?>
      <br>Placed Orders Total <span>$</span><?= $total_pendings; ?><span>/-</span>
   </h1>

   <div class="table-container">
       <table>
           <thead>
               <tr>
                   <th>User ID</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Number</th>
                   <th>Address</th>
                   <th>Total Products</th>
                   <th>Total Price</th>
                   <th>Payment Method</th>
                   <th>Actions</th>
               </tr>
           </thead>
           <tbody>
               <?php
               $select_orders = $conn->prepare("SELECT * FROM `orders`");
               $select_orders->execute();
               if ($select_orders->rowCount() > 0) {
                   while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
               ?>
               <tr>
                   <td><?= $fetch_orders['user_id']; ?></td>
                   <td><?= $fetch_orders['name']; ?></td>
                   <td><?= $fetch_orders['email']; ?></td>
                   <td><?= $fetch_orders['number']; ?></td>
                   <td><?= $fetch_orders['address']; ?></td>
                   <td><?= $fetch_orders['total_products']; ?></td>
                   <td>$<?= $fetch_orders['total_price']; ?>/-</td>
                   <td><?= $fetch_orders['method']; ?></td>
                   <td>
                       <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('Delete this order?');">Delete</a>
                   </td>
               </tr>
               <?php
                   }
               } else {
                   echo '<tr><td colspan="9" class="empty">No orders placed yet!</td></tr>';
               }
               ?>
           </tbody>
       </table>
   </div>

</section>

<!-- Placed Orders Section Ends -->

<!-- Custom JS File Link -->
<script src="../js/admin_script.js"></script>


</body>
</html>
