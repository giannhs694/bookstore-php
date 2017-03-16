<html>
    <?php
    session_start(); 
    $GLOBALS['p'] = "home";
    require_once 'dbConnect.php';
     

    ?>
    <head >
        <title>My Bookstore</title>
        <link rel="stylesheet" href="Style/main.css" type="text/css" >
    </head>

    <body>

        <div  id="menuTop" >
           
            <a id="home" class="menuEntryTop" href="?p=home">Homepage</a>
            <a id="shopinfo" class="menuEntryTop" href="?p=shopinfo">Shop info</a>
            <a id="products" class="menuEntryTop" href="?p=categories">Products</a>
            <a id="cart" class="menuEntryTop" href="?p=cart">Cart</a>
            <a id="login" class="menuEntryTop" href="?p=login">Login</a>
            <a id="contact" class="menuEntryTop" href="?p=contact">Contact</a>
        </div>
        <br>

        <nav id="leftMenu" >
            <?php 
            $date = date("Y-d-m");
            echo $date . " </br>";
         // print_r($conn);
          echo "</br>"; 
            print_r($_REQUEST);    
            ?>
            <h1>Left Menu</h1><br/>
            <?php
            if (isset($_SESSION['username']) & $_SESSION['username'] == 'admin') {
                include 'leftAdminMenu.php';
            } elseif (isset($_SESSION['username'])) {
                include 'leftClientMenu.php';
            }
            ?>
        </nav>

        <div id="container">
            <h1>Container</h1><br>
            <?php
            if (isset($_REQUEST['p'])) {
                $p = $_REQUEST['p'];
            }


            switch ($p) {
                case "home":;
                    break;
                case "shopinfo": require "contents/shopinfo.php";
                    echo "debug";
                    break;
                case "categories": require "contents/categories.php";
                    break;
                case "products" : require "contents/products.php";
                    break;
                case "productInfo": require "contents/productInfo.php";
                    break;
                case "cart": require "contents/cart.php";
                    break;
                case "cartToBase": require "contents/cartToBase.php";
                    break;
                case "login": {
                        if (isset($_SESSION['username'])) {
                            echo 'You are already logged in as : ' . $_SESSION['username'];
                        } else {
                            require "contents/login.php";
                        }
                    }
                    break;
                case "contact": require "contents/contact.php";
                    break;
                case "logout": require "logout.php";

                    break;
                case "do_login":

                    include 'do_login.php';
              
                    header("location: ". "index".".php");
                    break;
                default : echo "what are you looking for brah";
                    break;
            }
            ?>
        </div>


       




    </body>
</html>