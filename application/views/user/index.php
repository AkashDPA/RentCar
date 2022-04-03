<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $page_title ?> | <?= SYSTEM_NAME ?> </title>

    <!-- css -->
    <?php require(APPPATH . 'views/components/includes_top.php') ?>

</head>

<body class="">
    <div class="navbar_container">
        <?php require('user_navbar.php'); ?>
    </div>

    <div class="page_container my-3">
        <?php require($page_name . '.php'); ?>
    </div>

    <div class="footer_container">
        <?php require(APPPATH . 'views/footer.php'); ?>
    </div>

    <!-- js -->
    <?php require(APPPATH . 'views/components/includes_bottom.php') ?>
</body>

</html>