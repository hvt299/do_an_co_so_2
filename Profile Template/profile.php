<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your Page Title</title>
        <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="profile.css">
    </head>
    <body>
        <div class="container">
            <div class="main">
                <div class="topbar">
                    <a href="#">logout</a>
                    <a href="#">Support</a>
                    <a href="#">Work</a>
                    <a href="#">Home</a>
                </div>
                <div class="row1">
                    <div class="col-md-4 mt-1">
                        <div class="card text-center sidebar">
                            <div class="card-body">
                                <img src="admin/img/undraw_posting_photo.svg" class="rounded-circle" width="150" alt="Anh">
                                <div class="mt-3">
                                    <h3>Pham The Anh</h3>
                                    <a href="#">Home</a>
                                    <a href="#">Work</a>
                                    <a href="#">Support</a>
                                    <a href="#">Setting</a>
                                    <a href="#">Signout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mt-1">
                        <div class="card mb-3 content">
                            <h1 class="m-3 pt-3">About</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Full Name</h5>
                                    </div>
                                    <div class="col-md 9 text-secondary">
                                        Pham The Anh
                                    </div>  
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Email</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        Phamtheanh@gmail.com
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Phone</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        0947246094
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Addres</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        Khu pho 1 Dong Thanh, Dong Ha
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 content">
                            <h1 class="m-3">Recent Project</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Project Name</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        Project description
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
require("model/connect_db.php");
require("model/student_db.php");
require("login_process.php");
// Lấy thông tin học viên

$student_id = $_COOKIE['idhv'];
$student = get_student_by_id($student_id);

// Kiểm tra xem có thông tin học viên hay không
?>