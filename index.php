<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/73d99ea241.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="#">COURSE ONLINE</a></div>
            <ul class="links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <ul class="links">
                <li><a href="#" class="cart_btn"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
                <li><a href="login.php" class="action_btn">Login</a></li>
            </ul>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <div class="dropdown_menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#"><i class="fa-solid fa-cart-shopping" style="font-size: 24px; color: darkgray;"></i></a></li>
            <li><a href="login.php" class="action_btn">Login</a></li>
        </div>
    </header>

    <main>
        <section id="home">
            <h1>&lt;/&gt;Bring Course To You!&lt;/&gt;</h1>
            <p>
                We offer a wide range of comprehensive programming courses to equip you <br>
                with the knowledge and skills necessary to succeed in today's digital world.
            </p>
            <form class="form-inline" action="#">
                <input class="form-control mr-sm-2 mb-3" type="text" placeholder="Tìm khóa học bạn đang quan tâm" size="50px">
                <button class="btn btn-primary" type="submit" style="width: 100%">
                    <i class="fa-solid fa-magnifying-glass fa-beat-fade"></i>
                </button>
            </form>
        </section>
        <section>
            <div class="container py-5">
                <h1 class="text-center"><i class="fa-solid fa-layer-group" style="font-size: 36px;"></i> Our Courses</h1>
                <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
                    <div class="col">
                        <div class="card">
                            <img src="khoa-hoc-c-c++(1).png" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Khóa học lập trình C/C++ từ cơ bản đến nâng cao</h5>
                                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae, cumque!</p>
                            </div>
                            <div class="d-flex justify-content-around mb-5">
                                <h3 class="price">159,000đ</h3>
                                <button class="btn btn-primary">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="khoa-hoc-c-c++(1).png" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Khóa học lập trình Java</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, maxime?</p>
                            </div>
                            <div class="d-flex justify-content-around mb-5">
                                <h3 class="price">169,000đ</h3>
                                <button class="btn btn-primary">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="khoa-hoc-c-c++(1).png" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Khóa học lập trình Python căn bản</h5>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi, sint.</p>
                            </div>
                            <div class="d-flex justify-content-around mb-5">
                                <h3 class="price">250,000đ</h3>
                                <button class="btn btn-primary">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <footer class="py-5">
                <div class="row">
                <div class="col-2">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-2">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-2">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col-4 offset-1">
                    <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of whats new and exciting from us.</p>
                    <div class="d-flex w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                    </form>
                </div>
                </div>

                <div class="d-flex justify-content-between py-4 my-4 border-top">
                <p>&copy; <?php echo date("Y"); ?> Company, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                </ul>
                </div>
            </footer>
        </div>
    </main>

    <script>
        const toggleBtn = document.querySelector('.toggle_btn');
        const toggleBtnIcon = document.querySelector('.toggle_btn i');
        const dropDownMenu = document.querySelector('.dropdown_menu');

        toggleBtn.onclick = function () {
            dropDownMenu.classList.toggle('open');
            const isOpen = dropDownMenu.classList.contains('open');
            toggleBtnIcon.classList = isOpen
                ? 'fa-solid fa-xmark'
                : 'fa-solid fa-bars'
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>