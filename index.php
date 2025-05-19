<?php
$servername = "localhost"; // Tên máy chủ cơ sở dữ liệu
$username = "qkvnxkeshosting_luatsu"; // Tên người dùng cơ sở dữ liệu
$password = "Khanh@123"; // Mật khẩu của người dùng cơ sở dữ liệu
$dbname = "qkvnxkeshosting_luatsu"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra nếu có form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Chuẩn bị câu lệnh SQL để thêm dữ liệu vào bảng contacts
    $sql = "INSERT INTO contacts (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    // Thực thi câu lệnh SQL
    if ($conn->query($sql) === TRUE) {
        $message = "Tin nhắn đã được gửi thành công!";
    } else {
        $message = "Lỗi: " . $conn->error;
    }
}

// Truy vấn để lấy thông tin từ bảng luat_su (theo ID = 1)
$sql = "SELECT * FROM luat_su WHERE id = 1";
$result = $conn->query($sql);

// Kiểm tra nếu có kết quả
if ($result->num_rows > 0) {
    // Lấy dữ liệu của dòng đầu tiên
    $row = $result->fetch_assoc();
    // Xử lý dữ liệu ở đây, ví dụ: echo $row['name'];
} else {
    echo "Không tìm thấy dữ liệu";
}

// Đóng kết nối
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Thẻ thông minh NFC</title>    
        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="https://nidtech.vn/wp-content/uploads/2024/11/cropped-Screenshot-2024-10-18-ps.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
    </head>
  <style>
  #mainNav .navbar-nav .nav-item .nav-link.active, #mainNav .navbar-nav .nav-item .nav-link:hover {
    color: black;   
}
 #mainNav .nav-item {
    font-weight:bold;
 }
header.masthead {
  text-align: center;
  background-image: url("../assets/img/bannernfc.png") !important;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  width: 100%;
  height: auto;
  color: #add8e6; 
  font-weight: bold;
  font-size: 30px; 
  -webkit-text-stroke: 1px #ffffff; 
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); 

}
.contact-button {
    display: inline-block;
    padding: 10px 20px;
    width:100%;
    background-color: #007bff; 
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    transition: background-color 0.3s;
}

.contact-button:hover {
    background-color: #0056b3;
    color:white;
}

      .toast {
            visibility: hidden;
            min-width: 250px;
            background-color: green;
            color: #fff;
            text-align: center;
            border-radius: 10px;
            padding: 16px;
            position: fixed;
           right: 0;
            bottom: 30px;
            font-size: 17px;
        }
        .toast.show {
            visibility: visible;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }
        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }
        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }
.custom-btn {
  background-color: #007bff; 
  color: #dcdcdc; 
  padding: 12px 24px; 
  border-radius: 8px; 
  text-decoration: none; 
  font-size: 24px; 
  display: inline-block; 
  font-weight: 600; 
}

.custom-btn:hover {
  background-color: #0056b3; 
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); 
  color: #dcdcdc; 
}

.custom-btn:active {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
}


/* nút lên đầu */
.myBtn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: none; 
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 50%;
  padding: 10px 15px;
  font-size: 18px;
  cursor: pointer;
  z-index: 1000;
  transition: background-color 0.3s ease, transform 0.3s ease;
}


.myBtn.show {
  display: block;
}


.myBtn:hover {
  background-color: #0056b3;
  transform: scale(1.1);
}

.myBtn i {
  font-size: 20px;
}

  .myBtn:hover {
    background-color: #555;
  }
  @media (max-width: 768px) {
    .img {
        height:40px !important; 
        margin: -25px -10px -10px -10px  !important; 
    }
    
    .navbar-toggler {
        margin-top:-15px !important ;
    }
    #navbarResponsive {
        background-color:#40C1FF !important;
        width:100% !important ;
        color:white
    }
    .navbar-nav {
         padding:20px;
         width:100% !important;
    }
    .navbar-collapse {
        width:100% !important;
    }
}
//Sản phẩm
#portfolio .portfolio-item {
  max-width: 400px;
  margin-left: auto;
  margin-right: auto;
  border:2px solid black;
  height:770px;
}
@media (max-width: 768px) {
  #portfolio .portfolio-item {
    width: 350px;
   margin:0px 5px !important;
    border: 2px solid black;
    height: 900px !important;
  }
    .col-md-4 {
   margin:10px !important;
  }
}

#portfolio .portfolio-item .portfolio-link .portfolio-hover {
  display: flex;
  position: absolute;
  width: 100%;
  height: 100%;
background: rgba(173, 216, 230, 0.9); 
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity ease-in-out 0.25s;
}
#portfolio-hover .img-fluid {
    height:400px;
    width:100%;
}
.portfolio-caption {
    margin-bottom:10px;
}
.portfolio-item {
    display: flex;
    flex-direction: column;
    position: relative;
}

.portfolio-caption {
    margin-top: auto; 
    padding: 15px; 
    background-color: rgba(0, 0, 0, 0.6); 
    text-align: center;
}

