@extends('frontend.layouts.member_panel')
@section('panel_content')
<style>
    .member-shortlists {
        display: flex;
        flex-direction: column;
        gap: clamp(1.4rem, 4vw, 2.4rem);
    }

    .member-shortlists__hero {
        position: relative;
        border-radius: 28px;
        padding: clamp(1.7rem, 4vw, 2.5rem);
        background: linear-gradient(135deg, rgba(143, 98, 255, 0.2), rgba(255, 160, 127, 0.18));
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 26px 44px rgba(34, 15, 68, 0.14);
        color: #21163a;
        overflow: hidden;
        isolation: isolate;
    }

    .member-shortlists__hero::before,
    .member-shortlists__hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.62;
        z-index: -1;
        animation: shortlistGlow 16s ease-in-out infinite;
    }

    .member-shortlists__hero::before {
        width: 420px;
        height: 420px;
        top: -210px;
        right: -170px;
        background: rgba(143, 98, 255, 0.48);
    }

    .member-shortlists__hero::after {
        width: 360px;
        height: 360px;
        bottom: -210px;
        left: -140px;
        background: rgba(255, 160, 127, 0.42);
        animation-delay: 2s;
    }

    @keyframes shortlistGlow {
        0%, 100% {
            transform: translate3d(0, 0, 0) scale(1);
        }
        50% {
            transform: translate3d(14px, -16px, 0) scale(1.05);
        }
    }

    .member-shortlists__hero-content {
        display: grid;
        gap: clamp(1rem, 3vw, 1.6rem);
    }

    .member-shortlists__hero-header {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
        gap: clamp(1rem, 3vw, 1.5rem);
    }

    .member-shortlists__title {
        font-size: clamp(1.8rem, 3.6vw, 2.4rem);
        font-weight: 700;
        margin: 0;
    }

    .member-shortlists__subtitle {
        margin: 0;
        max-width: 540px;
        font-size: clamp(0.95rem, 2.4vw, 1.05rem);
        color: rgba(33, 22, 58, 0.7);
    }

    .member-shortlists__metrics {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: clamp(0.9rem, 3vw, 1.3rem);
    }

    .member-shortlists__metric {
        background: rgba(255, 255, 255, 0.86);
        border-radius: 18px;
        padding: 1rem 1.25rem;
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
        box-shadow: 0 16px 32px rgba(36, 14, 72, 0.12);
        backdrop-filter: blur(12px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .member-shortlists__metric:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 46px rgba(36, 14, 72, 0.18);
    }

    .member-shortlists__metric span {
        font-size: 0.84rem;
        color: rgba(33, 22, 58, 0.62);
    }

    .member-shortlists__metric strong {
        font-size: 1.45rem;
        font-weight: 700;
        color: #201438;
    }

    .member-shortlists__grid {
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        gap: clamp(0.85rem, 2.4vw, 1.2rem);
    }

    .shortlist-card {
        position: relative;
        min-height: clamp(280px, 70vw, 420px);
        border-radius: 24px;
        overflow: hidden;
        background: #100a1f;
        box-shadow: 0 18px 38px rgba(25, 10, 54, 0.16);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        isolation: isolate;
    }

    .shortlist-card::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(14, 9, 32, 0) 50%, rgba(14, 9, 32, 0.68) 80%, rgba(14, 9, 32, 0.85) 100%);
        opacity: 0.75;
        transition: opacity 0.35s ease;
        pointer-events: none;
        z-index: 1;
    }

    .shortlist-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 28px 56px rgba(25, 10, 54, 0.22);
    }

    .shortlist-card:hover::after {
        opacity: 0.92;
    }

    .shortlist-card__media {
        position: absolute;
        inset: 0;
        display: block;
    }

    .shortlist-card__media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .shortlist-card:hover .shortlist-card__media img {
        transform: scale(1.06);
    }

    .shortlist-card__floating-actions {
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

    .shortlist-card:hover .shortlist-card__floating-actions {
        opacity: 1;
        transform: translateY(0);
    }

    .shortlist-card__floating-actions .btn {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border: none;
        background: rgba(120, 83, 245, 0.12);
        color: #6f4bf2;
        transition: transform 0.2s ease, background 0.2s ease;
        box-shadow: none;
    }

    .shortlist-card__floating-actions .btn:hover {
        transform: translateY(-2px);
        background: rgba(120, 83, 245, 0.2);
    }

    .shortlist-card__floating-actions .btn i {
        font-size: 1.05rem;
        line-height: 1;
    }

    .shortlist-card__floating-actions .btn-soft-danger {
        background: rgba(255, 232, 232, 0.86);
        color: #d35454;
    }

    .shortlist-card__floating-actions .btn-soft-danger:hover {
        background: rgba(255, 215, 215, 0.92);
    }

    .shortlist-card__floating-actions .btn-soft-success {
        background: rgba(214, 245, 232, 0.88);
        color: #1b7549;
    }

    .shortlist-card__floating-actions .btn-soft-success:hover {
        background: rgba(201, 239, 223, 0.94);
    }

    .shortlist-card__index-tag {
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

    .shortlist-card__status-tag {
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
    }

    .shortlist-card__status-tag i {
        font-size: 1rem;
    }

    .shortlist-card__info {
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

    .shortlist-card__info-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
    }

    .shortlist-card__name {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
        color: #1f1536;
    }

    .shortlist-status {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        padding: 0.3rem 0.75rem;
        border-radius: 999px;
        font-size: 0.72rem;
        font-weight: 600;
        letter-spacing: 0.02em;
        text-transform: uppercase;
    }

    .shortlist-status--expressed {
        background: rgba(64, 199, 138, 0.18);
        color: #1b7549;
    }

    .shortlist-status--pending {
        background: rgba(121, 138, 255, 0.18);
        color: #3442c2;
    }

    .shortlist-card__meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.55rem;
        font-size: 0.85rem;
        color: rgba(32, 21, 56, 0.7);
    }

    .shortlist-card__meta-item {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.32rem 0.65rem;
        border-radius: 999px;
        background: rgba(246, 241, 255, 0.92);
    }

    .shortlist-card__meta-item i {
        color: #8f62ff;
    }

    .shortlist-card__cta {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-weight: 600;
        color: #6f4bf2;
        text-decoration: none;
        font-size: 0.87rem;
    }

    .shortlist-card__cta:hover {
        color: #3925a6;
    }

    .member-shortlists__empty {
        border-radius: 24px;
        padding: clamp(1.6rem, 3.5vw, 2.2rem);
        background: rgba(255, 255, 255, 0.92);
        border: 1px dashed rgba(143, 98, 255, 0.25);
        text-align: center;
        box-shadow: 0 14px 28px rgba(33, 14, 70, 0.12);
        color: rgba(33, 22, 58, 0.68);
    }

    .member-shortlists__pagination {
        display: flex;
        justify-content: center;
    }

    @media (min-width: 576px) {
        .member-shortlists__grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (min-width: 768px) {
        .member-shortlists__grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (min-width: 1200px) {
        .member-shortlists__grid {
            grid-template-columns: repeat(5, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .member-shortlists__hero-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .shortlist-card {
            min-height: clamp(240px, 60vw, 320px);
        }
    }

    @media (max-width: 575.98px) {
        .member-shortlists__hero {
            border-radius: 22px;
            padding: clamp(1.4rem, 6vw, 1.8rem);
        }

        .member-shortlists__metrics {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .shortlist-card {
            min-height: clamp(260px, 100vw, 340px);
            border-radius: 20px;
        }

        .shortlist-card__floating-actions {
            left: 0.75rem;
            top: 0.75rem;
            padding: 0.26rem 0.5rem;
            gap: 0.35rem;
        }

        .shortlist-card__floating-actions .btn {
            width: 28px;
            height: 28px;
            border-radius: 8px;
        }

        .shortlist-card__floating-actions .btn i {
            font-size: 0.9rem;
        }

        .shortlist-card__index-tag {
            font-size: 0.7rem;
            padding: 0.16rem 0.42rem;
        }

        .shortlist-card__status-tag {
            top: 0.7rem;
            right: 0.7rem;
            padding: 0.26rem 0.6rem;
            font-size: 0.68rem;
        }

        .shortlist-card__info {
            left: 0.7rem;
            right: 0.7rem;
            bottom: 0.7rem;
            padding: 0.75rem 0.85rem;
            gap: 0.45rem;
        }

        .shortlist-card__name {
            font-size: 0.96rem;
        }

        .shortlist-card__meta {
            gap: 0.4rem;
        }

        .shortlist-card__meta-item {
            padding: 0.26rem 0.5rem;
            font-size: 0.78rem;
        }
    }

    @media (hover: none) {
        .shortlist-card__floating-actions {
            opacity: 1;
            transform: none;
        }
    }
</style>

@php
    $shortlistUserIds = $shortlists->pluck('user_id')->filter()->values();
    $expressedUserIds = \App\Models\ExpressInterest::where('interested_by', Auth::id())
        ->whereIn('user_id', $shortlistUserIds)
        ->pluck('user_id')
        ->toArray();
    $presentAddresses = \App\Models\Address::where('type', 'present')
        ->whereIn('user_id', $shortlistUserIds)
        ->with('country')
        ->get()
        ->keyBy('user_id');
    $motherTongueIds = $shortlists->map(function ($shortlist) {
        $member = optional($shortlist->user)->member;
        return $member ? $member->mothere_tongue : null;
    })->filter()->unique();
    $motherTongues = $motherTongueIds->isNotEmpty()
        ? \App\Models\MemberLanguage::whereIn('id', $motherTongueIds->all())->pluck('name', 'id')
        : collect();
    $pageCount = $shortlists->count();
    $expressedCount = count($expressedUserIds);
    $pendingCount = max($pageCount - $expressedCount, 0);
@endphp

<div class="member-shortlists">
    <section class="member-shortlists__hero">
        <div class="member-shortlists__hero-content">
            <div class="member-shortlists__hero-header">
                <div>
                    <h5 class="member-shortlists__title mb-1">{{ translate('My Shortlists') }}</h5>
                    <p class="member-shortlists__subtitle">{{ translate('Keep the profiles you care about close and follow up when you are ready to connect.') }}</p>
                </div>
            </div>
            <div class="member-shortlists__metrics">
                <div class="member-shortlists__metric">
                    <span>{{ translate('Saved Profiles') }}</span>
                    <strong>{{ $shortlists->total() }}</strong>
                </div>
                <div class="member-shortlists__metric">
                    <span>{{ translate('Showing This Page') }}</span>
                    <strong>{{ $pageCount }}</strong>
                </div>
                <div class="member-shortlists__metric">
                    <span>{{ translate('Interest Expressed (this page)') }}</span>
                    <strong>{{ $expressedCount }}</strong>
                </div>
                <div class="member-shortlists__metric">
                    <span>{{ translate('Awaiting Interest (this page)') }}</span>
                    <strong>{{ $pendingCount }}</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="member-shortlists__grid">
        @forelse ($shortlists as $key => $shortlist)
            @if ($shortlist->user)
                @php
                    $user = $shortlist->user;
                    $member = optional($user)->member;
                    $birthday = $member ? $member->birthday : null;
                    $age = $birthday ? \Carbon\Carbon::parse($birthday)->age : null;
                    $religionName = optional(optional($user->spiritual_backgrounds)->religion)->name;
                    $presentAddress = $presentAddresses->get($shortlist->user_id);
                    $locationName = optional(optional($presentAddress)->country)->name;
                    $motherTongueName = $motherTongues->get(optional($member)->mothere_tongue);
                    $hasExpressed = in_array($shortlist->user_id, $expressedUserIds);
                @endphp

                <div class="shortlist-card" id="shortlisted_member_{{ $shortlist->user_id }}">
                    <a
                        @if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1)
                            href="javascript:void(0);" onclick="package_update_alert()"
                        @else
                            href="{{ route('member_profile', $shortlist->user_id) }}"
                        @endif
                        class="shortlist-card__media"
                    >
                        @if(uploaded_asset($user->photo) != null)
                            <img src="{{ uploaded_asset($user->photo) }}" alt="{{ translate('photo') }}">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}" alt="{{ translate('photo') }}">
                        @endif
                    </a>
                    <div class="shortlist-card__floating-actions">
                        <span class="shortlist-card__index-tag">#{{ ($key + 1) + ($shortlists->currentPage() - 1) * $shortlists->perPage() }}</span>
                        @if($hasExpressed)
                            <a href="javascript:void(0);" class="btn btn-soft-success" title="{{ translate('Interest Expressed') }}">
                                <i class="las la-heart"></i>
                            </a>
                        @else
                            <a href="javascript:void(0);" onclick="express_interest({{ $shortlist->user_id }})" id="interest_a_id_{{$shortlist->user_id}}" class="btn btn-primary" title="{{ translate('Express Interest') }}">
                                <i class="las la-heart"></i>
                            </a>
                        @endif
                        <a href="javascript:void(0);" onclick="remove_shortlist({{ $shortlist->user_id }})" class="btn btn-soft-danger" title="{{ translate('Remove from Shortlist') }}">
                            <i class="las la-trash-alt"></i>
                        </a>
                    </div>
                    <span class="shortlist-card__status-tag {{ $hasExpressed ? 'shortlist-status--expressed' : 'shortlist-status--pending' }}">
                        <i class="las {{ $hasExpressed ? 'la-heart' : 'la-hourglass-half' }}"></i>
                        {{ $hasExpressed ? translate('Interest Expressed') : translate('Pending Action') }}
                    </span>
                    <div class="shortlist-card__info">
                        <div class="shortlist-card__info-top">
                            <h6 class="shortlist-card__name mb-0">
                                <a
                                    @if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1)
                                        href="javascript:void(0);" onclick="package_update_alert()"
                                    @else
                                        href="{{ route('member_profile', $shortlist->user_id) }}"
                                    @endif
                                    class="text-reset"
                                >
                                    {{ $user->first_name.' '.$user->last_name }}
                                </a>
                            </h6>
                        </div>
                        <div class="shortlist-card__meta">
                            <span class="shortlist-card__meta-item">
                                <i class="las la-birthday-cake"></i>
                                <span>{{ $age ? $age : translate('N/A') }}</span>
                            </span>
                            @if(get_setting('member_spiritual_and_social_background_section') == 'on' && $religionName)
                                <span class="shortlist-card__meta-item">
                                    <i class="las la-pray"></i>
                                    <span>{{ $religionName }}</span>
                                </span>
                            @endif
                        </div>
                  
                    </div>
                </div>
            @endif
        @empty
            <div class="member-shortlists__empty">
                <strong>{{ translate('No profiles saved yet') }}</strong>
                <span>{{ translate('Shortlist members you admire to organize your top matches and take action later.') }}</span>
            </div>
        @endforelse
    </section>

    <div class="member-shortlists__pagination mt-2">
        <div class="aiz-pagination">
            {{ $shortlists->links() }}
        </div>
    </div>
</div>
@endsection

@section('modal')
  @include('modals.confirm_modal')
  @include('modals.package_update_alert_modal')
@endsection

@section('script')
<script type="text/javascript">
    function remove_shortlist(id) {
      $.post('{{ route('member.remove_from_shortlist') }}',
        {
          _token: '{{ csrf_token() }}',
          id: id
        },
        function (data) {
          if (data == 1) {
            $("#shortlisted_member_"+id).hide();
            AIZ.plugins.notify('success', '{{translate('You Have Removed This Member From Shortlist')}}');
          }
          else {
            AIZ.plugins.notify('danger', '{{translate('Something went wrong')}}');
          }
        }
      );
    }

    // Express Interest
    var package_validity = {{ package_validity(Auth::user()->id) }};
    var remaining_interest = {{ get_remaining_value(Auth::user()->id,'remaining_interest') }};
    function express_interest(id)
    {
        if( package_validity == 0 || remaining_interest < 1){
            $('.package_update_alert_modal').modal('show');
        }
        else {
          $('.confirm_modal').modal('show');
          $("#confirm_modal_title").html("{{ translate('Confirm Express Interest') }}");
          $("#confirm_modal_content").html("<p class='fs-14'>{{translate('Remaining Express Interests')}}: "+remaining_interest+" {{translate('Times')}}</p><small class='text-danger'>{{translate('**N.B. Expressing An Interest Will Cost 1 From Your Remaining Interests**')}}</small>");
          $("#confirm_button").attr("onclick","do_express_interest("+id+")");
        }
    }

    function do_express_interest(id){
      $('.confirm_modal').modal('toggle');
      $("#interest_a_id_"+id).removeAttr("onclick");
      $.post('{{ route('express-interest.store') }}',
        {
          _token: '{{ csrf_token() }}',
          id: id
        },
        function (data) {
          if (data == 1) {
            $("#interest_a_id_"+id).attr("class","btn btn-soft-success btn-icon btn-circle btn-sm");
            $("#interest_a_id_"+id).attr("title","{{ translate('Interest Expressed') }}");
            AIZ.plugins.notify('success', '{{translate('Interest Expressed Sucessfully')}}');
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
