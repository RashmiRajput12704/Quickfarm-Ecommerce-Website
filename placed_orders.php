<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}

if (isset($_POST['update_payment'])) {
    $order_id = $_POST['order_id'];
    $payment_status = $_POST['payment_status'];
    $tracking_status = $_POST['tracking_status'];
    $tracking_id = mt_rand(1111, 9999);

    // Sanitize inputs
    $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
    $tracking_status = filter_var($tracking_status, FILTER_SANITIZE_STRING);

    try {
        // Update the payment status in the orders table
        $update_payment = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
        $update_payment->execute([$payment_status, $order_id]);

        // Insert tracking data into the tracking table
        $tracking_data = $conn->prepare("INSERT INTO `tracking` (tracking_id, id, tracking_status, rec_date) VALUES (?, ?, ?, ?)");
        $tracking_data->execute([$tracking_id, $order_id, $tracking_status, date('Y-m-d')]);

        $message[] = 'Payment status and tracking details updated successfully!';
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

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
   <title>placed orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="orders">

<h1 class="heading">placed orders</h1>

<div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders`");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   
   <div class="box">
      <center><h3 style="font-size: 18px;background-color:maroon;color:white">Order ID: <span ><?= $fetch_orders['id']; ?></span></h3></center>
      <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> name : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> number : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
      <p> total products : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span> </p>
      <p> payment method : <span><?= $fetch_orders['method']; ?></span> </p>
      <form action="" method="post">
         <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
         <select name="payment_status" class="select" required>
    <option selected disabled><?= $fetch_orders['payment_status']; ?></option>
    <option value="pending">Pending</option>
    <option value="completed">Completed</option>
</select>

         <input type="text" required name="tracking_status" placeholder="tracking status" class="form-control">
        <div class="flex-btn">
         <input type="submit" value="update" class="option-btn" name="update_payment">
         <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
        </div>
      </form>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
   ?>

</div>

</section>

</section>
<script src="../js/admin_script.js"></script>
   
</body>
</html>