@extends('frontend.layouts.app')
@section('content')
<style>
#badge-profile
{
    width: 100px !important;
    padding: 7%;
    height: 28px;
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
    </style>
<section  class="mt-3 glass-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card glass-surface">
                    <div class="card-header">
                        <h2 class="fs-16 mb-0">{{  translate('Matched profile') }}</h2>
                    </div>
                    <div class="card-body">
                        @if(Auth::user()->member->auto_profile_match == 1)
                        <div>
                            @forelse ($similar_profiles->shuffle()->take(5) as $similar_profile)
                              @if($similar_profile->matched_profile != null)
                                <a href="{{ route('member_profile', $similar_profile->match_id) }}" class="text-reset border rounded row no-gutters align-items-center mb-3 glass-card p-2">
                                    <div class="col-auto w-100px">
                                      @php
                                          $profile_picture_show = 'ok';
                                          $profile_picture_privacy = $similar_profile->matched_profile->member->profile_picture_privacy;
    
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
                                            @if($profile_picture_show == 'ok')
                                            src="{{ uploaded_asset($similar_profile->matched_profile->photo) }}"
                                            @else
                                            src="{{ static_asset('assets/img/avatar-place.png') }}"
                                            @endif
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';"
                                            class="img-fit w-100 size-100px"
                                       alt="no.1marry" >
                                    </div>
                                    <div class="col">
                                      <div class="p-3">
                                          <h5 class="fs-16 text-body text-truncate">{{ $similar_profile->matched_profile->first_name.' '.$similar_profile->matched_profile->last_name }}</h5>
                                          <div class="fs-12 text-truncate-3">
                                              <span class="mr-1 d-inline-block">
                                                @if(!empty($similar_profile->matched_profile->member->birthday))
                                                  {{ \Carbon\Carbon::parse($similar_profile->matched_profile->member->birthday)->age }} {{ translate('yrs') }},
                                                @endif
                                              </span>
                                              <span class="mr-1 d-inline-block">
                                                @if(!empty($similar_profile->matched_profile->physical_attributes->height))
                                                  {{ $similar_profile->matched_profile->physical_attributes->height }} {{ translate('Feet') }},
                                                @endif
                                              </span>
                                              <span class="mr-1 d-inline-block">
                                                @if(!empty($similar_profile->matched_profile->member->marital_status->name))
                                                  {{ $similar_profile->matched_profile->member->marital_status->name }},
                                                @endif
                                              </span>
                                              <span class="mr-1 d-inline-block">
                                                {{ !empty($similar_profile->matched_profile->spiritual_backgrounds->religion->name) ? $similar_profile->matched_profile->spiritual_backgrounds->religion->name.', ' : "" }}
                                              </span>
                                              <span class="mr-1 d-inline-block">
                                                {{ !empty($similar_profile->matched_profile->spiritual_backgrounds->caste->name) ? $similar_profile->matched_profile->spiritual_backgrounds->caste->name.', ' : "" }}
                                              </span>
                                              <span class="mr-1 d-inline-block">
                                                <td class="py-1">{{ !empty($similar_profile->matched_profile->spiritual_backgrounds->sub_caste->name) ? $similar_profile->matched_profile->spiritual_backgrounds->sub_caste->name : "" }}</td>
                                              </span>
                                          </div>
                                      </div>
                                    </div>
                                </a>
                              @endif
                            @empty
                             @php
                                $partner_religion_id   = !empty($member->partner_expectations->religion_id) ? $member->partner_expectations->religion_id : "";
                                $partner_caste_id      = !empty($member->partner_expectations->caste_id) ? $member->partner_expectations->caste_id : "";
                                $partner_sub_caste_id  = !empty($member->partner_expectations->sub_caste_id) ? $member->partner_expectations->sub_caste_id : "";
                                $partner_country_id    = !empty($member->partner_expectations->preferred_country_id) ? $member->partner_expectations->preferred_country_id : "";
                                $partner_state_id      = !empty($member->partner_expectations->preferred_state_id) ? $member->partner_expectations->preferred_state_id : "";
                             @endphp
                                <div class="alert alert-info" style="color: #fff;background-color: #ff4000;">{{  translate("Now, if you don't have a partner preference for automatching, check for your partner preference. If you don't have one, add your partner preference.") }}</div>
                                <div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Partner Preference')}}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('partner_expectations.update', $member->id) }}" method="POST">
            <input name="_method" type="hidden" value="PATCH">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="general">{{translate('General Requirement')}}</label>
                    <input type="text" name="general" value="{{ !empty($member->partner_expectations->general) ? $member->partner_expectations->general : "" }}" class="form-control" placeholder="{{translate('General')}}" required>
                </div>
                <div class="col-md-6">
                    <label for="residence_country_id">{{translate('Residence Country')}}</label>
                    @php $partner_residence_country = !empty($member->partner_expectations->residence_country_id) ? $member->partner_expectations->residence_country_id : ""; @endphp
                    <select class="form-control " name="residence_country_id" data-live-search="true" required>
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}" @if($country->id == $partner_residence_country) selected @endif >{{$country->name}}</option>
                        @endforeach
                    </select>
                    @error('residence_country_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_height">{{translate('Min Height')}}  ({{ translate('In Feet') }})</label>
                    <input type="number" name="partner_height" value="{{ !empty($member->partner_expectations->height) ? $member->partner_expectations->height : "" }}" step="any"  placeholder="{{ translate('Height') }}" class="form-control" required>
                    @error('partner_height')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="partner_weight">{{translate('Max Weight')}}  ({{ translate('In Kg') }})</label>
                    <input type="number" name="partner_weight" value="{{ !empty($member->partner_expectations->weight) ? $member->partner_expectations->weight : "" }}" step="any" class="form-control" placeholder="{{translate('Weight')}}" required>
                    @error('partner_weight')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_marital_status">{{translate('Marital Status')}}</label>
                    @php $partner_marital_status_id = !empty($member->partner_expectations->marital_status_id) ? $member->partner_expectations->marital_status_id : ""; @endphp
                    <select class="form-control " name="partner_marital_status" data-live-search="true" required>
                        <option value="">{{ translate('Choose One') }}</option>
                        @foreach ($marital_statuses as $marital_status)
                        <option value="{{$marital_status->id}}" @if($partner_marital_status_id == $marital_status->id) selected @endif>{{$marital_status->name}}</option>
                        @endforeach
                    </select>
                    @error('partner_marital_status')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="partner_children_acceptable">{{translate('Children Acceptable')}}</label>
                    @php $children_acceptable = !empty($member->partner_expectations->children_acceptable) ? $member->partner_expectations->children_acceptable : ""; @endphp
                    <select class="form-control " name="partner_children_acceptable" required>
                        <option value="">{{ translate('Choose One') }}</option>
                        <option value="yes" @if($children_acceptable ==  'yes') selected @endif >{{translate('Yes')}}</option>
                        <option value="no" @if($children_acceptable ==  'no') selected @endif >{{translate('No')}}</option>
                        <option value="dose_not_matter" @if($children_acceptable ==  'dose_not_matter') selected @endif >{{translate('Dose not matter')}}</option>
                    </select>
                    @error('partner_children_acceptable')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_religion_id">{{translate('Religion')}}</label>
                    <select class="form-control " name="partner_religion_id" id="partner_religion_id" data-live-search="true" required>
                        <option value="">{{translate('Select One')}}</option>
                        @foreach ($religions as $religion)
                            <option value="{{$religion->id}}" @if($religion->id == $partner_religion_id) selected @endif> {{ $religion->name }} </option>
                        @endforeach
                    </select>
                    @error('partner_religion_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="partner_caste_id">{{translate('Caste')}}</label>
                    <select class="form-control " name="partner_caste_id" id="partner_caste_id" data-live-search="true">

                    </select>
                    @error('partner_caste_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_sub_caste_id">{{translate('Sub Caste')}}</label>
                    <select class="form-control " name="partner_sub_caste_id" id="partner_sub_caste_id" data-live-search="true">

                    </select>
                </div>
                <div class="col-md-6">
                    <label for="language_id">{{translate('Language')}}</label>
                    @php $partner_language = !empty($member->partner_expectations->language_id) ? $member->partner_expectations->language_id : ""; @endphp
                    <select class="form-control " name="language_id" data-live-search="true" required>
                        <option value="">{{translate('Select One')}}</option>
                        @foreach ($languages as $language)
                            <option value="{{$language->id}}" @if($language->id == $partner_language) selected @endif> {{ $language->name }} </option>
                        @endforeach
                    </select>
                    @error('language_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="pertner_education">{{translate('Education')}}</label>
                    <input type="text" name="pertner_education" value="{{ !empty($member->partner_expectations->education) ? $member->partner_expectations->education : "" }}" class="form-control" placeholder="{{translate('Education')}}">
                    @error('pertner_education')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="partner_profession">{{translate('Profession')}}</label>
                    <input type="text" name="partner_profession" value="{{ !empty($member->partner_expectations->profession) ? $member->partner_expectations->profession : "" }}" class="form-control" placeholder="{{translate('Profession')}}">
                    @error('partner_profession')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="smoking_acceptable">{{translate('Smoking Acceptable')}}</label>
                    @php $partner_smoking_acceptable = !empty($member->partner_expectations->smoking_acceptable) ? $member->partner_expectations->smoking_acceptable : ""; @endphp
                    <select class="form-control " name="smoking_acceptable" required>
                        <option value="yes" @if($partner_smoking_acceptable ==  'yes') selected @endif >{{translate('Yes')}}</option>
                        <option value="no" @if($partner_smoking_acceptable ==  'no') selected @endif >{{translate('No')}}</option>
                        <option value="dose_not_matter" @if($partner_smoking_acceptable ==  'dose_not_matter') selected @endif >{{translate('Dose not matter')}}</option>
                    </select>
                    @error('smoking_acceptable')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="drinking_acceptable">{{translate('Drinking Acceptable')}}</label>
                    @php $partner_drinking_acceptable = !empty($member->partner_expectations->drinking_acceptable) ? $member->partner_expectations->drinking_acceptable : ""; @endphp
                    <select class="form-control " name="drinking_acceptable" required>
                        <option value="yes" @if($partner_drinking_acceptable ==  'yes') selected @endif >{{translate('Yes')}}</option>
                        <option value="no" @if($partner_drinking_acceptable ==  'no') selected @endif >{{translate('No')}}</option>
                        <option value="dose_not_matter" @if($partner_drinking_acceptable ==  'dose_not_matter') selected @endif >{{translate('Dose not matter')}}</option>
                    </select>
                    @error('drinking_acceptable')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_diet">{{translate('Dieting Acceptable')}}</label>
                    @php $partner_dieting_acceptable = !empty($member->partner_expectations->diet) ? $member->partner_expectations->diet : ""; @endphp
                    <select class="form-control " name="partner_diet" required>
                        <option value="yes" @if($partner_dieting_acceptable ==  'yes') selected @endif >{{translate('Yes')}}</option>
                        <option value="no" @if($partner_dieting_acceptable ==  'no') selected @endif >{{translate('No')}}</option>
                        <option value="dose_not_matter" @if($partner_dieting_acceptable ==  'dose_not_matter') selected @endif >{{translate('Dose not matter')}}</option>
                    </select>
                    @error('partner_diet')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="partner_body_type">{{translate('Body Type')}}</label>
                    <input type="text" name="partner_body_type" value="{{ !empty($member->partner_expectations->body_type) ? $member->partner_expectations->body_type : "" }}" class="form-control" placeholder="{{translate('Body Type')}}">
                    @error('partner_body_type')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_personal_value">{{translate('Personal Value')}}</label>
                    <input type="text" name="partner_personal_value" value="{{ !empty($member->partner_expectations->personal_value) ? $member->partner_expectations->personal_value : "" }}" class="form-control" placeholder="{{translate('Personal Value')}}">
                    @error('partner_personal_value')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="partner_manglik">{{translate('Manglik')}}</label>
                    @php $partner_manglik = !empty($member->partner_expectations->manglik) ? $member->partner_expectations->manglik : ""; @endphp
                    <select class="form-control " name="partner_manglik" required>
                        <option value="yes" @if($partner_manglik ==  'yes') selected @endif >{{translate('Yes')}}</option>
                        <option value="no" @if($partner_manglik ==  'no') selected @endif >{{translate('No')}}</option>
                        <option value="dose_not_matter" @if($partner_manglik ==  'dose_not_matter') selected @endif >{{translate('Dose not matter')}}</option>
                    </select>
                    @error('partner_manglik')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_country_id">{{translate('Preferred Country')}}</label>
                    <select class="form-control " name="partner_country_id" id="partner_country_id" data-live-search="true" required>
                        <option value="">{{translate('Select One')}}</option>
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}" @if($country->id == $partner_country_id) selected @endif>{{$country->name}}</option>
                        @endforeach
                    </select>
                    @error('partner_country_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="partner_state_id">{{translate('Preferred State')}}</label>
                    <select class="form-control " name="partner_state_id" id="partner_state_id" data-live-search="true">

                    </select>
                    @error('partner_state_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="family_value_id">{{translate('Family Value')}}</label>
                    <select class="form-control " name="family_value_id" >
                        <option value="">{{translate('Select One')}}</option>
                        @foreach ($family_values as $family_value)
                            <option value="{{$family_value->id}}" @if($family_value->id == !empty($member->partner_expectations->family_value_id) ? $member->partner_expectations->family_value_id : "") selected @endif> {{ $family_value->name }} </option>
                        @endforeach
                    </select>
                    @error('family_value_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pertner_complexion">{{translate('Complexion')}}</label>
                    <input type="text" name="pertner_complexion" value="{{ !empty($member->partner_expectations->complexion) ? $member->partner_expectations->complexion : "" }}" class="form-control" placeholder="{{translate('Complexion')}}" required>
                    @error('pertner_complexion')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>
            </div>
        </form>
    </div>
</div>
                                <!--<a class="btn btn-primary btn-lg" id="btn-partner" href="{{ route('profile_settings') }}" style="width: 20%;"> partner Preference</a>-->
                            @endforelse
                        </div>
                        @else
                            <div class="alert alert-info">{{  translate('Upgrade your package for auto match making') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
