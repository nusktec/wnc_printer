<?php
/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * dashboard.php
 * 1:03 AM | 2019 | 12
 **/
?>
<!DOCTYPE html>
<html lang="en">

<? include __DIR__ . "/../common/header_style.php" ?>

<body>

<div class="header-bg">
    <!-- Navigation Bar-->
    <? include __DIR__ . "/../common/nav.php" ?>
    <!-- End Navigation Bar-->

</div>
<!-- header-bg -->

<div class="wrapper">
    <? echo @$contents; ?>
    <!-- end container-fluid -->
</div>
<!-- end wrapper -->

<!-- Footer -->
<? include __DIR__ . "/../common/footer.php" ?>
<!-- End Footer -->

<!-- jQuery  -->
<? include __DIR__ . "/../common/footer_script.php" ?>
</body>

</html>
