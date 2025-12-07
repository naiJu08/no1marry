@extends('frontend.layouts.app')
@section('content')
<style>
#badge-profile
{
    /*width: 100px !important;*/
    padding: 7%;
    height: 100%;
}

    #fluid
    {
        z-index:88;
    }
      #usermenu-nav
{
       display:none;
    position: absolute;
    will-change: transform;
    top: 0px;
    left: -50%;
    transform: translate3d(-27px, 47px, 0px);
}
.la-2x
{
    font-size:2rem;
}
.la-3x
{
    font-size:3rem;
}
.la-4x
{
    font-size:4rem;
}
.active_member
{
    font-size:20px;
}
 #search {
    box-shadow: 0px 0px 3px #000;
    border-radius:10px;
}
.btn-icon
{
        background: #7a3244;
}
span.search-text {
 
    justify-content: center;
    justify-items: center;
    float: none;
    display: flex;
    color: #ffffff;
    font-weight: 600;
}
@media only screen 
  and (min-device-width: 210px) 
  and (max-device-width:320px)
{

 #search {
    box-shadow: 0px 0px 3px #000;
    margin-top:-10% !important;
}

}
@media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 480px)
{
 #search{
    box-shadow: 0px 0px 3px #000;
    margin-top:-10% !important;
}
}
@media only screen 
  and (min-device-width:480px) 
  and (max-device-width:620px)
{
     #search {
    box-shadow: 0px 0px 3px #000;
    margin-top:-10% !important;
}
}
@media only screen 
  and (min-device-width:620px) 
  and (max-device-width:720px)
  {
  #search {
    box-shadow: 0px 0px 3px #000;
    margin-top:-10% !important;
}
  }
@media only screen 
  and (min-device-width:720px) 
  and (max-device-width:820px)
  {

    #search {
    box-shadow: 0px 0px 3px #000;
    margin-top:-10% !important;
}
}
@media only screen 
  and (min-device-width:820px) 
  and (max-device-width:1200px)
  {
  #search {
    box-shadow: 0px 0px 3px #000;
    margin-top:-10% !important;





}
}