.portfolio-caption .contact-button {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.portfolio-caption .contact-button:hover {
    background-color: #0056b3;
}

</style>
    <div id="toast" class="toast">Tin nhắn đã được gửi thành công!</div>
<script>

        document.addEventListener('DOMContentLoaded', function() {
            var message = "<?= $message; ?>";
            if (message) {
                var toast = document.getElementById('toast');
                toast.classList.add('show');
                setTimeout(function() {
                    toast.classList.remove('show');
                }, 3000);
            }
        });
    </script>
<!-- Nút quay lại đầu trang -->
<button onclick="topFunction()" class="myBtn" id="myBtn" title="Go to top">
  <i class="fas fa-arrow-up"></i>
</button>

<!-- Mã JavaScript -->
<script>
  // Lấy nút
  var mybutton = document.getElementById("myBtn");
  // Khi người dùng cuộn xuống 20px từ đỉnh của tài liệu, hiển thị nút
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }
  // Khi người dùng nhấp vào nút, cuộn lên đầu trang
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>

    <body  id="page-top" >
        <!-- Navigation-->
        <nav style="background-color:#40C1FF; " class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container" style="height:25px;" >
               <a class="navbar-brand" href="https://nidtech.vn/"><img class="img" style="height:55px;margin:-30px;" src="assets/img/logo-xoa-phon.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <div style="color:white">Menu  <i class="fas fa-bars ms-1"></i></div>     
                </button>
                <div  class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Tính năng</a></li>
                        <li class="nav-item"><a class="nav-link" href="#price">Bảng giá</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Sản phẩm</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Về chúng tôi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Đội ngũ</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" >
            <div class="container">
                <div class="masthead-subheading">Chào mừng bạn đến với trang dịch vụ của chúng tôi!</div>
                <div style="font-size:24px" class="masthead-heading text-uppercase">NFC - Kết nối nhanh chóng, tiện lợi và an toàn</div>
             <a class="text-uppercase custom-btn" href="#services">Xem Thêm</a>


            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Tính năng</h2>
                    <h3 class="section-subheading text-muted">Công nghệ không dây giúp các thiết bị trao đổi dữ liệu trong phạm vi rất gần (thường chỉ khoảng vài cm).</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x" style="color: blue;"></i> <!-- Đổi màu nền -->
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse" style="color: #ffffff;"></i> 
                        </span>
                        <h4 class="my-3">Thanh toán không tiếp xúc</h4>
                        <p class="text-muted">NFC cho phép thanh toán qua điện thoại hoặc thẻ tín dụng chỉ với một cú chạm, giúp giao dịch nhanh chóng và tiện lợi.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary" style="color: blue !important;"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse" style="color: white;"></i> 
                        </span>
                        <h4 class="my-3">Chia sẻ dữ liệu</h4>
                        <p class="text-muted">NFC giúp chuyển dữ liệu giữa các thiết bị, như hình ảnh, danh bạ hay tài liệu, bằng cách chạm chúng lại gần nhau.</p>
                    </div>
                    <div class="col-md-4">
                       <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary" style="color: blue !important;"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse" style="color: white;"></i> 
                        </span>
                        <h4 class="my-3">Xác thực và kiểm tra quyền truy cập</h4>
                        <p class="text-muted">NFC được sử dụng để xác thực danh tính qua các thẻ thông minh hoặc thẻ nhân viên, giúp mở cửa hoặc truy cập vào các khu vực hạn chế một cách an toàn.</p>
                    </div>
                </div>
            </div>
        </section>
