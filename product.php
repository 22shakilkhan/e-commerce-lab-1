<?php
include'db_config.php';
// Check to make sure the id parameter is specified in the URL
if(isset($_GET['id'])){
     // Prepare statement and execute, prevents SQL injection
    $stmt = $con->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
     // Check if the product exists (array is not empty)
    if(!$product){
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
}
else{
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
            #product-page{
                background:#f2f2f2; /*#343353*/;
                color: #000;
            }
            .cart-btn{
                background: #eb5525;
                border: none;
                padding:4px;
                color: #fff;
                border-radius: 3px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
       <?=
    require_once'header.php';
    ?>
       <section id="product-page" class="py-5">
        <div class="container">
    <div class="row" style="margin-top:70px;">
        <div class="col-md-6">
            <img src="imgs/<?=$product['img']?>" alt="<?=$product['name']?>"   width="500" height="400">
            
        </div>
        <div class="col-md-6">
            <h1><?=$product['name']?></h1>
            <span class="price">
            &dollar;<?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">&dollar;<?=$product['rrp']?></span>
        </span>
        <div class="description">
            <?=$product['desc']?>
        </div>
        
        <form action="cart.php" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart" class="cart-btn">
        </form>
        
        </div>
    </div>
</div>
 </section>
  <?php
    require_once'footer.php';
        ?>
   <script src="js/script.js"></script>
    </body>
</html>