.cta {
  appearance: none;
  border: none;
  outline: none;
  cursor: pointer;
  display: inline-flex;
  background-color: #212631;
  font: 500 14px/20px 'Inter', Arial;
  letter-spacing: .25px;
  color: #fff;
  border-radius: 6px;
  padding: 2px 2px 2px 52px;
  margin: 0;
  position: relative;
  width: 100%;
  
  .arrow {
    position: absolute;
    left: 2px;
    top: 2px;
    width: 70px;
    height: 36px;
    border-radius: 4px;
    background: linear-gradient(180deg, rgba(255, 255, 255, 0.32) 0%, rgba(255, 255, 255, 0) 77.51%), #D2FF00;
    box-shadow: 0px 1px 1px -0.5px rgba(11, 21, 34, 0.24), 0px 3px 3px -1.5px rgba(11, 21, 34, 0.24), 0px 6px 6px -3px rgba(11, 21, 34, 0.24), 0px 12px 12px -6px rgba(11, 21, 34, 0.32), 0px 24px 24px -12px rgba(11, 21, 34, 0.24), 0px 32px 32px -16px rgba(11, 21, 34, 0.24), 0px 0.5px 0.5px 0px rgba(255, 255, 255, 0.40) inset, 0px 1px 2px 0px rgba(255, 255, 255, 0.32) inset;
    transition: width .3s;

    div {
      position: absolute;
      width: 100%;
      height: 16px;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      mask-image: linear-gradient(to right, transparent 12px, black 18px, black calc(100% - 18px), transparent calc(100% - 12px));

      &:before,
      &:after {
        content: '';
        position: absolute;
        inset: 0;
      }

      &:before {
        background: 
          linear-gradient(to right, 
            rgba(13, 21, 33, 0.02) 0.405%, 
            rgba(13, 21, 33, 0.12) 1.61%, 
            rgba(32, 38, 50, 0.26) 8.005%, 
            rgba(13, 21, 33, 0.33) 9.2%, 
            rgba(46, 52, 62, 0.28) 15.61%, 
            rgba(13, 21, 33, 0.56) 16.805%, 
            rgba(13, 21, 33, 0.84) 23.2%, 
            rgba(32, 38, 50, 0.87) 24.4%, 
            rgba(13, 21, 33, 0.75) 30.815%, 
            rgba(13, 21, 33, 0.69) 31.995%, 
            rgba(32, 38, 50, 0.42) 38.39%, 
            rgba(13, 21, 33, 0.34) 39.59%, 
            rgba(32, 38, 50, 0.29) 46%, 
            rgba(32, 38, 50, 0.26) 47.19%, 
            rgba(13, 21, 33, 0.02) 50%,
            rgba(13, 21, 33, 0.02) 50.405%, 
            rgba(13, 21, 33, 0.12) 51.61%, 
            rgba(32, 38, 50, 0.26) 58.005%, 
            rgba(13, 21, 33, 0.33) 59.2%, 
            rgba(46, 52, 62, 0.28) 65.61%, 
            rgba(13, 21, 33, 0.56) 66.805%, 
            rgba(13, 21, 33, 0.84) 73.2%, 
            rgba(32, 38, 50, 0.87) 74.4%, 
            rgba(13, 21, 33, 0.75) 80.815%, 
            rgba(13, 21, 33, 0.69) 81.995%, 
            rgba(32, 38, 50, 0.42) 88.39%, 
            rgba(13, 21, 33, 0.34) 89.59%, 
            rgba(32, 38, 50, 0.29) 96%, 
            rgba(32, 38, 50, 0.26) 97.19%, 
            rgba(13, 21, 33, 0.02) 100%)
          0 1px/200% 2px repeat-x,
          linear-gradient(to right, 
            rgba(13, 21, 33, 0.02) 0.405%, 
            rgba(13, 21, 33, 0.12) 1.61%, 
            rgba(32, 38, 50, 0.26) 8.005%, 
            rgba(13, 21, 33, 0.33) 9.2%, 
            rgba(46, 52, 62, 0.28) 15.61%, 
            rgba(13, 21, 33, 0.56) 16.805%, 
            rgba(13, 21, 33, 0.84) 23.2%, 
            rgba(32, 38, 50, 0.87) 24.4%, 
            rgba(13, 21, 33, 0.75) 30.815%, 
            rgba(13, 21, 33, 0.69) 31.995%, 
            rgba(32, 38, 50, 0.42) 38.39%, 
            rgba(13, 21, 33, 0.34) 39.59%, 
            rgba(32, 38, 50, 0.29) 46%, 
            rgba(32, 38, 50, 0.26) 47.19%, 
            rgba(13, 21, 33, 0.02) 50%,
            rgba(13, 21, 33, 0.02) 50.405%, 
            rgba(13, 21, 33, 0.12) 51.61%, 
            rgba(32, 38, 50, 0.26) 58.005%, 
            rgba(13, 21, 33, 0.33) 59.2%, 
            rgba(46, 52, 62, 0.28) 65.61%, 
            rgba(13, 21, 33, 0.56) 66.805%, 
            rgba(13, 21, 33, 0.84) 73.2%, 
            rgba(32, 38, 50, 0.87) 74.4%, 
            rgba(13, 21, 33, 0.75) 80.815%, 
            rgba(13, 21, 33, 0.69) 81.995%, 
            rgba(32, 38, 50, 0.42) 88.39%, 
            rgba(13, 21, 33, 0.34) 89.59%, 
            rgba(32, 38, 50, 0.29) 96%, 
            rgba(32, 38, 50, 0.26) 97.19%, 
            rgba(13, 21, 33, 0.02) 100%)
          0 13px/200% 2px repeat-x,
          linear-gradient(90deg, 
            rgba(13, 21, 33, 0.02) 0%, 
            rgba(13, 21, 33, 0.16) 1.595%, 
            rgba(32, 38, 50, 0.22) 2.79%, 
            rgba(13, 21, 33, 0.35) 9.195%, 
            rgba(32, 38, 50, 0.42) 10.415%, 
            rgba(12, 26, 33, 0.58) 16.795%, 
            rgba(32, 38, 50, 0.67) 18.01%, 
            rgba(32, 38, 50, 0.87) 24.405%, 
            rgba(13, 21, 33, 0.95) 25.59%, 
            rgba(13, 21, 33, 0.55) 31.99%, 
            rgba(32, 38, 50, 0.46) 33.19%, 
            rgba(13, 21, 33, 0.32) 39.595%, 
            rgba(13, 21, 33, 0.23) 40.805%, 
            rgba(32, 38, 50, 0.22) 47.21%, 
            rgba(13, 21, 33, 0.20) 48.38%, 
            rgba(13, 21, 33, 0.02) 50%,
            rgba(13, 21, 33, 0.16) 51.595%, 
            rgba(32, 38, 50, 0.22) 52.79%,
            rgba(13, 21, 33, 0.35) 59.195%,
            rgba(32, 38, 50, 0.42) 60.415%,
            rgba(12, 26, 33, 0.58) 66.795%,
            rgba(32, 38, 50, 0.67) 68.01%,
            rgba(32, 38, 50, 0.87) 74.405%,
            rgba(13, 21, 33, 0.95) 75.59%,
            rgba(13, 21, 33, 0.55) 81.99%,
            rgba(32, 38, 50, 0.46) 83.19%,
            rgba(13, 21, 33, 0.32) 89.595%,
            rgba(13, 21, 33, 0.23) 90.805%,
            rgba(32, 38, 50, 0.22) 97.21%,
            rgba(13, 21, 33, 0.20) 98.38%,
            rgba(13, 21, 33, 0.02) 100%)
          0 4px/200% 2px repeat-x,
          linear-gradient(90deg, 
            rgba(13, 21, 33, 0.02) 0%, 
            rgba(13, 21, 33, 0.16) 1.595%, 
            rgba(32, 38, 50, 0.22) 2.79%, 
            rgba(13, 21, 33, 0.35) 9.195%, 
            rgba(32, 38, 50, 0.42) 10.415%, 
            rgba(12, 26, 33, 0.58) 16.795%, 
            rgba(32, 38, 50, 0.67) 18.01%, 
            rgba(32, 38, 50, 0.87) 24.405%, 
            rgba(13, 21, 33, 0.95) 25.59%, 
            rgba(13, 21, 33, 0.55) 31.99%, 
            rgba(32, 38, 50, 0.46) 33.19%, 
            rgba(13, 21, 33, 0.32) 39.595%, 
            rgba(13, 21, 33, 0.23) 40.805%, 
            rgba(32, 38, 50, 0.22) 47.21%, 
            rgba(13, 21, 33, 0.20) 48.38%, 
            rgba(13, 21, 33, 0.02) 50%,
            rgba(13, 21, 33, 0.16) 51.595%, 
            rgba(32, 38, 50, 0.22) 52.79%,
            rgba(13, 21, 33, 0.35) 59.195%,
            rgba(32, 38, 50, 0.42) 60.415%,
            rgba(12, 26, 33, 0.58) 66.795%,
            rgba(32, 38, 50, 0.67) 68.01%,
            rgba(32, 38, 50, 0.87) 74.405%,
            rgba(13, 21, 33, 0.95) 75.59%,
            rgba(13, 21, 33, 0.55) 81.99%,
            rgba(32, 38, 50, 0.46) 83.19%,
            rgba(13, 21, 33, 0.32) 89.595%,
            rgba(13, 21, 33, 0.23) 90.805%,
            rgba(32, 38, 50, 0.22) 97.21%,
            rgba(13, 21, 33, 0.20) 98.38%,
            rgba(13, 21, 33, 0.02) 100%)
          0 10px/200% 2px repeat-x,
          linear-gradient(90deg, 
            rgba(13, 21, 33, 0.05) 0%, 
            rgba(13, 21, 33, 0.28) 2.79%, 
            rgba(32, 38, 50, 0.29) 4%, 
            rgba(13, 21, 33, 0.48) 10.4%, 
            rgba(32, 38, 50, 0.49) 11.61%, 
            rgba(13, 21, 33, 0.68) 17.995%, 
            rgba(32, 38, 50, 0.76) 19.19%, 
            #202632 25.595%, 
            #202632 26.8%, 
            rgba(32, 38, 50, 0.40) 33.22%, 
            rgba(32, 38, 50, 0.40) 34.42%, 
            rgba(32, 38, 50, 0.22) 40.8%, 
            rgba(32, 38, 50, 0.22) 42%, 
            rgba(13, 21, 33, 0.08) 48.405%, 
            rgba(13, 21, 33, 0.05) 49.62%,
            rgba(13, 21, 33, 0.05) 50%, 
            rgba(13, 21, 33, 0.28) 52.79%, 
            rgba(32, 38, 50, 0.29) 54%, 
            rgba(13, 21, 33, 0.48) 60.4%, 
            rgba(32, 38, 50, 0.49) 61.61%, 
            rgba(13, 21, 33, 0.68) 67.995%, 
            rgba(32, 38, 50, 0.76) 69.19%, 
            #202632 75.595%, 
            #202632 76.8%, 
            rgba(32, 38, 50, 0.40) 83.22%, 
            rgba(32, 38, 50, 0.40) 84.42%, 
            rgba(32, 38, 50, 0.22) 90.8%, 
            rgba(32, 38, 50, 0.22) 92%, 
            rgba(13, 21, 33, 0.08) 98.405%, 
            rgba(13, 21, 33, 0.05) 99.62%)
          0 center/200% 2px repeat-x;
        background-position-x: 100%;
        animation: move-right 2s linear infinite;
        -webkit-mask-image: url('https://assets.codepen.io/165585/arrow-dots.svg');
        mask-image: url('https://assets.codepen.io/165585/arrow-dots.svg');
        mask-position: center center;
      }

      &:after {
        background-image: url("https://assets.codepen.io/165585/arrow-dots.svg");
        -webkit-mask-image: url('https://assets.codepen.io/165585/arrow-dots-mask.svg');
        mask-image: url('https://assets.codepen.io/165585/arrow-dots-mask.svg');
        mask-position: center center;
        background-position: center center;
        filter: drop-shadow(0 .5px .5px rgba(255, 255, 255, .5)) drop-shadow(0 .25px .75px rgba(255, 255, 255, .5));
      }
    }
  }

  .label {
    display: block;
    padding: 6px 0;
    width: 250px;
    color: #fff;
    font-weight: 800;
  font: 800 20px/24px 'Inter', Arial;
    
  }

  &:focus-visible,
  &:hover {
    .arrow {
      width: 100%;
    }
  }
}

