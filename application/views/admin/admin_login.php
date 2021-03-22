<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <meta charset="utf-8" />
    <title>Blue Eye Login</title>
    <meta name="author" content="Back end: Yusuf Öcalmış, Front end: Muhammed Teuvajukov">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#1A2B49"> 
    <!-- Windows Phone --> 
    <meta name="msapplication-navbutton-color" content="#1A2B49">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#1A2B49"> 
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url('assets') ?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url('assets') ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('assets') ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo site_url('assets') ?>/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#1A2B49">

 		<meta name="Description" content="Author: Yusuf Öcalmış, Muhammet Teuvajukov">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,600,700&amp;subset=latin-ext" rel="stylesheet">

        <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      html,
      body {
        width: 100%;
        height: 100%;
          -webkit-touch-callout: none;
          -webkit-user-select: none;
          -khtml-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
      }
      body {
        margin: 0 auto;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        -ms-align-items: center;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-family: 'Roboto', sans-serif;
        color: #222;
        
        background-color: #161238;

        max-width: 360px;
      }

      .flip-container {
        perspective: 1000;
        border-radius: 50%;
        margin: 0 auto 10px auto;
      }

      .logged-in {
      	transform: rotateY(180deg);
      }

      .flip-container, .front, .back, .back-logo {
      	width: 130px;
      	height: 130px;
        display: none !important;
      }

      .flipper {
        transition-duration: 0.6s;
        transform-style: preserve-3d;
      }

      .front, 
      .back {
      	backface-visibility: hidden;
      	position: absolute;
      	top: 0;
      	left: 0;
        background-size: cover;
      }

      .front {
      	background: url(http://s8.postimg.org/y7z5wso29/Flip_Img.png) 0 0 no-repeat;
      }

      .back {
      	transform: rotateY(180deg);
      	background: url(http://s8.postimg.org/u04do1mmp/Flip_Img2.png) 0 0 no-repeat;
      }

      h1 {
        font-size: 22px;
        color: white;
        margin: 0;
      }
      h1 span {
        font-weight: 300;
      }
      .input-inner{
        border: 1px solid rgba(0,0,0,.13);
        border-radius: 6px;
        padding: 1.3rem;
        background-color: #d02e3e;
        -webkit-box-shadow: 0px 0px 32px 6px rgba(0,0,0,.60);
        -moz-box-shadow: 0px 0px 32px 6px rgba(0,0,0,.60);
        box-shadow: 0px 0px 32px 6px rgba(0,0,0,.60);
        position: relative;
      }
      h2{
        margin: .4rem 0 1.3rem 0;
        font-size: 2rem;
        color: #ebecf0;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        -ms-align-items: center;
        align-items: center;
        justify-content: center;
      }
      img.b_logo{
        position: absolute;
        top: -100%;
        left: 50%;
        transform: ;
        max-width: 150px;
        height: auto;
        margin-right: 6px;
        animation:balloons 8s ease-in-out infinite;
        transform-origin:bottom center;
      }
      @keyframes balloons {
        0%{ 
          transform:translateY(0) translateX(-50%) rotate(0deg); 
        }
        33%{
          transform: translateY(-25px) translateX(-40%) rotate(4deg); 
        }
        66%{ 
          transform:translateY(-25px) translateX(-60%) rotate(-4deg); 
        }
        100%{ 
          transform:translateY(0) translateX(-50%) rotate(0deg); 
        }
      }
      form{
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        -webkit-flex-direction: column;
        -moz-flex-direction: column;
        -ms-flex-direction: column;
        -o-flex-direction: column;
        flex-direction: column;
        width: 100%;
      }
      input{
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }

      input[type=text],
      input[type=password] {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        width: 100%;
        padding: .5rem .75rem;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        color: #101118;
        border: 1px solid rgba(0,0,0,.14);
        border-radius: 5px;
        transition: all 150ms ease;
        font-size: 1rem;
        margin: .5rem 0;
        background-color: #ebecf0;
      }
      input:first-child{
        margin-top: 0;
      }
      input::-webkit-input-placeholder { 
        color: #5a5b62;

      }
      input:focus {

        outline:none;
        background-color: white;
        -webkit-box-shadow: 0 1px 4px 0 rgba(0,0,0,0.37);
        box-shadow: 0 1px 4px 0 rgba(0,0,0,0.37);
      }
      .login{
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        -webkit-flex-direction: column;
        -moz-flex-direction: column;
        -ms-flex-direction: column;
        -o-flex-direction: column;
        flex-direction: column;
        justify-content: flex-end;
        -ms-align-items: flex-end;
        align-items: flex-end;
      }
      input[type=submit] {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        -ms-align-items: center;
        align-items: center;
        justify-content: center;
        background-color: #ebecf0;
        color: #212121;
        border: 1px solid rgba(0,0,0,.3);
        -webkit-appearance: none;
        padding: 8px 16px;
        border: none;
        outline: none;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
        border-radius: 4px;
        width: 100%;
        margin: .5rem 0;
      }
      a {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        margin: .5rem 0;
        color: #1ab7e8;
        font-weight: 500;
        text-decoration: none !important;
      }
      a:hover {
        
      }

      .hint
      {
        width:250px;
        dislay:block;
        margin:80px auto 0 auto;
        text-align:left;
      }

      .hint p
      {
        padding: 5px 0 5px 0;
        color:#FFF;
        font-weight:600;
        font-size:20px;
      }

      .hint p span
      {
        font-weight:300;
        font-size:16px;
      }

    </style>

    
    <!--<script src="login/js/prefixfree.min.login/js"></script>-->

    
  </head>

  <body>

    <div class="wrap">



      <div class="flip-container" id='flippr'>

        <div class="flipper">

          <div class="front"></div>

          <div class="back"></div>

        </div>

      </div>
    <div class="input-inner">
      <img src="<?php echo site_url('assets') ?>/blue_eye_1.png" class="b_logo" alt="BlueEYE" >
      <!--<h2>Giriş</h2>-->
      <h1 class="text" id="welcome"> <span></span></h1>
      
      <form method='post' id="theForm" action="admin/kontrol">

        <input type='text' id="username" name='kullanici' placeholder='Kullanıcı Adı'>
        <input type='password' id='password' name='sifre' placeholder='Şifre'>

        <div class='login'>
          <input type='submit' value='Giriş'>
    <!--      <a href="#">Şifremi Unuttum</a>-->
       </div><!-- /login -->



     </form>


      
    </div>



   </div><!-- /wrap -->




    <!--<script src='http://cdnlogin/js.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.login/js'></script>

    <script src="login/js/index.login/js"></script>-->

  </body>
</html>
