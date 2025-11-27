@extends('frontend.layouts.member_panel')
@section('panel_content')
<style>
    .ignored-members {
        display: flex;
        flex-direction: column;
        gap: clamp(1.4rem, 4vw, 2.3rem);
    }

    .ignored-members__hero {
        position: relative;
        border-radius: 28px;
        padding: clamp(1.7rem, 4vw, 2.5rem);
        background: linear-gradient(135deg, rgba(126, 87, 194, 0.2), rgba(255, 145, 144, 0.18));
        border: 1px solid rgba(255, 255, 255, 0.42);
        box-shadow: 0 26px 44px rgba(31, 13, 64, 0.16);
        color: #21163a;
        overflow: hidden;
        isolation: isolate;
    }

    .ignored-members__hero::before,
    .ignored-members__hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.6;
        z-index: -1;
        animation: ignoreGlow 16s ease-in-out infinite;
    }

    .ignored-members__hero::before {
        width: 420px;
        height: 420px;
        top: -220px;
        right: -180px;
        background: rgba(126, 87, 194, 0.48);
    }

    .ignored-members__hero::after {
        width: 360px;
        height: 360px;
        bottom: -210px;
        left: -140px;
        background: rgba(255, 145, 144, 0.4);
        animation-delay: 1.6s;
    }

    @keyframes ignoreGlow {
        0%, 100% {
            transform: translate3d(0, 0, 0) scale(1);
        }
        50% {
            transform: translate3d(12px, -16px, 0) scale(1.05);
        }
    }

    .ignored-members__hero-content {
        display: grid;
        gap: clamp(1rem, 3vw, 1.6rem);
    }

    .ignored-members__hero-header {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
        gap: clamp(1rem, 3vw, 1.5rem);
    }

    .ignored-members__title {
        font-size: clamp(1.8rem, 3.6vw, 2.4rem);
        font-weight: 700;
        margin: 0;
    }

    .ignored-members__subtitle {
        margin: 0;
        max-width: 540px;
        font-size: clamp(0.95rem, 2.3vw, 1.04rem);
        color: rgba(33, 22, 58, 0.72);
    }

    .ignored-members__metrics {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: clamp(0.9rem, 3vw, 1.3rem);
    }

    .ignored-members__metric {
        background: rgba(255, 255, 255, 0.86);
        border-radius: 18px;
        padding: 1rem 1.25rem;
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
        box-shadow: 0 16px 32px rgba(32, 14, 68, 0.13);
        backdrop-filter: blur(12px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .ignored-members__metric:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 46px rgba(32, 14, 68, 0.18);
    }

    .ignored-members__metric span {
        font-size: 0.84rem;
        color: rgba(33, 22, 58, 0.62);
    }

    .ignored-members__metric strong {
        font-size: 1.45rem;
        font-weight: 700;
        color: #201438;
    }

    .ignored-members__grid {
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        gap: clamp(0.85rem, 2.4vw, 1.2rem);
    }

    .ignored-card {
        position: relative;
        min-height: clamp(280px, 46vw, 420px);
        border-radius: 24px;
        overflow: hidden;
        background: #0f0a20;
        box-shadow: 0 18px 38px rgba(23, 10, 52, 0.18);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        isolation: isolate;
    }

    .ignored-card::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(15, 10, 32, 0) 55%, rgba(15, 10, 32, 0.7) 80%, rgba(15, 10, 32, 0.9) 100%);
        opacity: 0.78;
        transition: opacity 0.35s ease;
        pointer-events: none;
        z-index: 1;
    }

    .ignored-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 28px 58px rgba(23, 10, 52, 0.24);
    }

    .ignored-card:hover::after {
        opacity: 0.94;
    }

    .ignored-card__media {
        position: absolute;
        inset: 0;
        display: block;
    }

    .ignored-card__media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .ignored-card:hover .ignored-card__media img {
        transform: scale(1.06);
    }

    .ignored-card__floating-actions {
        position: absolute;
        top: 0.85rem;
        left: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.32rem 0.65rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.88);
        backdrop-filter: blur(12px);
        box-shadow: 0 14px 28px rgba(20, 9, 42, 0.2);
        opacity: 0;
        transform: translateY(-8px);
        transition: opacity 0.25s ease, transform 0.25s ease;
        z-index: 2;
    }

    .ignored-card:hover .ignored-card__floating-actions {
        opacity: 1;
        transform: translateY(0);
    }

    .ignored-card__index-tag {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.2rem 0.55rem;
        border-radius: 999px;
        background: rgba(110, 75, 242, 0.16);
        color: #5a3de3;
        font-size: 0.78rem;
        font-weight: 600;
    }

    .ignored-card__floating-actions .btn-remove {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border: none;
        background: rgba(64, 199, 138, 0.24);
        color: #1c784b;
        transition: transform 0.2s ease, background 0.2s ease;
    }

    .ignored-card__floating-actions .btn-remove:hover {
        transform: translateY(-2px);
        background: rgba(64, 199, 138, 0.32);
    }

    .ignored-card__status-tag {
        position: absolute;
        top: 0.9rem;
        right: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.32rem 0.75rem;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.03em;
        text-transform: uppercase;
        background: rgba(255, 255, 255, 0.88);
        backdrop-filter: blur(12px);
        box-shadow: 0 12px 24px rgba(22, 8, 46, 0.18);
        z-index: 2;
        color: #9c4fd8;
    }

    .ignored-card__status-tag i {
        font-size: 1rem;
    }

    .ignored-card__info {
        position: absolute;
        left: 0.9rem;
        right: 0.9rem;
        bottom: 0.9rem;
        padding: 1rem 1.1rem;
        border-radius: 18px;
        background: rgb(255 255 255 / 24%);
        backdrop-filter: blur(18px);
        box-shadow: 0 12px 28px rgba(18, 8, 38, 0.14);
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
        z-index: 2;
    }

    .ignored-card__info-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
    }

    .ignored-card__name {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
        color: #1f1536;
    }

    .ignored-card__meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.55rem;
        font-size: 0.85rem;
        color: rgba(32, 21, 56, 0.72);
    }

    .ignored-card__meta-item {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.32rem 0.65rem;
        border-radius: 999px;
        background: rgba(246, 241, 255, 0.92);
    }

    .ignored-card__meta-item i {
i        color: #8f62ff;
    }

    .ignored-members__empty {
        border-radius: 24px;
        padding: clamp(1.6rem, 3.5vw, 2.2rem);
        background: rgba(255, 255, 255, 0.92);
        border: 1px dashed rgba(143, 98, 255, 0.25);
        text-align: center;
        box-shadow: 0 14px 28px rgba(33, 14, 70, 0.12);
        color: rgba(33, 22, 58, 0.68);
    }

    .ignored-members__pagination {
        display: flex;
        justify-content: center;
    }

    @media (min-width: 576px) {
        .ignored-members__grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (min-width: 768px) {
        .ignored-members__grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (min-width: 1200px) {
        .ignored-members__grid {
            grid-template-columns: repeat(5, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .ignored-members__hero-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .ignored-card {
            min-height: clamp(240px, 60vw, 320px);
        }
    }

    @media (max-width: 575.98px) {
        .ignored-members__hero {
            border-radius: 22px;
            padding: clamp(1.4rem, 6vw, 1.8rem);
        }

        .ignored-members__metrics {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .ignored-card {
            min-height: clamp(260px, 100vw, 340px);
            border-radius: 20px;
        }

        .ignored-card__floating-actions {
            left: 0.75rem;
            top: 0.75rem;
            padding: 0.26rem 0.5rem;
            gap: 0.35rem;
        }

        .ignored-card__index-tag {
            font-size: 0.7rem;
            padding: 0.16rem 0.42rem;
        }

        .ignored-card__status-tag {
            top: 0.7rem;
            right: 0.7rem;
            padding: 0.26rem 0.6rem;
            font-size: 0.68rem;
        }

        .ignored-card__info {
            left: 0.7rem;
            right: 0.7rem;
            bottom: 0.7rem;
            padding: 0.75rem 0.85rem;
            gap: 0.45rem;
        }

        .ignored-card__name {
            font-size: 0.96rem;
        }

        .ignored-card__meta {
            gap: 0.4rem;
        }

        .ignored-card__meta-item {
            padding: 0.26rem 0.5rem;
            font-size: 0.78rem;
        }
    }

    @media (hover: none) {
        .ignored-card__floating-actions {
            opacity: 1;
            transform: none;
        }
    }
</style>

@php
    $ignoredUserIds = $ignored_members->pluck('user_id')->filter()->values();
    $presentAddresses = \App\Models\Address::where('type', 'present')
        ->whereIn('user_id', $ignoredUserIds)
        ->with('country')
        ->get()
        ->keyBy('user_id');
    $motherTongueIds = $ignored_members->map(function ($ignored) {
        $member = optional(optional($ignored->user)->member);
        return optional($member)->mothere_tongue;
    })->filter()->unique();
    $motherTongues = $motherTongueIds->isNotEmpty()
        ? \App\Models\MemberLanguage::whereIn('id', $motherTongueIds->all())->pluck('name', 'id')
        : collect();
    $totalIgnored = $ignored_members->total();
    $pageCount = $ignored_members->count();
@endphp

<div class="ignored-members">
    <section class="ignored-members__hero">
        <div class="ignored-members__hero-content">
            <div class="ignored-members__hero-header">
                <div>
                    <h5 class="ignored-members__title mb-1">{{ translate('Ignored Members') }}</h5>
                    <p class="ignored-members__subtitle">{{ translate('Profiles you have muted from your matches. Review and restore them whenever you wish.') }}</p>
                </div>
            </div>
            <div class="ignored-members__metrics">
                <div class="ignored-members__metric">
                    <span>{{ translate('Total Ignored') }}</span>
                    <strong>{{ $totalIgnored }}</strong>
                </div>
                <div class="ignored-members__metric">
                    <span>{{ translate('Showing This Page') }}</span>
                    <strong>{{ $pageCount }}</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="ignored-members__grid">
        @forelse ($ignored_members as $key => $ignored_member)
            @if ($ignored_member->user)
                @php
                    $user = $ignored_member->user;
                    $member = optional($user)->member;
                    $birthday = $member ? $member->birthday : null;
                    $age = $birthday ? \Carbon\Carbon::parse($birthday)->age : null;
                    $religionName = optional(optional($user->spiritual_backgrounds)->religion)->name;
                    $presentAddress = $presentAddresses->get($ignored_member->user_id);
                    $locationName = optional(optional($presentAddress)->country)->name;
                    $motherTongueName = $motherTongues->get(optional($member)->mothere_tongue);
                @endphp

                <div class="ignored-card" id="ignored_member_{{ $ignored_member->user_id }}">
                    <a
                        @if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1)
                            href="javascript:void(0);" onclick="package_update_alert()"
                        @else
                            href="{{ route('member_profile', $ignored_member->user_id) }}"
                        @endif
                        class="ignored-card__media"
                    >
                        @if(uploaded_asset($user->photo) != null)
                            <img src="{{ uploaded_asset($user->photo) }}" alt="{{ translate('photo') }}">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}" alt="{{ translate('photo') }}">
                        @endif
                    </a>
                    <div class="ignored-card__floating-actions">
                        <span class="ignored-card__index-tag">#{{ ($key + 1) + ($ignored_members->currentPage() - 1) * $ignored_members->perPage() }}</span>
                        <button type="button" onclick="remove_from_ignored_list({{ $ignored_member->user_id }})" class="btn-remove" title="{{ translate('Remove From Ignore List') }}">
                            <i class="las la-check"></i>
                        </button>
                    </div>
                    <span class="ignored-card__status-tag">
                        <i class="las la-eye-slash"></i>
                        {{ translate('Ignored') }}
                    </span>
                    <div class="ignored-card__info">
                        <div class="ignored-card__info-top">
                            <h6 class="ignored-card__name mb-0">
                                <a
                                    @if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1)
                                        href="javascript:void(0);" onclick="package_update_alert()"
                                    @else
                                        href="{{ route('member_profile', $ignored_member->user_id) }}"
                                    @endif
                                    class="text-reset"
                                >
                                    {{ $user->first_name.' '.$user->last_name }}
                                </a>
                            </h6>
                        </div>
                        <div class="ignored-card__meta">
                            <span class="ignored-card__meta-item">
                                <i class="las la-birthday-cake"></i>
                                <span>{{ $age ? $age : translate('N/A') }}</span>
                            </span>
                            @if(get_setting('member_spiritual_and_social_background_section') == 'on' && $religionName)
                                <span class="ignored-card__meta-item">
                                    <i class="las la-pray"></i>
                                    <span>{{ $religionName }}</span>
                                </span>
                            @endif
                            @if(get_setting('member_present_address_section') == 'on' && $locationName)
                                <span class="ignored-card__meta-item">
                                    <i class="las la-map-marker-alt"></i>
                                    <span>{{ $locationName }}</span>
                                </span>
                            @endif
                            @if(get_setting('member_language_section') == 'on' && $motherTongueName)
                                <span class="ignored-card__meta-item">
                                    <i class="las la-language"></i>
                                    <span>{{ $motherTongueName }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="ignored-members__empty">
                <strong>{{ translate('No ignored members yet') }}</strong>
                <span>{{ translate('Members you mute will appear here so you can restore them later if needed.') }}</span>
            </div>
        @endforelse
    </section>

    <div class="ignored-members__pagination mt-2">
        <div class="aiz-pagination">
            {{ $ignored_members->links() }}
        </div>
    </div>
</div>
@endsection

@section('modal')
  @include('modals.package_update_alert_modal')
@endsection

@section('script')
<script type="text/javascript">
    function remove_from_ignored_list(id) {
      $.post('{{ route('member.remove_from_ignored_list') }}',
        {
          _token: '{{ csrf_token() }}',
          id: id
        },
        function (data) {
          if (data == 1) {
            $("#ignored_member_"+id).hide();
            AIZ.plugins.notify('success', '{{translate('You Have Removed This Member From Your Ignored list')}}');
          }
          else {
            AIZ.plugins.notify('danger', '{{translate('Something went wrong')}}');
          }
        }
      );
    }

    function package_update_alert(){
      $('.package_update_alert_modal').modal('show');
    }

</script>
@endsection
