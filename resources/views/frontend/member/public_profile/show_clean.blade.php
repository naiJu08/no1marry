@extends('frontend.layouts.app')
@section('content')
<style>
    .pp-wrapper {
        max-width: 1200px;
        width: min(80%, 1200px);
        margin: 0 auto;
    }
    .pp-hero {
        margin-top: 2.5rem;
        margin-bottom: 1.5rem;
        border-radius: 24px;
        padding: 1.75rem 2rem;
        background: radial-gradient(circle at 0% 0%, rgba(255,255,255,0.20), transparent 55%),
                    radial-gradient(circle at 100% 0%, rgba(255,255,255,0.08), transparent 55%),
                    linear-gradient(135deg, #f6ecff, #f5fbff);
        box-shadow: 0 18px 38px rgba(15, 10, 43, 0.12);
    }
    .pp-hero-main {
        display: flex;
        gap: 1.5rem;
        align-items: center;
        flex-wrap: wrap;
    }
    .pp-avatar {
        width: 150px;
        height: 150px;
        border-radius: 32px;
        overflow: hidden;
        flex-shrink: 0;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(255,255,255,0.9), 0 18px 35px rgba(15, 10, 43, 0.18);
    }
    .pp-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .pp-photo-overlay {
        position: fixed;
        inset: 0;
        background: rgba(15, 10, 43, 0.82);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1050;
    }
    .pp-photo-modal {
        position: relative;
        max-width: 90vw;
        max-height: 90vh;
        background: #000;
        border-radius: 16px;
        padding: 0.75rem;
        box-shadow: 0 24px 50px rgba(0, 0, 0, 0.65);
    }
    .pp-photo-modal img {
        display: block;
        max-width: 100%;
        max-height: 80vh;
        border-radius: 12px;
        object-fit: contain;
    }
    .pp-photo-close {
        position: absolute;
        top: 0.35rem;
        right: 0.5rem;
        border: none;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        border-radius: 999px;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        line-height: 1;
        cursor: pointer;
    }
    .pp-hero-meta h1 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: .25rem;
        color: #1c1635;
    }
    .pp-hero-meta .pp-subline {
        font-size: .85rem;
        color: #6c6688;
    }
    .pp-hero-stats {
        margin-top: .75rem;
        display: flex;
        flex-wrap: wrap;
        gap: .5rem .9rem;
        font-size: .8rem;
        color: #433f63;
    }
    .pp-hero-stat-pill {
        border-radius: 999px;
        padding: .25rem .7rem;
        background: rgba(255,255,255,0.9);
        border: 1px solid rgba(210, 202, 255, 0.9);
        display: inline-flex;
        align-items: center;
        gap: .3rem;
    }
    .pp-hero-actions {
        margin-left: auto;
        display: flex;
        flex-direction: column;
        gap: .5rem;
        min-width: 190px;
    }
    .pp-btn-main {
        border-radius: 999px;
        border: none;
        background: linear-gradient(135deg, #ff6b9b, #ff9052);
        color: #fff;
        font-size: .85rem;
        font-weight: 600;
        padding: .55rem 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .4rem;
        width: 100%;
    }
    .pp-btn-ghost {
        border-radius: 999px;
        border: 1px solid rgba(167, 160, 218, 0.7);
        background: rgba(255,255,255,0.96);
        color: #433f63;
        font-size: .8rem;
        font-weight: 500;
        padding: .45rem .9rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: .35rem;
        width: 100%;
    }
    .pp-next-nav {
        margin-top: .75rem;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
    }
    .pp-next-btn {
        white-space: nowrap;
    }
    .pp-next-hint {
        margin-top: .25rem;
        font-size: .75rem;
        color: #8b86a8;
    }
    .pp-tabs {
        margin-top: 1rem;
        margin-bottom: .75rem;
        border-bottom: 1px solid rgba(223, 217, 255, 0.9);
        display: flex;
        gap: .4rem;
        overflow-x: auto;
        padding-bottom: .25rem;
    }
    .pp-tab-link {
        white-space: nowrap;
        border-radius: 999px;
        padding: .3rem .9rem;
        font-size: .78rem;
        border: none;
        background: transparent;
        color: #6c6688;
    }
    .pp-tab-link.active {
        background: linear-gradient(135deg, #6d4bff, #f74f8f);
        color: #fff;
        box-shadow: 0 8px 16px rgba(81, 46, 193, 0.3);
    }
    .pp-tab-pane {
        display: block;
    }
    .pp-tab-pane.active {
        display: block;
    }
    .pp-card {
        border-radius: 20px;
        background: #fff;
        border: 1px solid rgba(232, 227, 255, 0.9);
        box-shadow: 0 16px 34px rgba(15, 10, 43, 0.08);
        padding: 1.35rem 1.6rem;
        margin-bottom: 1rem;
    }
    .pp-row {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        padding: .35rem 0;
        border-bottom: 1px dashed rgba(225, 220, 250, 0.9);
        font-size: .87rem;
    }
    .pp-row:last-child {
        border-bottom: none;
    }
    .pp-label {
        flex: 0 0 40%;
        font-weight: 600;
        color: #383354;
    }
    .pp-value {
        flex: 1;
        color: #5a5675;
        text-align: right;
    }
    @media (max-width: 991.98px) {
        .pp-hero {
            padding: 1.4rem 1.2rem;
        }
        .pp-hero-main {
            flex-direction: column;
            align-items: flex-start;
        }
        .pp-avatar {
            width: 120px;
            height: 120px;
        }
        .pp-hero-actions {
            width: 100%;
        }
        .pp-row {
            flex-direction: column;
            align-items: flex-start;
        }
        .pp-value {
            text-align: left;
        }
        .pp-next-nav {
            align-items: center;
        }
    }
</style>

@php
    $present_address = \App\Models\Address::where('user_id',$user->id)->where('type','present')->first();
    $do_expressed_interest = \App\Models\ExpressInterest::where('user_id', $user->id)->where('interested_by',Auth::user()->id)->first();
    $received_expressed_interest = \App\Models\ExpressInterest::where('user_id', Auth::user()->id)->where('interested_by',$user->id)->first();
    if(empty($do_expressed_interest) && empty($received_expressed_interest)) {
        $interest_onclick  = 1;
        $interest_text     = translate('Express Interest');
    } elseif(!empty($received_expressed_interest)) {
        $interest_onclick  = 'do_response';
        $interest_text     = $received_expressed_interest->status == 0 ? translate('Response to Interest') : translate('You Accepted Interest');
    } else {
        $interest_onclick  = 0;
        $interest_text     = $do_expressed_interest->status == 0 ? translate('Interest Expressed') : translate('Interest Accepted');
    }
    $next_profile_match = isset($similar_profiles) && count($similar_profiles) ? $similar_profiles->first() : null;
@endphp

<section class="py-4">
    <div class="container pp-wrapper">
        <div class="pp-hero">
            <div class="pp-hero-main">
                <div class="pp-avatar" onclick="openProfileImage()">
                    <img src="{{ $user->photo ? uploaded_asset($user->photo) : static_asset('assets/img/avatar-place.png') }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';" alt="profile">
                </div>
                <div class="pp-hero-meta">
                    <h1>{{ $user->first_name.' '.$user->last_name }}</h1>
                    <div class="pp-subline">
                        {{ translate('Member ID:') }} {{ $user->code }}
                    </div>
                    <div class="pp-hero-stats">
                        <span class="pp-hero-stat-pill">
                            {{ !empty($user->member->birthday) ? \Carbon\Carbon::parse($user->member->birthday)->age.' '.translate('yrs') : '' }}
                        </span>
                        @if(!empty($user->physical_attributes->height))
                            <span class="pp-hero-stat-pill">{{ $user->physical_attributes->height }}</span>
                        @endif
                        @if(!empty($user->member->marital_status->name))
                            <span class="pp-hero-stat-pill">{{ $user->member->marital_status->name }}</span>
                        @endif
                        @if(!empty(optional($present_address->country)->name))
                            <span class="pp-hero-stat-pill">{{ translate('Lives in') }} {{ $present_address->country->name }}</span>
                        @endif
                    </div>
                </div>
                <div class="pp-hero-actions">
                    <a
                        @if($interest_onclick == 1)
                            onclick="express_interest({{ $user->id }})"
                        @elseif($interest_onclick == 'do_response')
                            href="{{ route('interest_requests') }}"
                        @endif
                        id="interest_a_id_{{ $user->id }}"
                        class="pp-btn-main text-decoration-none">
                        <i class="la la-heart-o"></i>
                        <span id="interest_id_{{ $user->id }}">{{ $interest_text }}</span>
                    </a>
                    <a href="{{ route('all.messages') }}" onclick="start_chat({{ $user->id }})" class="pp-btn-ghost text-decoration-none">
                        <i class="la la-comment"></i>
                        <span>{{ translate('Chat') }}</span>
                    </a>
                    @php
                        $shortlist = \App\Models\Shortlist::where('user_id', $user->id)->where('shortlisted_by',Auth::user()->id)->first();
                        $shortlist_onclick = empty($shortlist) ? 1 : 0;
                        $shortlist_text = empty($shortlist) ? translate('Shortlist') : translate('Shortlisted');
                    @endphp
                    <a href="javascript:void(0);" id="shortlist_a_id_{{ $user->id }}"
                       @if($shortlist_onclick == 1)
                           onclick="do_shortlist({{ $user->id }})"
                       @else
                           onclick="remove_shortlist({{ $user->id }})"
                       @endif
                       class="pp-btn-ghost text-decoration-none">
                        <i class="la la-list"></i>
                        <span id="shortlist_id_{{ $user->id }}">{{ $shortlist_text }}</span>
                    </a>
                </div>
            </div>
        </div>

        @if(!empty($next_profile_match) && !empty($next_profile_match->match_id))
            <div class="pp-next-nav">
                <button type="button"
                        class="pp-btn-ghost pp-next-btn"
                        onclick="goToNextProfile()">
                    <span>{{ translate('Next Profile') }}</span>
                    <i class="la la-arrow-right"></i>
                </button>
                <div class="pp-next-hint">
                    {{ translate('Tip: Swipe left on mobile or press the right arrow key to see the next profile.') }}
                </div>
            </div>
        @endif

        <div id="pp-photo-overlay" class="pp-photo-overlay d-none" onclick="closeProfileImage(event)">
            <div class="pp-photo-modal" onclick="event.stopPropagation()">
                <button type="button" class="pp-photo-close" onclick="closeProfileImage(event)">&times;</button>
                <img src="{{ $user->photo ? uploaded_asset($user->photo) : static_asset('assets/img/avatar-place.png') }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';" alt="profile-full">
            </div>
        </div>

        @php
            $interest_accepted = (!empty($do_expressed_interest) && $do_expressed_interest->status == 1) ||
                                 (!empty($received_expressed_interest) && $received_expressed_interest->status == 1);
            $is_female_user = optional(Auth::user()->member)->gender == 2;
        @endphp

        @if (Auth::check() && (in_array(Auth::user()->membership, [3, 2]) || $interest_accepted || $is_female_user))

        {{-- ABOUT TAB --}}
        <div class="pp-tab-pane active" id="pp-tab-about">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('About') }}</h6>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Introduction') }}</div>
                    <div class="pp-value">
                        @php
                            $intro = trim(optional($user->member)->introduction ?? '');
                        @endphp
                        @if($intro)
                            {{ $intro }}
                        @else
                            @php
                                $parts = [];

                                // Age
                                $age = !empty(optional($user->member)->birthday)
                                    ? \Carbon\Carbon::parse($user->member->birthday)->age
                                    : null;
                                if ($age) {
                                    $parts[] = $age . ' ' . translate('years old');
                                }

                                // Height
                                if (!empty(optional($user->physical_attributes)->height)) {
                                    $parts[] = $user->physical_attributes->height;
                                }

                                // Religion / Caste
                                $religionName = optional(optional($user->spiritual_backgrounds)->religion)->name ?? null;
                                $casteName    = optional(optional($user->spiritual_backgrounds)->caste)->name ?? null;
                                if ($religionName || $casteName) {
                                    $relPart = $religionName;
                                    if ($casteName) {
                                        $relPart = trim($religionName . ' ' . $casteName);
                                    }
                                    $parts[] = $relPart;
                                }

                                // Location (City, Country)
                                $locParts = [];
                                $city      = optional($present_address)->city;
                                $cityName  = optional($city)->name ?? (is_string($city) ? $city : null);
                                $country   = optional($present_address)->country;
                                $countryName = optional($country)->name ?? null;

                                if (!empty($cityName)) {
                                    $locParts[] = $cityName;
                                }
                                if (!empty($countryName)) {
                                    $locParts[] = $countryName;
                                }
                                if (!empty($locParts)) {
                                    $parts[] = translate('from') . ' ' . implode(', ', $locParts);
                                }

                                // Career (current or first)
                                $autoCareer = \App\Models\Career::where('user_id', $user->id)
                                    ->where('present', 1)
                                    ->first();
                                if (!$autoCareer) {
                                    $autoCareer = \App\Models\Career::where('user_id', $user->id)->first();
                                }
                                if ($autoCareer && $autoCareer->designation) {
                                    $careerText = translate('working as') . ' ' . $autoCareer->designation;
                                    if (!empty($autoCareer->company)) {
                                        $careerText .= ' ' . translate('at') . ' ' . $autoCareer->company;
                                    }
                                    $parts[] = $careerText;
                                }

                                $fullName = trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? ''));
                                if (empty($parts)) {
                                    $autoIntro = $fullName ?: '';
                                } else {
                                    $autoIntro = ($fullName ?: '') . ' is ' . implode(', ', $parts) . '.';
                                }
                            @endphp
                            {{ $autoIntro }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- BASIC TAB --}}
        <div class="pp-tab-pane" id="pp-tab-basic">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Basic Information') }}</h6>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('First Name') }}</div>
                    <div class="pp-value">{{ $user->first_name }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Last Name') }}</div>
                    <div class="pp-value">{{ $user->last_name }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Gender') }}</div>
                    <div class="pp-value">{{ $user->member->gender == 1 ? translate('Male') : translate('Female') }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Age') }}</div>
                    <div class="pp-value">{{ !empty($user->member->birthday) ? \Carbon\Carbon::parse($user->member->birthday)->age : '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Religion') }}</div>
                    <div class="pp-value">{{ optional(optional($user->spiritual_backgrounds)->religion)->name }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('First Language') }}</div>
                    <div class="pp-value">{{ optional(\App\Models\MemberLanguage::find(optional($user->member)->mothere_tongue))->name }}</div>
                </div>
            </div>
        </div>

        {{-- CONTACT TAB --}}
        <div class="pp-tab-pane" id="pp-tab-contact">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Contact & Location') }}</h6>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Country of residence') }}</div>
                    <div class="pp-value">
                        @if($present_address && $present_address->country)
                            {{ $present_address->country->name }}
                        @endif
                    </div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('City / State') }}</div>
                    <div class="pp-value">
                        @if($present_address)
                            @php
                                $cityName = optional($present_address->city)->name;
                                $stateName = optional($present_address->state)->name;
                            @endphp
                            {{ $cityName }}
                            @if($cityName && $stateName)
                                ,
                            @endif
                            {{ $stateName }}
                        @endif
                    </div>
                </div>

                {{-- CONTACT NUMBER & EMAIL (mirrors original profile logic) --}}
                @php
                    $is_female_user = optional(Auth::user()->member)->gender == 2;
                    $current_package_id = optional(Auth::user()->member)->current_package_id;
                @endphp

                @if (Auth::check() && Auth::user()->membership == 2)
                    @if ($current_package_id == 10 || $is_female_user)
                        {{-- Show contact & email directly --}}
                        <div class="pp-row">
                            <div class="pp-label">{{ translate('Contact Number') }}</div>
                            <div class="pp-value">{{ $user->phone }}</div>
                        </div>
                        <div class="pp-row">
                            <div class="pp-label">{{ translate('Email ID') }}</div>
                            <div class="pp-value">{{ $user->email }}</div>
                        </div>
                    @elseif ($current_package_id == 9)
                        @if (empty($do_expressed_interest) && empty($received_expressed_interest))
                            {{-- Ask to express interest first --}}
                            <div class="pp-row">
                                <div class="pp-label">{{ translate('Contact Number') }}</div>
                                <div class="pp-value">
                                    <a onclick="express_interest({{ $user->id }})"
                                       class="btn btn-sm btn-primary view_contact">
                                        <i class="las la-phone"></i>
                                        {{ translate('Can You please Express Your Interest') }}
                                    </a>
                                    <div class="small text-muted mt-1">contact admin for direct profile assistance</div>
                                </div>
                            </div>
                        @elseif (
                            (!empty($received_expressed_interest) && $received_expressed_interest->status == 1) ||
                            (!empty($do_expressed_interest) && $do_expressed_interest->status == 1)
                        )
                            {{-- Interest accepted: show contact & email --}}
                            <div class="pp-row">
                                <div class="pp-label">{{ translate('Contact Number') }}</div>
                                <div class="pp-value">{{ $user->phone }}</div>
                            </div>
                            <div class="pp-row">
                                <div class="pp-label">{{ translate('Email ID') }}</div>
                                <div class="pp-value">{{ $user->email }}</div>
                            </div>
                        @else
                            {{-- Waiting for interest acceptance --}}
                            <div class="pp-row">
                                <div class="pp-label">{{ translate('Contact Number') }}</div>
                                <div class="pp-value">wait until the Interest is accepted</div>
                            </div>
                        @endif
                    @endif
                @endif
            </div>
        </div>

        {{-- EDUCATION TAB --}}
        <div class="pp-tab-pane" id="pp-tab-education">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Education') }}</h6>
                @php
                    $educations = \App\Models\Education::where('user_id', $user->id)->get();
                    $currentEducation = $educations->where('present', 1)->first() ?? $educations->first();
                @endphp

                @if($currentEducation)
                    <div class="pp-row">
                        <div class="pp-label">{{ translate('Degree') }}</div>
                        <div class="pp-value">{{ $currentEducation->degree ?? '' }}</div>
                    </div>
                    <div class="pp-row">
                        <div class="pp-label">{{ translate('Institution / Period / Status') }}</div>
                        <div class="pp-value">
                            @php
                                $institution = $currentEducation->institution ?? null;
                                $startEdu    = $currentEducation->start ?? null;
                                $endEdu      = $currentEducation->end ?? null;
                            @endphp
                            @if($institution)
                                {{ $institution }}
                            @endif
                            @if($institution && ($startEdu || $endEdu || $currentEducation->present))
                                -
                            @endif
                            @if($startEdu)
                                {{ $startEdu }}
                            @endif
                            @if($startEdu && ($endEdu || $currentEducation->present))
                                -
                            @endif
                            @if($endEdu)
                                {{ $endEdu }}
                            @elseif($currentEducation->present)
                                {{ translate('Present') }}
                            @endif
                            @if($currentEducation->present == 1)
                                <span class="badge badge-inline badge-success ml-2">{{ translate('Running') }}</span>
                            @else
                                <span class="badge badge-inline badge-danger ml-2">{{ translate('Completed') }}</span>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="pp-row">
                        <div class="pp-label">{{ translate('Education') }}</div>
                        <div class="pp-value">-</div>
                    </div>
                @endif
            </div>
        </div>

        {{-- CAREER TAB --}}
        <div class="pp-tab-pane" id="pp-tab-career">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Career') }}</h6>
                @php
                    $careers = \App\Models\Career::where('user_id', $user->id)->get();
                    $currentCareer = $careers->where('present', 1)->first() ?? $careers->first();
                @endphp

                @if($currentCareer)
                    <div class="pp-row">
                        <div class="pp-label">{{ translate('Designation') }}</div>
                        <div class="pp-value">{{ $currentCareer->designation ?? '' }}</div>
                    </div>
                    <div class="pp-row">
                        <div class="pp-label">{{ translate('Company') }}</div>
                        <div class="pp-value">{{ $currentCareer->company ?? '' }}</div>
                    </div>
                    <div class="pp-row">
                        <div class="pp-label">{{ translate('Career Period / Status') }}</div>
                        <div class="pp-value">
                            @php
                                $start = $currentCareer->start ?? null;
                                $end = $currentCareer->end ?? null;
                            @endphp
                            @if($start)
                                {{ $start }}
                            @endif
                            @if($start && ($end || $currentCareer->present))
                                -
                            @endif
                            @if($end)
                                {{ $end }}
                            @elseif($currentCareer->present)
                                {{ translate('Present') }}
                            @endif
                            @if($currentCareer->present == 1)
                                <span class="badge badge-inline badge-success ml-2">{{ translate('Active') }}</span>
                            @else
                                <span class="badge badge-inline badge-danger ml-2">{{ translate('Deactive') }}</span>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="pp-row">
                        <div class="pp-label">{{ translate('Career') }}</div>
                        <div class="pp-value">-</div>
                    </div>
                @endif
            </div>
        </div>

        {{-- PHYSICAL ATTRIBUTES --}}
        <div class="pp-tab-pane" id="pp-tab-physical">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Physical Attributes') }}</h6>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Height') }}</div>
                    <div class="pp-value">{{ optional($user->physical_attributes)->height ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Eye Color') }}</div>
                    <div class="pp-value">{{ optional($user->physical_attributes)->eye_color ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Weight') }}</div>
                    <div class="pp-value">{{ optional($user->physical_attributes)->weight ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Hair Color') }}</div>
                    <div class="pp-value">{{ optional($user->physical_attributes)->hair_color ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Complexion') }}</div>
                    <div class="pp-value">{{ optional($user->physical_attributes)->complexion ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Blood Group') }}</div>
                    <div class="pp-value">{{ optional($user->physical_attributes)->blood_group ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Body Type') }}</div>
                    <div class="pp-value">{{ optional($user->physical_attributes)->body_type ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Body Art') }}</div>
                    <div class="pp-value">{{ optional($user->physical_attributes)->body_art ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Disability') }}</div>
                    <div class="pp-value">{{ optional($user->physical_attributes)->disability ?? '' }}</div>
                </div>
            </div>
        </div>

        {{-- HOBBIES & INTEREST --}}
        <div class="pp-tab-pane" id="pp-tab-hobbies">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Hobbies & Interest') }}</h6>
                @php $hobbies = optional($user->hobbies); @endphp
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Hobbies') }}</div>
                    <div class="pp-value">{{ $hobbies->hobbies ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Music / Movies / Sports / Cuisines') }}</div>
                    <div class="pp-value">
                        {{ $hobbies->music ?? '' }}
                        @if(!empty($hobbies->music) && !empty($hobbies->movies)) , @endif
                        {{ $hobbies->movies ?? '' }}
                        @if((!empty($hobbies->music) || !empty($hobbies->movies)) && !empty($hobbies->sports)) , @endif
                        {{ $hobbies->sports ?? '' }}
                        @if((!empty($hobbies->music) || !empty($hobbies->movies) || !empty($hobbies->sports)) && !empty($hobbies->cuisines)) , @endif
                        {{ $hobbies->cuisines ?? '' }}
                    </div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Interests / Books / TV Shows / Fitness / Dress Styles') }}</div>
                    <div class="pp-value">
                        {{ $hobbies->interests ?? '' }}
                        @if(!empty($hobbies->interests) && !empty($hobbies->books)) , @endif
                        {{ $hobbies->books ?? '' }}
                        @if((!empty($hobbies->interests) || !empty($hobbies->books)) && !empty($hobbies->tv_shows)) , @endif
                        {{ $hobbies->tv_shows ?? '' }}
                        @if((!empty($hobbies->interests) || !empty($hobbies->books) || !empty($hobbies->tv_shows)) && !empty($hobbies->fitness_activities)) , @endif
                        {{ $hobbies->fitness_activities ?? '' }}
                        @if((!empty($hobbies->interests) || !empty($hobbies->books) || !empty($hobbies->tv_shows) || !empty($hobbies->fitness_activities)) && !empty($hobbies->dress_styles)) , @endif
                        {{ $hobbies->dress_styles ?? '' }}
                    </div>
                </div>
            </div>
        </div>

        {{-- PERSONAL ATTITUDE & BEHAVIOR --}}
        <div class="pp-tab-pane" id="pp-tab-attitude">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Personal Attitude & Behavior') }}</h6>
                @php $attitude = optional($user->attitude); @endphp
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Affection') }}</div>
                    <div class="pp-value">{{ $attitude->affection ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Political Views') }}</div>
                    <div class="pp-value">{{ $attitude->political_views ?? '' }}</div>
                </div>
            </div>
        </div>

        {{-- SPIRITUAL & SOCIAL BACKGROUND (DETAILED) --}}
        <div class="pp-tab-pane" id="pp-tab-spiritual">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Spiritual & Social Background') }}</h6>
                @php $spiritual = optional($user->spiritual_backgrounds); @endphp
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Religion') }}</div>
                    <div class="pp-value">{{ optional($spiritual->religion)->name ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Caste') }}</div>
                    <div class="pp-value">{{ optional($spiritual->caste)->name ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Sub Caste') }}</div>
                    <div class="pp-value">{{ optional($spiritual->sub_caste)->name ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Personal Value') }}</div>
                    <div class="pp-value">{{ $spiritual->personal_value ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Community Value') }}</div>
                    <div class="pp-value">{{ $spiritual->community_value ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Ethnicity') }}</div>
                    <div class="pp-value">{{ $spiritual->ethnicity ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Family Value') }}</div>
                    <div class="pp-value">{{ optional($spiritual->family_value)->name ?? '' }}</div>
                </div>
            </div>
        </div>

        {{-- LIFE STYLE (DETAILED) --}}
        <div class="pp-tab-pane" id="pp-tab-lifestyle">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Life Style') }}</h6>
                @php $life = optional($user->lifestyles); @endphp
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Diet') }}</div>
                    <div class="pp-value">{{ $life->diet ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Smoke') }}</div>
                    <div class="pp-value">{{ $life->smoke ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Drink') }}</div>
                    <div class="pp-value">{{ $life->drink ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Living With') }}</div>
                    <div class="pp-value">{{ $life->living_with ?? '' }}</div>
                </div>
            </div>
        </div>

        {{-- ASTRONOMIC INFORMATION --}}
        <div class="pp-tab-pane" id="pp-tab-astro">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Astronomic Information') }}</h6>
                @php $astro = optional($user->astrologies); @endphp
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Sun Sign') }}</div>
                    <div class="pp-value">{{ $astro->sun_sign ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Time Of Birth') }}</div>
                    <div class="pp-value">{{ $astro->time_of_birth ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Moon Sign') }}</div>
                    <div class="pp-value">{{ $astro->moon_sign ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('City Of Birth') }}</div>
                    <div class="pp-value">{{ $astro->city_of_birth ?? '' }}</div>
                </div>
            </div>
        </div>

        {{-- FAMILY & LIFESTYLE TAB --}}
        <div class="pp-tab-pane" id="pp-tab-family">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Family & Lifestyle') }}</h6>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Family Type') }}</div>
                    <div class="pp-value">
                        {{ !empty(optional($user->spiritual_backgrounds)->community_value) ? $user->spiritual_backgrounds->community_value : '' }}
                    </div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Family Value') }}</div>
                    <div class="pp-value">
                        {{ optional(optional($user->spiritual_backgrounds)->family_value)->name ?? '' }}
                    </div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Lifestyle') }}</div>
                    <div class="pp-value">
                        {{ !empty(optional($user->lifestyles)->diet) ? $user->lifestyles->diet : '' }}
                    </div>
                </div>
            </div>
        </div>

        {{-- PARTNER PREFERENCE TAB --}}
        <div class="pp-tab-pane" id="pp-tab-preference">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Partner Preference') }}</h6>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Preferred Age') }}</div>
                    <div class="pp-value">{{ optional($user->partner_expectations)->preferred_age ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Preferred Height') }}</div>
                    <div class="pp-value">{{ optional($user->partner_expectations)->preferred_height ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Religious Preference') }}</div>
                    <div class="pp-value">{{ optional(optional($user->partner_expectations)->religion)->name ?? ($user->partner_expectations->religion_id ?? '') }}</div>
                </div>
            </div>
        </div>

        @else
            <div class="pp-card mt-3">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.80rem;">
                    {{ translate('Upgrade Your Package To See The Full Profile') }}
                </h6>
                <p class="mb-3" style="font-size:.9rem;">
                    {{ translate('Please choose a package to view the full profile with contact number and all detailed information.') }}
                </p>
                <button class="btn btn-primary custom-button" onclick="window.location='{{ route('packages') }}'">
                    {{ translate('CHOOSE A PACKAGE') }}
                </button>
            </div>
        @endif
    </div>
</section>

@include('modals.package_update_alert_modal')

<script>
    var package_validity = {{ package_validity(Auth::user()->id) }};
    var remaining_contact_view = {{ get_remaining_value(Auth::user()->id,'remaining_contact_view') }};
    var remaining_interest = {{ get_remaining_value(Auth::user()->id,'remaining_interest') }};

    @php
        $nextProfileUrl = '';
        if (!empty($next_profile_match) && !empty($next_profile_match->match_id)) {
            $nextProfileUrl = route('member_profile_clean', $next_profile_match->match_id);
        }
    @endphp
    var nextProfileUrl = "{{ $nextProfileUrl }}";

    function view_contact(id)
    {
        if( package_validity == 0 || remaining_contact_view < 1){
            $('.package_update_alert_modal').modal('show');
        }
        else {
          $('.confirm_modal').modal('show');
          $("#confirm_modal_title").html("{{ translate('Confirm Contact View') }}");
          $("#confirm_modal_content").html("<p class='fs-14'>{{translate('Remaining Contact View')}}: "+remaining_contact_view+" {{translate('Times')}}</p><small class='text-danger'>{{translate('**N.B. Viewing This Members Contact Information Will Cost  1 From Your Remaining Contact View**')}}</small>");
          $("#confirm_button").attr("onclick","do_contact_view("+id+")");
        }
    }

    function do_contact_view(id){
      $(".view_contact").removeAttr("onclick");
      $.post('{{ route('view_contacts.store') }}',
        {
          _token: '{{ csrf_token() }}',
          id: id
        },
        function (data) {
          if (data == 1) {
            $('.confirm_modal').modal('toggle');
            $('.contact_info').removeClass('d-none');
            $('.view_contact').addClass('d-none');
            AIZ.plugins.notify('success', '{{translate('Now You Can See This Members Contact Information')}}');
          }
          else {
              AIZ.plugins.notify('danger', '{{translate('Something went wrong')}}');
          }
          location.reload();
        }
      );
    }

    function express_interest(id)
    {
        $('.confirm_modal').modal('show');
        $("#confirm_modal_title").html("{{ translate('Confirm Express Interest!') }}");
        $("#confirm_modal_content").html("<p class='fs-14'>{{translate('Remaining Express Interest')}}: "+remaining_interest+" {{translate('Times')}}</p><small class='text-danger'>{{translate('**N.B. Expressing An Interest Will Cost 1 From Your Remaining Interests**')}}</small>");
        $("#confirm_button").attr("onclick","do_express_interest("+id+")");
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
            if (data == 1) {
              $('.confirm_modal').modal('toggle');
              $("#interest_id_"+id).html("{{translate('Interest Expressed')}}");
              $("#interest_id_"+id).attr("class","d-block fs-13 text-white");
              AIZ.plugins.notify('success', '{{translate('Interest Expressed Sucessfully')}}');
            }
            else {
                $("#interest_id_"+id).html("{{translate('Interest')}}");
                AIZ.plugins.notify('danger', '{{translate('Something went wrong')}}');
            }
          }
        );
    }

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

    function remove_shortlist(id){
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
              $("#shortlist_a_id_"+id).attr("onclick","do_shortlist("+id+")");
              AIZ.plugins.notify('success', '{{translate('You Have Removed This Member From Your Shortlist.')}}');
            }
            else {
              AIZ.plugins.notify('danger', '{{translate('Something went wrong')}}');
            }
          }
        );
    }

    function start_chat(id){
        $.post('{{ route('start.chat') }}',
          {
            _token: '{{ csrf_token() }}',
            id: id
          },
          function (data) {
            if (data == 1) {
              AIZ.plugins.notify('success', '{{translate('Chat has been send.')}}');
            }
          }
        );
    }

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
                    AIZ.plugins.notify('success', '{{translate('You Have Ignored This Member.')}}');
                    window.location.href = "{{ route('member.listing')}}";
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

    function openProfileImage() {
        var overlay = document.getElementById('pp-photo-overlay');
        if (overlay) {
            overlay.classList.remove('d-none');
        }
    }

    function closeProfileImage(e) {
        if (e && e.stopPropagation) {
            e.stopPropagation();
        }
        var overlay = document.getElementById('pp-photo-overlay');
        if (overlay) {
            overlay.classList.add('d-none');
        }
    }

    function goToNextProfile() {
        if (nextProfileUrl) {
            window.location.href = nextProfileUrl;
        }
    }

    (function() {
        if (!nextProfileUrl) {
            return;
        }

        var touchStartX = null;
        var touchEndX = null;
        var SWIPE_THRESHOLD = 60;
        var swipeArea = document.querySelector('.pp-wrapper');

        if (swipeArea) {
            swipeArea.addEventListener('touchstart', function(e) {
                if (!e.changedTouches || !e.changedTouches.length) return;
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });

            swipeArea.addEventListener('touchend', function(e) {
                if (!e.changedTouches || !e.changedTouches.length || touchStartX === null) return;
                touchEndX = e.changedTouches[0].screenX;
                if (touchStartX - touchEndX > SWIPE_THRESHOLD) {
                    goToNextProfile();
                }
                touchStartX = null;
                touchEndX = null;
            }, { passive: true });
        }

        document.addEventListener('keydown', function(e) {
            if ((e.key === 'ArrowRight' || e.key === 'ArrowDown') && nextProfileUrl) {
                goToNextProfile();
            }
        });
    })();
</script>
@endsection
