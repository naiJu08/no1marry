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
  li{
    list-style-type: none;
  }
  a{
    text-decoration: none;
    color: #000;
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
                <h2 class="text-center font-weight-bold ">Shipping And Delivery</h2>
               
              </div>
                
            </div>
          </div>
      </div>
    </section>
<section>
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
                        <p>If you have any questions or concerns regarding our Non-Refund & Cancellation Policy, please contact our customer support team at <b> [info@no1marry.com / +91-8281050418].</b></p>
                        <p>By availing of our services, you acknowledge that you have read, understood, and agreed to abide by the terms of our Non-Refund & Cancellation Policy.</p>
                        <p>Thank you for choosing No.1 Marry.com. We appreciate the opportunity to assist you in your journey to find a life partner.</p>
               </span>
           </li>
       </ol>
        </div>
    </div>
</div>
</section>

<footer  class="mt-5" id="footer">
  
   <div class="container">
         <div class="row">
                        <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-4">
               
                 <h5 class="text-center">About</h5>
                 <p>No1 Marry.com is a part of No1 Marry.com - the pioneers of online matrimony service. Today, we are the most trusted Matrimony website by Brand Trust Report. Millions of happy marriages happened and continue to happen through No.1 Marry.com.</p>
               
                 
              </div>
              <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-4">
              
                <h5 class="text-center">Quick Link</h5>
                   <ul>
                      <li><a href="#">Help & Support </a></li>
                      <li><a href="termsandconditions.html">Terms & Conditions</a></li>
                      <li><a href="privacy_policy.html">Privacy Policy</a></li>
                   </ul>
                   
              </div>
              <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 mt-4">
               
                 <h5 class="text-center">Contact Us</h5>
                 <p>AP/X1/73 Agasthyacodu,<br>Anchal, Kollam,<br> India, Kerala
 </p>
              
                
              </div>
         </div>
   </div>
 
   
 </footer>

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