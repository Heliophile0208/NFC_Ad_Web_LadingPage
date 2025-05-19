<?php
    $servername = "localhost"; // Tên máy chủ cơ sở dữ liệu
    $username = "qkvnxkeshosting_luatsu";        // Tên người dùng cơ sở dữ liệu
    $password = "Khanh@123";            // Mật khẩu của người dùng cơ sở dữ liệu
    $dbname = "qkvnxkeshosting_luatsu"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn để lấy thông tin theo ID = 1
$sql = "SELECT * FROM luat_su WHERE id = 1";
$result = $conn->query($sql);

// Kiểm tra nếu có kết quả
if ($result->num_rows > 0) {
    // Lấy dữ liệu của dòng đầu tiên
    $row = $result->fetch_assoc();
} else {
    echo "Không tìm thấy dữ liệu";
}

$conn->close(); // Đóng kết nối
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin</title>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'vi',
                includedLanguages: 'en,vi',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: true,
            }, 'google_translate_element');
        }

        // Mã JavaScript để xử lý hiệu ứng trượt
      document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.profile-card').forEach(card => {
        card.addEventListener('click', () => {
            const extraInfo = card.querySelector('.extra-info');

            if (card.classList.contains('open')) {
                // Hiệu ứng đóng
                extraInfo.style.height = `${extraInfo.scrollHeight}px`; //
                requestAnimationFrame(() => {
                    extraInfo.style.height = '0'; 
                });

                extraInfo.addEventListener('transitionend', () => {
                    extraInfo.style.display = 'none'; // Ẩn sau khi đóng xong
                }, { once: true });

                card.classList.remove('open'); // Bỏ lớp mở
            } else {
                // Hiệu ứng mở
                extraInfo.style.display = 'block'; // Hiển thị
                const height = extraInfo.scrollHeight; // Lấy chiều cao nội dung
                extraInfo.style.height = '0'; // Đặt chiều cao ban đầu
                requestAnimationFrame(() => {
                    extraInfo.style.height = `${height}px`; // Mở ra
                });

                card.classList.add('open'); // Thêm lớp mở
                extraInfo.addEventListener('transitionend', () => {
                    extraInfo.style.height = 'auto'; // Đặt lại auto sau khi mở xong
                }, { once: true });
            }
        });
    });
});
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #004085;
        }


        h3 {
            color: #004085;
        }

        h2 {
            text-align: center;
        }

        .page {
            max-width:calc(100%-20px);
           margin:20px;
            background-color: #f4f7fa;
        }

  .profile-card {
            width: calc(100%;-40px);
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
margin:40px 10px 10px 10px;
            border-radius: 10px;
            overflow: hidden;
            
        }

         

.profile-card.open {
     max-width: 100%;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);


            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease-in;
}  

.profile-card:not(.open) {
    max-width: 100%;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
margin:40px 10px 10px 10px;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease-out;
}  
 
    

/* Mặc định ẩn */
.extra-info {
    overflow: hidden; /* Ẩn nội dung tràn */
    height: 0; /* Mặc định chiều cao bằng 0 */
    opacity: 0; /* Ẩn ban đầu */
    transition: height 0.3s ease, opacity 0.3s ease;
}

/* Khi mở */
.profile-card.open .extra-info {
    opacity: 1; /* Hiển thị */
    transition: height 0.3s ease, opacity 0.3s ease;
}

/* Khi đóng */
.extra-info[style*="height: 0"] {
    opacity: 0; /* Ẩn */
}
        /* Khi có lớp open, áp dụng hiệu ứng mở (slideDown) */
        .profile-card.open .extra-info {
            animation: slideDown 0.3s forwards;
        }

        /* Khi có lớp hide, áp dụng hiệu ứng đóng (slideUp) */
        .profile-card .extra-info.hide {
            animation: slideUp 0.3s forwards;
        }

