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
        <title>Thông Tin </title>

        <!-- Google Translate Script -->
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

        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
/* Tổng quát */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
    color: #333;
height:650px
}

/* Phân trang */
.page {
    display: none;
    padding: 20px;
height:650px;
}

.page.active {
    display: block;
}

/* Thông tin luật sư */
.profile-card {
    max-width: 100%
    margin: 20px auto;
    background: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    height:650px
}

.profile-header {
    text-align: center;
    padding: 20px;
    background: #004085;
    color: #fff;
}

.profile-header .profile-photo {
    width: 120px;
    height: 120px;
    border-radius: 100%;
    border: 4px solid #fff;
    margin-bottom: 15px;
}

.profile-header h2 {
    font-size: 1.5em;
    margin: 10px 0;
}

.profile-header p {
    font-size: 1.1em;
    margin: 0;
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
}

.contact-details {
    padding: 15px;
}

.contact-details h3 {
    font-size: 1.2em;
    margin-bottom: 10px;
}

.contact-details p {
    border-bottom: 1px dashed #ccc; /* Đường kẻ nét đứt */
    padding-bottom: 10px; /* Khoảng cách giữa văn bản và đường kẻ */
    margin-bottom: 10px; /* Khoảng cách giữa các dòng */
}

.contact-details p a {
    color: #007bff;
    text-decoration: none;
}

.contact-details p a:hover {
    text-decoration: underline;
}

/* Trang 2: Dịch vụ chính */
.trang2 {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: center;
    width:100%;
}

.dichvu {
    width: 150px;
    text-align: center;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.dichvu img {
    width: 80px;
    height: 80px;
    margin-bottom: 10px;
}

.dichvu p {
    margin: 0;
    font-size: 0.9em;
    font-weight: bold;
}

/* Trang 3: Bản đồ */
.map-container {
    text-align: center;
    margin-bottom: 20px;
}

.map-container iframe {
    border: none;
    border-radius: 8px;
}

/* Nút phân trang */

/* Điều chỉnh vị trí của các nút phân trang */
.pagination {
    display: flex;
    justify-content: center;
    margin: 0; /* Xóa bỏ margin không cần thiết */
}

/* Nút phân trang */
.pagination-btn {
    background: transparent;
color: transparent;
    border: none;
    padding: 10px 20px;
    font-size: 1em;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 5px;
    position: fixed; /* Đặt nút phân trang cố định */
    top: 0; /* Đặt nút ở vị trí trên cùng */
    bottom: 0; /* Đặt nút ở vị trí dưới cùng */
    height: 670px; 
    z-index: 1000;
}

/* Nút phân trang trái */
#prev {
    left: 0; /* Đặt nút phân trang trái ở phía trái */
}

/* Nút phân trang phải */
#next {
    right: 0; /* Đặt nút phân trang phải ở phía phải */
}

/* Nút phân trang khi hover */
.pagination-btn:hover {
    background: transparent;
}

/* Nút phân trang khi bị vô hiệu hóa */
.pagination-btn:disabled {
    background: transparent;
    cursor: not-allowed;
}
/* Nút phân trang trái */
#prev {
    left: 10px; /* Đặt nút phân trang trái ở phía trái */
}

/* Nút phân trang phải */
#next {
    right: 10px; /* Đặt nút phân trang phải ở phía phải */
}


/* Google Translate */
#google_translate_element {
    text-align: center;
    margin: 15px 0;
}
h2 {
text-align:center}
</style> 
</head>

    <body>

      
            <!-- Trang 1: Thông tin luật sư -->
            <div id="page-1" class="page active">

                <div class="profile-card">
                    <div class="profile-header">
                        <img src="<?php echo $row['anh_dai_dien']; ?>" alt="<?php echo $row['ho_ten']; ?>" class="profile-photo">
                        <h2><?php echo $row['ho_ten']; ?></h2>
                        <p><?php echo $row['chuc_danh']; ?></p>
                    </div>
                    <div class="contact-icons">
                        <a href="tel:<?php echo $row['so_dien_thoai']; ?>" class="icon" title="Gọi điện"><i class="fas fa-phone-alt"></i></a>
                        <a href="sms:<?php echo $row['so_dien_thoai']; ?>" class="icon" title="Nhắn tin"><i class="fas fa-comment-dots"></i></a>
                        <a href="mailto:<?php echo $row['email']; ?>" class="icon" title="Gửi Email"><i class="fas fa-envelope"></i></a>
                        <a href="https://maps.app.goo.gl/e6LkR1o2PNN1QWSq9" target="_blank" title="Địa Chỉ" class="icon"><i class="fas fa-map-marker-alt"></i></a>
                        <a href="https://heyzine.com/flip-book/3073a3685f.html#page/20" class="icon" title="Thông Tin Chi TIết" target="_blank"><i class="fas fa-user"></i></a>
                    </div>
                    <div class="contact-details">
                        <h3><i class="fas fa-address-book"></i>&nbsp;Liên Hệ:</h3>
                        <p><strong>Họ & Tên:</strong> <?php echo $row['ho_ten']; ?></p>
                        <p><strong>Công Ty:</strong> <?php echo $row['cong_ty']; ?></p>
                        <p><strong>Di động:</strong> <a href="tel:<?php echo $row['so_dien_thoai']; ?>"><?php echo $row['so_dien_thoai']; ?></a></p>
                        <p><strong>Website:</strong> <a href="<?php echo $row['website']; ?>" target="_blank"><?php echo $row['website']; ?></a></p>
                        <p><strong>Mail:</strong> <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></p>
                    </div>
                </div>
            </div>

            <!-- Trang 2: Dịch vụ chính  -->

