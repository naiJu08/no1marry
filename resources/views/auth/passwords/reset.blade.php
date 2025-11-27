

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
  <style>
      


  </style>
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
                        <h1 class="h3 fw-600">{{ translate('Reset Password') }}</h1>
                        <p class="mb-4 opacity-60">{{translate('Enter your Mobile Number and new password and confirm password.')}} </p>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
    
                            <div class="form-group">
                                <input id="email" type="hidden" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->id}}" placeholder="{{ translate('Email') }}" required autofocus>
    
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="" placeholder="Verification Code" required autofocus>
                                
                                @if ($errors->has('code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ translate('New Password') }}" required>
                                <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ translate('Confirm Password') }}" required>
                                <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                            </div>
                           
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ translate('Reset Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
  
    $(document).ready(function()
    {
     $('#dropdown_1').select2();
   
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








