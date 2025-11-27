<!DOCTYPE html>
<html lang="en">
<head>
  <title>No1 Marry.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
 
  /*#hindu*/
  /*{*/
  /*  display: none;*/
  /*}*/
  .submit
  {
    display: none;
  }
  .form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 600 !important;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.select2-container--default .select2-results__option--disabled,.form-control .Employed,.select2-results__options li {
    color: #000 !important;
    font-weight: 600 !important;
}
.select2-container--default .select2-results__option {
    color: #000 !important;
    font-weight: 600 !important;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
    padding-left: 8px;
    padding-right: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-weight: 600 !important;
}
option {
    background-color: #ebf2f4;
    font-family: Montserrat;
    box-shadow: 1px 0px 2px 2px #e7e7e7;
    border-radius: 10px !important;
    padding-top: 11px;
    height: 50px;
    font-size: 15px;
    color: #000;
    border: none!important;
    font-weight: 600 !important;
}
.select2-results__option--selectable ,.select2-container--open .select2-dropdown--above
{
background:#ebf2f4 !important ;
}
  /* Optional: Customize the datepicker appearance */
  .ui-datepicker {
    font-size: 14px;
  }
  .mt-6
  {
      margin-top:5rem;
  }
</style>
<style>
  .select2-search__field
  {
    background-image: url('{{ static_asset('assets/assets/img/search.png') }}');
    background-repeat: no-repeat;
    background-position: 96% 60%;
  }
 #collapseTwo,#collapseThree,#collapseFour,#collapseFive,#collapseSix, #collapseSeven,  #collapseOne,.header_1
  {
    display: none;
  }
  .preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.loader {
  border: 8px solid #f3f3f3;
  border-radius: 50%;
  border-top: 8px solid #3498db;
  width: 50px;
  height: 50px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.content {
  display: none;
}

</style>
<body>
  <!--   <div class="preloader">-->
  <!--  <div class="loader"></div>-->
  <!--</div>-->
    <header id="header_1">
        <div class="container-fluid">
              <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        
                           <img src="{{ static_asset('assets/assets_1/img/logo.jpg') }}" alt="no.1marry" id="nav-brand">
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        
                      <ul id="nav-lang">
                         <!--<li><a href="{{ route('login') }}" class="btn btn-primary" id="login-btn">LOG IN</a></li>-->
                        
                         <li class="nav-item dropdown">
                           {{-- <form action="userpage.html" method="post" autocomplete="off"> --}}
                            <select id="lang-dropdown" class="bg-white">
                                <option>English</option>
                              <!--<option disabled selected="disabled">Language</option>-->
                              <!--<option>Malayalam</option>-->
                              <!--<option>Tamil</option>-->
                              <!--<option>Arabic</option>-->
                              <!--<option>Urdu</option>-->
                              
                              <!--<option>Mandarin Chinese</option>-->
                              <!--<option>Spanish</option>-->
                              <!--<option>Hindi</option>-->
                              <!--<option>Bengali</option>-->
                              <!--<option>Portuguese</option>-->
                              <!--<option>Russian</option>-->
                              <!--<option>Japanese</option>-->
                              <!--<option>Western Punjabi</option>-->
                              <!--<option>Javanese</option>-->
                              
    
                         </select>
                          </li>
                         
                      </ul>
                    
                 </div>
              </div>
        </div>
        <section>
            <div class="container-fluid">
              <div class="row floatright">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h6 class="floatright">
                   100% Genuine accounts <br>
                   100% User privacy</h6>
             </div>
              </div>
                  
            </div>
  </section>
    </header>
<header class="header_1">
    <div class="container-fluid">
          <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    
                       <img src="{{ static_asset('assets/assets/img/logo.jpg') }}" alt="no.1marry" id="nav-brand">
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    
                  <ul id="nav-lang">
                     <li>
                      <a href="#">
                        <span class="floatright" id="floatright">
                  
                        
                            <!--  --><span class="wrapper">  
                              <span id="progress-text">You Have completed </span>
                              <div class="progressbar" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="" style="--value:50"></div>
                           </span>
                            <!--  -->
                          </div>
                          </span>
                             
                         </span>

                     </a>
                    </li>
                    
                  
                     
                  </ul>
                  
             </div>
          </div>
    </div>
</header>

<section class="mt-5">
      <div class="container-fluid">
             <div class="row justifycontent">
                   <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                         <!--  -->
                           


  <div id="accordion">
    <div class="">
      <div class="cardheader">
        <!-- <a class="card-link" data-toggle="collapse" href="#collapseOne">
          Collapsible Group Item #1
        </a>
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        Collapsible Group Item #2
      </a>
         <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
          Collapsible Group Item #3
        </a>
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
          Collapsible Group Item #4
        </a>
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
          Collapsible Group Item #5
        </a>
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseSix">
          Collapsible Group Item #6
        </a>
        <a class="collapsed card-link" data-toggle="collapse" href="#collapseSeven">
          Collapsible Group Item #7
        </a> -->
      </div>
      
    </div>
   
    <div id="collapse_One">
      <div class="cardbody">
          <!--  -->
          <form class="form-default" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                       <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12" id="row">
                         <span class="textSelect_Profile" id="errorSelect_Profile"></span>
                         @php $on_behalves = \App\Models\OnBehalf::all(); @endphp
                              <select class="form-control select2 Select_Profile" id="dropdown_111" name="on_behalf" required>
                                <option value="" disabled selected="disable">Select Profile *</option>
                                @foreach ($on_behalves as $on_behalf)
                                <option value="{{$on_behalf->id}}">{{$on_behalf->name}}</option>
                                @endforeach
                              </select>
                       </div>
              </div>
              <div class="row mt-5">
                     <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                       <span class="textEnterName" id="errorEnterName"></span>
                           <input type="text" class="form-control EnterName" name="first_name" id="first_name" placeholder="{{translate('Name')}} *" autocomplete="nope"  required>
                     </div>
              </div>
              <div class="row mt-5">
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                 
                 <select class="form-control select2 " id="dropdown_112" name="country_code">
                   <option value="91">India (IN +91)</option>
                   <option value="93">Afghanistan (AF +93)</option>
                   <option value="358">Aland Islands (AX +358)</option>
                   <option value="355">Albania (AL +355)</option>
                   <option value="213">Algeria (DZ +213)</option>
                   <option value="1684">American Samoa (AS +1684)</option>
                   <option value="376">Andorra (AD +376)</option>
                   <option value="244">Angola (AO +244)</option>
                   <option value="1264">Anguilla (AI +1264)</option>
                   <option value="672">Antarctica (AQ +672)</option>
                   <option value="1268">Antigua and Barbuda (AG +1268)</option>
                   <option value="54">Argentina (AR +54)</option>
                   <option value="374">Armenia (AM +374)</option>
                   <option value="297">Aruba (AW +297)</option>
                   <option value="61">Australia (AU +61)</option>
                   <option value="43">Austria (AT +43)</option>
                   <option value="994">Azerbaijan (AZ +994)</option>
                   <option value="1242">Bahamas (BS +1242)</option>
                   <option value="973">Bahrain (BH +973)</option>
                   <option value="880">Bangladesh (BD +880)</option>
                   <option value="1246">Barbados (BB +1246)</option>
                   <option value="375">Belarus (BY +375)</option>
                   <option value="32">Belgium (BE +32)</option>
                   <option value="501">Belize (BZ +501)</option>
                   <option value="229">Benin (BJ +229)</option>
                   <option value="1441">Bermuda (BM +1441)</option>
                   <option value="975">Bhutan (BT +975)</option>
                   <option value="591">Bolivia (BO +591)</option>
                   <option value="599">Bonaire, Sint Eustatius and Saba (BQ +599)</option>
                   <option value="387">Bosnia and Herzegovina (BA +387)</option>
                   <option value="267">Botswana (BW +267)</option>
                   <option value="55">Bouvet Island (BV +55)</option>
                   <option value="55">Brazil (BR +55)</option>
                   <option value="246">British Indian Ocean Territory (IO +246)</option>
                   <option value="673">Brunei Darussalam (BN +673)</option>
                   <option value="359">Bulgaria (BG +359)</option>
                   <option value="226">Burkina Faso (BF +226)</option>
                   <option value="257">Burundi (BI +257)</option>
                   <option value="855">Cambodia (KH +855)</option>
                   <option value="237">Cameroon (CM +237)</option>
                   <option value="1">Canada (CA +1)</option>
                   <option value="238">Cape Verde (CV +238)</option>
                   <option value="1345">Cayman Islands (KY +1345)</option>
                   <option value="236">Central African Republic (CF +236)</option>
                   <option value="235">Chad (TD +235)</option>
                   <option value="56">Chile (CL +56)</option>
                   <option value="86">China (CN +86)</option>
                   <option value="61">Christmas Island (CX +61)</option>
                   <option value="672">Cocos (Keeling) Islands (CC +672)</option>
                   <option value="57">Colombia (CO +57)</option>
                   <option value="269">Comoros (KM +269)</option>
                   <option value="242">Congo (CG +242)</option>
                   <option value="242">Congo, Democratic Republic of the (CD +242)</option>
                   <option value="682">Cook Islands (CK +682)</option>
                   <option value="506">Costa Rica (CR +506)</option>
                   <option value="225">Cote d'Ivoire (CI +225)</option>
                   <option value="385">Croatia (HR +385)</option>
                   <option value="53">Cuba (CU +53)</option>
                   <option value="599">Curacao (CW +599)</option>
                   <option value="357">Cyprus (CY +357)</option>
                   <option value="420">Czech Republic (CZ +420)</option>
                   <option value="45">Denmark (DK +45)</option>
                   <option value="253">Djibouti (DJ +253)</option>
                   <option value="1767">Dominica (DM +1767)</option>
                   <option value="1809">Dominican Republic (DO +1809)</option>
                   <option value="593">Ecuador (EC +593)</option>
                   <option value="20">Egypt (EG +20)</option>
                   <option value="503">El Salvador (SV +503)</option>
                   <option value="240">Equatorial Guinea (GQ +240)</option>
                   <option value="291">Eritrea (ER +291)</option>
                   <option value="372">Estonia (EE +372)</option>
                   <option value="251">Ethiopia (ET +251)</option>
                   <option value="500">Falkland Islands (Malvinas) (FK +500)</option>
                   <option value="298">Faroe Islands (FO +298)</option>
                   <option value="679">Fiji (FJ +679)</option>
                   <option value="358">Finland (FI +358)</option>
                   <option value="33">France (FR +33)</option>
                   <option value="594">French Guiana (GF +594)</option>
                   <option value="689">French Polynesia (PF +689)</option>
                   <option value="262">French Southern Territories (TF +262)</option>
                   <option value="241">Gabon (GA +241)</option>
                   <option value="220">Gambia (GM +220)</option>
                   <option value="995">Georgia (GE +995)</option>
                   <option value="49">Germany (DE +49)</option>
                   <option value="233">Ghana (GH +233)</option>
                   <option value="350">Gibraltar (GI +350)</option>
                   <option value="30">Greece (GR +30)</option>
                   <option value="299">Greenland (GL +299)</option>
                   <option value="1473">Grenada (GD +1473)</option>
                   <option value="590">Guadeloupe (GP +590)</option>
                   <option value="1671">Guam (GU +1671)</option>
                   <option value="502">Guatemala (GT +502)</option>
                   <option value="44">Guernsey (GG +44)</option>
                   <option value="224">Guinea (GN +224)</option>
                   <option value="245">Guinea-Bissau (GW +245)</option>
                   <option value="592">Guyana (GY +592)</option>
                   <option value="509">Haiti (HT +509)</option>
                   <option value="39">Holy See (Vatican City State) (VA +39)</option>
                   <option value="504">Honduras (HN +504)</option>
                   <option value="852">Hong Kong (HK +852)</option>
                   <option value="36">Hungary (HU +36)</option>
                   <option value="354">Iceland (IS +354)</option>
                   <option value="62">Indonesia (ID +62)</option>
                   <option value="98">Iran, Islamic Republic of (IR +98)</option>
                   <option value="964">Iraq (IQ +964)</option>
                   <option value="353">Ireland (IE +353)</option>
                   <option value="44">Isle of Man (IM +44)</option>
                   <option value="972">Israel (IL +972)</option>
                   <option value="39">Italy (IT +39)</option>
                   <option value="1876">Jamaica (JM +1876)</option>
                   <option value="81">Japan (JP +81)</option>
                   <option value="44">Jersey (JE +44)</option>
                   <option value="962">Jordan (JO +962)</option>
                   <option value="7">Kazakhstan (KZ +7)</option>
                   <option value="254">Kenya (KE +254)</option>
                   <option value="686">Kiribati (KI +686)</option>
                   <option value="850">Korea, Democratic People's Republic of (North Korea) (KP +850)</option>
                   <option value="82">Korea, Republic of (South Korea) (KR +82)</option>
                   <option value="383">Kosovo (XK +383)</option>
                   <option value="965">Kuwait (KW +965)</option>
                   <option value="996">Kyrgyzstan (KG +996)</option>
                   <option value="856">Lao People's Democratic Republic (Laos) (LA +856)</option>
                   <option value="371">Latvia (LV +371)</option>
                   <option value="961">Lebanon (LB +961)</option>
                   <option value="266">Lesotho (LS +266)</option>
                   <option value="231">Liberia (LR +231)</option>
                   <option value="218">Libya (LY +218)</option>
                   <option value="423">Liechtenstein (LI +423)</option>
                   <option value="370">Lithuania (LT +370)</option>
                   <option value="352">Luxembourg (LU +352)</option>
                   <option value="853">Macao (MO +853)</option>
                   <option value="389">North Macedonia (MK +389)</option>
                   <option value="261">Madagascar (MG +261)</option>
                   <option value="265">Malawi (MW +265)</option>
                   <option value="60">Malaysia (MY +60)</option>
                   <option value="960">Maldives (MV +960)</option>
                   <option value="223">Mali (ML +223)</option>
                   <option value="356">Malta (MT +356)</option>
                   <option value="692">Marshall Islands (MH +692)</option>
                   <option value="596">Martinique (MQ +596)</option>
                   <option value="222">Mauritania (MR +222)</option>
                   <option value="230">Mauritius (MU +230)</option>
                   <option value="262">Mayotte (YT +262)</option>
                   <option value="52">Mexico (MX +52)</option>
                   <option value="691">Micronesia, Federated States of (FM +691)</option>
                   <option value="373">Moldova (MD +373)</option>
                   <option value="377">Monaco (MC +377)</option>
                   <option value="976">Mongolia (MN +976)</option>
                   <option value="382">Montenegro (ME +382)</option>
                   <option value="1664">Montserrat (MS +1664)</option>
                   <option value="212">Morocco (MA +212)</option>
                   <option value="258">Mozambique (MZ +258)</option>
                   <option value="95">Myanmar (MM +95)</option>
                   <option value="264">Namibia (NA +264)</option>
                   <option value="674">Nauru (NR +674)</option>
                   <option value="977">Nepal (NP +977)</option>
                   <option value="31">Netherlands (NL +31)</option>
                   <option value="599">Netherlands Antilles (AN +599)</option>
                   <option value="687">New Caledonia (NC +687)</option>
                   <option value="64">New Zealand (NZ +64)</option>
                   <option value="505">Nicaragua (NI +505)</option>
                   <option value="227">Niger (NE +227)</option>
                   <option value="234">Nigeria (NG +234)</option>
                   <option value="683">Niue (NU +683)</option>
                   <option value="672">Norfolk Island (NF +672)</option>
                   <option value="1670">Northern Mariana Islands (MP +1670)</option>
                   <option value="47">Norway (NO +47)</option>
                   <option value="968">Oman (OM +968)</option>
                   <option value="92">Pakistan (PK +92)</option>
                   <option value="680">Palau (PW +680)</option>
                   <option value="970">Palestine (PS +970)</option>
                   <option value="507">Panama (PA +507)</option>
                   <option value="675">Papua New Guinea (PG +675)</option>
                   <option value="595">Paraguay (PY +595)</option>
                   <option value="51">Peru (PE +51)</option>
                   <option value="63">Philippines (PH +63)</option>
                   <option value="64">Pitcairn (PN +64)</option>
                   <option value="48">Poland (PL +48)</option>
                   <option value="351">Portugal (PT +351)</option>
                   <option value="1787">Puerto Rico (PR +1787)</option>
                   <option value="974">Qatar (QA +974)</option>
                   <option value="262">Reunion (RE +262)</option>
                   <option value="40">Romania (RO +40)</option>
                   <option value="7">Russian Federation (RU +7)</option>
                   <option value="250">Rwanda (RW +250)</option>
                   <option value="590">Saint Barthelemy (BL +590)</option>
                   <option value="290">Saint Helena (SH +290)</option>
                   <option value="1869">Saint Kitts and Nevis (KN +1869)</option>
                   <option value="1758">Saint Lucia (LC +1758)</option>
                   <option value="590">Saint Martin (MF +590)</option>
                   <option value="508">Saint Pierre and Miquelon (PM +508)</option>
                   <option value="1784">Saint Vincent and the Grenadines (VC +1784)</option>
                   <option value="684">Samoa (WS +684)</option>
                   <option value="378">San Marino (SM +378)</option>
                   <option value="239">Sao Tome and Principe (ST +239)</option>
                   <option value="966">Saudi Arabia (SA +966)</option>
                   <option value="221">Senegal (SN +221)</option>
                   <option value="381">Serbia (RS +381)</option>
                   <option value="248">Seychelles (SC +248)</option>
                   <option value="232">Sierra Leone (SL +232)</option>
                   <option value="65">Singapore (SG +65)</option>
                   <option value="721">Sint Maarten (SX +721)</option>
                   <option value="421">Slovakia (SK +421)</option>
                   <option value="386">Slovenia (SI +386)</option>
                   <option value="677">Solomon Islands (SB +677)</option>
                   <option value="252">Somalia (SO +252)</option>
                   <option value="27">South Africa (ZA +27)</option>
                   <option value="500">South Georgia and the South Sandwich Islands (GS +500)</option>
                   <option value="211">South Sudan (SS +211)</option>
                   <option value="34">Spain (ES +34)</option>
                   <option value="94">Sri Lanka (LK +94)</option>
                   <option value="249">Sudan (SD +249)</option>
                   <option value="597">Suriname (SR +597)</option>
                   <option value="47">Svalbard and Jan Mayen (SJ +47)</option>
                   <option value="268">Swaziland (SZ +268)</option>
                   <option value="46">Sweden (SE +46)</option>
                   <option value="41">Switzerland (CH +41)</option>
                   <option value="963">Syrian Arab Republic (SY +963)</option>
                   <option value="886">Taiwan, Province of China (TW +886)</option>
                   <option value="992">Tajikistan (TJ +992)</option>
                   <option value="255">Tanzania, United Republic of (TZ +255)</option>
                   <option value="66">Thailand (TH +66)</option>
                   <option value="670">Timor-Leste (TL +670)</option>
                   <option value="228">Togo (TG +228)</option>
                   <option value="690">Tokelau (TK +690)</option>
                   <option value="676">Tonga (TO +676)</option>
                   <option value="1868">Trinidad and Tobago (TT +1868)</option>
                   <option value="216">Tunisia (TN +216)</option>
                   <option value="90">Turkey (TR +90)</option>
                   <option value="7370">Turkmenistan (TM +7370)</option>
                   <option value="1649">Turks and Caicos Islands (TC +1649)</option>
                   <option value="688">Tuvalu (TV +688)</option>
                   <option value="256">Uganda (UG +256)</option>
                   <option value="380">Ukraine (UA +380)</option>
                   <option value="971">United Arab Emirates (AE +971)</option>
                   <option value="44">United Kingdom (GB +44)</option>
                   <option value="1">United States (US +1)</option>
                   <option value="1">United States Minor Outlying Islands (UM +1)</option>
                   <option value="598">Uruguay (UY +598)</option>
                   <option value="998">Uzbekistan (UZ +998)</option>
                   <option value="678">Vanuatu (VU +678)</option>
                   <option value="58">Venezuela (VE +58)</option>
                   <option value="84">Vietnam (VN +84)</option>
                   <option value="1284">Virgin Islands, British (VG +1284)</option>
                   <option value="1340">Virgin Islands, U.S. (VI +1340)</option>
                   <option value="681">Wallis and Futuna (WF +681)</option>
                   <option value="212">Western Sahara (EH +212)</option>
                   <option value="967">Yemen (YE +967)</option>
                   <option value="260">Zambia (ZM +260)</option>
                   <option value="263">Zimbabwe (ZW +263)</option>
                </select>
               </div>
               <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 col-xs-8" id="mt_5">
                 <span class="textMobile_number" id="errorMobile_number"></span>
                     <input type="tel" class="form-control Mobile_number" placeholder="Enter Mobile number *" value="{{ old('phone') }}" name="phone" autocomplete="off" oninput="validateMobileNumber(this)" required>

               </div>
       </div>
              <div class="row mt-4">
                     <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                       <span class="textE_mail" id="errorE_mail"></span>
                           <input type="email" class="form-control E_mail" name="email" id="signinSrEmail" placeholder="{{ translate('Email Id') }} *" autocomplete="nope" name="E-mail"  required>
                     </div>
             </div>
             <!-- <div class="row mt4">
               <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                 <input type="password" class="form-control" placeholder="Create Password">
                 <i class="toggle-password fa fa-fw fa-eye-slash"></i>
               </div>
             </div> -->
             <div class="row mt-5">
               <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12 textcenter">
                 <a type="button" class="btn btn-primary profilebtn_1" id="Register-btn" value="Register Free">Register Free</a>
               </div>
             </div>  
             
           <div class="row mt-4">
                   <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12 textcenter">
                   <h6 class="text-condition"> By Clicking Register Free , I Agree <br>
                     to the <a href="{{ url('terms_and_conditions') }}" class="text-account">Terms & Conditions </a> and <a href="{{ url('privacy_policy') }}" class="text-account"> privacy policy</a>
                   </h6> 
                  </div>
           </div>
           <div class="row mt-4">
                   <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12 textcenter">
                   <h6><span class="text-black-50">Already have an account? <a href="{{ route('login') }}">Login</a></span>
                   </h6> 
                 </div>
           </div>
          
      </div>
      <div class="mt1"></div>
     
    </div>
    <div id="collapseOne">
      <div class="cardbody">
          <h3 class="text-center">Basic Details</h3>
          <!--  -->
          {{-- <form action=" " method="post" id="Register"> --}}
            <div class="row mt-3">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12" id="row"><span class="text-gender" id="errorgender"></span> 
                            <select class="form-control form-select select2 gender" id="dropdown_1" name="gender" required>
                                  <option value="" disabled selected="disable" style="font-weight600;">Select Gender *</option>
                                  <option value="1">{{translate('Male')}}</option>
											            <option value="2">{{translate('Female')}}</option>
                                  
                                  
                            </select>
                            
                    </div>
                   
                    
            </div>
            
           
            <div class="row mt-5">
              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                <span class="text-fill" id="errordob"></span>
                <input type="text" id="datepicker"
                class="form-control textbox-n dob" placeholder="{{ translate('Date Of Birth') }} *" name="date_of_birth" required>
                
                    
              </div>
            
        </div>
            
          <div class="row mt-5">
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
              <select class="form-control  select2 code" id="dropdown_3" name="countrycode" required>
               
                <option value="91">India (IN +91)</option>
                <option value="93">Afghanistan (AF +93)</option>
                <option value="358">Aland Islands (AX +358)</option>
                <option value="355">Albania (AL +355)</option>
                <option value="213">Algeria (DZ +213)</option>
                <option value="1684">American Samoa (AS +1684)</option>
                <option value="376">Andorra (AD +376)</option>
                <option value="244">Angola (AO +244)</option>
                <option value="1264">Anguilla (AI +1264)</option>
                <option value="672">Antarctica (AQ +672)</option>
                <option value="1268">Antigua and Barbuda (AG +1268)</option>
                <option value="54">Argentina (AR +54)</option>
                <option value="374">Armenia (AM +374)</option>
                <option value="297">Aruba (AW +297)</option>
                <option value="61">Australia (AU +61)</option>
                <option value="43">Austria (AT +43)</option>
                <option value="994">Azerbaijan (AZ +994)</option>
                <option value="1242">Bahamas (BS +1242)</option>
                <option value="973">Bahrain (BH +973)</option>
                <option value="880">Bangladesh (BD +880)</option>
                <option value="1246">Barbados (BB +1246)</option>
                <option value="375">Belarus (BY +375)</option>
                <option value="32">Belgium (BE +32)</option>
                <option value="501">Belize (BZ +501)</option>
                <option value="229">Benin (BJ +229)</option>
                <option value="1441">Bermuda (BM +1441)</option>
                <option value="975">Bhutan (BT +975)</option>
                <option value="591">Bolivia (BO +591)</option>
                <option value="599">Bonaire, Sint Eustatius and Saba (BQ +599)</option>
                <option value="387">Bosnia and Herzegovina (BA +387)</option>
                <option value="267">Botswana (BW +267)</option>
                <option value="55">Bouvet Island (BV +55)</option>
                <option value="55">Brazil (BR +55)</option>
                <option value="246">British Indian Ocean Territory (IO +246)</option>
                <option value="673">Brunei Darussalam (BN +673)</option>
                <option value="359">Bulgaria (BG +359)</option>
                <option value="226">Burkina Faso (BF +226)</option>
                <option value="257">Burundi (BI +257)</option>
                <option value="855">Cambodia (KH +855)</option>
                <option value="237">Cameroon (CM +237)</option>
                <option value="1">Canada (CA +1)</option>
                <option value="238">Cape Verde (CV +238)</option>
                <option value="1345">Cayman Islands (KY +1345)</option>
                <option value="236">Central African Republic (CF +236)</option>
                <option value="235">Chad (TD +235)</option>
                <option value="56">Chile (CL +56)</option>
                <option value="86">China (CN +86)</option>
                <option value="61">Christmas Island (CX +61)</option>
                <option value="672">Cocos (Keeling) Islands (CC +672)</option>
                <option value="57">Colombia (CO +57)</option>
                <option value="269">Comoros (KM +269)</option>
                <option value="242">Congo (CG +242)</option>
                <option value="242">Congo, Democratic Republic of the (CD +242)</option>
                <option value="682">Cook Islands (CK +682)</option>
                <option value="506">Costa Rica (CR +506)</option>
                <option value="225">Cote d'Ivoire (CI +225)</option>
                <option value="385">Croatia (HR +385)</option>
                <option value="53">Cuba (CU +53)</option>
                <option value="599">Curacao (CW +599)</option>
                <option value="357">Cyprus (CY +357)</option>
                <option value="420">Czech Republic (CZ +420)</option>
                <option value="45">Denmark (DK +45)</option>
                <option value="253">Djibouti (DJ +253)</option>
                <option value="1767">Dominica (DM +1767)</option>
                <option value="1809">Dominican Republic (DO +1809)</option>
                <option value="593">Ecuador (EC +593)</option>
                <option value="20">Egypt (EG +20)</option>
                <option value="503">El Salvador (SV +503)</option>
                <option value="240">Equatorial Guinea (GQ +240)</option>
                <option value="291">Eritrea (ER +291)</option>
                <option value="372">Estonia (EE +372)</option>
                <option value="251">Ethiopia (ET +251)</option>
                <option value="500">Falkland Islands (Malvinas) (FK +500)</option>
                <option value="298">Faroe Islands (FO +298)</option>
                <option value="679">Fiji (FJ +679)</option>
                <option value="358">Finland (FI +358)</option>
                <option value="33">France (FR +33)</option>
                <option value="594">French Guiana (GF +594)</option>
                <option value="689">French Polynesia (PF +689)</option>
                <option value="262">French Southern Territories (TF +262)</option>
                <option value="241">Gabon (GA +241)</option>
                <option value="220">Gambia (GM +220)</option>
                <option value="995">Georgia (GE +995)</option>
                <option value="49">Germany (DE +49)</option>
                <option value="233">Ghana (GH +233)</option>
                <option value="350">Gibraltar (GI +350)</option>
                <option value="30">Greece (GR +30)</option>
                <option value="299">Greenland (GL +299)</option>
                <option value="1473">Grenada (GD +1473)</option>
                <option value="590">Guadeloupe (GP +590)</option>
                <option value="1671">Guam (GU +1671)</option>
                <option value="502">Guatemala (GT +502)</option>
                <option value="44">Guernsey (GG +44)</option>
                <option value="224">Guinea (GN +224)</option>
                <option value="245">Guinea-Bissau (GW +245)</option>
                <option value="592">Guyana (GY +592)</option>
                <option value="509">Haiti (HT +509)</option>
                <option value="39">Holy See (Vatican City State) (VA +39)</option>
                <option value="504">Honduras (HN +504)</option>
                <option value="852">Hong Kong (HK +852)</option>
                <option value="36">Hungary (HU +36)</option>
                <option value="354">Iceland (IS +354)</option>
                <option value="62">Indonesia (ID +62)</option>
                <option value="98">Iran, Islamic Republic of (IR +98)</option>
                <option value="964">Iraq (IQ +964)</option>
                <option value="353">Ireland (IE +353)</option>
                <option value="44">Isle of Man (IM +44)</option>
                <option value="972">Israel (IL +972)</option>
                <option value="39">Italy (IT +39)</option>
                <option value="1876">Jamaica (JM +1876)</option>
                <option value="81">Japan (JP +81)</option>
                <option value="44">Jersey (JE +44)</option>
                <option value="962">Jordan (JO +962)</option>
                <option value="7">Kazakhstan (KZ +7)</option>
                <option value="254">Kenya (KE +254)</option>
                <option value="686">Kiribati (KI +686)</option>
                <option value="850">Korea, Democratic People's Republic of (North Korea) (KP +850)</option>
                <option value="82">Korea, Republic of (South Korea) (KR +82)</option>
                <option value="383">Kosovo (XK +383)</option>
                <option value="965">Kuwait (KW +965)</option>
                <option value="996">Kyrgyzstan (KG +996)</option>
                <option value="856">Lao People's Democratic Republic (Laos) (LA +856)</option>
                <option value="371">Latvia (LV +371)</option>
                <option value="961">Lebanon (LB +961)</option>
                <option value="266">Lesotho (LS +266)</option>
                <option value="231">Liberia (LR +231)</option>
                <option value="218">Libya (LY +218)</option>
                <option value="423">Liechtenstein (LI +423)</option>
                <option value="370">Lithuania (LT +370)</option>
                <option value="352">Luxembourg (LU +352)</option>
                <option value="853">Macao (MO +853)</option>
                <option value="389">North Macedonia (MK +389)</option>
                <option value="261">Madagascar (MG +261)</option>
                <option value="265">Malawi (MW +265)</option>
                <option value="60">Malaysia (MY +60)</option>
                <option value="960">Maldives (MV +960)</option>
                <option value="223">Mali (ML +223)</option>
                <option value="356">Malta (MT +356)</option>
                <option value="692">Marshall Islands (MH +692)</option>
                <option value="596">Martinique (MQ +596)</option>
                <option value="222">Mauritania (MR +222)</option>
                <option value="230">Mauritius (MU +230)</option>
                <option value="262">Mayotte (YT +262)</option>
                <option value="52">Mexico (MX +52)</option>
                <option value="691">Micronesia, Federated States of (FM +691)</option>
                <option value="373">Moldova (MD +373)</option>
                <option value="377">Monaco (MC +377)</option>
                <option value="976">Mongolia (MN +976)</option>
                <option value="382">Montenegro (ME +382)</option>
                <option value="1664">Montserrat (MS +1664)</option>
                <option value="212">Morocco (MA +212)</option>
                <option value="258">Mozambique (MZ +258)</option>
                <option value="95">Myanmar (MM +95)</option>
                <option value="264">Namibia (NA +264)</option>
                <option value="674">Nauru (NR +674)</option>
                <option value="977">Nepal (NP +977)</option>
                <option value="31">Netherlands (NL +31)</option>
                <option value="599">Netherlands Antilles (AN +599)</option>
                <option value="687">New Caledonia (NC +687)</option>
                <option value="64">New Zealand (NZ +64)</option>
                <option value="505">Nicaragua (NI +505)</option>
                <option value="227">Niger (NE +227)</option>
                <option value="234">Nigeria (NG +234)</option>
                <option value="683">Niue (NU +683)</option>
                <option value="672">Norfolk Island (NF +672)</option>
                <option value="1670">Northern Mariana Islands (MP +1670)</option>
                <option value="47">Norway (NO +47)</option>
                <option value="968">Oman (OM +968)</option>
                <option value="92">Pakistan (PK +92)</option>
                <option value="680">Palau (PW +680)</option>
                <option value="970">Palestine (PS +970)</option>
                <option value="507">Panama (PA +507)</option>
                <option value="675">Papua New Guinea (PG +675)</option>
                <option value="595">Paraguay (PY +595)</option>
                <option value="51">Peru (PE +51)</option>
                <option value="63">Philippines (PH +63)</option>
                <option value="64">Pitcairn (PN +64)</option>
                <option value="48">Poland (PL +48)</option>
                <option value="351">Portugal (PT +351)</option>
                <option value="1787">Puerto Rico (PR +1787)</option>
                <option value="974">Qatar (QA +974)</option>
                <option value="262">Reunion (RE +262)</option>
                <option value="40">Romania (RO +40)</option>
                <option value="7">Russian Federation (RU +7)</option>
                <option value="250">Rwanda (RW +250)</option>
                <option value="590">Saint Barthelemy (BL +590)</option>
                <option value="290">Saint Helena (SH +290)</option>
                <option value="1869">Saint Kitts and Nevis (KN +1869)</option>
                <option value="1758">Saint Lucia (LC +1758)</option>
                <option value="590">Saint Martin (MF +590)</option>
                <option value="508">Saint Pierre and Miquelon (PM +508)</option>
                <option value="1784">Saint Vincent and the Grenadines (VC +1784)</option>
                <option value="684">Samoa (WS +684)</option>
                <option value="378">San Marino (SM +378)</option>
                <option value="239">Sao Tome and Principe (ST +239)</option>
                <option value="966">Saudi Arabia (SA +966)</option>
                <option value="221">Senegal (SN +221)</option>
                <option value="381">Serbia (RS +381)</option>
                <option value="248">Seychelles (SC +248)</option>
                <option value="232">Sierra Leone (SL +232)</option>
                <option value="65">Singapore (SG +65)</option>
                <option value="721">Sint Maarten (SX +721)</option>
                <option value="421">Slovakia (SK +421)</option>
                <option value="386">Slovenia (SI +386)</option>
                <option value="677">Solomon Islands (SB +677)</option>
                <option value="252">Somalia (SO +252)</option>
                <option value="27">South Africa (ZA +27)</option>
                <option value="500">South Georgia and the South Sandwich Islands (GS +500)</option>
                <option value="211">South Sudan (SS +211)</option>
                <option value="34">Spain (ES +34)</option>
                <option value="94">Sri Lanka (LK +94)</option>
                <option value="249">Sudan (SD +249)</option>
                <option value="597">Suriname (SR +597)</option>
                <option value="47">Svalbard and Jan Mayen (SJ +47)</option>
                <option value="268">Swaziland (SZ +268)</option>
                <option value="46">Sweden (SE +46)</option>
                <option value="41">Switzerland (CH +41)</option>
                <option value="963">Syrian Arab Republic (SY +963)</option>
                <option value="886">Taiwan, Province of China (TW +886)</option>
                <option value="992">Tajikistan (TJ +992)</option>
                <option value="255">Tanzania, United Republic of (TZ +255)</option>
                <option value="66">Thailand (TH +66)</option>
                <option value="670">Timor-Leste (TL +670)</option>
                <option value="228">Togo (TG +228)</option>
                <option value="690">Tokelau (TK +690)</option>
                <option value="676">Tonga (TO +676)</option>
                <option value="1868">Trinidad and Tobago (TT +1868)</option>
                <option value="216">Tunisia (TN +216)</option>
                <option value="90">Turkey (TR +90)</option>
                <option value="7370">Turkmenistan (TM +7370)</option>
                <option value="1649">Turks and Caicos Islands (TC +1649)</option>
                <option value="688">Tuvalu (TV +688)</option>
                <option value="256">Uganda (UG +256)</option>
                <option value="380">Ukraine (UA +380)</option>
                <option value="971">United Arab Emirates (AE +971)</option>
                <option value="44">United Kingdom (GB +44)</option>
                <option value="1">United States (US +1)</option>
                <option value="1">United States Minor Outlying Islands (UM +1)</option>
                <option value="598">Uruguay (UY +598)</option>
                <option value="998">Uzbekistan (UZ +998)</option>
                <option value="678">Vanuatu (VU +678)</option>
                <option value="58">Venezuela (VE +58)</option>
                <option value="84">Vietnam (VN +84)</option>
                <option value="1284">Virgin Islands, British (VG +1284)</option>
                <option value="1340">Virgin Islands, U.S. (VI +1340)</option>
                <option value="681">Wallis and Futuna (WF +681)</option>
                <option value="212">Western Sahara (EH +212)</option>
                <option value="967">Yemen (YE +967)</option>
                <option value="260">Zambia (ZM +260)</option>
                <option value="263">Zimbabwe (ZW +263)</option>
            </select>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 col-xs-8" id="mt_5">
              <span class="text-fill" id="errormobile"></span>
                <input type="number" class="form-control mobile" placeholder="Alternate Number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" name="AlternateNumber">

                  

            </div>
          </div> 
          <div class="row mt-4">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
              <span class="text-fill" id="errorpassword"></span>
              <input type="password" class="form-control password" id="password" placeholder="Create Password *" name="password" autocomplete="off" required>
              <i class="toggle-password fa fa-fw fa-eye-slash"></i>
            </div>
            
          </div>
          <div class="row mt-5">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
              <span class="text-conformpassword" id="errorconformpassword"></span>
              <input type="password" class="form-control conformpassword" id="conformpassword" placeholder="Confirm password *" name="password_confirmation" required>
              <i class="toggle-password fa fa-fw fa-eye-slash"></i>  
            </div>
            
          </div>
          <div class="row mt-5">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12 textcenter">
              <!-- <input type="submit" class="btn btn-primary" id="Register-btn"  value="Continue"> -->
              <input type="button" class="btn btn-primary profilebtn1 mb-5" value="Continue" id="Register-btn">
              
  <!-- <button type="button" id="submitBtn" class="btn btn-primary mt-3">Submit</button> -->
            </div>
          </div>  
      
        
      </div>
      <div class="mt1"></div>
     
    </div>
    <div id="collapseTwo">
      <div class="cardbody">
               <h3 class="text-center">Religion/Caste details</h3>
          <div class="row mt-3">
             <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
              <span class="text-MotherTongue" id="errorMotherTongue"></span>
                 <select class="form-control select2 lang" id="dropdown_4" name="mothere_tongue" data-live-search="true" required>
                     <option value="" disabled selected="disabled">Select Mother Tongue *</option>
                     @foreach ($languages as $language)
                     <option value="{{$language->id}}">{{ $language->name }} </option>
                 @endforeach
                     
    
                </select>
                 
             </div>
          </div>
          <div class="row mt-5">
             <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
              <span class="text-Marital" id="errorMarital"></span> 
              <select class="form-control select2 marital" id="dropdown_5" name="marital_status" required>
                <option value="" disabled selected="disabled">Select Marital Status *</option>
                @foreach ($marital_statuses as $marital_status)
                <option value="{{$marital_status->id}}">{{$marital_status->name}}</option>
                @endforeach
              </select>
           
             </div>
          </div>
          <div class="row mt-5">
             <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
              <span class="text-religions" id="errorreligions"></span> 
              <select class="form-control select2 religion" id="dropdown_6" name="religion" required>
                <option value="" disabled selected="disabled">Select Religion *</option>
                @foreach ($religions as $religion)
                          <option value="{{$religion->id}}"> {{ $religion->name }} </option>
                      @endforeach
                
              </select>
                  
               
             </div>
            
          </div>
          <div id="hindu">
          <div class="row mt-5">
         
            <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
             <!-- depending dropdown -->
             <span class="text-caste" id="errorcaste"></span>  
             <select class="form-control select2 caste" id="dropdown_7" name="cast">
               <option value="" disabled selected="disabled">Select Caste *</option>
               
               
             </select>
             
            </div>
         </div>
         
      <div class="row mt-5">
        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
          <span class="text-SelectBirthStar" id="errorSSelectBirthStar"></span> 
            <select class="form-control SelectBirthStar" name="star">
                <option value="" disabled selected="disabled">Select Birth Star</option>
                <option value="ASWATHY"> ASWATHY</option>
                <option value="BHARANI ">BHARANI </option>
                <option value="KARTHIKA "> KARTHIKA  </option>
                <option value="ROHINI">ROHINI </option>
                <option value="MAKAYIRAM"> MAKAYIRAM </option>
                <option value="THIRUVATHIRA">THIRUVATHIRA </option>
                <option value="PUNARTHAM">PUNARTHAM </option>
                <option value=" POOYAM "> POOYAM </option>
                <option value="AYILYAM ">AYILYAM </option>
                <option value="MAKAM ">MAKAM </option>
                <option value="POORAM">POORAM </option>
                <option value=" UTRAM "> UTRAM </option>
                <option value="ATHAM ">ATHAM </option>
                <option value="CHITHIRA">CHITHIRA </option>
                <option value="CHOTHY"> CHOTHY </option>
                <option value="VISHAKAM ">VISHAKAM </option>
                <option value="ANIZHAM ">ANIZHAM</option>
                <option value="TRIKETTA">TRIKETTA</option>
                <option value="MOOLAM">MOOLAM </option>
                <option value="POORADAM">POORADAM </option>
                <option value="UTHARADAM">UTHARADAM </option>
                <option value="THIRUVONAM ">THIRUVONAM </option>
                <option value="AVITTAM">AVITTAM </option>
                <option value="CHATHAYAM ">CHATHAYAM </option>
                <option value="PURURUTTATHY ">PURURUTTATHY </option>
                <option value="UTHRITTATHY ">UTHRITTATHY </option>
                <option value="REVATHI">REVATHI</option>
                <option value="AQUARIUS">AQUARIUS</option>
               <option value="ARIES">ARIES</option>
               <option value="GEMINI">GEMINI</option>
               <option value="LIBRA">LIBRA</option>
               <option value="PISCES">PISCES</option>
               <option value="SAGITTARIUS">SAGITTARIUS</option>
               <option value="CANCER">CANCER</option>
               <option value="VIRGO">VIRGO</option>
               <option value="LEO">LEO</option>
               <option value="SCORPIO">SCORPIO</option>
               <option value="ROHINI">ROHINI</option>
              
              
           </select>
        </div>
     </div>
          <div class="row mt-4">
                 <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                      <!-- depending dropdown -->   
              <span class="text-jadhagam" id="errorjadhagam"></span>  
              <select class="form-control jadhagam" name="sudda_jadhaga">
                <option value="" disabled selected="disabled">Select Sudda Jadhagam</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="Don't Know">Don't know</option>
                
               
                
              </select>
           
                 </div>
          </div>
       <div class="row mt-5">
          <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                <!--  -->
                <div class="profile-pic-wrapper">
                  <div class="pic-holder">
                    <!-- uploaded pic shown here -->
                    <img id="profilePic" class="pic pic_1" src="{{ static_asset('assets/assets/img/jadham.png') }}" alt="User Jadhagam">
                  
                    <Input class="uploadProfileInput" type="file" name="jadhagam_pic" id="newProfilePhoto" accept="image/*" style="opacity: 0;" />
                    <label for="newProfilePhoto" class="upload-file-block">
                      <div class="text-center">
                        <div class="mb-2">
                          <i class="fa fa-camera fa-2x"></i>
                        </div>
                        <div class="text-uppercase">
                          Upload <br /> jadhagam
                        </div>
                      </div>
                    </label>
                  </div>
                
                 
                </div>
                <!--  -->
          </div>
      </div>
          </div>
          <div class="row mt-4">
             <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
              
              <input type="button" class="btn btn-primary profilebtn2 mb-5" id="Register-btn" value="Continue">
        
            </div>
          </div>
             
    
      </div>
    
    </div>
    <div id="collapseThree">
            <div class="cardbody">
                  <h3 class="text-center"> Personal details </h3>
              {{-- <form action="#" method="post" id="Regist/er"> --}}
                <div class="row">
                   <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12">
                    <span class="text-height" id="errorheight"></span>  
                    <input type="text" class="form-control height" id="height" name="height" placeholder="height *" required>
                   </div>
                   <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12 col-12"  Id="weight">
                    <span class="text-height" id="errorweight"></span>  
                       
                    <input type="text" class="form-control weight" name="weight" placeholder="weight *" required>
                   </div>
                </div>
                <div class="row mt-3">
                   <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                    <span class="text-Disbaility" id="errorDisbaility"></span>  
                    <select class="form-control Disbaility" name="disbaility" required>
                      <option value="" disabled selected="disabled">Select Disbaility *</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                     
                    </select>
                   </div>
                </div>
                <div class="row mt-3">
                   <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                    <span class="text-familystatus" id="errorfamilystatus"></span> 
                    <select class="form-control familystatus" name="familystatus" required>
                      <option value="" disabled selected="disabled">Select Family Status *</option>
                      @foreach ($familyStatus as $familyStatu)
                      <option value="{{$familyStatu->id}}"> {{ $familyStatu->name }}</option>
                  @endforeach
                      
                      
                    </select>
                         
                     
                   </div>
                  
                </div>
                <div class="row mt-3">
               
                  <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                   <!-- depending dropdown -->
                   <span class="text-familytype" id="errorfamilytype"></span> 
                   <select class="form-control familytype" name="community_value" required>
                     <option value="" disabled selected="disabled">Select Family Type *</option>
                     <option value="Joint Family">Joint Family</option>
                     <option value="Nuclear Family">Nuclear Family</option>
                     <option value="Others">Others</option>
                     
                     
                   </select>
                  </div>
               </div>
              
             
              
                <div class="row mt-5">
                   <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                    <input type="button" class="btn btn-primary profilebtn3 mb-5" id="Register-btn" value="Continue">
                   </div>
                </div>
                   
            </div>
            
          </div>
    <div id="collapseFour">
            <div class="cardbody">
                <h3 class="text-center">Professional details  </h3><br>
                <div class="row mt-3">
                   <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                    <span class="text-Education" id="errorEducation"></span> 
                       <select class="form-control select2 Education" id="dropdown_12" name="degree" required>
                             <option value="" disabled selected="disabled"><b>-- Any Bachelors in Engineering / Computers --</b></option>
                           <option value="Aeronautical Engineering">Aeronautical Engineering</option>
                           <option value="B.Arch">B.Arch</option>
                           <option value="BCA">BCA</option>
                           <option value="BE">BE</option>
                           <option value="B.Plan">B.Plan</option>
                           <option value="B.Sc IT/ Computer Science">B.Sc IT/ Computer Science</option>
                           <option value="B.Tech.">B.Tech.</option>
                           <option value="Other Bachelor Degree in Engineering / Computers">Other Bachelor Degree in Engineering / Computers</option>
                           <option value="B.S.(Engineering)">B.S.(Engineering)</option>
                        
                           <option value="" disabled selected="disabled"><b>-- Any Bachelors in Engineering / Computers --</b></option>
                           <option value="M.Arch.">M.Arch.</option>
                           <option value="MCA">MCA</option>
                           <option value="ME">ME</option>
                           <option value="M.Sc. IT / Computer Science">M.Sc. IT / Computer Science</option>
                           <option value="M.S.(Engg.)">M.S.(Engg.)</option>
                           <option value="M.Tech.">M.Tech.</option>
                           <option value="PGDCA">PGDCA</option>
                           <option value="Other Masters Degree in Engineering / Computers">Other Masters Degree in Engineering / Computers</option>
                           
                           <option value="" disabled selected="disabled"><b>--  Any Bachelors in Arts / Science / Commerce --</b></option>
                           <option value="Aviation Degree">Aviation Degree</option>
                           <option value="B.A.">B.A.</option>
                           <option value="B.Com.">B.Com.</option>
                           <option value="B.Ed.">B.Ed.</option>
                           <option value="BFA">BFA</option>
                           <option value="BFT">BFT</option>
                           <option value="BLIS">BLIS</option>
                           <option value="B.M.M.">B.M.M.</option>
                           <option value="B.Sc">B.Sc.</option>
                           <option value="B.S.W">B.S.W</option>
                           <option value="B.Phil.">B.Phil.</option>
                           <option value="Other Bachelor Degree in Arts / Science / Commerce">Other Bachelor Degree in Arts / Science / Commerce</option>
                           
                           <option value="" disabled selected="disabled"><b>--   Any Masters in Arts / Science / Commerce --</b></option>
                           <option value="M.A.">M.A.</option>
                           <option value="MCom">MCom</option>
                           <option value="M.Ed.">M.Ed.</option>
                           <option value="MFA">MFA</option>
                           <option value="MLIS">MLIS</option>
                           <option value="M.Sc.">M.Sc.</option>
                           <option value="MSW">MSW</option>
                           <option value="M.Phil.">M.Phil.</option>
                           <option value="Other Master Degree in Arts / Science / Commerce">Other Master Degree in Arts / Science / Commerce</option>
                           
                           <option value="" disabled selected="disabled"><b>--   Any Bachelors in Management --</b></option>
                           <option value="BBA">BBA</option>
                           <option value="BFM (Financial Management)">BFM (Financial Management)</option>
                           <option value="BHM (Hotel Management)">BHM (Hotel Management)</option>
                           <option value="Other Bachelor Degree in Management">Other Bachelor Degree in Management</option>
                           <option value="BHA / BHM (Hospital Administration)">BHA / BHM (Hospital Administration)</option>
                           
                           <option value="" disabled selected="disabled"><b>--   Any Masters in Management --</b></option>
                           <option value="MBA">MBA</option>
                           <option value="MFM (Financial Management)">MFM (Financial Management)</option>
                           <option value="MHM  (Hotel Management)">MHM  (Hotel Management)</option>
                           <option value="MHRM (Human Resource Management)">MHRM (Human Resource Management)</option>
                           <option value="PGDM">PGDM</option>
                           <option value="Other Master Degree in Management">Other Master Degree in Management</option>
                           <option value="MHA / MHM (Hospital Administration)">MHA / MHM (Hospital Administration)</option>
                          
                          <option value="" disabled selected="disabled"><b>-- Any Bachelors in Medicine in General / Dental / Surgeon  --</b></option>
                          <option value="B.A.M.S.">B.A.M.S.</option>
                          <option value="BDS">BDS</option>
                          <option value="BHMS">BHMS</option>
                          <option value="BSMS">BSMS</option>
                          <option value="BUMS">BUMS</option>
                          <option value="BVSc">BVSc</option>
                          <option value="MBBS">MBBS</option>
                         
                          <option value="" disabled selected="disabled"><b>-- Any Bachelors in Medicine in General / Dental / Surgeon  --</b></option>                          
                          <option value="MDS">MDS</option>
                          <option value="MD / MS (Medical)">MD / MS (Medical)</option>
                          <option value="MVSc">MVSc</option>
                          <option value="MCh">MCh</option>
                          <option value="DNB">DNB</option>
                          
                          <option value="" disabled selected="disabled"><b>-- Any Bachelors in Medicine Others  --</b></option> 
                          <option value="BPharm">BPharm</option>
                          <option value="BPT">BPT</option>
                          <option value="B.Sc. Nursing">B.Sc. Nursing</option>
                          <option value="Other Bachelor Degree in Medicine">Other Bachelor Degree in Medicine</option>
                          
                          <option value="" disabled selected="disabled"><b>-- Any Masters in Medicine Others  --</b></option>  
                          <option value="M.Pharm">M.Pharm</option>
                          <option value="MPT">MPT</option>
                          <option value="Other Master Degree in Medicine">Other Master Degree in Medicine</option>
                        
                          <option value="" disabled selected="disabled"><b>-- Any Bachelors in Legal </b>--</option>                           
                          <option value="BGL">BGL</option>
                          <option value="B.L.">B.L.</option>
                          <option value="LL.B.">LL.B.</option>
                          <option value="Other Bachelor Degree in Legal">Other Bachelor Degree in Legal</option>
                          
                          <option value="" disabled selected="disabled"><b>-- Any Masters in Legal --</b></option>  
                          <option value="LL.M.">LL.M.</option>
                          <option value="M.L.">M.L.</option>
                          <option value="Other Master Degree in  Legal">Other Master Degree in  Legal</option>
                         
                          <option value="" disabled selected="disabled"><b>-- Any Financial Qualification - ICWAI / CA / CS/ CFA  --</b></option> 
                          <option value="CA">CA</option>
                          <option value="CFA (Chartered Financial Analyst)">CFA (Chartered Financial Analyst)</option>
                          <option value="CS">CS</option>
                          <option value="ICWA">ICWA</option>
                          <option value="Other Degree in Finance">Other Degree in Finance</option>
                          
                          <option value="" disabled selected="disabled"><b>-- Service - IAS / IPS / IRS / IES / IFS  --</b></option> 
                          <option value="IAS">IAS</option>
                          <option value="IES">IES</option>
                          <option value="IFS">IFS</option>
                          <option value="IRS">IRS</option>
                         <option value="IPS">IPS</option>
                        <option value="Other Degree in Service">Other Degree in Service</option>
                        
                        <option value="" disabled selected="disabled"><b>-- Doctorates  --</b></option> 
                        <option value="Ph.D.">Ph.D.</option>
                        <option value="DM">DM</option>
                        <option value="Postdoctoral fellow">Postdoctoral fellow</option>
                        <option value="Fellow of National Board (FNB)">Fellow of National Board (FNB)</option>
                        
                        <option value="" disabled selected="disabled"><b>-- Any Diploma --</b></option> 
                        <option value="Diploma">Diploma</option>
                        <option value="Polytechnic">Polytechnic</option>
                        <option value="Trade School">Trade School</option>
                        <option value="Others in Diploma">Others in Diploma</option>
                        
                         <option value="" disabled selected="disabled"><b>-- Higher Secondary / Secondary --</b></option> 
                        <option value="Higher Secondary School / High School">Higher Secondary School / High School</option>
                        <option value="SSLC">SSLC</option>
                        <option value="others">Others</option>
                      
                        <option value="" disabled selected="disabled">Select Education *</option>
                           
                      </select>
                   </div>
                </div>
                <div class="row mt-5">
                   <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                    <span class="text-Occupation" id="errorOccupation"></span>
                    <select class="form-control select2 Occupation" id="dropdown_13" name="designation" required>
                      <option value="" selected="disabled">Select Occupation *</option>
                      <option value="ADMINISTRATION">ADMINISTRATION</option>
                      <option value="AGRICULTURE">AGRICULTURE</option>
                       <option value="AIRLINE">AIRLINE</option>
                       <option value="ARCHITECTURE &amp; DESIGN">ARCHITECTURE &amp; DESIGN</option>
                       <option value="BANKING &amp; FINANCE">BANKING &amp; FINANCE</option>
                       <option value="BEAUTY &amp; FASHION">BEAUTY &amp; FASHION</option>
                       <option value=" BPO &amp; CUSTOMER SERVICE"> BPO &amp; CUSTOMER SERVICE</option>
                       <option value="SCIVIL SERVICES">CIVIL SERVICES</option>
                       <option value="CORPORATE PROFESSIONALS">ACORPORATE PROFESSIONALS</option>
                      <option value="DEFENCE">DEFENCE</option>
                      <option value="EDUCATION &amp; TRAINING">EDUCATION &amp; TRAINING</option>
                      <option value="ENGINEERING">ENGINEERING</option>
                      <option value="HOSPITALITY">HOSPITALITY</option>
                      <option value="IT &amp; SOFTWARE">IT &amp; SOFTWARE</option>
                      <option value="LEGAL">LEGAL</option>
                      <option value="POLICE / LAW ENFORCEMENT">POLICE / LAW ENFORCEMENT</option>
                      <option value="MEDICAL &amp; HEALTHCARE-OTHERS">MEDICAL &amp; HEALTHCARE-OTHERS</option>
                      <option value="MEDIA &amp; ENTERTAINMENT">MEDIA &amp; ENTERTAINMENT</option>
                      <option value="MERCHANT NAVY">MERCHANT NAVY</option>
                      <option value="SCIENTIST">SCIENTIST</option>
                      <option value="DSENIOR MANAGEMENT">SENIOR MANAGEMENT</option>
                      <option value="DOCTOR">DOCTOR </option>
                      <option value="OTHERS">OTHERS</option>
                      <option disabled select="disable"><b>--FREQUENTLY USED--</b></option>
                      <option value="Business Owner / Entrepreneur">Business Owner / Entrepreneur</option>
                      <option value="Executive">Executive</option>
                      <option value="Software Professional">Software Professional</option>
                      <option value="Manager">Manager</option>
                      <option value="Supervisor">Supervisor</option>
                      <option value="Officer">Officer</option>
                      <option value="Engineer - Non IT">Engineer - Non IT</option>
                      <option value="Technician">Technician</option>
                      <option value="Clerk">Clerk</option>
                      <option value="Marketing Professional">Marketing Professional</option>
                       
                        <option disabled select="disable"><b>--ADMINISTRATION --</b></option>
                      <option value="Manage">Manage</option>
                      <option value="Supervisor">Supervisor</option>
                      <option value="Officer">Officer</option>
                      <option value="Administrative Professional">Administrative Professional</option>
                      <option value="Executive">Executive</option>
                      <option value="Clerk">Clerk</option>
                      <option value="Human Resources Professional">Human Resources Professional</option>
                      <option value="Secretary / Front Office">Secretary / Front Office</option>
                      
                      <option disabled select="disable"><b>--AGRICULTURE --</b></option>
                      <option value="Agriculture &amp; Farming Professional">Agriculture &amp; Farming Professional</option>
                      <option value="Horticulturist">Horticulturist</option>
                      
                      
                        <option disabled select="disable"><b>--AIRLINE --</b></option>
                      <option value="Pilot">Pilot</option>
                      <option value="Air Hostess / Flight Attendant">Air Hostess / Flig
                      
                      <option disabled select="disable"><b>--ARCHITECTURE &amp; DESIGN  --</b></option>
                      <option value="Architect">Architect</option>
                      <option value="Interior Designer">Interior Designer</option>
                    
                    
                        <option disabled select="disable"><b>-- BANKING &amp; FINANCE--</b></option>
                      <option value="Chartered Accountant">Chartered Accountant</option>
                      <option value="Company Secretary">Company Secretary</option>
                      <option value="Accounts / Finance Professional">Accounts / Finance Professional</option>
                      <option value="Administrative Professional">Administrative Professional</option>
                      <option value="Banking Professional">Banking Professional</option>
                      <option value="Auditor">Auditor</option>
                      <option value="Financial Accountant">Financial Accountant</option>
                      <option value="Financial Analyst / Planning">Financial Analyst / Planning</option>
                      <option value="Investment Professional">Investment Professional</option>
                      
                      
                        <option disabled select="disable"><b>-- BEAUTY &amp; FASHION--</b></option>
                      <option value="Fashion Designer">Fashion Designer</option>
                      <option value="Beautician">Beautician</option></option>
                      <option value="Hair Stylist">Hair Stylist</option>
                      <option value="Jewellery Designer">Jewellery Designer</option>
                      <option value="Designer (Others)">Designer (Others)</option>
                      <option value="Makeup Artistr">Makeup Artist</option>
                      
                      <option disabled select="disable"><b>--BPO &amp; CUSTOMER SERVICE --</b></option>
                      <option value="BPO / KPO / ITES Professional">BPO / KPO / ITES Professional</option>
                      <option value="Customer Service Professional">Customer Service Professional</option>
                      
                      <option disabled select="disable"><b>--CIVIL SERVICES --</b></option>
                      <option value="Civil Services (IAS / IPS / IRS / IES / IFS)">Civil Services (IAS / IPS / IRS / IES / IFS)</option>
                      
                      <option disabled select="disable"><b>-- CORPORATE PROFESSIONALS--</b></option>
                      <option value="Analyst">Analyst</option>
                      <option value="Consultant">Consultant</option>
                      <option value="Corporate Communication">Corporate Communication</option>
                      <option value="Corporate Planning">Corporate Planning</option>
                      <option value="Marketing Professional">Marketing Professional</option>
                      <option value="Operations Management">Operations Management</option>
                      <option value="Sales Professional">Sales Professional</option>
                      <option value="Senior Manager / Manager">Senior Manager / Manager</option>
                      <option value="Investment Professional">Subject Matter Expert</option>
                      <option value="Business Development Professional">Business Development Professional</option>
                      <option value="Content Write">Content Writer</option>
                      
                      <option disabled select="disable"><b>--DEFENCE--</b></option>
                      <option value="Army">Army</option>
                      <option value="Navy">Navy</option>
                      <option value="Defence Services (Others)">Defence Services (Others)</option>
                      <option value="Air Force">Air Force</option>
                      <option value="Marketing Professional">Paramilitary</option>
                      
                     <option disabled select="disable"><b>-- EDUCATION &amp; TRAINING--</b></option>
                      <option value="Professor / Lecturer">Professor / Lecturer</option>
                      <option value="Teaching / Academician">Teaching / Academician</option>
                      <option value="Education Professional">Education Professional/option>
                      <option value="Training Professional">Training Professional</option>
                       <option value="Research Assistant">Research Assistant</option>
                    <option value="Research Scholar">Research Scholar</option>
                    
                     <option disabled select="disable"><b>-- ENGINEERING--</b></option>
                      <option value="Civil Engineer">Civil Engineert</option>
                      <option value="Electronics / Telecom Engineer">Electronics / Telecom Engineer</option>
                      <option value="Mechanical / Production Engineer">Mechanical / Production Engineer</option>
                      <option value="Quality Assurance Engineer - Non IT">Quality Assurance Engineer - Non IT</option>
                      <option value="Engineer - Non IT">Engineer - Non IT</option>
                      <option value="Designer">Designer</option>
                      <option value="Product Manager - Non IT">Product Manager - Non IT</option>
                      <option value="Project Manager - Non IT">Project Manager - Non IT</option>
                     
                      <option disabled select="disable"><b>-- HOSPITALITY --</b></option>
                      <option value="Hotel / Hospitality Professional">Hotel / Hospitality Professional</option>
                      <option value="Restaurant / Catering Professional">Restaurant / Catering Professional</option>
                      <option value="Chef / Cook">Chef / Cook</option>
                      
                       <option disabled select="disable"><b>--  IT &amp; SOFTWARE--</b></option>
                      <option value="Software Professional">Software Professional</option>
                      <option value="Hardware Professional">Hardware Professional</option>
                      <option value="Product Manager">Product Manager</option>
                      <option value="Project Manager">Project Manager</option>
                      <option value="Program Manager">Program Manager</option>
                      <option value="Animator">Animator</option>
                      <option value="Cyber / Network Security">Cyber / Network Security</option>
                      <option value="UI / UX Designer">UI / UX Designer</option>
                      <option value="Web / Graphic Designer">Web / Graphic Designer</option>
                      <option value="Software Consultant">Software Consultant</option>
                      <option value="Data Analyst">Data Analyst</option>
                      <option value="Data Scientist">Data Scientist</option>
                     <option value="Network Engineer">Network Engineer</option>
                    <option value="Quality Assurance Engineer">Quality Assurance Engineer</option>
                     
                     <option disabled select="disable"><b>-- LEGAL--</b></option>
                     <option value="Lawyer &amp; Legal Professional">Lawyer &amp; Legal Professional</option>
                     <option value="Legal Assistant">Legal Assistant</option>
                     
                     <option disabled select="disable"><b>--  POLICE / LAW ENFORCEMENT --</b></option>
                     <option value="Law Enforcement Officer">Law Enforcement Officer</option>
                     <option value="Police">Police</option>
                     
                     <option disabled select="disable"><b>--  MEDICAL &amp; HEALTHCARE-OTHERS --</b></option>
                     <option value="Healthcare Professional">Healthcare Professional</option>
                     <option value="Paramedical Professional">Paramedical Professional</option>
                     <option value="Nurse">Nurse</option>
                     <option value="Pharmacist">Pharmacist</option>
                     <option value="Physiotherapist">Physiotherapist</option>
                     <option value="Psychologist">Psychologist</option>
                     <option value="Therapist">Therapist</option>
                     <option value="Medical Transcriptionist">Medical Transcriptionist</option>
                     <option value="Dietician / Nutritionist">Dietician / Nutritionist</option>
                     <option value="Lab Technician">Lab Technician</option>
                    <option value="Medical Representative">Medical Representative</option>
                    
                    <option disabled select="disable"><b>--  MEDIA &amp; ENTERTAINMENT --</b></option>
                    <option value="Journalist">Journalist</option>
                    <option value="Media Professional">Media Professional</option>
                    <option value="Entertainment Professional">Entertainment Professional</option>
                    <option value="Event Management Professional">Event Management Professional</option>
                    <option value="Advertising / PR Professional">Advertising / PR Professional</option>
                    <option value="Designer">Designer</option>
                    <option value="Actor / Model">Actor / Model</option>
                    <option value="Artist">Artist</option>
                    
                    <option disabled select="disable"><b>--  MERCHANT NAVY --</b></option>
                    <option value="Mariner / Merchant Navy">Mariner / Merchant Navy</option>
                    <option value="Sailor">Sailor</option>
                    
                    <option disabled select="disable"><b>-- SCIENTIST  --</b></option>
                    <option value="Scientist / Researcher">Scientist / Researcher</option>  
                    <option disabled select="disable"><b>-- SENIOR MANAGEMENT  --</b></option>
                    <option value="CXO / President, Director, Chairman">CXO / President, Director, Chairman</option>
                    <option value="VP / AVP / GM / DGM / AGM">VP / AVP / GM / DGM / AGM</option>
                    <option disabled select="disable"><b>--  OTHERS  --</b></option>
                    <option value="44">Technician</option>
                   <option value="Arts &amp; Craftsman">Arts &amp; Craftsman</option>
                   <option value="Student">Student</option>
                   <option value="Librarian">Librarian</option>
                   <option value="Business Owner / Entrepreneur">Business Owner / Entrepreneur</option>
                   <option value="Retired">Retired</option>
                   <option value="Transportation / Logistics Professional">Transportation / Logistics Professional</option>
                   <option value="Agent / Broker / Trader">Agent / Broker / Trader</option>
                   <option value="Contractor">Contractor</option>
                   <option value="Fitness Professional">Fitness Professional</option>
                   <option value="Security Professional">Security Professional</option>
                   <option value="Social Worker /  Volunteer / NGO">Social Worker /  Volunteer / NGO</option>
                   <option value="Sportsperson">Sportsperson</option>
                   <option value="Travel Professional">Travel Professional</option>
                   <option value="Singer">Singer</option>
                   <option value="Writer">Writer</option>
                   <option value="Politician">Politician</option>
                   <option value="Associate">Associate</option>
                   <option value="Builder">Builder</option>
                   <option value="Chemist">Chemist</option>
                   <option value="CNC Operator">CNC Operator</option>
                   <option value="Distributor">Distributor</option>
                   <option value="Driver">Driver</option>
                   <option value="Freelancer">Freelancer</option>
                   <option value="Mechanic">Mechanic</option>
                   <option value="Musician">Musician</option>
                   <option value="Photo / Videographer">Photo / Videographer</option>
                   <option value="Surveyor">Surveyor</option>
                   <option value="Tailor">Tailor</option>
                   <option value="Others">Others</option>
                    </select>
                   </div>
                </div>
                <div class="row mt-5">
                   <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                    <span class="text-Income" id="errorIncome"></span> 
                    <select class="form-control select2 Income" id="dropdown_14" name="an_inc" required>
                      <option value="" disabled selected="disabled">Select Annual Income *</option>
                      <option value="0 -1 lakhs">0 -1 lakhs</option>
                      <option value="1 -2 lakhs">1 -2 lakhs</option>
                      <option value="2 -3 lakhs">2 -3 lakhs</option>
                      <option value="3 -4 lakhs">3 -4 lakhs</option>
                      <option value="4 -5 lakhs">4 -5 lakhs</option>
                      <option value="5 -6 lakhs">5 -6 lakhs</option>
                      <option value="6 -7 lakhs">6 -7 lakhs</option>
                      <option value="8 -9 lakhs">8 -9 lakhs</option>
                      <option value="10 -11 lakhs">10 -11 lakhs</option>
                      <option value="11 -12 lakhs">11 -12 lakhs</option>
                      <option value="12 -13 lakhs">12 -13 lakhs</option>
                      <option value="13 -14 lakhs">13 -14 lakhs</option>
                      <option value="14 -15 lakhs">14 -15 lakhs</option>
                      <option value="15 -16 lakhs">15 -16 lakhs</option>
                      <option value="16 -17 lakhs">16 -17 lakhs</option>
                      <option value="18 -19 lakhs">18 -19 lakhs</option>
                      <option value="20 -21 lakhs">20 -21 lakhs</option>
                      <option value="21 -22 lakhs">21 -22 lakhs</option>
                      <option value="22 -23 lakhs">22 -23 lakhs</option>
                      <option value="23 -24 lakhs">23 -24 lakhs</option>
                      <option value="24 -25 lakhs">24 -25 lakhs</option>
                      <option value="25 -26 lakhs">25 -26 lakhs</option>
                      <option value="26 -27 lakhs">26 -27 lakhs</option>
                      <option value="28 -29 lakhs">28 -29 lakhs</option>
                      <option value="30-50 lakhs">30-50 lakhs</option>
                      <option value="60-80 lakhs">30-50 lakhs</option>
                      <option value="80-90 lakhs">30-50 lakhs</option>
                      <option value="80-90 lakhs">1 Crore & Above</option>
                      
                    </select>
                         
                     
                   </div>
                  
                </div>
                <div class="row mt-5">
               
                  <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                   <!-- depending dropdown -->
                   <span class="text-Employed " id="errorEmployed"></span>
                   <select class="form-control Employed" id="dropdown7" name="sector" required>
                     <option value="" disabled selected="disabled">Select Employed In *</option>
                     <option value="Goverment">Goverment</option>
                     <option value="Private">Private</option>
                     <option value="Business">Business</option>
                     <option value="Self Employed">Self Employed</option>
                     <option value="Not Working">Not Working</option>
                     
                     
                   </select>
                  </div>
               </div>
             <!--  <div class="row mt-4">-->
               
             <!--   <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">-->
                 <!-- depending dropdown -->
             <!--    <span class="text-Work " id="errorWork"></span>-->
             <!--    <select class="form-control select2 Work" id="dropdown_15" name="worklocation" required>-->
             <!--      <option value="" disabled selected="disabled">Select Work Location *</option>-->
             <!--      @foreach ($countries as $country)-->
             <!--      <option value="{{$country->id}}">{{$country->name}}</option>-->
             <!--      @endforeach-->
                   
             <!--    </select>-->
             <!--   </div>-->
             <!--</div>-->
             
              
                <div class="row mt-6">
                   <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                      <input type="button" class="btn btn-primary profilebtn4 mb-5" id="Register-btn" value="Continue" required>
                   </div>
                </div>
                   
            </div>
           
          </div>
    <div id="collapseFive">
           
           <div class="cardbody">
                     <h3 class="text-center">Location details  </h3>
              <div class="row mt-3">
                <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                 <span class="text-YourCountry" id="errorYourCountry"></span>
                    <select class="form-control select2 YourCountry" name="present_country_id" id="dropdown_9" data-live-search="true" required required>
                        <option value="" disabled selected="disabled">Select Your Country *</option>
                        @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                       @endforeach
                      
                        
                        
  
                   </select>
                </div>
             </div>
             <div class="row mt-5">
                <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                 <span class="text-YourState" id="errorYourState"></span>
                 <select class="form-control select2 YourState" name="present_state_id" id="dropdown_10" data-live-search="true" required>
                  <option value="" disabled selected="disabled">Select Your State</option>
                 </select>
                </div>
             </div>
             <div class="row mt-5">
                <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                  <!-- depending dropdown -->
                  <span class="text-District" id="errorDistrict"></span>
                 <select class="form-control select2 District" name="present_city_id" id="dropdown_11" required>
                  <option value="" disabled selected="disabled">Select Your City *</option>                   
                 </select>
                      
                  
                </div>
               
             </div>
             <div class="row mt-6">
               
                <!-- depending dropdown -->
                <span class="text-location" id="errorlocation"></span>
                <input type="text" name="location" placeholder="Enter Location" class="form-control location"> 
                </div>
              </div>
                <div class="row mt-5">
               
                  {{-- <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                   <!-- depending dropdown -->
                   <span class="text-pincode" id="errorpincode"></span>
                  <input type="text" name="pincode" placeholder="Enter pincode" class="form-control pincode" required> 
                  </div> --}}
               </div>
              
             
              
                <!--<div class="row mt-5">-->
                <!--   <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">-->
                <!--    <input type="button" class="btn btn-primary profile-btn profilebtn6 mb-5" id="Register-btn" value="Continue">-->
                <!--   </div>-->
                <!--</div>-->
                <div class="row mt-3">
               <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                  <input type="button" class="btn btn-primary btn-submit profilebtn5" value="Continue">
                  {{-- <input type="submit" value="Submit"> --}}
                </div>
                
                  <!-- end -->
               </div>
            </div>
          </div>
    <div id="collapseSix" >
             <div class="cardbody">
                   <h3 class="text-center">Profile details  </h3><br>
               <div class="row mt-3">
                    <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                          <!--  -->
                          
                          <div class="hello-11">
                               <span id="errorhello-55" class="text-center"></span>
                            <div class="hello-22">
                              <!-- uploaded pic shown here -->
                               <span class="text-errorhello" id="errorhello-55"></span> 
                              <img id="hello-33" class="hello-33" src="{{ static_asset('assets/assets/img/upload.png') }}" alt="User Photo">
                          
                              <input class="hello-44" type="file" name="pro_pic" id="hello-55" accept="image/*" style="opacity: 0;" required>
                              <label for="hello-55" class="hello-66">
                                <div class="text-center">
                                  <div class="mb-2">
                                    <i class="fa fa-camera fa-2x"></i>
                                  </div>
                                  <div class="text-uppercase">
                                      Please  Upload <br />  Photo ID *
                                  </div>
                                 
                                </div>
                              </label>
                            </div>
                           
                          </div>
                          <!--  -->
                    </div>
                </div>
                <div class="row">
                  <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12">
                    <span class="text-SelectProfile" id="errorSelectProfile"></span> 
                      <select class="form-control SelectProfile" data-live-search="true" name="profile_picture_privacy" required>
                          <option value="" disabled selected="disabled">Select Profile Privacy *</option>
                          <option value="1">Public</option>
                         <option value="2">Premium Members</option>
                         <option value="0">Private</option>
                        
                     </select>
                  </div>
               </div>
           
              <div class="row mt-5">
               <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                  <input type="submit" class="btn btn-primary profilebtn6" id="Register-btn" value="Submit">
               </div>
            </div>
               
            </div>
                   
            {{--  --}}
            </div>
            
          
          </div>

           
           
          </div>
        
 

 
  
                         <!--  -->
                   </div>
             </div>
      </div>
</section>

 <script>
     $(document).ready(function(){
         
         $("#datepicker").hover(function(){
             $("#datepicker").attr("type","date");
           
         });
     }); 
 </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
{{-- <script>
  $('#flash-overlay-modal').modal();
</script> --}}
<script>
  $(document).ready(function () {

      /*------------------------------------------
      --------------------------------------------
      Country Dropdown Change Event
      --------------------------------------------
      --------------------------------------------*/
      $('#dropdown_9').on('change', function () {
          var idCountry = this.value;
          $("#dropdown_10").html('');
          $.ajax({
              url: "{{url('test/states/get_state_by_country')}}",
              type: "POST",
              data: {
                  country_id: idCountry,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (result) {
                  $('#dropdown_10').html('<option value="">-- Select State --</option>');
                  for (var i = 0; i < result.length; i++) {
                    $('#dropdown_10').append($('<option>', {
                        value: result[i].id,
                        text: result[i].name
                    }));
                }
                  $('#dropdown_11').html('<option value="">-- Select City --</option>');
              }
          });
      });

      /*------------------------------------------
      --------------------------------------------
      State Dropdown Change Event
      --------------------------------------------
      --------------------------------------------*/
      $('#dropdown_10').on('change', function () {
          var idState = this.value;
          $("#dropdown_11").html('');
          $.ajax({
              url: "{{url('test/cities/get_cities_by_state')}}",
              type: "POST",
              data: {
                  state_id: idState,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (res) {
                  $('#dropdown_11').html('<option value="">-- Select City --</option>');
                  for (var i = 0; i < res.length; i++) {
                    $('#dropdown_11').append($('<option>', {
                        value: res[i].id,
                        text: res[i].name
                    }));
                }
              }
          });
      });


      $('#dropdown_6').on('change', function () {
          var member_religion_id = this.value;
          $("#dropdown_7").html('');
          $.ajax({
              url: "{{url('test/castes/get_caste_by_religion')}}",
              type: "POST",
              data: {
                religion_id: member_religion_id,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (result) {
                  $('#dropdown_7').html('<option value="">Select Cast *</option>');
                  for (var i = 0; i < result.length; i++) {
                    $('#dropdown_7').append($('<option>', {
                        value: result[i].id,
                        text: result[i].name
                    }));
                }
              }
          });
      });

  });
</script>

<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
  }
  </script>
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
     $('#dropdown_112').select2();
    });


</script>

<script>
  document.addEventListener("change", function (event) {
  if (event.target.classList.contains("uploadProfileInput")) {
    var triggerInput = event.target;
    var currentImg = triggerInput.closest(".pic-holder").querySelector(".pic")
      .src;
    var holder = triggerInput.closest(".pic-holder");
    var wrapper = triggerInput.closest(".profile-pic-wrapper");

    var alerts = wrapper.querySelectorAll('[role="alert"]');
    alerts.forEach(function (alert) {
      alert.remove();
    });

    triggerInput.blur();
    var files = triggerInput.files || [];
    if (!files.length || !window.FileReader) {
      return;
    }

    if (/^image/.test(files[0].type)) {
      var reader = new FileReader();
      reader.readAsDataURL(files[0]);

      reader.onloadend = function () {
        holder.classList.add("uploadInProgress");
        holder.querySelector(".pic").src = this.result;
        triggerInput.files = this.result;
        var loader = document.createElement("div");
        loader.classList.add("upload-loader");
        loader.innerHTML =
          '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
        holder.appendChild(loader);

        setTimeout(function () {
          holder.classList.remove("uploadInProgress");
          loader.remove();

          var random = Math.random();
          if (random < 0.9) {
            wrapper.innerHTML +=
              '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>';
            triggerInput.value = "";
            setTimeout(function () {
              wrapper.querySelector('[role="alert"]').remove();
            }, 3000);
          } else {
            holder.querySelector(".pic").src = currentImg;
            wrapper.innerHTML +=
              '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>';
            triggerInput.value = "";
            setTimeout(function () {
              wrapper.querySelector('[role="alert"]').remove();
            }, 3000);
          }
        }, 1500);
      };
    } else {
      wrapper.innerHTML +=
        '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>';
      setTimeout(function () {
        var invalidAlert = wrapper.querySelector('[role="alert"]');
        if (invalidAlert) {
          invalidAlert.remove();
        }
      }, 3000);
    }
  }
});
document.addEventListener("change", function (event) {
  if (event.target.classList.contains("hello-4")) {
    var triggerInput = event.target;
    var currentImg = triggerInput.closest(".hello-2").querySelector(".hello-3")
      .src;
    var holder = triggerInput.closest(".hello-2");
    var wrapper = triggerInput.closest(".hello-1");

    var alerts = wrapper.querySelectorAll('[role="alert"]');
    alerts.forEach(function (alert) {
      alert.remove();
    });

    triggerInput.blur();
    var files = triggerInput.files || [];
    if (!files.length || !window.FileReader) {
      return;
    }

    if (/^image/.test(files[0].type)) {
      var reader = new FileReader();
      reader.readAsDataURL(files[0]);

      reader.onloadend = function () {
        holder.classList.add("uploadInProgress");
        holder.querySelector(".hello-3").src = this.result;
        triggerInput.files = this.result;
        var loader = document.createElement("div");
        loader.classList.add("upload-loader");
        loader.innerHTML =
          '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
        holder.appendChild(loader);

        setTimeout(function () {
          holder.classList.remove("uploadInProgress");
          loader.remove();

          var random = Math.random();
          if (random < 0.9) {
            wrapper.innerHTML +=
              '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>';
            triggerInput.value = "";
            setTimeout(function () {
              wrapper.querySelector('[role="alert"]').remove();
            }, 3000);
          } else {
            holder.querySelector(".hello-3").src = currentImg;
            wrapper.innerHTML +=
              '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>';
            triggerInput.value = "";
            setTimeout(function () {
              wrapper.querySelector('[role="alert"]').remove();
            }, 3000);
          }
        }, 1500);
      };
    } else {
      wrapper.innerHTML +=
        '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>';
      setTimeout(function () {
        var invalidAlert = wrapper.querySelector('[role="alert"]');
        if (invalidAlert) {
          invalidAlert.remove();
        }
      }, 3000);
    }
  }
});
// 
document.addEventListener("change", function (event) {
  if (event.target.classList.contains("hello-44")) {
    var triggerInput = event.target;
    var currentImg = triggerInput.closest(".hello-22").querySelector(".hello-33")
      .src;
    var holder = triggerInput.closest(".hello-22");
    var wrapper = triggerInput.closest(".hello-11");

    var alerts = wrapper.querySelectorAll('[role="alert"]');
    alerts.forEach(function (alert) {
      alert.remove();
    });

    triggerInput.blur();
    var files = triggerInput.files || [];
    if (!files.length || !window.FileReader) {
      return;
    }

    if (/^image/.test(files[0].type)) {
      var reader = new FileReader();
      reader.readAsDataURL(files[0]);

      reader.onloadend = function () {
        holder.classList.add("uploadInProgress");
        holder.querySelector(".hello-33").src = this.result;
        triggerInput.files = this.result;
        var loader = document.createElement("div");
        loader.classList.add("upload-loader");
        loader.innerHTML =
          '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
        holder.appendChild(loader);

        setTimeout(function () {
          holder.classList.remove("uploadInProgress");
          loader.remove();

          var random = Math.random();
          if (random < 0.9) {
            wrapper.innerHTML +=
              '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>';
            triggerInput.value = "";
            setTimeout(function () {
              wrapper.querySelector('[role="alert"]').remove();
            }, 3000);
          } else {
            holder.querySelector(".hello-33").src = currentImg;
            wrapper.innerHTML +=
              '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>';
            triggerInput.value = "";
            setTimeout(function () {
              wrapper.querySelector('[role="alert"]').remove();
            }, 3000);
          }
        }, 1500);
      };
    } else {
      wrapper.innerHTML +=
        '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>';
      setTimeout(function () {
        var invalidAlert = wrapper.querySelector('[role="alert"]');
        if (invalidAlert) {
          invalidAlert.remove();
        }
      }, 3000);
    }
  }
});
</script>

<script src="{{ static_asset('assets/assets/js/register.js') }}"></script>
<!-- new code -->


{{-- <script>
  $(document).ready(function(){
    $(".btn-submit").click(function()
    {
      Swal.fire({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success"
});
window.location.href ="./userpage.html";
    });
  });
  </script> --}}

<script>
  function validateMobileNumber(input) {
    // Remove non-numeric characters
    var numericValue = input.value.replace(/\D/g, '');

    // Ensure the length is not more than 10 digits
    if (numericValue.length > 10) {
        numericValue = numericValue.slice(0, 10);
    }

    // Update the input value
    input.value = numericValue;
}

  </script>
<!-- <script>
  $(document).ready(function() {
    $("#Register-btn").click(function() {
    let password = $("#password").val();
      let conformpassword = $("#conformpassword").val();

      // Reset previous error messages
      $("#errorpassword, #errorconformpassword").text("");

      if (password !== conformpassword) {
        $("#errorconformpassword").text("Passwords do not match");
      }
    });
  });
</script> -->
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
<script>document.addEventListener("DOMContentLoaded", function() {
  // Simulate a delay to demonstrate the preloader
  setTimeout(function() {
    // Hide the preloader
    document.querySelector('.preloader').style.display = 'none';
    // Show the content
    document.querySelector('.content').style.display = 'block';
  }, 2000); // Adjust the time according to your needs
});
</script>
</body>
</html>