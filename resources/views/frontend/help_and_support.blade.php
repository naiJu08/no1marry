<!DOCTYPE html>
<html lang="en">
<head>
  <title>No1 Marry.com | Help &amp; Support</title>
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
  <link rel="stylesheet" href="{{ static_asset('assets/assets/css/stylemedia.css') }}">
  <style>
    body{
      font-family: 'Poppins', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background:#f4f5fb;
      color:#111827;
    }

    a{
      text-decoration:none;
    }

    /* Top minimal header */
    #header_1{
      background:#0f172a;
      padding:.75rem 0;
      box-shadow:0 8px 25px rgba(15,23,42,.4);
      position:sticky;
      top:0;
      z-index:1030;
    }

    #nav-brand{
      height:64px;
      object-fit:contain;
    }

    #nav-lang{
      margin:0;
      padding:0;
      display:flex;
      align-items:center;
      justify-content:flex-end;
      gap:.75rem;
      list-style:none;
    }

    #login-btn{
      border-radius:999px;
      padding:.4rem 1.3rem;
      background:linear-gradient(120deg,#ef4444,#f97316);
      border:0;
      font-weight:500;
    }

    #login-btn:hover{
      filter:brightness(1.08);
    }

    #lang-dropdown{
      border-radius:999px;
      border:1px solid rgba(148,163,184,.7);
      padding:.3rem .9rem;
      font-size:.85rem;
    }

    /* Hero */
    .support-hero{
      padding:4.5rem 0 3rem;
      background:radial-gradient(circle at 0 0,#f97316 0,transparent 45%),
                 radial-gradient(circle at 100% 0,#ec4899 0,transparent 45%),
                 linear-gradient(135deg,#020617,#020617 50%,#0f172a 100%);
      color:#f9fafb;
      position:relative;
      overflow:hidden;
    }

    .support-hero:before{
      content:"";
      position:absolute;
      inset:0;
      background:radial-gradient(circle at 50% 120%,rgba(248,250,252,.16),transparent 65%);
      opacity:.6;
      pointer-events:none;
    }

    .support-hero .container{
      position:relative;
      z-index:1;
    }

    .badge-soft{
      display:inline-flex;
      align-items:center;
      gap:.35rem;
      padding:.25rem .75rem;
      border-radius:999px;
      border:1px solid rgba(248,250,252,.18);
      background:rgba(15,23,42,.7);
      font-size:.75rem;
      text-transform:uppercase;
      letter-spacing:.08em;
    }

    .pill-stat{
      display:inline-flex;
      align-items:center;
      gap:.5rem;
      padding:.35rem .8rem;
      border-radius:999px;
      background:rgba(15,23,42,.9);
      font-size:.8rem;
    }

    /* Content area */
    .support-main{
      margin-top:-2rem;
      padding-bottom:3rem;
    }

    .support-card{
      border-radius:1.25rem;
      border:1px solid rgba(148,163,184,.3);
      box-shadow:0 18px 45px rgba(15,23,42,.08);
      background:#ffffff;
    }

    .support-card-header{
      border-bottom:1px solid rgba(226,232,240,.9);
      padding:1.3rem 1.5rem 1rem;
    }

    .support-card-body{
      padding:1.3rem 1.5rem 1.5rem;
    }

    .support-icon-circle{
      width:40px;
      height:40px;
      border-radius:999px;
      display:flex;
      align-items:center;
      justify-content:center;
      background:#eff6ff;
      color:#1d4ed8;
      margin-right:.75rem;
    }

    .support-list{
      padding-left:0;
      list-style:none;
    }

    .support-list li{
      display:flex;
      align-items:flex-start;
      gap:.5rem;
      padding:.45rem 0;
      font-size:.92rem;
      color:#4b5563;
    }

    .support-list li i{
      margin-top:.20rem;
      color:#10b981;
    }

    .support-meta{
      font-size:.82rem;
      color:#6b7280;
    }

    /* Complaint form */
    .complaint-title{
      font-size:1.1rem;
      font-weight:600;
      margin-bottom:.25rem;
    }

    .complaint-sub{
      font-size:.85rem;
      color:#6b7280;
      margin-bottom:1rem;
    }

    .form-label{
      font-size:.88rem;
      font-weight:500;
      color:#374151;
    }

    .form-control{
      border-radius:.65rem;
      border-color:#e5e7eb;
      font-size:.9rem;
    }

    .form-control:focus{
      border-color:#f97316;
      box-shadow:0 0 0 .15rem rgba(249,115,22,.25);
    }

    .btn-complaint{
      background:linear-gradient(120deg,#f97316,#ec4899);
      border:none;
      border-radius:999px;
      padding:.55rem 1.4rem;
      font-weight:500;
      font-size:.9rem;
    }

    .btn-complaint:hover{
      filter:brightness(1.06);
    }

    /* Modern input groups for support form */
    .support-input-group{
      position:relative;
      margin-bottom:1.1rem;
    }

    .support-input-label{
      display:flex;
      align-items:center;
      justify-content:space-between;
      font-size:.86rem;
      font-weight:500;
      color:#374151;
      margin-bottom:.25rem;
    }

    .support-input-shell{
      position:relative;
      border-radius:.9rem;
      background:#f9fafb;
      border:1px solid #e5e7eb;
      box-shadow:0 6px 18px rgba(15,23,42,.04);
      padding:.15rem .15rem .15rem .15rem;
    }

    .support-input-icon{
      position:absolute;
      left:14px;
      top:50%;
      transform:translateY(-50%);
      color:#9ca3af;
      font-size:.95rem;
      pointer-events:none;
    }

    .support-input{
      border:none;
      background:transparent;
      padding:.55rem .9rem .55rem 2.3rem;
      width:100%;
      font-size:.9rem;
      border-radius:.8rem;
      outline:none;
      box-shadow:none;
    }

    .support-input:focus{
      box-shadow:none;
    }

    .support-input-shell:focus-within{
      border-color:#f97316;
      box-shadow:0 0 0 .15rem rgba(249,115,22,.18);
      background:#ffffff;
    }

    .support-input--textarea{
      resize:vertical;
      min-height:120px;
      padding-top:.7rem;
    }

    footer{
      background:#020617;
      color:#9ca3af;
      padding:2.2rem 0 1.8rem;
      margin-top:2rem;
    }

    footer h5{
      color:#e5e7eb;
      font-size:1rem;
      margin-bottom:.8rem;
    }

    footer p,footer li,footer a{
      font-size:.88rem;
    }

    footer a{
      color:#e5e7eb;
    }

    footer a:hover{
      color:#f97316;
    }

    footer ul{
      padding-left:0;
      list-style:none;
    }

    @media (max-width: 767.98px){
      .support-hero{
        padding:4rem 0 2.5rem;
      }
      .support-main{
        margin-top:-1.5rem;
      }
      #nav-brand{
        height:52px;
      }
    }
  </style>
</head>
<body oncontextmenu="return false;">
  <header id="header_1">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-6 col-6 mt-3">
          <img src="{{ static_asset('assets/img/logo2.1.png') }}" alt="No1Marry" id="nav-brand">
        </div>
        <div class="col-md-6 col-6">
          <ul id="nav-lang">
            @if(auth()->check())
              <li>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
              </li>
              <li>
                <a href="{{ route('member.listing') }}" class="btn btn-outline-light btn-sm">Members</a>
              </li>
              <li>
                <a href="{{ route('logout') }}" class="btn btn-primary btn-sm" id="login-btn">Logout</a>
              </li>
            @else
              <li><a href="{{ route('login') }}" class="btn btn-primary" id="login-btn">LOG IN</a></li>
            @endif
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

  <section class="support-hero">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-7 mb-4 mb-lg-0">
          <span class="badge-soft mb-3">
            <i class="fa-solid fa-life-ring"></i>
            <span>Help &amp; Support</span>
          </span>
          <h1 class="h2 h-md-1 fw-bold mb-3">We are here to help you stay safe and supported</h1>
          <p class="mb-3" style="max-width:32rem; color:#e5e7eb;">
            Reach out to us for any issues, safety concerns, or feedback while using No1Marry. Our team reviews every complaint carefully.
          </p>
          <div class="d-flex flex-wrap align-items-center gap-2">
            <div class="pill-stat mb-2">
              <i class="fa-solid fa-shield-heart text-success"></i>
              <span>All actions monitored by admin</span>
            </div>
            <div class="pill-stat mb-2">
              <i class="fa-solid fa-user-check text-info"></i>
              <span>Report profiles &amp; share concerns</span>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="support-card">
            <div class="support-card-header d-flex align-items-center">
              <div class="support-icon-circle">
                <i class="fa-solid fa-circle-info"></i>
              </div>
              <div>
                <div class="fw-semibold">How Help &amp; Support works</div>
                <div class="support-meta">Admin sees who raised the request and for which profile it is related.</div>
              </div>
            </div>
            <div class="support-card-body">
              <ul class="support-list mb-0">
                <li>
                  <i class="fa-solid fa-check-circle"></i>
                  <span>All sensitive actions on the platform are visible to the admin for safety review.</span>
                </li>
                <li>
                  <i class="fa-solid fa-check-circle"></i>
                  <span>Reporting and complaint options are reviewed to keep members safe and respectful.</span>
                </li>
                <li>
                  <i class="fa-solid fa-check-circle"></i>
                  <span>Your details are used only to verify and act on your complaint.</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="support-main">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-7">
          <div class="support-card h-100">
            <div class="support-card-header">
              <h2 class="h5 mb-1">Need help with something specific?</h2>
              <p class="support-meta mb-0">Please describe the issue clearly so that our team can respond faster.</p>
            </div>
            <div class="support-card-body">
              <form method="POST" action="{{ route('complaints.store') }}">
                @csrf
                <div class="support-input-group">
                  <div class="support-input-label">
                    <span>Name</span>
                  </div>
                  <div class="support-input-shell">
                    <span class="support-input-icon">
                      <i class="fa-solid fa-user"></i>
                    </span>
                    <input
                      type="text"
                      id="complaint_name"
                      name="name"
                      class="support-input"
                      value="{{ auth()->check() ? trim(auth()->user()->first_name.' '.auth()->user()->last_name) : old('name') }}"
                      required
                    >
                  </div>
                </div>

                <div class="support-input-group">
                  <div class="support-input-label">
                    <span>Email</span>
                  </div>
                  <div class="support-input-shell">
                    <span class="support-input-icon">
                      <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input
                      type="email"
                      id="complaint_email"
                      name="email"
                      class="support-input"
                      value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                      @if(auth()->check()) readonly @endif
                      required
                    >
                  </div>
                </div>

                <div class="support-input-group">
                  <div class="support-input-label">
                    <span>Phone (optional)</span>
                  </div>
                  <div class="support-input-shell">
                    <span class="support-input-icon">
                      <i class="fa-solid fa-phone"></i>
                    </span>
                    <input
                      type="text"
                      id="complaint_phone"
                      name="phone"
                      class="support-input"
                      value="{{ old('phone') }}"
                      placeholder="Your contact number so we can reach you"
                    >
                  </div>
                </div>

                <div class="support-input-group">
                  <div class="support-input-label">
                    <span>Address (optional)</span>
                  </div>
                  <div class="support-input-shell">
                    <span class="support-input-icon" style="top:16px; transform:none;">
                      <i class="fa-solid fa-location-dot"></i>
                    </span>
                    <textarea
                      id="complaint_address"
                      name="address"
                      rows="3"
                      class="support-input support-input--textarea"
                      style="padding-left:2.4rem;"
                      placeholder="City, state or any address details that help us understand your case better"
                    >{{ old('address') }}</textarea>
                  </div>
                </div>

                <div class="support-input-group">
                  <div class="support-input-label">
                    <span>Subject</span>
                  </div>
                  <div class="support-input-shell">
                    <span class="support-input-icon">
                      <i class="fa-solid fa-tag"></i>
                    </span>
                    <input
                      type="text"
                      id="complaint_subject"
                      name="subject"
                      class="support-input"
                      placeholder="Brief title for your complaint"
                      required
                    >
                  </div>
                </div>

                <div class="support-input-group mb-3">
                  <div class="support-input-label">
                    <span>Complaint</span>
                  </div>
                  <small class="d-block text-muted mb-1" style="font-size:.8rem;">
                    Please include any relevant details like member ID/profile link, your phone number, and what exactly happened.
                  </small>
                  <div class="support-input-shell">
                    <span class="support-input-icon" style="top:16px; transform:none;">
                      <i class="fa-solid fa-comment-dots"></i>
                    </span>
                    <textarea
                      id="complaint_message"
                      name="message"
                      rows="6"
                      class="support-input support-input--textarea"
                      style="padding-left:2.4rem;"
                      placeholder="Describe your issue clearly. For example: member ID / profile link, date & time, what went wrong, and how we can help."
                      required
                    >{{ old('message') }}</textarea>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-complaint">
                  <i class="fa-solid fa-paper-plane mr-1"></i>
                  Submit Complaint
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="support-card mb-3">
            <div class="support-card-header">
              <h2 class="h6 mb-0">Contact information</h2>
            </div>
            <div class="support-card-body">
              <ul class="support-list">
                <li>
                  <i class="fa-solid fa-envelope"></i>
                  <span>numberonemarry@gmail.com</span>
                </li>
                <!-- <li>
                  <i class="fa-solid fa-phone"></i>
                  <span>+91 82810 50418, +91 83010 70161, 0475 2271999</span>
                </li> -->
              </ul>
              <p class="support-meta mt-2 mb-0">Support hours: 10:00 AM – 6:00 PM (IST), Monday to Saturday.</p>
            </div>
          </div>

          <div class="support-card">
            <div class="support-card-header">
              <h2 class="h6 mb-0">Quick links</h2>
            </div>
            <div class="support-card-body">
              <ul class="support-list mb-0">
                <li>
                  <i class="fa-solid fa-file-contract"></i>
                  <a href="{{ url('/terms_and_conditions') }}">Terms &amp; Conditions</a>
                </li>
                <li>
                  <i class="fa-solid fa-user-shield"></i>
                  <a href="{{ url('/privacy_policy') }}">Privacy Policy</a>
                </li>
                <li>
                  <i class="fa-solid fa-circle-question"></i>
                  <span>General queries via email/phone will also be answered by our support team.</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-12 mt-3">
          <h5 class="text-center text-md-left">About</h5>
          <p>No1 Marry.com is a part of No1 Marry.com - the pioneers of online matrimony service. Millions of happy marriages continue to happen through No1Marry.</p>
        </div>
        <div class="col-md-4 col-sm-12 mt-3">
          <h5 class="text-center text-md-left">Quick Links</h5>
          <ul>
            <li><a href="{{ url('/help_and_support') }}">Help &amp; Support</a></li>
            <li><a href="{{ url('/terms_and_conditions') }}">Terms &amp; Conditions</a></li>
            <li><a href="{{ url('/privacy_policy') }}">Privacy Policy</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-12 mt-3">
          <h5 class="text-center text-md-left">Contact Us</h5>
          <ul>
            <li><a href="mailto:numberonemarry@gmail.com"><i class="fa-solid fa-envelope"></i><span class="ml-1">numberonemarry@gmail.com</span></a></li>
            <li><a href="tel:+918281050418"><i class="fa-solid fa-phone"></i><span class="ml-1">+91 8281050418</span></a></li>
            <li><a href="tel:+918301070161"><span class="ml-4">+91 8301070161</span></a></li>
            <li><a href="tel:04752271999"><span class="ml-4">0475 2271999</span></a></li>
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

