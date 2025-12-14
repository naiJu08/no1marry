<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ translate('Login') }} | No1Marry.com</title>
  <link rel="icon" type="image/x-icon" href="{{ static_asset('assets/assets/img/favicon.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
  <style>
    :root {
      --brand:#e74f7a;
      --brand-dark:#b32458;
      --dark:#111827;
      --muted:#6b7280;
      --glass-bg: rgba(255, 255, 255, 0.85);
      --border: rgba(255, 255, 255, 0.35);
      --gradient: linear-gradient(120deg, #ec4899, #8b5cf6);
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: #0f172a;
      color: var(--dark);
      min-height: 100vh;
      overflow-x: hidden;
    }

    .hero {
      min-height: 100vh;
      position: relative;
      display: flex;
      flex-direction: column;
    }

    .hero-bg-layer {
      position: fixed;
      inset: 0;
      background-position: center;
      background-size: cover;
      opacity: 0.25;
      filter: blur(4px);
      z-index: -2;
    }

    .gradient-overlay {
      position: fixed;
      inset: 0;
      background: radial-gradient(circle at top left, rgba(255,255,255,0.12), transparent 45%),
                  radial-gradient(circle at bottom right, rgba(231,79,122,0.18), transparent 35%),
                  linear-gradient(160deg, rgba(15,23,42,0.85), rgba(76,29,149,0.7));
      z-index: -1;
    }

    .navbar {
      margin-top: 1.5rem;
      padding: 1rem 0;
      background: rgba(255,255,255,0.08);
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,0.12);
      backdrop-filter: blur(18px);
      box-shadow: 0 20px 60px rgba(15,23,42,0.45);
    }

    .navbar .nav-link {
      color: #f8fafc !important;
      font-weight: 500;
      padding: 0.5rem 1rem;
      border-radius: 999px;
      transition: background 0.2s;
    }

    .navbar .nav-link:hover,
    .navbar .nav-link.active {
      background: rgba(255,255,255,0.12);
    }

    .login-wrapper {
      flex: 1;
      padding: 4rem 0;
      display: flex;
      align-items: center;
    }

    .login-card {
      background: rgba(255,255,255,0.09);
      border-radius: 32px;
      padding: clamp(2rem, 4vw, 3rem);
      border: 1px solid rgba(255,255,255,0.2);
      backdrop-filter: blur(24px);
      box-shadow: 0 30px 80px rgba(8,16,44,0.45);
    }

    .login-card h1 {
      color: #f8fafc;
      font-weight: 700;
      margin-bottom: 0.75rem;
    }

    .login-card p {
      color: rgba(248,250,252,0.8);
    }

    .form-control {
      background: rgba(255,255,255,0.85);
      border: none;
      border-radius: 18px;
      padding: 0.85rem 1.2rem;
      font-size: 1rem;
    }

    .form-control:focus {
      box-shadow: 0 0 0 3px rgba(236,72,153,0.2);
    }

    .btn-brand {
      background: var(--gradient);
      border: none;
      border-radius: 18px;
      padding: 0.9rem 1.5rem;
      font-weight: 600;
      color: white;
      width: 100%;
      box-shadow: 0 20px 40px rgba(236,72,153,0.35);
    }

    .glass-info {
      background: rgba(255,255,255,0.08);
      border-radius: 20px;
      border: 1px solid rgba(255,255,255,0.15);
      padding: 1.25rem;
      color: rgba(248,250,252,0.95);
    }

    .feature-chip {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.35rem 0.9rem;
      border-radius: 999px;
      background: rgba(255,255,255,0.12);
      color: #f8fafc;
      font-size: 0.9rem;
    }

    footer {
      color: rgba(248,250,252,0.65);
      padding-bottom: 1.5rem;
    }

    @media (max-width: 992px) {
      .navbar {
        border-radius: 18px;
      }
    }
  </style>
