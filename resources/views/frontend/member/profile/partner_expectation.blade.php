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



            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>
            </div>
        </form>
    </div>
</div>
