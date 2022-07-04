<?php 
session_start();
//database connection
/*$connect = mysqli_connect("localhost", "root", "", "webdevtrick");*/
require_once'db_connect.php';
//get form data/submit/add to cart
if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION['shopping_cart'])){
        $array_item_id = array_column($_SESSION['shopping_cart'],'item_id');
        if(!in_array($_GET['id'],$array_item_id)){
           $count = count($_SESSION['shopping_cart']);
            $item_array = array(
            'item_id'=>$_GET['id'],
                'item_name'=>$_POST['hidden_name'],
                'item_price'=>$_POST['hidden_price'],
                'item_quantity'=>$_POST['quantity']
            );
           $_SESSION['shopping_cart'][$count] = $item_array;
        }
        else{
            echo '<script>alert("Item Already Added")</script>';
        }
    }
    else{
      $item_array = array(
      'item_id'=>$_GET['id'],
          'item_name'=>$_POST['hidden_name'],
          'item_price'=>$_POST['hidden_price'],
         'item_quantity'=>$_POST['quantity']
      ); 
        $_SESSION['shopping_cart'][0] = $item_array;
    }
}
?>
<!DOCTYPE html>
<html>
 <head>
 <?php require_once'header.php'?>
 <title>Shopping Cart In PHP and MySql | Webdevtrick.com</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
 <br />
 <div class="container">
 <br />
 <br />
 <br />
 <h3 align="center">Shoping Cart With PHP And MySql | Source Code By</h3><br />
 <br /><br />
 
 <div style="clear:both"></div>
 <br />
 <h3>Order Details</h3>
 <div class="table-responsive">
 <table class="table table-bordered">
 <tr>
 <th width="40%">Item Name</th>
 <th width="10%">Quantity</th>
 <th width="20%">Price</th>
 <th width="15%">Total</th>
 <th width="5%">Action</th>
 </tr>
 <?php
    if(!empty($_SESSION['shopping_cart'])){
        foreach($_SESSION['shopping_cart'] as $keys=>$values){
 ?>
 <tr>
    <td><?php echo $values['item_name'];?></td>
    <td><?php echo $values['item_quantity'];?></td> 
    <td><?php echo $values['item_price'];?></td> 
    <td><?php echo $values['item_quantity']*$values['item_price'];?></td>
    <td><a href="remove.php?action=delete&id=<?php echo $values['item_id'];?>">Remove</a></td> 
 </tr>
 <?php
    }
    }
 ?>
 </table>
 <a href="index.php">continue shoop</a>
 </div>
 </div>
 <br/>
 <?php require_once'footer.php'?>
 </body>
</html>