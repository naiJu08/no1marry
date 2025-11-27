

<!DOCTYPE html>
<html lang="en">
<head>
  <title>No1 Marry.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/bootstrap.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/stylemedia.css') }}">
  
</head>
<body>

  <header>
    <div class="container-fluid">
          <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    
                       <img src="{{ static_asset('assets/assets_1/img/logo.jpg') }}" id="nav-brand">
                </div>
                <!-- <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    
                  <ul id="nav-lang">
                     <li><a href="#" class="btn btn-primary" id="login-btn">LOG IN</a></li>
                    
                     <li class="nav-item dropdown">
                       <form action="" method="post">
                        <select id="lang-dropdown">
                          <option disabled selected="disabled">Language</option>
                          <option>Malayalam</option>
                          <option>Tamil</option>
                          <option>Arabic</option>
                          <option>Urdu</option>
                          <option>English</option>
                          <option>Mandarin Chinese</option>
                          <option>Spanish</option>
                          <option>Hindi</option>
                          <option>Bengali</option>
                          <option>Portuguese</option>
                          <option>Russian</option>
                          <option>Japanese</option>
                          <option>Western Punjabi</option>
                          <option>Javanese</option>
                          

                     </select>
                       </form>
                      </li>
                     
                  </ul>
                
             </div> -->
          </div>
    </div>
</header>

<section class="mt-2">
    <div class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-md-8 mx-auto">
                    <div class="bg-white rounded shadow-sm p-4 text-left">
                        <h1 class="h3 fw-600">{{ translate('Forgot Password?') }}</h1>
                        <p class="mb-4 opacity-60">
                            @if (addon_activation('otp_system'))
                                {{translate('Enter your  Mobile number to recover your password.')}}
                            @else
                                {{translate('Enter your Mobile number to recover your password.')}}
                            @endif
                        </p>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                {{-- @if (addon_activation('otp_system'))
                                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="{{ translate('Email or Phone') }}">
                                @else
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ translate('Email') }}" name="email">
                                @endif --}}

                                <div class="row mt-5">
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4 mt-2">
                                      
                                      <select class="form-control select2 " id="dropdown_663" name="country_code">
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
                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 col-xs-8">
                                          <input id="tel" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autocomplete="off" required placeholder="{{ translate('Phone') }}" required>
                     
                                    </div>
                            </div>
    
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-primary btn-block" type="submit">
                                    {{ translate('Send Password Reset OTP') }}
                                </button>
                            </div>
                        </form>
                        <div class="mt-3" style="text-align: center">
                            <a href="{{route('user.login')}}" class="text-reset opacity-60">{{translate('Back to Login')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
     $('#dropdown_663').select2();
   
    });

</script>
<script src="{{ static_asset('assets/assets_1/js/bootstrap.bundle.js') }}"></script>
<script src="{{ static_asset('assets/assets_1/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ static_asset('assets/assets_1/js/bootstrap.esm.js') }}"></script>
<script src="{{ static_asset('assets/assets_1/js/bootstrap.esm.min.js') }}"></script>
<script src="{{ static_asset('assets/assets_1/js/bootstrap.esm.min.js') }}"></script>
<script src="{{ static_asset('assets/assets_1/js/bootstrap.js') }}"></script>
<script src="{{ static_asset('assets/assets_1/js/bootstrap.min.js') }}"></script>
</body>
</html>

