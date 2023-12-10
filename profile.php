<?php
require("model/connect_db.php");
require("login_process.php");
require("model/student_db.php");
// $idhv = null;
if(isset($_COOKIE['idhv'])){
    $idhv = $_COOKIE['idhv'];
}
$student = get_student_by_id($idhv);
if($student){
    $tenhv = $student['TenHV'];
    $gioiTinh = $student['GioiTinh'];
    $ngaySinh = $student['NgaySinh'];
    $queQuan = $student['QueQuan'];
    $email = $student['Email'];
    $sdt =  $student['SDT'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="Profile Template/style1.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form action="profile_process.php" method="post">
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">Thông tin tài khoản</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Đổi mật khẩu</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Thông tin riêng</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-social-links">Mạng Xã Hội</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary">
                                        Upload new photo
                                        <input type="file" class="account-settings-fileinput">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Id Học Viên:</label>
                                    <input name="idhv" type="text" class="form-control mb-1" value="<?php echo $idhv?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tên học Viên:</label>
                                    <input name="tenhv" type="text" class="form-control" value="<?php echo $tenhv?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ngày Sinh:</label>
                                    <input name="ngaySinh" type="text" class="form-control mb-1" value="<?php echo $ngaySinh?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Giới tính:</label>
                                    <select name="gioiTinh" class="form-control mb-1">
                                        <option value="Nam" <?php echo ($gioiTinh == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                                        <option value="Nữ" <?php echo ($gioiTinh == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                                        <option value="Khác" <?php echo ($gioiTinh == 'Khác') ? 'selected' : ''; ?>>Khác</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">E-mail:</label>
                                    <input name="Email" type="text" class="form-control mb-1" value="<?php echo $email?>">
                                    <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Điện thoại:</label>
                                    <input name="soDienThoai" type="text" class="form-control" value="<?php echo $sdt?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Quê quán:</label>
                                    <input name="queQuan" type="text" class="form-control" value="<?php echo $queQuan?>">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Mật khẩu hiện tại</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mật khẩu mới</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Bio</label>
                                    <textarea class="form-control"
                                        rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Birthday</label>
                                    <input type="text" class="form-control" value="May 3, 1995">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="custom-select">
                                        <option>USA</option>
                                        <option selected>Canada</option>
                                        <option>UK</option>
                                        <option>Germany</option>
                                        <option>France</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" value="+0 (123) 456 7891">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Website</label>
                                    <input type="text" class="form-control" value>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" value="https://twitter.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" value="https://www.facebook.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Google+</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" value="https://www.instagram.com/user">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-connections">
                            <div class="card-body">
                                <button type="button" class="btn btn-twitter">Connect to
                                    <strong>Twitter</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i
                                            class="ion ion-md-close"></i> Remove</a>
                                    <i class="ion ion-logo-google text-google"></i>
                                    You are connected to Google:
                                </h5>
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="f9979498818e9c9595b994989095d79a9694">[email&#160;protected]</a>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-facebook">Connect to
                                    <strong>Facebook</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-instagram">Connect to
                                    <strong>Instagram</strong></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Activity</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone comments on my article</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone answers on my forum
                                            thread</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone follows me</span>
                                    </label>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Application</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">News and announcements</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly product updates</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly blog digest</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>
    </div>
    </form>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>