@keyframes move-right {
  from {
    background-position-x: 100%;
  }
  to {
    background-position-x: 0%;
  }
}

*,
*:before,
*:after {
  box-sizing: border-box;
}

    .blur {
        filter: blur(7px);
        transition: filter 0.3s ease;
    }


</style>
<style>
  /* Responsive card grid: auto-fill while targeting ~4 on xl */
  .card-grid{display:grid;grid-template-columns:repeat(auto-fill, minmax(260px, 1fr));gap:1rem;width:100% !important;max-width:none !important;margin:0 !important}
  @media (min-width:1200px){.card-grid{grid-template-columns:repeat(4, minmax(0,1fr))}}
  /* Ensure cards stretch properly */
  .member-card{width:100% !important; max-width:none !important; margin:0 !important; display:flex; flex-direction:column}
  .card-grid > .member-card{margin:0 !important}
  .member-card__photo img{width:100%; height:auto; display:block}
  .member-card__body{flex:1 1 auto}
  /* Responsive sizing for CTA */
  @media (max-width: 575.98px){
    .member-card__cta .cta{padding:2px 2px 2px 44px;}
    .member-card__cta .cta .arrow{width:56px;height:32px}
    .member-card__cta .label{font:600 13px/18px 'Inter', Arial;padding:4px 0}
  }
  @media (min-width:576px) and (max-width: 991.98px){
    .member-card__cta .cta{padding:2px 2px 2px 48px;}
    .member-card__cta .cta .arrow{width:64px;height:34px}
    .member-card__cta .label{font:600 14px/20px 'Inter', Arial;padding:5px 0}
  }
  @media (min-width:992px){
    .member-card__cta .cta{padding:2px 2px 2px 52px;}
    .member-card__cta .cta .arrow{width:70px;height:36px}
    .member-card__cta .label{font:600 14px/20px 'Inter', Arial;padding:6px 0}
  }
