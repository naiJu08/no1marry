@extends('frontend.layouts.member_panel')
@section('panel_content')
<style>
    .member-viewed-contacts {
        display: flex;
        flex-direction: column;
        gap: clamp(1.4rem, 4vw, 2.4rem);
    }

    .member-viewed-contacts__hero {
        position: relative;
        border-radius: 28px;
        padding: clamp(1.7rem, 4vw, 2.5rem);
        background: linear-gradient(135deg, rgba(55, 125, 255, 0.2), rgba(0, 212, 161, 0.18));
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 26px 44px rgba(15, 34, 68, 0.14);
        color: #161a3a;
        overflow: hidden;
        isolation: isolate;
    }

    .member-viewed-contacts__hero-content {
        display: grid;
        gap: clamp(1rem, 3vw, 1.6rem);
    }

    .member-viewed-contacts__title {
        font-size: clamp(1.8rem, 3.6vw, 2.4rem);
        font-weight: 700;
        margin: 0;
    }

    .member-viewed-contacts__subtitle {
        margin: 0;
        max-width: 540px;
        font-size: clamp(0.95rem, 2.4vw, 1.05rem);
        color: rgba(22, 26, 58, 0.7);
    }

    .member-viewed-contacts__grid {
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        gap: clamp(0.85rem, 2.4vw, 1.2rem);
    }

    .viewed-card {
        position: relative;
        min-height: clamp(300px, 75vw, 450px);
        border-radius: 24px;
        overflow: hidden;
        background: #0a111f;
        box-shadow: 0 18px 38px rgba(10, 25, 54, 0.16);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        isolation: isolate;
    }

    .viewed-card::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(9, 14, 32, 0) 40%, rgba(9, 14, 32, 0.75) 75%, rgba(9, 14, 32, 0.9) 100%);
        z-index: 1;
    }

    .viewed-card__media {
        position: absolute;
        inset: 0;
    }

    .viewed-card__media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .viewed-card__info {
        position: absolute;
        left: 0.9rem;
        right: 0.9rem;
        bottom: 0.9rem;
        padding: 1.1rem;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        z-index: 2;
        color: #fff;
    }

    .viewed-card__name {
        margin: 0 0 0.5rem 0;
        font-size: 1.15rem;
        font-weight: 700;
        color: #fff;
    }

    .viewed-card__contact-item {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        margin-top: 0.4rem;
        font-size: 0.9rem;
        opacity: 0.95;
    }

    .viewed-card__contact-item i {
        font-size: 1.1rem;
        color: #00d4a1;
    }

    .viewed-card__date {
        position: absolute;
        top: 0.9rem;
        right: 0.9rem;
        padding: 0.35rem 0.8rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.9);
        font-size: 0.75rem;
        font-weight: 600;
        color: #161a3a;
        z-index: 2;
    }

    @media (min-width: 576px) {
        .member-viewed-contacts__grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (min-width: 768px) {
        .member-viewed-contacts__grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (min-width: 1200px) {
        .member-viewed-contacts__grid {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
    }
</style>

<div class="member-viewed-contacts">
    <section class="member-viewed-contacts__hero">
        <div class="member-viewed-contacts__hero-content">
            <h5 class="member-viewed-contacts__title">{{ translate('Downloaded Contacts') }}</h5>
            <p class="member-viewed-contacts__subtitle">{{ translate('History of all members whose contact details you have unlocked.') }}</p>
        </div>
    </section>

    <section class="member-viewed-contacts__grid">
        @forelse ($viewed_contacts as $view_contact)
            @if ($view_contact->user)
                @php
                    $u = $view_contact->user;
                @endphp
                <div class="viewed-card">
                    <div class="viewed-card__date">
                        {{ $view_contact->created_at->format('d M, Y') }}
                    </div>
                    <a href="{{ route('member_profile', $u->id) }}" class="viewed-card__media">
                        @if(uploaded_asset($u->photo) != null)
                            <img src="{{ uploaded_asset($u->photo) }}" alt="{{ translate('photo') }}">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}" alt="{{ translate('photo') }}">
                        @endif
                    </a>
                    <div class="viewed-card__info">
                        <h6 class="viewed-card__name">
                            <a href="{{ route('member_profile', $u->id) }}" class="text-reset">
                                {{ $u->first_name.' '.$u->last_name }}
                            </a>
                        </h6>
                        <div class="viewed-card__contact-item">
                            <i class="las la-phone"></i>
                            <span>{{ $u->phone }}</span>
                        </div>
                        <div class="viewed-card__contact-item">
                            <i class="las la-envelope"></i>
                            <span>{{ $u->email }}</span>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="text-center p-5 glass-surface" style="border-radius: 24px;">
                <p class="text-muted mb-0">{{ translate('No contacts downloaded yet.') }}</p>
            </div>
        @endforelse
    </section>

    <div class="aiz-pagination mt-4">
        {{ $viewed_contacts->links() }}
    </div>
</div>
@endsection
