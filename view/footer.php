<div class="container">
    <footer class="py-5">
        <div class="row">
            <div class="col-3">
                <a href="index.php" class="links">
                    <h5 class="text-primary">COURSE ONLINE</h5>
                </a>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">Bring Course To You!</li>
                </ul>
            </div>

            <div class="col-2">
                <h5 class="text-primary">Menu</h5>
                <ul class="nav flex-column">
                    <?php foreach ($menu_list as $menu) : ?>
                        <li class="nav-item mb-2"><a href="<?php echo $menu['URLMenu']; ?>" class="nav-link p-0 text-muted"><?php echo $menu['TenMenu']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-2">
                <h5 class="text-primary">Liên kết khác</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="https://www.w3schools.com/" class="nav-link p-0 text-muted">W3Schools</a></li>
                    <li class="nav-item mb-2"><a href="https://openplanning.net/" class="nav-link p-0 text-muted">Openplanning</a></li>
                    <li class="nav-item mb-2"><a href="https://www.coursera.org/" class="nav-link p-0 text-muted">Coursera</a></li>
                    <li class="nav-item mb-2"><a href="https://fullstack.edu.vn/" class="nav-link p-0 text-muted">F8 - Học Lập Trình</a></li>
                    <li class="nav-item mb-2"><a href="https://cuocthilaptrinh.com/" class="nav-link p-0 text-muted">Cuộc thi lập trình VKU</a></li>
                </ul>
            </div>

            <div class="col-4 offset-1">
                <form>
                    <h5>Đăng ký nhận thông báo tại đây</h5>
                    <p>Thông báo hàng tháng về những điều mới lạ và thú vị mà bạn không thể bỏ lỡ từ chúng tôi.</p>
                    <div class="d-flex w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Type your email address here...">
                        <button class="btn btn-primary" type="button">Theo dõi</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex justify-content-between py-4 my-4 border-top">
            <p>&copy; <?php echo date("Y"); ?> Course Online, Inc. All rights reserved.</p>
        </div>
    </footer>
</div>