</style>
<section class="glass-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="glass-surface p-3 rounded mb-3">
                    <div class="d-flex align-items-center flex-wrap">
                        <h1 class="active_member fw-600 mb-0 mr-3 text-body">{{ translate('All Active Members') }}</h1>
                        <div class="ml-auto d-flex align-items-center flex-wrap">
                            <span class="chip mr-2">{{ translate('Showing') }} {{ $users->firstItem() ?? 0 }}–{{ $users->lastItem() ?? 0 }} {{ translate('of') }} {{ $users->total() }}</span>
                            <button id="moreFiltersToggle" class="btn btn-sm btn-primary btn-glass d-inline-flex align-items-center justify-content-center" type="button" aria-expanded="false" aria-controls="moreFilters" aria-label="{{ translate('Filters') }}" title="{{ translate('Filters') }}">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 6H20M6 12H18M10 18H14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('member.listing') }}" method="get" class="mt-3 filter-bar">
                        <div class="filter-bar__grid">
                            <div class="filter-bar__field filter-bar__field--sm3">
                                <label>{{ translate('Age From') }}</label>
                                <div class="input-icon">
                                    <i class="las la-hourglass-start"></i>
                                    <input type="number" name="age_from" value="{{ $age_from }}" class="glass-input" min="0">
                                </div>
                            </div>
                            <div class="filter-bar__field filter-bar__field--sm3">
                                <label>{{ translate('Age To') }}</label>
                                <div class="input-icon">
                                    <i class="las la-hourglass-end"></i>
                                    <input type="number" name="age_to" value="{{ $age_to }}" class="glass-input" min="0">
                                </div>
                            </div>
                            <div class="filter-bar__field filter-bar__field--sm2">
                                <label>{{ translate('Religion') }}</label>
                                @php $religions = \App\Models\Religion::all(); @endphp
                                <div class="input-icon">
                                    <i class="las la-praying-hands"></i>
                                    <select name="religion_id" id="religion_id" class="glass-input">
                                        <option value="">{{ translate('Choose One') }}</option>
                                        @foreach ($religions as $religion)
                                            <option value="{{ $religion->id }}" @if($religion->id == $religion_id) selected @endif>{{ $religion->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="filter-bar__field filter-bar__field--sm2">
                                <label>{{ translate('Caste') }}</label>
                                <div class="input-icon">
                                    <i class="las la-stream"></i>
                                    <select name="caste_id" id="caste_id" class="glass-input">
                                        <option value="">{{ translate('Select One') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="filter-bar__field filter-bar__field--sm2">
                                <label>{{ translate('Member Type') }}</label>
                                <div class="input-icon">
                                    <i class="las la-gem"></i>
                                    <select name="member_type" class="glass-input">
                                        <option value="0" @if($member_type == 0) selected @endif>{{ translate('All Member') }}</option>
                                        <option value="2" @if($member_type == 2) selected @endif>{{ translate('Premium Member') }}</option>
                                        <option value="1" @if($member_type == 1) selected @endif>{{ translate('Free member') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="filter-bar__actions mt-2">
                            <a href="{{ route('member.listing') }}" class="filter-reset">{{ translate('Clear filters') }}</a>
                            <button type="submit" class="btn btn-primary btn-glass">{{ translate('Search') }}</button>
                        </div>
                        <div id="moreFilters" class="collapse mt-3">
                            @include('frontend.member.member_listing.advanced_search')
                        </div>
                    </form>
                </div>
                <div class="card-grid mb-4">
                            @foreach ($users as $key => $user)
                                @php
                                    $profile_picture_show = 'ok';
                                    $profile_picture_privacy = $user->member->profile_picture_privacy;
                                    if($profile_picture_privacy == '0') {
                                        $profile_picture_show = 'no';
                                    } elseif($profile_picture_privacy == 2 && Auth::user()->membership == 1) {
                                        $profile_picture_show = 'no';
                                    }
                                    $should_blur = !in_array(Auth::user()->membership, [2, 4]);
                                    $is_premium = $user->membership == 2;
                                @endphp
                                <div class="member-card glass-card" id="block_id_{{ $user->id }}">
                                    <div class="member-card__photo">
                                        <a
                                            @if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1)
                                                href="javascript:void(0);" onclick="package_update_alert()"
                                            @else
                                                href="{{ route('member_profile', $user->id) }}"
                                            @endif
                                            class="d-block">
                                            <img
                                                @if($profile_picture_show == 'ok')
                                                    src="{{ uploaded_asset($user->photo) }}"
                                                @else
                                                    src="{{ uploaded_asset($user->photo) }}"
                                                @endif
                                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"
                                                class="card-photo {{ $should_blur ? 'blur' : '' }}"
                                                alt="no.1marry">
                                        </a>
                                        <span class="member-card__badge {{ $is_premium ? 'member-card__premium' : '' }}">NO1#{{ $user->code }}</span>
                                    </div>
                                    <div class="member-card__body">
                                        <h2 class="member-card__name text-truncate">{{ $user->first_name.' '.$user->last_name }}</h2>
                                        <div class="member-card__meta">
                                            <span class="chip"><i class="las la-birthday-cake mr-1"></i>{{ \Carbon\Carbon::parse($user->member->birthday)->age }} {{ translate('yrs') }}</span>
                                            @if(!empty($user->physical_attributes->height))
                                                <span class="chip"><i class="las la-ruler-vertical mr-1"></i>{{ $user->physical_attributes->height }}</span>
                                            @endif
                                            @php
                                                $present_address = \App\Models\Address::where('type','present')->where('user_id', $user->id)->first();
                                            @endphp
                                            @if(!empty($present_address?->city?->name))
                                                <span class="chip"><i class="las la-map-marker mr-1"></i>{{ $present_address->city->name }}</span>
                                            @endif
                                        </div>
                                        <div class="member-card__meta member-card__meta--details">
                                            @if(!empty($user->spiritual_backgrounds->religion_id))
                                                <span class="chip">{{ $user->spiritual_backgrounds->religion->name }}</span>
                                            @endif
                                            @if(!empty($user->spiritual_backgrounds->caste_id))
                                                <span class="chip">{{ $user->spiritual_backgrounds->caste->name }}</span>
                                            @endif
                                            @if($user->member->mothere_tongue != null)
                                                @php $motherTongue = \App\Models\MemberLanguage::where('id',$user->member->mothere_tongue)->first(); @endphp
                                                @if(!empty($motherTongue))
                                                    <span class="chip">{{ $motherTongue->name }}</span>
                                                @endif
                                            @endif
                                            @if($user->member->marital_status_id != null)
                                                <span class="chip">{{ $user->member->marital_status->name }}</span>
                                            @endif
                                        </div>
                                        <div class="member-card__actions">
                                            @php
                                                $interest_class    = "text-primary";
                                                $do_expressed_interest = \App\Models\ExpressInterest::where('user_id', $user->id)->where('interested_by',Auth::user()->id)->first();
                                                $received_expressed_interest = \App\Models\ExpressInterest::where('user_id', Auth::user()->id)->where('interested_by',$user->id)->first();
                                                if(empty($do_expressed_interest) && empty($received_expressed_interest)) {
                                                    $interest_onclick  = 1;
                                                    $interest_text     = translate('Interest');
                                                    $interest_class    = "text-dark";
                                                } elseif(!empty($received_expressed_interest)) {
                                                    $interest_onclick  = 'do_response';
                                                    $interest_text     = $received_expressed_interest->status == 0 ? translate('Response to Interest') : translate('You Accepted Interest');
                                                } else {
                                                    $interest_onclick  = 0;
                                                    $interest_text     = $do_expressed_interest->status == 0 ? translate('Interest Expressed') : translate('Interest Accepted');
                                                }
                                                $shortlist = \App\Models\Shortlist::where('user_id', $user->id)->where('shortlisted_by',Auth::user()->id)->first();
                                                if(empty($shortlist)){
                                                    $shortlist_onclick  = 1;
                                                    $shortlist_text     = translate('Shortlist');
                                                    $shortlist_class    = "text-dark";
                                                } else {
                                                    $shortlist_onclick  = 0;
                                                    $shortlist_text     = translate('Shortlisted');
                                                    $shortlist_class    = "text-primary";
                                                }
                                                $profile_reported = \App\Models\ReportedUser::where('user_id', $user->id)->where('reported_by',Auth::user()->id)->first();
                                                if(empty($profile_reported)){
                                                    $report_onclick  = 1;
                                                    $report_text     = translate('Report');
                                                    $report_class    = "text-dark";
                                                } else {
                                                    $report_onclick  = 0;
                                                    $report_text     = translate('Reported');
                                                    $report_class    = "text-primary";
                                                }
                                            @endphp
                                            <a id="interest_a_id_{{ $user->id }}"
                                                @if($interest_onclick == 1)
                                                    onclick="express_interest({{ $user->id }})"
                                                @elseif($interest_onclick == 'do_response')
                                                    href="{{ route('interest_requests') }}"
                                                @endif
                                                class="text-reset c-pointer"
                                            >
                                                <i class="la la-heart"></i>
                                                <span id="interest_id_{{ $user->id }}" class="d-block fs-10 opacity-60 {{ $interest_class }}">
                                                    {{ $interest_text }}
                                                </span>
                                            </a>
                                            <a id="shortlist_a_id_{{ $user->id }}"
                                                @if($shortlist_onclick == 1)
                                                    onclick="do_shortlist({{ $user->id }})"
                                                @else
                                                    onclick="remove_shortlist({{ $user->id }})"
                                                @endif
                                                class="text-reset c-pointer"
                                            >
                                                <i class="las la-bookmark"></i>
                                                <span id="shortlist_id_{{ $user->id }}" class="d-block fs-10 opacity-60 {{ $shortlist_class }}">
                                                    {{ $shortlist_text }}
                                                </span>
                                            </a>
                                            <a onclick="ignore_member({{ $user->id }})" class="text-reset c-pointer">
                                                <i class="las la-eye-slash"></i>
                                                <span class="d-block fs-10 opacity-60 text-dark">{{ translate('Ignore') }}</span>
                                            </a>
                                            <a id="report_a_id_{{ $user->id }}"
                                                @if($report_onclick == 1)
                                                    onclick="report_member({{ $user->id }})"
                                                @endif
                                                class="text-reset c-pointer"
                                            >
                                                <i class="las la-flag"></i>
                                                <span id="report_id_{{ $user->id }}" class="d-block fs-10 opacity-60 {{ $report_class }}">
                                                    {{ $report_text }}
                                                </span>
                                            </a>
                                        </div>
                                        <div class="member-card__cta">
                                            <button class="cta" onclick="window.location.href='{{ route('member_profile', $user->id) }}'">
                                                <span class="label">{{ translate('View Full Profile') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                </div>
                <div class="glass-pagination-wrapper">
                    @php $paginator = $users->appends(request()->input()); @endphp
                    @if ($paginator->hasPages())
                        <div class="glass-pagination glass-pagination--buttons">
                            <a href="{{ $paginator->onFirstPage() ? 'javascript:void(0);' : $paginator->previousPageUrl() }}"
                               class="glass-page-btn {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                                <span class="glass-page-btn__icon"><i class="las la-arrow-left"></i></span>
                                <span class="glass-page-btn__label">{{ translate('Previous') }}</span>
                            </a>
                            <a href="{{ $paginator->hasMorePages() ? $paginator->nextPageUrl() : 'javascript:void(0);' }}"
                               class="glass-page-btn {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                                <span class="glass-page-btn__label">{{ translate('Next') }}</span>
                                <span class="glass-page-btn__icon"><i class="las la-arrow-right"></i></span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('modal')
    @include('modals.package_update_alert_modal')
    @include('modals.confirm_modal')

    <!-- Ignore Modal -->
    <div class="modal fade ignore_member_modal" id="modal-ignore">
    	<div class="modal-dialog modal-dialog-centered modal-dialog-zoom">
    		<div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h6">{{translate('Ignore Member!')}}</h5>
                    <button type="button" class="close" onclick="closeignore()"></button>
                </div>
                <div class="modal-body">
                    <p>{{ translate('Are you sure that you want to ignore this member?') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeignore()">{{ translate('Close') }}</button>
                    <button type="submit" class="btn btn-primary" id="ignore_button">{{translate('Ignore')}}</button>
                </div>
        	</div>
    	</div>
    </div>

    <!-- Report Profile -->
    <div class="modal fade report_modal" id="modal-report">
    	<div class="modal-dialog modal-dialog-centered modal-dialog-zoom">
    		<div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h6">{{translate('Report Member!')}}</h5>
                    <button type="button" class="close" onclick="closereport()"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reportusers.store') }}" id="report-modal-form" method="POST">
                        @csrf
                        <input type="hidden" name="member_id" id="member_id" value="">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{translate('Report Reason')}}<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea name="reason" rows="4" class="form-control" placeholder="{{translate('Report Reason')}}" required></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closereport()">{{ translate('Cancel') }}</button>
                    <button type="button" class="btn btn-primary" onclick="submitReport()">{{ translate('Report') }}</button>
                </div>
          	</div>
    	</div>
    </div>

@endsection

@section('script')

<script>
    function closeignore() {
      $('#modal-ignore').modal('hide');
    }
    document.getElementById('closeButton').addEventListener('click', closePopup)
  </script>
  <script>
    function closereport() {
      $('#modal-report').modal('hide');
    }
    document.getElementById('closeButton').addEventListener('click', closePopup)
  </script>
<script type="text/javascript">



    $(document).ready(function(){
       // Toggle advanced filters panel
       $('#moreFiltersToggle').on('click', function () {
           var $target = $('#moreFilters');
           var isShown = $target.hasClass('show');

           if (isShown) {
               $target.collapse('hide');
               $(this).attr('aria-expanded', 'false');
           } else {
               $target.collapse('show');
               $(this).attr('aria-expanded', 'true');
           }
       });

       get_castes_by_religion();
       get_sub_castes_by_caste();
       get_states_by_country();
       get_cities_by_state()
    });

    // Get Castes and Subcastes
    function get_castes_by_religion(){
      var religion_id = $('#religion_id').val();
      $.post('{{ route('castes.get_caste_by_religion') }}',{_token:'{{ csrf_token() }}', religion_id:religion_id}, function(data){
          $('#caste_id').html(null);
          $('#caste_id').append($('<option>', {
              value: '',
              text: 'Choose One'
          }));
          for (var i = 0; i < data.length; i++) {
              $('#caste_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
          }
          $("#caste_id > option").each(function() {
              if(this.value == '{{ $caste_id }}'){
                  $("#caste_id").val(this.value).change();
              }
          });
          AIZ.plugins.bootstrapSelect('refresh');

          get_sub_castes_by_caste();
      });
    }

    function get_sub_castes_by_caste(){
      var caste_id = $('#caste_id').val();
      $.post('{{ route('sub_castes.get_sub_castes_by_religion') }}',{_token:'{{ csrf_token() }}', caste_id:caste_id}, function(data){
          $('#sub_caste_id').html(null);
          $('#sub_caste_id').append($('<option>', {
              value: '',
              text: 'Choose One'
          }));
          for (var i = 0; i < data.length; i++) {
              $('#sub_caste_id').append($('<option>', {
                  value: data[i].id,
                  text: data[i].name
              }));
          }
          $("#sub_caste_id > option").each(function() {
              if(this.value == '{{ $sub_caste_id }}'){
                  $("#sub_caste_id").val(this.value).change();
              }
          });
          AIZ.plugins.bootstrapSelect('refresh');
      });
    }

    $('#religion_id').on('change', function() {
      get_castes_by_religion();
    });

    $('#caste_id').on('change', function() {
      get_sub_castes_by_caste();
    });

    // Get Countries and States
    function get_states_by_country(){
      var country_id = $('#country_id').val();
          $.post('{{ route('states.get_state_by_country') }}',{_token:'{{ csrf_token() }}', country_id:country_id}, function(data){
              $('#state_id').html(null);
              $('#state_id').append($('<option>', {
                  value: '',
                  text: 'Choose One'
              }));
              for (var i = 0; i < data.length; i++) {
                  $('#state_id').append($('<option>', {
                      value: data[i].id,
                      text: data[i].name
                  }));
              }
              $("#state_id > option").each(function() {
                  if(this.value == '{{ $state_id }}'){
                      $("#state_id").val(this.value).change();
                  }
              });

              AIZ.plugins.bootstrapSelect('refresh');

              get_cities_by_state();
          });
    }

    function get_cities_by_state(){
      var state_id = $('#state_id').val();
          $.post('{{ route('cities.get_cities_by_state') }}',{_token:'{{ csrf_token() }}', state_id:state_id}, function(data){
              $('#city_id').html(null);
              $('#city_id').append($('<option>', {
                  value: '',
                  text: 'Choose One'
              }));
              for (var i = 0; i < data.length; i++) {
                  $('#city_id').append($('<option>', {
                      value: data[i].id,
                      text: data[i].name
                  }));
              }
              $("#city_id > option").each(function() {
                  if(this.value == '{{ $city_id }}'){
                      $("#city_id").val(this.value).change();
                  }
              });
              AIZ.plugins.bootstrapSelect('refresh');
          });
    }

    $('#country_id').on('change', function() {
      get_states_by_country();
    });

    $('#state_id').on('change', function() {
      get_cities_by_state();
    });

    // Full Profile view
    function package_update_alert(){
      $('.package_update_alert_modal').modal('show');
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
          $("#confirm_modal_title").html("{{ translate('Confirm Express Interest!') }}");
          $("#confirm_modal_content").html("<p class='fs-14'>{{translate('Remaining Express Interest')}}: "+remaining_interest+" {{translate('Times')}}</p><small class='text-danger'>{{translate('**N.B. Expressing An Interest Will Cost 1 From Your Remaining Interests**')}}</small>");
          $("#confirm_button").attr("onclick","do_express_interest("+id+")");
        }
    }

    function do_express_interest(id)
    {
        $("#interest_a_id_"+id).removeAttr("onclick");
        $("#interest_id_"+id).html("{{ translate('Processing') }}..");
        $.post('{{ route('express-interest.store') }}',
          {
            _token: '{{ csrf_token() }}',
            id: id
          },
          function (data) {
              // console.log(data);
            if (data == 1) {
              $('.confirm_modal').modal('toggle');
              $("#interest_id_"+id).html("{{translate('Interest Expressed')}}");
              $("#interest_id_"+id).attr("class","d-block fs-10 opacity-60 text-primary");
              AIZ.plugins.notify('success', '{{translate('Interest Expressed Sucessfully')}}');
            }
            else {
                $("#interest_id_"+id).html("{{translate('Interest')}}");
                AIZ.plugins.notify('danger', '{{translate('Something went wrong')}}');
            }
          }
        );
    }

    // Shortlist
    function do_shortlist(id){
        $("#shortlist_a_id_"+id).removeAttr("onclick");
        $("#shortlist_id_"+id).html("{{ translate('Shortlisting') }}..");
        $.post('{{ route('member.add_to_shortlist') }}',
          {
            _token: '{{ csrf_token() }}',
            id: id
          },
          function (data) {
            if (data == 1) {
              $("#shortlist_id_"+id).html("{{translate('Shortlisted')}}");
              $("#shortlist_id_"+id).attr("class","d-block fs-10 opacity-60 text-primary");
              $("#shortlist_a_id_"+id).attr("onclick","remove_shortlist("+id+")");
              AIZ.plugins.notify('success', '{{translate('You Have Shortlisted This Member.')}}');
            }
            else {
                $("#shortlist_id_"+id).html("{{translate('Shortlist')}}");
                AIZ.plugins.notify('danger', '{{translate('Something went wrong')}}');
            }
          }
        );
    }

    function remove_shortlist(id) {
        $("#shortlist_a_id_"+id).removeAttr("onclick");
        $("#shortlist_id_"+id).html("{{ translate('Removing') }}..");
        $.post('{{ route('member.remove_from_shortlist') }}',
          {
            _token: '{{ csrf_token() }}',
            id: id
          },
          function (data) {
            if (data == 1) {
              $("#shortlist_id_"+id).html("{{translate('Shortlist')}}");
              $("#shortlist_id_"+id).attr("class","d-block fs-10 opacity-60 text-dark");
              $("#shortlist_a_id_"+id).attr("onclick","do_shortlist("+id+")");
              AIZ.plugins.notify('success', '{{translate('You Have Removed This Member From Your Shortlist.')}}');
            }
            else {
              AIZ.plugins.notify('danger', '{{translate('Something went wrong')}}');
            }
          }
        );
      }

    // Ignore
    function ignore_member(id) {
        $('.ignore_member_modal').modal('show');
        $("#ignore_button").attr("onclick","do_ignore("+id+")");
    }

    function do_ignore(id) {
        $.post('{{ route('member.add_to_ignore_list') }}',
            {
            _token: '{{ csrf_token() }}',
            id: id
            },
            function (data) {
                if (data == 1) {
                    $("#block_id_"+id).hide();
                    $('.ignore_member_modal').modal('toggle');
                    AIZ.plugins.notify('success', '{{translate('You Have Ignored This Member.')}}');
                }
                else {
                    AIZ.plugins.notify('danger', '{{translate('Something went wrong')}}');
                }
            }
        );
    }

    function report_member(id) {
        $('.report_modal').modal('show');
        $('#member_id').val(id);
    }

    function submitReport(){
        $('#report-modal-form').submit();
    }

</script>

@endsection
