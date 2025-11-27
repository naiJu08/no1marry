 @php
if(Session::has('locale')){
$locale = Session::get('locale', Config::get('app.locale'));
}
else{
$locale = env('DEFAULT_LANGUAGE');
}
$lang = \App\Models\Language::where('code', $locale)->first();
@endphp



<!DOCTYPE html>
@if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif
<head>
  <title>No1 Marry.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<!-- end -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="app-url" content="{{ getBaseURL() }}">
<meta name="file-base-url" content="{{ getFileBaseURL() }}">

<!-- Required Meta Tags Always Come First -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="@yield('meta_description', get_setting('meta_description'))" />
<meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords'))">
<meta name="fast2sms" content="chyp1BC27qLGXqZPuBL5MIMO06hXZdSA">

@yield('meta')

@if(!isset($page))
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ config('app.name', env('APP_NAME')) }}">
<meta itemprop="description" content="{{ get_setting('meta_description') }}">
<meta itemprop="image" content="{{ uploaded_asset( get_setting('meta_image') ) }}">

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="{{ config('app.name', env('APP_NAME')) }}">
<meta name="twitter:description" content="{{ get_setting('meta_description') }}">
<meta name="twitter:creator" content="@author_handle">
<meta name="twitter:image" content="{{ uploaded_asset( get_setting('meta_image')) }}">

<!-- Open Graph data -->
<meta property="og:title" content="{{ config('app.name', env('APP_NAME')) }}" />
<meta property="og:type" content="Business Site" />
<meta property="og:url" content="{{ env('APP_URL') }}" />
<meta property="og:image" content="{{ uploaded_asset(get_setting('meta_image')) }}" />
<meta property="og:description" content="{{ get_setting('meta_description') }}" />
<meta property="og:site_name" content="{{ get_setting('website_name') }}" />
<meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">

@endif
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap">
<link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
<link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css') }}">
<link rel="stylesheet" href="{{ static_asset('assets/assets_1/css/glass.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
   <link rel="icon" type="image/x-icon" href="{{ static_asset('assets/assets/img/favicon.png') }}">


@if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
<link rel="stylesheet" href="{{ static_asset('assets/css/bootstrap-rtl.min.css') }}">
@endif

<script>
    var AIZ = AIZ || {};
</script>
<style>
  /* Avoid header flashing before CSS loads */
  .glass-header{ visibility: hidden; }
  .glass-header.is-visible{ visibility: visible; }
  :root {
      --primary: {{ get_setting('base_color', '#FD2C79') }};
      --hov-primary: {{ get_setting('base_hov_color', '#0069d9') }};
      --soft-primary: {{ hex2rgba(get_setting('base_hov_color', '#377dff'), .15) }};
      --secondary: {{ get_setting('secondary_color', '#FD655B') }};
      --soft-secondary: {{ hex2rgba(get_setting('secondary_color', '#FD655B'), .15) }};
  }

  body{
      font-family: 'Poppins', sans-serif;
      font-weight: 500;
      color: #0f172a;
      background: #f3f5fa;
  }

  .text-primary-grad{
      background: linear-gradient(135deg, {{ hex2rgba(get_setting('base_color', '#FD2C79'), 1) }} 0%, {{ hex2rgba(get_setting('secondary_color', '#FD655B'), 1) }} 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
  }

  .btn-primary,
  .bg-primary-grad{
      background: linear-gradient(225deg, {{ hex2rgba(get_setting('base_color', '#FD2C79'), 1) }} 0%, {{ hex2rgba(get_setting('secondary_color', '#FD655B'), 1) }} 100%);
      border: none;
  }

  .fill-dark{ fill:#4d4d4d; }

  .fill-primary-grad stop:nth-child(1){ stop-color: {{ hex2rgba(get_setting('secondary_color', '#FD655B'), 1) }}; }
  .fill-primary-grad stop:nth-child(2){ stop-color: {{ hex2rgba(get_setting('base_color', '#FD2C79'), 1) }}; }

  .glass-main-content{
      min-height: calc(100vh - 220px);
      /* padding-top: 140px; */
      padding-bottom: 80px;
      background: transparent;
  }

  .glass-main-content.glass-main-content--compact{
      padding-top: 110px;
  }

  .glass-modal{
      background: rgba(255,255,255,0.65);
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      border: 1px solid rgba(255,255,255,0.45);
      border-radius: 20px;
      box-shadow: 0 18px 48px rgba(15,23,42,0.18);
  }

  .glass-modal__header{
      border-bottom: 1px solid rgba(255,255,255,0.35);
      display:flex;
      align-items:center;
      justify-content:space-between;
  }

  .glass-modal__body{ color:#0f172a; }

  .glass-modal__footer{ border-top:1px solid rgba(255,255,255,0.35); }

  .glass-modal .btn-close{ filter: brightness(0.6); }

  .glass-divider{ border-color: rgba(255,255,255,0.38) !important; }

  @media (max-width: 991.98px){
      .glass-main-content{ padding-top: 110px; }
  }

  @media (max-width: 575.98px){
      .glass-main-content{ padding-top: 96px; padding-bottom: 56px; }
  }

  @media only screen 
    and (min-device-width:620px) 
    and (max-device-width:720px)
    {
        .aiz-chat {
      overflow: hidden;
      -webkit-box-shadow: 0 0 13px 0 rgba(82, 63, 105, 0.05);
      box-shadow: 0 0 13px 0 rgba(82, 63, 105, 0.05);
      background: #fff;
      border-radius: 4px;
      border: 1px solid #ebedf2;
      margin-left: 9%;
  }
  .modal-content {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      width: 93% !important;
      pointer-events: auto;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid rgba(0,0,0,.2);
      border-radius: .3rem;
      outline: 0;
      margin-left: 3% !important;
  }
  
  .aiz-file-box .card-file {
      cursor: pointer;
      overflow: hidden;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      opacity: 1;
      width: 99%!important;
      height: 101% !important;
  }
    }
  @media only screen 
    and (min-device-width:720px) 
    and (max-device-width:820px)
    {
        .aiz-chat {
      overflow: hidden;
      -webkit-box-shadow: 0 0 13px 0 rgba(82, 63, 105, 0.05);
      box-shadow: 0 0 13px 0 rgba(82, 63, 105, 0.05);
      background: #fff;
      border-radius: 4px;
      border: 1px solid #ebedf2;
      margin-left: 2%;
  }
  .modal-content {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      width: 93% !important;
      pointer-events: auto;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid rgba(0,0,0,.2);
      border-radius: .3rem;
      outline: 0;
      margin-left: 3% !important;
  }
  
  .aiz-file-box .card-file {
      cursor: pointer;
      overflow: hidden;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      opacity: 1;
      width: 99%!important;
      height: 101% !important;
  }
  
  }
  @media only screen 
    and (min-device-width:820px) 
    and (max-device-width:1200px)
    {
  
        .aiz-chat {
      overflow: hidden;
      -webkit-box-shadow: 0 0 13px 0 rgba(82, 63, 105, 0.05);
      box-shadow: 0 0 13px 0 rgba(82, 63, 105, 0.05);
      background: #fff;
      border-radius: 4px;
      border: 1px solid #ebedf2;
      margin-left: 0%;
  }
  .modal-content {
      position: relative;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      width: 118% !important;
      pointer-events: auto;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid rgba(0,0,0,.2);
      border-radius: .3rem;
      outline: 0;
      margin-left: -9% !important;
  }
  
  .aiz-file-box .card-file {
      cursor: pointer;
      overflow: hidden;
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      opacity: 1;
      width: 100%!important;
      height: 101% !important;
  }
  
  
  
  }
  
  
  
  </style>
@if (get_setting('google_analytics_activation') == 1)
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS_TRACKING_ID') }}"></script>

<script>
    window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ env('GOOGLE_ANALYTICS_TRACKING_ID') }}');
</script>
@endif

@if (get_setting('facebook_pixel_activation') == 1)
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', {{ env('FACEBOOK_PIXEL_ID') }});
      fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}/&ev=PageView&noscript=1" />
