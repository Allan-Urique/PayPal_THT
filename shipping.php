<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>RTX Webshop</title>
        <link rel = "stylesheet" href = "style.css">
    </head>
    <body>
        <section class="sec">
            <header>
                <a href = "index.html"><img src = "logo.png" class = "logo"></a>
                <h2 class = "productName" >Shipping Details</h2>
            </header>
            <div class = "content">
                <div class = "textBox">
                    <h2>Enter <br><b style="font-size: larger;">your</b> information</h2>
                </div>

                <div class = "forms">
                    <form action="insert.php" method="POST">
                        <label for="fname">First name:</label><br>
                        <input type="text" id="fname" name="fname" value="John" required><br>
                        <label for="lname">Last name:</label><br>
                        <input type="text" id="lname" name="lname" value="Doe" required><br>
                        <label for="email">Email:</label><br>
                        <input type="text" id="email" name="email" value="sb-18wsh11935689@personal.example.com" required><br>
                        <label for="phone">Phone:</label><br>
                        <input type="text" id="phone" name="phone" value="+5511948845684" required><br>
                        <label for="country">Country:</label><br>
                        <input type="text" id="country" name="country" value="United States" required><br>
                        <label for="state">State:</label><br>
                        <input type="text" id="state" name="state" value="Ohio" required><br>
                        <label for="zip">Zip:</label><br>
                        <input type="text" id="zip" name="zip" value="44308" required><br>
                        <label for="street">Street:</label><br>
                        <input type="text" id="street" name="street" value="405 Horner Street" required><br>
                        <input type="submit" value="Submit Information">
                    </form>
                </div>
            </div>
        </section>            
    </body>    
</html>