<!DOCTYPE html>
<html lang="en">

<head>
  <title>No1 Marry.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="icon" type="image/x-icon" href="{{ static_asset('assets/assets/img/favicon.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/bootstrap.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="// https://codepen.io/sandstedt/pen/GRZeywP?editors=1000"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!--<link href="{{ static_asset('assets/assets/css/select2.min.css') }}" rel="stylesheet" />-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://db.onlinewebfonts.com/c/3bea650d056f5bb2dcafcb462b8a0745?family=Larsseit-Medium" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <!--<link rel="stylesheet" href="{{ static_asset('assets/assets/css/stylemedia.css') }}" rel="stylesheet">-->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


</head>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    /* background: #3bb77e; */
    /* background: #FEFAF6; */
    background-image: url("/public_html/public/assets/img/Blue and Gold Traditional Indian Wedding Thank You Card (3).png");
    background-size: cover;
  }

  .container {
    position: relative;
    max-width: 900px;
    width: 100%;
    border-radius: 6px;
    padding: 30px;
    margin: 0 15px;
    background-color: transperant;
    /* box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); */
  }

  .container header {
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
  }

  .container header::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: transperant
      /* background-color: #3bb77e; */
  }

  .container form {
    position: relative;
    margin-top: 16px;
    min-height: 500px;
    background-color: transperant;
    overflow: hidden;
  }

  .container form .form {
    position: absolute;
    background-color: transperant;
    transition: 0.3s ease;
  }

  .container form .form.second {
    opacity: 0;
    pointer-events: none;
    transform: translateX(100%);
  }

  form.secActive .form.second {
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
  }

  form.secActive .form.first {
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
  }

  .container form .title {
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
  }

  .container form .fields {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
  }

  form .fields .input-field {
    display: flex;
    width: calc(100% / 2 - 15px);
    flex-direction: column;
    margin: 4px 0;
  }

  .input-field label {
    font-size: 12px;
    font-weight: 500;
    color: #2e2e2e;
  }

  .input-field input,
  select {
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
  }

  .input-field input :focus,
  .input-field select:focus {
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
  }

  .input-field select,
  .input-field input[type="date"] {
    color: #707070;
  }

  .input-field input[type="date"]:valid {
    color: #333;
  }

  .password-toggle-icon {
    position: absolute;
    bottom: 14%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
  }

  .password-toggle-icon i {
    font-size: 18px;
    line-height: 1;
    color: #3bb77e;
    transition: color 0.3s ease-in-out;
    margin-bottom: 20px;
  }

  .password-toggle-icon i:hover {
    color: #000;
  }

  .container form button,
  .backBtn {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    background-color: #3bb77e;
    transition: all 0.3s linear;
    cursor: pointer;
  }

  .container form .btnText {
    font-size: 14px;
    font-weight: 400;
  }

  .logn-bt {
    background-color: #3bb77e !important;
  }

  .logn-a {
    color: #fff;
  }

  .logn-a:hover {
    color: #fff;
    text-decoration: none;
    font-weight: 800;
  }

  form button:hover {
    background-color: #265df2;
  }

  form button i,
  form .backBtn i {
    margin: 0 6px;
  }

  form .backBtn i {
    transform: rotate(180deg);
  }

  form .buttons {
    display: flex;
    align-items: center;
  }

  form .buttons button,
  .backBtn {
    margin-right: 14px;
  }

  @media (max-width: 750px) {
    .container form {
      overflow-y: scroll;
    }

    .container form::-webkit-scrollbar {
      display: none;
    }

    form .fields .input-field {
      width: calc(100% / 2 - 15px);
    }
  }

  @media (max-width: 550px) {
    form .fields .input-field {
      width: 100%;
    }

    .password-toggle-icon {
      position: absolute;
      bottom: 9.5%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }
  }


  @import url('https://fonts.googleapis.com/css2?family=Staatliches&display=swap');

  .jt {
    position: relative;
    font-size: 20px;
    font-family: 'Staatliches', sans-serif;
    text-transform: uppercase;
    font-display: swap;
    text-shadow: 0 0 5px #3bb77e;
    color: #3bb77e;
  }

  .jt__row {
    display: block;
  }

  .jt__row:nth-child(1) {
    clip-path: polygon(-10% 75%, 110% 75%, 110% 110%, -10% 110%);
  }

  .jt__row:nth-child(2) {
    clip-path: polygon(-10% 50%, 110% 50%, 110% 75.3%, -10% 75.3%);
  }

  .jt__row:nth-child(3) {
    clip-path: polygon(-10% 25%, 110% 25%, 110% 50.3%, -10% 50.3%);
  }

  .jt__row:nth-child(4) {
    clip-path: polygon(-10% 0%, 110% 0%, 110% 25.3%, -10% 25.3%);
  }

  .jt__row.jt__row--sibling {
    position: absolute;
    top: 0;
    left: 0;
    user-select: none;
    witdh: 800px;
  }

  .jt__text {
    display: block;
    transform-origin: bottom left;
    animation: moveIn 2s 0s cubic-bezier(.36, 0, .06, 1) alternate infinite;
  }

  .jt__row:nth-child(1) .jt__text {
    transform: translateY(-0.1em);
  }

  .jt__row:nth-child(2) .jt__text {
    transform: translateY(-0.3em) scaleY(1.1);
  }

  .jt__row:nth-child(3) .jt__text {
    transform: translateY(-0.5em) scaleY(1.2);
  }

  .jt__row:nth-child(4) .jt__text {
    transform: translateY(-0.7em) scaleY(1.3);
  }

  .jt__row:nth-child(5) .jt__text {
    transform: translateY(-0.9em) scaleY(1.4);
  }

  .jt__row:nth-child(6) .jt__text {
    transform: translateY(-1.1em) scaleY(1.5);
  }

  @keyframes moveIn {

    50%,
    100% {
      transform: translateY(0em)
    }

    0% {
      opacity: 0;
      filter: blur(10px);

    }

    100% {
      opacity: 1;
      filter: blur(0px);
    }
  }



  .debug .jt__row:nth-child(even) {
    color: black;
    background: white;
  }

  .debug .jt__row:nth-child(odd) {
    color: white;
    background: black;
  }
