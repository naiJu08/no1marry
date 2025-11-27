@extends('frontend.layouts.app')
@section('content')
<style>
 .express
  {
      padding:5% !important;
  margin-left: 4% !important;
  background-color:#fff !important;
  color: rgb(163 13 13) !important;
  font-weight:800;
    /*background-color:#00b359!important;*/


  }
    #fluid{
        z-index: 999 !important;
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
.mrg_btn{
  background-color: #00b359 !important;
}
@media only screen 
  and (min-device-width: 210px) 
  and (max-device-width:320px)
{

.aiz-nav-tabs.active-white a ,.aiz-nav-tabs.active-white a:active{
    border-color: #fff;
    color: #fff !important;
    font-size: xx-small;
    font-size: 12px !important;
}
.aiz-nav-tabs
{
        display: flex;
   
    flex-wrap: nowrap;
    align-content: center;
    justify-content: space-evenly;
    font-size: xx-small !important;
}
}

@media only screen 
  and (min-device-width: 320px) 
  and (max-device-width: 480px)
{
.aiz-nav-tabs.active-white a ,.aiz-nav-tabs.active-white a:active{
    border-color: #fff;
    color: #fff !important;
    font-size: xx-small;
    font-size: 12px !important;
}
.aiz-nav-tabs
{
        display: flex;
   
    flex-wrap: nowrap;
    align-content: center;
    justify-content: space-evenly;
    font-size: xx-small !important;
}
}
@media only screen 
  and (min-device-width:480px) 
  and (max-device-width:620px)
{
}
@media only screen 
  and (min-device-width:620px) 
  and (max-device-width:720px)
  {

  }
@media only screen 
  and (min-device-width:720px) 
  and (max-device-width:820px)
  {


}
@media only screen 
  and (min-device-width:820px) 
  and (max-device-width:1200px)
  {

}



