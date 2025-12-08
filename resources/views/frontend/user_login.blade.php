<!DOCTYPE html>
<html lang="en">
<head>
  <title>No1 Marry.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>-->
   <link rel="icon" type="image/x-icon" href="{{ static_asset('assets/assets/img/favicon.png') }}">
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/bootstrap.min.css') }}">
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="{{ static_asset('assets/assets/css/select2.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/stylemedia.css') }}">

 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- new  script -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- end -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>
<style>

/*body {*/
/*    min-height: 100vh;*/
    /* background: #3bb77e; */
    /* background: #FEFAF6; */
/*    background-image: url("/public/assets/img/Blue and Gold Traditional Indian Wedding Thank You Card (33).png");*/
    /* background-size: cover; */
/*    }*/

/*      #span*/
/*      {*/
/*          display:none;*/
/*          color:red;*/
/*          font-size:x-small;*/
/*          font-weight:400;*/
/*      }*/
/*.form-control {*/
/*	display: block;*/
/*	width: 100%;*/
/*	padding: .375rem .75rem;*/
/*	font-size: 1rem;*/
/*	font-weight: 400;*/
/*	line-height: 1.5;*/
/*	color: #fff;*/
/*	background-color: #fff;*/
/*	background-clip: padding-box;*/
/*	border: 1px solid #ced4da;*/
/*	-webkit-appearance: none;*/
/*	-moz-appearance: none;*/
/*	appearance: none;*/
/*	border-radius: .25rem;*/
/*	transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;*/
/*	font-size: 16px !important;*/
/*}*/
/*.select2-container .select2-selection--single .select2-selection__rendered {*/
/*	display: block;*/
/*	padding-left: 8px;*/
/*	padding-right: 20px;*/
/*	overflow: hidden;*/
/*	text-overflow: ellipsis;*/
/*	white-space: nowrap;*/
/*	font-size: 16px !important;*/
/*}*/
/*.helpsupport{*/
/*    color:#003285;*/
/*    font-weight:800;*/
/*}*/
/*.main{*/
/*    padding-top:'50px';*/
/*}*/
/*@media (max-width: 550px) {*/

/*    body {*/
/*    background-image: url("/public/assets/img/Blue and Gold Traditional Indian Wedding Thank You Card (34).png");*/
/*  }*/

body{
    font-family: 'Cereal Bytes', sans-serif;
}
.gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}

.card-price {
	display: inline-block;
  
  width: auto;
	height: 38px;
	
	background-color: #6ab070;
	-webkit-border-radius: 3px 4px 4px 3px;
	-moz-border-radius: 3px 4px 4px 3px;
	border-radius: 3px 4px 4px 3px;
	
	border-left: 1px solid #6ab070;

	/* This makes room for the triangle */
	margin-left: 19px;
	
	position: relative;
	
	color: #fff;
	font-weight: 800;
	font-size: 22px;
	line-height: 38px;

	padding: 0 10px 0 10px;
}

/* Makes the triangle */
.card-price:before {
	content: "";
	position: absolute;
	display: block;
	left: -19px;
	width: 0;
	height: 0;
	border-top: 19px solid transparent;
	border-bottom: 19px solid transparent;
	border-right: 19px solid #6ab070;
}

/* Makes the circle */
.card-price:after {
	content: "";
	background-color: white;
	border-radius: 50%;
	width: 4px;
	height: 4px;
	display: block;
	position: absolute;
	left: -9px;
	top: 17px;
}
</style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body >

<!--  <header>-->
<!--    <div class="container-fluid">-->
<!--          <div class="row">-->
               
<!--          </div>-->
<!--    </div>-->
<!--</header>-->
<!--<section class="mt-5">-->
<!--          <div class="container-fluid">-->
<!--                <div class="row ">-->
<!--                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">-->

<!--                </div>-->
                
