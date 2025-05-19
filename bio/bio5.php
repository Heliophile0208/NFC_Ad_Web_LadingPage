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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <title>Thông Tin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            margin: 0;
            padding: 0;
            color: #333;
        }
        #google_translate_element {
    text-align: center;
    margin: 15px 0;
}
        .button {
            display: inline-block;
            margin: 10px;
            padding: 10px 10px;
            background-color: #4A90E2;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
        /* Modal */
/* Modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    width: 80%;
    max-width: 500px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin: 0 auto 20px;
        }
        .profile-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .profile-title {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }
        .icon-container {
            margin: 20px 0;
        }
        .icon-container a {
            margin: 0 10px;
            color: #4A90E2;
            font-size: 24px;
            transition: color 0.3s ease;
            text-decoration: none;
        }
        .icon-container a:hover {
            color: #0056b3;
        }
        .services {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .service {
            width: 30%;
            text-align: center;
            margin-bottom: 20px;
        }
        .service img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }
        .service p {
            font-size: 14px;
            color: #333;
        }
    </style>
        <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'vi',
                includedLanguages: 'en,vi',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: true,
            }, 'google_translate_element');
        }</script>
</head>
<body>

<div class="container">
<div id="google_translate_element"></div>
    <img src="<?php echo $row['anh_dai_dien']; ?>" alt="<?php echo $row['ho_ten']; ?>" class="profile-img">
    <div class="profile-name"><?php echo $row['ho_ten']; ?></div>
    <div class="profile-title"><?php echo $row['chuc_danh']; ?></div>
    
    <div class="icon-container">
        <a href="tel:<?php echo $row['so_dien_thoai']; ?>" title="Gọi điện"><i class="fas fa-phone-alt"></i></a>
        <a href="mailto:<?php echo $row['email']; ?>" title="Gửi Email"><i class="fas fa-envelope"></i></a>
        <a href="<?php echo $row['website']; ?>" target="_blank" title="Website"><i class="fas fa-globe"></i></a>
        <a href="https://maps.google.com/?q=<?php echo urlencode($row['dia_chi']); ?>" target="_blank" title="Địa chỉ"><i class="fas fa-map-marker-alt"></i></a>
        <a href="link-to-service-details.html" target="_blank" title="Chi tiết dịch vụ"><i class="fas fa-info-circle"></i></a>
    </div>
    <div>
        <a class="button" onclick="openModal('modal1')">Liên Hệ</a>
        <a class="button" onclick="openModal('modal2')">Dịch Vụ</a>
        <a class="button" onclick="openModal('modal3')">Địa Chỉ</a> <!-- Nút mở modal địa chỉ -->
    </div>
</div>

<!-- Modal 1: Thông Tin Liên Hệ -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal1')">&times;</span>
        <h3>Thông Tin Liên Hệ</h3>
        <p><strong>Họ & Tên:</strong> <?php echo $row['ho_ten']; ?></p>
        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
        <p><strong>Số Điện Thoại:</strong> <?php echo $row['so_dien_thoai']; ?></p>
        <p><strong>Công Ty:</strong> <?php echo $row['cong_ty']; ?></p>
    </div>
</div>

<!-- Modal 2: Dịch Vụ Cung Cấp -->
<div id="modal2" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal2')">&times;</span>
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
                <a href="link-ho-tro-giai-quyet-tranh-chap.html">
                    <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Hỗ trợ giải quyết tranh chấp">
                    <p>Hỗ trợ giải quyết tranh chấp</p>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal 3: Địa Chỉ -->
<div id="modal3" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('modal3')">&times;</span>
        <h3>Địa Chỉ</h3>
        <p><?php echo $row['dia_chi']; ?></p>
        <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="400px" style="border:0; margin:0 auto;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       
    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'block';
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    window.onclick = function(event) {
        var modals = document.getElementsByClassName('modal');
        for (var i = 0; i < modals.length; i++) {
            if (event.target == modals[i]) {
                modals[i].style.display = 'none';
            }
        }
    }
</script>

</body>
</html>