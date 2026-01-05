@extends('frontend.layouts.member_panel')
@section('panel_content')
@php
    $memberName = Auth::check() ? (Auth::user()->first_name ?? Auth::user()->name ?? __('Member')) : __('Guest');
    $membershipLabels = [
        2 => __('Premium Member'),
        3 => __('Elite Member'),
        4 => __('Elite Member'),
    ];
    $membershipTier = Auth::check() ? ($membershipLabels[optional(Auth::user())->membership] ?? __('Member')) : __('Visitor');
    $profileCompletion = optional(optional(Auth::user())->member)->profile_completion ?? 70;
    $profileCompletion = max(min($profileCompletion, 100), 0);
    $newMatchCollection = collect($new_members ?? []);
    $premiumMatchCollection = collect($premium_members ?? []);
    $successStories = [
        [
            'names' => 'Ananya & Rohan',
            'story' => __('They met through No1Marry and celebrated a dreamy destination wedding in Goa.'),
            'photo' => static_asset('assets/img/avatar-place.png'),
        ],
        [
            'names' => 'Simran & Aakash',
            'story' => __('From first match to forever in just four months, thanks to curated recommendations.'),
            'photo' => static_asset('assets/img/avatar-place.png'),
        ],
    ];
    $upcomingEvents = [
        [
            'title' => __('Premium Mixer: Moonlight Soirée'),
            'date' => __('Dec 12, 2025'),
            'location' => __('Mumbai, India'),
        ],
        [
            'title' => __('Virtual Elite Connect'),
            'date' => __('Jan 05, 2026'),
            'location' => __('Online Event'),
        ],
    ];
@endphp

