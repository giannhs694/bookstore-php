
<?php

/*
  php script opou pragmatoipoieitai to login enos xrhsth sth bash
  sthn opoia egine syndesh sto dbconnect.php
  kai thetontai oi session metablites username kai password
 */

$user = $_POST['username'];
$password = $_POST['password'];
//einai kalo na travaw olous tous users kai meta na briskw auton pou thelei na kanei login kai na tautopoiw episis H
// na briskw mono ton user pou thelei na kanei login kai meta apla na tsekarw password????
$sql = "SELECT uname,passwd,ID FROM customer WHERE uname = '" . $user . "' AND passwd = '" . $password . "'";

$result = $conn->query($sql);

if ($result->num_rows <= 0) {//0 apotelesmata shmainei oti o xrhsths ebale lathos user h pass
    echo "User or password is incorrect";
    echo $_POST['username'];
    exit();
} else {
    $row = $result->fetch_assoc();
    //thetw ta session variables tou xrhsth(user,pass)
    $_SESSION['username'] = $row["uname"];
    $_SESSION['userId'] = $row["ID"];
    //$_SESSION['password'] = $row["passwd"];
}
?>