<!--          </div>-->
<!--</section>-->
<!--<section class="mt-5">-->
<!--      <div class="container-fluid">-->
<!--             <div class="row justifycontent">-->
<!--                   <div class="col-xxl-3 col-xl-3 col-lg-5 col-md-5 col-sm-12 col-12">-->
<!--                    <h3 class="mt-5 text-center text-secondary">{{ translate('Login to your account') }}</h3>-->
<!--                        <form action="{{ route('login') }}" method="POST" class="mt-3 login" autocomplete="nope" target="_blank">-->
<!--                            @csrf-->
<!--                            @if (addon_activation('otp_system'))-->
<!--                               <div class="row">-->
<!--                                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">-->
<!--                                              <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ translate('  Phone')}}" name="email" id="email" autocomplete="nope">   -->
<!--                                        </div>-->
                                     
<!--                               </div>-->
<!--                            @else -->
<!--                                <div class="row">-->
<!--                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4 mt5">-->
<!--                                           <select class="form-control select2 " id="dropdown11" name="country_code">-->
<!--                                                   <option value="91"> (IN) +91)</option>-->
<!--                                                   <option value="93"> (AF) +93</option>-->
<!--                                                   <option value="358"> (AX) +358</option>-->
<!--                                                   <option value="355"> (AL) +355</option>-->
<!--                                                   <option value="213">(DZ) +213</option>-->
<!--                                                   <option value="1684"> (AS) +1684</option>-->
<!--                                                   <option value="376"> (AD) +376</option>-->
<!--                                                   <option value="244"> (AO) +244</option>-->
<!--                                                   <option value="1264"> (AI) +1264</option>-->
<!--                                                   <option value="672">(AQ) +672</option>-->
<!--                                                   <option value="1268"> (AG) +1268</option>-->
<!--                                                   <option value="54"> (AR) +54</option>-->
<!--                                                   <option value="374"> (AM) +374</option>-->
<!--                                                   <option value="297">(AW) +297</option>-->
<!--                                                   <option value="61">(AU) +61</option>-->
<!--                                                   <option value="43"> (AT) +43</option>-->
<!--                                                   <option value="994">(AZ) +994</option>-->
<!--                                                   <option value="1242"> (BS) +1242</option>-->
<!--                                                   <option value="973">(BH) +973</option>-->
<!--                                                   <option value="880">(BD) +880</option>-->
<!--                                                   <option value="1246"> (BB) +1246</option>-->
<!--                                                   <option value="375"> (BY) +375</option>-->
<!--                                                   <option value="32"> (BE) +32</option>-->
<!--                                                   <option value="501"> (BZ) +501</option>-->
<!--                                                   <option value="229"> (BJ) +229</option>-->
<!--                                                   <option value="1441">(BM) +1441</option>-->
<!--                                                   <option value="975">(BT) +975</option>-->
<!--                                                   <option value="591">(BO) +591</option>-->
<!--                                                   <option value="599">(BQ) +599</option>-->
<!--                                                   <option value="387"> (BA) +387</option>-->
<!--                                                   <option value="267"> (BW) +267</option>-->
<!--                                                   <option value="55">(BV) +55</option>-->
<!--                                                   <option value="55"> (BR) +55</option>-->
<!--                                                   <option value="246">(IO) +246</option>-->
<!--                                                   <option value="673"> (BN) +673</option>-->
<!--                                                   <option value="359">(BG) +359)</option>-->
<!--                                                   <option value="226"> (BF) +226</option>-->
<!--                                                   <option value="257">(BI) +257</option>-->
<!--                                                   <option value="855"> (KH) +855</option>-->
<!--                                                   <option value="237"> (CM) +237</option>-->
<!--                                                   <option value="1"> (CA) +1</option>-->
<!--                                                   <option value="238"> (CV) +238</option>-->
<!--                                                   <option value="1345"> (KY) +1345</option>-->
<!--                                                   <option value="236">(CF) +236</option>-->
<!--                                                   <option value="235"> (TD) +235</option>-->
<!--                                                   <option value="56"> (CL) +56</option>-->
<!--                                                   <option value="86"> (CN) +86</option>-->
<!--                                                   <option value="61">(CX) +61</option>-->
<!--                                                   <option value="672"> (CC) +672</option>-->
<!--                                                   <option value="57"> (CO) +57</option>-->
<!--                                                   <option value="269"> (KM) +269</option>-->
<!--                                                   <option value="242">(CG) +242</option>-->
<!--                                                   <option value="242"> (CD) +242</option>-->
<!--                                                   <option value="682">(CK) +682</option>-->
<!--                                                   <option value="506">(CR) +506</option>-->
<!--                                                   <option value="225"> (CI) +225</option>-->
<!--                                                   <option value="385">(HR) +385</option>-->
<!--                                                   <option value="53"> (CU) +53</option>-->
<!--                                                   <option value="599">(CW) +599</option>-->
<!--                                                   <option value="357">(CY) +357</option>-->
<!--                                                   <option value="420"> (CZ) +420</option>-->
<!--                                                   <option value="45"> (DK) +45</option>-->
<!--                                                   <option value="253"> (DJ) +253</option>-->
<!--                                                   <option value="1767">(DM) +1767</option>-->
<!--                                                   <option value="1809"> (DO) +1809</option>-->
<!--                                                   <option value="593"> (EC) +593</option>-->
<!--                                                   <option value="20"> (EG) +20</option>-->
<!--                                                   <option value="503"> (SV) +503</option>-->
<!--                                                   <option value="240">(GQ) +240</option>-->
<!--                                                   <option value="291"> (ER +291)</option>-->
<!--                                                   <option value="372"> (EE) +372</option>-->
<!--                                                   <option value="251"> (ET) +251</option>-->
<!--                                                   <option value="500">(FK) +500</option>-->
<!--                                                   <option value="298">(FO) +298</option>-->
<!--                                                   <option value="679">(FJ) +679</option>-->
<!--                                                   <option value="358"> (FI) +358</option>-->
<!--                                                   <option value="33"> (FR) +33</option>-->
<!--                                                   <option value="594"> (GF) +594</option>-->
<!--                                                   <option value="689"> (PF) +689</option>-->
<!--                                                   <option value="262">(TF) +262</option>-->
<!--                                                   <option value="241"> (GA) +241</option>-->
<!--                                                   <option value="220">(GM) +220</option>-->
<!--                                                   <option value="995"> (GE) +995</option>-->
<!--                                                   <option value="49"> (DE) +49</option>-->
<!--                                                   <option value="233"> (GH) +233</option>-->
<!--                                                   <option value="350"> (GI) +350</option>-->
<!--                                                   <option value="30"> (GR) +30</option>-->
<!--                                                   <option value="299"> (GL) +299</option>-->
<!--                                                   <option value="1473"> (GD) +1473</option>-->
<!--                                                   <option value="590"> (GP) +590</option>-->
<!--                                                   <option value="1671">(GU) +1671</option>-->
<!--                                                   <option value="502"> (GT) +502</option>-->
<!--                                                   <option value="44"> (GG) +44</option>-->
<!--                                                   <option value="224"> (GN) +224</option>-->
<!--                                                   <option value="245">(GW) +245</option>-->
<!--                                                   <option value="592"> (GY) +592</option>-->
<!--                                                   <option value="509">(HT) +509</option>-->
<!--                                                   <option value="39">(VA) +39</option>-->
<!--                                                   <option value="504"> (HN) +504</option>-->
<!--                                                   <option value="852"> (HK) +852</option>-->
<!--                                                   <option value="36"> (HU) +36</option>-->
<!--                                                   <option value="354"> (IS) +354</option>-->
<!--                                                   <option value="62">(ID) +62</option>-->
<!--                                                   <option value="98">(IR) +98</option>-->
<!--                                                   <option value="964"> (IQ) +964</option>-->
<!--                                                   <option value="353"> (IE) +353</option>-->
<!--                                                   <option value="44"> (IM) +44</option>-->
<!--                                                   <option value="972"> (IL) +972</option>-->
<!--                                                   <option value="39"> (IT) +39</option>-->
<!--                                                   <option value="1876"> (JM) +1876</option>-->
<!--                                                   <option value="81"> (JP) +81</option>-->
<!--                                                   <option value="44"> (JE) +44</option>-->
<!--                                                   <option value="962"> (JO) +962</option>-->
<!--                                                   <option value="7"> (KZ) +7</option>-->
<!--                                                   <option value="254"> (KE) +254</option>-->
<!--                                                   <option value="686">(KI) +686</option>-->
<!--                                                   <option value="850">(KP) +850</option>-->
<!--                                                   <option value="82">(KR) +82</option>-->
<!--                                                   <option value="383">(XK) +383</option>-->
<!--                                                   <option value="965"> (KW) +965</option>-->
<!--                                                   <option value="996"> (KG) +996</option>-->
<!--                                                   <option value="856"> (LA) +856</option>-->
<!--                                                   <option value="371">(LV +371)</option>-->
<!--                                                   <option value="961"> (LB +961)</option>-->
<!--                                                   <option value="266"> (LS +266)</option>-->
<!--                                                   <option value="231"> (LR +231)</option>-->
<!--                                                   <option value="218">(LY +218)</option>-->
<!--                                                   <option value="423"> (LI +423)</option>-->
<!--                                                   <option value="370"> (LT +370)</option>-->
<!--                                                   <option value="352"> (LU +352)</option>-->
<!--                                                   <option value="853"> (MO +853)</option>-->
<!--                                                   <option value="389"> (MK +389)</option>-->
<!--                                                   <option value="261"> (MG +261)</option>-->
<!--                                                   <option value="265"> (MW +265)</option>-->
<!--                                                   <option value="60"> (MY +60)</option>-->
<!--                                                   <option value="960"> (MV +960)</option>-->
<!--                                                   <option value="223"> (ML +223)</option>-->
<!--                                                   <option value="356"> (MT +356)</option>-->
<!--                                                   <option value="692">(MH +692)</option>-->
<!--                                                   <option value="596">(MQ +596)</option>-->
<!--                                                   <option value="222"> (MR +222)</option>-->
<!--                                                   <option value="230"> (MU +230)</option>-->
<!--                                                   <option value="262"> (YT +262)</option>-->
<!--                                                   <option value="52"> (MX +52)</option>-->
<!--                                                   <option value="691"> (FM +691)</option>-->
<!--                                                   <option value="373"> (MD) +373)</option>-->
<!--                                                   <option value="377"> (MC) +377</option>-->
<!--                                                   <option value="976"> (MN) +976</option>-->
<!--                                                   <option value="382">(ME) +382</option>-->
<!--                                                   <option value="1664"> (MS) +1664</option>-->
<!--                                                   <option value="212"> (MA) +212</option>-->
<!--                                                   <option value="258">(MZ) +258</option>-->
<!--                                                   <option value="95"> (MM +95</option>-->
<!--                                                   <option value="264"> (NA) +264</option>-->
<!--                                                   <option value="674"> (NR) +674</option>-->
<!--                                                   <option value="977"> (NP) +977</option>-->
<!--                                                   <option value="31"> (NL) +31</option>-->
<!--                                                   <option value="599">(AN) +599</option>-->
<!--                                                   <option value="687">(NC) +687</option>-->
<!--                                                   <option value="64"> (NZ) +64</option>-->
<!--                                                   <option value="505"> (NI) +505</option>-->
<!--                                                   <option value="227"> (NE) +227</option>-->
<!--                                                   <option value="234">(NG) +234</option>-->
<!--                                                   <option value="683"> (NU) +683</option>-->
<!--                                                   <option value="672"> (NF) +672</option>-->
<!--                                                   <option value="1670"> (MP) +1670</option>-->
<!--                                                   <option value="47"> (NO) +47</option>-->
<!--                                                   <option value="968">(OM) +968</option>-->
<!--                                                   <option value="92"> (PK) +92</option>-->
<!--                                                   <option value="680"> (PW) +680</option>-->
<!--                                                   <option value="970">(PS) +970</option>-->
<!--                                                   <option value="507"> (PA) +507</option>-->
<!--                                                   <option value="675">(PG) +675</option>-->
<!--                                                   <option value="595"> (PY) +595</option>-->
<!--                                                   <option value="51"> (PE) +51</option>-->
<!--                                                   <option value="63"> (PH) +63</option>-->
<!--                                                   <option value="64"> (PN) +64</option>-->
<!--                                                   <option value="48"> (PL) +48</option>-->
<!--                                                   <option value="351"> (PT) +351</option>-->
<!--                                                   <option value="1787">(PR) +1787</option>-->
<!--                                                   <option value="974">(QA) +974</option>-->
<!--                                                   <option value="262"> (RE) +262</option>-->
<!--                                                   <option value="40"> (RO) +40</option>-->
<!--                                                   <option value="7"> (RU) +7</option>-->
<!--                                                   <option value="250">(RW) +250</option>-->
<!--                                                   <option value="590"> (BL) +590</option>-->
<!--                                                   <option value="290">(SH) +290</option>-->
<!--                                                   <option value="1869"> (KN) +1869</option>-->
<!--                                                   <option value="1758">(LC) +1758</option>-->
<!--                                                   <option value="590"> (MF) +590</option>-->
<!--                                                   <option value="508">(PM) +508</option>-->
<!--                                                   <option value="1784"> (VC) +1784</option>-->
<!--                                                   <option value="684">(WS) +684</option>-->
<!--                                                   <option value="378"> (SM) +378</option>-->
<!--                                                   <option value="239">(ST) +239</option>-->
<!--                                                   <option value="966"> (SA) +966</option>-->
<!--                                                   <option value="221"> (SN) +221</option>-->
<!--                                                   <option value="381"> (RS) +381</option>-->
<!--                                                   <option value="248"> (SC) +248</option>-->
<!--                                                   <option value="232"> (SL) +232</option>-->
<!--                                                   <option value="65"> (SG) +65</option>-->
<!--                                                   <option value="721"> (SX) +721</option>-->
<!--                                                   <option value="421"> (SK) +421</option>-->
<!--                                                   <option value="386">(SI) +386</option>-->
<!--                                                   <option value="677">(SB) +677</option>-->
<!--                                                   <option value="252"> (SO) +252</option>-->
<!--                                                   <option value="27">(ZA) +27</option>-->
<!--                                                   <option value="500"> (GS) +500</option>-->
<!--                                                   <option value="211"> (SS) +211</option>-->
<!--                                                   <option value="34">(ES) +34</option>-->
<!--                                                   <option value="94">(LK) +94</option>-->
<!--                                                   <option value="249">(SD) +249</option>-->
<!--                                                   <option value="597">(SR) +597</option>-->
<!--                                                   <option value="47"> (SJ) +47</option>-->
<!--                                                   <option value="268"> (SZ +268)</option>-->
<!--                                                   <option value="46"> (SE +46)</option>-->
<!--                                                   <option value="41"> (CH +41)</option>-->
<!--                                                   <option value="963">(SY +963)</option>-->
<!--                                                   <option value="886">(TW +886)</option>-->
<!--                                                   <option value="992">(TJ +992)</option>-->
<!--                                                   <option value="255">(TZ +255)</option>-->
<!--                                                   <option value="66"> (TH +66)</option>-->
<!--                                                   <option value="670"> (TL) +670</option>-->
<!--                                                   <option value="228">(TG) +228</option>-->
<!--                                                   <option value="690">(TK) +690</option>-->
<!--                                                   <option value="676"> (TO)+676</option>-->
<!--                                                   <option value="1868"> (TT) +1868</option>-->
<!--                                                   <option value="216"> (TN) +216</option>-->
<!--                                                   <option value="90">Turkey (TR) +90</option>-->
<!--                                                   <option value="7370">(TM) +7370</option>-->
<!--                                                   <option value="1649"> (TC) +1649</option>-->
<!--                                                   <option value="688">(TV) +688</option>-->
<!--                                                   <option value="256">(UG) +256</option>-->
<!--                                                   <option value="380"> (UA) +380</option>-->
<!--                                                   <option value="971">(AE) +971</option>-->
<!--                                                   <option value="44">(GB) +44</option>-->
<!--                                                   <option value="1"> (US) +1</option>-->
<!--                                                   <option value="1"> (UM) +1</option>-->
<!--                                                   <option value="598"> (UY) +598</option>-->
<!--                                                   <option value="998"> (UZ) +998</option>-->
<!--                                                   <option value="678"> (VU) +678</option>-->
<!--                                                   <option value="58"> (VE) +58</option>-->
<!--                                                   <option value="84">(VN) +84</option>-->
<!--                                                   <option value="1284"> (VG) +1284</option>-->
<!--                                                   <option value="1340"> (VI) +1340</option>-->
<!--                                                   <option value="681">(WF) +681</option>-->
<!--                                                   <option value="212"> (EH) +212</option>-->
<!--                                                   <option value="967"> (YE) +967</option>-->
<!--                                                   <option value="260"> (ZM) +260</option>-->
<!--                                                   <option value="263"> (ZW) +263</option>-->
<!--                </select>-->
<!--                                    </div>  -->
                                   
<!--                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 col-xs-8 mt-2">-->
                                        
<!--                                        <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{  translate('Mobile Number') }}" name="email" id="email" autocomplete="nope">   -->
<!--                                    </div>                             -->
<!--                                </div>-->
<!--                            @endif-->
<!--                            @error('email')-->
<!--                                    <span class="invalid-feedback" role="alert" style="display: block;">{{ $message }}</span>-->
<!--                            @enderror-->
<!--                            @if (addon_activation('otp_system'))-->
<!--                                    <span class="opacity-60">{{ translate('Use country code before number') }}</span>-->
<!--                            @endif-->
                              
