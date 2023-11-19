<?php
    if (isset($_COOKIE['matkhauungdung'])){
        if (is_null($_COOKIE['matkhauungdung'])){
            echo 'Mail không gửi được. Lỗi: Mật khẩu ứng dụng trống';
        }else{
            require "PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
            require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
            require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
            if (isset($_POST)) {
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
                try {
                    //  $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                    $mail->isSMTP();
                    $mail->CharSet  = "utf-8";
                    $mail->Host = 'smtp.gmail.com';  //SMTP servers
                    $mail->SMTPAuth = true; // Enable authentication
                    $nguoigui = filter_input(INPUT_POST, "email"); // Nhập gmail của người gửi
                    $matkhau = $_COOKIE['matkhauungdung']; // Nhập mật khẩu ứng dụng gmail người gửi
                    $tennguoigui = filter_input(INPUT_POST, "name"); // Nhập tên của người gửi
                    $mail->Username = $nguoigui; // SMTP username
                    $mail->Password = $matkhau;   // SMTP password
                    $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                    $mail->Port = 465;  // port to connect to                
                    $mail->setFrom($nguoigui, $tennguoigui);
                    $to = "thaihv.22it@vku.udn.vn";
                    $to_name = "bạn";
                    $tieude = filter_input(INPUT_POST, "title");
        
                    $mail->addAddress($to, $to_name); //mail và tên người nhận  
                    $mail->isHTML(true);  // Set email format to HTML
                    $mail->Subject = $tieude;
                    $noidungthu = filter_input(INPUT_POST, "message");
                    $mail->Body = $noidungthu;
                    // if(isset($_FILES['file']['name'])) {
                    //     $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name']));
                    /* Hàm tempnam() sẽ tạo file với tên file là duy nhất trong nằm thư mục truyền vào. Nếu thư mục không tồn tại, hàm tempnam() có thể tạo tệp tin vào thư mục tạm của hệ thống.  tempnam( $dir, $prefix); $dir là thư mục sẽ chứa file.$prefix là tên file, hàm sẽ chỉ dụng 3 kí tự đầu tiên của $prefix để làm tiền tố của tên file được tạo.
                    */
                    //     if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
                    //         $mail->addAttachment($uploadfile, $_FILES['file']['name']);
                    // } 
                    $mail->smtpConnect(array(
                        "ssl" => array(
                            "verify_peer" => false,
                            "verify_peer_name" => false,
                            "allow_self_signed" => true
                        )
                    ));
                    if($mail->send())
                    {
                        echo "<script>alert('Cảm ơn ý kiến của bạn!'); location.href='index.php';</script>";
                        // header("Location:bai2.php");
                    }
                } catch (Exception $e) {
                    echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
                }
            }
        }
    }else{
        echo "<script>alert('Vui lòng đăng nhập để liên hệ!'); location.href='login.php';</script>";
    }
?>