</style>
<section class="pt-6 bg-primary-grad text-white" style="background-color:rgb(163 13 13);">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-4">
                <div class="px-3 row align-items-center">
                    <div class="col-md-8 col-xxl-9">
                        <h1 class="fs-24 fw-600">
                          {{ $user->first_name.' '.$user->last_name }}
                          @php $present_address = \App\Models\Address::where('user_id',$user->id)->where('type','present')->first(); @endphp
                          <span class="fs-20 fw-600">
                            @php
                              $profile_match = \App\Models\ProfileMatch::where('user_id',Auth::user()->id)->where('match_id',$user->id)->first();
                              if(!empty($profile_match) && Auth::user()->member->auto_profile_match == 1){
                                echo '('.translate('Matched').' - '.$profile_match->match_percentage.'%)';
                              }
                            @endphp
                          </span>
                        </h1>
                        <div class="fs-12">
                            <span class="opacity-60">{{ translate('Member ID: ') }}</span>
                            <span class="ml-2">{{ $user->code }}</span>
                        </div>
                        <hr class="border-gray-500">
                        <table class="w-100">
                            <tbody>
                                <tr>
                                    <td width="50%">
                                        {{ !empty($user->member->birthday) ? \Carbon\Carbon::parse($user->member->birthday)->age : "" }}
                                        {{ translate('yrs') }}
                                        {{ !empty($user->physical_attributes->height) ? ', '.$user->physical_attributes->height : "" }}
                                    </td>
                                    <td width="50%">
                                        {{ !empty($user->member->marital_status->name) ? $user->member->marital_status->name : ""  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ !empty($user->spiritual_backgrounds->religion->name) ? $user->spiritual_backgrounds->religion->name : "" }}
                                        {{ !empty($user->spiritual_backgrounds->caste->name) ? ', '.$user->spiritual_backgrounds->caste->name : "" }}
                                    </td>
                                    <td>
                                        {{ translate('Lives in') }}
                                        {{ !empty($present_address->country->name) ? $present_address->country->name : "" }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-xxl-3 col-sm-12 col-12">
                        @php
                          $interest_class    = "text-white";
                          $do_expressed_interest = \App\Models\ExpressInterest::where('user_id', $user->id)->where('interested_by',Auth::user()->id)->first();
                          $received_expressed_interest = \App\Models\ExpressInterest::where('user_id', Auth::user()->id)->where('interested_by',$user->id)->first();
                          if(empty($do_expressed_interest) && empty($received_expressed_interest))
                          {
                              $interest_onclick  = 1;
                              $interest_text     = translate('Express Interest');
                              $interest_class    = "text-white";
                              $interest_class    = "express";
                              
                          }
                          elseif(!empty($received_expressed_interest))
                          {
                              $interest_onclick  = 'do_response';
                              $interest_text     = $received_expressed_interest->status == 0 ? translate('Response to Interest') : translate('You Accepted Interest');
                          }
                          else
                          {
                              $interest_onclick  = 0;
                              $interest_text     = $do_expressed_interest->status == 0 ? translate('Interest Expressed') : translate('Interest Accepted');
                          }
                        @endphp

                        <div class="py-4 text-center border-md-left border-gray-600">
                            @if((empty($do_expressed_interest) && empty($received_expressed_interest)) || (!empty($received_expressed_interest && $received_expressed_interest->status == 0)  ))
                                <div class="fs-18 fw-500 text-white">{{ translate('Like this Profile ?') }}</div>
                            @endif
                            <a class="text-white"
                                @if($interest_onclick == 1)
                                    onclick="express_interest({{ $user->id }})"
                                @elseif($interest_onclick == 'do_response')
                                    href="{{ route('interest_requests') }}"
                                @endif
                                class="btn btn-block w-100 text-white">
                                <i class="la la-heart-o la-2x border rounded-circle p-2 border-width-2 mb-2"></i>
                                <span id="interest_id_{{ $user->id }}" class=" text-white d-block fs-13 {{ $interest_class }}">
                                    {{ $interest_text }}
                                </span>
                            </a>
                            <div class="">
                                <a class="text-white"
                                        onclick="start_chat({{ $user->id }})"  
                                        href="{{ route('all.messages') }}"
                                    class="btn btn-block w-100 text-white">
                                    <i class="la la-comment la-2x border rounded-circle p-2 border-width-2 mb-2"></i>
                                    <span id="interest_id_{{ $user->id }}" class=" text-white d-block fs-13 {{ $interest_class }}">
                                        Chat
                                    </span>
                                </a>
                            </div>
                        </div>
                        
                        <script type="text/javascript">

    var package_validity = {{ package_validity(Auth::user()->id) }};

    // Express Interest
    var remaining_contact_view = {{ get_remaining_value(Auth::user()->id,'remaining_contact_view') }};
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

    // Express Interest
    var remaining_interest = {{ get_remaining_value(Auth::user()->id,'remaining_interest') }};
    function express_interest(id)
    {
        // if( package_validity == 0 || remaining_interest < 1){
        //     $('.package_update_alert_modal').modal('show');
        // }
        // else {
          $('.confirm_modal').modal('show');
          $("#confirm_modal_title").html("{{ translate('Confirm Express Interest!') }}");
          $("#confirm_modal_content").html("<p class='fs-14'>{{translate('Remaining Express Interest')}}: "+remaining_interest+" {{translate('Times')}}</p><small class='text-danger'>{{translate('**N.B. Expressing An Interest Will Cost 1 From Your Remaining Interests**')}}</small>");
          $("#confirm_button").attr("onclick","do_express_interest("+id+")");
        // }
    }
    function start_chat(id){
        $.post('{{ route('start.chat') }}',
          {
            _token: '{{ csrf_token() }}',
            id: id
          },
          function (data) {
            if (data == 1) {
              $("#shortlist_id_"+id).html("{{translate('Shortlisted')}}");
              $("#shortlist_a_id_"+id).attr("onclick","remove_shortlist("+id+")");
              AIZ.plugins.notify('success', '{{translate('Chat has been send.')}}');
            }
            
          }
        );
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
</script>

                    </div>
                </div>
                <div class="mt-4">
                    <div class="nav nav-tabs aiz-nav-tabs bottom-bordered active-white border-0">
                        <a class="text-white d-inline-block fw-600 fs-15 px-3 py-2 active" data-toggle="tab" href="#profile">{{ translate('Detailed Profile') }}</a>
                        @if(get_setting('member_partner_expectation_section') == 'on')
                            <a class="text-white d-inline-block fw-600 fs-15 px-3 py-2" data-toggle="tab" href="#preference">{{ translate('Partner Preference') }}</a>
                        @endif
                        {{-- <a class="text-white d-inline-block fw-600 fs-15 px-3 py-2" data-toggle="tab" href="#gallery">{{ translate('Photo Gallery') }}</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
@media(min-width: 1199.98px){
    .aiz-profile-sidebar{
        margin-top: -260px
    }
}
</style>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-xxl-3 order-1 order-xl-0">
                <div class="aiz-profile-sidebar">
                    <div class="overflow-hidden rounded shadow-lg mb-4 bg-white d-none d-xl-block">
                      @php
                          $profile_picture_show = 'ok';
                          $profile_picture_privacy = $user->member->profile_picture_privacy;

                          if($profile_picture_privacy  == '0')
                          {
                            $profile_picture_show = 'no';
                          }
                          elseif($profile_picture_privacy == 2)
                          {
                            if(Auth::user()->membership == 1)
                            {
                              $profile_picture_show = 'no';
                            }
                          }
                      @endphp

                        <img
                            @if($user->photo)
                            src="{{ uploaded_asset($user->photo) }}"
                            @else
                            src="{{ static_asset('assets/img/avatar-place.png') }}"
                            @endif
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"
                            class="img-fluid w-100"
                      alt="user"  >
                    </div>

                    <div class="mb-4 p-4 border rounded border-gray-200 d-none d-xl-block">
                        <div class="fs-12">
                            <span class="opacity-60">{{ translate('Member ID: ') }}</span>
                            <span class="ml-1 text-primary">{{ $user->code }}</span>
                        </div>
                        <h2 class="fs-20 fw-500 mb-4">{{ $user->first_name.' '.$user->last_name }}</h2>

                        <div class="mb-2">
                            @php
                              $shortlist = \App\Models\Shortlist::where('user_id', $user->id)->where('shortlisted_by',Auth::user()->id)->first();
                              if(empty($shortlist)){
                                  $shortlist_onclick  = 1;
                                  $shortlist_text     = translate('Shortlist');
                              }
                              else{
                                  $shortlist_onclick  = 0;
                                  $shortlist_text     = translate('Shortlisted');
                              }
                            @endphp
                            <a href="avascript:void(0);" id="shortlist_a_id_{{ $user->id }}"
                                  @if($shortlist_onclick == 1)
                                    onclick="do_shortlist({{ $user->id }})"
                                  @else
                                    onclick="remove_shortlist({{ $user->id }})"
                                  @endif
                                class="btn btn-block btn-primary text-left w-100 d-flex justify-content-md-center align-items-md-center">
                                <i class="las la-list d-block la-2x"></i>
                                <span id="shortlist_id_{{ $user->id }}">{{ $shortlist_text }}</span>
                            </a>
                        </div>
                        @if (Auth::check() && Auth::user()->membership == 3)
                        <div class="mb-2">
                            <a href="{{ route('marriage.support', $user->id) }}" id="marry_suport"
                              class="btn btn-block btn-primary text-left w-100 d-flex justify-content-md-center align-items-md-center mrg_btn">
                              <i class="las la-headset d-block la-2x mrg_txt"></i>
                              <span class="mrg_txt">Marriage Support</span>
                            </a> 
                        </div>
                        @endif
                        <div class="mb-2">
                            <a href="{{ route('photo.request', $user->id) }}" id="requst_suport"
                                class="btn btn-block btn-primary text-left w-100 d-flex justify-content-md-center align-items-md-center">
                                <i class="las la-portrait d-block la-2x"></i>
                                <span>Photo Request</span>
                            </a>
                        </div>
                        <div class="mb-2 row">
                            <div class="col w-100">
                                <a href="avascript:void(0);" onclick="ignore_member({{ $user->id }})" class="btn btn-block btn-primary text-left w-100">
                                    <i class="las la-ban d-block la-2x"></i>
                                    {{ translate('Ignore') }}
                                </a>
                            </div>
                            <div class="col w-100">
                                @php
                                  $profile_reported = \App\Models\ReportedUser::where('user_id', $user->id)->where('reported_by',Auth::user()->id)->first();
                                  if(empty($profile_reported)){
                                      $report_onclick  = 1;
                                      $report_text     = translate('Report');
                                  }
                                  else{
                                      $report_onclick  = 0;
                                      $report_text     = translate('Reported');
                                  }
                                @endphp
                                <a href="avascript:void(0);" id="report_a_id_{{ $user->id }}"
                                  @if($report_onclick == 1)
                                    onclick="report_member({{ $user->id }})"
                                  @endif
                                    class="btn btn-block btn-primary text-left w-100">
                                    <i class="las la-info-circle d-block la-2x"></i>
                                    <span id="report_id_{{ $user->id }}">{{ $report_text }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--@if(Auth::user()->member->auto_profile_match == 1)-->
                    <!--  <div class="mb-4">-->
                    <!--      <div class="d-flex justify-content-between">-->
                    <!--          <h3 class="fs-18 mb-3">{{ translate('Similar Profiles') }}</h3>-->
                              <!-- <a href="" class="mt-1">{{ translate('See More') }}</a> -->
                    <!--      </div>-->
                    <!--      <div>-->
                    <!--          @foreach ($similar_profiles->shuffle()->take(4) as $similar_profile)-->
                    <!--            @if($similar_profile->matched_profile != null)-->
                    <!--              <a href="{{ route('member_profile', $similar_profile->match_id) }}" class="text-reset border rounded row no-gutters align-items-center mb-3">-->
                    <!--                  <div class="col-auto w-120px">-->
                    <!--                      <img-->
                    <!--                          src="{{ uploaded_asset($similar_profile->matched_profile->photo) }}"-->
                    <!--                          onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"-->
                    <!--                          class="img-fit w-100 size-120px"-->
                    <!--                   alt="no.1marry"   >-->
                    <!--                  </div>-->
                    <!--                  <div class="col">-->
                    <!--                    <div class="p-3">-->
                    <!--                        <h5 class="fs-16 text-body text-truncate">{{ $similar_profile->matched_profile->first_name.' '.$similar_profile->matched_profile->last_name }}</h5>-->
                    <!--                        <div class="fs-12 text-truncate-3">-->
                    <!--                            <span class="mr-1 d-inline-block">-->
                    <!--                              @if(!empty($similar_profile->matched_profile->member->birthday))-->
                    <!--                                {{ \Carbon\Carbon::parse($similar_profile->matched_profile->member->birthday)->age }} {{ translate('yrs') }},-->
                    <!--                              @endif-->
                    <!--                            </span>-->
                    <!--                            <span class="mr-1 d-inline-block">-->
                    <!--                              @if(!empty($similar_profile->matched_profile->physical_attributes->height))-->
                    <!--                                {{ $similar_profile->matched_profile->physical_attributes->height }} {{ translate('Feet') }},-->
                    <!--                              @endif-->
                    <!--                            </span>-->
                    <!--                            <span class="mr-1 d-inline-block">-->
                    <!--                              @if(!empty($similar_profile->matched_profile->member->marital_status->name))-->
                    <!--                                {{ $similar_profile->matched_profile->member->marital_status->name }},-->
                    <!--                              @endif-->
                    <!--                            </span>-->
                    <!--                            <span class="mr-1 d-inline-block">-->
                    <!--                              {{ !empty($similar_profile->matched_profile->spiritual_backgrounds->religion->name) ? $similar_profile->matched_profile->spiritual_backgrounds->religion->name.', ' : "" }}-->
                    <!--                            </span>-->
                    <!--                            <span class="mr-1 d-inline-block">-->
                    <!--                              {{ !empty($similar_profile->matched_profile->spiritual_backgrounds->caste->name) ? $similar_profile->matched_profile->spiritual_backgrounds->caste->name.', ' : "" }}-->
                    <!--                            </span>-->
                    <!--                            <span class="mr-1 d-inline-block">-->
                    <!--                              <td class="py-1">{{ !empty($similar_profile->matched_profile->spiritual_backgrounds->sub_caste->name) ? $similar_profile->matched_profile->spiritual_backgrounds->sub_caste->name : "" }}</td>-->
                    <!--                            </span>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                  </div>-->
                    <!--              </a>-->
                    <!--            @endif-->
                    <!--          @endforeach-->
                    <!--      </div>-->
                    <!--  </div>-->
                    <!--@endif-->
                    <!--<div class="border rounded">-->
                    <!--    <a href="{{ get_setting('public_profile_page_banner_link') }}" class="text-reset">-->
                    <!--        <img src="{{ uploaded_asset(get_setting('public_profile_page_banner')) }}" alt="no.1marry" class="img-fluid w-100">-->
                    <!--    </a>-->
                    <!--</div>-->
                </div>
            </div>
            <div class="col-xl-8">
                <div class="overflow-hidden rounded shadow-lg mb-4 bg-white d-xl-none">
                    <img
                        src="{{ uploaded_asset($user->photo) }}"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"
                        class="img-fluid w-100"
                   alt="no.1marry" >
                </div>

                <div class="mb-4 p-4 border rounded border-gray-200 d-xl-none">
                    <div class="fs-12">
                        <span class="opacity-60">{{ translate('Member ID: ') }}</span>
                        <span class="ml-1 text-primary">{{ $user->code }}</span>
                    </div>
                    <h2 class="fs-20 fw-500 mb-4">{{ $user->first_name.' '.$user->last_name }}</h2>

                    <div class="mb-2">
                            @php
                              $shortlist = \App\Models\Shortlist::where('user_id', $user->id)->where('shortlisted_by',Auth::user()->id)->first();
                              if(empty($shortlist)){
                                  $shortlist_onclick  = 1;
                                  $shortlist_text     = translate('Shortlist');
                              }
                              else{
                                  $shortlist_onclick  = 0;
                                  $shortlist_text     = translate('Shortlisted');
                              }
                            @endphp
                            <a href="avascript:void(0);" id="shortlist_a_id_{{ $user->id }}"
                                  @if($shortlist_onclick == 1)
                                    onclick="do_shortlist({{ $user->id }})"
                                  @else
                                    onclick="remove_shortlist({{ $user->id }})"
                                  @endif
                                class="btn btn-block btn-primary text-left w-100 d-flex justify-content-md-center align-items-md-center">
                                <i class="las la-list d-block la-2x"></i>
                                <span id="shortlist_id_{{ $user->id }}">{{ $shortlist_text }}</span>
                            </a>
                        </div>
                        <!--@if (Auth::check() && Auth::user()->membership == 3)-->
                        <!--<div class="mb-2">-->
                        <!--    <a href="{{ route('marriage.support', $user->id) }}" id="marry_suport"-->
                        <!--      class="btn btn-block btn-primary text-left w-100 d-flex justify-content-md-center align-items-md-center mrg_btn">-->
                        <!--      <i class="las la-headset d-block la-2x"></i>-->
                        <!--      <span>Marriage Support</span>-->
                        <!--    </a> -->
                        <!--</div>-->
                        <!--@endif-->

                        <!--<div class="mb-2">-->
                        <!--    <a href="{{ route('photo.request', $user->id) }}" id="requst_suport"-->
                        <!--        class="btn btn-block btn-primary text-left w-100 d-flex justify-content-md-center align-items-md-center">-->
                        <!--        <i class="las la-portrait d-block la-2x"></i>-->
                        <!--        <span>Photo Request</span>-->
                        <!--    </a>-->
                        <!--</div>-->
                     <div class="mb-2 row">
                            <div class="col w-100">
                                <a href="avascript:void(0);" onclick="ignore_member({{ $user->id }})" class="btn btn-block btn-primary text-left w-100">
                                    <i class="las la-ban d-block la-2x"></i>
                                    {{ translate('Ignore') }}
                                </a>
                            </div>
                            <div class="col w-100">
                                @php
                                  $profile_reported = \App\Models\ReportedUser::where('user_id', $user->id)->where('reported_by',Auth::user()->id)->first();
                                  if(empty($profile_reported)){
                                      $report_onclick  = 1;
                                      $report_text     = translate('Report');
                                  }
                                  else{
                                      $report_onclick  = 0;
                                      $report_text     = translate('Reported');
                                  }
                                @endphp
                                <a href="avascript:void(0);" id="report_a_id_{{ $user->id }}"
                                  @if($report_onclick == 1)
                                    onclick="report_member({{ $user->id }})"
                                  @endif
                                    class="btn btn-block btn-primary text-left w-100">
                                    <i class="las la-info-circle d-block la-2x"></i>
                                    <span id="report_id_{{ $user->id }}">{{ $report_text }}
                                </a>
                            </div>
                        </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="profile">
                        <svg style="height: 0;width: 0;opacity: 0;visibility: hidden;">
                            <defs>
                                <linearGradient id="primary-gradient" x1="0.5" x2="0.5" y2="1"
                                    gradientUnits="objectBoundingBox">
                                    <stop offset="0" stop-color="{{ get_setting('secondary_color', '#FD655B')}}" />
                                    <stop offset="1" stop-color="{{ get_setting('base_color', '#FD655B') }}" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="accordion aiz-timeline-accordion" id="profile-accordion">
<div class="col-lg-12">
    @if (Auth::user()->member->gender == 2)
        <!-- Show Profile Details for Female Users -->
        <div class="pb-4">
            <!--<h3 class="fs-16 fw-600 mb-0">-->
            <!--    {{ translate('PAYMENT STATUS : COMPLETED') }}-->
            <!--</h3>-->
        </div>
    @elseif ($payment)        
    <!-- Show Profile Details -->
        <div class="pb-4">
            <h3 class="fs-16 fw-600 mb-0">
                {{ translate('PAYMENT STATUS : COMPLETED') }}
            </h3>
        </div>
    @else
            <!-- Payment Popup -->
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">{{ translate('Payment Required') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ translate('Please complete the payment to view the full profile with contact number.') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="package_purchase()" data-bs-dismiss="modal" style="width:100px">{{ translate('Proceed to Pay ₹49') }}</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" style="width:100px">{{ translate('Cancel and Continue') }}</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- Show Payment Form -->
        <form id="package-payment-form" class="form-default" role="form" method="POST" action="{{ route('razorpay.payment') }}">
            @csrf
            <input type="hidden" name="profile_id" value="{{ $profileId }}">
            <input type="hidden" name="amount" value="4900">
            <input type="hidden" name="payment_type" value="razorpay">
            <input type="hidden" name="payment_option" value="razorpay">
            <input type="hidden" id="razorpay_payment_id" name="razorpay_payment_id" value="pay_76732874">

            <div class="card shadow-none">
                <div class="card-header p-3">
                     <h3 class="fs-16 fw-600 mb-0">
                        {{ translate('Complete the payment to view the profile with contact number') }}
                    </h3>

                </div>
                <div class="card-body">
                                        <!--<h3 class="fs-16 fw-600 mb-0 p-b-3">-->
                        <!--{{ translate('AMOUNT : ₹25') }}-->
                    <!--</h3>-->
                    <div class="row">
                        <div class="col-xxl-8 col-xl-10 mx-auto">
                            <div class="row gutters-10">
                                    <div class="col-12 col-md-6">
                                        <label class="aiz-megabox d-block mb-3">
                                            <input value="razorpay" class="online_payment" onclick="package_purchase()" name="payment_option" onclick="enablePurchaseButton()">
                                            <span class="d-block p-3 aiz-megabox-elem">
                                                <img  src="{{ static_asset('assets/img/payment_method/rozarpay.png') }}" class="img-fluid mb-2">
                                                <span class="d-block text-center">
                                                    <span class="d-block fw-600 fs-15">{{ translate('Pay ₹49 Now') }}</span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class=" text-right pt-3">-->
            <!--    <button type="button" onclick="package_purchase()" class="btn btn-primary fw-600 purchase_button" >{{ translate('Pay ₹25 Now')}}</button>-->
            <!--</div>-->
        </form>
    @endif
</div>

@section('script')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script type="text/javascript">
    // Enable the "Confirm" button when a payment option is selected
    // function enablePurchaseButton() {
    //     $('.purchase_button').prop('disabled', false);
    // }

function package_purchase(el) {
    console.log('Payment process started');  // Add this log
    
    const selectedPaymentOption = $('input[name="payment_option"]').val();

    if (!selectedPaymentOption) {
        AIZ.plugins.notify('danger', '{{ translate('Please select a payment option.') }}');
        return;
    }

    // Set payment type value in hidden field
    $('#payment_type').val(selectedPaymentOption);

    // Disable the button to prevent multiple clicks
    $(el).prop('disabled', true);

    // Submit the form and get payment details from the server
    $.ajax({
        type: "POST",
        url: $('#package-payment-form').attr('action'),
        data: $('#package-payment-form').serialize(),
        success: function (response) {
            console.log('AJAX Request Success');  // Add this log
            
            var options = {
                "key": "rzp_live_8nkalGgD1djptP", // Your Razorpay Key
                "amount": 4900, // Amount to be paid in paise (this is 2500 for ₹25)
                "currency": "INR",
                "name": "No1Marry",
                "description": "Payment for Profile",
                "image": "your_logo_url",
                "handler": function (response) {
                    console.log('Payment Response: ', response);  // Add this log
                    if (response.razorpay_payment_id) {
                        $('#razorpay_payment_id').val(response.razorpay_payment_id);
                        $('#package-payment-form').submit(); // Submit the form to backend
                    } else {
                        alert('Payment failed. Razorpay Payment ID is missing.');
                    }
                },
                "prefill": {
                    "name": "Customer Name",
                    "email": "customer_email",
                    "contact": "customer_contact"
                },
                "theme": {
                    "color": "#F37254"
                }
            };

            var rzp1 = new Razorpay(options);
            console.log('Razorpay Modal Open');  // Add this log
            rzp1.open(); // Open the Razorpay modal
        },
        error: function (xhr, status, error) {
            console.error('AJAX Request Failed', error);  // Add this log
            alert('There was an error with the payment request. Please try again.');
        }
    });
}


</script>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if (!$payment)
            // Show the modal when the page loads if payment is not completed
            const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
            paymentModal.show();
        @endif
    });
</script>


@if ($payment || Auth::user()->member->gender == 2)
<div class="pb-4">
    <!-- About Section -->
    <div class="d-flex align-items-center mb-4">
        <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="22.034" height="16.525" viewBox="0 0 22.034 16.525" class="fill-primary-grad">
                <path class="fill-dark" d="M28.263,16.525V8.263H22.754a5.514,5.514,0,0,1,5.508-5.508V0A8.272,8.272,0,0,0,20,8.263v8.263Z" transform="translate(-6.229)" />
                <path fill="url(#primary-gradient)" d="M8.263,16.525V8.263H2.754A5.514,5.514,0,0,1,8.263,2.754V0A8.272,8.272,0,0,0,0,8.263v8.263Z" />
            </svg>
        </span>
        <div class="ml-4">
            <span class="fs-18 fw-600 d-block">{{ translate('About ') }}{{ $user->first_name.' '.$user->last_name }}</span>
            <span class="fs-11 fw-400">{{ translate('Member ID: ') }} {{ $user->code }}</span>
        </div>
    </div>
    <div class="ml-3 ml-md-5 pl-25px lh-1-8">
        {{ $user->member->introduction }}
    </div>
</div>

<!-- Basic Information Section -->
<div class="pb-4">
    <div class="d-flex align-items-center mb-4">
        <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="22.936" height="27.722" viewBox="0 0 22.936 27.722" class="fill-primary-grad">
                <g transform="translate(-40.061 0)">
                    <path d="M88.314,328.008h-4.3l-2.39,2.39-2.39-2.39h-4.3a2.868,2.868,0,0,0-2.868,2.868v5.258H91.181v-5.258A2.868,2.868,0,0,0,88.314,328.008Z" transform="translate(-30.09 -308.411)" class="fill-dark"/>
                    <path d="M6.14,25.333H3.824a1.91,1.91,0,0,1-1.912-1.912v-.968a2.015,2.015,0,0,1-.929-.289,1.757,1.757,0,0,1-.589-.634,2.924,2.924,0,0,1-.308-.9A5.794,5.794,0,0,1,0,19.551a2.856,2.856,0,0,1,2.858-2.822h.488l-.079,0a1.434,1.434,0,0,1-1.355-1.509,1.488,1.488,0,0,1,1.482-1.357h.43V7.648c0-.121,0-.245.009-.37a7.611,7.611,0,0,1,1.433-4.1A7.674,7.674,0,0,1,8.59.562,7.6,7.6,0,0,1,11.465,0c.125,0,.251,0,.376.009a7.347,7.347,0,0,1,2.873.73,7.573,7.573,0,0,1,1.238.755,7.8,7.8,0,0,1,1.071.971,8,8,0,0,1,2.1,5.4v6h.43a1.488,1.488,0,0,1,1.482,1.357c0,.024,0,.05,0,.079A1.434,1.434,0,0,1,19.6,16.729h.423a2.934,2.934,0,0,1,2.867,2.305,3.028,3.028,0,0,1,.043.312c0,.048,0,.1,0,.148a2.04,2.04,0,0,1-2.041,2.015h-.031a2.873,2.873,0,0,0-2.7-1.912h-4.3V16.151a5.231,5.231,0,0,0,2.868-4.679V8.6h-.419a1.911,1.911,0,0,1-1.854-1.448L13.383,3.346,12.4,6.794A2.389,2.389,0,0,1,10.085,8.6H6.214v2.868a5.23,5.23,0,0,0,2.868,4.679V19.6H6.3a2.866,2.866,0,0,1,2.778,2.955,2.947,2.947,0,0,1-2.941,2.78Z" transform="translate(40.061 0)" fill="url(#primary-gradient)"/>
                </g>
            </svg>
        </span>
        <div class="ml-4">
            <span class="fs-18 fw-600 d-block">{{ translate('Basic Information') }}</span>
        </div>
    </div>
    <div class="ml-3 ml-md-5 pl-25px">
        <div class="border p-3">
            <div class="row no-gutters">
                <div class="col-sm-6">
                    <table class="w-100">
                        <tbody>
                            <tr>
                                <td class="py-1 fw-600">{{ translate('First Name') }}</td>
                                <td class="py-1">{{ $user->first_name }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 fw-600">{{ translate('Gender') }}</td>
                                <td class="py-1">{{ $user->member->gender == 1 ? translate('Male') : translate('Female') }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 fw-600">{{ translate('Age') }}</td>
                                <td class="py-1">{{ !empty($user->member->birthday) ? \Carbon\Carbon::parse($user->member->birthday)->age : "" }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 fw-600">{{ translate('Religion') }}</td>
                                <td class="py-1">{{ $user->spiritual_backgrounds->religion->name ?? "" }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 fw-600">{{ translate('First Language') }}</td>
                                <td class="py-1">{{ optional(\App\Models\MemberLanguage::find($user->member->mothere_tongue))->name }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 fw-600">{{ translate('No. of Children') }}</td>
                                <td class="py-1">{{ $user->member->children }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6 border-sm-left">
                    <table class="w-100 ml-sm-4">
                        <tbody>
                            <tr>
                                <td class="py-1 fw-600">{{ translate('Last Name') }}</td>
                                <td class="py-1">{{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 fw-600">{{ translate('Height') }}</td>
                                <td class="py-1">{{ $user->physical_attributes->height ?? "" }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 fw-600">{{ translate('Date of Birth') }}</td>
                                <td class="py-1">{{ !empty($user->member->birthday) ? date('d/m/Y', strtotime($user->member->birthday)) : "" }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 fw-600">{{ translate('Caste') }}</td>
                                <td class="py-1">{{ $user->spiritual_backgrounds->caste->name ?? "" }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 fw
-600">{{ translate('Profile Created By') }}</td>
                                <td class="py-1">{{ $user->member->on_behalf->name ?? "" }}</td>
                            </tr>
                            <tr>
                                <td class="py-1 fw-600">{{ translate('Marital Status') }}</td>
                                <td class="py-1">{{ $user->member->marital_status->name ?? "" }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 <!---->
@php
    $view_contact = \App\Models\ViewContact::where('user_id', $user->id)
        ->where('viewed_by', Auth::user()->id)
        ->first();
@endphp

<div class="pb-4">
    <div class="d-flex align-items-center mb-4">
                                    <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19.988" height="19.927" viewBox="0 0 19.988 19.927" class="fill-primary-grad">
                                            <g transform="translate(-1080 -807.536)">
                                                <path d="M19.41,13a3.147,3.147,0,0,1-.67-.12,9.86,9.86,0,0,1-1.31-.39,2,2,0,0,0-2.48,1l-.22.46a13.17,13.17,0,0,1-2.67-2,13.17,13.17,0,0,1-2-2.67l.46-.21a2,2,0,0,0,1-2.48,10.47,10.47,0,0,1-.39-1.32c-.05-.22-.09-.45-.12-.67a3,3,0,0,0-3-2.49H5a2.99,2.99,0,0,0-2.97,3.4A19.008,19.008,0,0,0,18.44,21.92a2.56,2.56,0,0,0,.39,0,2.993,2.993,0,0,0,3-3v-3A3,3,0,0,0,19.41,13Zm.49,6a1.005,1.005,0,0,1-1.15.99,17.16,17.16,0,0,1-9.87-4.84A17.16,17.16,0,0,1,4,5.25,1.005,1.005,0,0,1,5,4.1H8a1,1,0,0,1,1,.78,3.935,3.935,0,0,0,.15.82,11,11,0,0,0,.46,1.54l-1.4.66a1.042,1.042,0,0,0-.52,1.32,14.49,14.49,0,0,0,7,7,1.042,1.042,0,0,0,1.32-.52l.63-1.4a12.41,12.41,0,0,0,1.58.46c.26.06.54.11.81.15a1,1,0,0,1,.78,1ZM14,2h-.7a1,1,0,1,0,.17,2H14a6,6,0,0,1,6,6v.53a1,1,0,0,0,.91,1.08h.08a1,1,0,0,0,1-.91V10A8,8,0,0,0,14,2Zm2,8a1,1,0,0,0,2,0,4,4,0,0,0-4-4,1,1,0,0,0,0,2A2,2,0,0,1,16,10Z" transform="translate(1077.998 805.536)" class="fill-dark"/>
                                                <path d="M19.41,13a3.147,3.147,0,0,1-.67-.12,9.86,9.86,0,0,1-1.31-.39,2,2,0,0,0-2.48,1l-.22.46a13.17,13.17,0,0,1-2.67-2,13.17,13.17,0,0,1-2-2.67l.46-.21a2,2,0,0,0,1-2.48,10.47,10.47,0,0,1-.39-1.32c-.05-.22-.09-.45-.12-.67a3,3,0,0,0-3-2.49H5a2.99,2.99,0,0,0-2.97,3.4A19.008,19.008,0,0,0,18.44,21.92a2.56,2.56,0,0,0,.39,0,2.993,2.993,0,0,0,3-3v-3A3,3,0,0,0,19.41,13Zm.49,6a1.005,1.005,0,0,1-1.15.99,17.16,17.16,0,0,1-9.87-4.84A17.16,17.16,0,0,1,4,5.25,1.005,1.005,0,0,1,5,4.1H8a1,1,0,0,1,1,.78,3.935,3.935,0,0,0,.15.82,11,11,0,0,0,.46,1.54l-1.4.66a1.042,1.042,0,0,0-.52,1.32,14.49,14.49,0,0,0,7,7,1.042,1.042,0,0,0,1.32-.52l.63-1.4a12.41,12.41,0,0,0,1.58.46c.26.06.54.11.81.15a1,1,0,0,1,.78,1Z" transform="translate(1077.998 805.536)" fill="url(#primary-gradient)"/>
                                            </g>
                                        </svg>
                                    </span>
        <div class="ml-4">
            <span class="fs-18 fw-600">{{ translate('Contact Details') }}</span>
        </div>
    </div>
    <div class="ml-3 ml-md-5 pl-25px">
        <div class="border p-3">
                <div class="d-flex mb-3">
                    <i class="las la-phone text-primary la-2x mr-3"></i>
                    <div>
                        <div class="fs-15 fw-600 mb-1">{{ translate('Contact Number') }}</div>
                        <div class="fw-400">{{ $user->phone }}</div>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="las la-envelope text-primary la-2x mr-3"></i>
                    <div>
                        <div class="fs-15 fw-600 mb-1">{{ translate('Email ID') }}</div>
                        <div class="fw-400">{{ $user->email }}</div>
                    </div>
                </div>
        </div>
    </div>
</div>




                            <!-- Education -->
                            @if(get_setting('member_education_section') == 'on')
                            <div class="pb-4">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24.971" height="20.838" viewBox="0 0 24.971 20.838" class="fill-primary-grad">
                                            <g transform="translate(-2.499 -3.917)">
                                                <path d="M5.565,15.1V18.46a2.4,2.4,0,0,0,1.242,2.1l5.972,3.261a2.371,2.371,0,0,0,2.293,0l5.972-3.261a2.4,2.4,0,0,0,1.242-2.1V15.1l-7.214,3.941a2.371,2.371,0,0,1-2.293,0ZM12.779,3.567,2.711,9.061a1.2,1.2,0,0,0,0,2.1l10.068,5.494a2.371,2.371,0,0,0,2.293,0l9.6-5.243v7.059a1.194,1.194,0,0,0,2.389,0V10.816a1.2,1.2,0,0,0-.621-1.051l-11.37-6.2a2.436,2.436,0,0,0-2.293,0Z" transform="translate(0.407 0.637)" fill="url(#primary-gradient)" />
                                                <path d="M5.565,15.1V18.46a2.4,2.4,0,0,0,1.242,2.1l5.972,3.261a2.371,2.371,0,0,0,2.293,0l5.972-3.261a2.4,2.4,0,0,0,1.242-2.1V15.1l-7.214,3.941C14.355,19.439,13.5,19.439,5.565,15.1Z" transform="translate(0.407 0.637)" class="fill-dark" />
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="ml-4">
                                        <span class="fs-18 fw-600">{{ translate('Education') }}</span>
                                    </div>
                                </div>
                                <table class="table table-borderless border">
                                    <thead>
                                        <tr>
                                            <th>{{ translate('Degree') }}</th>
                                            <th>{{ translate('Institution') }}</th>
                                            <th>{{ translate('Start') }}</th>
                                            <th>{{ translate('End') }}</th>
                                            <th>{{ translate('Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $educations = \App\Models\Education::where('user_id',$user->id)->get(); @endphp
                                        @foreach ($educations as $education)
                                        <tr>
                                            <td>{{ $education->degree }}</td>
                                            <td>{{ $education->institution }}</td>
                                            <td>{{ $education->start }}</td>
                                            <td>{{ $education->end }}</td>
                                            <td>
                                                @if($education->present == 1)
                                                <span class="badge badge-inline badge-success">{{ translate('Running') }}</span>
                                                @else
                                                <span class="badge badge-inline badge-danger">{{ translate('Completed') }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            
                            <!-- Career -->
                            @if(get_setting('member_career_section') == 'on')
                            <div class="pb-4">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23.094" height="20.532" viewBox="0 0 23.094 20.532" class="fill-primary-grad">
                                            <path d="M23.094,15.794v4a3.467,3.467,0,0,1-.983,1.7A3.755,3.755,0,0,1,19.5,22.534H13.277V21.317a.938.938,0,0,0-.935-.935H10.752a.938.938,0,0,0-.935.935v1.217H3.6A3.756,3.756,0,0,1,.983,21.5,3.46,3.46,0,0,1,0,19.792v-4a1.572,1.572,0,0,1,1.567-1.567h19.96A1.572,1.572,0,0,1,23.094,15.794ZM12.342,24.686a.153.153,0,0,0,.151-.151V21.317a.153.153,0,0,0-.151-.151H10.752a.154.154,0,0,0-.151.151v3.218a.153.153,0,0,0,.151.151Zm10.312-2.625A4.536,4.536,0,0,1,19.5,23.318H13.277v1.217a.938.938,0,0,1-.935.935H10.752a.938.938,0,0,1-.935-.935V23.318H3.6A4.536,4.536,0,0,1,.44,22.061,4.446,4.446,0,0,1,0,21.571v8.486a1.572,1.572,0,0,0,1.567,1.567h19.96a1.572,1.572,0,0,0,1.567-1.567V21.571A4.435,4.435,0,0,1,22.654,22.061ZM15.161,11.551a1.563,1.563,0,0,0-1.108-.459H9.042a1.567,1.567,0,0,0-1.568,1.567v.784H8.807v-.784a.236.236,0,0,1,.236-.235h5.01a.236.236,0,0,1,.235.235v.784H15.62v-.784A1.564,1.564,0,0,0,15.161,11.551Z" transform="translate(0 -11.092)" fill="url(#primary-gradient)"/>
                                        </svg>
                                    </span>
                                    <div class="ml-4">
                                        <span class="fs-18 fw-600">{{ translate('Career') }}</span>
                                    </div>
                                </div>
                                <table class="table table-borderless border">
                                    <thead>
                                        <tr>
                                            <th>{{ translate('Designation') }}</th>
                                            <th>{{ translate('Company') }}</th>
                                            <th>{{ translate('Start') }}</th>
                                            <th>{{ translate('End') }}</th>
                                            <th>{{ translate('Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $careers = \App\Models\Career::where('user_id',$user->id)->get(); @endphp
                                        @foreach ($careers as $career)
                                        <tr>
                                            <td>{{ $career->designation }}</td>
                                            <td>{{ $career->company }}</td>
                                            <td>{{ $career->start }}</td>
                                            <td>{{ $career->end }}</td>
                                            <td>
                                                @if($career->present == 1)
                                                <span class="badge badge-inline badge-success">{{ translate('Active') }}</span>
                                                @else
                                                <span class="badge badge-inline badge-danger">{{ translate('Deactive') }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif


                            <!-- Physical Attributes Section -->
                            @if(get_setting('member_physical_attributes_section') == 'on')
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Physical Attributes</h5>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Height</th>
                                                        <td>{{ $user->physical_attributes->height ?? '' }}</td>
                                                        <th>Eye Color</th>
                                                        <td>{{ $user->physical_attributes->eye_color ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Weight</th>
                                                        <td>{{ $user->physical_attributes->weight ?? '' }}</td>
                                                        <th>Hair Color</th>
                                                        <td>{{ $user->physical_attributes->hair_color ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Complexion</th>
                                                        <td>{{ $user->physical_attributes->complexion ?? '' }}</td>
                                                        <th>Blood Group</th>
                                                        <td>{{ $user->physical_attributes->blood_group ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Body Type</th>
                                                        <td>{{ $user->physical_attributes->body_type ?? '' }}</td>
                                                        <th>Body Art</th>
                                                        <td>{{ $user->physical_attributes->body_art ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Disability</th>
                                                        <td>{{ $user->physical_attributes->disability ?? '' }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Language Section -->
                            @if(get_setting('member_language_section') == 'on')
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Language</h5>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Mother Tongue</th>
                                                        <td>{{ optional($user->member)->mothere_tongue ? \App\Models\MemberLanguage::find($user->member->mothere_tongue)->name : '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Known Languages</th>
                                                        <td>
                                                            @if(!empty($user->member->known_languages))
                                                                @foreach(json_decode($user->member->known_languages) as $language_id)
                                                                    {{ \App\Models\MemberLanguage::find($language_id)->name ?? '' }}{{ !$loop->last ? ', ' : '' }}
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            @if(get_setting('member_hobbies_and_interests_section') == 'on')
                            <div class="pb-4">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24.534" height="17.71" viewBox="0 0 24.534 17.71" class="fill-primary-grad">
                                            <g transform="translate(-1078.174 -2016.025)">
                                                <path d="M3.674,3.457a1.455,1.455,0,0,1,2.2-1.25L18.3,9.6a1.454,1.454,0,0,1,0,2.5L5.873,19.5a1.455,1.455,0,0,1-2.2-1.25Z" transform="translate(1074.5 2014.025)" fill="url(#primary-gradient)"/>
                                                <path d="M10.858,1.01A8.849,8.849,0,0,0,2,9.863v8.175a.708.708,0,0,0,.681.681H5.409a2.041,2.041,0,0,0,1.538-.644,2.157,2.157,0,0,0,.505-1.445V12.588a2.139,2.139,0,0,0-.482-1.365,1.82,1.82,0,0,0-1.391-.668H3.366V9.863a7.492,7.492,0,0,1,14.983,0v.692H16.136a1.82,1.82,0,0,0-1.391.668,2.139,2.139,0,0,0-.482,1.365v4.044a2.157,2.157,0,0,0,.505,1.445,2.041,2.041,0,0,0,1.538.644H19.03a.708.708,0,0,0,.681-.681V14.8q0-.023,0-.045v-4.9A8.849,8.849,0,0,0,10.858,1.01Z" transform="translate(1082.996 2015.015)" class="fill-dark"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="ml-4">
                                        <span class="fs-18 fw-600">{{ translate('Hobbies & Interest') }}</span>
                                    </div>
                                </div>
                                <div class="border p-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="w-100">
                                                <tr><th class="py-1">{{translate('Hobbies')}}</th><td class="py-1">{{ $user->hobbies->hobbies ?? '' }}</td></tr>
                                                <tr><th class="py-1">{{translate('Music')}}</th><td class="py-1">{{ $user->hobbies->music ?? '' }}</td></tr>
                                                <tr><th class="py-1">{{translate('Movies')}}</th><td class="py-1">{{ $user->hobbies->movies ?? '' }}</td></tr>
                                                <tr><th class="py-1">{{translate('Sports')}}</th><td class="py-1">{{ $user->hobbies->sports ?? '' }}</td></tr>
                                                <tr><th class="py-1">{{translate('Cuisines')}}</th><td class="py-1">{{ $user->hobbies->cuisines ?? '' }}</td></tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="w-100">
                                                <tr><th class="py-1">{{translate('Interests')}}</th><td class="py-1">{{ $user->hobbies->interests ?? '' }}</td></tr>
                                                <tr><th class="py-1">{{translate('Books')}}</th><td class="py-1">{{ $user->hobbies->books ?? '' }}</td></tr>
                                                <tr><th class="py-1">{{translate('TV Shows')}}</th><td class="py-1">{{ $user->hobbies->tv_shows ?? '' }}</td></tr>
                                                <tr><th class="py-1">{{translate('Fitness Activities')}}</th><td class="py-1">{{ $user->hobbies->fitness_activities ?? '' }}</td></tr>
                                                <tr><th class="py-1">{{translate('Dress Styles')}}</th><td class="py-1">{{ $user->hobbies->dress_styles ?? '' }}</td></tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif


                            @if(get_setting('member_personal_attitude_and_behavior_section') == 'on')
                            <div class="pb-4">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="23.306" height="26.808" viewBox="0 0 23.306 26.808" class="fill-primary-grad">
                                            <g transform="translate(-0.5)">
                                                <path d="M122.448,136.226a.785.785,0,0,0-.555-.23h-4.206a.785.785,0,0,0,0,1.571H120l-4.052,4.052-2.419-2.419a.786.786,0,0,0-1.111,0l-2.974,2.974a.785.785,0,1,0,1.111,1.111l2.419-2.419,2.419,2.419a.785.785,0,0,0,1.111,0l4.608-4.608v2.31a.785.785,0,1,0,1.571,0v-4.206A.785.785,0,0,0,122.448,136.226Zm0,0" transform="translate(-103.018 -128.875)" class="fill-dark"/>
                                                <path d="M12.926,0A10.892,10.892,0,0,0,2.046,10.747l-1.3,3.778a2.838,2.838,0,0,0,.064,2.506,1.226,1.226,0,0,0,1.006.523h.224v1.318A2.892,2.892,0,0,0,4.934,21.76a1.319,1.319,0,0,1,1.318,1.318v.841A2.892,2.892,0,0,0,9.14,26.808h5.889a2.892,2.892,0,0,0,2.888-2.889V20.548A10.88,10.88,0,0,0,12.926,0ZM16.8,19.344a.786.786,0,0,0-.458.714v3.861a1.319,1.319,0,0,1-1.318,1.318H9.14a1.319,1.319,0,0,1-1.318-1.318v-.841A2.892,2.892,0,0,0,4.934,20.19a1.319,1.319,0,0,1-1.318-1.318v-2.1a.785.785,0,0,0-.785-.785H2.075a2.456,2.456,0,0,1,.162-.949l1.337-3.9a.788.788,0,0,0,.042-.255A9.31,9.31,0,1,1,16.8,19.344Zm0,0" fill="url(#primary-gradient)"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="ml-4">
                                        <span class="fs-18 fw-600">{{ translate('Personal Attitude & Behavior') }}</span>
                                    </div>
                                </div>
                                <div class="border p-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="w-100">
                                                <tr><th class="py-1">{{translate('Affection')}}</th><td class="py-1">{{ $user->attitude->affection ?? '' }}</td></tr>
                                                <tr><th class="py-1">{{translate('Political Views')}}</th><td class="py-1">{{ $user->attitude->political_views ?? '' }}</td></tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            @if(get_setting('member_residency_information_section') == 'on')
                            <!-- Residency Information -->
                            <div class="pb-4">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28.394" height="27.785" viewBox="0 0 28.394 27.785" class="fill-primary-grad">
                                            <g transform="translate(-1076.803 -2260.108)">
                                                <path d="M28.066,14.1a1.109,1.109,0,0,1-1.569,0l-.877-.883v4.038a1.109,1.109,0,1,1-2.218,0V10.976L14.967,2.485a1.108,1.108,0,0,0-1.439,0L4.99,11c0,.011,0,.021,0,.032V22.793a2.221,2.221,0,0,0,2.218,2.218H8.6a1.109,1.109,0,0,1,0,2.218H7.209a4.441,4.441,0,0,1-4.437-4.437V13.217l-.88.878a1.109,1.109,0,1,1-1.567-1.57L11.987.886l.046-.043a3.325,3.325,0,0,1,4.436.009L16.515.9,28.071,12.528a1.109,1.109,0,0,1,0,1.568Zm-3.555,7.587A1.109,1.109,0,0,0,23.4,22.793a2.221,2.221,0,0,1-2.218,2.218H19.8a1.109,1.109,0,1,0,0,2.218h1.386a4.441,4.441,0,0,0,4.437-4.437A1.109,1.109,0,0,0,24.512,21.684Zm-3.327-4.056c0,2.97-1.769,4.879-3.478,6.726a20.583,20.583,0,0,0-2.382,2.914,1.109,1.109,0,0,1-.938.516h-.381a1.109,1.109,0,0,1-.938-.516,20.583,20.583,0,0,0-2.382-2.914C8.979,22.507,7.212,20.6,7.209,17.63a6.988,6.988,0,0,1,13.975,0Zm-2.218,0a4.769,4.769,0,0,0-9.539,0c0,2.1,1.276,3.474,2.888,5.217.633.683,1.28,1.383,1.882,2.168.6-.785,1.249-1.485,1.882-2.168,1.612-1.743,2.886-3.119,2.888-5.219Zm-4.819-3.042a3.05,3.05,0,1,0,0,6.1,1.109,1.109,0,1,0,0-2.218.832.832,0,1,1,.832-.832,1.109,1.109,0,1,0,2.218,0A3.053,3.053,0,0,0,14.147,14.586Zm0,0" transform="translate(1076.803 2260.108)" fill="url(#primary-gradient)"/>
                                                <path d="M21.184,17.628c0,2.97-1.769,4.879-3.478,6.726a20.583,20.583,0,0,0-2.382,2.914,1.109,1.109,0,0,1-.938.516h-.381a1.109,1.109,0,0,1-.938-.516,20.583,20.583,0,0,0-2.382-2.914C8.979,22.507,7.212,20.6,7.209,17.63a6.988,6.988,0,0,1,13.975,0Zm-2.218,0a4.769,4.769,0,0,0-9.539,0c0,2.1,1.276,3.474,2.888,5.217.633.683,1.28,1.383,1.882,2.168.6-.785,1.249-1.485,1.882-2.168,1.612-1.743,2.886-3.119,2.888-5.219Zm-4.819-3.042a3.05,3.05,0,1,0,0,6.1,1.109,1.109,0,1,0,0-2.218.832.832,0,1,1,.832-.832,1.109,1.109,0,1,0,2.218,0A3.053,3.053,0,0,0,14.147,14.586Zm0,0" transform="translate(1076.803 2260.108)" class="fill-dark"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="ml-4">
                                        <span class="fs-18 fw-600 d-block">{{ translate('Residency Information') }}</span>
                                    </div>
                                </div>
                                <div class="border p-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <table class="w-100">
                                                <tbody>
                                                    <tr>
                                                        <th class="py-1">{{translate('Birth Country')}}</th>
                                                        <td class="py-1">
                                                            @if(!empty($user->recidency->birth_country_id))
                                                            {{ App\Models\Country::where('id',$user->recidency->birth_country_id)->first()->name }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="py-1">{{translate('Growup Country')}}</th>
                                                        <td class="py-1">
                                                            @if(!empty($user->recidency->growup_country_id))
                                                            {{ App\Models\Country::where('id',$user->recidency->growup_country_id)->first()->name }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6 border-sm-left">
                                            <table class="w-100 ml-sm-4">
                                                <tbody>
                                                    <tr>
                                                        <th class="py-1">{{translate('Recidency Country')}}</th>
                                                        <td class="py-1">
                                                            @if(!empty($user->recidency->recidency_country_id))
                                                            {{ App\Models\Country::where('id',$user->recidency->recidency_country_id)->first()->name }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="py-1">{{translate('Immigration Status')}}</th>
                                                        <td class="py-1">{{ !empty($user->recidency->immigration_status) ? $user->recidency->immigration_status : "" }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            @if(get_setting('member_spiritual_and_social_background_section') == 'on')
                            <!-- Spiritual & Social Background -->
                            <div class="pb-4">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21.754" height="20.248" viewBox="0 0 21.754 20.248" class="fill-primary-grad">
                                            <g transform="translate(0 -17.721)">
                                                <path d="M126.787,17.722a1.055,1.055,0,0,0-1.039.9l-1.361,10.665a.636.636,0,0,1-.231.414l-1.343,1.088,2.357,2.395,2.378-2.378a.976.976,0,0,0,.288-.695V18.772a1.051,1.051,0,0,0-1.05-1.05Z" transform="translate(-117.595 -0.001)" fill="url(#primary-gradient)"/>
                                                <path d="M7.45,327.309l-4.1-4.167-3.1,2.39a.636.636,0,0,0-.077.936l3.478,3.742a.636.636,0,0,0,.918.014Z" transform="translate(0 -292.444)" class="fill-dark"/>
                                                <path d="M275.985,30.785,274.642,29.7a.636.636,0,0,1-.231-.414l-1.361-10.665a1.05,1.05,0,0,0-2.089.152V30.107a.976.976,0,0,0,.288.695l2.378,2.378Z" transform="translate(-259.449)" fill="url(#primary-gradient)"/>
                                                <path d="M340.766,323.142l-4.1,4.167,2.884,2.915a.636.636,0,0,0,.918-.014l3.478-3.742a.636.636,0,0,0-.077-.936Z" transform="translate(-322.359 -292.444)" class="fill-dark"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="ml-4">
                                        <span class="fs-18 fw-600 d-block">{{ translate('Spiritual & Social Background') }}</span>
                                    </div>
                                </div>
                                <div class="ml-3 ml-md-5 pl-25px">
                                    <div class="border p-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <table class="w-100">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1">{{translate('Religion')}}</th>
                                                            <td class="py-1">{{ !empty($user->spiritual_backgrounds->religion->name) ? $user->spiritual_backgrounds->religion->name : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('Sub Caste')}}</th>
                                                            <td class="py-1">{{ !empty($user->spiritual_backgrounds->sub_caste->name) ? $user->spiritual_backgrounds->sub_caste->name : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('Personal Value')}}</th>
                                                            <td class="py-1">{{ !empty($user->spiritual_backgrounds->personal_value) ? $user->spiritual_backgrounds->personal_value : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('Community Value')}}</th>
                                                            <td class="py-1">{{ !empty($user->spiritual_backgrounds->community_value) ? $user->spiritual_backgrounds->community_value : "" }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6 border-sm-left ">
                                                <table class="w-100 ml-sm-4">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1">{{translate('Caste')}}</th>
                                                            <td class="py-1">{{ !empty($user->spiritual_backgrounds->caste->name) ? $user->spiritual_backgrounds->caste->name : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('Ethnicity')}}</th>
                                                            <td class="py-1">{{ !empty($user->spiritual_backgrounds->ethnicity) ? $user->spiritual_backgrounds->ethnicity : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('Family Value')}}</th>
                                                            <td class="py-1">{{ !empty($user->spiritual_backgrounds->family_value->name) ? $user->spiritual_backgrounds->family_value->name : "" }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if(get_setting('member_life_style_section') == 'on')
                            <!-- Life Style -->
                            <div class="pb-4">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24.514" height="19.98" viewBox="0 0 24.514 19.98" class="fill-primary-grad">
                                            <g transform="translate(1 1)">
                                                <path d="M11.291,6.46A11.257,11.257,0,0,0,.034,17.717H22.548A11.257,11.257,0,0,0,11.291,6.46Z" transform="translate(-0.034 -3.802)" fill="url(#primary-gradient)"/>
                                                <path d="M.034,39.126H22.548" transform="translate(-0.034 -21.146)" stroke="#4d4d4d" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="url(#primary-gradient)"/>
                                                <path d="M24.034.793V3.451" transform="translate(-12.777 -0.793)" stroke="#4d4d4d" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="url(#primary-gradient)"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <div class="ml-4">
                                        <span class="fs-18 fw-600 d-block">{{ translate('Life Style') }}</span>
                                    </div>
                                </div>
                                <div class="ml-3 ml-md-5 pl-25px">
                                    <div class="border p-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <table class="w-100">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1">{{translate('Diet')}}</th>
                                                            <td class="py-1">{{ !empty($user->lifestyles->diet) ? $user->lifestyles->diet : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('Smoke')}}</th>
                                                            <td class="py-1">{{ !empty($user->lifestyles->smoke) ? $user->lifestyles->smoke : "" }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6 border-sm-left">
                                                <table class="w-100 ml-sm-4">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1">{{translate('Drink')}}</th>
                                                            <td class="py-1">{{ !empty($user->lifestyles->drink) ? $user->lifestyles->drink : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('Living With')}}</th>
                                                            <td class="py-1">{{ !empty($user->lifestyles->living_with) ? $user->lifestyles->living_with : "" }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            @if(get_setting('member_astronomic_information_section') == 'on')
                            <!-- Astronomic Information -->
                            <div class="pb-4">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="23.856" height="23.857" viewBox="0 0 23.856 23.857" class="fill-primary-grad">
                                            <path d="M11.928,0A11.928,11.928,0,1,0,23.856,11.928,11.928,11.928,0,0,0,11.928,0Zm9.8,11.333-5.375-1.24,2.923-4.677A9.739,9.739,0,0,1,21.733,11.333ZM18.44,4.574,13.763,7.5l-1.24-5.374A9.738,9.738,0,0,1,18.44,4.574ZM11.333,2.123,10.093,7.5,5.416,4.574A9.739,9.739,0,0,1,11.333,2.123ZM4.574,5.416,7.5,10.093l-5.375,1.24A9.738,9.738,0,0,1,4.574,5.416ZM2.123,12.523,7.5,13.763,4.574,18.44A9.739,9.739,0,0,1,2.123,12.523Zm3.292,6.759,4.677-2.923,1.24,5.375A9.738,9.738,0,0,1,5.416,19.282Zm4.2-7.354a2.805,2.805,0,0,1,4.617-2.143,2.173,2.173,0,0,0,0,4.285,2.8,2.8,0,0,1-4.617-2.143Zm2.9,9.8,1.24-5.375,4.677,2.923A9.739,9.739,0,0,1,12.523,21.733Zm6.759-3.292-2.923-4.677,5.375-1.24A9.738,9.738,0,0,1,19.282,18.44Z" fill="url(#primary-gradient)"/>
                                            <path d="M-15498.071,23.857a11.847,11.847,0,0,1-8.435-3.494,11.855,11.855,0,0,1-3.492-8.437,11.849,11.849,0,0,1,3.492-8.433A11.848,11.848,0,0,1-15498.071,0a11.849,11.849,0,0,1,8.434,3.494,11.847,11.847,0,0,1,3.493,8.433,11.852,11.852,0,0,1-3.493,8.437A11.848,11.848,0,0,1-15498.071,23.857ZM-15498,2a10.011,10.011,0,0,0-10,10,10.011,10.011,0,0,0,10,10,10.011,10.011,0,0,0,10-10A10.011,10.011,0,0,0-15498,2Z" transform="translate(15510)" class="fill-dark"/>
                                        </svg>
                                    </span>
                                    <div class="ml-4">
                                        <span class="fs-18 fw-600 d-block">{{ translate('Astronomic Information') }}</span>
                                    </div>
                                </div>
                                <div class="ml-3 ml-md-5 pl-25px">
                                    <div class="border p-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <table class="w-100">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1">{{translate('Sun Sign')}}</th>
                                                            <td class="py-1">{{ !empty($user->astrologies->sun_sign) ? $user->astrologies->sun_sign : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('Time Of Birth')}}</th>
                                                            <td class="py-1">{{ !empty($user->astrologies->time_of_birth) ? $user->astrologies->time_of_birth : "" }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6 border-sm-left">
                                                <table class="w-100 ml-sm-4">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1">{{translate('Moon Sign')}}</th>
                                                            <td class="py-1">{{ !empty($user->astrologies->moon_sign) ? $user->astrologies->moon_sign : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('City Of Birth')}}</th>
                                                            <td class="py-1">{{ !empty($user->astrologies->city_of_birth) ? $user->astrologies->city_of_birth : "" }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            
                            @if(get_setting('member_permanent_address_section') == 'on')
                                <!-- Permanent Address -->
                                <div class="pb-4">
                                    <div class="d-flex align-items-center mb-4">
                                        <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24.659" height="19.623" viewBox="0 0 24.659 19.623" class="fill-primary-grad">
                                                <g transform="translate(-1078.67 -2909.649)">
                                                    <path d="M111.028,264.3v7.342a.992.992,0,0,1-.979.979h-5.873V266.75h-3.915v5.873H94.387a.992.992,0,0,1-.979-.979V264.3a.209.209,0,0,1,.008-.046.209.209,0,0,0,.008-.046l8.795-7.25,8.795,7.25A.213.213,0,0,1,111.028,264.3Zm3.411-1.055-.948,1.132a.52.52,0,0,1-.321.168h-.046a.47.47,0,0,1-.321-.107l-10.584-8.825-10.584,8.825a.569.569,0,0,1-.367.107.52.52,0,0,1-.321-.168L90,263.248a.5.5,0,0,1-.107-.359.444.444,0,0,1,.168-.329l11-9.162a1.9,1.9,0,0,1,2.325,0l3.732,3.12v-2.983a.471.471,0,0,1,.489-.489h2.937a.471.471,0,0,1,.489.489v6.24l3.35,2.784a.444.444,0,0,1,.168.329A.5.5,0,0,1,114.439,263.248Z" transform="translate(988.781 2656.649)" fill="url(#primary-gradient)"/>
                                                </g>
                                            </svg>
                                        </span>
                                        <div class="ml-4">
                                            <span class="fs-18 fw-600 d-block">{{ translate('Permanent Address') }}</span>
                                        </div>
                                    </div>
                                    <div class="border p-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <table class="w-100">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1">{{translate('City')}}</th>
                                                            <td class="py-1">{{ !empty($permanent_address->city->name) ? $permanent_address->city->name : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('Country')}}</th>
                                                            <td class="py-1">{{ !empty($permanent_address->country->name) ? $permanent_address->country->name : "" }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6 border-sm-left">
                                                <table class="w-100 ml-sm-4">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1">{{translate('State')}}</th>
                                                            <td class="py-1">{{!empty($permanent_address->state->name) ? $permanent_address->state->name : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('Postal Code')}}</th>
                                                            <td class="py-1">{{ !empty($permanent_address->postal_code) ? $permanent_address->postal_code : "" }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            @if(get_setting('member_family_information_section') == 'on')
                                <!-- Family Information -->
                                <div class="pb-4">
                                    <div class="d-flex align-items-center mb-4">
                                        <span class="size-50px border rounded-circle d-flex align-items-center justify-content-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28.145" height="23.875" viewBox="0 0 28.145 23.875" class="fill-primary-grad">
                                                <g transform="translate(9.187 0)">
                                                    <path d="M-8182.819-3893.283a2.421,2.421,0,0,0,.14-.813v-8.226a5.652,5.652,0,0,0-.344-1.946h2.176a4.067,4.067,0,0,1,4.063,4.063v4.485a2.442,2.442,0,0,1-2.438,2.438Zm-19.671,0a2.441,2.441,0,0,1-2.437-2.438v-4.485a4.067,4.067,0,0,1,4.063-4.063h2.177a5.64,5.64,0,0,0-.344,1.946v8.226a2.47,2.47,0,0,0,.14.813Zm18.774-12.31a3.657,3.657,0,0,1-1.783-1.641,3.627,3.627,0,0,1-.431-1.715,3.659,3.659,0,0,1,3.655-3.655,3.658,3.658,0,0,1,3.653,3.655,3.657,3.657,0,0,1-3.653,3.653A3.617,3.617,0,0,1-8183.716-3905.592Zm-19.373-3.356a3.656,3.656,0,0,1,3.652-3.655,3.657,3.657,0,0,1,3.653,3.655,3.62,3.62,0,0,1-.429,1.715,3.649,3.649,0,0,1-1.785,1.641,3.607,3.607,0,0,1-1.439.3A3.656,3.656,0,0,1-8203.089-3908.949Z" transform="translate(8195.741 3917.158)" fill="url(#primary-gradient)"/>
                                                </g>
                                            </svg>
                                        </span>
                                        <div class="ml-4">
                                            <span class="fs-18 fw-600 d-block">{{ translate('Family Information') }}</span>
                                        </div>
                                    </div>
                                    <div class="border p-3">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <table class="w-100">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1">{{translate('Father')}}</th>
                                                            <td class="py-1">{{ !empty($user->families->father) ? $user->families->father : "" }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="py-1">{{translate('Sibling')}}</th>
                                                            <td class="py-1">{{ !empty($user->families->sibling) ? $user->families->sibling : "" }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6 border-sm-left">
                                                <table class="w-100 ml-sm-4">
                                                    <tbody>
                                                        <tr>
                                                            <th class="py-1">{{translate('Mother')}}</th>
                                                            <td class="py-1">{{ !empty($user->families->mother) ? $user->families->mother : "" }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

@endif

                        </div>
                    </div>
                    @if(get_setting('member_partner_expectation_section') == 'on')
                    <div class="tab-pane fade" id="preference">
                        <!-- Partner Expectation -->
                        <h2 class="text-primary fs-24 mb-5 pb-4 border-bottom">{{ translate('Partner Expectation')}}</h2>
                        <div class="">
                              <table class="table table-responsive">
                                  <tr>
                                      <th>{{translate('General')}}</th>
                                      <td>{{ !empty($user->partner_expectations->general) ? $user->partner_expectations->general : "" }}
                                      </td>

                                      <th>{{translate('Residence Country')}}</th>
                                      <td>
                                          @php
                                          $residence_country = !empty($user->partner_expectations->residence_country_id) ?
                                          $user->partner_expectations->residence_country_id : "";
                                          if(!empty($residence_country)){
                                          echo \App\Models\Country::where('id',$residence_country)->first()->name;
                                          }
                                          @endphp
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>{{translate('Height')}}</th>
                                      <td>{{ !empty($user->partner_expectations->height) ? $user->partner_expectations->height : "" }}
                                      </td>

                                      <th>{{translate('weight')}}</th>
                                      <td>{{ !empty($user->partner_expectations->weight) ? $user->partner_expectations->weight : "" }}
                                      </td>
                                  </tr>

                                  <tr>
                                      <th>{{translate('Marital Status')}}</th>
                                      <td>{{ !empty($user->partner_expectations->marital_status->name) ? $user->partner_expectations->marital_status->name : "" }}
                                      </td>

                                      <th>{{translate('Children Acceptable')}}</th>
                                      <td>{{ !empty($user->partner_expectations->children_acceptable) ? $user->partner_expectations->children_acceptable : "" }}
                                      </td>
                                  </tr>

                                  <tr>
                                      <th>{{translate('Religion')}}</th>
                                      <td>{{ !empty($user->partner_expectations->religion->name) ? $user->partner_expectations->religion->name : "" }}
                                      </td>

                                      <th>{{translate('Caste')}}</th>
                                      <td>{{ !empty($user->partner_expectations->caste->name) ? $user->partner_expectations->caste->name : "" }}
                                      </td>
                                  </tr>

                                  <tr>
                                      <th>{{translate('Sub Caste')}}</th>
                                      <td>{{ !empty($user->partner_expectations->sub_caste->name) ? $user->partner_expectations->sub_caste->name : "" }}
                                      </td>

                                      <th>{{translate('Language')}}</th>
                                      <td>{{ !empty($user->partner_expectations->language->name) ? $user->partner_expectations->language->name : "" }}
                                      </td>
                                  </tr>

                                  <tr>
                                      <th>{{translate('Education')}}</th>
                                      <td>{{ !empty($user->partner_expectations->education) ? $user->partner_expectations->education : "" }}
                                      </td>

                                      <th>{{translate('Profession')}}</th>
                                      <td>{{ !empty($user->partner_expectations->profession) ? $user->partner_expectations->profession : "" }}
                                      </td>
                                  </tr>

                                  <tr>
                                      <th>{{translate('Smoking Acceptable')}}</th>
                                      <td>{{ !empty($user->partner_expectations->smoking_acceptable) ? $user->partner_expectations->smoking_acceptable : "" }}
                                      </td>

                                      <th>{{translate('Drinking Acceptable')}}</th>
                                      <td>{{ !empty($user->partner_expectations->drinking_acceptable) ? $user->partner_expectations->drinking_acceptable : "" }}
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>{{translate('Diet')}}</th>
                                      <td>{{ !empty($user->partner_expectations->diet) ? $user->partner_expectations->diet : "" }}
                                      </td>

                                      <th>{{translate('Body Type')}}</th>
                                      <td>{{ !empty($user->partner_expectations->body_type) ? $user->partner_expectations->body_type : "" }}
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>{{translate('Personal Value')}}</th>
                                      <td>{{ !empty($user->partner_expectations->personal_value) ? $user->partner_expectations->personal_value : "" }}
                                      </td>

                                      <th>{{translate('Manglik')}}</th>
                                      <td>{{ !empty($user->partner_expectations->manglik) ? $user->partner_expectations->manglik : "" }}
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>{{translate('Preferred Country')}}</th>
                                      <td>
                                          @php
                                          $preferred_country = !empty($user->partner_expectations->preferred_country_id) ?
                                          $user->partner_expectations->preferred_country_id : "";
                                          if(!empty($preferred_country)){
                                          echo \App\Models\Country::where('id',$preferred_country)->first()->name;
                                          }
                                          @endphp
                                      </td>

                                      <th>{{translate('preferred_state_id')}}</th>
                                      <td>
                                          @php
                                          $preferred_state = !empty($user->partner_expectations->preferred_state_id) ?
                                          $user->partner_expectations->preferred_state_id : "";
                                          if(!empty($preferred_state)){
                                          echo \App\Models\State::where('id',$preferred_state)->first()->name;
                                          }
                                          @endphp
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>{{translate('Family Value')}}</th>
                                      <td>{{ !empty($user->partner_expectations->family_value->name) ? $user->partner_expectations->family_value->name : "" }}
                                      </td>

                                      <th>{{translate('complexion')}}</th>
                                      <td>{{ !empty($user->partner_expectations->complexion) ? $user->partner_expectations->complexion : "" }}
                                      </td>
                                  </tr>
                              </table>
                        </div>
                    </div>
                    @endif
                    <div class="tab-pane fade" id="gallery">
                        <h2 class="text-primary fs-24 mb-5 pb-4 border-bottom">{{ translate('Gallery')}}</h2>

                        @php
                            $gallery_image_show = 'ok';
                            $galley_image_privacy = $user->member->gallery_image_privacy;
                        @endphp

                        @if($galley_image_privacy == 0)
                            @php $gallery_image_show = 'no'; @endphp
                        @elseif($galley_image_privacy == 2)
                            @if(Auth::user()->membership == 1)
                                @php $gallery_image_show = 'no'; @endphp
                            @endif
                        @endif
                        @if($gallery_image_show == 'ok')
                            <div class="card-columns">
                                @php $galley_images = \App\Models\GalleryImage::where('user_id', $user->id)->latest()->get(); @endphp
                                @foreach($galley_images as $galley_image)
                                    <div class="card hov-overlay">
                                        <img src="{{ uploaded_asset($galley_image->image) }}" class="card-img" alt="{{translate('photo')}}">
                                        <div class="overlay">
                                            <a target="_blank" href="{{ uploaded_asset($galley_image->image) }}" class="text-white absolute-full d-flex justify-content-center align-items-center" title="View">
                                                <i class="las la-search-plus la-2x"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
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
    <div class="modal fade ignore_member_modal" id="modal-zoom">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h6">{{translate('Ignore Member!')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>{{ translate('Are you sure that you want to ignore this member?') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ translate('Close') }}</button>
                    <button type="submit" class="btn btn-primary" id="ignore_button">{{translate('Ignore')}}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Profile -->
    <div class="modal fade report_modal" id="modal-zoom">
        <div class="modal-dialog modal-dialog-centered modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h6">{{translate('Report Member!')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"></button>
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
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ translate('Cancel') }}</button>
                    <button type="button" class="btn btn-primary" onclick="submitReport()">{{ translate('Report') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
<script type="text/javascript">

    var package_validity = {{ package_validity(Auth::user()->id) }};

    // Express Interest
    var remaining_contact_view = {{ get_remaining_value(Auth::user()->id,'remaining_contact_view') }};
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

    // Express Interest
    var remaining_interest = {{ get_remaining_value(Auth::user()->id,'remaining_interest') }};
    function express_interest(id)
    {
        // if( package_validity == 0 || remaining_interest < 1){
        //     $('.package_update_alert_modal').modal('show');
        // }
        // else {
          $('.confirm_modal').modal('show');
          $("#confirm_modal_title").html("{{ translate('Confirm Express Interest!') }}");
          $("#confirm_modal_content").html("<p class='fs-14'>{{translate('Remaining Express Interest')}}: "+remaining_interest+" {{translate('Times')}}</p><small class='text-danger'>{{translate('**N.B. Expressing An Interest Will Cost 1 From Your Remaining Interests**')}}</small>");
          $("#confirm_button").attr("onclick","do_express_interest("+id+")");
        // }
    }
    function start_chat(id){
        $.post('{{ route('start.chat') }}',
          {
            _token: '{{ csrf_token() }}',
            id: id
          },
          function (data) {
            if (data == 1) {
              $("#shortlist_id_"+id).html("{{translate('Shortlisted')}}");
              $("#shortlist_a_id_"+id).attr("onclick","remove_shortlist("+id+")");
              AIZ.plugins.notify('success', '{{translate('Chat has been send.')}}');
            }
            
          }
        );
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
</script>
@endsection
