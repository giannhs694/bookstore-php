<?php

$catid;
//EMFANISI KATIGORION
$sqlCategories = "Select * from category";
$result = $conn->query($sqlCategories);
if ($result->num_rows <= 0) {
    echo "oops";
    exit();
} else {
    echo "<h3>Categories</h3>";
    while ($row = $result->fetch_assoc()) {
        echo "<a href=?p=products&catid=" . $row["ID"] . "&catname=" .$row["Name"].">$row[Name]</a>" . "<br>";
        
    }
}   


