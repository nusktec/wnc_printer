<?php
/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * header_style.php
 * 12:01 PM | 2019 | 12
 **/
?>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><? echo APP_SLOG . " | " . @$title; ?></title>
    <meta content="<? echo APP_DESC; ?>" name="description"/>
    <meta content="<? echo APP_AUTHOR; ?>" name="author"/>
    <link rel="shortcut icon" href="<? echo base_url() ?>assets/images/favicon.png?<? echo rand(111, 999); ?>">

    <!-- Bootstrap rating css -->
    <link href="<? echo base_url() ?>plugins/bootstrap-rating/bootstrap-rating.css?<? echo rand(111, 999); ?>"
          rel="stylesheet" type="text/css">

    <link href="<? echo base_url() ?>assets/css/bootstrap.min.css?<? echo rand(111, 999); ?>" rel="stylesheet"
          type="text/css">
    <link href="<? echo base_url() ?>assets/css/metismenu.min.css?<? echo rand(111, 999); ?>" rel="stylesheet"
          type="text/css">
    <link href="<? echo base_url() ?>assets/css/icons.css?<? echo rand(111, 999); ?>" rel="stylesheet" type="text/css">
    <link href="<? echo base_url() ?>assets/css/style.css?<? echo rand(111, 999); ?>" rel="stylesheet" type="text/css">

</head>
