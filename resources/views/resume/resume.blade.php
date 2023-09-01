<x-slot name="header">
  {{--<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Dashboard') }}
  </h2>--}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</x-slot>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>iPortfolio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('plugins/resume/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/resume/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/resume/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/resume/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/resume/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('plugins/resume/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('plugins/resume/css/style.css')}}" rel="stylesheet">

  <style>
    /**
* Template Name: iPortfolio
* Updated: May 30 2023 with Bootstrap v5.3.0
* Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

    /*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
    body {
      font-family: "Open Sans", sans-serif;
      color: #272829;
    }

    a {
      color: #149ddd;
      text-decoration: none;
    }

    a:hover {
      color: #37b3ed;
      text-decoration: none;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Raleway", sans-serif;
    }

    /*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/
    .back-to-top {
      position: fixed;
      visibility: hidden;
      opacity: 0;
      right: 15px;
      bottom: 15px;
      z-index: 996;
      background: #149ddd;
      width: 40px;
      height: 40px;
      border-radius: 50px;
      transition: all 0.4s;
    }

    .back-to-top i {
      font-size: 28px;
      color: #fff;
      line-height: 0;
    }

    .back-to-top:hover {
      background: #2eafec;
      color: #fff;
    }

    .back-to-top.active {
      visibility: visible;
      opacity: 1;
    }

    /*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
    #header {
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      width: 300px;
      transition: all ease-in-out 0.5s;
      z-index: 9997;
      transition: all 0.5s;
      padding: 0 15px;
      background: #040b14;
      overflow-y: auto;
    }

    #header .profile img {
      margin: 15px auto;
      display: block;
      width: 120px;
      border: 8px solid #2c2f3f;
    }

    #header .profile h1 {
      font-size: 24px;
      margin: 0;
      padding: 0;
      font-weight: 600;
      -moz-text-align-last: center;
      text-align-last: center;
      font-family: "Poppins", sans-serif;
    }

    #header .profile h1 a,
    #header .profile h1 a:hover {
      color: #fff;
      text-decoration: none;
    }

    #header .profile .social-links a {
      font-size: 18px;
      display: inline-block;
      background: #212431;
      color: #fff;
      line-height: 1;
      padding: 8px 0;
      margin-right: 4px;
      border-radius: 50%;
      text-align: center;
      width: 36px;
      height: 36px;
      transition: 0.3s;
    }

    #header .profile .social-links a:hover {
      background: #149ddd;
      color: #fff;
      text-decoration: none;
    }

    #main {
      margin-left: 300px;
    }

    .container,
    .container-fluid {
      padding-left: 30px;
      padding-right: 30px;
    }

    @media (max-width: 1199px) {
      #header {
        left: -300px;
      }

      #main {
        margin-left: 0;
      }

      .container,
      .container-fluid {
        padding-left: 12px;
        padding-right: 12px;
      }
    }

    /*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
    /* Desktop Navigation */
    .nav-menu {
      padding: 30px 0 0 0;
    }

    .nav-menu * {
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .nav-menu>ul>li {
      position: relative;
      white-space: nowrap;
    }

    .nav-menu a,
    .nav-menu a:focus {
      display: flex;
      align-items: center;
      color: #a8a9b4;
      padding: 12px 15px;
      margin-bottom: 8px;
      transition: 0.3s;
      font-size: 15px;
    }

    .nav-menu a i,
    .nav-menu a:focus i {
      font-size: 24px;
      padding-right: 8px;
      color: #6f7180;
    }

    .nav-menu a:hover,
    .nav-menu .active,
    .nav-menu .active:focus,
    .nav-menu li:hover>a {
      text-decoration: none;
      color: #fff;
    }

    .nav-menu a:hover i,
    .nav-menu .active i,
    .nav-menu .active:focus i,
    .nav-menu li:hover>a i {
      color: #149ddd;
    }

    /* Mobile Navigation */
    .mobile-nav-toggle {
      position: fixed;
      right: 15px;
      top: 15px;
      z-index: 9998;
      border: 0;
      font-size: 24px;
      transition: all 0.4s;
      outline: none !important;
      background-color: #149ddd;
      color: #fff;
      width: 40px;
      height: 40px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      line-height: 0;
      border-radius: 50px;
      cursor: pointer;
    }

    .mobile-nav-active {
      overflow: hidden;
    }

    .mobile-nav-active #header {
      left: 0;
    }

    /*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
    #hero {
      width: 100%;
      height: 100vh;
      background: url("{{asset('avatar/img/bg/bg1.jpg')}}") top center;
      background-size: cover;
    }

    #hero:before {
      content: "";
      background: rgba(87, 96, 102, 0.8);
      position: absolute;
      bottom: 0;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1;
    }

    #hero .hero-container {
      position: relative;
      z-index: 2;
      min-width: 300px;
    }

    #hero h1 {
      margin: 0 0 10px 0;
      font-size: 64px;
      font-weight: 700;
      line-height: 56px;
      color: #fff;
    }

    #hero p {
      color: #fff;
      margin-bottom: 50px;
      font-size: 26px;
      font-family: "Poppins", sans-serif;
    }

    #hero p span {
      color: #fff;
      padding-bottom: 4px;
      letter-spacing: 1px;
      border-bottom: 3px solid #149ddd;
    }

    @media (min-width: 1024px) {
      #hero {
        background-attachment: fixed;
      }
    }

    @media (max-width: 768px) {
      #hero h1 {
        font-size: 28px;
        line-height: 36px;
      }

      #hero h2 {
        font-size: 18px;
        line-height: 24px;
        margin-bottom: 30px;
      }
    }

    /*--------------------------------------------------------------
# Sections General
--------------------------------------------------------------*/
    section {
      padding: 60px 0;
      overflow: hidden;
    }

    .section-bg {
      background: #f5f8fd;
    }

    .section-title {
      padding-bottom: 30px;
    }

    .section-title h2 {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 20px;
      padding-bottom: 20px;
      position: relative;
      color: #173b6c;
    }

    .section-title h2::after {
      content: "";
      position: absolute;
      display: block;
      width: 50px;
      height: 3px;
      background: #149ddd;
      bottom: 0;
      left: 0;
    }

    .section-title p {
      margin-bottom: 0;
    }

    /*--------------------------------------------------------------
# About
--------------------------------------------------------------*/
    .about .content h3 {
      font-weight: 700;
      font-size: 26px;
      color: #173b6c;
    }

    .about .content ul {
      list-style: none;
      padding: 0;
    }

    .about .content ul li {
      margin-bottom: 20px;
      display: flex;
      align-items: center;
    }

    .about .content ul strong {
      margin-right: 10px;
    }

    .about .content ul i {
      font-size: 16px;
      margin-right: 5px;
      color: #149ddd;
      line-height: 0;
    }

    .about .content p:last-child {
      margin-bottom: 0;
    }

    /*--------------------------------------------------------------
# Facts
--------------------------------------------------------------*/
    .facts {
      padding-bottom: 30px;
    }

    .facts .count-box {
      padding: 30px;
      width: 100%;
    }

    .facts .count-box i {
      display: block;
      font-size: 44px;
      color: #149ddd;
      float: left;
      line-height: 0;
    }

    .facts .count-box span {
      font-size: 48px;
      line-height: 40px;
      display: block;
      font-weight: 700;
      color: #050d18;
      margin-left: 60px;
    }

    .facts .count-box p {
      padding: 15px 0 0 0;
      margin: 0 0 0 60px;
      font-family: "Raleway", sans-serif;
      font-size: 14px;
      color: #122f57;
    }

    .facts .count-box a {
      font-weight: 600;
      display: block;
      margin-top: 20px;
      color: #122f57;
      font-size: 15px;
      font-family: "Poppins", sans-serif;
      transition: ease-in-out 0.3s;
    }

    .facts .count-box a:hover {
      color: #1f5297;
    }

    /*--------------------------------------------------------------
# Akills
--------------------------------------------------------------*/
    .skills .progress {
      height: 60px;
      display: block;
      background: none;
      border-radius: 0;
    }

    .skills .progress .skill {
      padding: 0;
      margin: 0 0 6px 0;
      text-transform: uppercase;
      display: block;
      font-weight: 600;
      font-family: "Poppins", sans-serif;
      color: #050d18;
    }

    .skills .progress .skill .val {
      float: right;
      font-style: normal;
    }

    .skills .progress-bar-wrap {
      background: #dce8f8;
      height: 10px;
    }

    .skills .progress-bar {
      width: 1px;
      height: 10px;
      transition: 0.9s;
      background-color: #149ddd;
    }

    /*--------------------------------------------------------------
# Resume
--------------------------------------------------------------*/
    .resume .resume-title {
      font-size: 26px;
      font-weight: 700;
      margin-top: 20px;
      margin-bottom: 20px;
      color: #050d18;
    }

    .resume .resume-item {
      padding: 0 0 20px 20px;
      margin-top: -2px;
      border-left: 2px solid #1f5297;
      position: relative;
    }

    .resume .resume-item h4 {
      line-height: 18px;
      font-size: 18px;
      font-weight: 600;
      text-transform: uppercase;
      font-family: "Poppins", sans-serif;
      color: #050d18;
      margin-bottom: 10px;
    }

    .resume .resume-item h5 {
      font-size: 16px;
      background: #e4edf9;
      padding: 5px 15px;
      display: inline-block;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .resume .resume-item ul {
      padding-left: 20px;
    }

    .resume .resume-item ul li {
      padding-bottom: 10px;
    }

    .resume .resume-item:last-child {
      padding-bottom: 0;
    }

    .resume .resume-item::before {
      content: "";
      position: absolute;
      width: 16px;
      height: 16px;
      border-radius: 50px;
      left: -9px;
      top: 0;
      background: #fff;
      border: 2px solid #1f5297;
    }

    /*--------------------------------------------------------------
# Portfolio
--------------------------------------------------------------*/
    .portfolio .portfolio-item {
      margin-bottom: 30px;
    }

    .portfolio #portfolio-flters {
      padding: 0;
      margin: 0 auto 35px auto;
      list-style: none;
      text-align: center;
      background: #fff;
      border-radius: 50px;
      padding: 2px 15px;
    }

    .portfolio #portfolio-flters li {
      cursor: pointer;
      display: inline-block;
      padding: 10px 15px 8px 15px;
      font-size: 14px;
      font-weight: 600;
      line-height: 1;
      text-transform: uppercase;
      color: #272829;
      margin-bottom: 5px;
      transition: all 0.3s ease-in-out;
    }

    .portfolio #portfolio-flters li:hover,
    .portfolio #portfolio-flters li.filter-active {
      color: #149ddd;
    }

    .portfolio #portfolio-flters li:last-child {
      margin-right: 0;
    }

    .portfolio .portfolio-wrap {
      transition: 0.3s;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    .portfolio .portfolio-wrap::before {
      content: "";
      background: rgba(255, 255, 255, 0.5);
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      transition: all ease-in-out 0.3s;
      z-index: 2;
      opacity: 0;
    }

    .portfolio .portfolio-wrap .portfolio-links {
      opacity: 1;
      left: 0;
      right: 0;
      bottom: -60px;
      z-index: 3;
      position: absolute;
      transition: all ease-in-out 0.3s;
      display: flex;
      justify-content: center;
    }

    .portfolio .portfolio-wrap .portfolio-links a {
      color: #fff;
      font-size: 28px;
      text-align: center;
      background: rgba(20, 157, 221, 0.75);
      transition: 0.3s;
      width: 50%;
    }

    .portfolio .portfolio-wrap .portfolio-links a:hover {
      background: rgba(20, 157, 221, 0.95);
    }

    .portfolio .portfolio-wrap .portfolio-links a+a {
      border-left: 1px solid #37b3ed;
    }

    .portfolio .portfolio-wrap:hover::before {
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      opacity: 1;
    }

    .portfolio .portfolio-wrap:hover .portfolio-links {
      opacity: 1;
      bottom: 0;
    }

    /*--------------------------------------------------------------
# Portfolio Details
--------------------------------------------------------------*/
    .portfolio-details {
      padding-top: 40px;
    }

    .portfolio-details .portfolio-details-slider img {
      width: 100%;
    }

    .portfolio-details .portfolio-details-slider .swiper-pagination {
      margin-top: 20px;
      position: relative;
    }

    .portfolio-details .portfolio-details-slider .swiper-pagination .swiper-pagination-bullet {
      width: 12px;
      height: 12px;
      background-color: #fff;
      opacity: 1;
      border: 1px solid #149ddd;
    }

    .portfolio-details .portfolio-details-slider .swiper-pagination .swiper-pagination-bullet-active {
      background-color: #149ddd;
    }

    .portfolio-details .portfolio-info {
      padding: 30px;
      box-shadow: 0px 0 30px rgba(5, 13, 24, 0.08);
    }

    .portfolio-details .portfolio-info h3 {
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #eee;
    }

    .portfolio-details .portfolio-info ul {
      list-style: none;
      padding: 0;
      font-size: 15px;
    }

    .portfolio-details .portfolio-info ul li+li {
      margin-top: 10px;
    }

    .portfolio-details .portfolio-description {
      padding-top: 30px;
    }

    .portfolio-details .portfolio-description h2 {
      font-size: 26px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .portfolio-details .portfolio-description p {
      padding: 0;
    }

    /*--------------------------------------------------------------
# Services
--------------------------------------------------------------*/
    .services .icon-box {
      margin-bottom: 20px;
    }

    .services .icon {
      float: left;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 54px;
      height: 54px;
      background: #149ddd;
      border-radius: 50%;
      transition: 0.5s;
      border: 1px solid #149ddd;
    }

    .services .icon i {
      color: #fff;
      font-size: 24px;
      line-height: 0;
    }

    .services .icon-box:hover .icon {
      background: #fff;
    }

    .services .icon-box:hover .icon i {
      color: #149ddd;
    }

    .services .title {
      margin-left: 80px;
      font-weight: 700;
      margin-bottom: 15px;
      font-size: 18px;
    }

    .services .title a {
      color: #343a40;
    }

    .services .title a:hover {
      color: #149ddd;
    }

    .services .description {
      margin-left: 80px;
      line-height: 24px;
      font-size: 14px;
    }

    /*--------------------------------------------------------------
# Testimonials
--------------------------------------------------------------*/
    .testimonials .testimonials-carousel,
    .testimonials .testimonials-slider {
      overflow: hidden;
    }

    .testimonials .testimonial-item {
      box-sizing: content-box;
      text-align: center;
      min-height: 320px;
    }

    .testimonials .testimonial-item .testimonial-img {
      width: 90px;
      border-radius: 50%;
      margin: 0 auto;
    }

    .testimonials .testimonial-item h3 {
      font-size: 18px;
      font-weight: bold;
      margin: 10px 0 5px 0;
      color: #111;
    }

    .testimonials .testimonial-item h4 {
      font-size: 14px;
      color: #999;
      margin: 0;
    }

    .testimonials .testimonial-item .quote-icon-left,
    .testimonials .testimonial-item .quote-icon-right {
      color: #c3e8fa;
      font-size: 26px;
    }

    .testimonials .testimonial-item .quote-icon-left {
      display: inline-block;
      left: -5px;
      position: relative;
    }

    .testimonials .testimonial-item .quote-icon-right {
      display: inline-block;
      right: -5px;
      position: relative;
      top: 10px;
    }

    .testimonials .testimonial-item p {
      font-style: italic;
      margin: 0 15px 15px 15px;
      padding: 20px;
      background: #fff;
      position: relative;
      margin-bottom: 35px;
      border-radius: 6px;
      box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
    }

    .testimonials .testimonial-item p::after {
      content: "";
      width: 0;
      height: 0;
      border-top: 20px solid #fff;
      border-right: 20px solid transparent;
      border-left: 20px solid transparent;
      position: absolute;
      bottom: -20px;
      left: calc(50% - 20px);
    }

    .testimonials .swiper-pagination {
      margin-top: 20px;
      position: relative;
    }

    .testimonials .swiper-pagination .swiper-pagination-bullet {
      width: 12px;
      height: 12px;
      background-color: #fff;
      opacity: 1;
      border: 1px solid #149ddd;
    }

    .testimonials .swiper-pagination .swiper-pagination-bullet-active {
      background-color: #149ddd;
    }

    /*--------------------------------------------------------------
# Contact
--------------------------------------------------------------*/
    .contact {
      padding-bottom: 130px;
    }

    .contact .info {
      padding: 30px;
      background: #fff;
      width: 100%;
      box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
    }

    .contact .info i {
      font-size: 20px;
      color: #149ddd;
      float: left;
      width: 44px;
      height: 44px;
      background: #dff3fc;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50px;
      transition: all 0.3s ease-in-out;
    }

    .contact .info h4 {
      padding: 0 0 0 60px;
      font-size: 22px;
      font-weight: 600;
      margin-bottom: 5px;
      color: #050d18;
    }

    .contact .info p {
      padding: 0 0 10px 60px;
      margin-bottom: 20px;
      font-size: 14px;
      color: #173b6c;
    }

    .contact .info .email p {
      padding-top: 5px;
    }

    .contact .info .social-links {
      padding-left: 60px;
    }

    .contact .info .social-links a {
      font-size: 18px;
      display: inline-block;
      background: #333;
      color: #fff;
      line-height: 1;
      padding: 8px 0;
      border-radius: 50%;
      text-align: center;
      width: 36px;
      height: 36px;
      transition: 0.3s;
      margin-right: 10px;
    }

    .contact .info .social-links a:hover {
      background: #149ddd;
      color: #fff;
    }

    .contact .info .email:hover i,
    .contact .info .address:hover i,
    .contact .info .phone:hover i {
      background: #149ddd;
      color: #fff;
    }

    .contact .php-email-form {
      width: 100%;
      padding: 30px;
      background: #fff;
      box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
    }

    .contact .php-email-form .form-group {
      padding-bottom: 8px;
    }

    .contact .php-email-form .validate {
      display: none;
      color: red;
      margin: 0 0 15px 0;
      font-weight: 400;
      font-size: 13px;
    }

    .contact .php-email-form .error-message {
      display: none;
      color: #fff;
      background: #ed3c0d;
      text-align: left;
      padding: 15px;
      font-weight: 600;
    }

    .contact .php-email-form .error-message br+br {
      margin-top: 25px;
    }

    .contact .php-email-form .sent-message {
      display: none;
      color: #fff;
      background: #18d26e;
      text-align: center;
      padding: 15px;
      font-weight: 600;
    }

    .contact .php-email-form .loading {
      display: none;
      background: #fff;
      text-align: center;
      padding: 15px;
    }

    .contact .php-email-form .loading:before {
      content: "";
      display: inline-block;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      margin: 0 10px -6px 0;
      border: 3px solid #18d26e;
      border-top-color: #eee;
      animation: animate-loading 1s linear infinite;
    }

    .contact .php-email-form .form-group {
      margin-bottom: 15px;
    }

    .contact .php-email-form label {
      padding-bottom: 8px;
    }

    .contact .php-email-form input,
    .contact .php-email-form textarea {
      border-radius: 0;
      box-shadow: none;
      font-size: 14px;
    }

    .contact .php-email-form input {
      height: 44px;
    }

    .contact .php-email-form textarea {
      padding: 10px 15px;
    }

    .contact .php-email-form button[type=submit] {
      background: #149ddd;
      border: 0;
      padding: 10px 24px;
      color: #fff;
      transition: 0.4s;
      border-radius: 4px;
    }

    .contact .php-email-form button[type=submit]:hover {
      background: #37b3ed;
    }

    @keyframes animate-loading {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    /*--------------------------------------------------------------
# Breadcrumbs
--------------------------------------------------------------*/
    .breadcrumbs {
      padding: 20px 0;
      background: #f9f9f9;
    }

    .breadcrumbs h2 {
      font-size: 26px;
      font-weight: 300;
    }

    .breadcrumbs ol {
      display: flex;
      flex-wrap: wrap;
      list-style: none;
      padding: 0;
      margin: 0;
      font-size: 15px;
    }

    .breadcrumbs ol li+li {
      padding-left: 10px;
    }

    .breadcrumbs ol li+li::before {
      display: inline-block;
      padding-right: 10px;
      color: #0e2442;
      content: "/";
    }

    @media (max-width: 768px) {
      .breadcrumbs .d-flex {
        display: block !important;
      }

      .breadcrumbs ol {
        display: block;
      }

      .breadcrumbs ol li {
        display: inline-block;
      }
    }

    /*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
    #footer {
      padding: 15px;
      color: #f4f6fd;
      font-size: 14px;
      position: fixed;
      left: 0;
      bottom: 0;
      width: 300px;
      z-index: 9999;
      background: #040b14;
    }

    #footer .copyright {
      text-align: center;
    }

    #footer .credits {
      padding-top: 5px;
      text-align: center;
      font-size: 13px;
      color: #eaebf0;
    }

    @media (max-width: 1199px) {
      #footer {
        position: static;
        width: auto;
        padding-right: 20px 15px;
      }
    }
  </style>
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="{{asset($resume->photo)}}" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">{{$resume->name}}</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Início</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Dados Pessoais</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Experiência</span></a>
          </li>
          <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i>
              <span>Portfolio</span></a></li>
          <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
  <x-modal.galery_modal title="Exemplo" id='1' />
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="p-2 d-flex flex-column justify-content-center align-items-center">

    <div class="hero-container" data-aos="fade-in">
      <h1>{{$resume->nome}}</h1>
      <p>Você só vai vencer amanhã, se não desistir hoje!</p>
      {{--<p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>--}}
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Objetivo</h2>
          <p>{{ $resume->objetivo }}</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="{{asset($resume->photo)}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>
              {{$resume->name}}
            </h3>
            <br>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Nome:</strong> <span>{{$resume->nome}}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Data de Nascimento:</strong>
                    <span>{{\Carbon\Carbon::parse($resume->nascimento)->format('d/m/Y')}}</span></li>
                  {{--<li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.example.com</span>
                  </li>--}}
                  <li><i class="bi bi-chevron-right"></i> <strong>Telefone:</strong> <span>+{{substr($resume->telefone,
                      0, 2)}} ({{substr($resume->telefone, 2, 2)}}) {{strlen($resume->telefone) <= 12 ? substr($resume->
                        telefone, 4, 4) : substr($resume->telefone, 4, 5) }} - {{substr($resume->telefone, -4)}} </span>
                  </li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Cidade:</strong> <span>{{
                      App\Models\City::find($resume->city_id)->title }} - {{ App\Models\States::find($resume->state_id)->letter
                      }} </span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Idade:</strong> <span>{{
                      \Carbon\Carbon::parse($resume->nascimento)->age }}</span></li>
                  {{--<li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Master</span></li>--}}
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $resume->email }}</span></li>
                  {{--<li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                  --}}
                </ul>
              </div>
            </div>
            {{--<p>{{ $resume->objetivo }}</p>--}}

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Soft Skills</h2>
          {{--<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
            in iste officiis commodi quidem hic quas.</p>--}}
        </div>

        <div class="row skills-content">

          <div class="col-lg-6" data-aos="fade-up">
            @foreach (($resume->skills) as $skill)
            <div class="progress py-2">
              <span class="skill">{{$skill}} <i class="val"></i></i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Experiência Profissional</h2>

        </div>

        <Link href="#refund-info">
        Show Refund Information
        </Link>

        <x-splade-modal name="refund-info">
          <x-splade-form action="{{route('resume.update', ['resume' => $resume])}}">
            <input v-model="form.name" type="text" />
            <input v-model="form.email" type="email" />
            <button type="submit">Send</button>
          </x-splade-form>
        </x-splade-modal>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title">Sumary</h3>
            <div class="resume-item pb-0">
              <h4>Alex Smith</h4>
              <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and
                  developing user-centered digital/print marketing material from initial concept to final, polished
                  deliverable.</em></p>
              <ul>
                <li>Portland par 127,Orlando, FL</li>
                <li>(123) 456-7891</li>
                <li>alice.barkley@example.com</li>
              </ul>
            </div>

            <h3 class="resume-title">Education</h3>
            <div class="resume-item">
              <h4>Master of Fine Arts &amp; Graphic Design</h4>
              <h5>2015 - 2016</h5>
              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
              <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui
                ut dignissimos deleniti nerada porti sand markend</p>
            </div>
            <div class="resume-item">
              <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>
              <h5>2010 - 2014</h5>
              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>
              <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius
                unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart
                dila</p>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Professional Experience</h3>
            <div class="resume-item">
              <h4>Senior graphic design specialist</h4>
              <h5>2019 - Present</h5>
              <p><em>Experion, New York, NY </em></p>
              <ul>
                <li>Lead in the design, development, and implementation of the graphic, layout, and production
                  communication materials</li>
                <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the
                  project. </li>
                <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the
                  design</li>
                <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>
              </ul>
            </div>
            <div class="resume-item">
              <h4>Graphic design specialist</h4>
              <h5>2017 - 2018</h5>
              <p><em>Stepping Stone Advertising, New York, NY</em></p>
              <ul>
                <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and
                  advertisements).</li>
                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                <li>Created 4+ design presentations and proposals a month for clients and account managers</li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Resume Section -->




  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; <strong><span>{{env('APP_NAME')}}</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Crie o seu Perfil <a href="">Clique Aqui</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('plugins/resume/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('plugins/resume/aos/aos.js')}}"></script>
  <script src="{{asset('plugins/resume/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('plugins/resume/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('plugins/resume/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('plugins/resume/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('plugins/resume/typed.js/typed.umd.js')}}"></script>
  <script src="{{asset('plugins/resume/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('plugins/resume/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('plugins/resume/main.js')}}"></script>

</body>