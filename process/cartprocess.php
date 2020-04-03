<?php

//action.php

session_start();

if(isset($_POST["action"]))
{
 if($_POST["action"] == "add")
 {
  if(isset($_SESSION["shopping_cart"]))
  {
   $is_available = 0;
   foreach($_SESSION["shopping_cart"] as $keys => $values)
   {
    if($_SESSION["shopping_cart"][$keys]['itemid'] == $_POST["itemid"])
    {
     $is_available++;
     $_SESSION["shopping_cart"][$keys]['itemqty'] = $_SESSION["shopping_cart"][$keys]['itemqty'] + $_POST["product_quantity"];
    }
   }
   if($is_available == 0)
   {
    $item_array = array(
     'product_id'               =>     $_POST["itemid"],  
     'product_name'             =>     $_POST["itemname"],  
     'product_price'            =>     $_POST["itemprice"],  
     'product_quantity'         =>     $_POST["itemqty"]
    );
    $_SESSION["shopping_cart"][] = $item_array;
   }
  }
  else
  {
   $item_array = array(
    'product_id'               =>     $_POST["product_id"],  
    'product_name'             =>     $_POST["product_name"],  
    'product_price'            =>     $_POST["product_price"],  
    'product_quantity'         =>     $_POST["product_quantity"]
   );
   $_SESSION["shopping_cart"][] = $item_array;
  }
 }
}

?>