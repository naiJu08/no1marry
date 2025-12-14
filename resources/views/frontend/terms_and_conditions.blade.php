<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ translate('Terms & Conditions') }} | No1Marry.com</title>
  <link rel="icon" type="image/x-icon" href="{{ static_asset('assets/assets/img/favicon.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    :root {
      --primary: #8a2be2;
      --primary-dark: #5b21b6;
      --accent: #ff6584;
      --gradient: linear-gradient(120deg, #8a2be2, #ff6584);
      --surface: rgba(255, 255, 255, 0.92);
      --text-dark: #1f1f2b;
      --text-muted: #6f7491;
      --border-color: rgba(143, 155, 179, 0.2);
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: #f5f0ff;
      color: var(--text-dark);
      min-height: 100vh;
    }

    .gradient-bg {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 50vh;
      background: radial-gradient(circle at top left, rgba(138, 43, 226, 0.25), transparent 45%),
                  radial-gradient(circle at top right, rgba(255, 101, 132, 0.25), transparent 40%),
                  #f5f0ff;
      z-index: -2;
    }

    .glass-nav {
      background: rgba(255, 255, 255, 0.92);
      box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
      border-radius: 24px;
      margin-top: 1.5rem;
      padding: 0.5rem 1rem;
    }

    .glass-nav .nav-link {
      font-weight: 500;
      color: var(--text-muted);
      transition: color 0.2s;
    }

    .glass-nav .nav-link:hover,
    .glass-nav .nav-link.active {
      color: var(--primary);
    }

    .hero {
      padding: 4rem 0 3rem;
    }

    .hero-card {
      background: var(--surface);
      border-radius: 32px;
      padding: 3rem;
      box-shadow: 0 20px 60px rgba(15, 23, 42, 0.12);
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.65rem;
      padding: 0.55rem 1.5rem;
      border-radius: 999px;
      background: rgba(138, 43, 226, 0.1);
      color: var(--primary);
      font-weight: 500;
      font-size: 0.95rem;
    }

    .hero h1 {
      font-weight: 700;
      font-size: clamp(2rem, 3vw, 2.75rem);
      margin: 1.2rem 0 1rem;
    }

    .hero p {
      color: var(--text-muted);
      font-size: 1rem;
      line-height: 1.7;
    }

    .stats-card {
      display: flex;
      gap: 1.5rem;
      flex-wrap: wrap;
      margin-top: 2rem;
    }

    .stats-card .stat {
      flex: 1 1 200px;
      background: rgba(255, 255, 255, 0.65);
      border-radius: 18px;
      padding: 1.25rem;
      border: 1px solid var(--border-color);
    }

    .stat span {
      display: block;
      font-size: 1rem;
      color: var(--text-muted);
    }

    .stat strong {
      font-size: 1.65rem;
      color: var(--primary);
    }

    .terms-wrapper {
      padding-bottom: 4rem;
    }

    .sticky-card {
      position: sticky;
      top: 120px;
      border-radius: 20px;
      background: var(--surface);
      padding: 2rem;
      box-shadow: 0 15px 40px rgba(15, 23, 42, 0.08);
      border: 1px solid var(--border-color);
    }

    .sticky-card h5 {
      font-weight: 600;
      margin-bottom: 1.2rem;
    }

    .quick-links {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 0.7rem;
    }

    .quick-links a {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      padding: 0.65rem 0.85rem;
      border-radius: 12px;
      color: var(--text-muted);
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .quick-links a:hover {
      background: rgba(138, 43, 226, 0.08);
      color: var(--primary);
      padding-left: 1.2rem;
    }

    .terms-card {
      background: var(--surface);
      border-radius: 28px;
      padding: 2.5rem;
      box-shadow: 0 25px 70px rgba(15, 23, 42, 0.12);
      border: 1px solid var(--border-color);
    }

    .terms-block + .terms-block {
      margin-top: 2.5rem;
      padding-top: 2.5rem;
      border-top: 1px dashed var(--border-color);
    }

    .terms-block h3 {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .terms-block h3 .badge {
      background: rgba(138, 43, 226, 0.15);
      color: var(--primary);
      border-radius: 999px;
      padding: 0.25rem 0.9rem;
      font-size: 0.9rem;
    }

    .terms-block p,
    .terms-block li {
      color: var(--text-muted);
      line-height: 1.8;
      font-size: 1rem;
      text-align: justify;
    }

    .terms-block ul,
    .terms-block ol {
      padding-left: 1.25rem;
      margin-bottom: 1rem;
    }

    .contact-card {
      border-radius: 20px;
      padding: 1.5rem;
      background: rgba(138, 43, 226, 0.08);
      border: 1px solid rgba(138, 43, 226, 0.2);
    }

    .footer {
      text-align: center;
      padding: 2rem 0;
      color: var(--text-muted);
      font-size: 0.95rem;
    }

    @media (max-width: 991px) {
      .glass-nav {
        border-radius: 0;
        margin-top: 0;
      }

      .hero-card,
      .sticky-card,
      .terms-card {
        border-radius: 20px;
        padding: 1.75rem;
      }

      .sticky-card {
        position: static;
        margin-bottom: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="gradient-bg"></div>

  <nav class="navbar navbar-expand-lg navbar-light glass-nav mx-3">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
        <img src="{{ static_asset('assets/img/logo2.1.png') }}" alt="No1Marry Logo" height="40">
        <!-- <span class="fw-bold text-dark">No1Marry</span> -->
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">{{ translate('Home') }}</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/help_and_support') }}">{{ translate('Help & Support') }}</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">{{ translate('Terms & Conditions') }}</a></li>
        </ul>
        <div class="ms-lg-3">
          <a href="{{ route('login') }}" class="btn btn-sm btn-primary px-4 py-2" style="background: var(--gradient); border: none; border-radius: 999px;">{{ translate('Login') }}</a>
        </div>
      </div>
    </div>
  </nav>

  <section class="hero">
    <div class="container">
      <div class="hero-card">
        <div class="hero-badge">
          <i class="fas fa-shield-alt"></i>
          {{ translate('Transparent & Secure Policies') }}
        </div>
        <h1>{{ translate('Terms & Conditions') }}</h1>
        <p>
          {{ translate('We believe in crystal clear communication. Please review the complete terms that govern your experience on No1Marry.com, from account creation to privacy, content guidelines, and global usage policies.') }}
        </p>
        <div class="stats-card">
          <div class="stat">
            <span>{{ translate('Updated') }}</span>
            <strong>{{ now()->format('M d, Y') }}</strong>
          </div>
          <div class="stat">
            <span>{{ translate('Customer Care') }}</span>
            <strong>24/7</strong>
          </div>
          <div class="stat">
            <span>{{ translate('Jurisdiction') }}</span>
            <strong>Kerala, India</strong>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="terms-wrapper">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="sticky-card">
            <h5>{{ translate('Quick Navigation') }}</h5>
            <ul class="quick-links">
              <li><a href="#service"><i class="fas fa-circle"></i>{{ translate('The Service') }}</a></li>
              <li><a href="#registration"><i class="fas fa-circle"></i>{{ translate('Registration Process') }}</a></li>
              <li><a href="#copyrights"><i class="fas fa-circle"></i>{{ translate('Copyrights & Trademarks') }}</a></li>
              <li><a href="#conduct"><i class="fas fa-circle"></i>{{ translate('User Conduct') }}</a></li>
              <li><a href="#content"><i class="fas fa-circle"></i>{{ translate('Content Standards') }}</a></li>
              <li><a href="#monitoring"><i class="fas fa-circle"></i>{{ translate('Monitoring & Links') }}</a></li>
              <li><a href="#transactions"><i class="fas fa-circle"></i>{{ translate('Transactions & Privacy') }}</a></li>
              <li><a href="#termination"><i class="fas fa-circle"></i>{{ translate('Termination') }}</a></li>
              <li><a href="#legal"><i class="fas fa-circle"></i>{{ translate('Legal Clauses') }}</a></li>
              <li><a href="#international"><i class="fas fa-circle"></i>{{ translate('International Use') }}</a></li>
              <li><a href="#support"><i class="fas fa-circle"></i>{{ translate('Customer Support') }}</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="terms-card">
            <div class="terms-block" id="service">
              <h3><span class="badge">01</span>{{ translate('The Service') }}</h3>
              <p>
                {{ translate('Conditions of Use: Users should be competent to access the internet and complete their own registrations. Payments are non-refundable and profiles go live only after ID verification and payment clearance. By registering, you agree to these Terms, our Privacy Policy, and any amendments posted on this website. Continued use indicates acceptance of updated policies.') }}
              </p>
              <p>
                {{ translate('Key obligations include: maintaining accurate registration data, safeguarding your username/password, notifying us of unauthorized access, and confirming that you are 18 years or older. Fees once paid are non-refundable. No1Marry.com aggregates user data for analytics yet does not control or endorse user-generated posts, links, or listings. Additional obligations include:') }}
              </p>
              <ul>
                <li>{{ translate('Submitting court-issued NOC within 10 days for divorced candidates.') }}</li>
                <li>{{ translate('Providing age proof for any DOB change and awaiting parental/reference confirmation before activation.') }}</li>
                <li>{{ translate('Understanding that promotional emails, account deletion after one year of expiry, and registration validity periods apply as per plan chosen.') }}</li>
                <li>{{ translate('Ensuring authenticity of personal data; No1Marry.com is not liable for inaccuracies.') }}</li>
                <li>{{ translate('Recognizing that personal communications via third-party platforms are outside our responsibility.') }}</li>
              </ul>
              <p>
                {{ translate('We are a matchmaking facilitator—not a guarantee of marriage. Members must supply their own verified mobile numbers for future verification. No1Marry.com reserves the right to terminate accounts (including duplicates) without refund for violations or fraudulent activity.') }}
              </p>
            </div>

            <div class="terms-block" id="registration">
              <h3><span class="badge">02</span>{{ translate('Registration Process') }}</h3>
              <p>
                {{ translate('During signup you agree to provide current, complete, and accurate data and keep it updated. Accounts impersonating other individuals or misusing identity information may be deleted. We may refuse service to any user who violates these requirements.') }}
              </p>
            </div>

            <div class="terms-block" id="copyrights">
              <h3><span class="badge">03</span>{{ translate('Copyrights & Trademarks') }}</h3>
              <p>
                {{ translate('All No1Marry.com names, logos, and assets are protected trademarks and copyrighted content. You may not copy, reproduce, distribute, reverse engineer, or create derivatives without written permission. Removing proprietary notices or misusing intellectual property will result in termination and potential legal action.') }}
              </p>
            </div>

            <div class="terms-block" id="conduct">
              <h3><span class="badge">04</span>{{ translate('User Conduct Expectations') }}</h3>
              <p>
                {{ translate('Members must treat others respectfully and interact responsibly in every No1Marry.com environment. Access to profile contact details is limited to matches within your age criteria, and daily outreach volumes are capped. One free profile per candidate (valid for 30 days) is permitted. Customer support is available via WhatsApp voice/text and email; phone calls are not allowed.') }}
              </p>
            </div>

            <div class="terms-block" id="content">
              <h3><span class="badge">05</span>{{ translate('Content Standards') }}</h3>
              <p>
                {{ translate('You are solely responsible for the content you post (profiles, listings, testimonials, etc.). We may remove offensive or unlawful content. Prohibited material includes, but is not limited to:') }}
              </p>
              <ul>
                <li>{{ translate('Harassing, bigoted, obscene, or violent expressions.') }}</li>
                <li>{{ translate('Solicitations, spam, chain letters, or pyramid schemes.') }}</li>
                <li>{{ translate('Content infringing on intellectual property rights.') }}</li>
                <li>{{ translate('Viruses or code that disrupts our services.') }}</li>
                <li>{{ translate('Harvesting personal data or sharing details without consent.') }}</li>
                <li>{{ translate('Advertising illegal services or misrepresenting origin.') }}</li>
              </ul>
            </div>

            <div class="terms-block" id="monitoring">
              <h3><span class="badge">06</span>{{ translate('Monitoring & External Links') }}</h3>
              <p>
                {{ translate('We reserve the right to monitor communications for compliance. External links found on the platform lead to third-party sites beyond our control; their policies govern those experiences. We recommend reviewing their terms independently.') }}
              </p>
            </div>

            <div class="terms-block" id="transactions">
              <h3><span class="badge">07</span>{{ translate('Transactions, Privacy & Use of Information') }}</h3>
              <p>
                {{ translate('All dealings with third-party organizations or individuals discovered via No1Marry.com—including payments—are strictly between you and such parties. We are not liable for disputes, losses, or damages arising from these arrangements, nor do we support dowry, commission, or brokerage practices.') }}
              </p>
              <p>
                {{ translate('By using our services, you acknowledge that internet transmissions may not be fully secure, and you release us from liability for misuse of information once shared with others. Exercise caution when sharing personal data. Search engines may index public profile elements, and No1Marry.com may adjust features over time.') }}
              </p>
            </div>

            <div class="terms-block" id="termination">
              <h3><span class="badge">08</span>{{ translate('Termination Policy') }}</h3>
              <ul>
                <li>{{ translate('We reserve the right to refuse or end membership at any time for conduct violating these Terms without notice.') }}</li>
                <li>{{ translate('Duplicate profiles may be suspended or removed.') }}</li>
                <li>{{ translate('Harassment, unethical communication, or misconduct towards other members or their families will result in immediate termination.') }}</li>
              </ul>
            </div>

            <div class="terms-block" id="legal">
              <h3><span class="badge">09</span>{{ translate('Legal Clauses & Liability') }}</h3>
              <p>
                <strong>{{ translate('Disclaimer of Warranties:') }}</strong>
                {{ translate('Use of our services is at your sole risk. They are provided “as is” without warranties of merchantability, fitness for a particular purpose, or non-infringement. We do not guarantee uninterrupted, timely, or error-free service, nor accuracy of information obtained.') }}
              </p>
              <p>
                <strong>{{ translate('Limitation of Liability:') }}</strong>
                {{ translate('No1Marry.com, its licensors, and suppliers are not liable for indirect, incidental, or consequential damages, including lost profits, even if advised of the possibility. Some jurisdictions may not allow such limitations; in those cases, the minimal liability permitted by law applies.') }}
              </p>
              <p>
                <strong>{{ translate('Indemnity:') }}</strong>
                {{ translate('You agree to defend and hold No1Marry.com harmless from claims or losses arising from content you submit, your breach of this Agreement, or disputes involving your use of the service.') }}
              </p>
              <p>
                <strong>{{ translate('General Terms:') }}</strong>
                {{ translate('This Agreement is governed by the laws of the Union of India with exclusive jurisdiction at Munsif Court Punalur. If any clause is deemed invalid, the remainder still applies. You cannot assign this Agreement. Delays caused by forces beyond our control do not constitute breaches.') }}
              </p>
              <p>
                {{ translate('Registration fees are non-refundable. Submission of official identity proof is mandatory during verification. We provide an online platform to connect interested individuals, but do not guarantee any specific number of profiles or outcomes.') }}
              </p>
            </div>

            <div class="terms-block" id="international">
              <h3><span class="badge">10</span>{{ translate('International Use & Final Acknowledgement') }}</h3>
              <p>
                {{ translate('Given the global reach of the internet, you agree to comply with all local regulations regarding online conduct and acceptable content. This Agreement supersedes prior communications. Continued use after updates constitutes acceptance of revised terms.') }}
              </p>
              <p>
                {{ translate('Technology platforms may face occasional technical issues; service acceptance implies recognition of such possibilities. By registering on No1Marry.com you confirm you have read and agree to abide by these Terms & Conditions.') }}
              </p>
            </div>

            <div class="terms-block" id="support">
              <h3><span class="badge">11</span>{{ translate('Customer Support & Contact') }}</h3>
              <div class="contact-card">
                <h5 class="mb-3">{{ translate('24/7 Support Services') }}</h5>
                <p class="mb-2"><i class="fas fa-envelope me-2"></i> <strong>numberonemarry@gmail.com</strong></p>
                <!-- <p class="mb-0"><i class="fas fa-phone me-2"></i> <strong>+91 82810 50418 | +91 83010 70161</strong></p> -->
                <p class="mt-3 mb-0">{{ translate('No1Marry.com (the “Site”) and its licensed mobile application are owned and operated by No1Marry.com.') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="footer">
    <p>{{ translate(' :year No1Marry.com. All rights reserved.', ['year' => now()->format('Y')]) }}</p>
    <p class="mb-0">{{ translate('Designed with care to align with our modern, AI-ready experience.') }}</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.querySelectorAll('.quick-links a').forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          window.scrollTo({
            top: target.offsetTop - 80,
            behavior: 'smooth'
          });
        }
      });
    });
  </script>
</body>
</html>