<!--                              <div class="row mt-5">-->
<!--                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">-->
<!--                                  <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ translate('Password') }}" name="password" id="password" required>-->
<!--                                  <i class="toggle-password fa fa-fw fa-eye-slash"></i>-->
<!--                                </div>-->
<!--                                @error('password')-->
<!--                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>-->
<!--                                @enderror-->
                                
<!--                                <div style="width: 100%;padding: 10px;">-->
<!--                                  <a href="{{ route('password.request') }}" style="justify-content: right; display: flex;">{{ translate('Forgot Password?') }}</a>-->
<!--                                </div>-->

<!--                              </div>-->
<!--                              <div class="row mt-4">-->
<!--                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12 textcenter">-->
<!--                                     <input type="submit" class="btn btn-primary" id="login_btn" value="Login">-->
<!--                                </div>-->
<!--                              </div>-->
<!--                              {{-- <div class="row mt-4">-->
<!--                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">-->
<!--                                      <span class="floatleft" id="box-btn">-->
<!--                                        <input type="submit" class="btn btn-violet " value="{{ translate('Login to your Account') }}">-->
<!--                                      </span>-->
<!--                                      <span class="floatright" id="box-btn"> -->
<!--                                        <a href="{{ route('password.request') }}" class="btn btn-red">{{ translate('Forgot Password?') }}</a>-->
<!--                                      </span>   -->
<!--                                </div>-->
<!--                              </div> --}}-->
<!--                              {{-- <div class="row mt-4">-->
<!--                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12 textcenter">-->
<!--                                     <a class="btn btn-light"><img src="assets/img/google.png" alt="no.1marry" class="google-icon"><span class="ml-2 google-text">Sign in with Google</span></a> -->
<!--                              </div>-->
<!--                                </div> --}}-->
                             
