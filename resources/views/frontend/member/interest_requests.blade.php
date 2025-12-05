@extends('frontend.layouts.member_panel')
@section('panel_content')
<style>
    .modal-open .modal {
        overflow-x: hidden;
        overflow-y: auto;
        z-index: 9999;
    }

    .member-interests {
        display: flex;
        flex-direction: column;
        gap: clamp(1.5rem, 4vw, 2.5rem);
    }

    .member-interests__hero {
        position: relative;
        border-radius: 28px;
        padding: clamp(1.8rem, 4vw, 2.6rem);
        background: linear-gradient(135deg, rgba(143, 98, 255, 0.18), rgba(255, 160, 127, 0.2));
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 28px 46px rgba(38, 16, 78, 0.14);
        overflow: hidden;
        color: #201538;
        isolation: isolate;
    }

    .member-interests__hero::before,
    .member-interests__hero::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        filter: blur(70px);
        opacity: 0.6;
        z-index: -1;
        animation: interestGlow 14s ease-in-out infinite;
    }

    .member-interests__hero::before {
        width: 420px;
        height: 420px;
        bottom: -220px;
        right: -180px;
        background: rgba(143, 98, 255, 0.45);
    }

    .member-interests__hero::after {
        width: 360px;
        height: 360px;
        top: -180px;
        left: -140px;
        background: rgba(255, 160, 127, 0.42);
    }

    @keyframes interestGlow {
        0% {
            transform: translate3d(0, 0, 0) scale(1);
        }
        50% {
            transform: translate3d(12px, -18px, 0) scale(1.05);
        }
        100% {
            transform: translate3d(0, 0, 0) scale(1);
        }
    }

    .member-interests__hero-content {
        display: grid;
        gap: clamp(1rem, 3vw, 1.5rem);
    }

    .member-interests__hero-header {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
        gap: clamp(1rem, 3vw, 1.5rem);
    }

    .member-interests__title {
        font-size: clamp(1.8rem, 3.6vw, 2.4rem);
        font-weight: 700;
        margin: 0;
    }

    .member-interests__subtitle {
        margin: 0;
        max-width: 560px;
        font-size: clamp(0.95rem, 2.4vw, 1.05rem);
        color: rgba(32, 21, 56, 0.7);
    }

    .member-interests__cta {
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        gap: 0.55rem;
        padding: 0.75rem 1.4rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.85);
        color: #6d4ef5;
        font-weight: 600;
        box-shadow: 0 18px 36px rgba(41, 18, 86, 0.18);
        transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
        text-decoration: none;
    }

    .member-interests__cta:hover {
        transform: translateY(-3px);
        background: linear-gradient(135deg, rgba(143, 98, 255, 0.22), rgba(255, 160, 127, 0.28));
        box-shadow: 0 24px 42px rgba(41, 18, 86, 0.22);
        color: #201538;
    }

    .member-interests__metrics {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: clamp(0.9rem, 3vw, 1.4rem);
    }

    .member-interests__metric {
        background: rgba(255, 255, 255, 0.86);
        border-radius: 18px;
        padding: 1rem 1.3rem;
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
        box-shadow: 0 16px 34px rgba(35, 14, 74, 0.12);
        backdrop-filter: blur(14px);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .member-interests__metric:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 46px rgba(35, 14, 74, 0.18);
    }

    .member-interests__metric span {
        font-size: 0.85rem;
        color: rgba(32, 21, 56, 0.6);
    }

    .member-interests__metric strong {
        font-size: 1.5rem;
        font-weight: 700;
        color: #201538;
    }

    .member-interests__list {
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        gap: clamp(0.85rem, 2.4vw, 1.2rem);
    }

    .interest-card {
        position: relative;
        min-height: clamp(260px, 46vw, 400px);
        border-radius: 24px;
        overflow: hidden;
        background: #0f0a20;
        box-shadow: 0 18px 38px rgba(23, 10, 52, 0.18);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
        isolation: isolate;
    }

    .interest-card::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(15, 10, 32, 0) 55%, rgba(15, 10, 32, 0.7) 80%, rgba(15, 10, 32, 0.88) 100%);
        opacity: 0.78;
        transition: opacity 0.35s ease;
        pointer-events: none;
        z-index: 1;
    }

    .interest-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 28px 58px rgba(23, 10, 52, 0.24);
    }

    .interest-card:hover::after {
        opacity: 0.94;
    }

    .interest-card__media {
        position: absolute;
        inset: 0;
        display: block;
    }

    .interest-card__media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .interest-card:hover .interest-card__media img {
        transform: scale(1.06);
    }

    .interest-card__floating-actions {
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

    .interest-card:hover .interest-card__floating-actions {
        opacity: 1;
        transform: translateY(0);
    }

    .interest-card__index-tag {
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

    .interest-card__timestamp {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        font-size: 0.74rem;
        color: rgba(31, 21, 54, 0.78);
    }

    .interest-card__timestamp i {
        color: #8f62ff;
    }

    .interest-card__status-tag {
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

    .interest-card__status-tag i {
        font-size: 1rem;
    }

    .interest-card__status-tag.interest-status--approved {
        background: rgba(64, 199, 138, 0.18);
        color: #1c784b;
    }

    .interest-card__status-tag.interest-status--pending {
        background: rgba(121, 138, 255, 0.2);
        color: #3442c2;
    }

    .interest-card__info {
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

    .interest-card__info-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
    }

    .interest-card__name {
        margin: 0;
        font-size: 1.05rem;
        font-weight: 700;
        color: #1f1536;
    }

    .interest-card__meta {
        display: flex;
        flex-wrap: wrap;
        gap: 0.55rem;
        font-size: 0.85rem;
        color: rgba(32, 21, 56, 0.72);
    }

    .interest-card__meta-item {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.32rem 0.65rem;
        border-radius: 999px;
        background: rgba(246, 241, 255, 0.92);
    }

    .interest-card__meta-item i {
        color: #8f62ff;
    }

    .interest-card__cta {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-weight: 600;
        color: #6f4bf2;
        text-decoration: none;
        font-size: 0.87rem;
    }

    .interest-card__cta:hover {
        color: #3b26a9;
    }

    .interest-card__actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.35rem;
        justify-content: flex-end;
    }

    .interest-card__action-btn {
        border-radius: 999px;
        padding: 0.25rem 0.95rem;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.02em;
    }

    .member-interests__empty {
        border-radius: 24px;
        padding: clamp(1.6rem, 3.5vw, 2.2rem);
        background: rgba(255, 255, 255, 0.92);
        border: 1px dashed rgba(143, 98, 255, 0.25);
        text-align: center;
        box-shadow: 0 14px 28px rgba(32, 15, 70, 0.12);
        color: rgba(32, 21, 56, 0.7);
    }

    .member-interests__pagination {
        display: flex;
        justify-content: center;
        margin-top: 0.5rem;
    }

    .aiz-pagination {
        margin-top: 0;
    }

    @media (min-width: 576px) {
        .member-interests__list {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (min-width: 992px) {
        .member-interests__list {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (min-width: 1200px) {
        .member-interests__list {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .member-interests__hero-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    @media (max-width: 575.98px) {
        .member-interests__hero {
            border-radius: 22px;
            padding: clamp(1.4rem, 6vw, 1.8rem);
        }

        .member-interests__metrics {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.75rem;
        }

        .interest-card {
            min-height: clamp(240px, 100vw, 320px);
            border-radius: 20px;
        }

        .interest-card__floating-actions {
            top: 0.75rem;
            left: 0.75rem;
            padding: 0.26rem 0.5rem;
            gap: 0.35rem;
        }

        .interest-card__index-tag {
            font-size: 0.7rem;
            padding: 0.16rem 0.42rem;
        }

        .interest-card__timestamp {
            font-size: 0.68rem;
        }

        .interest-card__status-tag {
            top: 0.7rem;
            right: 0.7rem;
            padding: 0.26rem 0.6rem;
            font-size: 0.68rem;
        }

        .interest-card__info {
            left: 0.7rem;
            right: 0.7rem;
            bottom: 0.7rem;
            padding: 0.75rem 0.85rem;
            gap: 0.45rem;
        }

        .interest-card__name {
            font-size: 0.96rem;
        }

        .interest-card__meta {
            gap: 0.4rem;
        }

        .interest-card__meta-item {
            padding: 0.26rem 0.5rem;
            font-size: 0.78rem;
        }
    }
</style>

@php
    $pageCount = $interests->count();
    $approvedCount = $interests->where('status', 1)->count();
    $pendingCount = max($pageCount - $approvedCount, 0);
@endphp

<div class="member-interests">
    <section class="member-interests__hero">
        <div class="member-interests__hero-content">
            <div class="member-interests__hero-header">
                <div>
                    <h5 class="member-interests__title mb-1">{{ translate('Interest Requests') }}</h5>
                    <p class="member-interests__subtitle">{{ translate('Manage and respond to members who have expressed interest in you.') }}</p>
                </div>
                <a href="{{ route('my_interests.index') }}" class="member-interests__cta">
                    <i class="las la-user-check"></i>
                    <span>{{ translate('View My Interests') }}</span>
                </a>
            </div>
            <div class="member-interests__metrics">
                <div class="member-interests__metric">
                    <span>{{ translate('Total Requests') }}</span>
                    <strong>{{ $interests->total() }}</strong>
                </div>
                <div class="member-interests__metric">
                    <span>{{ translate('Showing This Page') }}</span>
                    <strong>{{ $pageCount }}</strong>
                </div>
                <div class="member-interests__metric">
                    <span>{{ translate('Accepted (this page)') }}</span>
                    <strong>{{ $approvedCount }}</strong>
                </div>
                <div class="member-interests__metric">
                    <span>{{ translate('Pending (this page)') }}</span>
                    <strong>{{ $pendingCount }}</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="member-interests__list">
        @if ($interests->count())
            @foreach ($interests as $key => $interest)
                @php
                    $interested_by = \App\User::with('member')->find($interest->interested_by);
                    $member = optional($interested_by)->member;
                    $birthday = optional($member)->birthday;
                    $age = $birthday ? \Carbon\Carbon::parse($birthday)->age : null;
                    $statusApproved = $interest->status == 1;
                @endphp

                @if ($interested_by)
                    <div class="interest-card" id="interested_member_{{ $interested_by->id }}">
                        <a
                            @if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1)
                                href="javascript:void(0);" onclick="package_update_alert()"
                            @else
                                href="{{ route('member_profile', $interested_by->id) }}"
                            @endif
                            class="interest-card__media"
                        >
                            @if(uploaded_asset($interested_by->photo) != null)
                                <img src="{{ uploaded_asset($interested_by->photo) }}" alt="{{ translate('photo') }}">
                            @else
                                <img src="{{ static_asset('assets/img/avatar-place.png') }}" alt="{{ translate('photo') }}">
                            @endif
                        </a>

                        <div class="interest-card__floating-actions">
                            <span class="interest-card__index-tag">
                                #{{ ($key + 1) + ($interests->currentPage() - 1) * $interests->perPage() }}
                            </span>
                            <span class="interest-card__timestamp">
                                <i class="las la-clock"></i>
                                {{ optional($interest->created_at)->diffForHumans() }}
                            </span>
                        </div>

                        <span class="interest-card__status-tag {{ $statusApproved ? 'interest-status--approved' : 'interest-status--pending' }}">
                            <i class="las {{ $statusApproved ? 'la-check-circle' : 'la-hourglass-half' }}"></i>
                            {{ $statusApproved ? translate('Accepted') : translate('Pending') }}
                        </span>

                        <div class="interest-card__info">
                            <div class="interest-card__info-top">
                                <h6 class="interest-card__name mb-0">
                                    <a
                                        @if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1)
                                            href="javascript:void(0);" onclick="package_update_alert()"
                                        @else
                                            href="{{ route('member_profile', $interested_by->id) }}"
                                        @endif
                                        class="text-reset"
                                    >
                                        {{ $interested_by->first_name.' '.$interested_by->last_name }}
                                    </a>
                                </h6>
                                @if(!$statusApproved)
                                    <div class="interest-card__actions">
                                        <a href="javascript:void(0);" onclick="accept_interest({{ $interest->id }})" class="btn btn-success btn-sm interest-card__action-btn" title="{{ translate('Accept') }}">
                                            {{ translate('Accept') }}
                                        </a>
                                        <a href="javascript:void(0);" onclick="reject_interest({{ $interest->id }})" class="btn btn-danger btn-sm interest-card__action-btn confirm-delete" title="{{ translate('Reject') }}">
                                            {{ translate('Reject') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="interest-card__meta">
                                <span class="interest-card__meta-item">
                                    <i class="las la-birthday-cake"></i>
                                    <span>{{ $age ? $age : translate('Age not available') }}</span>
                                </span>
                                @if(optional($interest->created_at))
                                    <span class="interest-card__meta-item">
                                        <i class="las la-calendar"></i>
                                        <span>{{ optional($interest->created_at)->format('M d, Y') }}</span>
                                    </span>
                                @endif
                            </div>
                            <a
                                @if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1)
                                    href="javascript:void(0);" onclick="package_update_alert()"
                                @else
                                    href="{{ route('member_profile', $interested_by->id) }}"
                                @endif
                                class="interest-card__cta"
                            >
                                <i class="las la-user"></i>
                                <span>{{ translate('View Profile') }}</span>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <div class="member-interests__empty">
                <strong>{{ translate('No interest requests yet') }}</strong>
                <span>{{ translate('When members express interest in you, they will appear here for your review.') }}</span>
            </div>
        @endif
    </section>

    <div class="member-interests__pagination">
        <div class="aiz-pagination">
            {{ $interests->links() }}
        </div>
    </div>
</div>
@endsection
@section('modal')
    {{-- Interest Accept modal--}}
    <div class="modal fade interest_accept_modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{translate('Interest Accept!')}}</h4>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
                </div>
                <div class="modal-body text-center">
                    <form class="form-horizontal member-block" action="{{ route('accept_interest') }}" method="POST">
                        @csrf
                        <input type="hidden" name="interest_id" id="interest_accept_id" value="">
                        <p class="mt-1">{{translate('Are you sure you want to accept this interest?')}}</p>
                        <button type="button" class="btn btn-danger cancel mt-2" data-dismiss="modal">{{translate('Cancel')}}</button>
                        <button type="submit" class="btn btn-info mt-2">{{translate('Confirm')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Interest Reject Modal --}}
    <div class="modal fade interest_reject_modal" id="fade1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{translate('Interest Reject !')}}</h4>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
                </div>
                <div class="modal-body text-center">
                    <form class="form-horizontal member-block" action="{{ route('reject_interest') }}" method="POST">
                        @csrf
                        <input type="hidden" name="interest_id" id="interest_reject_id" value="">
                        <p class="mt-1">{{translate('Are you sure you want to rejet his interest?')}}</p>
                        <button type="button" class="btn btn-danger cancel mt-2" data-dismiss="modal">{{translate('Cancel')}}</button>
                        <button type="submit" class="btn btn-info mt-2">{{translate('Confirm')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
 <script>
	  $(document).ready(function() {
  
  // required elements
  var imgPopup = $('.img-popup');
  var imgCont  = $('.container__img-holder');
  var popupImage = $('.img-popup img');
  var closeBtn = $('.close-btn');
  
  // handle events
  imgCont.on('click', function() {
	var img_src = $(this).children('img').attr('src');
	imgPopup.children('img').attr('src', img_src);
	imgPopup.addClass('opened');
  });
  
  $(imgPopup, closeBtn).on('click', function() {
	imgPopup.removeClass('opened');
	imgPopup.children('img').attr('src', '');
  });
  
  popupImage.on('click', function(e) {
	e.stopPropagation();
  });
  
  });
  </script>
<script type="text/javascript">

    function accept_interest(id) {
        $('.interest_accept_modal').modal('show');
        $('#interest_accept_id').val(id);
    }

    function reject_interest(id) {
        $('.interest_reject_modal').modal('show');
        $('#interest_reject_id').val(id);
    }

</script>
<script>
    $(".cancel").click(function(){
        $(".fade").hide();
    });
     $(".cancel").click(function(){
        $("#fade1").hide();
    })
</script>
@endsection
