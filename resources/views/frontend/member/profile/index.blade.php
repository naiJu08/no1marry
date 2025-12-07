@extends('frontend.layouts.member_panel')
@section('panel_content')
<style>
    .profile-settings {
        display: flex;
        flex-direction: column;
        gap: clamp(2rem, 5vw, 3.5rem);
        padding-bottom: 3rem;
    }

    .profile-hero {
        position: relative;
        overflow: hidden;
        border-radius: 36px;
        background: linear-gradient(135deg, rgba(144, 98, 255, 0.24), rgba(255, 160, 127, 0.18));
        border: 1px solid rgba(255, 255, 255, 0.32);
        box-shadow: 0 24px 46px rgba(45, 19, 85, 0.18);
        padding: clamp(2rem, 5vw, 3.4rem);
        color: #1b132f;
        isolation: isolate;
    }

    .profile-hero::before,
    .profile-hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        filter: blur(90px);
        opacity: 0.65;
        z-index: -1;
        animation: floatGlow 14s ease-in-out infinite;
    }

    .profile-hero::before {
        width: 520px;
        height: 520px;
        top: -220px;
        right: -200px;
        background: rgba(255, 160, 127, 0.45);
    }

    .profile-hero::after {
        width: 460px;
        height: 460px;
        bottom: -260px;
        left: -160px;
        background: rgba(144, 98, 255, 0.45);
        animation-delay: 1.8s;
    }

    .profile-hero__header {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: clamp(1rem, 3vw, 2rem);
    }

    .profile-hero__title {
        font-size: clamp(2rem, 4vw, 2.8rem);
        font-weight: 700;
        margin: 0;
    }

    .profile-hero__subtitle {
        margin: 0;
        color: rgba(27, 19, 47, 0.68);
        font-size: clamp(1rem, 2.4vw, 1.1rem);
        max-width: 520px;
    }

    .profile-hero__meta {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: clamp(1rem, 3vw, 1.5rem);
        margin-top: clamp(1.5rem, 4vw, 2rem);
    }

    .profile-hero__metric {
        background: rgba(255, 255, 255, 0.72);
        backdrop-filter: blur(18px);
        border-radius: 22px;
        padding: 1.2rem 1.4rem;
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
        box-shadow: 0 18px 32px rgba(42, 16, 91, 0.14);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
    }

    .profile-hero__metric:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 40px rgba(42, 16, 91, 0.18);
    }

    .profile-hero__metric span {
        font-size: 0.85rem;
        color: rgba(27, 19, 47, 0.6);
    }

    .profile-hero__metric strong {
        font-size: 1.45rem;
        font-weight: 700;
        color: #1b132f;
    }

    .profile-quick-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        justify-content: flex-start;
        padding-bottom: 0.5rem;
        overflow-x: auto;
        scrollbar-width: none;
    }

    .profile-quick-nav::-webkit-scrollbar {
        display: none;
    }

    .profile-quick-link {
        display: inline-flex;
        align-items: center;
        gap: 0.55rem;
        padding: 0.7rem 1.15rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.82);
        border: 1px solid rgba(255, 255, 255, 0.5);
        color: #5b4f72;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 12px 32px rgba(27, 19, 47, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
    }

    .profile-quick-link i {
        color: #8f62ff;
    }

    .profile-quick-link:hover {
        transform: translateY(-3px);
        background: linear-gradient(135deg, rgba(144, 98, 255, 0.18), rgba(255, 160, 127, 0.2));
        box-shadow: 0 18px 38px rgba(27, 19, 47, 0.16);
    }

    .profile-sections-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(640px, 1fr));
        gap: clamp(1.5rem, 4vw, 2.5rem);
    }

    .profile-section {
        position: relative;
        padding: clamp(1.8rem, 4vw, 2.4rem);
        border-radius: 32px;
        background: rgba(255, 255, 255, 0.82);
        border: 1px solid rgba(255, 255, 255, 0.52);
        box-shadow: 0 24px 48px rgba(34, 14, 70, 0.16);
        backdrop-filter: blur(18px);
        display: flex;
        flex-direction: column;
        gap: 1.4rem;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        scroll-margin-top: 160px;
        overflow: hidden;
    }

    .profile-section::after {
        content: "";
        position: absolute;
        inset: auto -40% -60% auto;
        width: 320px;
        height: 320px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(144, 98, 255, 0.28), transparent 70%);
        transform: translateY(40%);
        pointer-events: none;
    }

    .profile-section:hover {
        transform: translateY(-6px);
        box-shadow: 0 32px 60px rgba(34, 14, 70, 0.2);
    }

    .profile-section__intro {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        z-index: 1;
    }

    .profile-section__icon {
        width: 52px;
        height: 52px;
        border-radius: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(144, 98, 255, 0.22), rgba(255, 160, 127, 0.24));
        color: #8f62ff;
        box-shadow: 0 12px 24px rgba(34, 14, 70, 0.18);
        font-size: 1.25rem;
    }

    .profile-section__text h3 {
        margin: 0;
        font-size: 1.35rem;
        font-weight: 700;
        color: #20163a;
    }

    .profile-section__text p {
        margin: 0.25rem 0 0;
        color: rgba(32, 22, 58, 0.68);
        font-size: 0.95rem;
    }

    .profile-section__card {
        position: relative;
        z-index: 1;
    }

    .profile-section__card .card {
        background: rgba(255, 255, 255, 0.78);
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.55);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.65);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .profile-section__card .card:hover {
        transform: translateY(-4px);
    }

    .profile-section__card .card-header {
        background: transparent;
        border: none;
        padding: 1.2rem 1.6rem 0.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
    }

    .profile-section__card .card-header h5 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 700;
        color: #2a1f47;
    }

    .profile-section__card .card-body {
        padding: 1.4rem 1.6rem 1.6rem;
    }

    .profile-section__card .card-body form,
    .profile-section__card .card-body table {
        animation: fadeSlideIn 0.6s ease;
    }

    .profile-section__card .profile-list {
        display: flex;
        flex-direction: column;
        gap: 0.85rem;
    }

    .profile-section__card .profile-list-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.9rem;
        padding: 0.7rem 0.9rem;
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 10px 24px rgba(27, 19, 47, 0.12);
    }

    .profile-section__card .profile-list-title {
        font-size: 0.95rem;
        font-weight: 600;
        color: #291c4d;
    }

    .profile-section__card .profile-list-actions {
        display: flex;
        align-items: center;
        gap: 0.45rem;
    }

    .profile-section__card .form-group.row {
        margin-bottom: 1.15rem;
    }

    .profile-section__card label {
        font-size: 0.84rem;
        font-weight: 600;
        letter-spacing: 0.03em;
        text-transform: uppercase;
        color: rgba(32, 22, 58, 0.78);
        margin-bottom: 0.35rem;
    }

    .profile-section__card .form-control,
    .profile-section__card .bootstrap-select .dropdown-toggle {
        border-radius: 16px;
        border: 1px solid rgba(196, 181, 253, 0.7);
        background: rgba(255, 255, 255, 0.9);
        box-shadow: 0 10px 26px rgba(27, 19, 47, 0.12);
        color: #1f1437;
        padding: 0.6rem 0.9rem;
        height: auto;
    }

    .profile-section__card .profile-input {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(248, 244, 255, 0.98));
        border-color: rgba(143, 98, 255, 0.55);
    }

    .profile-section__card .profile-select-wrapper {
        position: relative;
    }

    .profile-section__card .profile-select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        padding-right: 2.4rem;
        cursor: pointer;
        background-position: right 1rem center;
        background-repeat: no-repeat;
    }

    .profile-section__card .profile-select-wrapper::after {
        content: '';
        position: absolute;
        right: 1.1rem;
        top: 50%;
        width: 8px;
        height: 8px;
        border-right: 2px solid rgba(88, 63, 143, 0.9);
        border-bottom: 2px solid rgba(88, 63, 143, 0.9);
        transform: translateY(-50%) rotate(45deg);
        pointer-events: none;
    }

    .profile-section__card textarea.form-control {
        min-height: 120px;
        border-radius: 22px;
        resize: vertical;
    }

    .profile-section__card .form-control::placeholder {
        color: rgba(114, 94, 140, 0.75);
    }

    .profile-section__card .form-control:focus,
    .profile-section__card .bootstrap-select .dropdown-toggle:focus,
    .profile-section__card .bootstrap-select.show > .dropdown-toggle {
        outline: none;
        border-color: rgba(143, 98, 255, 0.95);
        box-shadow:
            0 0 0 1px rgba(143, 98, 255, 0.55),
            0 18px 40px rgba(34, 14, 70, 0.28);
        background: #ffffff;
    }

    .profile-section__card .invalid-feedback,
    .profile-section__card .form-text.text-danger {
        font-size: 0.8rem;
        margin-top: 0.25rem;
    }

    .profile-section__card .text-right .btn,
    .profile-section__card .card-footer .btn {
        border-radius: 999px;
        padding-inline: 1.6rem;
    }

    .profile-section__card .btn,
    .profile-section__card button {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .profile-section__card .btn:hover,
    .profile-section__card button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(144, 98, 255, 0.22);
    }

    .profile-section__card .btn-primary {
        background: linear-gradient(135deg, #2d1024, #7b1844);
        border: none;
        box-shadow: 0 10px 26px rgba(27, 19, 47, 0.4);
    }

    .profile-section__card .btn-primary:focus {
        box-shadow: 0 0 0 0.15rem rgba(143, 98, 255, 0.55), 0 16px 34px rgba(27, 19, 47, 0.6);
    }

    .profile-section__card .btn-softinfo,
    .profile-section__card .btn-soft-primary {
        background: rgba(124, 92, 255, 0.12);
        border: none;
        color: #4a328a;
    }

    .profile-section__card .btn-softdanger,
    .profile-section__card .btn-soft-danger {
        background: rgba(244, 63, 94, 0.1);
        border: none;
        color: #b02042;
    }

    .profile-section__card .profile-section__add-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.25rem;
        font-weight: 600;
    }

    .profile-section__card .profile-empty-state {
        font-size: 0.9rem;
        color: rgba(64, 48, 104, 0.85);
    }

    .profile-section__card .table {
        width: 100%;
        border-radius: 18px;
        overflow: hidden;
    }

    .profile-section__card .table thead th {
        background: linear-gradient(135deg, rgba(144, 98, 255, 0.18), rgba(255, 160, 127, 0.18));
        border: none;
        color: #362a55;
        font-weight: 600;
    }

    .profile-section__card .table tbody tr {
        transition: background 0.25s ease;
    }

    .profile-section__card .table tbody tr:hover {
        background: rgba(144, 98, 255, 0.08);
    }

    .profile-empty-state {
        margin-top: 1rem;
        padding: 1rem 1.2rem;
        background: rgba(144, 98, 255, 0.08);
        border-radius: 14px;
        color: rgba(32, 22, 58, 0.72);
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        font-weight: 600;
    }

    .profile-section[data-theme="aurora"]::after {
        background: radial-gradient(circle, rgba(255, 160, 127, 0.28), transparent 70%);
    }

    .profile-section[data-theme="violet"] .profile-section__icon {
        background: linear-gradient(135deg, rgba(104, 78, 255, 0.24), rgba(187, 134, 252, 0.28));
        color: #6c4aff;
    }

    .profile-section[data-theme="sunset"] .profile-section__icon {
        background: linear-gradient(135deg, rgba(255, 153, 102, 0.24), rgba(255, 214, 102, 0.28));
        color: #ff8a4c;
    }

    .profile-section[data-theme="aqua"] .profile-section__icon {
        background: linear-gradient(135deg, rgba(72, 209, 204, 0.22), rgba(144, 224, 239, 0.24));
        color: #13a8c9;
    }

    .profile-section[data-theme="rose"] .profile-section__icon {
        background: linear-gradient(135deg, rgba(255, 102, 153, 0.22), rgba(255, 171, 198, 0.24));
        color: #ff4370;
    }

    @keyframes floatGlow {
        0%, 100% {
            transform: translate3d(0, 0, 0);
        }
        50% {
            transform: translate3d(0, 25px, 0);
        }
    }

    @keyframes fadeSlideIn {
        from {
            opacity: 0;
            transform: translateY(12px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 992px) {
        .profile-sections-grid {
            grid-template-columns: 1fr;
        }

        .profile-section {
            padding: clamp(1.6rem, 5vw, 2.2rem);
        }
    }

    @media (max-width: 576px) {
        .profile-hero__header {
            flex-direction: column;
            align-items: flex-start;
        }

        .profile-section__intro {
            flex-direction: column;
        }

        .profile-section__icon {
            width: 46px;
            height: 46px;
            font-size: 1.1rem;
        }
    }
</style>

@php
    $member = \App\User::find(Auth::user()->id);
    $profileCompletedAt = optional($member->member)->updated_at;
    $profileCompletionPercent = optional($member->member)->profile_completion ?? null;
    $membershipLabel = optional($member)->membership == 2 ? __('Premium') : (optional($member)->membership == 3 ? __('Elite') : __('Standard'));
    $lastUpdated = $profileCompletedAt ? \Carbon\Carbon::parse($profileCompletedAt)->diffForHumans() : __('Not updated yet');
@endphp

<div class="profile-settings">
    <section class="profile-hero">
        <div class="profile-hero__header">
            <div>
                <h2 class="profile-hero__title">{{ __('Let’s perfect your profile, :name', ['name' => $member->first_name]) }}</h2>
                <p class="profile-hero__subtitle">{{ __('Complete the sections below to amplify your visibility and receive more personalised matches across No1Marry.') }}</p>
            </div>
            <a href="{{ route('member_profile', $member->id) }}" class="profile-quick-link" target="_blank" rel="noopener">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                {{ __('Preview Public Profile') }}
            </a>
        </div>
        <div class="profile-hero__meta">
            <div class="profile-hero__metric">
                <span>{{ __('Membership') }}</span>
                <strong>{{ $membershipLabel }}</strong>
            </div>
            <div class="profile-hero__metric">
                <span>{{ __('Profile completion') }}</span>
                <strong>{{ $profileCompletionPercent ? $profileCompletionPercent.'%' : __('–') }}</strong>
            </div>
            <div class="profile-hero__metric">
                <span>{{ __('Last updated') }}</span>
                <strong>{{ $lastUpdated }}</strong>
            </div>
            <div class="profile-hero__metric">
                <span>{{ __('Member ID') }}</span>
                <strong>{{ $member->code }}</strong>
            </div>
        </div>
    </section>

    <nav class="profile-quick-nav" aria-label="{{ __('Profile quick navigation') }}">
        <a class="profile-quick-link" href="#profile-basic-info"><i class="fa-solid fa-id-card"></i>{{ __('Basic info') }}</a>
        @if(get_setting('member_id_verification_section') == 'on')
            <a class="profile-quick-link" href="#profile-id-verification"><i class="fa-solid fa-shield-check"></i>{{ __('ID verification') }}</a>
        @endif
        @if(get_setting('member_present_address_section') == 'on')
            <a class="profile-quick-link" href="#profile-present-address"><i class="fa-solid fa-location-dot"></i>{{ __('Present address') }}</a>
        @endif
        @if(get_setting('member_education_section') == 'on')
            <a class="profile-quick-link" href="#profile-education"><i class="fa-solid fa-graduation-cap"></i>{{ __('Education') }}</a>
        @endif
        @if(get_setting('member_career_section') == 'on')
            <a class="profile-quick-link" href="#profile-career"><i class="fa-solid fa-briefcase"></i>{{ __('Career') }}</a>
        @endif
        @if(get_setting('member_physical_attributes_section') == 'on')
            <a class="profile-quick-link" href="#profile-physical"><i class="fa-solid fa-dumbbell"></i>{{ __('Physical') }}</a>
        @endif
        @if(get_setting('member_language_section') == 'on')
            <a class="profile-quick-link" href="#profile-language"><i class="fa-solid fa-language"></i>{{ __('Language') }}</a>
        @endif
        @if(get_setting('member_spiritual_and_social_background_section') == 'on')
            <a class="profile-quick-link" href="#profile-spiritual"><i class="fa-solid fa-hands-praying"></i>{{ __('Spiritual & social') }}</a>
        @endif
        @if(get_setting('member_permanent_address_section') == 'on')
            <a class="profile-quick-link" href="#profile-permanent-address"><i class="fa-solid fa-map"></i>{{ __('Permanent address') }}</a>
        @endif
        @if(get_setting('member_family_information_section') == 'on')
            <a class="profile-quick-link" href="#profile-family"><i class="fa-solid fa-people-group"></i>{{ __('Family') }}</a>
        @endif
        @if(get_setting('member_partner_expectation_section') == 'on')
            <a class="profile-quick-link" href="#profile-partner"><i class="fa-solid fa-heart-circle-check"></i>{{ __('Partner expectation') }}</a>
        @endif
    </nav>

    <div class="profile-sections-grid">
        <section class="profile-section" id="profile-basic-info" data-theme="violet">
            <div class="profile-section__intro">
                <span class="profile-section__icon"><i class="fa-solid fa-id-card"></i></span>
                <div class="profile-section__text">
                    <h3>{{ __('Basic details') }}</h3>
                    <p>{{ __('Share accurate details to help members discover you faster.') }}</p>
                </div>
            </div>
            <div class="profile-section__card">
                @include('frontend.member.profile.basic_info')
            </div>
        </section>
        @if(get_setting('member_id_verification_section') == 'on')
            <section class="profile-section" id="profile-id-verification" data-theme="aurora">
                <div class="profile-section__intro">
                    <span class="profile-section__icon"><i class="fa-solid fa-shield-check"></i></span>
                    <div class="profile-section__text">
                        <h3>{{ __('Identity verification') }}</h3>
                        <p>{{ __('Upload the required documents to boost trust among members and unlock premium visibility.') }}</p>
                    </div>
                </div>
                <div class="profile-section__card">
                    @include('frontend.member.profile.id_verification')
                </div>
            </section>
        @endif

        @php
            $present_address      = \App\Models\Address::where('type','present')->where('user_id',$member->id)->first();
            $present_country_id   = !empty($present_address->country_id) ? $present_address->country_id : "";
            $present_state_id     = !empty($present_address->state_id) ? $present_address->state_id : "";
            $present_city_id      = !empty($present_address->city_id) ? $present_address->city_id : "";
            $present_postal_code  = !empty($present_address->postal_code) ? $present_address->postal_code : "";
        @endphp

        @if(get_setting('member_present_address_section') == 'on')
            <section class="profile-section" id="profile-present-address" data-theme="sunset">
                <div class="profile-section__intro">
                    <span class="profile-section__icon"><i class="fa-solid fa-location-dot"></i></span>
                    <div class="profile-section__text">
                        <h3>{{ __('Present address') }}</h3>
                        <p>{{ __('Highlight where you currently reside to enable relevant match suggestions.') }}</p>
                    </div>
                </div>
                <div class="profile-section__card">
                    @include('frontend.member.profile.present_address')
                </div>
            </section>
        @endif

        @if(get_setting('member_education_section') == 'on')
            <section class="profile-section" id="profile-education" data-theme="aqua">
                <div class="profile-section__intro">
                    <span class="profile-section__icon"><i class="fa-solid fa-graduation-cap"></i></span>
                    <div class="profile-section__text">
                        <h3>{{ __('Education journey') }}</h3>
                        <p>{{ __('Showcase your academic achievements and current studies.') }}</p>
                    </div>
                </div>
                <div class="profile-section__card">
                    @include('frontend.member.profile.education.index')
                </div>
            </section>
        @endif

        @if(get_setting('member_career_section') == 'on')
            <section class="profile-section" id="profile-career" data-theme="violet">
                <div class="profile-section__intro">
                    <span class="profile-section__icon"><i class="fa-solid fa-briefcase"></i></span>
                    <div class="profile-section__text">
                        <h3>{{ __('Career path') }}</h3>
                        <p>{{ __('Share your professional milestones and ambitions with the community.') }}</p>
                    </div>
                </div>
                <div class="profile-section__card">
                    @include('frontend.member.profile.career.index')
                </div>
            </section>
        @endif

        @if(get_setting('member_physical_attributes_section') == 'on')
            <section class="profile-section" id="profile-physical" data-theme="rose">
                <div class="profile-section__intro">
                    <span class="profile-section__icon"><i class="fa-solid fa-dumbbell"></i></span>
                    <div class="profile-section__text">
                        <h3>{{ __('Physical attributes') }}</h3>
                        <p>{{ __('Provide essential physical details to help tailor compatibility insights.') }}</p>
                    </div>
                </div>
                <div class="profile-section__card">
                    @include('frontend.member.profile.physical_attributes')
                </div>
            </section>
        @endif

        @if(get_setting('member_language_section') == 'on')
            <section class="profile-section" id="profile-language" data-theme="aurora">
                <div class="profile-section__intro">
                    <span class="profile-section__icon"><i class="fa-solid fa-language"></i></span>
                    <div class="profile-section__text">
                        <h3>{{ __('Languages spoken') }}</h3>
                        <p>{{ __('Indicate your languages to connect with members who share the same fluency.') }}</p>
                    </div>
                </div>
                <div class="profile-section__card">
                    @include('frontend.member.profile.language')
                </div>
            </section>
        @endif

        @php
            $member_religion_id   = !empty($member->spiritual_backgrounds->religion_id) ? $member->spiritual_backgrounds->religion_id : "";
            $member_caste_id      = !empty($member->spiritual_backgrounds->caste_id) ? $member->spiritual_backgrounds->caste_id : "";
            $member_sub_caste_id  = !empty($member->spiritual_backgrounds->sub_caste_id) ? $member->spiritual_backgrounds->sub_caste_id : "";
        @endphp

        @if(get_setting('member_spiritual_and_social_background_section') == 'on')
            <section class="profile-section" id="profile-spiritual" data-theme="violet">
                <div class="profile-section__intro">
                    <span class="profile-section__icon"><i class="fa-solid fa-hands-praying"></i></span>
                    <div class="profile-section__text">
                        <h3>{{ __('Spiritual & social background') }}</h3>
                        <p>{{ __('Share your faith, community and traditions to find deeply aligned matches.') }}</p>
                    </div>
                </div>
                <div class="profile-section__card">
                    @include('frontend.member.profile.spiritual_backgrounds')
                </div>
            </section>
        @endif

        @php
            $permanent_address      = \App\Models\Address::where('type','permanent')->where('user_id',$member->id)->first();
            $permanent_country_id   = !empty($permanent_address->country_id) ? $permanent_address->country_id : "";
            $permanent_state_id     = !empty($permanent_address->state_id) ? $permanent_address->state_id : "";
            $permanent_city_id      = !empty($permanent_address->city_id) ? $permanent_address->city_id : "";
            $permanent_postal_code  = !empty($permanent_address->postal_code) ? $permanent_address->postal_code : "";
        @endphp

        @if(get_setting('member_permanent_address_section') == 'on')
            <section class="profile-section" id="profile-permanent-address" data-theme="sunset">
                <div class="profile-section__intro">
                    <span class="profile-section__icon"><i class="fa-solid fa-map"></i></span>
                    <div class="profile-section__text">
                        <h3>{{ __('Permanent address') }}</h3>
                        <p>{{ __('Document where you grew up to inspire conversations around your roots.') }}</p>
                    </div>
                </div>
                <div class="profile-section__card">
                    @include('frontend.member.profile.permanent_address')
                </div>
            </section>
        @endif

        @if(get_setting('member_family_information_section') == 'on')
            <section class="profile-section" id="profile-family" data-theme="rose">
                <div class="profile-section__intro">
                    <span class="profile-section__icon"><i class="fa-solid fa-people-group"></i></span>
                    <div class="profile-section__text">
                        <h3>{{ __('Family details') }}</h3>
                        <p>{{ __('Describe your family background and values to establish deeper understanding.') }}</p>
                    </div>
                </div>
                <div class="profile-section__card">
                    @include('frontend.member.profile.family_information')
                </div>
            </section>
        @endif

        @php
            $partner_religion_id   = !empty($member->partner_expectations->religion_id) ? $member->partner_expectations->religion_id : "";
            $partner_caste_id      = !empty($member->partner_expectations->caste_id) ? $member->partner_expectations->caste_id : "";
            $partner_sub_caste_id  = !empty($member->partner_expectations->sub_caste_id) ? $member->partner_expectations->sub_caste_id : "";
            $partner_country_id    = !empty($member->partner_expectations->preferred_country_id) ? $member->partner_expectations->preferred_country_id : "";
            $partner_state_id      = !empty($member->partner_expectations->preferred_state_id) ? $member->partner_expectations->preferred_state_id : "";
        @endphp

        @if(get_setting('member_partner_expectation_section') == 'on')
            <section class="profile-section" id="profile-partner" data-theme="aurora">
                <div class="profile-section__intro">
                    <span class="profile-section__icon"><i class="fa-solid fa-heart-circle-check"></i></span>
                    <div class="profile-section__text">
                        <h3>{{ __('Partner expectations') }}</h3>
                        <p>{{ __('Outline what you value in a partner so we can surface the best connections.') }}</p>
                    </div>
                </div>
                <div class="profile-section__card">
                    @include('frontend.member.profile.partner_expectation')
                </div>
            </section>
        @endif
    </div>
</div>

@endsection

@section('modal')
    @include('modals.create_edit_modal')
    @include('modals.delete_modal')
@endsection	   
			
@section('script')
<script type="text/javascript">

    $(document).ready(function(){
         get_states_by_country_for_present_address();
         get_cities_by_state_for_present_address();
         get_states_by_country_for_permanent_address();
         get_cities_by_state_for_permanent_address();
         get_castes_by_religion_for_member();
         get_sub_castes_by_caste_for_member();
         get_castes_by_religion_for_partner();
         get_sub_castes_by_caste_for_partner();
         get_states_by_country_for_partner();
    });

    // For Present address
    function get_states_by_country_for_present_address(){
        var present_country_id = $('#present_country_id').val();
            $.post('{{ route('states.get_state_by_country') }}',{_token:'{{ csrf_token() }}', country_id:present_country_id}, function(data){
                $('#present_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#present_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#present_state_id > option").each(function() {
                    if(this.value == '{{$present_state_id}}'){
                        $("#present_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');

                get_cities_by_state_for_present_address();
            });
        }

    function get_cities_by_state_for_present_address(){
		var present_state_id = $('#present_state_id').val();
    		$.post('{{ route('cities.get_cities_by_state') }}',{_token:'{{ csrf_token() }}', state_id:present_state_id}, function(data){
    		    $('#present_city_id').html(null);
    		    for (var i = 0; i < data.length; i++) {
    		        $('#present_city_id').append($('<option>', {
    		            value: data[i].id,
    		            text: data[i].name
    		        }));
    		    }
    		    $("#present_city_id > option").each(function() {
    		        if(this.value == '{{$present_city_id}}'){
    		            $("#present_city_id").val(this.value).change();
    		        }
    		    });

    		    AIZ.plugins.bootstrapSelect('refresh');
    		});
    	}

    $('#present_country_id').on('change', function() {
  	    get_states_by_country_for_present_address();
  	});

    $('#present_state_id').on('change', function() {
  	    get_cities_by_state_for_present_address();
  	});

    // For permanent address
    function get_states_by_country_for_permanent_address(){
        var permanent_country_id = $('#permanent_country_id').val();
            $.post('{{ route('states.get_state_by_country') }}',{_token:'{{ csrf_token() }}', country_id:permanent_country_id}, function(data){
                $('#permanent_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#permanent_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#permanent_state_id > option").each(function() {
                    if(this.value == '{{$permanent_state_id}}'){
                        $("#permanent_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');

                get_cities_by_state_for_permanent_address();
            });
    }

    function get_cities_by_state_for_permanent_address(){
        var permanent_state_id = $('#permanent_state_id').val();
            $.post('{{ route('cities.get_cities_by_state') }}',{_token:'{{ csrf_token() }}', state_id:permanent_state_id}, function(data){
                $('#permanent_city_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#permanent_city_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#permanent_city_id > option").each(function() {
                    if(this.value == '{{$permanent_city_id}}'){
                        $("#permanent_city_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');
            });
    }

    $('#permanent_country_id').on('change', function() {
        get_states_by_country_for_permanent_address();
    });

    $('#permanent_state_id').on('change', function() {
        get_cities_by_state_for_permanent_address();
    });

    // get castes and subcastes For member
    function get_castes_by_religion_for_member(){
        var member_religion_id = $('#member_religion_id').val();
            $.post('{{ route('castes.get_caste_by_religion') }}',{_token:'{{ csrf_token() }}', religion_id:member_religion_id}, function(data){
                $('#member_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#member_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#member_caste_id > option").each(function() {
                    if(this.value == '{{$member_caste_id}}'){
                        $("#member_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');

                get_sub_castes_by_caste_for_member();
            });
        }

    function get_sub_castes_by_caste_for_member(){
        var member_caste_id = $('#member_caste_id').val();
            $.post('{{ route('sub_castes.get_sub_castes_by_religion') }}',{_token:'{{ csrf_token() }}', caste_id:member_caste_id}, function(data){
                $('#member_sub_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#member_sub_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#member_sub_caste_id > option").each(function() {
                    if(this.value == '{{$member_sub_caste_id}}'){
                        $("#member_sub_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');
            });
        }

    $('#member_religion_id').on('change', function() {
        get_castes_by_religion_for_member();
    });

    $('#member_caste_id').on('change', function() {
        get_sub_castes_by_caste_for_member();
    });

    // get castes and subcastes For partner
    function get_castes_by_religion_for_partner(){
        var partner_religion_id = $('#partner_religion_id').val();
            $.post('{{ route('castes.get_caste_by_religion') }}',{_token:'{{ csrf_token() }}', religion_id:partner_religion_id}, function(data){
                $('#partner_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_caste_id > option").each(function() {
                    if(this.value == '{{$partner_caste_id}}'){
                        $("#partner_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');

                get_sub_castes_by_caste_for_partner();
            });
        }

    function get_sub_castes_by_caste_for_partner(){
        var partner_caste_id = $('#partner_caste_id').val();
            $.post('{{ route('sub_castes.get_sub_castes_by_religion') }}',{_token:'{{ csrf_token() }}', caste_id:partner_caste_id}, function(data){
                $('#partner_sub_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_sub_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_sub_caste_id > option").each(function() {
                    if(this.value == '{{$partner_sub_caste_id}}'){
                        $("#partner_sub_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');
            });
        }

    $('#partner_religion_id').on('change', function() {
        get_castes_by_religion_for_partner();
    });

    $('#partner_caste_id').on('change', function() {
        get_sub_castes_by_caste_for_partner();
    });

    // For partner address
    function get_states_by_country_for_partner(){
        var partner_country_id = $('#partner_country_id').val();
            $.post('{{ route('states.get_state_by_country') }}',{_token:'{{ csrf_token() }}', country_id:partner_country_id}, function(data){
                $('#partner_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_state_id > option").each(function() {
                    if(this.value == '{{$partner_state_id}}'){
                        $("#partner_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');
            });
    }

    $('#partner_country_id').on('change', function() {
        get_states_by_country_for_partner();
    });

    //  education Add edit , status change
    function education_add_modal(id){
       $.post('{{ route('education.create') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
           $('.create_edit_modal_content').html(data);
           $('.create_edit_modal').modal('show');
       });
    }

    function education_edit_modal(id){
        $.post('{{ route('education.edit') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
            $('.create_edit_modal_content').html(data);
            $('.create_edit_modal').modal('show');
        });
    }

    function update_education_present_status(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('{{ route('education.update_education_present_status') }}', {
            _token: '{{ csrf_token() }}',
            id: el.value,
            status: status
        }, function (data) {
            if (data == 1) {
                location.reload();
            } else {
                AIZ.plugins.notify('danger', 'Something went wrong');
            }
        });
    }


    //  Career Add edit , status change
    function career_add_modal(id){
       $.post('{{ route('career.create') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
           $('.create_edit_modal_content').html(data);
           $('.create_edit_modal').modal('show');
       });
    }

    function career_edit_modal(id){
        $.post('{{ route('career.edit') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
            $('.create_edit_modal_content').html(data);
            $('.create_edit_modal').modal('show');
        });
    }

    function update_career_present_status(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('{{ route('career.update_career_present_status') }}', {
            _token: '{{ csrf_token() }}',
            id: el.value,
            status: status
        }, function (data) {
            if (data == 1) {
                location.reload();
            } else {
                AIZ.plugins.notify('danger', 'Something went wrong');
            }
        });
    }

    $('.new-email-verification').on('click', function() {
        $(this).find('.loading').removeClass('d-none');
        $(this).find('.default').addClass('d-none');
        var email = $("input[name=email]").val();

        $.post('{{ route('user.new.verify') }}', {_token:'{{ csrf_token() }}', email: email}, function(data){
            data = JSON.parse(data);
            $('.default').removeClass('d-none');
            $('.loading').addClass('d-none');
            if(data.status == 2)
                AIZ.plugins.notify('warning', data.message);
            else if(data.status == 1)
                AIZ.plugins.notify('success', data.message);
            else
                AIZ.plugins.notify('danger', data.message);
        });
    });
</script>

<script>
  function closebasic() {
    $('#modal-basic').modal('hide');
  }
  document.getElementById('closeButton').addEventListener('click', closePopup)
</script>
@endsection