<div id="page-2" class="page">
    <h2>Dịch vụ chính</h2>
    <div class="trang2">
        <div class="dichvu">
            <a href="link-tranh-tung.html">
                <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ tranh tụng pháp lý">
                <p>Tranh tụng</p>
            </a>
        </div>
        <div class="dichvu">
            <a href="link-tu-van-phap-luat.html">
                <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ tư vấn pháp luật">
                <p>Tư vấn pháp luật</p>
            </a>
        </div>
        <div class="dichvu">
            <a href="link-tu-van-so-huu-tri-tue.html">
                <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ tư vấn sở hữu trí tuệ">
                <p>Tư vấn sở hữu trí tuệ</p>
            </a>
        </div>
        <div class="dichvu">
            <a href="link-hon-nhan-gia-dinh.html">
                <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ hôn nhân gia đình">
                <p>Hôn nhân gia đình</p>
            </a>
        </div>
        <div class="dichvu">
            <a href="link-tu-van-dau-tu.html">
                <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ tư vấn đầu tư">
                <p>Tư vấn đầu tư</p>
            </a>
        </div>
        <div class="dichvu">
            <a href="link-dao-tao-phap-ly.html">
                <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ đào tạo pháp lý">
                <p>Đào tạo pháp lý</p>
            </a>
        </div>
        <div class="dichvu">
            <a href="link-doanh-nghiep.html">
                <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ doanh nghiệp">
                <p>Doanh nghiệp</p>
            </a>
        </div>
        <div class="dichvu">
            <a href="link-dieu-tra.html">
                <img src="https://cdn-icons-png.flaticon.com/512/12142/12142168.png" alt="Dịch vụ điều tra">
                <p>Điều tra</p>
            </a>
        </div>
    </div>
</div>



            <!-- Trang 3: Chào mừng -->
<div id="page-3" class="page">
    <div class="map-container">
<h2 style="margin-top:10px">Địa chỉ</h2>
        <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    

    <p style="color:red; padding: 5px; font-weight:bold; text-align:center">Name card điện tử ứng dụng 1 chạm trong <br>quản lý công việc</p>
</div>



            <!-- Nút phân trang -->
            <div id="google_translate_element"></div>
            <div class="pagination">
                <button id="prev" onclick="changePage(-1)" class="pagination-btn">
                    <i class="fas fa-arrow-left"></i> <!-- Mũi tên trái -->
                </button>
                <button id="next" onclick="changePage(1)" class="pagination-btn">
                    <i class="fas fa-arrow-right"></i> <!-- Mũi tên phải -->
                </button>
            </div>

   

        <script>

let currentPage = 1; // Biến theo dõi trang hiện tại

function changePage(direction) {
    const pages = document.querySelectorAll('.page'); // Chọn tất cả các trang
    const totalPages = pages.length;

    // Loại bỏ lớp "active" của trang hiện tại
    pages[currentPage - 1].classList.remove('active');

    // Cập nhật trang hiện tại
    currentPage += direction;

    // Kiểm tra giới hạn trang (không cho qua các trang ngoài phạm vi)
    if (currentPage < 1) {
        currentPage = totalPages;
    } else if (currentPage > totalPages) {
        currentPage = 1;
    }

    // Thêm lớp "active" cho trang mới
    pages[currentPage - 1].classList.add('active');
}

// Thiết lập để trang đầu tiên được hiển thị
document.addEventListener('DOMContentLoaded', () => {
    changePage(0); // Đảm bảo rằng trang đầu tiên được hiển thị khi tải trang
});

</script>
    </body>

    </html>