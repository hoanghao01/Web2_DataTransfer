<!-- dssp_21810206.php -->
<?php 
    include './data.php'; // Nạp file data.php

    // Nhận dữ liệu tên loại sản phẩm từ URL
    if (isset($_GET['tenLoaiSP'])) {
        $tenLoaiSP = urldecode($_GET['tenLoaiSP']); // Giải mã tên loại sản phẩm
    } else {
        $tenLoaiSP = ''; // Nếu không có, gán rỗng
    }

    // Tạo một mảng chứa sản phẩm theo loại
    $filteredProducts = array_filter($arrDSSP, function($product) use ($tenLoaiSP) {
        return $product['LoaiSP'] === $tenLoaiSP; // Lọc sản phẩm theo loại
    });
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Danh Sách Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #content {
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
            <h1 class="text-center">Danh Sách Sản Phẩm: <?php echo htmlspecialchars($tenLoaiSP); ?></h1>
            <div class="row">
                <?php if (!empty($filteredProducts)): ?>
                    <?php foreach ($filteredProducts as $product): ?>
                        <div class="col-md-4 col-sm-12 mb-4">
                            <div class="card">
                                <img src="<?php echo htmlspecialchars($product['URL']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['TenSP']); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($product['TenSP']); ?></h5>
                                    <p class="card-text">Giá: <?php echo htmlspecialchars($product['GiaBan']); ?> VNĐ</p>
                                    <p class="card-text"><small class="text-muted">Loại: <?php echo htmlspecialchars($product['LoaiSP']); ?></small></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-danger">Không có sản phẩm nào thuộc loại này.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
