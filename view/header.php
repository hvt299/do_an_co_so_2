<header>
    <div class="navbar">
        <div class="logo"><a href="index.php" class="logo">COURSE ONLINE</a></div>
        <ul class="links">
            <?php foreach ($menu_list as $menu) : ?>
                <li><a href="<?php echo $menu['URLMenu']; ?>" class="menu_link"><?php echo $menu['TenMenu']; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <ul class="links">
            <?php if (isset($_COOKIE['username'])) : ?>
                <li><a href="cart.php" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
                <li><a href="profile.php" class="links"><?php echo $_COOKIE['username']; ?></a></li>
                <li><a href="logout.php" class="action_btn">Đăng xuất</a></li>
            <?php else : ?>
                <li><a href="cart.php" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
                <li><a href="login.php" class="action_btn">Đăng nhập</a></li>
            <?php endif; ?>
        </ul>
        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>

    <div class="dropdown_menu">
        <?php foreach ($menu_list as $menu) : ?>
            <li><a href="<?php echo $menu['URLMenu']; ?>" class="menu_link"><?php echo $menu['TenMenu']; ?></a></li>
        <?php endforeach; ?>
        <?php if (isset($_COOKIE['username'])) : ?>
            <li><a href="cart.php" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
            <li><a href="profile.php" class="links"><?php echo $_COOKIE['username']; ?></a></li>
            <li><a href="logout.php" class="action_btn">Đăng xuất</a></li>
        <?php else : ?>
            <li><a href="cart.php" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
            <li><a href="login.php" class="action_btn">Đăng nhập</a></li>
        <?php endif; ?>
    </div>
</header>