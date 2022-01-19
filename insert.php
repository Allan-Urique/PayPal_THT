<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $street = $_POST['street'];

    if(!empty ($fname) || !empty ($lname) || !empty ($email) || !empty ($phone) || !empty ($country) || !empty ($state) || !empty ($zip) || !empty ($street)){
        $conn=mysqli_connect("localhost", "root", "", "paypal_test");

        if($conn){
            //This was going to be used to pass back the info to PayPal as requested, but couldn't find out how to do it in a reasonable time frame
            $SELECT = "SELECT email FROM buyer WHERE email = '$email'";
            $INSERT = "INSERT INTO buyer (name, lastName, email, phone, country, state, zip, street) values ('$fname', '$lname', '$email', '$phone', '$country', '$state', '$zip', '$street')";

            $results = mysqli_query($conn, $INSERT);

            $sql = "SELECT id, name, image, price FROM tbl_products";
            $product = mysqli_query($conn, $sql);

            $totalAmount = 0;

            if(mysqli_num_rows($product) > 0){
                while($row = mysqli_fetch_array($product)){
                    $totalAmount = $row[3]; 
                }
            }

            if ($conn->query($INSERT) === TRUE) {
                //success
              } else {
                echo "Error: " . $INSERT . "<br>" . $conn->error;
            }
            mysqli_close($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>RTX Webshop</title>
        <link rel = "stylesheet" href = "style.css">
        <meta charset="utf-8"/>
        <script src="https://www.paypal.com/sdk/js?client-id=AQiOEvfsP9v3iuc5X0AM1Ps8DByDm7oheGEd9VU7Ts9OOBpOwWp3OjR4QtPDUKzh1FJoQ9fQoICPHwSH"></script>
    </head>
    <body>
        <section class="sec">
            <header>
                <a href = "index.html"><img src = "logo.png" class = "logo"></a>
                <h2 class = "productName">Details</h2>
            </header>

            <div class = "content">
                <div class = "textBox">
                    <h2>Your <br><b style="font-size: larger;">purchase</b> details</h2>
                    
                    <div class = paypal id = "paypal">
                        <br>
                        <p class = "sanboxAccount">
                            Email for Sandbox Account-> sb-zw7iw12054016@personal.example.com<br>
                            pw for Sandbox Account -> 9on3<.Do
                        </p>
                        <br>
                        <script>
                            totalAmount = <?php echo json_encode($totalAmount); ?>;
                            paypal.Buttons({
                                createOrder: function(data, actions) {
                                    // This function sets up the details of the transaction, including the amount and line item details.
                                    return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                        value: totalAmount,
                                        }
                                    }]
                                    });
                                },
                                onApprove: function(data, actions) {
                                    // This function captures the funds from the transaction.
                                    return actions.order.capture().then(function(details) {
                                    // This function shows a transaction success message to your buyer.
                                        window.location.replace("success.html");
                                    });
                                }
                            }).render('#paypal');
                            //This function displays payment buttons on your web page.
                        </script>
                    </div>
                    
                </div>    
                <div class = "cartDetails">
                    <?php
                        $conn=mysqli_connect("localhost", "root", "", "paypal_test");

                        if($conn){
                            
                        } else {
                            die("Connection Failed. Reason: " .mysqli_connect_error());
                        }

                        $sql1 = "SELECT id, name, image, price FROM tbl_products";
                        $sql2 = "SELECT name, lastName, email, phone, country, state, zip, street FROM buyer";

                        $results = mysqli_query($conn, $sql1);
                        
                        $results2 = mysqli_query($conn, $sql2);
                        
                        // <br> isn't working for some reason... 
                        if(mysqli_num_rows($results) > 0){
                            while($row = mysqli_fetch_array($results)){
                               echo $row[1] . " "."<br>";
                               echo  "<br>" . "<p> Price: $ </p>" . $row[3] ;
                            }
                        }
                        mysqli_close($conn);
                    ?>
                </div>             
            </div>         
        </section>          
    </body>    
</html>