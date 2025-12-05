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
  <!-- <link rel="stylesheet" href="{{ static_asset('assets/assets/css/stylemedia.css') }}"> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
</head>
<style>
  :root{
    --brand:#e74f7a;
    --dark:#151515;
  }
  html,body{scroll-behavior:smooth}
  body{font-family:'Poppins', sans-serif;background:#fff;color:#212529}
  /* Transparent glass header */
  .navbar-glass{backdrop-filter:saturate(140%) blur(10px); background:rgba(255,255,255,0.35)!important;}
  .navbar-transparent{background:transparent!important;}
  .nav-link{position:relative}
  .nav-link:after{content:'';position:absolute;left:0;bottom:-6px;width:0;height:2px;background:var(--brand);transition:.3s}
  .nav-link:hover:after{width:100%}
  .btn-brand{background:var(--brand);border:0}
  .btn-brand:hover{filter:brightness(1.05)}
  /* Hero: fixed full-screen background (mobile-friendly) */
  header.hero{
    min-height:100vh;
    position:relative;
    display:flex;
    align-items:center;
    overflow:hidden;
    color:#fff;
  }
  header.hero::before{
    content:'';
    position:fixed; /* stays fixed while page scrolls */
    top:0;left:0;right:0;bottom:0;
    background:url('{{ asset('assets/img/reg-bg.png') }}') center/cover no-repeat;
    will-change:transform;
    transform:translateZ(0);
    z-index:0;
  }
  header.hero::after{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(120deg, rgba(21,21,21,0.75) 0%, rgba(21,21,21,0.45) 60%, rgba(231,79,122,0.55) 100%),
               linear-gradient(to bottom, rgba(21,21,21,0.55) 0%, rgba(21,21,21,0.35) 45%, rgba(21,21,21,0.85) 100%);
    z-index:1; /* overlay above image, below content */
  }
  .hero .container{position:relative; z-index:2}
  /* Glass login card */
  .glass-card{background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.25); backdrop-filter: blur(12px);}
  /* .form-control:focus{box-shadow:0 0 0 .25rem rgba(231,79,122,.25); border-color:var(--brand)}
  .input-icon{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#999}
  .input-with-icon{padding-left:38px}
  .toggle-passwords{position:absolute;right:12px;top:50%;transform:translateY(-50%);cursor:pointer;color:#6c757d;z-index:2} */
  /* Features */
  .feature-card{
    border-radius:20px;
    overflow:hidden;
    transition:transform .35s ease, box-shadow .35s ease;
  }
  .feature-card img{
    height:220px;
    object-fit:cover;
  }
  .feature-card:hover{transform:translateY(-6px); box-shadow:0 16px 40px rgba(0,0,0,.08)}

  /* Timeline */
  .timeline{display:flex;gap:24px;flex-wrap:wrap}
  .timeline .step{
    flex:1 1 200px;
    position:relative;
    padding:18px 16px 16px;
    background:#ffffff;
    border-radius:18px;
    box-shadow:0 12px 30px rgba(0,0,0,.04);
    z-index:1;
  }
  .timeline .dot{width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:var(--brand);color:#fff;margin-bottom:8px}
  .timeline .step:after{
    content:'';
    position:absolute;
    top:20px;
    left:60px;
    right:16px;
    height:2px;
    background:linear-gradient(90deg, var(--brand), transparent);
    z-index:0;
  }
  .timeline .step:last-child:after{display:none}

  @media (max-width: 767.98px){
    .timeline{gap:16px;}
    .timeline .step{
      padding:16px 14px 14px;
    }
    .timeline .step:after{display:none;}
  }

  /* Stories */
  .story-card{
    border-radius:20px;
    overflow:hidden;
    transition:transform .35s ease, box-shadow .35s ease;
  }
  .story-card img{
    height:220px;
    object-fit:cover;
  }
  .story-card:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 40px rgba(0,0,0,.09);
  }

  /* CTA */
  .cta{background:linear-gradient(120deg, #ff8fb1 0%, #ffbfa0 100%)}
  /* Footer */
  footer{background:#0f0f12;color:#bdbdc2}
  footer a{color:#cfcfd6}
  footer a:hover{color:#fff}

    .text-gradient {
    background: linear-gradient(90deg, #ff5f6d, #ffc371);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .input-group-flex {
    display: flex;
    align-items: center;
    border: 1px solid #ffc1c1;
    border-radius: 50px;
    padding: 6px 14px;
    /* background: #fff6f6; */
    gap: 8px;
    transition: all 0.3s ease;
  }

  .input-group-flex:focus-within {
    border-color: #ff7b9c;
    box-shadow: 0 0 8px rgba(255, 123, 156, 0.3);
    background: #fff;
  }

  .icon-wrap {
    color: #ff5f6d;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
  }

  .custom-input {
    border: none;
    outline: none;
    flex: 1;
    background: transparent !important;
    background-color: transparent !important;
    border: 0px !important;
    font-size: 0.95rem;
  }

  .form-control:focus{
    box-shadow: none !important;
    border-color: none !important;
  }

  .custom-input::placeholder {
    color: #c88888;
  }

  .eye-toggle {
    cursor: pointer;
    color: #ff7b9c;
  }

  .btn-brand {
    background: linear-gradient(90deg, #ff5f6d, #ffc371);
    border: none;
  }

  .btn-brand:hover {
    background: linear-gradient(90deg, #ff7b9c, #ffd39f);
  }

  .text-brand {
    color: #ff5f6d;
  }

  .text-brand:hover {
    text-decoration: underline;
  }

  input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active {
  background-color: transparent !important;
  background-image: none !important;
  -webkit-text-fill-color: #000 !important; /* ensure text stays visible */
  transition: background-color 5000s ease-in-out 0s; /* prevents flash */
}

</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-transparent fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#home">
        <img src="https://images.unsplash.com/photo-1608874973456-5c6b4b0d15bf?q=80&w=200&auto=format&fit=crop" alt="No1Marry" class="rounded-circle me-2" width="36" height="36">
        <span class="fw-bold">No1Marry</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#how">How it works</a></li>
          <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
          <li class="nav-item"><a class="nav-link" href="#stories">Success Stories</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        <div class="d-none d-lg-flex ms-3 gap-2">
          <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
          <a href="{{ url('/user/registration') }}" class="btn btn-brand text-white">Register</a>
        </div>
      </div>
    </div>
  </nav>

  <header id="home" class="hero py-5">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-7 text-white" data-aos="fade-right">
          <h1 class="display-4 fw-bold">Find Your Perfect Match, the Modern Way</h1>
          <p class="lead mb-4">Discover verified profiles and meaningful connections, powered by trust and technology.</p>
          <div class="d-flex gap-3 flex-wrap">
            <a href="{{ url('/user/registration') }}" class="btn btn-brand btn-lg text-white">Create Free Account</a>
            <a href="#features" class="btn btn-outline-light btn-lg">Explore Matches</a>
          </div>
          <div class="d-flex gap-4 mt-4 flex-wrap">
            <div><span class="h4 fw-bold">10k+</span><div>Matches Made</div></div>
            <div><span class="h4 fw-bold">50k+</span><div>Active Members</div></div>
            <div><span class="h4 fw-bold">24/7</span><div>Member Support</div></div>
          </div>
        </div>
        <div class="col-lg-5" data-aos="fade-left">
          <div class="card glass-card border-0 rounded-4 shadow-lg">
            <div class="card-body p-4 p-md-5">
              <h5 class="fw-bold mb-4 text-center text-gradient">💖 Member Login 💖</h5>

              <form action="{{ route('login') }}" method="POST" class="login">
                @csrf
                <select name="country_code" id="dropdown11" value="91" hidden style="display:none">
                  <option value="91">(IN) +91)</option>
                </select>

                <!-- Email / Phone -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">Phone / Email</label>
                  <div class="input-group-flex">
                    <div class="icon-wrap">
                      <i class="fa-solid fa-user-rectangle"></i>
                    </div>
                    <input
                      type="text"
                      class="form-control custom-input"
                      name="email"
                      placeholder="Enter phone or email"
                    >
                  </div>
                  @error('email')
                    <span class="invalid-feedback" role="alert" style="display:block">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">Password</label>
                  <div class="input-group-flex">
                    <div class="icon-wrap">
                      <i class="fa-solid fa-lock-heart"></i>
                    </div>
                    <input
                      type="password"
                      id="passwordInput"
                      class="form-control custom-input"
                      name="password"
                      placeholder="Enter password"
                      required
                    >
                    <div class="icon-wrap eye-toggle" onclick="togglePassword()">
                      <i id="eyeIcon" class="fa-regular fa-eye"></i>
                    </div>
                  </div>
                </div>

                <!-- Remember + Forgot -->
                <div class="d-flex justify-content-between align-items-center mb-3 mt-2">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                  </div>
                  <a href="{{ route('password.request') }}" class="small text-brand">Forgot password?</a>
                </div>

                <!-- Login Button -->
                <button class="btn btn-brand w-100 text-white py-2 rounded-pill shadow-sm">
                  <i class="fa-solid fa-right-to-bracket me-2"></i>Log in
                </button>

                <div class="text-center mt-3">
                  <span class="text-muted">New to No1Marry?</span>
                  <a href="{{ url('/user/registration') }}" class="fw-semibold text-brand">Create account</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="features" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Why Choose No1Marry</h2>
        <p class="text-muted">Built for trust, designed for meaningful connections</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
          <div class="card h-100 border-0 shadow-sm feature-card">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Verified Profiles">
            <div class="card-body">
              <h5 class="card-title">Verified Profiles</h5>
              <p class="card-text">Multi-step verification and moderation keep profiles genuine and respectful.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="card h-100 border-0 shadow-sm feature-card">
            <img src="https://images.unsplash.com/photo-1520338801623-6f2a1f74d47e?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Smart Matching">
            <div class="card-body">
              <h5 class="card-title">Smart Matchmaking</h5>
              <p class="card-text">Personalized matches based on preferences, lifestyle, and values.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="card h-100 border-0 shadow-sm feature-card">
            <img src="https://images.unsplash.com/photo-1488197047962-b48492212cda?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Private & Secure">
            <div class="card-body">
              <h5 class="card-title">Private & Secure</h5>
              <p class="card-text">Control your privacy with secure messaging and profile visibility options.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="card h-100 border-0 shadow-sm feature-card">
            <img src="https://images.unsplash.com/photo-1526045478516-99145907023c?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Support">
            <div class="card-body">
              <h5 class="card-title">24/7 Support</h5>
              <p class="card-text">We’re here around the clock to ensure a seamless experience.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="how" class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">How It Works</h2>
      </div>
      <div class="timeline" data-aos="fade-up">
        <div class="step">
          <div class="dot">1</div>
          <h6>Create Your Profile</h6>
          <p class="text-muted mb-0">Tell us about your preferences and aspirations.</p>
        </div>
        <div class="step">
          <div class="dot">2</div>
          <h6>Get Matches</h6>
          <p class="text-muted mb-0">Discover curated profiles tailored to you.</p>
        </div>
        <div class="step">
          <div class="dot">3</div>
          <h6>Connect Privately</h6>
          <p class="text-muted mb-0">Chat securely and get to know each other.</p>
        </div>
        <div class="step">
          <div class="dot">4</div>
          <h6>Begin Your Journey</h6>
          <p class="text-muted mb-0">Take the next steps with confidence.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="stories" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Happy Stories</h2>
        <p class="text-muted">Real couples, real journeys</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100 story-card">
            <img src="https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="story">
            <div class="card-body"><h6>Tanya & Arjun</h6><p class="text-muted mb-0">“We matched in weeks and never looked back.”</p></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100 story-card">
            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="story">
            <div class="card-body"><h6>Riya & Karthik</h6><p class="text-muted mb-0">“Thoughtful matches made it effortless.”</p></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm h-100 story-card">
            <img src="https://images.unsplash.com/photo-1519744792095-2f2205e87b6f?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="story">
            <div class="card-body"><h6>Aisha & Nikhil</h6><p class="text-muted mb-0">“Safe, genuine and truly personal.”</p></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 cta" id="cta">
    <div class="container">
      <div class="row align-items-center g-4 text-white">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-2">Start Your Love Story Today</h2>
          <p class="mb-0">10K+ Matches Made • Trusted by thousands</p>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a href="{{ url('/user/registration') }}" class="btn btn-lg btn-dark">Join Now</a>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5" id="contact">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-md-4">
          <div class="d-flex align-items-center gap-3">
            <i class="fa-solid fa-envelope text-danger fs-4"></i>
            <div>
              <div class="fw-semibold">Email</div>
              <div class="text-muted">support@no1marry.com</div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex align-items-center gap-3">
            <i class="fa-solid fa-phone text-danger fs-4"></i>
            <div>
              <div class="fw-semibold">Phone</div>
              <div class="text-muted">+91-00000 00000</div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex align-items-center gap-3">
            <i class="fa-brands fa-whatsapp text-danger fs-4"></i>
            <div>
              <div class="fw-semibold">WhatsApp</div>
              <div class="text-muted">+91-00000 00000</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="py-4 border-top mt-4">
    <div class="container">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
        <p class="mb-0 small">© {{ date('Y') }} No1Marry. All rights reserved.</p>
        <div class="d-flex flex-wrap align-items-center gap-3">
          <a href="{{ url('/terms_and_conditions') }}" class="small">Terms</a>
          <a href="{{ url('/privacy_policy') }}" class="small">Privacy</a>
          <div class="d-flex gap-2 ms-md-2">
            <a href="#" class="text-reset" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="text-reset" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="text-reset" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    // AOS animations
    AOS.init({ once:true, duration:700, offset:80, easing:'ease-out-cubic' });

    // Header glass effect on scroll
    const nav = document.querySelector('.navbar');
    const toggleNavBg = () => {
      if(window.scrollY > 24){
        nav.classList.add('navbar-glass');
        nav.classList.remove('navbar-transparent');
      }else{
        nav.classList.add('navbar-transparent');
        nav.classList.remove('navbar-glass');
      }
    };
    toggleNavBg();
    window.addEventListener('scroll', toggleNavBg);

    // Toggle password visibility
    document.querySelectorAll('.input-with-icon').forEach((input)=>{
      const wrapper = input.parentElement;
      const eye = document.createElement('i');
      eye.className = 'fa-solid fa-eye-slash toggle-passwords';
      eye.addEventListener('click',()=>{
        input.type = input.type === 'password' ? 'text' : 'password';
        eye.classList.toggle('fa-eye');
        eye.classList.toggle('fa-eye-slash');
      });
      if(input.getAttribute('name')==='password') wrapper.appendChild(eye);
    });
  </script>
</body>
</html>