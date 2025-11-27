@extends('frontend.layouts.app')
@section('content')

<style>
  @media only screen 
  and (min-device-width: 210px) 
  and (max-device-width:320px)
{

  .upload-button
{
  margin-top: -2% !important;
    margin-left:61% !important;
    position: absolute;
    z-index: 9999 !important;
}


}
@media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 480px)
{
  .upload-button
{
  margin-top: -7% !important;
    margin-left:61% !important;
    position: absolute;
    z-index: 9999 !important;
}
}
@media only screen 
  and (min-device-width:480px) 
  and (max-device-width:620px)
{
  .upload-button
{
  margin-top: -7% !important;
    margin-left:58% !important;
    position: absolute;
    z-index: 9999!important;
}
}
@media only screen 
  and (min-device-width:620px) 
  and (max-device-width:720px)
  {
    .upload-button
{
  margin-top: -7% !important;
    margin-left:58% !important;
    position: absolute;
    z-index: 9999 !important;
}
  }
@media only screen 
  and (min-device-width:720px) 
  and (max-device-width:820px)
  {
    .upload-button
{
  margin-top: -7% !important;
    margin-left:57% !important;
    position: absolute;
    z-index: 9999 !important;
}

}
@media only screen 
  and (min-device-width:820px) 
  and (max-device-width:1200px)
  {


    .upload-button {
    margin-top:14% !important;
     margin-left:21% !important;
    position: absolute;
    z-index: 9999 !important;
}


}



  .file-upload {
    display: none;
}
.upload-button {
    margin-top: 11%;
    margin-left: 18%;
    position: absolute;
    /* padding: 10px; */
    z-index: 9999;
    /* border: solid; */
    color: #fff;
    border-radius: 50%;
    background: #18bdff;
    height: 50px;
    width: 50px;
    text-align: center;
    align-items: center;
    justify-content: center;
    display: flex;
}

    :root {
        --member-dashboard-bg: linear-gradient(160deg, #f7f2ff 0%, #fff5ef 50%, #eef6ff 100%);
        --member-card-bg: rgba(255, 255, 255, 0.82);
        --member-card-border: rgba(255, 255, 255, 0.55);
        --member-card-shadow: 0 20px 46px rgba(44, 13, 85, 0.18);
        --member-text-dark: #1b132f;
        --member-text-muted: #7c7396;
        --member-accent-primary: #9062ff;
        --member-accent-secondary: #ff9770;
    }

    .profile-header {
        position: relative;
        display: grid;
        grid-template-columns: auto 1fr auto;
        gap: clamp(1.5rem, 4vw, 3rem);
        padding: clamp(2rem, 4vw, 3rem);
        border-radius: 32px;
        background: var(--member-dashboard-bg);
        border: 1px solid var(--member-card-border);
        box-shadow: var(--member-card-shadow);
        overflow: hidden;
    }

    .profile-header::before,
    .profile-header::after {
        content: "";
        position: absolute;
        width: 420px;
        height: 420px;
        border-radius: 50%;
        pointer-events: none;
        filter: blur(80px);
        opacity: 0.55;
        animation: float-header 14s ease-in-out infinite;
    }

    .profile-header::before {
        background: rgba(144, 98, 255, 0.35);
        top: -240px;
        right: -140px;
    }

    .profile-header::after {
        background: rgba(255, 151, 112, 0.28);
        bottom: -260px;
        left: -160px;
        animation-delay: 1.9s;
    }

    .profile-header .circle {
        width: clamp(120px, 18vw, 150px);
        height: clamp(120px, 18vw, 150px);
        border-radius: 40px;
        border: 4px solid rgba(255, 255, 255, 0.7);
        overflow: hidden;
        box-shadow: 0 18px 40px rgba(47, 14, 92, 0.16);
    }

    .profile-header .profile-pic {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-avatar {
        position: relative;
        width: clamp(140px, 20vw, 170px);
        height: clamp(140px, 20vw, 170px);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-avatar-badge {
        position: relative;
        width: 100%;
        height: 100%;
        border-radius: 44px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-avatar-backdrop {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(143, 98, 255, 0.3), rgba(255, 159, 123, 0.28));
        filter: blur(22px);
        opacity: 0.85;
    }

    .profile-avatar-ring {
        position: absolute;
        inset: 0;
        border-radius: 44px;
        border: 4px solid rgba(255, 255, 255, 0.7);
        box-shadow: inset 0 0 0 6px rgba(255, 255, 255, 0.18), 0 24px 46px rgba(42, 16, 91, 0.18);
        pointer-events: none;
    }

    .profile-avatar-image {
        position: relative;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 44px;
        z-index: 1;
    }

    .profile-avatar form {
        position: absolute;
        bottom: 12px;
        right: 12px;
        z-index: 2;
    }

    .profile-avatar-trigger {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 16px;
        background: linear-gradient(135deg, #8f62ff, #ff9f7b);
        color: #fff;
        box-shadow: 0 14px 28px rgba(74, 32, 130, 0.32);
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
    }

    .profile-avatar-trigger i {
        font-size: 1.1rem;
    }

    .profile-avatar-trigger:hover {
        transform: translateY(-2px);
        box-shadow: 0 18px 34px rgba(74, 32, 130, 0.35);
    }

    .profile-avatar .file-upload {
        display: none;
    }

    .profile-nav-info {
        color: var(--member-text-dark);
        display: grid;
        gap: 0.75rem;
        align-content: center;
    }

    .profile-nav-info h3 {
        font-size: clamp(1.75rem, 3vw, 2.25rem);
        font-weight: 700;
        margin: 0;
        display: inline-flex;
        align-items: center;
        gap: 0.65rem;
        color: var(--member-text-dark);
    }

    .profile-nav-info .address,
    .profile-nav-info .Memberid {
        display: flex;
        gap: 0.65rem;
        flex-wrap: wrap;
        font-size: 0.95rem;
        color: var(--member-text-muted);
    }

    .profile-option {
        display: flex;
        align-items: flex-start;
        justify-content: flex-end;
    }

    .profile-option .notification a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.9rem 1.4rem;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.55);
        background: rgba(255, 255, 255, 0.82);
        color: var(--member-text-dark);
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 16px 34px rgba(55, 24, 103, 0.16);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .profile-option .notification a:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 40px rgba(55, 24, 103, 0.22);
    }

    .profile-option .alert-message {
        min-width: 32px;
        height: 32px;
        border-radius: 999px;
        background: linear-gradient(135deg, var(--member-accent-primary), var(--member-accent-secondary));
        color: #fff;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    .dashboard-tabs-wrapper {
        margin-top: clamp(1.5rem, 3vw, 2.5rem);
        background: var(--member-card-bg);
        border-radius: 24px;
        border: 1px solid var(--member-card-border);
        box-shadow: var(--member-card-shadow);
        backdrop-filter: blur(18px);
    }

    .dashboard-tabs-wrapper ul {
        list-style: none;
        margin: 0;
        padding: clamp(1rem, 2vw, 1.5rem);
        display: flex;
        flex-wrap: wrap;
        gap: 0.85rem;
    }

    .dashboard-tab {
        flex: 1 1 160px;
    }

    .dashboard-tab-link {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.65rem;
        padding: 0.95rem 1.2rem;
        border-radius: 18px;
        background: rgba(144, 98, 255, 0.14);
        color: var(--member-text-dark);
        font-weight: 600;
        text-decoration: none;
        border: 1px solid transparent;
        transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease, border-color 0.3s ease;
    }

    .dashboard-tab.active .dashboard-tab-link,
    .dashboard-tab-link:hover,
    .dashboard-tab-link:focus {
        background: linear-gradient(135deg, var(--member-accent-primary), var(--member-accent-secondary));
        color: #fff;
        border-color: transparent;
        box-shadow: 0 16px 34px rgba(144, 98, 255, 0.28);
        transform: translateY(-3px);
    }

    .dashboard-tab-icon {
        display: inline-flex;
        width: 32px;
        height: 32px;
        border-radius: 12px;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.35);
        color: inherit;
    }

    .main-bd {
        margin-top: clamp(1.5rem, 3vw, 2.5rem);
    }

    @keyframes float-header {
        0%, 100% {
            transform: translate3d(0, 0, 0);
        }
        50% {
            transform: translate3d(0, 20px, 0);
        }
    }

    @media (max-width: 992px) {
        .profile-header {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .profile-option {
            justify-content: center;
        }

        .dashboard-tab {
            flex: 1 1 calc(50% - 0.85rem);
        }
    }

    @media (max-width: 576px) {
        .dashboard-tab {
            flex: 1 1 100%;
        }

        .profile-option .notification a {
            width: 100%;
        }
    }
</style>


<section class="glass-page">
  
	<div>
	 
	  <div class="profile-header">
		<div class="profile-avatar">
		  <div class="profile-avatar-badge">
		    <div class="profile-avatar-backdrop"></div>
		    <div class="profile-avatar-ring"></div>
		    <img class="profile-avatar-image" src="@if(Auth::user()->photo != "") {{ uploaded_asset(Auth::user()->photo) }} @else {{ static_asset('assets/img/avatar-place.png') }} @endif" alt="Profile Image">
		    <form action="{{ route('uplode.uplode_pro_pic') }}" method="POST" name="pro_form" id="pro_form" enctype="multipart/form-data">
				{{ @csrf_field() }}
		      <label for="file-upload" class="profile-avatar-trigger" id="upload-button-pro">
		        <i class="fa-solid fa-camera"></i>
		      </label>
		      <input class="file-upload" type="file" name="file-upload" id="file-upload"/>
		    </form>
		  </div>
		</div>
		<div class="profile-nav-info">
		  <h3 class="user-name">{{Auth::user()->first_name}} @if(Auth::user()->membership == 2)<span class="ml-2"><img src="{{ static_asset('assets/assets_1/img/crown.png') }}" width="45px" height="45px">@endif</span></h3>
		  <div class="address">
			<p id="state" class="state">{{ \Carbon\Carbon::parse(Auth::user()->member->birthday)->age }}yrs</p>
			<span id="country" class="country">({{ \Carbon\Carbon::parse(Auth::user()->member->birthday)->format('M d Y') }})</span>
		  </div>
		  <div class="Memberid">
			<p id="state" class="state">Member ID : </p>
			<span id="country" class="country">{{Auth::user()->code}}</span>
		  </div>
	
		</div>
		<div class="profile-option">
            @php
             $unseen_chat_threads = chat_threads();
            $unseen_chat_thread_count = count($unseen_chat_threads);
            @endphp
          <div class="notification">
            <a href="{{ route('all.messages') }}" class="btn text-reset btn-block w-100">
            <i class="fa fa-message"></i>
            <span class="alert-message">{{$unseen_chat_thread_count}}</span>
            </a>
          </div>
        </div>
      </div>

      <div class="dashboard-tabs-wrapper">
        <ul>
          <li class="dashboard-tab @if(request()->routeIs('profile_settings')) active @endif">
            <a href="{{ route('profile_settings') }}" class="dashboard-tab-link">
              <span class="dashboard-tab-icon"><i class="fa fa-user"></i></span>
              {{ __('Profile') }}
            </a>
          </li>
          <li class="dashboard-tab @if(request()->routeIs('my_interests.index')) active @endif">
            <a href="{{ route('my_interests.index') }}" class="dashboard-tab-link">
              <span class="dashboard-tab-icon"><i class="fa fa-heart"></i></span>
              {{ __('My Interests') }}
            </a>
          </li>
          <li class="dashboard-tab @if(request()->routeIs('my_shortlists')) active @endif">
            <a href="{{ route('my_shortlists') }}" class="dashboard-tab-link">
              <span class="dashboard-tab-icon"><i class="fa fa-list-ul"></i></span>
              {{ __('Shortlist') }}
            </a>
          </li>
          <li class="dashboard-tab @if(request()->routeIs('all.messages')) active @endif">
            <a href="{{ route('all.messages') }}" class="dashboard-tab-link">
              <span class="dashboard-tab-icon"><i class="fa fa-comments"></i></span>
              {{ __('Messaging') }}
            </a>
          </li>
          <li class="dashboard-tab @if(request()->routeIs('my_ignored_list')) active @endif">
            <a href="{{ route('my_ignored_list') }}" class="dashboard-tab-link">
              <span class="dashboard-tab-icon"><i class="fa fa-ban"></i></span>
              {{ __('Ignored List') }}
            </a>
          </li>
        </ul>
      </div>

      <div class="main-bd">
        <div class="left-side">
        <!--  <div class="profile-side">-->
        <!--  <p class="mobile-no">upload picture(png,jpg,jpeg - accepted)</p>-->
		<!--	<p class="mobile-no"> <span id="timer">-->
		<!--	  {{-- <span id="days">{{ Carbon\Carbon::parse(Auth::user()->member->package_validity)->diffForHumans() }}</span> --}}-->
		<!--	</span></p>-->
		<!--	<p class="mobile-no"> <i class="fa-solid fa-phone-alt"></i>{{Auth::user()->phone}}</p>-->
		<!--	<p class="mobile-no"> <i class="fa-solid fa-envelope"></i>{{Auth::user()->email}}</p>-->
        <!--<h4 class="fs-18 mb-3 w-100"  id="chatBtn1" style="text-align: center;">-->
        <!--	{{ translate('Package expiry date') }}:<br>-->
        <!--	@if(package_validity(Auth::user()->id))-->

        <!-- {{date("d-M-Y", strtotime(Auth::user()->member->package_validity )) }}	-->
        <!-- @else-->
        <!--		<span class="text-danger w-100 chatbtn">{{translate('Expired')}}</span>-->
        <!--	@endif-->
        <!--  </h4>-->

		<!--</div>-->
		  
	
		</div>
        <div class="right-side glass-surface" style="padding: 10px">

             <script>
//     $(document).ready(function() {

    
// var readURL = function(input) {
//     if (input.files && input.files[0]) {
            $(".file-upload").on('change', function(){
                // readURL(this);
				$( "#pro_form" ).trigger( "submit" );
            });

            $("#upload-button-pro").on('click', function() {
               $(".file-upload").click();
            });
// });
  </script>
            <div class="profile-body">
                @yield('panel_content')
          </div>
        </div>
	  </div>
	</div>

</section>
			
				

@endsection
@section('script')
 <script>
	  $(document).ready(function() {
  
  // required elements
  var imgPopup = $('.img-popup');
  var imgCont  = $('.container__img-holder');
  var popupImage = $('.img-popup img');
  var closeBtn = $('.close-btn');
  
  // handle events
  imgCont.on('click', function() {
	var img_src = $(this).children('img').attr('src');
	imgPopup.children('img').attr('src', img_src);
	imgPopup.addClass('opened');
  });
  
  $(imgPopup, closeBtn).on('click', function() {
	imgPopup.removeClass('opened');
	imgPopup.children('img').attr('src', '');
  });
  
  popupImage.on('click', function(e) {
	e.stopPropagation();
  });
  
  });
  </script>
<script>
	// Initialize Bootstrap components
	$(document).ready(function () {
	  $('[data-bs-toggle="collapse"]').collapse();
	});
  </script>
  
	<script>
  $(document).ready(function(){
	$('.dropdown-submenu a.test').on("click", function(e){
	  $(this).next('ul').toggle();
	  e.stopPropagation();
	  e.preventDefault();
	});
  });
  
  </script>
  
  <script>
	  baguetteBox.run('.grid-gallery', {
		  animation: 'slideIn'
	  });
  </script>
 
  <script>
	$(".nav ul li").click(function() {
	$(this)
	  .addClass("active")
	  .siblings()
	  .removeClass("active");
  });
  
  const tabBtn = document.querySelectorAll(".nav ul li");
  const tab = document.querySelectorAll(".tab");
  
  function tabs(panelIndex) {
	tab.forEach(function(node) {
	  node.style.display = "none";
	});
	tab[panelIndex].style.display = "block";
  }
  tabs(0);
  
  let bio = document.querySelector(".bio");
  const bioMore = document.querySelector("#see-more-bio");
  const bioLength = bio.innerText.length;
  
  function bioText() {
	bio.oldText = bio.innerText;
  
	bio.innerText = bio.innerText.substring(0, 100) + "...";
	bio.innerHTML += `<span onclick='addLength()' id='see-more-bio'>See More</span>`;
  }
  //        console.log(bio.innerText)
  
  bioText();
  
  function addLength() {
	bio.innerText = bio.oldText;
	bio.innerHTML +=
	  "&nbsp;" + `<span onclick='bioText()' id='see-less-bio'>See Less</span>`;
	document.getElementById("see-less-bio").addEventListener("click", () => {
	  document.getElementById("see-less-bio").style.display = "none";
	});
  }
  if (document.querySelector(".alert-message").innerText > 9) {
	document.querySelector(".alert-message").style.fontSize = ".7rem";
  }
  
  </script>
  <script>
	const profilesPerPage = 5;
	const profileCards = document.querySelectorAll('.profile-card');
	const pagination = document.getElementById('pagination');
  
	if (profileCards.length > 3) {
	  // If there are more than 3 profile cards, display pagination
  
	  // Calculate the total number of pages needed
	  const totalPages = Math.ceil(profileCards.length / profilesPerPage);
  
	  for (let page = 1; page <= totalPages; page++) {
		const li = document.createElement('li');
		const a = document.createElement('a');
		a.href = 'javascript:void(0)';
		a.innerText = page;
		a.onclick = function() {
		  showPage(page);
		};
		li.appendChild(a);
		pagination.appendChild(li);
	  }
	} else {
	  // If there are 3 or fewer profile cards, do not display pagination
	  pagination.style.display = 'none';
  
	  // Show all profile cards
	  profileCards.forEach(card => {
		card.style.display = 'block';
	  });
	}
  
	let currentPage = 1;
  
	function showPage(page) {
	  // Hide all profiles
	  profileCards.forEach(card => {
		card.style.display = 'none';
	  });
  
	  // Calculate the range of profiles to display
	  const startIndex = (page - 1) * profilesPerPage;
	  const endIndex = startIndex + profilesPerPage;
  
	  // Display the selected profiles
	  for (let i = startIndex; i < endIndex && i < profileCards.length; i++) {
		profileCards[i].style.display = 'block';
	  }
  
	  currentPage = page;
	}
  
	// Show the initial page (page 1)
	showPage(currentPage);
  </script>
  <script>
	// Define the number of items to display per page (5 columns in this case)
	const itemsPerPage = 5;
  
	// Get the container and profile cards
	const container = document.getElementById("profileContainer");
	const profileCard = document.querySelectorAll(".profile_shortlist");
  
	// Calculate the total number of pages
	const totalPages = Math.ceil(profileCard.length / itemsPerPage);
  
	// Function to display the correct items for the selected page
	function displayPage(pageNumber) {
	  // Calculate the starting and ending indices for the page
	  const startIndex = (pageNumber - 1) * itemsPerPage;
	  const endIndex = pageNumber * itemsPerPage;
  
	  // Clear the container
	  container.innerHTML = '';
  
	  // Display the profile cards for the current page
	  for (let i = startIndex; i < endIndex && i < profileCard.length; i++) {
		container.appendChild(profileCard[i]);
	  }
	}
  
	// Function to create pagination controls
	function createPaginationControls() {
	  const paginationContainer = document.getElementById("pagination-container");
  
	  for (let i = 1; i <= totalPages; i++) {
		const pageButton = document.createElement("button");
		pageButton.textContent = i;
		pageButton.addEventListener("click", () => {
		  displayPage(i);
		});
		paginationContainer.appendChild(pageButton);
	  }
	}
  
	// Initialize pagination
	createPaginationControls();
	displayPage(1); // Display the first page by default
  </script>
  <script>
	jQuery(document).ready(function() {
  
  $(".chat-list a").click(function() {
	$(".chatbox").addClass('showbox');
	return false;
  });
  
  $(".chat-icon").click(function() {
	$(".chatbox").removeClass('showbox');
  });
  
  
  });
  </script>
  <script>
	$(document).ready(function () {
	  $('.dropdown-submenu a.test').on("click", function (e) {
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	  });
	});
  
  </script>
  <script>
  function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
	tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
	tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
  }
  
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
  </script>
  <script>
  $(document).ready(function(){
	$('.dropdown-submenu a.test').on("click", function(e){
	  $(this).next('ul').toggle();
	  e.stopPropagation();
	  e.preventDefault();
	});
  });
  
  </script>
  <script>
	$(function () {
	  $("#example1").DataTable({
		"responsive": true, "lengthChange": false, "autoWidth": false,
		"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
	  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	  $('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
	  });
	});
  </script>
  <script>
	var timer;
  
  var compareDate = new Date();
  compareDate.setDate(compareDate.getDate() + 7); //just for this demo today + 7 days
  
  timer = setInterval(function() {
	timeBetweenDates(compareDate);
  }, 1000);
  
  function timeBetweenDates(toDate) {
	var dateEntered = toDate;
	var now = new Date();
	var difference = dateEntered.getTime() - now.getTime();
  
	if (difference <= 0) {
  
	  // Timer done
	  clearInterval(timer);
	
	} else {
	  
	  var seconds = Math.floor(difference / 1000);
	  var minutes = Math.floor(seconds / 60);
	  var hours = Math.floor(minutes / 60);
	  var days = Math.floor(hours / 24);
  
	  hours %= 24;
	  minutes %= 60;
	  seconds %= 60;
  
	  $("#days").text(days);
	  $("#hours").text(hours);
	  $("#minutes").text(minutes);
	  $("#seconds").text(seconds);
	}
  }
  </script>
  <script>
	$(document).ready(function(){
	$("#Create-post").click(function(){
	  Swal.fire({
	title: "Contact Admin!",
	text: "You clicked the button!",
	icon: "success"
  });
	});
	});
	</script>


	{{-- <script>
	    $(".file-upload").on('change', function(){
	        var pic = this.value;
			var url = $('.profile-pic').attr('src');
        console.log(url);
        $('.file-upload').val(url);
        });
	</script> --}}
  <script src="{{ static_asset('assets/assets_1/jquery.dataTables.js') }}"></script>
  <script src="{{ static_asset('assets/assets_1/jquery.dataTables.min.js') }}"></script>
  <script src="{{ static_asset('assets/assets_1/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ static_asset('assets/assets_1/dataTables.bootstrap4.min.js') }}"></script>
@endsection