<style>
    :root {
        --dashboard-bg: linear-gradient(175deg, #f7f1ff 0%, #fff6f3 45%, #f0f8ff 100%);
        --brand-primary: #c695ff;
        --brand-secondary: #ff9f7b;
        --brand-dark: #1b102f;
        --brand-light: #ffffff;
        --glass-border: rgba(255, 255, 255, 0.45);
        --glass-shadow: 0 12px 40px rgba(46, 9, 79, 0.12);
        --text-muted: #7e7b8c;
        --success: #30c48d;
        --warning: #ffc75f;
    }

    #member-dashboard {
        width: 100%;
        background: var(--dashboard-bg);
        min-height: calc(100vh - 120px);
        overflow: hidden;
    }

    .dashboard-container {
        width: min(92%, 1300px);
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .dashboard-hero {
        position: relative;
        padding: 4rem 0 3rem;
    }

    .dashboard-hero::before,
    .dashboard-hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        filter: blur(60px);
        opacity: 0.55;
        animation: float 14s ease-in-out infinite;
    }

    .dashboard-hero::before {
        width: 420px;
        height: 420px;
        background: #e3d0ff;
        top: -140px;
        right: -160px;
    }

    .dashboard-hero::after {
        width: 340px;
        height: 340px;
        background: #ffd2c0;
        bottom: -120px;
        left: -120px;
    }

    .hero-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2.5rem;
        align-items: center;
    }

    .hero-intro {
        position: relative;
        color: var(--brand-dark);
        animation: fadeUp 0.9s ease;
    }

    .hero-intro h2 {
        font-size: clamp(2rem, 4vw, 2.9rem);
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.12;
    }

    .hero-intro p {
        font-size: 1rem;
        margin-bottom: 1.75rem;
        color: var(--text-muted);
    }

    .hero-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.65rem 1rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(12px);
        box-shadow: 0 10px 28px rgba(170, 110, 255, 0.12);
        font-weight: 500;
        color: var(--brand-dark);
    }

    .hero-media {
        position: relative;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.82), rgba(255, 248, 240, 0.82));
        border-radius: 26px;
        border: 1px solid var(--glass-border);
        box-shadow: var(--glass-shadow);
        padding: 2.5rem;
        overflow: hidden;
        animation: fadeUp 1s ease 0.1s both;
    }

    .hero-media::after {
        content: "";
        position: absolute;
        inset: 12px;
        border-radius: 22px;
        border: 1px dashed rgba(198, 149, 255, 0.4);
        pointer-events: none;
    }

    .hero-media h4 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: var(--brand-dark);
    }

    .hero-media p {
        color: var(--text-muted);
        margin-bottom: 1.5rem;
    }

    .progress-track {
        width: 100%;
        background: rgba(198, 149, 255, 0.15);
        border-radius: 999px;
        overflow: hidden;
        height: 12px;
        margin-bottom: 1.5rem;
    }

    .progress-value {
        height: 100%;
        border-radius: 999px;
        background: linear-gradient(135deg, var(--brand-primary), var(--brand-secondary));
        transition: width 0.6s ease;
    }

    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.85rem;
    }

    .hero-actions a {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.85rem 1.4rem;
        border-radius: 14px;
        font-weight: 600;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        text-decoration: none;
    }

    .hero-actions .primary-action {
        background: linear-gradient(135deg, #8f62ff, #ff9f7b);
        color: var(--brand-light);
        box-shadow: 0 15px 34px rgba(143, 98, 255, 0.28);
    }

    .hero-actions .secondary-action {
        background: rgba(255, 255, 255, 0.85);
        color: var(--brand-dark);
        box-shadow: 0 10px 24px rgba(31, 14, 52, 0.13);
    }

    .hero-actions a:hover {
        transform: translateY(-4px);
    }

    .stats-grid {
        margin-top: 3rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.75rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.86);
        border-radius: 24px;
        padding: 1.9rem;
        border: 1px solid rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(16px);
        position: relative;
        overflow: hidden;
        box-shadow: var(--glass-shadow);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        background: radial-gradient(circle, rgba(198, 149, 255, 0.35), transparent 70%);
        top: -40px;
        right: -40px;
        transform: scale(1);
        transition: transform 0.5s ease;
    }

    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 22px 50px rgba(84, 41, 144, 0.2);
    }

    .stat-card:hover::after {
        transform: scale(1.2);
    }

    .stat-label {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .stat-value {
        margin: 0.75rem 0 0.5rem;
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--brand-dark);
        line-height: 1;
    }

    .stat-meta {
        display: flex;
        align-items: center;
        gap: 0.45rem;
        color: var(--success);
        font-weight: 600;
        font-size: 0.95rem;
    }

    .dashboard-section {
        margin-top: 3.5rem;
    }

    .section-header {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.75rem;
    }

    .section-header h5 {
        margin: 0;
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--brand-dark);
    }

    .section-header a {
        color: var(--brand-secondary);
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .section-header a:hover {
        color: #ff7e52;
    }

    .match-grid {
        display: grid;
        gap: 1.5rem;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    }

    .match-card {
        position: relative;
        border-radius: 22px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.65);
        box-shadow: 0 18px 38px rgba(56, 22, 99, 0.15);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .match-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 28px 48px rgba(56, 22, 99, 0.22);
    }

    .match-card .content-overlay1 {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(20, 10, 35, 0) 40%, rgba(21, 11, 45, 0.75) 100%);
        transition: opacity 0.4s ease;
    }

    .match-card:hover .content-overlay1 {
        opacity: 0.9;
    }

    .match-card img {
        width: 100%;
        height: 320px;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }

    .match-card:hover img {
        transform: scale(1.05);
    }

    .match-meta {
        position: absolute;
        inset: auto 0 0 0;
        padding: 1.5rem;
        color: #fff;
    }

    .match-meta h6 {
        margin: 0 0 0.35rem;
        font-size: 1.15rem;
        font-weight: 700;
    }

    .match-meta p {
        margin: 0 0 1.25rem;
        color: rgba(255, 255, 255, 0.8);
    }

    .match-meta a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.2);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.4);
        transition: background 0.3s ease, transform 0.3s ease;
    }

    .match-meta a:hover {
        background: rgba(255, 255, 255, 0.32);
        transform: translateY(-2px);
    }

    .crown {
        position: absolute;
        top: 18px;
        right: 18px;
        z-index: 2;
        width: 46px;
        height: 46px;
        background: rgba(255, 255, 255, 0.88);
        border-radius: 50%;
        display: grid;
        place-items: center;
        box-shadow: 0 10px 26px rgba(255, 185, 96, 0.45);
        transform: scale(1);
        transition: transform 0.4s ease;
    }

    .match-card:hover .crown {
        transform: scale(1.08);
    }

    #crown {
        max-width: 28px;
    }

    .premium-strip {
        display: flex;
        gap: 1.5rem;
        overflow-x: auto;
        padding-bottom: 0.5rem;
        scroll-snap-type: x mandatory;
    }

    .premium-strip::-webkit-scrollbar {
        height: 6px;
    }

    .premium-strip::-webkit-scrollbar-thumb {
        background: rgba(143, 98, 255, 0.3);
        border-radius: 999px;
    }

    .premium-strip .match-card {
        min-width: 240px;
        scroll-snap-align: start;
    }

    .split-layout {
        display: grid;
        gap: 2rem;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    }

    .glass-panel {
        background: rgba(255, 255, 255, 0.92);
        border-radius: 26px;
        padding: 2.25rem;
        border: 1px solid rgba(255, 255, 255, 0.65);
        backdrop-filter: blur(18px);
        box-shadow: 0 20px 45px rgba(48, 10, 94, 0.16);
        position: relative;
        overflow: hidden;
    }

    .story-card, .event-card {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 1rem;
        align-items: center;
        padding: 1.35rem;
        border-radius: 20px;
        background: rgba(247, 244, 255, 0.7);
        margin-bottom: 1rem;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
    }

    .story-card:last-child,
    .event-card:last-child {
        margin-bottom: 0;
    }

    .story-card:hover,
    .event-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 32px rgba(75, 36, 130, 0.16);
    }

    .story-thumb {
        width: 64px;
        height: 64px;
        border-radius: 18px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.85);
        border: 1px solid rgba(255, 255, 255, 0.6);
    }

    .story-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .story-card h6,
    .event-card h6 {
        margin: 0 0 0.4rem;
        font-weight: 700;
        color: var(--brand-dark);
    }

    .story-card p,
    .event-card p {
        margin: 0;
        color: var(--text-muted);
        line-height: 1.4;
        font-size: 0.95rem;
    }

    .cta-banner {
        margin: 4rem 0 5rem;
        background: linear-gradient(135deg, rgba(143, 98, 255, 0.9), rgba(255, 159, 123, 0.95));
        border-radius: 30px;
        padding: clamp(2.5rem, 4vw, 3.5rem);
        color: #fff;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        align-items: center;
        box-shadow: 0 24px 54px rgba(90, 40, 160, 0.28);
    }

    .cta-banner h4 {
        font-size: clamp(1.8rem, 4vw, 2.4rem);
        margin-bottom: 0.75rem;
    }

    .cta-banner p {
        margin: 0;
        color: rgba(255, 255, 255, 0.88);
    }

    .cta-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.85rem;
    }

    .cta-actions a {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.9rem 1.6rem;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        font-weight: 600;
        text-decoration: none;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .cta-actions a:hover {
        transform: translateY(-4px);
        background: rgba(255, 255, 255, 0.16);
    }

    .profile-photo-modal {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: auto;
    }

    .profile-photo-modal.is-hidden {
        display: none;
    }

    .profile-photo-modal__backdrop {
        position: absolute;
        inset: 0;
        background: rgba(8, 6, 20, 0.72);
        backdrop-filter: blur(10px);
    }

    .profile-photo-modal__card {
        position: relative;
        max-width: 420px;
        width: 90%;
        background: linear-gradient(145deg, #8f62ff, #ff9f7b);
        border-radius: 26px;
        padding: 2.2rem 2.1rem 2rem;
        color: #fff;
        box-shadow: 0 28px 60px rgba(26, 12, 60, 0.65);
        overflow: hidden;
        z-index: 1;
    }

    .profile-photo-modal__card::before {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(255,255,255,0.4), transparent 70%);
        top: -120px;
        right: -80px;
        opacity: 0.7;
    }

    .profile-photo-modal__close {
        position: absolute;
        top: 14px;
        right: 16px;
        border: none;
        background: rgba(0,0,0,0.18);
        color: #fff;
        width: 30px;
        height: 30px;
        border-radius: 999px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .profile-photo-modal__badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.4rem 0.9rem;
        border-radius: 999px;
        background: rgba(0,0,0,0.24);
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 0.85rem;
    }

    .profile-photo-modal__title {
        font-size: 1.35rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .profile-photo-modal__text {
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 1.4rem;
        color: rgba(255,255,255,0.9);
    }

    .profile-photo-modal__actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .profile-photo-modal__actions button,
    .profile-photo-modal__actions a {
        border-radius: 999px;
        border: none;
        padding: 0.7rem 1.35rem;
        font-size: 0.92rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        text-decoration: none;
        cursor: pointer;
        transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
    }

    .profile-photo-modal__actions-primary {
        background: #fff;
        color: #4b2a8f;
        box-shadow: 0 14px 34px rgba(0,0,0,0.35);
    }

    .profile-photo-modal__actions-secondary {
        background: rgba(0,0,0,0.18);
        color: #fefefe;
    }

    .profile-photo-modal__actions button:hover,
    .profile-photo-modal__actions a:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 38px rgba(0,0,0,0.45);
    }

    body.profile-photo-modal-open {
        overflow: hidden;
    }

    .blur {
        filter: blur(3px);
        transition: filter 0.3s ease;
    }

    @keyframes fadeUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translate3d(0, 0, 0);
        }
        50% {
            transform: translate3d(0, 18px, 0);
        }
    }

    @media (max-width: 768px) {
        .dashboard-hero {
            padding-top: 3rem;
        }

        .hero-media {
            padding: 2rem;
        }

        .stats-grid {
            gap: 1.25rem;
        }

        .match-card img {
            height: 280px;
        }

        .cta-banner {
            text-align: center;
        }

        .cta-actions {
            justify-content: center;
        }
    }
