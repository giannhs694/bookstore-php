<?php

if (!isset($_SESSION['username'])) {
    echo "<br/>You must log in to checkout<br/>";
    include "contents/login.php";
} else {
    //add cart items in the db(orders)
    //eisagwgh stoixen sto orders, to date me synartisi tis MySql now()
    $sql = "INSERT INTO orders ( Customer , oDate )"
            . " Values          (" . $_SESSION['userId'] . ", " .
            'now()' . " );";
//$date=strtotime(date("Y-m-d"));
//echo $date;
    $sql2 = "Select ID from orders where Customer=" . $_SESSION['userId']. " ORDER BY ID DESC LIMIT 1";
    //
    //eisagei tis paraggelies mia mia toy pelati
    //prepei na kanw ena akomh sql3 gia na parei to teleutaio order number

    if ($conn->query($sql) == TRUE) {//insert order into orders
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {//get orderID from orders to use in orderdetails
            $row = $result->fetch_assoc();
           // echo "REC2";
            
            for($i=0;$i<=sizeof($_SESSION['cart']) ; $i++){//insert each cart item into orderdetails
                                                            //using the orderID 
               $sql3 = "INSERT INTO orderdetails (Orders, Quantity, Product )"
              . "VALUES ( "
              . $row['ID'].','
              . $_SESSION['cart'][$i]["quantity"].','
              . $_SESSION['cart'][$i]["prodid"].' )';
               if($conn->query($sql3) === TRUE) {
                  // echo "boom";
        
}else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
}
               
    }
    
        } else {
         //   echo "Error: " . $sql . "<br>" . $conn->error;
        }
       // echo "New record created successfully11";
    } else {
       // echo "Error: " . $sql . "<br>" . $conn->error;
    }




    //eisagwgh sthn order details episis
}
?>