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
            <section id="cart">
                <article class="product">
                    <header>
                        <a class="remove">
                            <img src="./assets/newBook.jpg" />

                            <h3>Remove</h3>
                        </a>
                    </header>

                    <div class="content">
                        <h1>Mouse</h1>

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta,
                        numquam quis perspiciatis ea ad omnis provident laborum dolore in
                        atque.
                    </div>

                    <footer class="content">
                        <span class="qt-minus">-</span>
                        <span class="qt">2</span>
                        <span class="qt-plus">+</span>

                        <h2 class="full-price">29.98birr</h2>

                        <h2 class="price">14.99birr</h2>
                    </footer>
                </article>

                <article class="product">
                    <header>
                        <a class="remove">
                            <img src="./assets/newBook.jpg" />

                            <h3>Remove</h3>
                        </a>
                    </header>

                    <div class="content">
                        <h1>Keyboard</h1>

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta,
                        numquam quis perspiciatis ea ad omnis provident laborum dolore in
                        atque.
                    </div>

                    <footer class="content">
                        <span class="qt-minus">-</span>
                        <span class="qt">1</span>
                        <span class="qt-plus">+</span>

                        <h2 class="full-price">79.99birr</h2>

                        <h2 class="price">79.99birr</h2>
                    </footer>
                </article>

                <article class="product">
                    <header>
                        <a class="remove">
                            <img src="./assets/newBook.jpg" />

                            <h3>Remove</h3>
                        </a>
                    </header>

                    <div class="content">
                        <h1>Handfree</h1>

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta,
                        numquam quis perspiciatis ea ad omnis provident laborum dolore in
                        atque.
                    </div>

                    <footer class="content">
                        <span class="qt-minus">-</span>
                        <span class="qt">3</span>
                        <span class="qt-plus">+</span>

                        <h2 class="full-price">53.99birr</h2>

                        <h2 class="price">17.99birr</h2>
                    </footer>
                </article>

                <article class="product">
                    <header>
                        <a class="remove">
                            <img src="./assets/newBook.jpg" />

                            <h3>Remove</h3>
                        </a>
                    </header>

                    <div class="content">
                        <h1>Mouse</h1>

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta,
                        numquam quis perspiciatis ea ad omnis provident laborum dolore in
                        atque.
                    </div>

                    <footer class="content">
                        <span class="qt-minus">-</span>
                        <span class="qt">2</span>
                        <span class="qt-plus">+</span>

                        <h2 class="full-price">29.98birr</h2>

                        <h2 class="price">14.99birr</h2>
                    </footer>
                </article>

            </section>
        </div>

        <footer id="site-footer">
            <div class="container clearfix">
                <div class="left">
                    <h2 class="subtotal">Subtotal: <span>163.96</span>birr</h2>
                    <h3 class="tax">Taxes (5%): <span>8.2</span>birr</h3>
                    <h3 class="shipping">Shipping: <span>5.00</span>birr</h3>
                </div>

                <div class="right">
                    <h1 class="total">Total: <span>177.16</span>birr</h1>
                    <a class="btn">Checkout</a>
                </div>
            </div>
        </footer>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="./script/cart.js"></script>
</body>

</html>