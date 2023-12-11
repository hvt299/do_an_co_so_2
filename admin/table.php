<?php
    session_start();
    require("../model/connect_db.php");
    require("../model/identify_db.php");
    require("../model/student_db.php");
    require("../model/course_db.php");
    require("../model/rating_db.php");

    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL){
        $action = 'taikhoan';
    }

    $account_list = get_account();
    $student_list = get_student();
    $course_list = get_course();
    $rating_list = get_rating_2();

    if (!isset($_COOKIE['vaitro']) || $_COOKIE['vaitro'] != "Quản lý"){
        echo "<script>alert('Vui lòng đăng nhập với quyền quản lý để tiếp tục!');location.href='../login.php';</script>";
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $_COOKIE['username']; ?> - Tables</title>

    <!-- Custom fonts for this template -->
    <script src="https://kit.fontawesome.com/73d99ea241.js" crossorigin="anonymous"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CO Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Chức năng chính
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTables"
                    aria-expanded="true" aria-controls="collapseTables">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span>
                </a>
                <div id="collapseTables" class="collapse" aria-labelledby="headingTables" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Danh sách các bảng:</h6>
                        <form action="table.php" method="GET">
                            <a class="collapse-item" href="table.php?action=taikhoan">Tài khoản</a>
                            <a class="collapse-item" href="table.php?action=hocvien">Học viên</a>
                            <a class="collapse-item" href="table.php?action=khoahoc">Khóa học</a>
                            <a class="collapse-item" href="table.php?action=danhgia">Đánh giá</a>
                        </form>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="chart.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Chức năng phụ
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="table.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">01/12/2023</div>
                                        <span class="font-weight-bold">Chào tháng 12!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_COOKIE['username']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">
                        <?php
                            switch ($action){
                                case 'taikhoan':
                                    echo "Quản lý tài khoản";
                                    break;
                                case 'hocvien':
                                    echo "Quản lý học viên";
                                    break;
                                case 'khoahoc':
                                    echo "Quản lý khóa học";
                                    break;
                                case 'danhgia';
                                    echo "Quản lý đánh giá";
                                    break;
                            }
                        ?>
                    </h1>
                    <p class="mb-4">Trang quản lý các bảng</p>

                    <!-- Add_Modal -->
                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        <?php
                                            switch ($action){
                                                case 'taikhoan':
                                                    echo "Thêm tài khoản";
                                                    break;
                                                case 'hocvien':
                                                    echo "Thêm học viên";
                                                    break;
                                                case 'khoahoc':
                                                    echo "Thêm khóa học";
                                                    break;
                                                case 'danhgia';
                                                    echo "Thêm đánh giá";
                                                    break;
                                            }
                                        ?>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="add_process.php" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="action" value="<?php echo $action; ?>">
                                        <?php switch ($action):
                                                case "taikhoan": ?>
                                                <!-- Thêm tài khoản -->
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tên</label>
                                                <input type="text" name="username" class="form-control" placeholder="Nhập username" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Vai trò</label>
                                                <input type="text" name="vaitro" class="form-control" placeholder="Nhập vai trò">
                                            </div>
                                            <div class="form-group">
                                                <label>Mật khẩu ứng dụng</label>
                                                <input type="text" name="matkhauungdung" class="form-control" placeholder="Nhập mật khẩu ứng dụng">
                                            </div>
                                            <?php break; ?>

                                            <?php case "hocvien": ?>
                                                <!-- Thêm học viên -->
                                                <div class="form-group">
                                                    <label>IDHV</label>
                                                    <input type="text" name="idhv" class="form-control" placeholder="Nhập IDHV">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tên học viên</label>
                                                    <input type="text" name="username" class="form-control" placeholder="Nhập tên học viên" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Giới tính</label>
                                                    <input type="text" name="gioitinh" class="form-control" placeholder="Nhập giới tính">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ngày sinh</label>
                                                    <input type="text" name="ngaysinh" class="form-control" placeholder="Nhập ngày sinh">
                                                </div>
                                                <div class="form-group">
                                                    <label>Quê quán</label>
                                                    <input type="text" name="quequan" class="form-control" placeholder="Nhập quê quán">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Nhập email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>SĐT</label>
                                                    <input type="text" name="sdt" class="form-control" placeholder="Nhập số điện thoại">
                                                </div>
                                            <?php break; ?>

                                            <?php case "khoahoc": ?>
                                                <!-- Thêm khóa học -->
                                                <div class="form-group">
                                                    <label>IDKH</label>
                                                    <input type="text" name="idkh" class="form-control" placeholder="Nhập IDKH">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tên khóa học</label>
                                                    <input type="text" name="tenkhoahoc" class="form-control" placeholder="Nhập tên khóa học" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tác giả</label>
                                                    <input type="text" name="tacgia" class="form-control" placeholder="Nhập tác giả" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mô tả</label>
                                                    <input type="text" name="mota" class="form-control" placeholder="Nhập mô tả" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Giá gốc</label>
                                                    <input type="text" name="giagoc" class="form-control" placeholder="Nhập giá gốc" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Giá hiện tại</label>
                                                    <input type="text" name="giahientai" class="form-control" placeholder="Nhập giá hiện tại" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>URL</label>
                                                    <input type="text" name="url" class="form-control" placeholder="Nhập url" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Hình ảnh</label>
                                                    <input type="text" name="hinhanh" class="form-control" placeholder="Nhập đường dẫn hình ảnh" required>
                                                </div>
                                            <?php break; ?>

                                            <?php case "danhgia": ?>
                                                <!-- Thêm đánh giá -->
                                                <div class="form-group">
                                                    <label>IDDG</label>
                                                    <input type="text" name="iddg" class="form-control" placeholder="Nhập IDDG">
                                                </div>
                                                <div class="form-group">
                                                    <label>IDHV</label>
                                                    <input type="text" name="idhv" class="form-control" placeholder="Nhập IDHV" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>IDKH</label>
                                                    <input type="text" name="idkh" class="form-control" placeholder="Nhập IDKH" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nội dung</label>
                                                    <input type="text" name="noidung" class="form-control" placeholder="Nhập nội dung" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sao đánh giá</label>
                                                    <input type="text" name="saodanhgia" class="form-control" placeholder="Nhập sao đánh giá (1-5)" required>
                                                </div>
                                            <?php break; ?>
                                        <?php endswitch; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                        <button type="submit" name="add_btn" class="btn btn-primary">Lưu thay đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit_Modal -->
                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        <?php
                                            switch ($action){
                                                case 'taikhoan':
                                                    echo "Sửa tài khoản";
                                                    break;
                                                case 'hocvien':
                                                    echo "Sửa học viên";
                                                    break;
                                                case 'khoahoc':
                                                    echo "Sửa khóa học";
                                                    break;
                                                case 'danhgia';
                                                    echo "Sửa đánh giá";
                                                    break;
                                            }
                                        ?>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="edit_process.php" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="action" value="<?php echo $action; ?>">
                                        <input type="hidden" name="edit_id" id="edit_id">

                                        <?php switch ($action):
                                                case "taikhoan": ?>
                                                <!-- Sửa tài khoản -->
                                            <div class="form-group">
                                                <label>Tên</label>
                                                <input type="text" name="username" id="value_2" class="form-control" placeholder="Nhập username" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" id="value_3" class="form-control" placeholder="Nhập mật khẩu" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Vai trò</label>
                                                <input type="text" name="vaitro" id="value_4" class="form-control" placeholder="Nhập vai trò">
                                            </div>
                                            <div class="form-group">
                                                <label>Mật khẩu ứng dụng</label>
                                                <input type="text" name="matkhauungdung" id="value_5" class="form-control" placeholder="Nhập mật khẩu ứng dụng">
                                            </div>
                                            <?php break; ?>

                                            <?php case "hocvien": ?>
                                                <!-- Sửa học viên -->
                                                <div class="form-group">
                                                    <label>Tên học viên</label>
                                                    <input type="text" name="username" id="value_2" class="form-control" placeholder="Nhập tên học viên" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Giới tính</label>
                                                    <input type="text" name="gioitinh" id="value_3" class="form-control" placeholder="Nhập giới tính">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ngày sinh</label>
                                                    <input type="text" name="ngaysinh" id="value_4" class="form-control" placeholder="Nhập ngày sinh">
                                                </div>
                                                <div class="form-group">
                                                    <label>Quê quán</label>
                                                    <input type="text" name="quequan" id="value_5" class="form-control" placeholder="Nhập quê quán">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" id="value_6" class="form-control" placeholder="Nhập email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>SĐT</label>
                                                    <input type="text" name="sdt" id="value_7" class="form-control" placeholder="Nhập số điện thoại">
                                                </div>
                                            <?php break; ?>

                                            <?php case "khoahoc": ?>
                                                <!-- Sửa khóa học -->
                                                <div class="form-group">
                                                    <label>Tên khóa học</label>
                                                    <input type="text" name="tenkhoahoc" id="value_2" class="form-control" placeholder="Nhập tên khóa học" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tác giả</label>
                                                    <input type="text" name="tacgia" id="value_3" class="form-control" placeholder="Nhập tác giả" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mô tả</label>
                                                    <input type="text" name="mota" id="value_4" class="form-control" placeholder="Nhập mô tả" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Giá gốc</label>
                                                    <input type="text" name="giagoc" id="value_5" class="form-control" placeholder="Nhập giá gốc" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Giá hiện tại</label>
                                                    <input type="text" name="giahientai" id="value_6" class="form-control" placeholder="Nhập giá hiện tại" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>URL</label>
                                                    <input type="text" name="url" id="value_7" class="form-control" placeholder="Nhập url" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Hình ảnh</label>
                                                    <input type="text" name="hinhanh" id="value_8" class="form-control" placeholder="Nhập đường dẫn hình ảnh" required>
                                                </div>
                                            <?php break; ?>

                                            <?php case "danhgia": ?>
                                                <!-- Sửa đánh giá -->
                                                <div class="form-group">
                                                    <label>IDHV</label>
                                                    <input type="text" name="idhv" id="value_2" class="form-control" placeholder="Nhập IDHV" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>IDKH</label>
                                                    <input type="text" name="idkh" id="value_3" class="form-control" placeholder="Nhập IDKH" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nội dung</label>
                                                    <input type="text" name="noidung" id="value_4" class="form-control" placeholder="Nhập nội dung" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sao đánh giá</label>
                                                    <input type="text" name="saodanhgia" id="value_5" class="form-control" placeholder="Nhập sao đánh giá (1-5)" required>
                                                </div>
                                            <?php break; ?>
                                        <?php endswitch; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                        <button type="submit" name="edit_btn" class="btn btn-primary">Lưu thay đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete_Modal -->
                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        <?php
                                            switch ($action){
                                                case 'taikhoan':
                                                    echo "Xóa tài khoản";
                                                    break;
                                                case 'hocvien':
                                                    echo "Xóa học viên";
                                                    break;
                                                case 'khoahoc':
                                                    echo "Xóa khóa học";
                                                    break;
                                                case 'danhgia';
                                                    echo "Xóa đánh giá";
                                                    break;
                                            }
                                        ?>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="delete_process.php" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="action" value="<?php echo $action; ?>">
                                        <input type="hidden" name="delete_id" id="delete_id">
                                        <?php switch ($action):
                                                case "taikhoan": ?>
                                                <!-- Xóa tài khoản -->
                                                <label>Bạn có muốn xóa tài khoản này không?</label>
                                            <?php break; ?>

                                            <?php case "hocvien": ?>
                                                <!-- Xóa học viên -->
                                                <label>Bạn có muốn xóa học viên này không?</label>
                                            <?php break; ?>

                                            <?php case "khoahoc": ?>
                                                <!-- Xóa khóa học -->
                                                <label>Bạn có muốn xóa khóa học này không?</label>
                                            <?php break; ?>

                                            <?php case "danhgia": ?>
                                                <!-- Xóa đánh giá -->
                                                <label>Bạn có muốn xóa đánh giá này không?</label>
                                            <?php break; ?>
                                        <?php endswitch; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                        <button type="submit" data-id="" name="delete_btn" class="btn btn-primary">Lưu thay đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <?php
                                    switch ($action){
                                        case 'taikhoan':
                                            echo "Bảng tài khoản&emsp;";
                                            # Button trigger modal
                                            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#add'>Thêm tài khoản</button>";
                                            break;
                                        case 'hocvien':
                                            echo "Bảng học viên&emsp;";
                                            # Button trigger modal
                                            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#add'>Thêm học viên</button>";
                                            break;
                                        case 'khoahoc':
                                            echo "Bảng khóa học&emsp;";
                                            # Button trigger modal
                                            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#add'>Thêm khóa học</button>";
                                            break;
                                        case 'danhgia';
                                            echo "Bảng đánh giá&emsp;";
                                            # Button trigger modal
                                            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#add'>Thêm đánh giá</button>";
                                            break;
                                    }
                                ?>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <?php switch ($action):
                                                  case "taikhoan": ?>
                                                  <!-- Bảng tài khoản -->
                                            <th>Email</th>
                                            <th>Tên</th>
                                            <th>Password</th>
                                            <th>Vai Trò</th>
                                            <th>Mật khẩu ứng dụng</th>
                                            <?php break; ?>

                                            <?php case "hocvien": ?>
                                                <!-- Bảng học viên -->
                                            <th>IDHV</th>
                                            <th>Tên học viên</th>
                                            <th>Giới tính</th>
                                            <th>Ngày sinh</th>
                                            <th>Quê quán</th>
                                            <th>Email</th>
                                            <th>SĐT</th>
                                            <?php break; ?>

                                            <?php case "khoahoc": ?>
                                                <!-- Bảng khóa học -->
                                            <th>IDKH</th>
                                            <th>Tên khoá học</th>
                                            <th>Tác giả</th>
                                            <th>Mô tả</th>
                                            <th>Giá gốc</th>
                                            <th>Giá hiện tại</th>
                                            <th>URL</th>
                                            <th>Hình ảnh</th>
                                            <?php break; ?>

                                            <?php case "danhgia": ?>
                                                <!-- Bảng đánh giá -->
                                            <th>IDDG</th>
                                            <th>IDHV</th>
                                            <th>IDKH</th>
                                            <th>Nội dung</th>
                                            <th>Sao đánh giá</th>
                                            <?php break; ?>
                                            <?php endswitch; ?>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php switch ($action):
                                              case "taikhoan": ?>
                                              <!-- Bảng tài khoản -->
                                        <?php foreach ($account_list as $account): ?>
                                        <tr>
                                            <td><?php echo $account['Email']; ?></td>
                                            <td><?php echo $account['Name']; ?></td>
                                            <td><?php echo $account['Password']; ?></td>
                                            <td><?php echo $account['VaiTro']; ?></td>
                                            <td><?php echo $account['MatKhauUngDung']; ?></td>
                                            <td>
                                                <button type="submit" name="edit_btn" class="btn btn-success edit-btn">Sửa</button>
                                                <button type="submit" name="delete_btn" class="btn btn-danger delete-btn">Xóa</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php break; ?>

                                        <?php case "hocvien": ?>
                                            <!-- Bảng học viên -->
                                        <?php foreach ($student_list as $student): ?>
                                        <tr>
                                            <td><?php echo $student['IDHV']; ?></td>
                                            <td><?php echo $student['TenHV']; ?></td>
                                            <td><?php echo $student['GioiTinh']; ?></td>
                                            <td><?php echo $student['NgaySinh']; ?></td>
                                            <td><?php echo $student['QueQuan']; ?></td>
                                            <td><?php echo $student['Email']; ?></td>
                                            <td><?php echo $student['SDT']; ?></td>
                                            <td>
                                                <button type="submit" name="edit_btn" class="btn btn-success edit-btn">Sửa</button>
                                                <button type="submit" name="delete_btn" class="btn btn-danger delete-btn">Xóa</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php break; ?>

                                        <?php case "khoahoc": ?>
                                            <!-- Bảng khóa học -->
                                        <?php foreach ($course_list as $course): ?>
                                        <tr>
                                            <td><?php echo $course['IDKH']; ?></td>
                                            <td><?php echo $course['TenKH']; ?></td>
                                            <td><?php echo $course['TacGiaKH']; ?></td>
                                            <td><?php echo $course['MoTaKH']; ?></td>
                                            <td><?php echo $course['GiaGocKH']; ?></td>
                                            <td><?php echo $course['GiaHienTaiKH']; ?></td>
                                            <td><?php echo $course['URLKH']; ?></td>
                                            <td><?php echo $course['HinhAnhKH']; ?></td>
                                            <td>
                                                <button type="submit" name="edit_btn" class="btn btn-success edit-btn">Sửa</button>
                                                <button type="submit" name="delete_btn" class="btn btn-danger delete-btn">Xóa</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php break; ?>

                                        <?php case "danhgia": ?>
                                            <!-- Bảng đánh giá -->
                                        <?php foreach ($rating_list as $rating): ?>
                                        <tr>
                                            <td><?php echo $rating['IDDG']; ?></td>
                                            <td><?php echo $rating['IDHV']; ?></td>
                                            <td><?php echo $rating['IDKH']; ?></td>
                                            <td><?php echo $rating['NoiDungDG']; ?></td>
                                            <td><?php echo $rating['SaoDG']; ?></td>
                                            <td>
                                                <button type="submit" name="edit_btn" class="btn btn-success edit-btn">Sửa</button>
                                                <button type="submit" name="delete_btn" class="btn btn-danger delete-btn">Xóa</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php break; ?>                                        
                                        <?php endswitch; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; <?php echo date("Y"); ?> Course Online, Inc. All rights reserved.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có thực sự muốn đăng xuất không?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- <div class="modal-body">Chọn "Logout" để đăng xuất hoặc "Cancel" để hủy bỏ</div> -->
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
                    <a class="btn btn-primary" href="../logout.php">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function () {
            $('.edit-btn').on('click', function() {
                $('#edit').modal('show');

                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#edit_id').val(data[0]);
                    $('#value_2').val(data[1]);
                    $('#value_3').val(data[2]);
                    $('#value_4').val(data[3]);
                    $('#value_5').val(data[4]);
                    $('#value_6').val(data[5]);
                    $('#value_7').val(data[6]);
                    $('#value_8').val(data[7]);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.delete-btn').on('click', function() {
                $('#delete').modal('show');

                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#delete_id').val(data[0]);
            });
        });
    </script>

</body>

</html>
<?php } ?>