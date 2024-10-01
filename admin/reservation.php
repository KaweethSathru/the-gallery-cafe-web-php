<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

// Handle confirmation and cancellation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm'])) {
        $reservation_id = $_POST['reservation_id'];
        $status = 'confirmed';
    } elseif (isset($_POST['cancel'])) {
        $reservation_id = $_POST['reservation_id'];
        $status = 'canceled';
    }

    if (isset($reservation_id)) {
        try {
            $query = "UPDATE reservation SET status = :status WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $reservation_id, PDO::PARAM_INT);
            $stmt->execute();

            echo "<script>alert('Reservation status updated successfully.');</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Error updating status: " . $e->getMessage() . "');</script>";
        }
    }
}

// Fetch reservations
$query = "SELECT * FROM reservation ORDER BY date, time";
$stmt = $conn->prepare($query);
$stmt->execute();
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<section class="reservations-section">
    <div class="reservations-container">
        <h2>Reservations</h2>
        <?php foreach ($reservations as $reservation): ?>
            <div class="reservation-card">
                <p><strong>ID:</strong> <?= htmlspecialchars($reservation['id']) ?></p>
                <p><strong>Name:</strong> <?= htmlspecialchars($reservation['name']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($reservation['email']) ?></p>
                <p><strong>Mobile Number:</strong> <?= htmlspecialchars($reservation['phone_no']) ?></p>
                <p><strong>Date:</strong> <?= htmlspecialchars($reservation['date']) ?></p>
                <p><strong>Time:</strong> <?= htmlspecialchars($reservation['time']) ?></p>
                <p><strong>Number of Visitors:</strong> <?= htmlspecialchars($reservation['guest']) ?></p>
                <p><strong>Status:</strong> <?= htmlspecialchars($reservation['status']) ?></p>
                <form method="POST" class="action-form">
                    <input type="hidden" name="reservation_id" value="<?= htmlspecialchars($reservation['id']) ?>">
                    <?php if ($reservation['status'] !== 'confirmed'): ?>
                        <button type="submit" name="confirm" class="button-confirm">Confirm</button>
                    <?php endif; ?>
                    <?php if ($reservation['status'] !== 'canceled'): ?>
                        <button type="submit" name="cancel" class="button-cancel">Cancel</button>
                    <?php endif; ?>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</section>

</body>
</html>
