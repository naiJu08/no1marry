<!DOCTYPE html>
<html lang="en">
<head>
  <title>No1 Marry.com - Password Reset</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #8a2be2;
      --primary-dark: #6a1cb0;
      --secondary: #ff6b9d;
      --accent: #00d4ff;
      --light: #f8f9ff;
      --dark: #1a1a2e;
      --gradient: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      --ai-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      background-color: var(--light);
      color: var(--dark);
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: 
        radial-gradient(circle at 10% 20%, rgba(138, 43, 226, 0.05) 0%, transparent 20%),
        radial-gradient(circle at 90% 80%, rgba(255, 107, 157, 0.05) 0%, transparent 20%);
      z-index: -1;
    }

    .ai-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      opacity: 0.03;
      background-image: 
        url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%238a2be2' fill-opacity='0.4' fill-rule='evenodd'/%3E%3C/svg%3E");
    }

    .navbar {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
      border-bottom: 1px solid rgba(138, 43, 226, 0.1);
      padding: 0.8rem 0;
    }

    .navbar-brand {
      font-family: 'Playfair Display', serif;
      font-weight: 600;
      font-size: 1.8rem;
      color: var(--primary) !important;
      display: flex;
      align-items: center;
    }

    .navbar-brand img {
      filter: drop-shadow(0 2px 4px rgba(138, 43, 226, 0.2));
    }

    .navbar-nav .nav-link {
      color: var(--dark) !important;
      font-weight: 500;
      margin: 0 0.5rem;
      padding: 0.5rem 1rem !important;
      border-radius: 50px;
      transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      background: var(--gradient);
      color: white !important;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(138, 43, 226, 0.3);
    }

    .auth-container {
      min-height: calc(100vh - 76px);
      display: flex;
      align-items: center;
      padding: 2rem 0;
    }

    .hero-section {
      background: linear-gradient(135deg, rgba(138, 43, 226, 0.1) 0%, rgba(255, 107, 157, 0.1) 100%);
      border-radius: 20px;
      padding: 3rem;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .hero-section::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -20%;
      width: 400px;
      height: 400px;
      background: var(--ai-gradient);
      border-radius: 50%;
      opacity: 0.05;
      filter: blur(40px);
    }

    .hero-section::after {
      content: '';
      position: absolute;
      bottom: -30%;
      left: -10%;
      width: 300px;
      height: 300px;
      background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);
      border-radius: 50%;
      opacity: 0.05;
      filter: blur(30px);
    }

    .trust-badge {
      display: inline-flex;
      align-items: center;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 50px;
      padding: 0.5rem 1.2rem;
      font-size: 0.9rem;
      font-weight: 500;
      margin-bottom: 1.5rem;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      border: 1px solid rgba(138, 43, 226, 0.1);
      backdrop-filter: blur(5px);
    }

    .hero-title {
      font-family: 'Playfair Display', serif;
      font-weight: 600;
      font-size: 2.2rem;
      line-height: 1.3;
      margin-bottom: 1.5rem;
      color: var(--dark);
    }

    .hero-subtitle {
      color: #666;
      font-size: 1rem;
      line-height: 1.6;
      margin-bottom: 2rem;
    }

    .steps-list {
      list-style: none;
      padding-left: 0;
    }

    .steps-list li {
      display: flex;
      align-items: flex-start;
      margin-bottom: 1.2rem;
      padding: 1rem;
      background: rgba(255, 255, 255, 0.8);
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
      border-left: 4px solid var(--primary);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .steps-list li:hover {
      transform: translateX(5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .step-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background: var(--gradient);
      border-radius: 50%;
      color: white;
      font-size: 1.1rem;
      margin-right: 1rem;
      flex-shrink: 0;
    }

    .step-content h5 {
      font-weight: 600;
      margin-bottom: 0.3rem;
      color: var(--dark);
    }

    .step-content p {
      color: #666;
      font-size: 0.9rem;
      margin-bottom: 0;
    }

    /* Right Panel - Form */
    .form-section {
      background: white;
      border-radius: 20px;
      padding: 2.5rem;
      height: 100%;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
      position: relative;
      overflow: hidden;
      border: 1px solid rgba(138, 43, 226, 0.1);
    }

    .form-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 5px;
      background: var(--gradient);
    }

    .secure-badge {
      display: inline-flex;
      align-items: center;
      background: rgba(0, 212, 255, 0.1);
      color: var(--accent);
      border-radius: 50px;
      padding: 0.5rem 1.2rem;
      font-size: 0.9rem;
      font-weight: 500;
      margin-bottom: 1.5rem;
      border: 1px solid rgba(0, 212, 255, 0.3);
    }

    .form-title {
      font-family: 'Playfair Display', serif;
      font-weight: 600;
      font-size: 1.8rem;
      margin-bottom: 0.5rem;
      color: var(--dark);
    }

    .form-subtitle {
      color: #666;
      font-size: 0.95rem;
      margin-bottom: 2rem;
    }

    .phone-input-container {
      display: flex;
      gap: 10px;
      margin-bottom: 1.5rem;
    }

    .country-select {
      flex: 0 0 120px;
    }

    .phone-input {
      flex: 1;
    }

    .form-control, .select2-selection {
      border: 2px solid #eef2f7;
      border-radius: 12px;
      padding: 0.75rem 1rem;
      font-size: 1rem;
      transition: all 0.3s ease;
      height: auto;
    }

    .form-control:focus, .select2-selection:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(138, 43, 226, 0.1);
    }

    .btn-otp {
      background: var(--gradient);
      color: white;
      border: none;
      border-radius: 12px;
      padding: 1rem;
      font-weight: 600;
      font-size: 1rem;
      width: 100%;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(138, 43, 226, 0.3);
      position: relative;
      overflow: hidden;
    }

    .btn-otp:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(138, 43, 226, 0.4);
      color: white;
    }

    .btn-otp::after {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.7s;
    }

    .btn-otp:hover::after {
      left: 100%;
    }

    .back-link {
      display: inline-flex;
      align-items: center;
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .back-link:hover {
      color: var(--primary-dark);
      text-decoration: none;
      transform: translateX(-5px);
    }

    .ai-features {
      display: flex;
      justify-content: space-between;
      margin-top: 2.5rem;
      padding-top: 2rem;
      border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    .ai-feature {
      text-align: center;
      flex: 1;
      padding: 0 0.5rem;
    }

    .ai-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
      background: var(--ai-gradient);
      border-radius: 12px;
      color: white;
      font-size: 1.2rem;
      margin-bottom: 0.8rem;
      box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    .ai-feature h6 {
      font-weight: 600;
      font-size: 0.9rem;
      margin-bottom: 0.3rem;
      color: var(--dark);
    }

    .ai-feature p {
      font-size: 0.8rem;
      color: #666;
      margin-bottom: 0;
    }

    /* Footer */
    .footer {
      text-align: center;
      padding: 1.5rem 0;
      color: #666;
      font-size: 0.9rem;
      border-top: 1px solid rgba(0, 0, 0, 0.05);
      margin-top: 2rem;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
      .hero-section, .form-section {
        padding: 2rem;
      }
      
      .hero-title {
        font-size: 1.8rem;
      }
      
      .auth-container {
        padding: 1rem 0;
      }
    }

    @media (max-width: 768px) {
      .phone-input-container {
        flex-direction: column;
      }
      
      .country-select {
        flex: 0 0 auto;
      }
      
      .ai-features {
        flex-direction: column;
        gap: 1.5rem;
      }
    }

    /* Select2 customization */
    .select2-container--default .select2-selection--single {
      border: 2px solid #eef2f7;
      border-radius: 12px;
      height: auto;
      padding: 0.75rem 1rem;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 1.5;
      padding-left: 0;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 100%;
    }
  </style>
</head>
<body>
  <div class="ai-background"></div>
  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ static_asset('assets/img/logo2.1.png') }}" alt="No1Marry" class="mr-2" height="40">
        <!-- <span>No1Marry.com</span> -->
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/help_and_support') }}">Help & Support</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @php
    $otpSent = $otpSent ?? false;
    $contactMode = $contactMode ?? 'phone';
    $submittedContact = isset($submittedContact) ? $submittedContact : old('email');
    $submittedCountryCode = isset($submittedCountryCode) ? $submittedCountryCode : old('country_code', '91');
  @endphp

  <!-- Main Content -->
  <div class="auth-container">
    <div class="container">
      <div class="row align-items-stretch">
        <!-- Left Panel - Hero Section -->
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="hero-section">
            <div class="trust-badge">
              <i class="fas fa-heart text-danger mr-2"></i>
              {{ translate('AI-Powered Matrimonial Platform') }}
            </div>
            
            <h1 class="hero-title">
              {{ translate('Reset your password and continue your journey to find love') }}
            </h1>
            
            <p class="hero-subtitle">
              {{ translate('Our AI-powered system ensures your account recovery is both secure and effortless. Enter your mobile number to receive a secure reset link or OTP.') }}
            </p>
            
            <ul class="steps-list">
              <li>
                <div class="step-icon">1</div>
                <div class="step-content">
                  <h5>{{ translate('Enter Your Details') }}</h5>
                  <p>{{ translate('Choose your country code and enter the registered mobile number.') }}</p>
                </div>
              </li>
              <li>
                <div class="step-icon">2</div>
                <div class="step-content">
                  <h5>{{ translate('Receive Secure Code') }}</h5>
                  <p>{{ translate('We send a secure reset link / OTP to your mobile or email.') }}</p>
                </div>
              </li>
              <li>
                <div class="step-icon">3</div>
                <div class="step-content">
                  <h5>{{ translate('Create New Password') }}</h5>
                  <p>{{ translate('Create a new password and log in safely to your account.') }}</p>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <!-- Right Panel - Form Section -->
        <div class="col-lg-6">
          <div class="form-section">
            <div class="secure-badge">
              <i class="fas fa-shield-alt mr-2"></i>
              {{ translate('AI-Enhanced Security') }}
            </div>
            
            <h2 class="form-title">{{ $otpSent ? translate('Verify & Update Password') : translate('Reset Your Password') }}</h2>
            <p class="form-subtitle">
              @if(!$otpSent)
                {{ translate('Enter your registered WhatsApp number and we will send a secure OTP to complete your password reset.') }}
              @else
                {{ translate('Enter the OTP you received and create your new password to regain access immediately.') }}
              @endif
            </p>

            @if($otpSent && isset($submittedContact))
              <div class="alert alert-success d-flex align-items-start">
                <i class="fas fa-check-circle mr-2 mt-1"></i>
                <div>
                  <strong>{{ translate('OTP sent!') }}</strong><br>
                  {{ translate('We sent a verification code to') }}
                  {{ $contactMode === 'email' ? $submittedContact : ('+'. $submittedCountryCode.' '.$submittedContact) }}.
                  {{ translate('Please enter it below along with your new password.') }}
                </div>
              </div>
            @endif

            @if(!$otpSent)
              <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                  <label for="phone" class="form-label">{{ translate('Registered WhatsApp Number') }}</label>
                  <div class="phone-input-container">
                    <div class="country-select">
                      <select class="form-control select2" id="country_code" name="country_code">
                        <option value="91" {{ $submittedCountryCode == '91' ? 'selected' : '' }}>India (+91)</option>
                        <option value="1" {{ $submittedCountryCode == '1' ? 'selected' : '' }}>USA/Canada (+1)</option>
                        <option value="44" {{ $submittedCountryCode == '44' ? 'selected' : '' }}>UK (+44)</option>
                        <option value="971" {{ $submittedCountryCode == '971' ? 'selected' : '' }}>UAE (+971)</option>
                        <option value="61" {{ $submittedCountryCode == '61' ? 'selected' : '' }}>Australia (+61)</option>
                        <option value="65" {{ $submittedCountryCode == '65' ? 'selected' : '' }}>Singapore (+65)</option>
                      </select>
                    </div>
                    <div class="phone-input">
                      <input id="tel" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                             name="email" value="{{ $submittedContact }}" autocomplete="off" required
                             placeholder="{{ translate('Enter your mobile number') }}">
                    </div>
                  </div>

                  @if ($errors->has('email'))
                    <div class="invalid-feedback d-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </div>
                  @endif
                </div>

                <div class="form-group mt-4">
                  <button class="btn btn-otp" type="submit">
                    <i class="fas fa-key mr-2"></i>
                    {{ translate('Send OTP to WhatsApp') }}
                  </button>
                </div>
              </form>
            @else
              <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="email" value="{{ optional($user)->id }}">

                <div class="form-group">
                  <label for="otp" class="form-label">{{ translate('Enter OTP') }}</label>
                  <input id="otp" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" required>
                  @if ($errors->has('code'))
                    <div class="invalid-feedback d-block">
                      <strong>{{ $errors->first('code') }}</strong>
                    </div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="password" class="form-label">{{ translate('New Password') }}</label>
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                    <div class="invalid-feedback d-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="password-confirm" class="form-label">{{ translate('Confirm Password') }}</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="form-group mt-4">
                  <button class="btn btn-otp" type="submit">
                    <i class="fas fa-lock mr-2"></i>
                    {{ translate('Verify & Update Password') }}
                  </button>
                </div>
              </form>

              <div class="text-center mt-3">
                <a href="{{ route('password.request') }}" class="back-link">
                  <i class="fas fa-sync-alt mr-2"></i>
                  {{ translate('Use a different number / email') }}
                </a>
              </div>
            @endif

            <div class="text-center mt-4">
              <a href="{{ route('user.login') }}" class="back-link">
                <i class="fas fa-arrow-left mr-2"></i>
                {{ translate('Back to Login') }}
              </a>
            </div>
            
            <!-- AI Features -->
            <div class="ai-features">
              <div class="ai-feature">
                <div class="ai-icon">
                  <i class="fas fa-robot"></i>
                </div>
                <h6>{{ translate('AI Protection') }}</h6>
                <p>{{ translate('Smart fraud detection') }}</p>
              </div>
              <div class="ai-feature">
                <div class="ai-icon">
                  <i class="fas fa-bolt"></i>
                </div>
                <h6>{{ translate('Instant Recovery') }}</h6>
                <p>{{ translate('Quick account access') }}</p>
              </div>
              <div class="ai-feature">
                <div class="ai-icon">
                  <i class="fas fa-user-shield"></i>
                </div>
                <h6>{{ translate('Secure') }}</h6>
                <p>{{ translate('Encrypted connection') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="footer">
        <p>{{ translate(' 2023 No1Marry.com. All rights reserved.') }}</p>
        <p class="small">{{ translate('Powered by AI matchmaking technology') }}</p>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
  
  <script>
    $(document).ready(function() {
      // Initialize Select2
      $('#country_code').select2({
        placeholder: "Select country",
        width: '100%'
      });
      
      // Form animation on focus
      $('.form-control').on('focus', function() {
        $(this).parent().addClass('focused');
      });
      
      $('.form-control').on('blur', function() {
        if ($(this).val() === '') {
          $(this).parent().removeClass('focused');
        }
      });
      
      // Button animation
      $('.btn-otp').on('mouseenter', function() {
        $(this).addClass('animated');
      });
      
      $('.btn-otp').on('mouseleave', function() {
        $(this).removeClass('animated');
      });
      
      // Navbar scroll effect
      $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
          $('.navbar').addClass('scrolled');
        } else {
          $('.navbar').removeClass('scrolled');
        }
      });
    });
  </script>
</body>
</html>