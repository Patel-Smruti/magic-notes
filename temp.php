<?php
// get the data from the form
if (isset($_POST['product_description'])) {
    $product_description = $_POST['product_description'];
}
if (isset($_POST['list_price'])) {
    $list_price = $_POST['list_price'];
}
if (isset($_POST['discount_percent'])) {
    $discount_percent = $_POST['discount_percent'];
}

// calculate the discount
$discount = $list_price * $discount_percent * .01;
$discount_price = $list_price - $discount;

// apply current formatting to the dollar and percent amounts
$list_price_formatted = "$" . number_format($list_price, 2);
$discount_percent_formatted = number_format($discount_percent, 1) . "%";
$discount_formatted = "$" . number_format($discount, 2);
$discount_price_formatted = "$" . number_format($discount_price, 2);

// escape the unformatted input
$product_description_escaped = htmlspecialchars($product_description);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>

<body>
    <h1>Product Details</h1>
    <p><strong>Product Description:</strong> <?php echo $product_description_escaped; ?></p>
    <p><strong>List Price:</strong> <?php echo $list_price_formatted; ?></p>
    <p><strong>Discount Percent:</strong> <?php echo $discount_percent_formatted; ?></p>
    <p><strong>Discount Amount:</strong> <?php echo $discount_formatted; ?></p>
    <p><strong>Discounted Price:</strong> <?php echo $discount_price_formatted; ?></p>
</body>

</html>