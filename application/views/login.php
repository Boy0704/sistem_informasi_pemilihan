<!DOCTYPE HTML>
<html lang="en">

<head>
    <base href="<?php echo base_url() ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Masuk</title>
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="front/styles/style.css">
    <link rel="stylesheet" type="text/css" href="front/styles/framework.css">
    <link rel="stylesheet" type="text/css" href="front/fonts/css/fontawesome-all.min.css">

</head>

<body class="theme-light" data-highlight="blue2">

    <div id="page-preloader">
        <div class="loader-main">
            <div class="preload-spinner border-highlight"></div>
        </div>
    </div>


    <div id="page">
        <div class="header header-fixed header-logo-app header-transparent">
            <a href="index.html" class="header-title color-white">Sign In</a>
            <a href="#" class="header-icon header-icon-1 color-white" data-back-button><i
                    class="fas fa-arrow-left"></i></a>
            <a href="#" class="header-icon header-icon-2 color-white"><i class="fas fa-info"></i></a>
        </div>

        <!-- Pendeteksi Internet -->
        <div id="menu-offline" class="menu menu-box-modal round-medium bg-gradasi">
            <div data-height="100%" class="caption">
                <div class="caption-center">
                    <h2 class="center-text color-theme bolder font-30">Internet Terputus</h2>
                    <p class="boxed-text-huge color-theme opacity-60 bottom-30 top-15">
                        Aplikasi ini membutuhkan koneksi internet. Periksa kembali data seluler atau wifi untuk
                        melanjutkan.
                    </p>
                </div>
            </div>
        </div>

        <div class="page-content-black"></div>
        <div class="page-content">
            <div class="cover-wrapper cover-no-buttons">
                <div data-height="cover" class="caption bottom-0">
                    <div class="caption-center">

                        <div class="left-50 right-50">
                            <h1 class="color-white center-text uppercase ultrabold fa-4x">MASUK</h1>
                            <p class="color-highlight center-text font-12 under-heading bottom-30 top-5">
                                Masuk untuk mengelola Pemilihanmu.
                            </p>
                            <form action="" method="post">
                            <div class="input-style input-light has-icon input-style-1 input-required">
                                <i class="input-icon fa fa-user font-11"></i>
                                <span>username</span>
                                <em>(wajib terisi)</em>
                                <input type="text" name="username" placeholder="Username">
                            </div>
                            <div class="input-style input-light has-icon input-style-1 input-required bottom-30">
                                <i class="input-icon fa fa-lock font-11"></i>
                                <span>Kata Sandi</span>
                                <em>(wajib terisi)</em>
                                <input type="password" name="password" placeholder="Kata Sandi">
                            </div>
                            <div class="one-half">
                                <a href="daftar-akun.html" class="font-11 color-white opacity-50">Daftar</a>
                            </div>
                            <div class="one-half last-column">
                                <a href="lupa-sandi.html" class="text-right font-11 color-white opacity-50">Lupa kata
                                    sandi</a>
                            </div>
                            <div class="clear"></div>
                            <button type="submit" class="button button-full button-m shadow-large button-round-small bg-highlight top-30 bottom-0">MASUK</button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="caption-overlay bg-black opacity-90"></div>
                <div class="caption-bg" style="background-image:url(front/images/pictures/29t.jpg)"></div>
            </div>
        </div>

        <div class="menu-hider"></div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript"><?php echo $this->session->userdata('message') ?></script>
    <script type="text/javascript" src="front/scripts/jquery.js"></script>
    <script type="text/javascript" src="front/scripts/plugins.js" async></script>
    <script type="text/javascript" src="front/scripts/custom.js" async></script>
</body>