</style>
</head>

<body>


  <div class="container">

    <div class="d-flex justify-content-center">
      <h1 class="jt --debug">
        <span class="jt__row">
          <span class="jt__text">Register for Free and Meet Your Perfect Match</span>
        </span>
        <span class="jt__row jt__row--sibling" aria-hidden="true">
          <span class="jt__text">Register for Free and Meet Your Perfect Match</span>
        </span>
        <span class="jt__row jt__row--sibling" aria-hidden="true">
          <span class="jt__text">Register for Free and Meet Your Perfect Match</span>
        </span>
        <span class="jt__row jt__row--sibling" aria-hidden="true">
          <span class="jt__text">Register for Free and Meet Your Perfect Match</span>
        </span>
      </h1>
    </div>
    <header class="d-flex justify-content-between">
      <div></div>
      <button type="button" class="btn btn-success logn-bt"><a class="logn-a" href="{{ route('login') }}"> - LOGIN
          -</a></button>
    </header>
    <form action="#">
      <div class="form first">
        <div class="details personal">
          <span class="title">Personal Details</span>
          <div class="fields">
            <div class="input-field">
              <label>First Name</label>
              <input type="text" placeholder="Enter your name" required>
            </div>
            <div class="input-field">
              <label>Last Name</label>
              <input type="text" placeholder="Enter your name" required>
            </div>
            <div class="input-field">
              <label>Date of Birth</label>
              <input type="date" placeholder="Enter birth date" required>
            </div>
            <div class="input-field">
              <label>Email</label>
              <input type="text" placeholder="Enter your email" required>
            </div>
            <div class="input-field">
              <label>Mobile Number</label>
              <input type="number" placeholder="Enter mobile number" required>
            </div>
            <div class="input-field">
              <label>Gender</label>
              <select required>
                <option disabled selected>Select gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
              </select>
            </div>
            <div class="input-field">
              <label>Religion</label>
              <select required name="religion_id" id="religion_id">
                <option disabled selected>Select Religion</option>
                <?php foreach ($religion as $rel) {
                ?>
                <option value="<?php  echo $rel->id ?>"><?php  echo $rel->name ?></option>
                <?php } ?>

              </select>
            </div>
            <div class="input-field">
              <label>Caste</label>
              <select required name="caste_id" id="caste_id">
                <option disabled selected>Select Caste</option>

              </select>
            </div>
            <div class="input-field"></div>
            <div class="d-flex justify-content-end w-100">

              <button class="nextBtn">
                <span class="btnText">Next</span>
                <i class="uil uil-navigator"></i>
              </button>
            </div>

          </div>
        </div>
      </div>
      <div class="form second">
        <div class="details address">
          <span class="title">Additional Details</span>
          <div class="fields">
            <div class="input-field">
              <input type="hidden" name="country_id" value="101">
              <label>State</label>
              <select required name="state_id" id="state_id">
                <option disabled selected>Select State</option>
                <?php foreach ($states as $state) {
                ?>
                <option value="<?php  echo $state->id ?>"><?php  echo $state->name ?></option>
                <?php } ?>

              </select>
            </div>
            <div class="input-field">
              <label>City</label>
              <select required name="city_id" id="city_id">
                <option disabled selected>Select City</option>
               

              </select>
            </div>
            <div class="input-field">
              <label>Marital Status</label>
              <select required>
                <option disabled selected>Select Marital Status</option>
                <option>Never Married</option>
                <option>Widowed</option>
                <option>Divorced</option>
                <option>Awaiting Divorce</option>
              </select>
            </div>
            <div class="input-field">
              <label>Family Status</label>
              <select required>
                <option disabled selected>Select Family Status</option>
                <option>Middle Class</option>
                <option>Upper Middle Class</option>
                <option>High Class</option>
                <option>Rich / Affluent</option>
              </select>
            </div>
            <div class="input-field">
              <label>Job</label>
              <select required>
                <option disabled selected>Select Job Status</option>
                <option>Government Sector</option>
                <option>Private Sector</option>
                <option>Self Employed</option>
              </select>
            </div>
            <div class="input-field">
              <label>Educational Details</label>
              <select required>
                <option disabled selected>Select Educational Status</option>
                <option value="No formal education">No formal education</option>
                <option value="Primary education">Primary education</option>
                <option value="Secondary education">Secondary education or high school</option>
                <option value="Vocational qualification">Vocational qualification</option>
                <option value="Bachelor's degree">Bachelor's degree</option>
                <option value="Master's degree">Master's degree</option>
                <option value="Doctorate or higher">Doctorate or higher</option>
              </select>
            </div>
            <div class="input-field">
              <label>Any Disability</label>
              <select required>
                <option disabled selected>Select Any</option>
                <option>None</option>
                <option>Physically Challenged</option>
              </select>
            </div>
            <div class="input-field">
              <label>Password</label>
              <input type="password" id="password" placeholder="" required>
            </div>
            <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
          </div>
        </div>

        <div class="details address">
          <label>
            <h6 class="text-condition"> By Clicking Register Free , I Agree
              to the <a href="https://no1marry.com/terms_and_conditions" class="text-account">Terms &amp; Conditions
              </a> and <a href="https://no1marry.com/privacy_policy" class="text-account"> privacy policy</a>
            </h6>
          </label>
          <div class="d-flex justify-content-start gap-2">
            <div class="backBtn">
              <i class="uil uil-navigator"></i>
              <span class="btnText">Back</span>
            </div>

            <button class="sumbit">
              <span class="btnText">Register Now</span>
              <i class="uil uil-navigator"></i>
            </button>
          </div>

        </div>
      </div>
    </form>
  </div>

  <!-- <section id="section-wrap">
      <div class="container-fluid">
             <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                   
                        <ul class="services">
                          <li>
                              <div class="img-card"><img src="{{ static_asset('assets/assets/img/icon/active-user.png') }}" alt="no.1marry" id="img"></div>
                              <span class="services-setting"> Verified Profiles</span>
                         </li>
                          <li><span class="img-card"><img src="{{ static_asset('assets/assets/img/icon/id.png') }}" width="28px"></span><span class="services-setting">Mandatory ID verification</span></li>-->
  <!-- <li><span class="img-card"><img src="{{ static_asset('assets/assets/img/icon/personal-information.png') }}" alt="no.1marry" id="img"></span><span class="services-setting">Photo privacy and contact privacy</span></li>
                          <li><span class="img-card"><img src="{{ static_asset('assets/assets/img/icon/lock.png') }}" alt="no.1marry" id="img"></span><span class="services-setting">Best data security and privacy</span></li>
                          <li><span class="img-card"><img src="{{ static_asset('assets/assets/img/icon/ring.png') }}" alt="no.1marry" id="img"></span><span class="services-setting">Marriage Support</span></li>
                        </ul>
                      
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="box">
                        <form class="form-default" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
                        <div class="row mt-3">
                          <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
 
                                <input type="text" class="form-control EnterName" name="first_name" id="first_name" placeholder="{{translate('Name')}} *"  required>
                          </div>
                        </div>
                        <div class="row mt-3">
                          <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12" id="row"><span class="text-gender" id="errorgender"></span> 
                                  <select class="form-control form-select select2 gender" id="dropdown_1" name="gender" required>
                                  <option value="" disabled selected="disable" style="font-weight600;">Select Gender *</option>
                                  <option value="1">{{translate('Male')}}</option>
											            <option value="2">{{translate('Female')}}</option>
                                  
                                  
                            </select>
                                  
                          </div>
                         
                          
                        </div>
                        <div class="row mt-3">
                          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 col-xs-4">
                            <select class="form-control  select2 code" id="dropdown_3" name="country_code" required>
                             
                          </select>
                          </div>
                          <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 col-xs-8" id="mt_5">
                            <span class="text-fill" id="errormobile"></span>
                            <input type="tel" class="form-control Mobile_number" placeholder="Enter Mobile number *" value="{{ old('phone') }}" name="phone" autocomplete="off" oninput="validateMobileNumber(this)" required>              
                                
              
                          </div>
                        </div> 
                        <!--<div class="row mt-3">-->
  <!--  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">-->
  <!--    <span class="text-fill" id="errorpassword"></span>-->
  <!--   <input type="email" class="form-control E_mail" name="email" id="signinSrEmail" placeholder="{{ translate('Email Id') }} *" name="E-mail"  required>-->

  <!--</div>-->
  <!-- <div class="row mt-3">
                          <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                            <span class="text-fill" id="errorpassword"></span>
                            <input type="password" class="form-control password" id="password" placeholder="Create Password *" name="password" autocomplete="off" required>

                          <div class="group"> <i class="toggle-password fa fa-fw fa-eye-slash"></i> <i class="toggle-password fa fa-fw fa-eye"></i></div> 
                            
                          </div>
                          
                        </div>
                        <div class="row mt-3">
                          <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12 text-center">
                              <input type="submit" class="btn btn-primary profilebtn6" id="Register-btn" value="Register Free">
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12 text-center">
                            <h6 class="text-condition"> By Clicking Register Free , I Agree <br>
                              to the <a href="https://no1marry.com/terms_and_conditions" class="text-account">Terms &amp; Conditions </a> and <a href="https://no1marry.com/privacy_policy" class="text-account"> privacy policy</a>
                            </h6> 
                           </div>
                        </div>
                        
                   </form>
                  
                    </div>
                 
                  </div> 
                  
             </div>
      </div>
  </section>  -->
  <script>
    const passwordField = document.getElementById("password");
    const togglePassword = document.querySelector(".password-toggle-icon i");

    togglePassword.addEventListener("click", function () {
      if (passwordField.type === "password") {
        passwordField.type = "text";
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
      } else {
        passwordField.type = "password";
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
      }
    });
  </script>


  <script>
    document.onkeydown = function (e) {
      if (event.keyCode == 123) {
        return false;
      }
      if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
        return false;
      }
      if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
        return false;
      }
      if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
        return false;
      }
    }
  </script>

  <script>
    const form = document.querySelector("form"),
      nextBtn = form.querySelector(".nextBtn"),
      backBtn = form.querySelector(".backBtn"),
      allInput = form.querySelectorAll(".first input");


    nextBtn.addEventListener("click", () => {
      allInput.forEach(input => {
        if (input.value != "") {
          form.classList.add('secActive');
        } else {
          form.classList.remove('secActive');
        }
      })
    })

    backBtn.addEventListener("click", () => form.classList.remove('secActive'));
  </script>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function get_caste_by_religion(){
            var religion_id = $('#religion_id').val();
            $('#caste_id').html('')
            $.post('{{ route('castes.get_caste_by_religion.noauth') }}',{_token:'{{ csrf_token() }}', religion_id:religion_id}, function(data){

              $('#caste_id').append($('<option>', {
                        value: "",
                        text: "Select"
                    }));
              for (var i = 0; i < data.length; i++) {
                  console.log(data[i])
                  
                    $('#caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                
                
            });

        }


        function get_city_by_state(){
            var state_id = $('#state_id').val();
            $('#city_id').html('')
            $.post('{{ route('extra.city') }}',{_token:'{{ csrf_token() }}', state_id:state_id}, function(data){
              $('#city_id').append($('<option>', {
                        value: "",
                        text: "Select"
                    }));
              for (var i = 0; i < data.length; i++) {
                  console.log(data[i])
                  
                    $('#city_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                
                
            });

        }



  $('#religion_id').on('change', function () {
    get_caste_by_religion();
  });

  $('#state_id').on('change', function () {
    get_city_by_state();
  });
</script>