</style>

<section id="member-dashboard">
    <div class="dashboard-hero">
        <div class="dashboard-container">
            <div class="hero-content">
                <div class="hero-intro">
                    <h2>{{ __('Welcome back, :name', ['name' => $memberName]) }}</h2>
                    <p>{{ __('Keep discovering meaningful matches curated especially for you. Fine-tune your profile, explore premium connections, and let your story unfold in style.') }}</p>
                    <div class="hero-badges">
                        <span class="hero-badge">
                            <i class="fa-solid fa-crown text-warning"></i>
                            {{ $membershipTier }}
                        </span>
                        <span class="hero-badge">
                            <i class="fa-solid fa-heart text-danger"></i>
                            {{ $newMatchCollection->count() }} {{ __('New Matches') }}
                        </span>
                    </div>
                </div>
                <div class="hero-media">
                    <div class="hero-avatar-wrapper" style="margin-bottom: 1.5rem; display:flex; justify-content:flex-start;">
                        <div class="profile-avatar">
                            <div class="profile-avatar-badge">
                                <div class="profile-avatar-backdrop"></div>
                                <div class="profile-avatar-ring"></div>
                                <img class="profile-avatar-image" src="@if(Auth::user()->photo != "") {{ uploaded_asset(Auth::user()->photo) }} @else {{ static_asset('assets/img/avatar-place.png') }} @endif" alt="Profile Image">
                                <form action="{{ route('uplode.uplode_pro_pic') }}" method="POST" name="pro_form" id="pro_form" enctype="multipart/form-data">
                                    @csrf
                                    <label for="file-upload" class="profile-avatar-trigger" id="upload-button-pro">
                                        <i class="fa-solid fa-camera"></i>
                                    </label>
                                    <input class="file-upload" type="file" name="file-upload" id="file-upload"/>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h4>{{ __('Let’s perfect your profile') }}</h4>
                    <p>{{ __('Profiles with complete details receive 3x more responses. Update your preferences and add recent photographs to stand out.') }}</p>
                    <div class="progress-track">
                        <div class="progress-value" style="width: {{ $profileCompletion }}%"></div>
                    </div>
                    <div class="hero-actions">
                        <a class="primary-action" href="{{ Auth::check() ? route('profile_settings') : 'javascript:void(0);' }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                            {{ __('Edit Profile') }}
                        </a>
                        <a class="secondary-action" href="javascript:void(0);">
                            <i class="fa-solid fa-wand-magic-sparkles"></i>
                            {{ __('Personalize Preferences') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-label">{{ __('Fresh Matches') }}</span>
                <span class="stat-value">{{ $newMatchCollection->count() }}</span>
                <span class="stat-meta">
                    <i class="fa-solid fa-arrow-trend-up"></i>
                    {{ __('Updated daily with curated profiles') }}
                </span>
            </div>
            <div class="stat-card">
                <span class="stat-label">{{ __('Premium Spotlights') }}</span>
                <span class="stat-value">{{ $premiumMatchCollection->count() }}</span>
                <span class="stat-meta" style="color: var(--warning)">
                    <i class="fa-solid fa-bolt"></i>
                    {{ __('Standout matches waiting for you') }}
                </span>
            </div>
            <div class="stat-card">
                <span class="stat-label">{{ __('Profile Completion') }}</span>
                <span class="stat-value">{{ $profileCompletion }}%</span>
                <span class="stat-meta">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ __('Complete to unlock better reach') }}
                </span>
            </div>
            <div class="stat-card">
                <span class="stat-label">{{ __('Member Since') }}</span>
                <span class="stat-value">{{ optional(optional(Auth::user())->created_at)->format('Y') ?? '—' }}</span>
                <span class="stat-meta" style="color: var(--brand-secondary)">
                    <i class="fa-solid fa-infinity"></i>
                    {{ __('Trusted journey with No1Marry') }}
                </span>
            </div>
        </div>

        <div class="dashboard-section">
            <div class="section-header">
                <h5>{{ __('Fresh Matches For You') }}</h5>
                <a href="javascript:void(0);">{{ __('View all matches') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="match-grid">
@foreach ($newMatchCollection as $member)
    @php
        $profile_picture_show = 'ok';
        $profile_picture_privacy = optional($member->member)->profile_picture_privacy;
        // Blur only when the viewing user is not a premium plan member
        $should_blur = !Auth::check() || Auth::user()->membership != 2;

        if(Auth::check() && Auth::user()->user_type == 'admin'){
            $profile_picture_show = 'ok';
            $should_blur = false;
        }
        elseif($profile_picture_privacy  == '0') {
            $profile_picture_show = 'no';
        }
        elseif($profile_picture_privacy == 2) {
            if(Auth::check()){
                if(Auth::user()->membership == 1) {
                    $profile_picture_show = 'no';
                }
            }
            else{
                $profile_picture_show = 'no';
            }
        }
    @endphp
                <div class="match-card">
                    <div class="content-overlay1"></div>
                    <img class="content-image @if($profile_picture_show != 'ok' || ($member->membership == 2 && Auth::check() && Auth::user()->membership == 1)) restricted-image @endif @if($should_blur) blur @endif" @if($member->photo != "") src="{{ uploaded_asset($member->photo) }}" @else src="{{ static_asset('assets/img/avatar-place.png') }}" @endif alt="{{ $member->first_name }}">
                    @if($member->membership == 2)
                        <div class="crown">
                            <img src="{{ static_asset('assets/assets_1/img/crown.png') }}" alt="no.1marry" id="crown">
                        </div>
                    @endif
                    <div class="match-meta">
                        <h6>{{ $member->first_name }}</h6>
                        <p>{{ $member->code }}</p>
                        @if(Auth::check() && Auth::user()->membership == 2)
                            <a class="btn btn-primary" href="{{ route('member_profile', $member->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        @elseif($member->membership == 1)
                            <a class="btn btn-primary" href="{{ route('member_profile', $member->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        @else
                            <a type="button" class="btn btn-primary" id="viewpopup">
                                <i class="fa-solid fa-lock"></i>
                            </a>
                        @endif
                    </div>
                </div>
@endforeach
            </div>
        </div>

        @if($premiumMatchCollection->count())
        <div class="dashboard-section">
            <div class="section-header">
                <h5>{{ __('Premium Spotlight') }}</h5>
                <a href="javascript:void(0);">{{ __('Upgrade to unlock more') }} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="premium-strip">
@foreach ($premiumMatchCollection as $member)
    @php
        $profile_picture_show = 'ok';
        $profile_picture_privacy = optional($member->member)->profile_picture_privacy;

        // Blur only when the viewing user is not a premium plan member
        $should_blur = !Auth::check() || Auth::user()->membership != 2;

        if(Auth::check() && Auth::user()->user_type == 'admin'){
            $profile_picture_show = 'ok';
            $should_blur = false;
        }
        elseif($profile_picture_privacy  == '0') {
            $profile_picture_show = 'no';
        }
        elseif($profile_picture_privacy == 2) {
            if(Auth::check()){
                if(Auth::user()->membership == 1) {
                    $profile_picture_show = 'no';
                }
            }
            else{
                $profile_picture_show = 'no';
            }
        }
    @endphp
                <div class="match-card">
                    <div class="content-overlay1"></div>
                    <img class="content-image @if($profile_picture_show != 'ok' || (Auth::check() && Auth::user()->membership == 1)) restricted-image @endif @if($should_blur) blur @endif" @if($member->photo != "") src="{{ uploaded_asset($member->photo) }}" @else src="{{ static_asset('assets/img/avatar-place.png') }}" @endif alt="{{ $member->first_name }}">
                    <div class="crown">
                        <img src="{{ static_asset('assets/assets_1/img/crown.png') }}" id="crown" alt="no1marry">
                    </div>
                    <div class="match-meta">
                        <h6>{{ $member->first_name }}</h6>
                        <p>{{ $member->code }}</p>
                        @if(Auth::check() && Auth::user()->membership == 2)
                            <a class="btn btn-primary" href="{{ route('member_profile', $member->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        @else
                            <a type="button" class="btn btn-primary" id="viewpopup">
                                <i class="fa-solid fa-lock"></i>
                            </a>
                        @endif
                    </div>
                </div>
@endforeach
            </div>
        </div>
        @endif

        <div class="dashboard-section">
            <div class="split-layout">
                <div class="glass-panel">
                    <div class="section-header" style="margin-bottom: 1.25rem;">
                        <h5 style="margin-bottom: 0;">{{ __('Success Stories') }}</h5>
                    </div>
                    <div class="text-center py-5">
                        <i class="fa-solid fa-heart-circle-check fa-3x mb-3 text-muted"></i>
                        <h6 class="mb-1">{{ __('No stories to show yet') }}</h6>
                        <p class="mb-0 text-muted small">{{ __('Keep exploring and connecting – your story could be the next one we celebrate here.') }}</p>
                    </div>
                </div>
                <div class="glass-panel">
                    <div class="section-header" style="margin-bottom: 1.25rem;">
                        <h5 style="margin-bottom: 0;">{{ __('Upcoming Events') }}</h5>
                    </div>
                    <div class="text-center py-5">
                        <!-- <div class="mb-3">
                            <span class="badge badge-pill badge-soft-primary" style="padding:.45rem 1.1rem;font-size:.8rem;letter-spacing:.08em;text-transform:uppercase;">{{ __('Coming Soon') }}</span>
                        </div> -->
                        <i class="fa-solid fa-calendar-days fa-3x mb-3 text-muted"></i>
                        <h6 class="mb-1">{{ __('No events for now') }}</h6>
                        <p class="mb-0 text-muted small">{{ __('Stay tuned for upcoming events and exclusive community updates right here.') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="cta-banner">
            <div>
                <h4>{{ __('Elevate your journey with Elite access') }}</h4>
                <p>{{ __('Unlock priority matchmaking, personal relationship managers, and handpicked introductions tailored to your aspirations.') }}</p>
            </div>
            <div class="cta-actions">
                <a href="{{ route('packages') }}">
                    <i class="fa-solid fa-arrow-up-right-dots"></i>
                    {{ __('Explore Plans') }}
                </a>
                <a href="javascript:void(0);">
                    <i class="fa-solid fa-comments"></i>
                    {{ __('Talk to an Advisor') }}
                </a>
            </div>
        </div>
    </div>

    @if(Auth::check())
        <div id="profile-photo-modal" class="profile-photo-modal is-hidden">
            <div class="profile-photo-modal__backdrop" data-photo-modal-close></div>
            <div class="profile-photo-modal__card">
                <button type="button" class="profile-photo-modal__close" data-photo-modal-close>
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <div class="profile-photo-modal__badge">
                    <i class="fa-solid fa-bolt"></i>
                    {{ __('Boost your matches') }}
                </div>
                <h5 class="profile-photo-modal__title">{{ __('Add your profile photo to get noticed') }}</h5>
                <p class="profile-photo-modal__text">
                    {{ __('Members with a clear, recent photo receive more views, better responses, and faster matches. Upload a smiling photo so genuine partners can recognise and connect with you.') }}
                </p>
                <div class="profile-photo-modal__actions">
                    <button id="profile-photo-modal-upload" class="profile-photo-modal__actions-primary">
                        <i class="fa-solid fa-camera"></i>
                        {{ __('Upload photo now') }}
                    </button>
                    <button type="button" class="profile-photo-modal__actions-secondary" data-photo-modal-close>
                        {{ __('Maybe later') }}
                    </button>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });

    (function () {
        var modal = document.getElementById('profile-photo-modal');
        if (!modal) return;

        var avatar = document.querySelector('.profile-avatar-image');
        var src = avatar ? avatar.getAttribute('src') || '' : '';
        var isPlaceholder = src.indexOf('avatar-place.png') !== -1;
        if (!isPlaceholder) {
            return; // User already has a real photo; don't show modal
        }

        var body = document.body;
        var closeTriggers = modal.querySelectorAll('[data-photo-modal-close]');
        var uploadButton = document.getElementById('profile-photo-modal-upload');

        var closeModal = function () {
            modal.classList.add('is-hidden');
            body.classList.remove('profile-photo-modal-open');
        };

        closeTriggers.forEach(function (el) {
            el.addEventListener('click', function (e) {
                e.preventDefault();
                closeModal();
            });
        });

        if (uploadButton) {
            uploadButton.addEventListener('click', function (e) {
                e.preventDefault();
                var trigger = document.getElementById('upload-button-pro');
                if (trigger) {
                    trigger.click();
                }
                closeModal();
            });
        }

        body.classList.add('profile-photo-modal-open');
        modal.classList.remove('is-hidden');
    })();
</script>

