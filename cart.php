<?php
    session_start();
    require('model/connect_db.php');
    require("model/menu_db.php");
    $menu_list = get_menu();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng | COURSE ONLINE - Bring Course To You!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/73d99ea241.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("view/header.php"); ?>
    <main>
        <section class="mb-3">
            <div class="container py-5">
                <h2>Giỏ hàng</h2>
                <?php if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])) { ?>

                <div class="shopping-cart">

                    <div class="column-labels">
                        <label class="product-image">Hình ảnh</label>
                        <label class="product-details">Sản phẩm</label>
                        <label class="product-price">Đơn giá</label>
                        <label class="product-quantity">Số lượng</label>
                        <label class="product-removal">Xóa</label>
                        <label class="product-line-price">Thành tiền</label>
                    </div>

                    <?php
                        $total = 0;
                        $discount = 0;
                        foreach ($_SESSION['cart_item'] as $key_car => $val_cart_item) : ?>

                    <div class="product">
                        <div class="product-image">
                            <img src="<?php echo $val_cart_item['HinhAnhKH']; ?>">
                        </div>
                        <div class="product-details">
                            <div class="product-title"><?php echo $val_cart_item['TenKH']; ?></div>
                            <!-- <p class="product-description"> It has a lightweight, breathable mesh upper with forefoot cables for a locked-down fit.</p> -->
                        </div>
                        <div class="product-price"><?php echo number_format($val_cart_item['GiaHienTaiKH'], 0, ",", ".") . "<ins>đ</ins>"; ?></div>
                        <div class="product-quantity">
                            <input type="number" value="1" max="1" min="1">
                        </div>
                        <div class="product-removal">
                            <form action="cart_process.php" method="post">
                                <input type="hidden" name="course_id" value="<?php echo $val_cart_item['IDKH']; ?>">
                                <input type="hidden" name="action" value="delete">
                                <button class="remove-product">
                                    Xóa khỏi giỏ hàng
                                </button>
                            </form>
                        </div>
                        <div class="product-line-price">
                            <?php
                                $total_item =  ($val_cart_item['GiaHienTaiKH'] * 1);
                                echo number_format($total_item, 0, ",", ".") . "<ins>đ</ins>"; ?>
                        </div>
                    </div>

                    <?php
                        $total += $total_item;
                        $discount += $val_cart_item['GiaGocKH'] - $val_cart_item['GiaHienTaiKH'];
                        endforeach; ?>

                    <?php
                        $vat = $total * .05;
                        $grand_total = $total + $vat; ?>

                    <div class="totals">
                        <div class="totals-item">
                            <label>Tổng tiền</label>
                            <div class="totals-value" id="cart-subtotal"><?php echo number_format($total, 0, ",", ".") . "<ins>đ</ins>"; ?></div>
                        </div>
                        <div class="totals-item">
                            <label>Thuế VAT (5%)</label>
                            <div class="totals-value" id="cart-tax"><?php echo number_format($vat, 0, ",", ".") . "<ins>đ</ins>"; ?></div>
                        </div>
                        <div class="totals-item">
                            <label>Tổng giảm giá</label>
                            <div class="totals-value" id="cart-shipping"><?php echo number_format($discount, 0, ",", ".") . "<ins>đ</ins>"; ?></div>
                        </div>
                        <div class="totals-item totals-item-total">
                            <label>Tổng thanh toán</label>
                            <div class="totals-value" id="cart-total"><?php echo number_format($grand_total, 0, ",", ".") . "<ins>đ</ins>"; ?></div>
                        </div>
                    </div>

                    <button class="checkout">Tiếp tục thanh toán</button>
                    <?php } else { ?>
                        <p class="product-description">
                            Chưa có khóa học nào trong giỏ hàng<br>
                            Cùng khám phá các khóa học tại Course Online nhé!
                        </p>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php include("view/footer.php"); ?>
    </main>

    <script>
        const toggleBtn = document.querySelector('.toggle_btn');
        const toggleBtnIcon = document.querySelector('.toggle_btn i');
        const dropDownMenu = document.querySelector('.dropdown_menu');

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
            const isOpen = dropDownMenu.classList.contains('open');
            toggleBtnIcon.classList = isOpen ?
                'fa-solid fa-xmark' :
                'fa-solid fa-bars'
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>