</noscript>
<!-- End Facebook Pixel Code -->
@endif
<!-- Include jQuery -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
  <link rel="stylesheet" href="{{ static_asset('assets/assets_1/css/stylemedia.css') }}">
  <link rel="stylesheet" href="{{ static_asset('assets/assets_1/css/style.css') }}">
  <link rel="stylesheet" href="{{ static_asset('assets/assets_1/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ static_asset('assets/assets_1/css/media.css') }}">
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ static_asset('assets/assets_1/css/profile.css') }}">
  <link rel="stylesheet" href="{{ static_asset('assets/assets_1/dataTables.bootstrap4.css') }}">
  <link href="{{ static_asset('assets/assets/css/select2.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/stylemedia.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
{!! get_setting('header_script') !!}

<style>
</style>

 <style>
  /*  */
  .purchase-id,.purchase-id:hover
  {
    color: #ffffff;
    text-decoration: none;
  }
  .custom-slider{
  width: 90%;
  margin: auto;
}
.
.custom-box{
  width: 200px;
  height: 100px;
  text-align:center;
  box-shadow: 2px 2px 3px gray;
  margin: 15px;
  font-size: 5em;
  padding: 50px;
}
.slick-prev, .slick-next{
  position: absolute;
  line-height: 0;
  top: 50%;
  width: 30px;
  height: 30px;
  display: block;
  padding: 0;
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
  cursor: pointer;
  color: transparent;
  border: none;
  outline: none;
  border-radius: 50px;
  background: #043e46;
}
.slick-slider{
  user-select: none;
}
.slick-next{
  right: -30px;
}
.slick-prev{
  left: -30px;
}
.slick-next:before{
  content: '\003e';
  font-size: 1.2em;
  font-weight: 1000;
  padding-left: 12px;
  color: white;
}
.slick-prev:before{
  content: '\003c';
  font-size: 1.2em;
  font-weight: 1000;
  padding-left: 9px;
  color: white;
}
  /* end */
  .btn{
  width: 90px;
  font-size: 12px;
}
#btn-verify
{
  width: 100px;
}


/* poppup */

@import url('https://fonts.googleapis.com/css?family=Quicksand:400,500,700&display=swap');

/* transparent fullscreen background */
.my-popup-background-layer {
  position: fixed;
  width: 100%;
  height: 100%;
  top:0;
  left:0;
  background: rgba(0,0,0,0.7);
  font-size: 100%;
  font-family: 'Quicksand', Arial, sans-serif;
  z-index: 9999;
} 