<!--                            <div class="row mt-4">-->
<!--                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12 textcenter">-->
<!--                                    <h6><span class="text-account"><span class="text-black">New to No 1marry.com ? </span><a href="https://no1marry.com/">{{ translate('Create an account') }}</a></span>-->
<!--                                    </h6> -->
<!--                                  </div>-->
<!--                            </div>-->

<!--                            </div>-->
                           
<!--                        </form>-->
<!--                   </div>-->
<!--                       <div class="helpsupport">-->
<!--        HELP & SUPPORT-->
<!--        <div>-->
<!--            Numberonemarry@gmail.com-->
<!--        </div>-->
<!--        <div>-->
<!--             8281050418-->
<!--        </div>-->
<!--        <div>WhatsApp : 8129001182</div>-->
<!--    </div>-->
<!--             </div>-->
<!--      </div>-->
<!--</section>-->

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="/public/assets/img/logo2.1.png"
                    style="width: 185px;" alt="logo">
                  <!--<h4 class="mt-1 mb-5 pb-1">We are The No1Marry Team</h4>-->
                </div>

                <form action="{{ route('login') }}" method="POST" class="mt-3 login" autocomplete="nope">
                    @csrf
                  <p>Please login to your account</p>
                  <div data-mdb-input-init class="form-outline mb-4">
                                        <select name="country_code" id="dropdown11" value="91" hidden style="display:none" ><option value="91"> (IN) +91)</option></select>

                    <input type="text" id="form2Example11" class="form-control"
                      placeholder="Enter Your Phone Number" name="email" id="email" />
                    <!--<label class="form-label" for="form2Example11">Username</label>-->
                                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="display: block;">{{ $message }}</span>
                            @enderror
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" name="password" id="password" required placeholder="Enter Your Password" />
                    <!--<label class="form-label" for="form2Example22">Password</label>-->
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" value="Login">Log
                      in</button>
                    <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                  </div>
                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger"
                        onclick="window.location.href='https://no1marry.com/user/registration'">
                        Create new
                    </button>

                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  
                <h4 class="mb-2">No1Marry: Your Path to True Love
                <!--<p class="card-price">-->
                    <!--<s> ₹99 </s> -->
                    <!--&nbsp; ₹249 for 45 Days</p>-->
                    </h4>
                <div class="d-flex justify-content-center"><img src="/public/assets/Animation - 1739662909439.gif"
                     alt="logo"></div>
                
                <!--<p class="small mb-0">Find Your Life Partner Without Hidden Costs or Hassle.</p>-->