<!-- Price -->
<section class="page-section" id="price">
 <div class="text-center"><h2 class="section-heading text-uppercase">Bảng Giá Dịch Vụ</h2></div>
  <div class="container-price">
    <div class="pricing-box">
      <div class="pricing-title">Start Up</div>
      <div class="pricing-subtitle">Gói phù hợp với: Cá nhân / Doanh nghiệp vừa và nhỏ</div>
      <div class="pricing-price">500.000đ</div>
      <div class="pricing-description">
        <p>Thời gian thực hiện: 3 - 5 ngày</p>
        <p>5 Thẻ NFC</p>
        <p>Giao diện thẻ theo mẫu đẹp mắt</p>
        <p>Test tốc độ tải trang</p>
        <p>Hỗ trợ cài đặt cơ bản</p>
        <p>Logo không tùy chỉnh</p>
        <p>Chuẩn giao diện Mobile</p>
        <p>Bảo hành 1 tháng</p>
        <p>Hỗ trợ kỹ thuật qua email và điện thoại</p><br><br>
      </div>
       <div class="pricing-footer">
  <a href="#contact" class="contact-button">LIÊN HỆ NGAY</a>
  </div>
    </div>

       <div class="pricing-box">
      <div class="pricing-title">PREMIUM</div>
      <div class="pricing-subtitle">Gói phù hợp với: Cá nhân / Doanh nghiệp vừa và lớn</div>
      <div class="pricing-price">1.000.000đ</div>
      <div class="pricing-description">
        <p>Thời gian thực hiện: 5 - 7 ngày</p>
        <p>10 Thẻ NFC</p>
        <p>Giao diện thẻ theo mẫu đẹp mắt</p>
        <p>Test tốc độ tải trang</p>
        <p>Hỗ trợ cài đặt và cấu hình</p>
        <p>Logo tùy chỉnh</p>
        <p>Chuẩn giao diện Mobile</p>
        <p>Bảo hành 3 tháng</p>
        <p>Hỗ trợ kỹ thuật qua email và điện thoại</p><br>
        <br>
      </div>
       <div class="pricing-footer">
     <a href="#contact" class="contact-button">LIÊN HỆ NGAY</a>
  </div>
    </div>
        <div class="pricing-box">
      <div class="pricing-title">ENTERPRISE</div>
      <div class="pricing-subtitle">Gói phù hợp với: Cá nhân / Doanh nghiệp vừa và lớn</div>
      <div class="pricing-price">2.000.000đ</div>
      <div class="pricing-description">
        <p>Thời gian thực hiện: 7 - 14 ngày</p>
        <p>20 thẻ NFC</p>
        <p>Giao diện thẻ và website theo yêu cầu đẹp mắt</p>
        <p>Hỗ trợ cài đặt, cấu hình nâng cao, hiệu ứng bắt mắt</p>
        <p>Test tốc độ tải trang</p>
        <p>Logo tùy chỉnh</p>
        <p>Chuẩn giao diện Mobile</p>
        <p>Bảo hành 6 tháng</p>
        <p>Tư vấn Marketing Online</p>
        <p>Hỗ trợ bảo hành bảo trì</p>
      </div>
       <div class="pricing-footer">
      <a href="#contact" class="contact-button">LIÊN HỆ NGAY</a>
  </div>
    </div>
  </div>
<div class="pricing-package individual">
    <div class="pricing-container">
    <div class="pricing-image">
            <img src="https://nidtech.vn/wp-content/uploads/2025/03/Catalogue-cong-ty.png" alt="Image" />
        </div>
        <!-- Cột 1: Bảng giá -->
        <div class="pricing-column">
            <div class="pricing-header">CÁ NHÂN</div>
            <div class="pricing-subheader">Gói phù hợp với: Cá nhân</div>
            <div class="pricing-cost">100.000đ</div>
            <div class="pricing-details">
                <div class="pricing-column-left">
                    <p><span class="tick">✔</span> Thời gian thực hiện: 2 - 4 ngày</p>
                    <p><span class="tick">✔</span> 1 Thẻ NFC</p>
                    <p><span class="tick">✔</span> Giao diện thẻ đơn giản, dễ sử dụng</p>
                    <p><span class="tick">✔</span> Test tốc độ tải trang</p>
                </div>
                <div class="pricing-column-right">
                    <p><span class="tick">✔</span> Hỗ trợ cài đặt cơ bản</p>
                    <p><span class="tick">✔</span> Logo không tùy chỉnh</p>
                    <p><span class="tick">✔</span> Chuẩn giao diện Mobile</p>
                    <p><span class="tick">✔</span> Bảo hành 1 tháng</p>
                    <p><span class="tick">✔</span> Hỗ trợ kỹ thuật qua email</p>
                </div>
            </div>

            <div class="pricing-footer">
                <a href="#contact" class="contact-button">LIÊN HỆ NGAY</a>
            </div>
                   <div class="pricing-offer">
    <p>Ưu đãi đặc biệt: </p>
    <ul>
    <li> Giảm 10% cho khách hàng đăng ký trong tháng này!</li>
    <li> Tặng voucher 100k khi giới thiệu khách hàng mới!</li>
    </ul>
</div>            
        </div>
 

        
    </div>
</div>




</section>
<style>
/* Định dạng cho hộp giá (gói dịch vụ) */

.pricing-offer {
    width: 100%; /* Chiếm toàn bộ chiều rộng */
   border:2px solid red;
    color: black; /* Màu chữ */
    text-align: center; /* Căn giữa chữ */
    padding: 15px 0; /* Khoảng cách phía trên và dưới */
    font-size: 18px; /* Kích thước chữ */
    font-weight: bold; /* Làm cho chữ đậm */
    margin-top: 20px; 
     transition: transform 0.3s ease, background-color 0.3s ease;
}

/* Hiệu ứng hover (Nếu muốn hiệu ứng hover cho phần ưu đãi) */
.pricing-offer:hover {
    background-color: red;
    color:white;
     transform: translateY(-10px) scale(1.05);
}

.pricing-package.individual {
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    margin: 20px auto;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    max-width: 1200px; /* Giới hạn chiều rộng tối đa */
}

/* Định dạng container chính để chia thành 2 cột */
.pricing-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px; /* Khoảng cách giữa 2 cột */
    flex-wrap: wrap; /* Đảm bảo rằng layout sẽ quấn lại trên màn hình nhỏ */
}

