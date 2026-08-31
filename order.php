<?php
require_once "db_connect.php";

$prices = [
    "Classic Burger" => 199,
    "Cheese Pizza" => 299,
    "Spicy Noodles" => 149,
    "Cold Drink" => 50
];

$name = trim($_POST["customer_name"] ?? "");
$mobile = trim($_POST["mobile"] ?? "");
$email = trim($_POST["email"] ?? "");
$food = $_POST["food_item"] ?? "";
$quantity = (int)($_POST["quantity"] ?? 0);
$address = trim($_POST["address"] ?? "");

if ($name === "" || $mobile === "" || $email === "" || !isset($prices[$food]) || $quantity < 1 || $address === "") {
    die("Invalid order details.");
}

$total = $prices[$food] * $quantity;

$stmt = $conn->prepare(
    "INSERT INTO orders (customer_name, mobile, email, food_item, quantity, address, total_price)
     VALUES (?, ?, ?, ?, ?, ?, ?)"
);
$stmt->bind_param("ssssisd", $name, $mobile, $email, $food, $quantity, $address, $total);
$stmt->execute();

$order_id = $stmt->insert_id;
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Order Confirmed</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<section class="hero">
<div class="container">
<h1>🎉 Order Confirmed!</h1>
<p>Thank you, <?php echo htmlspecialchars($name); ?>.</p>
<p>Order ID: <strong>QB<?php echo $order_id; ?></strong></p>
<p><?php echo htmlspecialchars($food); ?> × <?php echo $quantity; ?></p>
<p>Total: <strong>₹<?php echo number_format($total, 2); ?></strong></p>
<a class="btn" href="index.html">Back to MealBox</a>
</div>
</section>
</body>
</html>
