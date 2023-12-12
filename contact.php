<?php
    session_start();
    require("model/connect_db.php");
    require("model/menu_db.php");
    require("model/course_db.php");
    $menu_list = get_menu();
    $course_list = get_course();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang liên hệ | COURSE ONLINE - Bring Course To You!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/73d99ea241.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>
    <?php include("view/header.php"); ?>
    <main>
        <section class="mb-3">
            <div class="container py-5">
                <div class="row">
                    <!-- Contact Form -->
                    <div class="col-md-6">
                        <h2 class="text-primary">Liên hệ với chúng tôi</h2>
                        <form action="mail_process.php" enctype="multipart/form-data" method="POST">
                            <div class="form-group mb-2">
                                <label for="name">Tên:</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group mb-2">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group mb-2">
                                <label for="title">Tiêu đề:</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group mb-2">
                                <label for="message">Nội dung:</label>
                                <textarea class="form-control" name="message"></textarea>
                                <script>
                                    CKEDITOR.replace('message');
                                </script>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Gửi ý kiến, phản hồi</button>
                        </form>
                    </div>

                    <!-- Map -->
                    <div class="col-md-6">
                        <h2 class="text-primary">Địa chỉ</h2>
                        <iframe
                            width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.733396391825!2d108.2497800751339!3d15.975293084690591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1700370222333!5m2!1svi!2s">
                        </iframe>
                    </div>
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