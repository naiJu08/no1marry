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
        width: 92px;
        height: 92px;
        border-radius: 26px;
        overflow: hidden;
        flex-shrink: 0;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(255,255,255,0.8);
    }
    .pp-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
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
        display: none;
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
@endphp

<section class="py-4">
    <div class="container pp-wrapper">
        <div class="pp-hero">
            <div class="pp-hero-main">
                <div class="pp-avatar">
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
            <div class="pp-tabs mt-3">
                <button class="pp-tab-link active" data-pp-tab="about">{{ translate('About') }}</button>
                <button class="pp-tab-link" data-pp-tab="basic">{{ translate('Basic') }}</button>
                <button class="pp-tab-link" data-pp-tab="contact">{{ translate('Contact') }}</button>
                <button class="pp-tab-link" data-pp-tab="education">{{ translate('Education') }}</button>
                <button class="pp-tab-link" data-pp-tab="career">{{ translate('Career') }}</button>
                <button class="pp-tab-link" data-pp-tab="family">{{ translate('Family & Lifestyle') }}</button>
                <button class="pp-tab-link" data-pp-tab="preference">{{ translate('Preference') }}</button>
            </div>
        </div>

        {{-- ABOUT TAB --}}
        <div class="pp-tab-pane active" id="pp-tab-about">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('About') }}</h6>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Introduction') }}</div>
                    <div class="pp-value">{{ $user->member->introduction }}</div>
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
                            {{ $present_address->city ?? '' }}
                            @if($present_address->city && $present_address->state)
                                , 
                            @endif
                            {{ $present_address->state->name ?? '' }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- EDUCATION TAB --}}
        <div class="pp-tab-pane" id="pp-tab-education">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Education') }}</h6>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Highest Education') }}</div>
                    <div class="pp-value">
                        @if($user->education)
                            @if(is_a($user->education, 'Illuminate\Database\Eloquent\Collection'))
                                {{ optional($user->education->first()->highest_education)->name ?? '' }}
                            @else
                                {{ optional($user->education->highest_education)->name ?? '' }}
                            @endif
                        @endif
                    </div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Education Details') }}</div>
                    <div class="pp-value">
                        @if($user->education)
                            @if(is_a($user->education, 'Illuminate\Database\Eloquent\Collection'))
                                {{ $user->education->first()->education_detail ?? '' }}
                            @else
                                {{ $user->education->education_detail ?? '' }}
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- CAREER TAB --}}
        <div class="pp-tab-pane" id="pp-tab-career">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Career') }}</h6>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Occupation') }}</div>
                    <div class="pp-value">
                        @if($user->career)
                            @if(is_a($user->career, 'Illuminate\Database\Eloquent\Collection'))
                                {{ $user->career->first()->occupation ?? '' }}
                            @else
                                {{ $user->career->occupation ?? '' }}
                            @endif
                        @endif
                    </div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Company / Organization') }}</div>
                    <div class="pp-value">
                        @if($user->career)
                            @if(is_a($user->career, 'Illuminate\Database\Eloquent\Collection'))
                                {{ $user->career->first()->company ?? '' }}
                            @else
                                {{ $user->career->company ?? '' }}
                            @endif
                        @endif
                    </div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Annual income') }}</div>
                    <div class="pp-value">
                        @if($user->career)
                            @if(is_a($user->career, 'Illuminate\Database\Eloquent\Collection'))
                                {{ $user->career->first()->annual_income ?? '' }}
                            @else
                                {{ $user->career->annual_income ?? '' }}
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- FAMILY & LIFESTYLE TAB --}}
        <div class="pp-tab-pane" id="pp-tab-family">
            <div class="pp-card">
                <h6 class="mb-3 text-uppercase text-muted" style="letter-spacing:.08em; font-size:.72rem;">{{ translate('Family & Lifestyle') }}</h6>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Family Type') }}</div>
                    <div class="pp-value">{{ $user->family->family_type ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Family Value') }}</div>
                    <div class="pp-value">{{ $user->family->family_values ?? '' }}</div>
                </div>
                <div class="pp-row">
                    <div class="pp-label">{{ translate('Lifestyle') }}</div>
                    <div class="pp-value">{{ $user->lifestyle->diet ?? '' }}</div>
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
    </div>
</section>

@include('modals.package_update_alert_modal')

<script>
    var package_validity = {{ package_validity(Auth::user()->id) }};
    var remaining_contact_view = {{ get_remaining_value(Auth::user()->id,'remaining_contact_view') }};
    var remaining_interest = {{ get_remaining_value(Auth::user()->id,'remaining_interest') }};

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

    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelectorAll('.pp-tab-link');
        var panes = {
            about: document.getElementById('pp-tab-about'),
            basic: document.getElementById('pp-tab-basic'),
            contact: document.getElementById('pp-tab-contact'),
            education: document.getElementById('pp-tab-education'),
            career: document.getElementById('pp-tab-career'),
            family: document.getElementById('pp-tab-family'),
            preference: document.getElementById('pp-tab-preference')
        };
        links.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var key = this.getAttribute('data-pp-tab');
                links.forEach(function (l) { l.classList.remove('active'); });
                Object.values(panes).forEach(function (p) { if (p) p.classList.remove('active'); });
                this.classList.add('active');
                if (panes[key]) panes[key].classList.add('active');
            });
        });
    });
</script>
@endsection
