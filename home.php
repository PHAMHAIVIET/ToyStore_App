<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-image: url('2.jpg');
            background-size: cover;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            margin-top: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        label {
            display: inline-block;
            width: 100px;
        }

        input[type="number"], input[type="text"], select {
            width: 200px;
            margin-bottom: 10px;
            padding: 5px;
        }

        input[type="submit"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: blue;
            text-decoration: none;
            
        }
        
    </style>
</head>
<body>
    <h1>Welcome to ATN Shop <?php echo $_SESSION['name']; ?></h1>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <?php
    // Khung bán hàng
    $products = [
        ['name' => 'Lego', 'quantity' => 10, 'quality' => 'High', 'price' => 10.99],
        ['name' => 'Babies', 'quantity' => 5, 'quality' => 'Medium', 'price' => 5.99],
        ['name' => 'Motobikes', 'quantity' => 8, 'quality' => 'Low', 'price' => 8.99],
        ['name' => 'Octimus Prime', 'quantity' => 12, 'quality' => 'High', 'price' => 12.99],
        ['name' => 'Superman', 'quantity' => 10, 'quality' => 'High', 'price' => 9.99],
        ['name' => 'Spiderman', 'quantity' => 5, 'quality' => 'Medium', 'price' => 6.99],
    ];

    $qualityOptions = ['High', 'Medium', 'Low'];

    $cart = [];
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }

    if (isset($_POST['add_to_cart'])) {
        $productIndex = $_POST['product_index'];
        $quantity = $_POST['quantity'];
        $quality = $_POST['quality'];

        $product = $products[$productIndex];
        $product['quantity'] = $quantity;
        $product['quality'] = $quality;

        $cart[] = $product;

        $_SESSION['cart'] = $cart;
    }

    if (isset($_GET['remove'])) {
        $index = $_GET['remove'];
        if (isset($cart[$index])) {
            unset($cart[$index]);
            $_SESSION['cart'] = $cart;
        }
    }

    echo "<h2>Your Cart</h2>";
    echo "<table>";
    echo "<tr><th>Name</th><th>Quantity</th><th>Quality</th><th>Price</th><th></th></tr>";
    foreach ($cart as $index => $product) {
        echo "<tr>";
        echo "<td>" . $product['name'] . "</td>";
        echo "<td>" . $product['quantity'] . "</td>";
        echo "<td>" . $product['quality'] . "</td>";
        echo "<td>$" . $products[$index]['price'] . "</td>";
        echo "<td><a href='?remove=" . $index . "'>Remove</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<h2>Add Product</h2>";
    echo "<form method='post'>";
    echo "<label for='product_index'>Select product:</label>";
    echo "<select name='product_index'>";
    foreach ($products as $index => $product) {
        echo "<option value='" . $index . "'>" . $product['name'] . " - $" . $product['price'] . "</option>";
    }
    echo "</select><br>";
    echo "<label for='quantity'>Quantity:</label>";
    echo "<input type='number' name='quantity'><br>";
    echo "<label for='quality'>Quality:</label>";
    echo "<select name='quality'>";
    foreach ($qualityOptions as $option) {
        echo "<option value='" . $option . "'>" . $option . "</option>";
    }
    echo "</select><br>";
    echo "<input type='submit' name='add_to_cart' value='Add to Cart'>";
    echo "</form>";
    ?>
     <div class="container">
  <footer class="py-5">
    <div class="row">
      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-6 col-md-2 mb-3">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-md-5 offset-md-1 mb-3">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>© 2022 Company, Inc. All rights reserved.</p>
      <a href="logout.php">Logout</a>
      
    </div>
  </footer>
  

</body>
</html>

<?php
} else {
    header("Location: login.php");
    exit();
}
?>
