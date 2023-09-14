<?php
    $koneksi = new mysqli('localhost', 'root', '', 'penjualan');
?>

<div id="page-inner">
    <h1>Product List</h1>
    <div class="wrapper-list">
        <form action="pages/products/checkout.php" role="form" method="post">
            <?php
                $products = $koneksi->query("SELECT * FROM products");
                foreach ($products as $key => $product) {
            ?>
                <div class="item">
                    <div class="img-product"></div>
                    <div>
                        <h1>
                            <?php echo($product['name']); ?>
                        </h1>
                        <?php
                            if($product['diskon'] > 0){
                        ?>
                            <span class="diskon"><?php echo($product['price']); ?></span>                    
                            <span class="price-real">
                                <?php
                                    $diskon =  $product['price'] * $product['diskon'] / 100;
                                    $price = $product['price'] - $diskon;
                                    echo($price); 
                                ?>
                            </span>                    
                        <?php
                            }else{
                                $price = $product['price'];
                        ?>
                                <span class="price-real"><?php echo($price); ?></span>
                        <?php
                            }
                        ?>
                        <div class="input-to-confirm">
                            <div>
                                <input type="number" name="qty[]" min="1" value="1">
                                <span>PCS</span>
                            </div>
                            <div>
                                Subtotal: <span class="sub-total">Rp. <?php echo($price); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-buy">
                        <input type="checkbox" name="product[]" value="<?php echo($product['id']); ?>">
                        <button class="btn-buy">BUY</button>
                    </div>
                </div>
            <?php
                }
            ?>
            <div class="total-price">
                <div>
                    TOTAL:   Rp. <span></span>
                </div>
            </div>
            <div class="btn-checkout">
                <button type="button" id="checkout" data-type="checkout">Checkout</button>
            </div>
        </form>
    </div>
</div>