<p>
Find your perfect life partner with No1Marry! Connect with genuine profiles, explore matches tailored to your preferences, and take control of your journey to love—simple, hassle-free, and designed just for you.</p>
<!--<p>-->
<!--‣ ₹249 for 45 Days-->

<!--</p> -->
<!--<p>‣ ₹299 for 3 months</p>-->
<!--<p>‣ ₹899 for 6 months</p>-->

<!--<p>-->
<!--    Browse curated profiles tailored to your preferences, reach out to as many people as you like, and take control of your search for love. No upsells, no pressure — just a simple, affordable way to find your match.-->

<!--</p>              </div>-->
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  
</section>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>-->
<!--<script>-->
  
<!--    $(document).ready(function()-->
<!--    {-->
<!--     $('#dropdown_112').select2();-->
<!--     )};-->
<!--<script>-->
<!--  function openNav() {-->
<!--    document.getElementById("mySidenav").style.width = "250px";-->
<!--    document.getElementById("main").style.marginLeft = "250px";-->
<!--    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";-->
<!--  }-->
  
<!--  function closeNav() {-->
<!--    document.getElementById("mySidenav").style.width = "0";-->
<!--    document.getElementById("main").style.marginLeft= "0";-->
<!--    document.body.style.backgroundColor = "white";-->
<!--  }-->
<!--  </script>-->
<script>
  $(".toggle-password").click(function() {
     $(this).toggleClass("fa-eye fa-eye-slash");
     input = $(this).parent().find("input");
     if (input.attr("type") == "password") {
         input.attr("type", "text");
     } else {
         input.attr("type", "password");
     }
 });
 </script>
 