/* Cột chứa bảng giá */
.pricing-column {
    width: 48%; /* Cột bảng giá chiếm khoảng 48% chiều rộng */
    min-width: 300px; /* Đảm bảo cột có độ rộng tối thiểu */
    box-sizing: border-box;
    border:1px solid black;
    padding:20px;
    border-radius:10px;
}

/* Tiêu đề của gói */
.pricing-header {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 10px;
}

/* Phụ đề của gói */
.pricing-subheader {
    font-size: 18px;
    color: #555;
    text-align: center;
    margin-bottom: 20px;
}

/* Giá của gói */
.pricing-cost {
    font-size: 24px;
    font-weight: bold;
    color: #e74c3c;
    text-align: center;
    margin-bottom: 20px;
}

/* Mô tả chi tiết gói */
.pricing-details {
    display: flex;
    flex-wrap: wrap; /* Quấn lại trên màn hình nhỏ */
    justify-content: space-between;
    gap: 20px; /* Khoảng cách giữa các cột mô tả */
}

/* Cột mô tả */
.pricing-column-left,
.pricing-column-right {
    width: 48%; /* Mỗi cột mô tả chiếm 48% */
    min-width: 200px; /* Đảm bảo cột có độ rộng tối thiểu */
    box-sizing: border-box;
}

.pricing-details p {
    font-size: 16px;
    color: #333;
    margin: 10px 0;
}

/* Dấu tick */
.pricing-details .tick {
    color: #27ae60; /* Màu xanh cho dấu tick */
    margin-right: 10px;
}

/* Cột chứa ảnh */
.pricing-image {
    width: 48%;
    min-width: 300px; /* Đảm bảo ảnh không quá nhỏ */
    box-sizing: border-box;
}

.pricing-image img {
    width: 100%; /* Ảnh sẽ chiếm toàn bộ chiều rộng của cột */
    border-radius: 8px;
    object-fit: cover; /* Đảm bảo ảnh không bị méo */
}

/* Chân trang của gói */
.pricing-footer {
    text-align: center;
    margin-top: 20px;
}

