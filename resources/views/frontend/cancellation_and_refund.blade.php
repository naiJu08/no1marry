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
                        
                        <img src="{{ static_asset('assets/assets_1/img/logo.jpg') }}" alt="no.1marry" id="nav-brand">
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        
                      <ul id="nav-lang">
                         <li><a href="{{ route('login') }}" class="btn btn-primary" id="login-btn">LOG IN</a></li>
                        
                         <li class="nav-item dropdown">
                           <form action="" method="post">
                            <select id="lang-dropdown" class="bg-white">
                              <option>English</option>
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
                <h2 class="text-center font-weight-bold ">Cancellation And Refund</h2>
               
              </div>
                
            </div>
          </div>
      </div>
    </section>
<section>
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
                          <ul>
                 <li><a href="mailto:numberonemarry@gmail.com"><i class="fa-solid fa-enevelope"></i><span class="me-1">numberonemarry@gmail.com</span></a></li>
                 <li><a href="tel:+918281050418"><i class="fa-solid fa-phone"></i><span class="me-1">+91 8281050418</span></a></li>
                 <li><a href="tel:+918301070161"><span class="ml-3">+91  8301070161</span></a></li>
                 <li><a href="tel:0475271999"><span class="ml-3">+0475 2271999</span></a></li>
             </ul>
             
              
                
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