<script>
  
    $(document).ready(function()
    {
     $('#dropdown_1').select2();
     $('#dropdown_2').select2();
     $('#dropdown_3').select2();
     $('#dropdown_4').select2();
     $('#dropdown_5').select2();
     $('#dropdown_6').select2();
     $('#dropdown_7').select2();
     $('#dropdown_8').select2();
     $('#dropdown_9').select2();
     $('#dropdown_10').select2();
     $('#dropdown_11').select2();
     $('#dropdown_12').select2();
     $('#dropdown_13').select2();
     $('#dropdown_14').select2();
     $('#dropdown_15').select2();
     $('#dropdown_16').select2();
     $('#dropdown_111').select2();
     $('#dropdown11').select2();
    });


 </script>
<!--//  <script>-->
<!--//     $(document).ready(function(){-->
<!--//       $("#email").click(function(){-->
<!--//           $("#span").show();-->
<!--//       }) -->
<!--//     });-->
<!--// </script>-->
<!--<script src="{{ static_asset('assets/assets/js/bootstrap.bundle.js') }}"></script>-->
<!--<script src="{{ static_asset('assets/assets/js/bootstrap.bundle.min.js') }}"></script>-->
<!--<script src="{{ static_asset('assets/assets/js/bootstrap.esm.js') }}"></script>-->
<!--<script src="{{ static_asset('assets/assets/js/bootstrap.esm.min.js') }}"></script>-->
<!--<script src="{{ static_asset('assets/assets/js/bootstrap.js') }}"></script>-->
<!--<script src="{{ static_asset('assets/assets/js/bootstrap.min.js') }}"></script>-->
</body>
</html>
