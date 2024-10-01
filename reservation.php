<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone_no = filter_input(INPUT_POST, 'phone_no', FILTER_SANITIZE_STRING);
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guest = filter_input(INPUT_POST, 'no_of_people', FILTER_VALIDATE_INT);

    if ($name && $email && $phone_no && $date && $time && $guest) {
        try {
            // Prepare SQL query to insert reservation data
            $query = "INSERT INTO reservation (name, email, phone_no, date, time, guest) VALUES (:name, :email, :phone_no, :date, :time, :guest)";
            $stmt = $conn->prepare($query);

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone_no', $phone_no);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':time', $time);
            $stmt->bindParam(':guest', $guest, PDO::PARAM_INT);

            // Execute query and check for success
            if ($stmt->execute()) {
                echo "<script>alert('Booking successful!');</script>";
            } else {
                echo "<script>alert('Failed to book. Please try again later.');</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Database error: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Please fill all fields correctly.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Custom CSS File Link -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'components/user_header.php'; ?>

<div class="head">
   <h3>reservation</h3>
</div>

<section class="reservation-section" id="reservation">
    <div class="contact-container">
        <h2 id="content-subheading">reservation Table</h2>
        <form class="reservation-form" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone_no">Phone Number</label>
                <input type="tel" id="phone_no" name="phone_no" pattern="[0-9]{10}" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="no_of_people">Number of People</label>
                <input type="number" id="no_of_people" name="no_of_people" min="1" max="20" required>
            </div>
            <button type="submit" class="button-main-3">Book Now</button>
        </form>
    </div>
</section>

<?php include 'components/footer.php'; ?>

</body>
</html>
