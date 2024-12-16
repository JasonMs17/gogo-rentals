<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="../css/reset.css">

    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        @font-face {
            font-family: 'circular-std';
            src: url('/font/Circular-std-book.otf') format('woff2');
        }

        @font-face {
            font-family: 'Jacques Francois Shadow';
            src: url("/font/JacquesFrancoisShadow-Regular.ttf") format('woff2');
        }

        @font-face {
            font-family: 'ChakraPetch';
            src: url("/font/ChakraPetch-Regular.ttf") format('woff2');
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 45px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            z-index: 4;
            box-shadow: 0px 1px 5px 0.1px black;
            font-size: 15px;
            font-family: 'circular-std', sans-serif;
        }

        header .profile {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 22px;
            cursor: pointer;
        }

        header .profile img {
            margin-right: 15px;
        }

        header .menu {
            display: flex;
            text-align: center;
            margin-right: 2.5vw;
            color: white;
        }

        header .navbar-extra {
            display: none;
        }

        header .menu div {
            display: inline-block;
            margin-right: 5vw;
        }

        header .menu div:last-child {
            margin-right: 0;
        }

        header .menu div a:hover {
            transform: (1.5);
        }

        header .menu div a::after {
            content: "";
            display: block;
            padding-bottom: 2px;
            border-bottom: 2px solid black;
            transform: scaleX(0);
            transition: 0.2s linear;
        }

        header .menu div a:hover::after {
            transform: scaleX(0.8);
        }

        #hamburger-menu {
            display: none;
        }

        footer {
            width: 100%;
            background-color: #262626;
            display: flex;
            flex-direction: column;
            font-family: 'circular-std';
        }

        footer h3 {
            color: white;
            font-size: 20px;
            font-weight: 800;
        }

        footer .footer-atas {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: start;
            padding: 30px 100px;
            gap: 100px;
            flex-wrap: wrap;
        }

        footer .footer-atas p,
        footer .footer-atas a {
            color: white;
            font-size: 14px;
        }

        footer .footer-atas .judul {
            flex: 1;
            display: flex;
            align-self: center;
            justify-content: center;
            flex-direction: column;
            font-family: 'ChakraPetch';
        }

        footer .footer-atas .logo {
            width: 200px;
            margin: 0 auto;
        }

        footer .footer-atas h1 {
            font-size: 40px;
            color: white;
            text-align: center;
        }

        footer .footer-atas .location {
            display: flex;
            flex-direction: column;
            gap: 15px;
            flex: 1;
        }

        footer .footer-atas .location .peta {
            border-radius: 20px;
        }

        footer .footer-atas .contact {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        footer .footer-atas .contact .links {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        footer .footer-atas .contact .links .logo-sosmed {
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
        }

        footer .footer-bawah {
            height: 50px;
            width: 100%;
            background-color: #545454;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer .footer-bawah p {
            font-size: 14px;
            color: white;
            font-weight: 800;
        }

        /* #border-logo-twitter {
            border: 3px solid white;
            border-radius: 10px;
        } */

        @media only screen and (max-width: 1024px) {
            footer .footer-atas {
                text-align: center;
            }

            footer .judul {
                min-width: 100%;
            }

            footer .location {
                max-width: 50%;
            }

            footer .contact {
                max-width: 50%;
            }

            footer .footer-atas .location .peta {
                max-width: 100%;
                align-self: center;
            }

            footer .contact .links {
                padding-left: 60px;
            }
        }

        @media only screen and (max-width: 768px) {
            #hamburger-menu {
                margin-right: 20px;
                display: inline-block;
            }

            header .menu {
                position: absolute;
                top: 100%;
                right: -100%;
                background-color: #fff;
                width: 200px;
                height: 100vh;
                transition: 0.3s;
                flex-direction: column;
                justify-content: right;
                box-shadow: -1px 0 2px 0 black;
                text-align: left;
            }

            header .menu div a::after {
                transform-origin: 0 0;
            }

            header .menu div a:hover::after {
                transform: scaleX(0.6);
            }

            header .navbar-extra {
                display: block;
            }

            header .menu.active {
                right: -5%;
            }

            header .menu div {
                display: block;
                margin: 20px 30px;
                padding: 0;
            }

            footer .footer-atas .location {
                min-width: 100%;
                justify-content: center;
            }

            footer .footer-atas .contact {
                min-width: 100%;
            }
        }

        @media only screen and (max-width: 500px) {
            footer .footer-atas {
                justify-content: center;
                align-items: center;
                text-align: center;
                gap: 50px;
            }

            footer .contact .links {
                padding-left: 0px;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="profile">
            <?php if (!session()->has('isLoggedIn')) : ?>
                <a href="<?= base_url('/login'); ?>">
                    <img src="../Src/Icon/profile_icon.svg" alt="Profile Icon" id="icon">
                </a>
            <?php else : ?>
                <a href="<?= base_url('/profile') ?>">
                    <img src="../Src/Icon/profile_icon.svg" alt="Profile Icon" id="icon">
                </a>
            <?php endif ?>

            <?php if (!session()->has('nama_lengkap')) : ?>
                <label> <?= "Guest" ?> </label>
            <?php else : ?>
                <label> <?= session()->get('nama_lengkap'); ?> </label>
            <?php endif ?>
        </div>
        </div>
        <div class="menu">
            <?php if (session()->get('level') == 2) : ?>
                <div><a href="<?= base_url('/admin/dashboard'); ?>">Dashboard</a></div>
                <div><a href="<?= base_url('/admin/booking') ?>">Data Booking</a></div>
                <div><a href="<?= base_url('/admin/users'); ?>">Data User</a></div>
                <div><a href="<?= base_url('/admin/kendaraan') ?>">Data Kendaraan</a></div>
            <?php else : ?>
                <div><a href="<?= base_url('/halamanUtama'); ?>">Home</a></div>

                <?php if (session()->get('isLoggedIn')) : ?>
                    <div class="my-booking"><a href="<?= base_url('/myBooking'); ?>">My Booking</a></div>
                <?php endif ?>

                <div><a href="<?= base_url('/browse') ?>">Browse</a></div>
                <div><a href="<?= base_url('/about') ?>">About</a></div>
            <?php endif ?>
        </div>
        <div class="navbar-extra">
            <div class="hamburger-menu"><a href="#" id="hamburger-menu"><i data-feather="menu"></i></a></div>
        </div>
    </header>

    <?= $this->renderSection('content'); ?>

    <?php if (!isset($hideFooter) || !$hideFooter) : ?>
        <footer>
            <div class="footer-atas">
                <div class="judul">
                    <img src="../img/logo.png" class="logo" alt="logo">
                    <h1>Gogo Rentals</h1>
                </div>
                <div class="location">
                    <h3>Location</h3>
                    <iframe class="peta" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10867.694720234107!2d107.77398633274608!3d-6.925908300955144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e653eb17e239%3A0xc6192a1f92aa9e41!2sPadjadjaran%20University!5e0!3m2!1sen!2sid!4v1700803913670!5m2!1sen!2sid" width="320" height="200" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p>Jl. Raya Bandung Sumedang KM.21, Hegarmanah, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363</p>
                </div>
                <div class="contact">
                    <h3>Contact Us</h3>
                    <div class="links">
                        <div class="logo-sosmed" id="logo-instagram">
                            <img src="../Src/Icon/instagram.svg" alt="instagram">
                            <a href="#">@gogorentals</a>
                        </div>
                        <div class="logo-sosmed" id="logo-twitter">
                            <img id="border-logo-twitter" src="../Src/Icon/twitter.svg" alt="twitter">
                            <a href="#">gogo.rentals</a>
                        </div>
                        <div class="logo-sosmed" id="logo-whatsapp">
                            <img src="../Src/Icon/whatsapp.svg" alt="whatsapp">
                            <a href="#">08123456789</a>
                        </div>
                        <div class="logo-sosmed" id="logo-facebook">
                            <img src="../Src/Icon/facebook.svg" alt="facebook">
                            <a href="#">gogo.rentals</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bawah">
                <p>Created By Gogo Rentals Team</p>
            </div>
        </footer>
    <?php endif; ?>

    <script>
        feather.replace();
    </script>

    <script src="<?= base_url('js/hamburger-menu.js') ?>"></script>
</body>

</html>