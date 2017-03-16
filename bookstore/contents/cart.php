<h1>This is your cart.</h1>

<form method="POST" >
    <input type="hidden" name="clearCart" value="yes">
    <input type="submit" value="Clear Cart">
</form>
<?php 
//empty cart
if(isset($_POST['clearCart']))
{

    unset($_POST['clearCart']);
    $_SESSION['cart']=array();     
    
}
//add product to cart
if( isset($_SESSION['cart']) && isset($_POST['prodid'])){
    
    $array = array("prodid"    => $_POST['prodid'] ,
                   "quantity"  => $_POST['quantity'],
                   "title"     => $_POST['title'],
                   "price"     => $_POST['price']
                     );
     $bool=true;
     //elegxo an yparxei idi sto kalathi to proion
    for($i=0;$i<=sizeof($_SESSION['cart']) ; $i++){
 
       if($_SESSION['cart'][$i]["prodid"]==$array["prodid"]){
          //an yparxei allazw tin posotita
       $_SESSION['cart'][$i]["quantity"]=$array["quantity"];
       $bool=false;
       break;
      }
    }
    if($bool){
        //alliws prosthetw to proion sto kalathi
        array_push($_SESSION['cart'],$array);
    }
     //array_push($_SESSION['cart'],$array);
  
}elseif ( !isset($_SESSION['cart'])){  
   $_SESSION['cart']=array();
}
        //for test purpose printing table
//print_r(array_values($_SESSION['cart']));

echo '<table style=" border: 1px solid black;">
    <caption>My Items</caption>
    <tr style=" border: 1px solid black;">
        <th style=" border: 1px solid black;">Product id</th>
        <th style=" border: 1px solid black;">Title</th>
        <th style=" border: 1px solid black;">Price</th>
        <th style=" border: 1px solid black;">Quantity</th>        
        <th style=" border: 1px solid black;">Summary</th>
    </tr>';

    for($row = 0 ; $row < count($_SESSION['cart']);$row++){
    echo '<tr style=" border: 1px solid black;">
        <td style=" border: 1px solid black;">'.$_SESSION['cart'][$row]["prodid"].'</td>
        <td style=" border: 1px solid black;">'.$_SESSION['cart'][$row]["title"].'</td>
        <td style=" border: 1px solid black;">'.$_SESSION['cart'][$row]["price"].'&euro;</td>
        <td style=" border: 1px solid black;">'.$_SESSION['cart'][$row]['quantity'].'</td>
        <td style=" border: 1px solid black;">'.$_SESSION['cart'][$row]['quantity']*$_SESSION['cart'][$row]["price"].'&euro;</td>
        
    </tr>';
    
    }

echo '</table>';
//echo $_SESSION['cart']['id'].'<br/>';
//echo $_SESSION['cart']['quantity'].'<br/>';
 


?>
<!--
ADDS CART ITEMS TO OUR DATABASE ( BUY )
-->
<br/>   
<form method="POST" action="index.php?p=cartToBase">
   
    <input type="submit" value="Checkout">
</form>