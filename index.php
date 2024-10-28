    <!-- index.php -->

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #navbar {
            background-color: #f8f9fa;
            padding: 10px 0;
        }
        #content {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- navbar start -->
        <?php include './navbar.php'; ?>
        <!-- navbar end -->

        <div id="content" class="my-5">
            <h1 class="text-center mt-3 mb-5">Bài Tập 7c - Truyền Nhận Dữ Liệu</h1>
            <div class="row">
                <div class="col-md-4 col-sm-12 mb-4">
                    <h5 class="card-title">Thông tin cá nhân</h5>
                    <ul>
                        <li><span class="fw-bold">Họ và tên:</span> Nguyễn Hoàng Hảo</li>
                        <li><span class="fw-bold">MSSV:</span> 21810206</li>
                        <li><span class="fw-bold">Email:</span> 21810206@student.hcmus.edu.vn</li>
                    </ul>
                    <p class="card-text" id="browserTime"><small class="text-body-secondary"></small></p>
                    <?php
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $currentDateTime = date('Y/m/d H:i:s');
                        echo "Host time (PHP): " . $currentDateTime;
                    ?>
                </div>

                <div class="col-md-8 col-sm-12">
                    <h5 class="text-center">Danh sách loại sản phẩm</h5>
                    <div class="list-group">
                        <?php
                            include './data.php'; // Nạp file data.php

                            // Duyệt mảng arrLoaiSP để tạo liên kết
                            if (isset($arrLoaiSP) && is_array($arrLoaiSP)) {
                                foreach ($arrLoaiSP as $loaiSP) {
                                    // Đảm bảo tên loại sản phẩm được mã hóa an toàn
                                    $encodedLoaiSP = urlencode($loaiSP);
                                    echo "<a href='./dssp_21810206.php?tenLoaiSP=$encodedLoaiSP' class='list-group-item list-group-item-action'>Giày bóng đá $loaiSP</a>";
                                }
                            } else {
                                echo "<p class='text-danger'>Không có loại sản phẩm nào.</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateDateTime() {
            const now = new Date();
            const day = String(now.getDate()).padStart(2, '0'); 
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const year = now.getFullYear();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const dateTimeString = `${year}/${month}/${day} ${hours}:${minutes}:${seconds}`;
            document.getElementById('browserTime').textContent = "Browser time: " + dateTimeString;
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
</body>
</html>
