<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>Selamat Datang | e-VBS</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="lp/lp/assets/images/favicon.png" type="image/png">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="lp/lp/assets/css/slick.css">
        
    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="lp/lp/assets/css/font-awesome.min.css">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="lp/lp/assets/css/LineIcons.css">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="lp/lp/assets/css/animate.css">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="lp/lp/assets/css/magnific-popup.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="lp/lp/assets/css/bootstrap.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="lp/lp/assets/css/default.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="lp/lp/assets/css/style.css">
    
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
   
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="navbar-area headroom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="">
                                <img src="lp/lp/assets/images/logojpn.jpg" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a href="#home">Laman Utama</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#rules">Peraturan Dan Syarat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#step">Tatatcara Penggunaan Sistem</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#contact">Hubungi Kami</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                            @if (Route::has('login')) 
                            <div class="navbar-btn d-none d-sm-inline-block">
                                @auth
                                <a href="{{ url('/dashboard') }}" class="main-btn">Dashboard</a>
                                @else
                                <a class="main-btn" href="{{ route('login') }}">Log Masuk</a>
                            </div>
                                @endauth
                                @endif
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        
        <div id="home" class="header-hero bg_cover d-lg-flex align-items-center" style="background-image: url(lp/lp/assets/images/header-hero.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-hero-content">
                            <h1 class="hero-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"><b>Selamat Datang</b> <span>Ke Vehicle Booking System</span><b></b></h1>
                            <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">Sistem Tempahan Kenderaan merupakan inisiatif Jabatan Pendidikan Negeri Melaka untuk memudahkan pengguna memohon menggunakan kenderaan Jabatan dengan syarat dan peraturan yang telah ditetapkan.Sistem ini akan memudahkan pemohon untuk memohon tempahan kenderaan secara atas talian.Keputusan tempahan bergantung kepada kekosongan kenderaan dengan memenuhi syarat tertentu. Pemohon akan diberikan Tempahan ID untuk tujuan semakan status permohonan dan boleh dicetak bagi memudahkan kegunaan secara manual.</p>
                            <div class="header-singup wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">
                                
                            </div>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-hero-image d-flex align-items-center wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="1.1s">
                <div class="image">
                    <img src="lp/lp/assets/images/vehicle.jpg" alt="">
                </div>
            </div> <!-- header hero image -->
        </div> <!-- header hero -->
    </header>
    <!--====== HEADER PART ENDS ======-->
    
    <!--====== RULES GALLERY PART START ======-->

    <section id="rules" class="project-masonry-area pt-115">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-4">
                    <div class="section-title pb-20  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                        <h6 class="sub-title">Peraturan Dan Syarat Untuk Pemohononan Tempahan Kenderaan Jabatan</h6>
                        <h4 class="title">Sila Baca dan Teliti <span>Sebelum Memohon .</span></h4>
                    </div> <!-- section title -->
                </div>
                <div class="col-lg-8">
                    <div class="project-menu text-center text-sm-left text-lg-right pb-20">
                        <ul>
                            <li class="active" data-filter="*"></li>
                            <li data-filter=".apps"></li>
                            <li data-filter=".branding"></li>
                            <li data-filter=".creative"></li>
                            <li data-filter=".laptop"></li>
                            <li data-filter=".product"></li>
                        </ul>
                    </div> <!-- project menu -->
                </div>
            </div> <!-- row -->
            <div class="row grid">
                <div class="col-lg-4 col-sm-6 grid-item apps creative laptop">
                    <div class="single-gallery gallery-masonry mt-30">
                        <div class="gallery-image">
                            <img src="lp/lp/assets/images/page1.png" alt="protfolio">
                        </div>
                        <div class="gallery-icon">
                            <a class="image-popup" href="lp/lp/assets/images/page1.png">
                                <span></span>
                            </a>
                        </div>
                    </div> <!-- single gallery -->
                </div>
                <div class="col-lg-4 col-sm-6 grid-item branding creative">
                    <div class="single-gallery gallery-masonry mt-30">
                        <div class="gallery-image">
                            <img src="lp/lp/assets/images/page2.png" alt="Halaman Kedua">
                        </div>
                        <div class="gallery-icon">
                            <a class="image-popup" href="lp/lp/assets/images/page2.png">
                                <span></span>
                            </a>
                        </div>
                    </div> <!-- single gallery -->
                </div>
                <div class="col-lg-4 col-sm-6 grid-item apps branding product">
                    <div class="single-gallery gallery-masonry mt-30">
                        <div class="gallery-image">
                            <img src="lp/lp/assets/images/page3.png" alt="Halaman Ketiga">
                        </div>
                        <div class="gallery-icon">
                            <a class="image-popup" href="lp/lp/assets/images/page3.png">
                                <span></span>
                            </a>
                        </div>
                    </div> <!-- single gallery -->
                </div>
                <div class="col-lg-4 col-sm-6 grid-item laptop product">
                    <div class="single-gallery gallery-masonry mt-30">
                        <div class="gallery-image">
                            <img src="lp/lp/assets/images/page4.png" alt="Halaman Keempat">
                        </div>
                        <div class="gallery-icon">
                            <a class="image-popup" href="lp/lp/assets/images/page4.png">
                                <span></span>
                            </a>
                        </div>
                    </div> <!-- single gallery -->
                </div>
                <div class="col-lg-4 col-sm-6 grid-item branding creative">
                    <div class="single-gallery gallery-masonry mt-30">
                        <div class="gallery-image">
                            <img src="lp/lp/assets/images/page5.png" alt="Halaman Kelima">
                        </div>
                        <div class="gallery-icon">
                            <a class="image-popup" href="lp/lp/assets/images/page5.png">
                                <span></span>
                            </a>
                        </div>
                    </div> <!-- single gallery -->
                </div>
                <div class="col-lg-4 col-sm-6 grid-item apps laptop product">
                    <div class="single-gallery gallery-masonry mt-30">
                        <div class="gallery-image">
                            <img src="lp/lp/assets/images/page6.png" alt="Halaman Keenam">
                        </div>
                        <div class="gallery-icon">
                            <a class="image-popup" href="lp/lp/assets/images/page6.png">
                                <span></span>
                            </a>
                        </div>
                    </div> <!-- single gallery -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="gallery-btn mt-60 text-center">
                        <a class="main-btn" href="{{ asset('/storage/PERATURAN PERMOHONAN MENGGUNAKAN KENDERAAN JABATAN.pdf')}}" target="_blank">Muat Turun Dokumen</a>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== RULES GALLERY PART ENDS ======-->
    
    <!--====== STEP PART START ======-->
    
    <section id="step" class="testimonial-area pt-70 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-6">
                    <div class="testimonial-center-content mt-2 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="section-title">
                            <h6 class="sub-title">Tatacara Penggunaan Sistem</h6>
                            <h4 class="title">Pemohon Perlu Melakukan 5 Langkah</h4>
                        </div><!-- section title -->
                        <p class="text">Langkah 1: Pemohon Perlu Log Masuk.</p>
                        <p class="text">Langkah 2: Pemohon Perlu Mendaftarkan Maklumat Diri DiMenu Pengguna.</p>
                        <p class="text">Langkah 3: Pemohon Perlu Memuat Naik Surat/Dokumen Yang Berkaitan</p>
                        <p class="text">Langkah 4: Pemohon Perlu Mengisi Maklumat Yang Diperlukan dan Menekan Butang Hantar.Notifikasi Emel Akan Diberikan Oleh Pihak Admin/Jabatan</p>
                        <p class="text">Langkah 5: Pemohon Perlu Menyemak Status Permohonan Dengan Memasukkan Tempahan ID DiMenu Search.</p>
                        <p class="text">Manual Penggunaan Sistem Secara Terperinci.
                            <a class="main-btn" href="#" target="_blank">Muat Turun Manual Pengguna</a>
                        </p>
                    </div> <!-- testimonial left content -->
                </div>
                <div class="col-lg-6">
                    <div class="testimonial-right-content mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                        <div class="quota">
                            <i class="lni-quotation"></i>
                        </div>
                        <div class="testimonial-content-wrapper testimonial-active">
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p class="text">“Pemohon Perlu Masuk Dengan Menekan Butang Log Masuk.”</p>
                                </div>
                                <div class="testimonial-author d-sm-flex justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-image">
                                            <img src="lp/lp/assets/images/logmasuk.png" alt="Log Masuk">
                                        </div>
                                        <div class="author-name media-body">
                                            <h5 class="name">Admin</h5>
                                            <span class="sub-title">Langkah 1</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- single testimonial -->
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p class="text">“Pemohon Perlu Mendaftarkan Maklumat Diri DiMenu Pengguna.”</p>
                                </div>
                                <div class="testimonial-author d-sm-flex justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-image">
                                            <img src="lp/lp/assets/images/pengguna.png" alt="Pengguna">
                                        </div>
                                        <div class="author-name media-body">
                                            <h5 class="name">Admin</h5>
                                            <span class="sub-title">Langkah 2</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- single testimonial -->
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p class="text">“Pemohon Perlu Memuat Naik Surat/Dokumen Yang Berkaitan.”</p>
                                </div>
                                <div class="testimonial-author d-sm-flex justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-image">
                                            <img src="lp/lp/assets/images/upload.png" alt="upload">
                                        </div>
                                        <div class="author-name media-body">
                                            <h5 class="name">Admin</h5>
                                            <span class="sub-title">Langkah 3</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- single testimonial -->
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p class="text">“Pemohon Perlu Mengisi Maklumat Yang Diperlukan dan Menekan Butang Hantar.”</p>
                                </div>
                                <div class="testimonial-author d-sm-flex justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-image">
                                            <img src="lp/lp/assets/images/hantar.png" alt="Hantar">
                                        </div>
                                        <div class="author-name media-body">
                                            <h5 class="name">Admin</h5>
                                            <span class="sub-title">Langkah 4</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- single testimonial -->
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p class="text">“Pemohon Perlu Menyemak Status Permohonan Dengan Memasukkan Tempahan ID DiMenu Search.”</p>
                                </div>
                                <div class="testimonial-author d-sm-flex justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-image">
                                            <img src="lp/lp/assets/images/search.png" alt="Search">
                                        </div>
                                        <div class="author-name media-body">
                                            <h5 class="name">Admin</h5>
                                            <span class="sub-title">Langkah 5</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- single testimonial -->
                        </div> <!-- testimonial content wrapper -->
                    </div> <!-- testimonial right content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== STEP PART ENDS ======-->
    
    
    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="section-title text-center pb-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6 class="sub-title">Hubungi Kami</h6>
                        <h4 class="title">Boleh Emelkan @<span>Telefon Kami</span></h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="contact-info pt-30">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-1 mt-30 d-flex  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="contact-info-icon">
                                <i class="lni-map-marker"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">JABATAN PENDIDIKAN NEGERI MELAKA, <br> JALAN ISTANA, BUKIT BERUANG,75450 MELAKA.</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-2 mt-30 d-flex  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="contact-info-icon">
                                <i class="lni-envelope"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">Facebook : MyJPNMelaka</p>
                                <p class="text">Webmaster: shahril.isa@moe.gov.my</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-3 mt-30 d-flex  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                            <div class="contact-info-icon">
                                <i class="lni-phone"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">Telefon: 606-232 3776 / 3777 / 3778 / 3779</p>
                                <p class="text">Faks   : 606-232 0500</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact info -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->
    
    <!--====== FOOTER PART START ======-->
    
    <footer id="footer" class="footer-area bg_cover" style="background-image: url(lp/lp/assets/images/footer-bg.jpg)">
        <div class="container">
            <div class="footer-widget pt-30 pb-70">
            </div> <!-- footer widget -->
            <div class="footer-copyright text-center">
                <p class="text">Copyright &copy; ©2023 <a href="https://jpnmelaka.moe.gov.my/" target="_blank">Sektor Pengurusan Maklumat Jabatan Pendidikan Negeri Melaka</a> Hak Cipta Terpelihara.</p>
            </div>
        </div> <!-- container -->
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->  

    <!--====== Jquery js ======-->
    <script src="lp/lp/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="lp/lp/assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="lp/lp/assets/js/popper.min.js"></script>
    <script src="lp/lp/assets/js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="lp/lp/assets/js/slick.min.js"></script>
    
    <!--====== Isotope js ======-->
    <script src="lp/lp/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="lp/lp/assets/js/isotope.pkgd.min.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="lp/lp/assets/js/waypoints.min.js"></script>
    <script src="lp/lp/assets/js/jquery.counterup.min.js"></script>
    
    <!--====== Circles js ======-->
    <script src="lp/lp/assets/js/circles.min.js"></script>
    
    <!--====== Appear js ======-->
    <script src="lp/lp/assets/js/jquery.appear.min.js"></script>
    
    <!--====== WOW js ======-->
    <script src="lp/lp/assets/js/wow.min.js"></script>
    
    <!--====== Headroom js ======-->
    <script src="lp/lp/assets/js/headroom.min.js"></script>
    
    <!--====== Jquery Nav js ======-->
    <script src="lp/lp/assets/js/jquery.nav.js"></script>
    
    <!--====== Scroll It js ======-->
    <script src="lp/lp/assets/js/scrollIt.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="lp/lp/assets/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Main js ======-->
    <script src="lp/lp/assets/js/main.js"></script>
    
</body>
</html>
