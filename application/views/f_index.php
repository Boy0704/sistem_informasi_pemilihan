<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title><?php echo $judul_page; ?> | Sistem Informasi Pemilihan</title>
    <base href="<?php echo base_url() ?>">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="front/styles/style.css">
    <link rel="stylesheet" type="text/css" href="front/styles/framework.css">
    <link rel="stylesheet" type="text/css" href="front/fonts/css/fontawesome-all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    
</head>

<body class="theme-light" data-highlight="blue2">

    <div id="page-preloader">
        <div class="loader-main">
            <div class="preload-spinner border-highlight"></div>
        </div>
    </div>


    <?php $this->load->view($konten); ?>

    
</body>

    <script type="text/javascript"><?php echo $this->session->userdata('message') ?></script>
    <script type="text/javascript" src="front/scripts/jquery.js"></script>
    <script type="text/javascript" src="front/scripts/plugins.js" ></script>
    <script type="text/javascript" src="front/scripts/custom.js" ></script>
</html>