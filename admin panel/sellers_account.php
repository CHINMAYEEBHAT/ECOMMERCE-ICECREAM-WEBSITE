<?php
include '../components/connect.php';

if (isset($_COOKIE['seller_id'])) {
    $seller_id = $_COOKIE['seller_id'];
} else {
    $seller_id = '';
    header('location:login.php');
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chocolat Royal - registered sellers page</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <!--font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="user-container">
            <div class="heading">
                <h1>registered sellers</h1>
                <img src="../image/separator-img.png">
            </div>
            <div class="box-container">
                <?php
                $select_sellers = $conn->prepare("SELECT * FROM `sellers`");
                $select_sellers->execute();
                if ($select_sellers->rowCount() > 0) {
                    while ($fetch_sellers = $select_sellers->fetch(PDO::FETCH_ASSOC)) {
                        $seller_id = $fetch_sellers['id'];
                ?>
                    <div class="box">
                        <img src="../uploaded_files/<?= $fetch_sellers['image']; ?>">
                        <p>seller id: <span><?= $seller_id; ?></span></p>
                        <p>seller name : <span><?= $fetch_sellers['name']; ?></span></p>
                        <p>seller email: <span><?= $fetch_sellers['email']; ?></span></p>
                    </div>
                <?php
                    }
                } else {
                    echo '
                            <div class="empty">
                                <p>no seller registered yet!</p>
                            </div>
                        ';
                }

                ?>

            </div>
        </section>
    </div>


    <!-- sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- custom js link -->
    <script src="../js/admin_script.js"></script>
    <?php include '../components/alert.php'; ?>
</body>

</html>