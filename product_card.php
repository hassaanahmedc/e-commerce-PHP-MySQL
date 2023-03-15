<div class="product">
    <div class='primage_container'>
        <img src="imgs/<?php echo $image ?>" alt="" class="product_image">
    </div>
    <div class="product_details">
        <p class="product_name"><?php echo $name ?></p>
        <div class='stars'>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
        </div>
        <p class="product_price">Rs. <?php echo $prize ?></p>
        <div class="buy_section">
            <form method='POST' action='cart_status.php'>
                <input type='hidden' name='product_id' value='<?php echo $pid?>'>
                <span class='quantity_text'>Quantity</span>
                <input type="number" class='quantity' name='quantity' value='1' min='1'>
                <input type="submit" value="Add to Cart">
            </form>
            <div class='btns'>
                <button>
                    <a class='item_btn'>Buy Now</a>
                </button>
            </div>
        </div>
    </div>
</div><br>