@keyframes slideDown {
            from {
                transform: translateY(0);
                opacity: 0;
            }
            to {
                transform: translateY(-20px);
                opacity: 1;
            }
        }

        /* Animation cho hiệu ứng đóng */
        @keyframes slideUp {
            from {
                transform: translateY(-20px);
                opacity: 1;
            }
            to {
                transform: translateY(0);
                opacity: 0;
            }
       
        }
 .profile-card:hover {
            transform: scale(1.05);
        } 
          
        .profile-header {
            text-align: center;
            padding: 25px;
            background: #004085;
            color: white;
        }

        .profile-header .profile-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #fff;
            margin-bottom: 15px;
        }

        .profile-header h2 {
            font-size: 1.8em;
            margin: 10px 0;
        }

        .profile-header p {
            font-size: 1.1em;
        }

        .contact-icons {
            display: flex;
            justify-content: space-around;
            padding: 15px;
            background: #e9ecef;
        }

        .contact-icons a {
            color: #004085;
            font-size: 1.5em;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-icons a:hover {
            color: #0056b3;
        }

        .contact-details {
            padding: 15px;
        }

        .contact-details h3 {
            font-size: 1.3em;
            margin-bottom: 15px;
            color: #004085;
        }

        .contact-details p {
            border-bottom: 1px dashed #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .contact-details p a {
            color: #007bff;
            text-decoration: none;
        }

        .contact-details p a:hover {
            text-decoration: underline;
        }

        .dichvu {
            text-align: center;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 5px;

        }

        .dichvu:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .dichvu img {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        .dichvu p {
            font-size: 1.1em;
            font-weight: bold;
            color: #004085;
        }

        .trang2 {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); /* Lưới tự động điều chỉnh */
            gap: 20px; /* Khoảng cách giữa các phần tử */
max-width:calc(100%-40px)
            padding: 20px;
        }

        .trang2 .dichvu a {
            display: block;
            text-decoration: none;
            color: inherit;
        }

        .map-container {
            display: flex;
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
            flex-direction: column; /* Đảm bảo căn giữa theo chiều dọc */
            padding: 20px;
        }

        .map-container iframe {
            
            max-width:900%; /* Giới hạn chiều rộng của bản đồ */
            height: 500px;
            border: none;
            border-radius: 8px;
        }

        
        footer {
            text-align: center;
            margin-top: 20px;
            color: #004085;
            font-weight: bold;
        }

        footer p {
            color: #ff0000;
            padding: 5px;
        }
#google_translate_element {
    text-align: center;
    margin: 0px 0px 15px 0px ;
}
    </style>
</head>
<body>
    <div class="page">
        <div class="profile-card">

            <div class="profile-header">
<div id="google_translate_element"></div>
                <img src="<?php echo $row['anh_dai_dien']; ?>" alt="<?php echo $row['ho_ten']; ?>" class="profile-photo">
                <h2><?php echo $row['ho_ten']; ?></h2>
                <p><?php echo $row['chuc_danh']; ?></p>
            </div>
            <div class="contact-icons">
                <a href="tel:<?php echo $row['so_dien_thoai']; ?>" class="icon" title="Gọi điện"><i class="fas fa-phone-alt"></i></a>
                <a href="sms:<?php echo $row['so_dien_thoai']; ?>" class="icon" title="Nhắn tin"><i class="fas fa-comment-dots"></i></a>
                <a href="mailto:<?php echo $row['email']; ?>" class="icon" title="Gửi Email"><i class="fas fa-envelope"></i></a>
                <a href="https://maps.app.goo.gl/e6LkR1o2PNN1QWSq9" target="_blank" title="Địa Chỉ" class="icon"><i class="fas fa-map-marker-alt"></i></a>
                <a href="https://heyzine.com/flip-book/3073a3685f.html#page/20" class="icon" title="Thông Tin Chi Tiết" target="_blank"><i class="fas fa-user"></i></a>
            </div>
            <div class="contact-details">
                <h3><i class="fas fa-address-book"></i> Liên Hệ:</h3>
                <p><strong>Họ & Tên:</strong> <?php echo $row['ho_ten']; ?></p>
                <p><strong>Công Ty:</strong> <?php echo $row['cong_ty']; ?></p>
                <p><strong>Di động:</strong> <a href="tel:<?php echo $row['so_dien_thoai']; ?>"><?php echo $row['so_dien_thoai']; ?></a></p>
                <p><strong>Website:</strong> <a href="<?php echo $row['website']; ?>" target="_blank"><?php echo $row['website']; ?></a></p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></p>
            </div>
            <div class="extra-info">
                <h2>Dịch vụ chính</h2>
                <div class="trang2">
                    <div class="dichvu">
                        <a href="link-tranh-tung.html">
                            <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ tranh tụng pháp lý">
                            <p>Tranh tụng</p>
                        </a>
                    </div>
    <div class="dichvu">
                        <a href="link-tranh-tung.html">
                            <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ tranh tụng pháp lý">
                            <p>Tranh tụng</p>
                        </a>
                    </div>
    <div class="dichvu">
                        <a href="link-tranh-tung.html">
                            <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ tranh tụng pháp lý">
                            <p>Tranh tụng</p>
                        </a>
                    </div>
    <div class="dichvu">
                        <a href="link-tranh-tung.html">
                            <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ tranh tụng pháp lý">
                            <p>Tranh tụng</p>
                        </a>
                    </div>

            <div class="dichvu">
                        <a href="link-tranh-tung.html">
                            <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ tranh tụng pháp lý">
                            <p>Tranh tụng</p>
                        </a>
                    </div>
               <div class="dichvu">
                        <a href="link-tranh-tung.html">
                            <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ tranh tụng pháp lý">
                            <p>Tranh tụng</p>
                        </a>
                    </div>
                </div>
           

<div class="map-container">
            <h2>Địa chỉ</h2>
            <iframe src="https://www.google.com/maps/embed?pb=..." width="95%" height="500px" style="border:0; margin:0 auto;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       

        <footer>
            <p>Name card điện tử ứng dụng 1 chạm trong <br>quản lý công việc</p>
        </footer></div>
    </div>
   </div>
</body>
</html>