/* master popup div container */
.my-popup-container {
  position: fixed;
  left: 50%;
  margin-left: -460px;
  top: 50%;
  margin-top: -260px;
  width: 890px;
  min-height: 533px;
  background: url("{{ static_asset('assets/assets_1/img/Bkg\ copy.png') }}") center top no-repeat;
  padding: 74px 60px 0 510px;
  text-align: left;
  border-radius: 0px;
  box-sizing: border-box;
}
.mlctr-close {
  display: block;
  position: absolute;
  right: 14px;
  top: 118px;
  width: 26px;
  height: 26px;
  background: url("{{ static_asset('assets/assets_1/img/Bkg\ copy.png') }}") center center no-repeat;
  background-size: 10px 10px;
  cursor: pointer;
  -webkit-transition: -webkit-transform 0.5s, background-size 0.5s, opacity ease-in-out .25s;
  -moz-transition: -moz-transform 0.5s, background-size 0.5s, opacity ease-in-out .25s;
  -o-transition: -o-transform 0.5s, background-size 0.5s, opacity ease-in-out .25s;
  transition: transform 0.5s, background-size 0.5s, opacity ease-in-out .25s;
}
.mlctr-close:hover {
  background-size: 12px 12px;
  -webkit-transform: rotate(270deg);
  -moz-transform: rotate(270deg);
  -o-transform: rotate(270deg);
  transform: rotate(270deg);
}
.my-popup-container h1 {
  width: count(100% + 50px);
  height: 90px;
  font-size: 35px;
  line-height: 38px;
  font-weight: 500;
  color: #ffffff;
  padding: 0;
  margin: 0 0 0 -50px;
  box-sizing: border-box;
}
.my-popup-container h1.mlctr-h1dz {
  width: 100%;
  height: 38px;
  font-weight: 700;
  color: #cc9933;
  margin: 0;
}
.my-popup-container h1 b {
  font-size: 1.4em;
  font-weight: 700;
}
.my-popup-container h2 {
  width: 100%;
  height: 42px;
  font-size: 18px;
  line-height: 38px;
  font-weight: 400;
  color: #000;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
.my-popup-container h2 span {
  color: #219022;
  font-weight: 700;
}
.my-popup-container p {
  width: 100%;
  height: 72px;
  font-size: 13px;
  line-height: 18px;
  font-weight: 400;
  color: #000000;
  padding: 14px 0 0 0;
  margin: 0;
  box-sizing: border-box;
}
.mlctr-message-error {
  display: block;
  width: 100%;
  height: 15px;
  font-size: 10.5px;
  margin: 10px 0px;
  padding: 0;
  font-weight: bold;
  text-align: center;
  color: #ca2834;
  box-sizing: border-box;
}
.mlctr-verification-alert {
  display: none;
}
.mlctr-verification-alert.display {
  display: block;
}
.my-popup-container input[type="text"] {
  position: absolute;
  top: 443px;
  left: 396px;
  width: 260px;
  height: 43px;
  font-family: 'Quicksand', Arial, sans-serif;
  font-size: 14px;
  line-height: 16px;
  padding: 5px 15px;
  background-color: RGBA(255,255,255,0.95);
	border: 2px solid #ffcc00;
  color: #313131;
  text-align: center;
  margin: 0;
   -webkit-border-radius: 10px 0px;
  -moz-border-radius: 10px 0px;
  border-radius: 10px 0px;
  -webkit-transition: border ease-in-out .15s;
  -moz-transition: border ease-in-out .15s;
  transition: border ease-in-out .15s;
  box-shadow: 2px 3px 10px RGBA(0,0,0,0.3);
  -moz-box-shadow: 2px 3px 10px RGBA(0,0,0,0.3);
  -webkit-box-shadow: 2px 3px 10px RGBA(0,0,0,0.3);
  box-sizing: border-box;
}
.my-popup-container input[type="text"]:focus {
  background-color: RGBA(255,255,255,1);
	border: 1px solid #4ca12e;
  outline: 0;
}
.my-popup-container input[type="submit"], .my-popup-container input[type="button"] {
  position: absolute;
  top: 443px;
  left: 666px;
  width: 200px;
  height: 43px;
  font-family: 'Quicksand', Arial, sans-serif;
  font-size: 16px;
  line-height: 18px;
  font-weight: 700;
  padding: 0;
  margin: 0;
  border: 0px;
  background-color: #219022;
  color: #ffffff;
   -webkit-border-radius: 10px 0px;
  -moz-border-radius: 10px 0px;
  border-radius: 10px 0px;
  -webkit-transition: background-color ease-in-out .15s;
  -moz-transition: background-color ease-in-out .15s;
  -o-transition: background-color ease-in-out .15s;
  transition: background-color ease-in-out .15s;
  cursor: pointer;
  box-sizing: border-box;
  box-shadow: 2px 3px 10px RGBA(0,0,0,0.3);
  -moz-box-shadow: 2px 3px 10px RGBA(0,0,0,0.3);
  -webkit-box-shadow: 2px 3px 10px RGBA(0,0,0,0.3);
  outline: 0;
}
.my-popup-container input[type="submit"]:hover, .my-popup-container input[type="button"]:hover {
  background-color: #176718;
}
.my-popup-container input[type="submit"]:active, .my-popup-container input[type="button"]:active {
  top: 444px;
  font-size: 15.5px;
  box-shadow: 2px 3px 10px RGBA(0,0,0,0.3);
  -moz-box-shadow: 2px 3px 10px RGBA(0,0,0,0.3);
  -webkit-box-shadow: 1px 2px 4px RGBA(0,0,0,0.3);
}
.my-popup-container form .mlctr-check {
  position: relative;
	width: count(100% + 22px);
  text-align: left;
  padding: 0;
  display: block;
  box-sizing: border-box;
  margin: 8px 0 0 -22px;
}
.my-popup-container form .mlctr-check a{
  color: #ca2834;
  font-weight: 700;
}
.my-popup-container form .mlctr-check input[type="checkbox"] {
  position: absolute;
	visibility: hidden;
  width: 0px;
  height: 0px;
}
.my-popup-container form .mlctr-check label {
  display: inline-block;
	cursor: pointer;
  color: #000000;
  font-size: 10px;
  text-align: left;
	font-weight: 500;
  padding: 0 0 0 22px;
}
.my-popup-container form .mlctr-check label:before {
  position: absolute;
  display: inline-block;
	content: '';
	background: #cc9933;
  border: 0;
	width: 14px;
	height: 14px;
   -webkit-border-radius: 5px 0px;
  -moz-border-radius: 5px 0px;
  border-radius: 5px 0px;
  left: 0px;
  top: 4px;
}
.my-popup-container form .mlctr-check label:after {
	position: absolute;
	background: #ffffff;
	content: '';
	width: 6px;
	height: 6px;
  border: 1px solid #ffffff;
	left: 3px;
	top: 7px;
   -webkit-border-radius: 3px 0px;
  -moz-border-radius: 3px 0px;
  border-radius: 3px 0px;
	opacity: 0.3;
}
.my-popup-container form .mlctr-check label:hover::after {
	background: #000;
	opacity: 0.5;
}
.my-popup-container form .mlctr-check input[type="checkbox"]:checked + label:after {
	background: #000;
	opacity: 1;
}
.mlctr-privacy {
  display: block;
  font-size: 10px;
  line-height: 15px;
  font-weight: 300;
  color: #cacaca;
  padding: 0;
  margin: 0;
</style>
</head>
<body>
    
  @include('frontend.inc.header')

  <script>
    document.addEventListener('DOMContentLoaded', function(){
      var gh = document.querySelector('.glass-header');
      if(gh){ gh.classList.add('is-visible'); }
    });
  </script>

  <main class="glass-main-content">
        @yield('content')
  </main>

        <footer  class="mt-5" id="footer">
     <!--  -->
   <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content" id="content">
  
        <!-- Modal Header -->
        <div class="modal-header">
         
          <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <div class="container" id="contactpage">
            <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    
                    <div class="address">
                      <h5>Conctact Number </h5>
                            <ul id="contactno">
                              <li>
                                <i class="fa-brands fa-whatsapp"></i>
                              </li>
                              <li>
                                 <span class="ml-3"><a href="tel:+918301070161">+91 8301070161</a></span> <br>
                                 <!--<span class="ml-2"><a href="tel:+918301070161">+91 8301070161</a></span> <br>-->
                              </li>
                            </ul>
                           
                            
                    </div>
                    <div class="address mt-3">
                      <h5>Email </h5>
                            <ul id="address">
                                   
                                    <li>
                                
                                   
                                     <a href="mailto:numberonemarry@gmail.com"><i class="fa-solid fa-envelope"></i><span class="ml-3">numberonemarry@gmail.com</span> </a>
                                    
                                    </li>
                            </ul>
                    </div>
                    </div>
          </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="col-mt-1">
                <form action="{{ route('contact') }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <input type="text" value="" class="form-control" placeholder="Enter Name">
                    </div>
                    
                  </div>
                  <div class="row mt-4">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                      <input type="email" value="" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="col-mt">
                      <input type="tel" value="" class="form-control" placeholder="Enter Phone">
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <textarea rows="4" cols="50" class="form-control" placeholder="Messege" ></textarea>
                    </div>
                    
                  </div>
                  
      
                
              </div>
            </div>
         </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="btngroup float-right">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              <input type="submit" value="Send" class="btn btn-primary">  
            </div>
             
          </div>
          
        </div>
      </form>
      </div>
    </div>
  </div>
    <div class="modal" id="myModalabout">
    <div class="modal-dialog">
      <div class="modal-content" id="content">
  
        <!-- Modal Header -->
        <div class="modal-header">
         <h3>About Us</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
             <div class="container">
                 <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                         
                     </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                          <p>
    Welcome to No1 Marry.com. No1 Marry.com is the leading force in identifying and presenting the truly best match-making services. We are a technology driven firm providing the best platform to those who are genuinely looking for their soulmates through matrimonial site. There are multiple interaction like chat, profile linking, text linking, video calling etc… Wishing you the very best of luck for your partner search! 
   </p>
                     </div>
                 </div>
             </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="btngroup float-right">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            
            </div>
             
          </div>
          
        </div>
      </form>
      </div>
    </div>
  </div>
   <div class="modal" id="myModalprivacy">
    <div class="modal-dialog">
      <div class="modal-content" id="content">
  
        <!-- Modal Header -->
        <div class="modal-header">
         <h3>Privacy Policy </h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
             <div class="container">
                 <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                         
                     </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <p>
        By using the services you acknowledge that (a) we cannot ensure the security privacy of information you provide through the Internet and your email messages, and you release us from any and all liability in connection with the use of such information by other parties; (b) we are not responsible for, and cannot control, the use by others of any information which you provide to them and you should use caution in selecting the personal information you provide to others through the Service; and (c) we cannot assume any responsibility for the content of messages sent by other users of the Service, and you release us from any and all liability in connection with the contents of any communications you may receive from other users. We cannot guarantee, and assume no responsibility for verifying, the accuracy of the information provided by other users of the Service regarding particulars of status, age, income of other members. Your membership is only for personal use. It is not to be assigned, transferred or licensed so as to be used by any other person/entity. (d) members profile(s) and photos may be crawled and indexed by search engines, where No1Marry.com does not have any control over the search engines behavior and No1Marry.com shall not be responsible for such activities of other search engines. No1Marry.com has the right to change its features and services from time to time based on members comments or as a result of a change of policy in our company.
    </p> 
                     </div>
                 </div>
             </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="btngroup float-right">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            
            </div>
             
          </div>
          
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal" id="myModalterm">
    <div class="modal-dialog">
      <div class="modal-content" id="content">
  
        <!-- Modal Header -->
        <div class="modal-header">
         <h3>Terms and Conditions</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
             <div class="privacy">
    
    <h6>Customer Care:
    24/7 Support Our Team  
     </h6>
 </div>
 <div class="terms mt-2">
      <h6 class="text-center">
        No1Marry.com Terms of Service</h6>
      <div class="mt-3">
        <p>
            Conditions of Use: Users should have a general idea to use the internet and should be able to register the account by themselves.You should only make the payment if you're sure about this,there's no refund.Account will be activated only after I D verification and payment.To become a member of the No1Marry.com service, you must read and accept all of the terms and conditions of this agreement and the Privacy Policy. If you do not agree to be bound by the terms after you read this Agreement, you may not use the No1Marry.com service. You agree that we may modify the terms of this Agreement or the Privacy Policy, in our sole discretion, by posting amended terms to this Website. Your continued use of the service indicates your acceptance of the amended Terms of Service Agreement.
        </p>
      </div>
     <div class="mt-2">
        <ol>
            <li class="text-bold">The Service</li>
             <p>
                The Service is provided by No1Marry.com and you understand and agree to the following: (a) if you choose to register, you must submit a valid e-mail address and select a password and user name during the registration process; and fill all mandatory details marked with red * upon registration.(b) You are responsible for maintaining the confidentiality of your member name and password, and all uses of your account -- whether or not you've authorized such use; (c) You agree to notify No1Marry.com immediately of any unauthorized use of your account and (d) You are at least 18 years of age. (e) Fees once paid will not be refunded (If you wish to register as a paid member). No1Marry.com will not be held liable for any loss or damage for non-compliance. In addition, you understand and agree that the content of all users, including your content, will be collected, aggregated and anonymously integrated into the No1Marry.com Service and that No1Marry.com will use aggregated data collected from you and other users for statistical and analytical reporting purposes. You understand, and agree that, unless expressly stated, No1Marry.com in no way controls, verifies, or endorses any of the information contained on or in the No1Marry.com service, including links, events, messages, message boards and members published listings. (f) Divorced Candidates who seek new alliance by registering with No1Marry.com should submit their non objection certificate issued by Court of Law within 10 days of their registration, failing which their registration will be withheld without any information to the candidate. (g) After the receipt of an id & Password by the candidate for their created profile either as a Free Member or a Paid member, to change their Date of Birth they should submit their age proof certificate to do so. (h) All profiles, Free or Paid will be activated only after the confirmation of the submitted details by their Parents / Reference person/ Candidate himself through the given telephone numbers. (i)Once you register with No1Marry.com, from then, you will be getting promotional e-mails which bring the current events and functions held at No1Marry.com for your kind information. (j) All details pertaining to a Profile will be totally deleted after a period of 1 year from its expiry.(k) All paid registrations are valid for one year/nine months/six months, or till the marriage is fixed, whichever comes first, according to the membership taken. Re-registration of these members has to be done within 30 days from its expiry. Exceeding 30 days, it will be treated as new registration only. (l) Candidates should collect back their photographs given to display in the Website, Album file, Magazine etc with-in 30 days after the expiry of their registration period. These data's will be destroyed at our end after the said period (m) No1Marry.com do not involve directly in the matchmaking process of any candidates. If necessary it will only assist or guide. Matchmaking should be done by the Candidate/Parents for all categorize of registrations.(n) All profiles will be unavailable immediately after the confirmation of their marriage fix through their Parents/ Reference persons/Family circle etc. or the profiles will be deleted from our website after one year of its expiry.(o)The authenticity of the details given in the profile i.e. Age, Qualification, Employment, Family details etc. should be verified and confirmed by the Parents and Candidates. No1Marry.com will not be responsible for any issue arises in this regards at any point of time.(p) Any change in the profile given date of birth or educational qualification will be made only after submitting the required proof by the concern person.(q) If an online payment is done on a Sunday or a statutory holiday, the profile will be activated on next working day only. (Working hours 9.30am to 5.00 pm IST).(r) No1Marry.com will not be responsible for any issues arise for a No1Marry registered candidate while communicating through his/her personal communication media like whatsapp , Facebook, personal e-mail id's etc. (s) We are an online matchmaking facilitator where we help you to find your own choice of life partner at your discretion. Hence we do not assure you that your dream of finding your partner can be fetched from our website, may or may not. (t) You are requested to provide your personal Mobile number while registering your profile which will be registered for the purpose of future official verification and communication.
             </p>
             <p>
                (u)No1Marry.com reserves the right to forthwith terminate your membership and / or your right to use the Service without any refund to you of any of your unutilized subscription fee.
             </p>
             <p>
                You may terminate your membership at any time, for any reason by writing to No1Marry.com. In the event you terminate your membership, you will not be entitled to a refund of any unutilized subscription fees, if any, paid by you, except where otherwise stated in writing. No1Marry.com may terminate your access to the Site and/or your membership for any reason effective upon sending notice to you at the email address as provided you in your application for membership or such other email address as you may later provided to No1Marry.com. If No1Marry.com terminates your membership for breach of terms of this Agreement, you will not be entitled to any refund of any unused Subscription fees, if any, paid by you. Term for the paid Membership would be in accordance with the type of membership undertaken.
Multiple profiles of the same person are not allowed on No1Marry.com. No1Marry.com reserves the right to deactivate all multiple profiles without any refund of subscription fees.
             </p>
             <p>
                No1Marry.com owns and retains all proprietary rights in the No1Marry.com Site and the No1Marry.com Service. The Site contains the copyrighted material, trademarks, and other proprietary information of No1Marry.com, and its licensors. Except for that information which is in the public domain such as member profile or for which permission has been obtained from the user, you cannot copy, modify, publish, transmit, distribute, perform, display, or sell any such proprietary information. Any such act or an attempted act on your part shall constitute a violation of this Agreement and your membership is liable to be terminated forthwith by No1Marry.com without refund of any of your unused Subscription fees. We also reserve our right to take legal action (civil and/or criminal) wherever applicable for any violations.
             </p>
             <p>
                Under no circumstances will No1Marry.com be liable in any way for any Content, including, but not limited to, any errors or omissions in any Content, or any loss or damage of any kind incurred as a result of the use of any Content posted, emailed, transmitted or otherwise made available via the Service. No1Marry.com reserves the right to verify the authenticity of Content posted on the Site. In exercising this right, No1Marry.com may ask you to provide any documentary or other form of evidence supporting the Content you post on the Site. If you fail to produce such evidence, No1Marry.com may, in its sole discretion, terminate your Membership without a refund
             </p>
             <p>
                No1Marry.com will investigate and take appropriate legal action in its sole discretion against anyone who violates this Agreement, including without limitation, removing the offending communication / Content from the Service and terminating the Membership of such violators without a refund.
             </p>
             <li>Registration Process</li>
             <p>
                As part of the registration process for the Service, you agree to: (a) provide certain limited information about you as prompted to do so by the Service (such information to be current, complete and accurate); and (b) maintain and update this information as required to keep it current, complete and accurate. The information requested upon original sign up shall be referred to as registration data ("Registration Data"). No1Marry.com reserves the right to delete accounts created by users who appropriate the name, likeness, email address, or other personally identifiable information of another individual. No1Marry.com reserves the right to refuse the Service to any user.
             </p>
             <li>Copyrights and Trademarks</li>
             <p>
                The No1Marry.com logo and other names, logos, icons and marks identifying No1Marry.com products and services are trademarks of No1Marry.com and may not be used without the prior written permission of No1Marry.com. Except as otherwise expressly set forth in this Agreement, you may not copy, reproduce, distribute, or create derivative works of the Service without No1Marry.com's written authorization. Further, you may not reverse engineer, decompile, alter, modify, disassemble, or otherwise attempt to derive source code from the Service. All rights not expressly granted in this Agreement are reserved to No1Marry.com You shall not remove, cover or obscure any trademark, copyright and other proprietary notices or legends included on the Service. You understand and agree that any uploading or posting will be at your sole risk and No1Marry.com shall not be responsible to you (or to others) in any way. Further, No1Marry.com does not provide any warranty as to your use of any third party content or software that you obtain from the No1Marry.com site.
             </p>
             <li>User Conduct</li>
             <p>
                You agree to act responsibly and to treat other users and members with respect. No1Marry.com members are also expected to act in a manner appropriate to each No1Marry.com in which they participate. You are allowed to view the contact details of profiles which match your age criteria. There is a limit to the number of profiles you are allowed to contact each day (24 Hours). Being a free member you can express your interest to a limited number of members. Free membership is valid only for a limited period only. No1Marry.com activates only one free profile for every candidate with 30 days validity.No1Marry.com reserves the right to provide this feature to its members.This is an online platform, we cannot guarantee profiles without complete .Customer support is only provided through WhatsApp text ,voice message and email only .Phone call is not allowed.
             </p>
             <li>Content</li>
             <p>
                You are fully responsible for any content you post on the No1Marry.com service, including, but not limited to, personal profile(s), message boards, listings, events, testimonials, e-mail messages - and the consequences of any such content. You understand and agree that No1Marry.com may review from time to time and delete any content that violates this Agreement or which might be offensive, illegal, or harm the safety of or violate the rights of other users and members.
             </p>
             <p>
                Content that is illegal or prohibited, includes, but is not limited to, material, text, graphics, video or audio that:
Is unlawful, harassing, libelous, abusive, threatening, harmful, bigoted, racially offensive, obscene or otherwise objectionable
Encourages conduct that could constitute a criminal offense, gives rise to civil liability or otherwise violate any applicable local, state, national or international law or regulation
             </p>
             <p>
                Transmits or posts any unsolicited or unauthorized advertising, "spam," junk mail, "chain letters," "pyramid schemes," etc.
Transmits or posts any content that infringes upon patents, trademarks, trade secrets, copyrights or other proprietary rights
Transmits or posts any viruses or material designed to disrupt, limit or destroy any functionality of any computer software or hardware of users, members or the No1Marry.com service
             </p>
             <p>
                Collects, stores or solicits information about other users or members for commercial or unlawful purposes or engage in commercial activity such as contests, sweepstakes, etc. without No1Marry.com prior consent
Contains personally identifiable information about another member that is published without their express consent
Advertises any illegal services or the sale of any items prohibited or restricted by applicable law
Has misleading email addresses or other manipulated identifiers to disguise its origin
             </p>
          </ol>
          <ol>
            <li>Monitoring of Information</li>
            <p>
                We reserve the right to monitor all messages to ensure that they conform to the above stated content guidelines.
            </p>
            <li> Links To Third Party Sites</li>
            <p>
                Any links included within No1Marry.com that take users out of the No1Marry.com site are not under the control of No1Marry.com and No1Marry.com shall not be responsible for the content of any linked site or any link contained in a linked site. All such sites shall be subject to the policies and procedures of the owner of such site. We encourage you to read those policies and know your rights
            </p>
            <li>Transactions with Organizations or Individuals</li>
            <p>
                No1Marry.com shall not be liable for your interactions with any organizations and/or individuals found on or through the No1Marry.com service. This includes, but is not limited to, payment and delivery of goods and services, and any other terms, conditions, warranties or representations associated with such dealings. These dealings are solely between you and such organizations and/or individuals. You agree that No1Marry.com is not responsible for any damage or loss incurred as a result of any such dealings. No1Marry.com is under no obligation to become involved in disputes between participants on the site, or between participants on the site and any third party. In the event of a dispute, you release No1Marry.com, its officers, employees, agents and successors in rights from claims, damages and demands of every kind, known or unknown, suspected or unsuspected, disclosed or undisclosed, arising out of or in any way related to such disputes and our service. No1Marry.com do not recommend or approve of any kind of gift /dowry system for the candidates registered with this organization. No1Marry.com do not accept any commission or brokerage from the candidates for matchmaking. Only the approved and website displayed tariff for registrations are accepted
            </p>
            <li>Privacy and use of Information</li>
            <p>
                By using the services you acknowledge that (a) we cannot ensure the security privacy of information you provide through the Internet and your email messages, and you release us from any and all liability in connection with the use of such information by other parties; (b) we are not responsible for, and cannot control, the use by others of any information which you provide to them and you should use caution in selecting the personal information you provide to others through the Service; and (c) we cannot assume any responsibility for the content of messages sent by other users of the Service, and you release us from any and all liability in connection with the contents of any communications you may receive from other users. We cannot guarantee, and assume no responsibility for verifying, the accuracy of the information provided by other users of the Service regarding particulars of status, age, income of other members. Your membership is only for personal use. It is not to be assigned, transferred or licensed so as to be used by any other person/entity. (d) members profile(s) and photos may be crawled and indexed by search engines, where No1Marry.com does not have any control over the search engines behavior and No1Marry.com shall not be responsible for such activities of other search engines. No1Marry.com has the right to change its features and services from time to time based on members comments or as a result of a change of policy in our company.
            </p>
            <li>Termination</li>
            <p class="d-flex">
               <span >a)</span>
               <span class="ml-2">
                No1Marry.com reserves the right to refuse membership to anyone. No1Marry.com may terminate your membership and any and all information, communications or postings, at any time, without notice, for conduct that violates this Agreement.
               </span> 
            </p>
            <p class="d-flex">
                <span >b)</span>
                <span class="ml-2">
                    No1Marry.com can terminate your membership without any notice for conduct that violates this agreement.
                </span> 
             </p>
             <p class="d-flex">
                <span >c)</span>
                <span class="ml-2">
                    If we find duplicate profiles then we have the right to suspend any of the profile or all of the profile.
                </span> 
             </p>
             <p class="d-flex">
                <span >d)</span>
                <span class="ml-2">
                    Any unethical messages, telephonic calls or any other such misbehavior by a No1Marry.com registered candidates or by their families to a fellow registered candidates or to their family will lead immediate termination of their profiles without any prior information.
                </span> 
             </p>
             <li> Disclaimer of Warranties</li>
             <p>
                you expressly agree that use of the services and/or any graphics or other content you download from the No1Marry.com site is at your sole risk and that you will be solely responsible for any damage to your computer system or loss of data that results from the download of files, software, services and/or any graphics or other content. the services and/or any graphics or other content you download from the No1Marry.com site are provided on an "as is" basis. No1Marry.com, its licensors and suppliers expressly disclaim all warranties of any kind, whether express, implied, statutory or otherwise, including, but not limited to the implied warranties of merchantability, fitness for a particular purpose and non-infringement. neither No1Marry.com, nor its licensors or suppliers make any warranty that the software, services and/or any graphics or other content you download from the No1Marry.com site will meet your requirements, or that the software or service will be uninterrupted, timely, secure, or error free; nor does No1Marry.com, its licensors or suppliers make any warranty as to the results that may be obtained from the use of the service or as to the accuracy or reliability of any information obtained through the service or that defects in the software will be corrected.
             </p>
             <li> Limitation of liability</li>
             <p>
                In no event shall No1Marry.com, its licensors or suppliers be liable to you or any third party for any indirect, incidental, special or consequential damages, resulting from the use or the inability to use the software, service, and/or any graphics or other content, including but not limited to, damages for loss of profits, even if No1Marry.com has been advised of the possibility of such damages. Further No1Marry.com shall have no liability to you or other third parties for any third party content uploaded onto or downloaded from the service. Some jurisdictions do not allow the limitation or exclusion of liability for incidental or consequential damages so some of the above limitations may not apply to you.
             </p>
             <li>Indemnity</li>
             <p>
                you hereby agree, at your expense, to indemnify, defend and hold No1Marry.com harmless from and against any loss, cost, damages, liability, and/or expense arising out of or relating to (a) third party claims, actions or allegations of infringement based on information, data or content you submitted in connection with the service, (b) any fraud or manipulation, or other breach of this agreement, by you, or (c) third party claims, actions or allegations brought against No1Marry.com arising out of your use of the service or software.
             </p>
             <li> General Terms</li>
             <p>
                This agreement is governed in all respects by the laws of the Union of India and local state laws, rules and regulations and any dispute arising hereunder shall be subjected to the jurisdiction of Munsif Court Punalur and you consent to the exclusive jurisdiction of the Court. If any provision of this Agreement is held to be invalid or unenforceable, such provision shall be struck and the remaining provisions shall be enforced. No1Marry.com failure to act with respect to a breach by you does not waive No1Marry.com right to act with respect to subsequent or similar breaches. You may not assign or transfer this Agreement or any rights hereunder, and any attempt to the contrary is void. This Agreement shall inure to the benefit of and be binding upon each party's successors and assigns. No1Marry.com shall not be liable for any delay or failure to perform resulting directly or indirectly from any causes beyond No1Marry.com's reasonable control. Any notice required or given to you under this Agreement shall be delivered by electronic mail at the e-mail address provided by you during registration.
             </p>
             <li>Special Admonitions for International use</li>
             <p>
                As a consequence of the global nature of the Internet, you agree to comply with all local rules regarding user conduct on the Internet and acceptable content. This Agreement constitutes the complete and exclusive understanding and agreement of the parties relating to the subject matter hereof and supersedes all prior understandings, proposals, agreements, negotiations, and discussions between the parties, whether written or oral. You understand and agree that you are solely responsible for reviewing the terms of this Agreement from time to time. Any continued use of the Software or Service by you after such amended terms have been posted or information regarding such amendment has been sent to you, shall be deemed your consent and agreement to such amended terms.
             </p>
             <p>
                This is an online platform, technical issues are common and No1marry.com management will not be held responsible. Our services should be accepted only after a lot of thought and interest
             </p>
             <p>
                By registering on No1Marry.com you agree that you have read the above terms, and would abide to these terms of use/agreement.
             </p>
             <p>
        No1Marry.com (the “Site”) and the Licensed Mobile Application for Accessing the Site (including all associated media and online or electronic documentation) (“the Application”), are owned and operated by<address> No1Marry.com</address>
    </p>
    
          </ol>
     </div>
 </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="btngroup float-right">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            
            </div>
             
          </div>
          
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal" id="myshipping">
    <div class="modal-dialog">
      <div class="modal-content" id="content">
  
        <!-- Modal Header -->
        <div class="modal-header">
         <h3>Shipping & Delivery Policy </h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
             <div class="container">
                 <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                         
                     </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                   
                    <ol>
                        <li><b>Profile Activation::</b>
                            <span class="ml-2">
                                     Your profile activation is part of the service delivery process.
                                     Once your profile is activated, resources and efforts are invested in promoting and matching your profile with potential matches.

                            </span>
                        </li>
                         <li><b>Change in Circumstances:</b>
                            <span class="ml-2">
                                     In the event of a change in your circumstances (e.g., finding a match independently), the services cannot be cancelled, and the fees are non-refundable.

                            </span>
                        </li>
                         <li><b> Inactivity:</b>
                            <span class="ml-2">
                                     Non-usage or inactivity on the platform does not entitle the user to a refund or cancellation of services.


                            </span>
                        </li>
                        <li><b> Discontinuation of Services:</b>
                            <span class="ml-2">
                                     <p>No.1 Marry.com reserves the right to discontinue services if there is a breach of our terms of use or if any user engages in fraudulent activities.</p>
                                     <p>If you have any questions or concerns regarding our Non-Refund & Cancellation Policy, please contact our customer support team at <b> [<a href="mailto:numberonemarry@gmail.com"> numberonemarry@gmail.com</a><br><span class="ml-3"><a href="tel:+918301070161">+91 8301070161</a></span>,
                                 <!--<span class="ml-2"><a href="tel:+918301070161">+91 8301070161</a>,</span> -->
                                 </b></p>
                                     <p>By availing of our services, you acknowledge that you have read, understood, and agreed to abide by the terms of our Non-Refund & Cancellation Policy.</p>
                                     <p>Thank you for choosing No.1 Marry.com. We appreciate the opportunity to assist you in your journey to find a life partner.</p>
                            </span>
                        </li>
                    </ol>
                     </div>
                 </div>
             </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="btngroup float-right">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            
            </div>
             
          </div>
          
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal" id="myPayment">
    <div class="modal-dialog">
      <div class="modal-content" id="content">
  
        <!-- Modal Header -->
        <div class="modal-header">
         <h3>Payment Policy </h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
             <div class="container">
                 <div class="row">
                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                         Thank you for choosing No.1 Marry.com. We are committed to providing you with a seamless and effective matchmaking experience. Please take a moment to review our Non-Refund & Cancellation Policy outlined below:
                     </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                   
                    <ol>
                        <li><b> Payment Policy::</b>
                            <span class="ml-2">
                                    All payments made for our matrimonial services are non-refundable.
Payment confirms your intention to avail of our services, and our team begins the process of assisting you in finding a suitable match promptly.


                            </span>
                        </li>
                         <li><b>Cancellation of Services:</b>
                            <span class="ml-2">
                                  Once the payment is made, our services commence, and cancellation is not possible.
In the event of unforeseen circumstances, we encourage you to get in touch with our customer support team for assistance and understanding.

                            </span>
                        </li>
                         <li><b> Termination of Membership:</b>
                            <span class="ml-2">
                                   Memberships cannot be terminated or cancelled once activated.
Any termination request will not result in a refund of the membership fee.



                            </span>
                        </li>
                        
                    </ol>
                     </div>
                 </div>
             </div>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="btngroup float-right">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            
            </div>
             
          </div>
          
        </div>
      </form>
      </div>
    </div>
  </div>
   <!--  -->
           <!-- <div class="container">-->
           <!--       <div class="row">-->
           <!--                      <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-4">-->
                        
           <!--               <h5 class="text-center">About</h5>-->
           <!--               <p>No1 Marry.com is a part of No1 Marry.com - the pioneers of online matrimony service. Today, we are the most trusted Matrimony website by Brand Trust Report. Millions of happy marriages happened and continue to happen through No.1 Marry.com.</p>-->
                        
                          
           <!--            </div>-->
           <!--            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-4">-->
                       
           <!--              <h5 class="text-center">Quick Link</h5>-->
           <!--                 <ul>-->
                             
           <!--                    <li><a type="button"  data-bs-toggle="modal" data-bs-target="#myModalabout">About Us</a></li>-->
           <!--                    <li><a type="button"  data-bs-toggle="modal" data-bs-target="#myModal">Help & Support</a></li>-->
           <!--                      <li><a type="button"  data-bs-toggle="modal" data-bs-target="#myModalterm">Terms and Conditions</a></li>-->
           <!--                    <li><a type="button"  data-bs-toggle="modal" data-bs-target="#myModalprivacy">Privacy Policy</a></li>-->
           <!--                 </ul>-->
                            
           <!--            </div>-->
           <!--            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-4">-->
                        
           <!--               <h5 class="text-center">Contact Us</h5>-->
           <!--               <ul>-->
           <!--      <li><a href="mailto:numberonemarry@gmail.com"><i class="fa fa-solid fa-enevelope"></i><span class="me-1">numberonemarry@gmail.com</span></a></li>-->
           <!--      <li><a href="tel:+918281050418"><i class="fa-solid fa-phone"></i><span class="me-1">+91 8281050418</span></a></li>-->
                 <!--<li><a href="tel:+918301070161"><span class="ml-3">+91  8301070161</span></a></li>-->
           <!--  </ul>-->
             
               
                       
                         
           <!--            </div>-->
           <!--       </div>-->
           <!-- </div>-->
           <!--<div class="row">-->
           <!--     <div class="col-lg-12">-->
           <!--           <p class="text-center mt-3">© 2024 No1marry. All Rights Reserved.</p>-->
           <!--     </div>-->
           <!--</div>-->
            <!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted"  style="background-color : #F7F7F7">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <!--<a href="" class="me-4 text-reset">-->
      <!--  <i class="fab fa-linkedin"></i>-->
      <!--</a>-->
      <!--<a href="" class="me-4 text-reset">-->
      <!--  <i class="fab fa-github"></i>-->
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4" style="font-weight:800">
            <i class="fas fa-gem me-3"></i>No1 Marry.com
          </h6>
          <p>
            The pioneers of online matrimony service. Today, we are the most trusted Matrimony website by Brand Trust Report. Millions of happy marriages happened and continue to happen through No.1 Marry.com
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bolder mb-4" style="font-weight:800">
            Useful links
          </h6>
          <p>
            <a type="button" class="text-reset"  data-bs-toggle="modal" data-bs-target="#myModalabout">About Us</a>
          </p>
          <p>
            <a type="button" class="text-reset" data-bs-toggle="modal" data-bs-target="#myModal">Help & Support</a>
          </p>
          <p>
            <a type="button" class="text-reset"  data-bs-toggle="modal" data-bs-target="#myModalterm">Terms and Conditions</a>
          </p>
          <p>
            <a type="button" class="text-reset"  data-bs-toggle="modal" data-bs-target="#myModalprivacy">Privacy Policy</a>
          </p>
        </div>
        <!-- Grid column -->


        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bolder mb-4" style="font-weight:800">Contact</h6>
          <!--<p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>-->
          <p>
            <i class="fas fa-envelope me-3"></i>
            numberonemarry@gmail.com
          </p>
          <p><i class="fa-brands fa-whatsapp me-3"></i> + 91  8301070161</p>
          <!--<p><i class="fas fa-print me-3"></i> +91  8281050418</p>-->
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2025 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">No1marry.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
        </footer>
        @if (get_setting('show_cookies_agreement') == 'on')
        <div class="aiz-cookie-alert shadow-xl">
            <div class="p-3 bg-dark rounded">
                <div class="text-white mb-3">
                    @php
                        echo get_setting('cookies_agreement_text');
                    @endphp
                </div>
                <button class="btn btn-primary aiz-cookie-accepet">
                    {{ translate('Ok. I Understood') }}
                </button>
            </div>
        </div>
    @endif

    @yield('modal')

    <div class="modal fade account_status_change_modal" id="modal-zoom">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <form class="form-horizontal member-block" action="{{ route('member.account_deactivation') }}" method="POST">
                        @csrf
                        <input type="hidden" name="deacticvation_status" id="deacticvation_status" value="">
                        <h4 class="modal-title h6 mb-3" id="confirmation_note" value=""></h4>
                        <hr>
                        <button type="submit" class="btn btn-primary mt-2">{{translate('Yes')}}</button>
                        <button type="button" class="btn btn-danger mt-2" onclick="closebasic()">{{translate('No')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 <script>
            $(document).ready(function(){       
             $("#notification").mouseenter(function(){
                $("#view").show();
             });
           $("#notification").mouseleave(function(){
                $("#view").hide();
             });
             $("#inbox").mouseenter(function(){
                $("#inbox-view").show();
             });
           $("#inbox").mouseleave(function(){
                $("#inbox-view").hide();
             });
             $("#user_id").mouseenter(function(){
                $("#usermenu-nav").show();
             });
           $("#user_id").mouseleave(function(){
                $("#usermenu-nav").hide();
             });
              $("#mobile-notification").mouseenter(function(){
                $(".mobileviewer-menu").show();
             });
           $("#mobile-notification").mouseleave(function(){
                $(".mobileviewer-menu").hide();
             });
             $("#mobile_inbox").mouseenter(function(){
                 $("#mobile-inbox-view").show();
             });
              $("#mobile_inbox").mouseleave(function(){
                 $("#mobile-inbox-view").hide();
             });
               $("#mobileuser_id").mouseenter(function(){
                 $("#mobile-usermenu-nav").show();
             });
              $("#mobileuser_id").mouseleave(function(){
                 $("#mobile-usermenu-nav").hide();
             });
               $(".fa-home").click(function(){
                 $(".fa-home").hide();
                  $(".bi-x-circle-fill").show();
                  $("#mobile-toogle").show();
             });
              $(".bi-x-circle-fill").click(function(){
                 $(".fa-home").show();
                   $(".bi-x-circle-fill").hide();
                   $("#mobile-toogle").hide();
             });
              }); 
           
             
          
</script>
    @if (get_setting('facebook_chat_activation') == 1)
    <script type="text/javascript">
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v3.3'
            });
            };

            (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <div id="fb-root"></div>
    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="{{ env('FACEBOOK_PAGE_ID') }}">
    </div>
    @endif
    <script src="{{ static_asset('assets/js/vendors.js') }}"></script>
    <script src="{{ static_asset('assets/js/aiz-core.js') }}"></script>

    @yield('script')

    <script type="text/javascript">
        @foreach (session('flash_notification', collect())->toArray() as $message)
  	       AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
  	    @endforeach

        @if(Auth::check() && Auth::user()->user_type == 'member')
          function account_deactivation(){
            var status = {{ Auth::user()->deactivated }}
            $('.account_status_change_modal').modal('show');
            if(status == 0)
            {
                $('#deacticvation_status').val(1);
                $('#confirmation_note').html('{{ translate('Do You Realy Want To Deactive Your Account') }}');
            }
            else {
                $('#deacticvation_status').val(0);
                $('#confirmation_note').html('{{ translate('Are You Sure To Reactive Your Account') }}');
            }
          }
        @endif


    </script>

    <!--{!! get_setting('footer_script') !!}-->
    <!--      <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>-->
    <!--      <script>-->
    <!--        $(document).ready(function(){-->
    <!--          $("#viewpopup").click(function(){-->
    <!--            Swal.fire({-->
    <!--        title: "Please Upgrade Your Plan",-->
    <!--        showDenyButton: false,-->
    <!--        showCancelButton: true,-->
    <!--        confirmButtonText: "Purchase Your Package",-->
    <!--        confirmButtonText: '<a href="{{ route('packages') }}" class="purchase-id">Purchase Your Package</a>',-->
    <!--      }).then((result) => {-->
           
    <!--      });-->
    <!--          });-->
    <!--        });-->
    <!--        </script>-->
 

          
    <!--      <script>-->
          <!--     Initialize Bootstrap components
    <!--        $(document).ready(function () {-->
    <!--          $('[data-bs-toggle="collapse"]').collapse();-->
    <!--        });-->
    <!--      </script>-->
          
    <!--        <script>-->
    <!--      $(document).ready(function(){-->
    <!--        $('.dropdown-submenu a.test').on("click", function(e){-->
    <!--          $(this).next('ul').toggle();-->
    <!--          e.stopPropagation();-->
    <!--          e.preventDefault();-->
    <!--        });-->
    <!--      });-->
          
          
          
    <!--      </script>-->
          <!--  -->
       
          <script src="{{ static_asset('assets/assets_1/js/bootstrap.bundle.js') }}"></script>
          <script src="{{ static_asset('assets/assets_1/js/bootstrap.bundle.min.js') }}"></script>
          <script src="{{ static_asset('assets/assets_1/js/bootstrap.esm.js') }}"></script>
          <script src="{{ static_asset('assets/assets_1/js/bootstrap.esm.min.js') }}"></script>
          <script src="{{ static_asset('assets/assets_1/js/bootstrap.esm.min.js') }}"></script>
          <script src="{{ static_asset('assets/assets_1/js/bootstrap.js') }}"></script>
          <script src="{{ static_asset('assets/assets_1/js/bootstrap.min.js') }}"></script>
          <script src="{{ static_asset('assets/assets_1/js/normalize.js') }}"></script>
          <script src="{{ static_asset('assets/assets_1/js/normalize1.js') }}"></script>
          <script src="{{ static_asset('assets/assets_1/js/slider.js') }}"></script>
      
         <script>
  function closebasic() {
    $('#modal-zoom').modal('hide');
  }
  document.getElementById('closeButton').addEventListener('click', closePopup)
</script>

<!--<script>-->
<!--    document.onkeydown = function(e) {-->
<!--if(event.keyCode == 123) {-->
<!--return false;-->
<!--}-->
<!--if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){-->
<!--return false;-->
<!--}-->
<!--if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){-->
<!--return false;-->
<!--}-->
<!--if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){-->
<!--return false;-->
<!--}-->
<!--}-->
<!--</script>-->
          
          <!--<script src="{{ static_asset('assets/assets_1/js/swipper.js') }}"></script>-->
          <!--<script src="{{ static_asset('assets/assets/js/register.js') }}"></script>-->
          </body>
          </html>
