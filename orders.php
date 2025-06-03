<?php

include 'components/connect.php';

session_start();

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
   <title>orders</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="orders">

    <h1 class="heading">Placed Orders</h1>

    <div class="box-container">

    <?php
        if ($user_id == '') {
            echo '<p class="empty">Please login to see your orders</p>';
        } else {
            // Fetch orders for the logged-in user
            $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
            $select_orders->execute([$user_id]);

            if ($select_orders->rowCount() > 0) {
                while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="box">
        <center>
            <h3 style="font-size: 18px; background-color: maroon; color: white">
                Order ID: <span><?= htmlspecialchars($fetch_orders['id']); ?></span>
            </h3>
        </center>
        <p>Placed on: <span><?= htmlspecialchars($fetch_orders['placed_on']); ?></span></p>
        <p>Name: <span><?= htmlspecialchars($fetch_orders['name']); ?></span></p>
        <p>Email: <span><?= htmlspecialchars($fetch_orders['email']); ?></span></p>
        <p>Number: <span><?= htmlspecialchars($fetch_orders['number']); ?></span></p>
        <p>Address: <span><?= htmlspecialchars($fetch_orders['address']); ?></span></p>
        <p>Payment Method: <span><?= htmlspecialchars($fetch_orders['method']); ?></span></p>
        <p>Your Orders: <span><?= htmlspecialchars($fetch_orders['total_products']); ?></span></p>
        <p>Total Price: <span>Rs.<?= htmlspecialchars($fetch_orders['total_price']); ?>/-</span></p>
        <p>
            Payment Status: 
            <span style="color: <?php echo ($fetch_orders['payment_status'] == 'pending') ? 'red' : 'green'; ?>">
                <?= htmlspecialchars($fetch_orders['payment_status']); ?>
            </span>
        </p>

        <hr style="border: 2px solid;">
        <h4 style="font-size: 25px;">Tracking Status</h4>

        <?php
            // Fetch tracking details for the current order
            $select_tracking = $conn->prepare("SELECT * FROM `tracking` WHERE id = ?");
            $select_tracking->execute([$fetch_orders['id']]);

            if ($select_tracking->rowCount() > 0) {
                while ($fetch_tracking = $select_tracking->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <p>
            Status: <span><?= htmlspecialchars($fetch_tracking['tracking_status']); ?></span>
            [<span><?= htmlspecialchars($fetch_tracking['rec_date']); ?></span>]
        </p>
        <?php
                }
            } else {
                echo '<p class="empty">Tracking details not available yet!</p>';
            }
        ?>
    </div>
    <?php
                }
            } else {
                echo '<p class="empty">No orders placed yet!</p>';
            }
        }
    ?>
    </div>

</section>






<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>