<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Shopping cart</title>

    <link rel="stylesheet" href="./style/cart.css" />
</head>

<body>
    <main>
        <header id="site-header">
            <div class="container">
                <h1>Shopping cart</h1>
            </div>
        </header>

        <div class="container">
            <section id="cart"></section>
        </div>

        <footer id="site-footer">
            <div class="container clearfix">
                <div class="left">
                    <h2 class="subtotal">Subtotal: <span>0</span>birr</h2>
                    <h3 class="tax">Taxes (5%): <span>0</span>birr</h3>
                    <h3 class="shipping">Shipping: <span>0.00</span>birr</h3>
                </div>

                <div class="right">
                    <h1 class="total">Total: <span>0</span>birr</h1>
                    <a class="btn">Checkout</a>
                </div>
            </div>
        </footer>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="./script/cart.js"></script>
</body>

</html>