</head>
<body>
  <div class="hero-bg-layer" style="background-image: url('{{ static_asset('assets/img/main2.png') }}');"></div>
  <div class="gradient-overlay"></div>

  <header class="container hero">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center gap-2 text-white" href="{{ url('/') }}">
          <img src="{{ static_asset('assets/img/logo2.1.png') }}" alt="No1Marry" height="40">
          <span class="fw-bold">No1Marry</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">{{ translate('Home') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/help_and_support') }}">{{ translate('Help & Support') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/terms_and_conditions') }}">{{ translate('Terms') }}</a></li>
            <li class="nav-item ms-lg-2"><a class="btn btn-light btn-sm px-4" href="{{ url('/user/registration') }}">{{ translate('Join Now') }}</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="login-wrapper">
      <div class="container">
        <div class="row g-4 align-items-center">
          <div class="col-lg-6 text-white" data-aos="fade-up">
            <div class="feature-chip mb-3">
              <i class="fas fa-shield-alt"></i> {{ translate('Secure & private login') }}
            </div>
            <h1 class="display-5 fw-bold">{{ translate('Welcome back to No1Marry') }}</h1>
            <p class="lead text-white-50">{{ translate('Continue your journey with curated matches, verified profiles, and AI-assisted guidance.') }}</p>
            <div class="glass-info mt-4">
              <div class="d-flex flex-wrap gap-3">
                <div>
                  <span class="d-block fw-semibold text-white">10K+</span>
                  <small class="text-white-50">{{ translate('Successful Matches') }}</small>
                </div>
                <div>
                  <span class="d-block fw-semibold text-white">24/7</span>
                  <small class="text-white-50">{{ translate('Support Availability') }}</small>
                </div>
                <div>
                  <span class="d-block fw-semibold text-white">100%</span>
                  <small class="text-white-50">{{ translate('Privacy-focused') }}</small>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="login-card">
              <h1>{{ translate('Login to your account') }}</h1>
              <p>{{ translate('Access premium matchmaking insights and continue where you left off.') }}</p>

              <form action="{{ route('login') }}" method="POST" class="mt-4" autocomplete="off">
                @csrf
                @if (addon_activation('otp_system'))
                  <div class="mb-3">
                    <label class="form-label text-white-50">{{ translate('Registered Phone Number') }}</label>
                    <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ translate('Enter phone number') }}" required>
                    @error('email')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                @else
                  <div class="mb-3">
                    <label class="form-label text-white-50">{{ translate('Country Code & Phone') }}</label>
                    <div class="input-group">
                      <select class="form-select" style="max-width:130px" name="country_code" id="dropdown11">
                        <option value="91">+91</option>
                        <option value="1">+1</option>
                        <option value="44">+44</option>
                      </select>
                      <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ translate('Enter phone number') }}" required>
                    </div>
                    @error('email')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                @endif

                <div class="mb-3">
                  <label class="form-label text-white-50">{{ translate('Password') }}</label>
                  <input type="password" name="password" class="form-control" placeholder="{{ translate('Enter your password') }}" required>
                </div>

                <div class="d-flex justify-content-between mb-3">
                  <div class="form-check text-white-50">
                    <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                    <label class="form-check-label" for="remember">{{ translate('Keep me signed in') }}</label>
                  </div>
                  <a class="text-white" href="{{ route('password.request') }}">{{ translate('Forgot password?') }}</a>
                </div>

                <button type="submit" class="btn btn-brand">{{ translate('Login') }}</button>

                <div class="text-center text-white-50 mt-4">
                  <span>{{ translate("Don't have an account?") }}</span>
                  <a href="{{ url('/user/registration') }}" class="text-white fw-semibold">{{ translate('Create one now') }}</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="text-center mt-5">
      <small>© {{ date('Y') }} No1Marry.com • {{ translate('All rights reserved') }}</small>
    </footer>
  </header>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ once: true, duration: 700, offset: 80, easing: 'ease-out' });
  </script>
</body>
</html>
