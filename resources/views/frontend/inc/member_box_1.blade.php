<div class="member-card">
    <a
        @if(!Auth::check())
            onclick="loginModal()"
        @elseif(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1)
            href="javascript:void(0);" onclick="package_update_alert()"
        @else
            href="{{ route('member_profile', $member->id) }}"
        @endif
        class="member-card-link"
    >
    @php
            $profile = optional($member->member);
            $profile_picture_show = 'ok';
            $profile_picture_privacy = $profile->profile_picture_privacy ?? null;

            if(Auth::check() && Auth::user()->user_type == 'admin'){
                $profile_picture_show = 'ok';
            }
            elseif($profile_picture_privacy  == '0')
            {
                $profile_picture_show = 'no';
            }
            elseif($profile_picture_privacy == 2)
            {
                if(Auth::check()){
                    if(Auth::user()->membership == 1)
                    {
                        $profile_picture_show = 'no';
                    }
                }
                else{
                    $profile_picture_show = 'no';
                }

            }

            $should_blur = false;
            if($profile_picture_show !== 'ok') {
                $should_blur = true;
            } elseif(Auth::check()) {
                $should_blur = !in_array(optional(Auth::user())->membership, [3,4]) && optional($member)->membership == 2;
            } else {
                $should_blur = optional($member)->membership == 2;
            }

            $membershipLabels = [
                2 => __('Premium Member'),
                3 => __('Elite Member'),
                4 => __('Elite Member'),
            ];
            $membershipLabel = $membershipLabels[optional($member)->membership] ?? __('Member');

            $age = $profile && $profile->birthday ? \Carbon\Carbon::parse($profile->birthday)->age : null;
            $height = $profile->height ?? null;
            $maritalStatus = $profile->marital_status ?? null;

            $quickFacts = collect([
                ['icon' => 'fa-cake-candles', 'label' => __('Age'), 'value' => $age ? $age . ' ' . __('yrs') : null],
                ['icon' => 'fa-ruler-vertical', 'label' => __('Height'), 'value' => $height],
                ['icon' => 'fa-ring', 'label' => __('Marital Status'), 'value' => $maritalStatus],
            ])->filter(fn($fact) => filled($fact['value']))->values();
    @endphp
        <div class="member-card-media">
            <img
                @if($profile_picture_show == 'ok')
                    src="{{ uploaded_asset($member->photo) }}"
                @else
                    src="{{ static_asset('assets/img/avatar-place.png') }}"
                @endif
                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"
                class="member-card-image @if($should_blur) member-card-image-blur @endif"
                alt="{{ $member->first_name }}"
            >
            @if(in_array(optional($member)->membership, [2,3,4]))
                <span class="member-card-badge"><i class="fa-solid fa-crown"></i></span>
            @endif
        </div>

        <div class="member-card-content">
            <div class="member-card-header">
                <h6 class="member-card-name">{{ $member->first_name }}</h6>
                <span class="member-card-pill">{{ $membershipLabel }}</span>
            </div>
            <div class="member-card-id">
                <span>{{ __('Member ID') }}</span>
                <strong>{{ $member->code }}</strong>
            </div>
            @if($quickFacts->isNotEmpty())
                <ul class="member-card-stats">
                    @foreach($quickFacts as $fact)
                        <li>
                            <i class="fa-solid {{ $fact['icon'] }}"></i>
                            <span>{{ $fact['label'] }}:</span>
                            <strong>{{ $fact['value'] }}</strong>
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="member-card-cta">
                <span>{{ __('View Profile') }}</span>
                <i class="fa-solid fa-arrow-right-long"></i>
            </div>
        </div>
    </a>
</div>
