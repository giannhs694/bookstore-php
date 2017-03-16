<?php

//Epilogh katigorias -> Emfanisi Proiontwn katigorias
$catid=$_GET['catid'];
$catname=$_GET['catname'];
if(isset($catid)){
    
    $sqlCategoryProduct="Select * from product where Category=".$catid;
    $result=$conn->query($sqlCategoryProduct);
    if($result->num_rows<=0){
        echo "No products in this category, or something went wrong?";
    }else{
        echo "<h1>".  $catname ."</h1>";
        while($row=$result->fetch_assoc()){
            echo "<a href=?p=productInfo&catid=". $catid .
                                       "&catname=" .$catname .
                                       "&prod=".$row['ID'].
                                       "&price=".$row['Price'].
                                       "&title=".$row['Title'].">".$row[Title]."</a><br/>";
        }
    }
}