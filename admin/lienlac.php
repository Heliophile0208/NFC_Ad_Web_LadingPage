<?php
    $servername = "localhost"; // Tên máy chủ cơ sở dữ liệu
    $username = "qkvnxkeshosting_luatsu";        // Tên người dùng cơ sở dữ liệu
    $password = "Khanh@123";            // Mật khẩu của người dùng cơ sở dữ liệu
    $dbname = "qkvnxkeshosting_luatsu"; // Tên cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Lọc dữ liệu 
$search_name = isset($_GET['search_name']) ? $_GET['search_name'] : '';
$search_phone = isset($_GET['search_phone']) ? $_GET['search_phone'] : '';

// Xây dựng câu truy vấn SQL
$sql = "SELECT id, name, email, phone, message, created_at FROM contacts WHERE 1=1";

// Lọc theo tên
if ($search_name !== '') {
    $sql .= " AND name LIKE '%" . $conn->real_escape_string($search_name) . "%'";
}

// Lọc theo số điện thoại
if ($search_phone !== '') {
    $sql .= " AND phone LIKE '%" . $conn->real_escape_string($search_phone) . "%'";
}

// Thực thi câu truy vấn
$result = $conn->query($sql);

$conn->close();

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Đăng ký</title>
    <style>
        @media (max-width: 480px) {
            .filter-form {
                display: flex;
                flex-wrap: nowrap;
                gap: 5px;
                overflow-x: auto;
                padding-bottom: 10px;
            }

            .filter-form div {
                flex: 0 0 auto;
                min-width: 70px;
            }

            .filter-form input,
            .filter-form button {
                width: 50%;
                font-size: 14px;
                padding-right: -10px;
            }

            .print {
                display: none;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            table th, table td {
                font-size: 12px;
                padding: 5px;
            }

            tr:hover {
                background-color: #f1f1f1;
            }
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f7fb;
            color: #333;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .filter-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-form label {
            margin-right: 10px;
        }

        .filter-form input {
            padding: 5px;
            font-size: 14px;
            margin-right: 10px;
        }

        .filter-form button {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .filter-form button:hover {
            background-color: #0056b3;
        }

        .print {
            text-align: right;
        }

        .print-btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .print-btn:hover {
            background-color: #218838;
        }

        @media print {
            @page {
                size: landscape;
                margin: 0;
            }

            body {
                margin: 0;
                padding: 0;
            }

            h1 {
                margin-bottom: 10px;
            }

            .filter-form, .print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <h1>Danh sách Đăng ký</h1>

    <!-- Form lọc -->
    <div class="filter-form">
        <form method="GET" style="display: flex; align-items: center;">
            <div>
                <label for="search_name">Tên:</label>
                <input type="text" name="search_name" id="search_name" value="<?= htmlspecialchars($search_name) ?>">
            </div>
            <div>
                <label for="search_phone">Số điện thoại:</label>
                <input type="text" name="search_phone" id="search_phone" value="<?= htmlspecialchars($search_phone) ?>">
            </div>
            <button type="submit">Lọc</button>
        </form>
        <div class="print">
            <button class="print-btn" onclick="printPage()">In Trang</button>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Nội dung</th>
                <th>Ngày đăng ký</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $stt = 1; // Biến STT bắt đầu từ 1
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $stt++ . "</td>";  // Hiển thị STT tự động
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Chưa có dữ liệu</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php $conn->close(); ?>

    <script>
        function printPage() {
            document.querySelector('.print-btn').style.display = 'none';
            window.print();
        }

        window.onbeforeprint = function () {
            document.querySelector('.print-btn').style.display = 'none';
        };

        window.onafterprint = function () {
            document.querySelector('.print-btn').style.display = 'block';
        };
    </script>
</body>

</html>
