<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
      
        <title>FELICITY PROPERTY LIMITED</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
      
        <!-- Favicons -->
        <link href="{{asset('frontend/assets/img/logo.jpg')}}" rel="icon">
        <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
      
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
      
        <!-- Vendor CSS Files -->
        <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">
      
        <!-- =======================================================
        * Template Name: EstateAgency
        * Updated: Jan 09 2024 with Bootstrap v5.3.2
        * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
</head>
<style>
    .image {
        background-color: white;
    }
    .image img {
        width: 150px;
        display: inline !important;
        display: flex;
        justify-content: space-between;
    }
    .message {
        background-image: linear-gradient(rgba(2, 2, 2, 0.8), rgba(255, 255, 255, 0.2)), url("{{asset('frontend/assets/img/property-7.jpg')}}");
        height: 60vh;
        background-repeat: no-repeat;
        background-size: cover;
        padding-top: 20px;
        text-align: center;
    }
    @media (max-width:844px) {
        .message span {
        color: #800080;
        font-weight: 700;
        font-size: 1.5rem;
    }
    .message .felicity {
        background-color: #4bd680;
        padding: 10px 5px;
    }
    .image .ima {
        display: none !important;
    }
    }
    .message p {
        color: #fff;
        font-weight: 300;
        font-size: 1.2rem;
        padding-top: 50px;
    }
    .message p span {
        color: #4bd680;
        font-weight: 300;
        font-size: 1.2rem;
    }
    .message .attach {
        padding-bottom: 50px;
    }
    .message a {
        color: white;
        text-align: center;
        padding-top: 100px !important;
    }

    /* Large Screen */
    @media (min-width: 768px) {
        .image .im {
            margin-left: 300px;
        }
        .image .ima {
            margin-left: 300px;
            width: 500px;
            border-radius: 10px;
            border-color: 3px solid #4bd680;
            outline: #4bd680;
        }
        .message {
        background-image: linear-gradient(rgba(2, 2, 2, 0.8), rgba(255, 255, 255, 0.5)), url("{{asset('frontend/assets/img/property-7.jpg')}}");
        height: 63.8vh;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        padding-top: 20px;
        text-align: center;
    }
    .message .felicity {
        color: #4bd680;
        font-weight: 700;
        font-size: 2.5rem;
        background-color: #800080;
        padding: 10px 20px;
        margin: 200px 0px;
    }
    .message p {
        color: #fff;
        font-weight: 600;
        font-size: 1.2rem;
        padding-top: 50px;
        text-align: center;
    }
    .message p span {
        color: #4bd680;
        font-weight: 600;
        font-size: 1.2rem;
    }
    .message .attach {
        padding-bottom: 100px;
    }
    .message a {
        color: white;
        text-align: center;
        padding-top: 100px !important;
    }
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row image">
            <div class="col-md-12">
                    <img src="{{asset('frontend/assets/img/logo.jpg')}} " alt="">
                    <img src="{{asset('frontend/assets/img/slide-2.jpg')}}" alt="" class="ima">
                    <img src="{{asset('frontend/assets/img/Newsletter-pic.png')}}" alt="" class="im">
            </div>
        </div>
        <div>
            {{$booking['Subject']}}
            {{$booking['Message']}} 
        </div>
    </div>

   


</body>
</html>