/* Nút liên hệ */
.contact-button {
    background-color: #3498db;
    color: #fff;
    padding: 12px 24px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.contact-button:hover {
    background-color: #2980b9;
}

/* Hiệu ứng hover: Nổi lên và thay đổi bóng */
.pricing-package.individual:hover {
    transform: translateY(-10px); /* Nâng lên 10px khi hover */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Tạo bóng lớn hơn khi hover */
}
@media (max-width: 768px) {
    /* Đảm bảo container bảng giá và ảnh xếp chồng lên nhau trên màn hình nhỏ */
    .pricing-container {
        flex-direction: column; /* Cột bảng giá và ảnh sẽ xếp chồng lên nhau */
        gap: 10px;
    }

    /* Cột chứa bảng giá chiếm 100% trên màn hình nhỏ */
    .pricing-column {
        width: 100%;
        min-width: 100%; /* Đảm bảo cột chiếm toàn bộ chiều rộng */
    }

    /* Cột ảnh sẽ chiếm 100% chiều rộng trên màn hình nhỏ */
    .pricing-image {
        width: 100%;
        min-width: 100%;
    }

    /* Giảm kích thước của tiêu đề và mô tả trên thiết bị di động */
    .pricing-header {
        font-size: 24px;
    }

    .pricing-subheader {
        font-size: 16px;
    }

    .pricing-cost {
        font-size: 25px;
    }

.pricing-details p {
    font-size: 16px;
    color: #333;
    margin: 10px 0;
    white-space: nowrap; /* Ngăn không cho chữ xuống dòng */
}
.pricing-column-right {
  margin-top:-30px;
}

    .pricing-offer {
        font-size: 16px; /* Giảm kích thước chữ cho ưu đãi */
    }

    .contact-button {
        width: 100%; /* Nút liên hệ chiếm toàn bộ chiều rộng trên mobile */
        font-size: 18px;
        padding: 14px 0;
    }
}

@media (max-width: 480px) {
    /* Điều chỉnh thêm cho màn hình cực nhỏ như trên điện thoại */
    .pricing-header {
        font-size: 20px;
    }

    .pricing-subheader {
        font-size: 14px;
    }

    .pricing-cost {
        font-size: 25px;
    }

.pricing-details p {
    font-size: 16px;
    color: #333;
    margin: 10px 0;
    white-space: nowrap; /* Ngăn không cho chữ xuống dòng */
}

    .pricing-offer {
        font-size: 14px;
    }

    .contact-button {
        font-size: 16px;
        padding: 12px 0;
    }
}

@media (max-width: 768px) {
  .container-price {
    flex-direction: column; 
    align-items: center;
  }

  .pricing-box {
    width: 100%; 
    margin: 10px 0;
  }

  .pricing-footer {
    position: relative;
    width: 100%; 
    text-align: center;
    padding: 15px;
  }
.pricing-description p::before {

  color: green !important;

}
  .contact-button {
    padding: 12px 30px;
  }
}
.container-price {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  margin:0 30px;
   
}
.pricing-footer {
  text-align: center;
  border-radius: 20px;
  padding: 20px;
  margin-bottom:10px;
}

.pricing-box {
  flex: 1;
  background-color: #f9f9f9;
  margin: 10px;
  border-radius: 30px;
  padding: 20px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
height:700px;

}

.pricing-box:hover {
  transform: translateY(-20px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  background-color:#d3d3d3;
}

.pricing-title {
  font-size: 35px;
  font-weight: bold;
  text-align: center;
  color: blue;
  margin-bottom: 5px;
  text-transform: uppercase; 
}

.pricing-subtitle {
  font-size: 14px;
  text-align: center;
  color: #666;
  margin-bottom: 5px;
}

.pricing-price {
  font-size: 36px;
  font-weight: bold;
  text-align: center;
  color: #007bff;
  margin-bottom: 5px;
}

.pricing-description p {
  font-size: 15px;
  color: #555;
  line-height: 1.6;
  margin: 5px 0;
  padding-left: 25px;
  position: relative;
  display: flex;
  align-items: center;
  height: 40px; 
  border-bottom: 1px dashed #ccc; 
}

.pricing-description p::before {
  content: "\2714"; 
  font-size: 16px;
  color: green;
  position: absolute;
  left: 0;
}

.pricing-box a {
  display: inline-block;
  text-decoration: none;
  font-weight: bold;
  padding: 10px 20px;
  border-radius: 20px;
  background-color:blue;
  color:white;
  text-align: center;
  transition: background-color 0.3s ease;
  width:90%
}

.pricing-box a:hover {
  background-color: white;
  color:blue;
  border:1px solid blue;
}

</style>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Sản phẩm</h2>
                    <h3 class="section-subheading text-muted">Mẫu giao diện website bán chạy</h3>
                </div>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 1 -->
            <div class="portfolio-item">
                <a class="portfolio-link" href="https://demo.nidtech.vn/bio/bio1.php"  target="_blank">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-link fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="assets/img/portfolio/bio1.jpg" alt="Giao diện 1" />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">Giao diện 1</div>
                    <div class="portfolio-caption-subheading text-muted">50.000đ</div>
                    <a href="#contact" class="contact-button">Liên hệ</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 2 -->
            <div class="portfolio-item">
                <a class="portfolio-link" href="https://demo.nidtech.vn/bio/bio2.php"  target="_blank">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-link fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="assets/img/portfolio/bio1.jpg" alt="Giao diện 2" />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">Giao diện 2</div>
                    <div class="portfolio-caption-subheading text-muted">50.000đ</div>
                    <a href="#contact" class="contact-button">Liên hệ</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 3 -->
            <div class="portfolio-item">
                <a class="portfolio-link" href="https://demo.nidtech.vn/bio/bio3.php"  target="_blank">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-link fa-3x"></i></div>
                    </div>
                    <img class="img-fluid" src="assets/img/portfolio/bio3.jpg" alt="Giao diện 3" />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">Giao diện 3</div>
                    <div class="portfolio-caption-subheading text-muted">50.000đ</div>
                    <a href="#contact" class="contact-button">Liên hệ</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
            <!-- Portfolio item 4 -->
            <div class="portfolio-item">
                <a class="portfolio-link" href="https://demo.nidtech.vn/bio/bio5.php"  target="_blank">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-link fa-3x"></i></div>
                    </div>
                    <img style="height:600px;" class="img-fluid" src="assets/img/portfolio/bio5.jpg" alt="Giao diện 4" />

                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">Giao diện 4</div>
                    <div class="portfolio-caption-subheading text-muted">50.000đ</div>
                    <a href="#contact" class="contact-button">Liên hệ</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 5 -->
            <div class="portfolio-item">
                <a class="portfolio-link" href="https://demo.nidtech.vn/bio/bio6.html"  target="_blank">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-link fa-3x"></i></div>
                    </div>
                    <img style="height:600px;" class="img-fluid" src="assets/img/portfolio/bio6.jpg" alt="Giao diện 6" />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">Giao diện 6</div>
                    <div class="portfolio-caption-subheading text-muted">50.000đ</div>
                    <a href="#contact" class="contact-button">Liên hệ</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 mb-4">
            <!-- Portfolio item 6 -->
            <div class="portfolio-item">
                <a class="portfolio-link" href="https://demo.nidtech.vn/bio/bio7.html"  target="_blank">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content"><i class="fas fa-link fa-3x"></i></div>
                    </div>
                    <img style="height:600px;" class="img-fluid" src="assets/img/portfolio/bio7.jpg" alt="Giao diện 7" />
                </a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">Giao diện 7</div>
                    <div class="portfolio-caption-subheading text-muted">50.000đ</div>
                    <a href="#contact" class="contact-button">Liên hệ</a>
                </div>
            </div>
        </div>
           <div class="more"><a href="https://demo.nidtech.vn/bio/bio.html" target="_blank">XEM THÊM</a></div>
    </div>
      
</div>


              <!-- Sử dụng PHP để include file card.html -->
<div id="card-container">
<div class="text-center" style="margin-top:20px">
                    <h3 class="section-subheading text-muted">Mẫu giao diện thẻ bán chạy</h3>
</div>
 <body>
<div class="flip-container-wrapper">
  <div class="flip-container">
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img width="400px" height="250px" src="/card/images/card1_back.JPG" alt="Image 1" />
        </div>
        <div class="flip-card-back">
          <img width="400px" height="250px" src="/card/images/card1_front.JPG" alt="Image 2" />
         
        </div>
      </div>
    </div>
  </div>

  <div class="flip-container">
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img width="400px" height="250px" src="/card/images/card1_back.JPG" alt="Image 1" />
        </div>
        <div class="flip-card-back">
          <img width="400px" height="250px" src="/card/images/card1_front.JPG" alt="Image 2" />
         
        </div>
      </div>
    </div>
  </div>

  <div class="flip-container">
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img width="400px" height="250px" src="/card/images/card1_back.JPG" alt="Image 1" />
        </div>
        <div class="flip-card-back">
          <img width="400px" height="250px" src="/card/images/card1_front.JPG" alt="Image 2" />
       
        </div>
      </div>
    </div>
  </div>
</div>
<div class="flip-container-wrapper">
  <div class="flip-container">
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img width="400px" height="250px" src="/card/images/card1_back.JPG" alt="Image 1" />
        </div>
        <div class="flip-card-back">
          <img width="400px" height="250px" src="/card/images/card1_front.JPG" alt="Image 2" />
         
        </div>
      </div>
    </div>
  </div>

  <div class="flip-container">
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img width="400px" height="250px" src="/card/images/card1_back.JPG" alt="Image 1" />
        </div>
        <div class="flip-card-back">
          <img width="400px" height="250px" src="/card/images/card1_front.JPG" alt="Image 2" />
         
        </div>
      </div>
    </div>
  </div>

  <div class="flip-container">
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img width="400px" height="250px" src="/card/images/card1_back.JPG" alt="Image 1" />
        </div>
        <div class="flip-card-back">
          <img width="400px" height="250px" src="/card/images/card1_front.JPG" alt="Image 2" />
       
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<style>
#card-container {
  width: 100%;  
  min-height: 100px;  

}
.more {
  margin-top: 10px;
  text-align: center; 
}

.more a {
  text-decoration: none;
  border: 1px solid black;
  padding: 10px 20px; 
  color: white;
  background-color: blue;
  display: inline-block; 
  font-size: 16px; 
  border-radius: 5px; 
  transition: all 0.3s ease; 
}

.more a:hover {
  color: blue;
  background-color: white;
  border-color: blue; 
}

@media (max-width: 768px) {
.flip-container-wrapper {
gap: 10px; /* Giảm khoảng cách khi trên điện thoại */
flex-direction:column;
}

.flip-container {
max-width: 100%; /* Đảm bảo không vượt quá màn hình */
height: auto; /* Điều chỉnh chiều cao thẻ */
}}
/* Container chứa các thẻ */
.flip-container-wrapper {
  display: flex; /* Sử dụng Flexbox */
  justify-content: space-between; /* Căn giữa các thẻ */
  gap: 20px; /* Khoảng cách giữa các thẻ */
  margin: 20px auto; 
}

/* Các thẻ lật */
.flip-container {
  perspective: 2000px; /* Độ sâu của hiệu ứng */
  width: 400px;
  height: 250px;
}

.flip-card {
  width: 100%;
  height: 100%;
  border: 1px solid black;
  position: relative;
  transform-style: preserve-3d; /* Giữ lại không gian 3D */
  transition: transform 0.6s; /* Thời gian lật */
}

.flip-container:hover .flip-card {
  transform: rotateY(180deg); /* Xoay khi hover */
}

.flip-card-inner {
  position: absolute;
  width: 100%;
  height: 100%;
  transform-style: preserve-3d;
  transition: transform 0.6s;
}

.flip-card-front, .flip-card-back {
  backface-visibility: hidden; /* Ẩn mặt sau khi lật */
  position: absolute;
  width: 100%;
  height: 100%;
}

.flip-card-front {
  background-color: #bbb;
}

.flip-card-back {
  transform: rotateY(180deg); /* Đảo mặt sau khi lật */
  background-color: #ccc;
}

/* Đảm bảo ảnh không bị méo */
.flip-card-front img, .flip-card-back img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Đảm bảo ảnh không bị méo và đầy đủ */
}

