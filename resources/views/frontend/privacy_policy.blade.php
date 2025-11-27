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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/stylemedia.css') }}" rel="stylesheet">
</head>
<style>
.privacy p{
    line-height: 38px;
    font-family:Montserrat;
}
footer li{
    list-style-type: none;
}
footer a{
    color: black;
}
.info-head a{
  text-decoration: none !important;
  color: rgba(233, 18, 18, 0.829) !important;
  font-weight: 900 !important;
  font-size:x-small;
}

.info-head a:hover{
  text-decoration: none !important;
  color: rgba(233, 18, 18, 0.829) !important;
  font-weight: 900 !important;
  font-size:x-small;
}
.info-head {
  text-decoration: none !important;
  color: rgba(233, 18, 18, 0.829) !important;
  font-weight: 900 !important;
  font-size:x-small;
}
</style>
<body oncontextmenu="return false;">
    <header id="header_1">
        <div class="container-fluid">
              <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        
                      <img src="{{ static_asset('assets/assets_1/img/logo.jpg') }}" id="nav-brand">
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        
                      <ul id="nav-lang">
                         <li><a href="{{ route('login') }}" class="btn btn-primary" id="login-btn">LOG IN</a></li>
                        
                         <li class="nav-item dropdown">
                           <form action="" method="post">
                            <select id="lang-dropdown" class="bg-white">
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
                    
                 </div>
              </div>
        </div>
  
    </header>
    <section class="info mt-1">
      <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 col-12">
              <div class="p-5">
                <h2 class="text-center font-weight-bold ">Privacy Policy</h2>
               
              </div>
                
            </div>
          </div>
      </div>
    </section>

<section class="mt-5">
      <div class="container-fluid">
             <div class="row justifycontent">
                   <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                         <!--  -->
                   
 <div class="privacy mt-3">
    <p>
        By using the services you acknowledge that (a) we cannot ensure the security privacy of information you provide through the Internet and your email messages, and you release us from any and all liability in connection with the use of such information by other parties; (b) we are not responsible for, and cannot control, the use by others of any information which you provide to them and you should use caution in selecting the personal information you provide to others through the Service; and (c) we cannot assume any responsibility for the content of messages sent by other users of the Service, and you release us from any and all liability in connection with the contents of any communications you may receive from other users. We cannot guarantee, and assume no responsibility for verifying, the accuracy of the information provided by other users of the Service regarding particulars of status, age, income of other members. Your membership is only for personal use. It is not to be assigned, transferred or licensed so as to be used by any other person/entity. (d) members profile(s) and photos may be crawled and indexed by search engines, where No1Marry.com does not have any control over the search engines behavior and No1Marry.com shall not be responsible for such activities of other search engines. No1Marry.com has the right to change its features and services from time to time based on members comments or as a result of a change of policy in our company.
    </p>
 </div>
             </div>
      </div>
</section>

<script>
    document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}
</script>


<script src="assets/js/register.js"></script>

</body>
</html>