<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>RTX Webshop</title>
        <link rel = "stylesheet" href = "style.css">
        <meta charset="utf-8"/>
    </head>
    <body>
        <section class="sec">
            <header>
                <a href = "index.html"><img src = "logo.png" class = "logo"></a>
                <h2 class = "productName">Shopping Cart</h2>
            </header>

            <div class = "content">
                <div class = "textBox">
                    <h2>The content of <br><b style="font-size: larger;">your</b> shopping cart</h2>
                    
                    <a href="shipping.php"">Proceed to shipping!</a>
                </div>
                <div class = "cartDetails">
                    <?php
                        $conn=mysqli_connect("localhost", "root", "", "paypal_test");

                        if($conn){
                            
                        } else {
                            die("Connection Failed. Reason: " .mysqli_connect_error());
                        }

                        $sql = "SELECT id, name, image, price FROM tbl_products";
                        $results = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($results) > 0){
                            while($row = mysqli_fetch_array($results)){
                               echo $row[1] . "<br>";
                               echo "<img src = '" . $row[2] . "' class = 'cartProdImg' >". "<br>" . "<p> Price: $ </p>" . $row[3] ;
                            }
                        }
                        mysqli_close($conn);
                    ?>
                </div> 
            </div>         
        </section>          
    </body>    
</html>