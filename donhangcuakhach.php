<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore Đơn hàng</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome/css/all.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <!-- Header -->
    <?php include './hienidnguoidung.php'; ?>
    <div class="menu">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="image/logo.png" alt="..." width="100px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                        </li>
                        <?php
                        include 'connect_db.php';
                        if (isset($_SESSION['user'])) {
                            $user = $_SESSION['user'];
                            $query = mysqli_query($con, "SELECT * FROM user WHERE username = '$user'");
                            if (mysqli_num_rows($query) > 0) {
                                $result = mysqli_fetch_assoc($query);
                                // Chi co trang thai status la 0 thi moi hiện trang admin
                                if (isset($result['status']) && $result['status'] == 0) {
                        ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin.php">Quản trị</a>
                                    </li>
                        <?php }
                            }
                        } ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thể Loại</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                $sql = mysqli_query($con, "SELECT * FROM category");
                                if (mysqli_num_rows($sql) > 0) {
                                    while ($category = mysqli_fetch_array($sql)) {
                                ?>
                                        <li><a class="dropdown-item" href="./index.php?theloai=<?= $category['id_category'] ?>"><?= $category['category_name'] ?></a></li>
                                <?php }
                                } ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" method="GET" action="./index.php">
                        <input class="form-control me-2" name="text" type="Search" placeholder="Search" aria-label="Search" value="<?= isset($_GET['text']) ? $_GET['text'] : ""; ?>">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <ul class="navbar-nav px-3">
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <li class="nav-item text-nowrap">
                            <a class="nav-link" href="checkusergiohang.php"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user"></i> <?= $_SESSION['user']; ?></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./donhangcuakhach.php">Thông tin đơn hàng</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="dangxuat.php"><i class="fas fa-sign-out-alt"> </i>Đăng Xuất</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item text-nowrap">
                            <a class="nav-link" id="login2" href="#"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                        </li>
                        <li class="nav-item text-nowrap">
                            <!-- Nếu chưa đăng nhập thì hiển thị nút Đăng nhập -->
                            <a class="nav-link" href="dangkyvadangnhap.php">Đăng nhập</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End header -->
    <!-- Hien don hang khach hang  -->
    <div class="container listdonhang" id="listdonhang">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">Mã đơn hàng</th>
                    <th scope="col" style="width: 20%;">Tên khách hàng</th>
                    <th scope="col" style="width: 10%;">Số điện thoại</th>
                    <th scope="col" style="width: 25%;">Địa chỉ</th>
                    <th scope="col" style="width: 20%;">Ghi chú</th>
                    <th scope="col" style="width: 15%;">Tổng tiền</th>
                    <th scope="col" style="width: 10%;">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Chaien</td>
                    <td>Otto</td>
                    <td>@short</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Chaien</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Thornton</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Chaien</td>
                    <td>Jacob</td>
                    <td>@twitter</td>
                    <td>Jacob</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Chaien</td>
                    <td>Otto</td>
                    <td>@short</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Chaien</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Thornton</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Chaien</td>
                    <td>Jacob</td>
                    <td>@twitter</td>
                    <td>Jacob</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Chaien</td>
                    <td>Otto</td>
                    <td>@short</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Chaien</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Thornton</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Chaien</td>
                    <td>Jacob</td>
                    <td>@twitter</td>
                    <td>Jacob</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Chaien</td>
                    <td>Otto</td>
                    <td>@short</td>
                    <td>Otto</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Chaien</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Thornton</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Chaien</td>
                    <td>Jacob</td>
                    <td>@twitter</td>
                    <td>Jacob</td>
                    <td>Otto</td>
                    <td>Otto</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- End don hang khach hang-->
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>