@media (max-width: 768px) {
  .more a {
    padding: 10px 15px; 
    font-size: 14px;
  }
}

</style>
 </div>
            <div class="more"><a href="https://demo.nidtech.vn/card/card.html" target="_blank">XEM THÊM</a></div>
</div>          
           
</div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Về chúng tôi</h2>
            <h3 class="section-subheading text-muted">Chúng tôi là một đội ngũ đam mê và sáng tạo, chuyên cung cấp những giải pháp công nghệ tiên tiến nhất nhằm mang lại trải
            nghiệm tốt nhất cho khách hàng..</h3>
        </div>
        <ul class="timeline">
            <li data-aos="fade-up" data-aos-duration="2000">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>17/01/2025</h4>
                        <h4 class="subheading">Dự án NFC đầu tiên</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Chỉ cần chạm vào thẻ NFC, bạn sẽ dễ dàng xem hồ sơ, chuyên môn và thông tin liên hệ của các luật sư</p></div>
                </div>
            </li>
            <li class="timeline-inverted" data-aos="fade-up" data-aos-duration="2000">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>March 2011</h4>
                        <h4 class="subheading">An Agency is Born</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li data-aos="fade-up" data-aos-duration="2000">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>December 2015</h4>
                        <h4 class="subheading">Transition to Full Service</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li class="timeline-inverted" data-aos="fade-up" data-aos-duration="2000">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>July 2020</h4>
                        <h4 class="subheading">Phase Two Expansion</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li class="timeline-inverted" data-aos="fade-up"  data-aos-duration="2000">
                <div class="timeline-image">
                    <h4>
                       Tiếp nối
                        <br />
                        câu chuyện
                        <br />
                        của chúng tôi
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- Timeline -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init(); // Khởi tạo AOS
</script>

        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Đội ngũ</h2>
                    <h3 class="section-subheading text-muted">Với sự kết hợp hoàn hảo giữa kinh nghiệm và đam mê, đội ngũ của chúng tôi luôn nỗ lực mang lại những giải pháp đột phá cho khách hàng.</h3>
                </div>
                
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/khanh.jpg" alt="..." />
                            <h4>Nguyễn Đặng Hoàng Khanh</h4>
                            <p class="text-muted">Trưởng Dự Án</p>
                          <a class="btn btn-dark btn-social mx-2" href="tel:+84972369293" aria-label="Gọi điện thoại"><i class="fas fa-phone"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Nguyễn Đặng Hoàng Khanh"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="..." />
                            <h4>Đặng Ngọc Sơn</h4>
                            <p class="text-muted">Bộ Phận Kỹ Thuật</p>
                            <a class="btn btn-dark btn-social mx-2" href="tel:+84567157896" aria-label="Gọi điện thoại"><i class="fas fa-phone"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Đặng Ngọc Sơn"><i class="fab fa-facebook-f"></i></a>
                           
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/thao.jpg" alt="..." />
                            <h4>Phan Nguyễn Minh Thảo</h4>
                            <p class="text-muted">Nhà Thiết Kế Thẻ</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Phan Nguyễn Minh Thảo"><i class="fas fa-phone"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Phan Nguyễn Minh Thảo"><i class="fab fa-facebook-f"></i></a>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/bao.jpg" alt="..." />
                            <h4>Vy Hoàng Gia Bảo</h4>
                            <p class="text-muted">Nhà Thiết Kế Website</p>
                            <a class="btn btn-dark btn-social mx-2" href="tel:+84327772334" aria-label="Vy Hoàng Gia Bảo"><i class="fas fa-phone"></i></a>
                            <a class="btn btn-dark btn-social mx-2"  target="_blank" href="https://www.facebook.com/gia.bao.749115?locale=vi_VN" aria-label="Vy Hoàng Gia Bảo"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/lethikimngan.jpg" alt="..." />
                            <h4>Lê Thị Kim Ngân</h4>
                            <p class="text-muted">Nhà Phát Triển Website</p>
                            <a class="btn btn-dark btn-social mx-2" href="tel:+84928338155" aria-label="Lê Thị Kim Ngân"><i class="fas fa-phone"></i></a>
                            <a class="btn btn-dark btn-social mx-2"  target="_blank" href="https://www.facebook.com/kimngan.0208" aria-label="Lê Thị Kim Ngân"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/myngoc.jpg" alt="..." />
                            <h4>Nguyễn Thị Mỹ Ngọc</h4>
                            <p class="text-muted">Nhà Phát Triển Website</p>
                            <a class="btn btn-dark btn-social mx-2" href="tel:+84344988704" aria-label="Nguyễn Thị Mỹ Ngọc"><i class="fas fa-phone"></i></a>
                            <a class="btn btn-dark btn-social mx-2"  target="_blank" href="https://www.facebook.com/my.ngoc.657443" aria-label="Lê Thị Kim Ngân"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Chúng tôi tự hào sở hữu một đội ngũ chuyên gia nhiệt huyết, giàu kinh nghiệm và luôn sẵn sàng cống hiến để mang lại những giải pháp tối ưu cho khách hàng.</p></div>
                </div>
            </div>
        </section>

        <!-- Clients-->

        <div class="py-5">
            <div class="container">
                     <div class="text-center">
                    <h2 class="section-heading text-uppercase">Khách hàng đặc biệt</h2>
                    <p style="font-size:16px; color:#7A7B7D; font-style: italic; ">Các khách hàng đã tin tưởng và sử dụng sản phẩm/dịch vụ của chúng tôi...</p>
                </div>
               <div class="row align-items-center">
    <div class="logos-wrapper">
        <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"><img class="img-fluid img-brand d-block mx-auto logo" src="assets/img/logos/microsoft.svg" alt="Microsoft Logo" /></a>
        </div>
        <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"><img class="img-fluid img-brand d-block mx-auto logo" src="assets/img/logos/google.svg" alt="Google Logo" /></a>
        </div>
        <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"><img class="img-fluid img-brand d-block mx-auto logo" src="assets/img/logos/facebook.svg" alt="Facebook Logo" /></a>
        </div>
        <div class="col-md-3 col-sm-6 my-3">
            <a href="https://yvnlaw.com/"><img class="img-fluid img-brand d-block mx-auto logo" src="https://yvnlaw.com/wp-content/uploads/2024/10/b74f3c4e-a112-49bf-a485-85454ee79c89-ps-768x242.png"  alt="YVNLaw Logo" /></a>
        </div>
      
        <!-- Các logo này sẽ xuất hiện lại sau khi các logo đầu tiên chạy hết -->
        <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"><img class="img-fluid img-brand d-block mx-auto logo" src="assets/img/logos/microsoft.svg" alt="Microsoft Logo" /></a>
        </div>
        <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"><img class="img-fluid img-brand d-block mx-auto logo" src="assets/img/logos/google.svg" alt="Google Logo" /></a>
        </div>
        <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"><img class="img-fluid img-brand d-block mx-auto logo" src="assets/img/logos/facebook.svg" alt="Facebook Logo" /></a>
        </div>
        <div class="col-md-3 col-sm-6 my-3">
            <a href="https://yvnlaw.com/" target="_blank"><img class="img-fluid img-brand d-block mx-auto logo" src="https://yvnlaw.com/wp-content/uploads/2024/10/b74f3c4e-a112-49bf-a485-85454ee79c89-ps-768x242.png" alt="YVNLaw Logo" /></a>
        </div>
       
    </div>
