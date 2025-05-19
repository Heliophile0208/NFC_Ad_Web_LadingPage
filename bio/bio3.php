<?php
    $servername = "localhost"; // Tên máy chủ cơ sở dữ liệu
    $username = "qkvnxkeshosting_luatsu";        // Tên người dùng cơ sở dữ liệu
    $password = "Khanh@123";            // Mật khẩu của người dùng cơ sở dữ liệu
    $dbname = "qkvnxkeshosting_luatsu"; // Tên cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM luat_su WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No data found";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'vi',
                includedLanguages: 'en,vi',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: true,
            }, 'google_translate_element');
        }
</script>
    <title>Thông Tin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
#google_translate_element {
    text-align: center;
    margin: 0px 0px 15px 0px ;
background-color:white;
}
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .profile-container {
            max-width: 100%;
            margin: 0px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .profile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
margin-right:-40px;
        }
        .profile-header h2 {
            font-size: 26px;
            color: #004085;
margin-top:-10px

        }
        .profile-header .contact-info {
            text-align: right;
        }
        .contact-info a {
            color: #004085;
            font-size: 1.1rem;
            text-decoration: none;
            margin: 5px;
        }
 .contact-icons {
            display: flex;
            justify-content: space-around;
            
            
        }

        .contact-icons a {
            color: #004085;
            font-size: 1.5em;
            text-decoration: none;
            transition: color 0.3s ease;
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


        .contact-icons a:hover {
            color: #0056b3;
        }
        .contact-info a:hover {
            color: #0056b3;
        }
        .services {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(270px, 1fr)); /* Lưới tự động điều chỉnh */
    gap: 15px;
    margin-top: 20px;
}

.service a {
    display: block;
    text-decoration: none;
    color: inherit;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    background: #fff;
    border-radius: 10px;
    padding: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.service a:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.service img {
    width: 80px;
    height: 80px;
    margin-bottom: 10px;
}

.service p {
    font-size: 1.1em;
    font-weight: bold;
    color: #004085;
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

    </style>
</head>
<body>

    <div class="profile-container">
<div id="google_translate_element"></div>
        <div class="profile-header">
            <img src="<?php echo $row['anh_dai_dien']; ?>" alt="<?php echo $row['ho_ten']; ?>">
            <div class="contact-info">
                <h2><?php echo $row['ho_ten']; ?></h2>
                <p style="margin-top:-20px"><?php echo $row['chuc_danh']; ?></p>
<div class="contact-icons">
                <a href="tel:<?php echo $row['so_dien_thoai']; ?>" class="icon" title="Gọi điện"><i class="fas fa-phone-alt"></i></a>
                <a href="sms:<?php echo $row['so_dien_thoai']; ?>" class="icon" title="Nhắn tin"><i class="fas fa-comment-dots"></i></a>
                <a href="mailto:<?php echo $row['email']; ?>" class="icon" title="Gửi Email"><i class="fas fa-envelope"></i></a>
                <a href="https://maps.app.goo.gl/e6LkR1o2PNN1QWSq9" target="_blank" title="Địa Chỉ" class="icon"><i class="fas fa-map-marker-alt"></i></a>
                <a href="https://heyzine.com/flip-book/3073a3685f.html#page/20" class="icon" title="Thông Tin Chi Tiết" target="_blank"><i class="fas fa-user"></i></a></div>
       
            </div>
        </div>
<div class="contact-details">
                <h2>Liên Hệ</h2>
                <p><strong>Họ & Tên:</strong> <?php echo $row['ho_ten']; ?></p>
                <p><strong>Công Ty:</strong> <?php echo $row['cong_ty']; ?></p>
                <p><strong>Di động:</strong> <a href="tel:<?php echo $row['so_dien_thoai']; ?>"><?php echo $row['so_dien_thoai']; ?></a></p>
                <p><strong>Website:</strong> <a href="<?php echo $row['website']; ?>" target="_blank"><?php echo $row['website']; ?></a></p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></p>
            </div>

       <h2>Dịch Vụ Cung Cấp</h2>
<div class="services">
    <div class="service">
        <a href="link-tranh-tung.html">
            <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Tranh tụng">
            <p>Tranh tụng</p>
        </a>
    </div>
    <div class="service">
        <a href="link-tu-van-phap-ly.html">
            <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Tư vấn pháp lý">
            <p>Tư vấn pháp lý</p>
        </a>
    </div>
    <div class="service">
        <a href="link-tu-van-phap-ly.html">
            <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Tư vấn pháp lý">
            <p>Tư vấn pháp lý</p>
        </a>
    </div>
    <div class="service">
        <a href="link-tu-van-phap-ly.html">
            <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Tư vấn pháp lý">
            <p>Tư vấn pháp lý</p>
        </a>
    </div>
    <div class="service">
        <a href="link-ho-tro-giai-quyet-tranh-chap.html">
            <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Hỗ trợ giải quyết tranh chấp">
            <p>Hỗ trợ giải quyết tranh chấp</p>
        </a>
    </div>
</div>
               <h2>Địa Chỉ</h2>
            <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="500px" style="border:0; margin:0 auto;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       

        <footer>
            <p>Name card điện tử ứng dụng 1 chạm trong <br>quản lý công việc</p>
        </footer></div>
    </div> </div>
</body>
</html>