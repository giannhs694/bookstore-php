<?php
//PROVOLI PROIONTOS(info)
//Epilogi proiontos kai posotitas
//Category name
$catname = $_GET['catname'];
echo "<h1>" . $catname . "</h1>";
//Product's id number
$prodid = $_GET['prod'];
//Product's Title
$title = $_GET['title'];
//Products price
$price = $_GET['price'];
$sqlProductInfo = "Select * from product where ID=" . $prodid;
$result = $conn->query($sqlProductInfo);
if ($result->num_rows <= 0) {
    echo "Product unregistered or something went wrong";
} else {
    $row = $result->fetch_assoc();

   //APOSTOLI PROINTOS STO CART GIA AGORA me ta stoixeia tou
    echo '<form action="index.php?p=cart" method="Post">       
   <input type="hidden" name="prodid" value='.$prodid.' />
   <input type="hidden" name="catname" value='.$catname.' />
   <input type="hidden" name="title" value='.$title.' />
   <input type="hidden" name="price" value='.$price.' />
   <input type="hidden" name="p" value="cart"/>
       Title: '. $row['Title'] .'<br/>
       Price: '.$row['Price']. '<br/>
       Quantity:<input type="number" name="quantity" min="1" value="1"/>
    <input type="submit" value="Add to cart"/>
    </form>';
}
?>