</div>

</div>
</div>
<!--đường băng chuyền-->
        <style>
    .row {
        display: flex;
        overflow: hidden;
        width: 100%;
    }
.row:hover .logos-wrapper {
    animation-play-state: paused;
}
    .logos-wrapper {
        display: flex;
        animation: slide 30s linear infinite;
    }

    .logo {
        padding: 0 10px;
    }

    @keyframes slide {
        0% {
            transform: translateX(0); /* Bắt đầu từ bên trái */
        }
        100% {
            transform: translateX(-100%); /* Di chuyển hết toàn bộ chiều rộng */
        }
    }
 @media (max-width: 768px) {
        .row {
            flex-direction: column; 
        }

        .logos-wrapper {
            animation: slide-vertical 30s linear infinite; 
        }

        .logo {
            max-width: 150px; 
        }

        @keyframes slide-vertical {
            0% {
                transform: translateX(0); 
            }
            100% {
                transform: translateX(-100%); 
            }
        }
.form-group {
    width:360px !important;
}
.form-control {
 border-radius:20px !important;
  margin:10px 15px 0px 15px !important;
}
#contactForm{
margin-top:-10px !important;
}
.custom-btn {
   margin-top:-10px !important; 
}
    }
</style>
        <!-- Contact-->

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Liên Hệ</h2>
<h3 class="section-subheading text-muted">Hãy liên hệ với chúng tôi để được hỗ trợ nhanh chóng và chi tiết.</h3>

        </div>

        <!-- Form Liên hệ -->
        <form id="contactForm" action="index.php" method="POST">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" name="name" type="text" placeholder="Tên của bạn *" required />
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" id="email" name="email" type="email" placeholder="Địa chỉ email *" required />
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" id="phone" name="phone" type="tel" placeholder="Số điện thoại *" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="message" name="message" placeholder="Để lại tin nhắn... *" required></textarea>
                    </div>
                </div>
            </div>
            <!-- Submit Button-->
            <div class="text-center">
               <button class=" text-uppercase custom-btn" id="sendMessageBtn" type="submit">Gửi tin nhắn</button>
            </div>
            
        </form>
    </div>
</section>

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start text-align">Công ty TNHH Nidtech</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="tel:+84567157896" aria-label="Gọi điện thoại"><i class="fas fa-phone"></i></a>
                        <a class="btn btn-dark btn-social mx-2"  target="_blank" href="https://www.facebook.com/profile.php?id=61570535081843" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2"  target="_blank" href="https://nidtech.vn/" aria-label="Website"><i class="fas fa-globe"></i></a>

                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Chính sách bảo mật</a>
                        <a class="link-dark text-decoration-none" href="#!">Điều khoản sử dụng</a>
                    </div>
                </div>
            </div>
        </footer>
<style>
@media (max-width: 768px) {
  /* Căn giữa nội dung trong cột trên màn hình nhỏ */
  footer {
    margin:0 auto !important;
  }
}
</style>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
