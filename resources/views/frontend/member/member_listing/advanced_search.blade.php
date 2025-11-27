<style>
    .glass-advanced{padding:8px}
    .glass-advanced__grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:12px}
    .glass-advanced .filter-span-12{grid-column:1 / -1}
    .glass-advanced .input-icon > select,
    .glass-advanced .input-icon > input,
    .glass-advanced .input-icon > .glass-input{width:100%}
    .glass-advanced__footer{display:flex;justify-content:flex-end;margin-top:10px}
</style>
<div class="glass-advanced">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="mb-0 h6 text-uppercase text-secondary">{{ translate('Advanced Filters') }}</h5>
        <a href="{{ route('member.listing') }}" class="filter-reset">{{ translate('Reset all') }}</a>
    </div>
    <div class="glass-advanced__grid">
        <div class="filter-bar__field filter-span-12">
            <label>{{ translate('Marital Status') }}</label>
            @php $marital_statuses = \App\Models\MaritalStatus::all(); @endphp
            <div class="input-icon">
                <i class="las la-ring"></i>
                <select class="glass-input" name="marital_status" data-live-search="true">
                    <option value="">{{translate('Select One')}}</option>
                    @foreach ($marital_statuses as $marital_status)
                        <option value="{{$marital_status->id}}" @if($matital_status == $marital_status->id) selected @endif >{{$marital_status->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="filter-bar__field filter-span-12">
            <label>{{ translate('Religion') }}</label>
            @php $religions = \App\Models\Religion::all(); @endphp
            <div class="input-icon">
                <i class="las la-church"></i>
                <select name="religion_id" id="religion_id" class="glass-input"  data-live-search="true" >
                    <option value="">{{translate('Choose One')}}</option>
                    @foreach ($religions as $religion)
                        <option value="{{ $religion->id }}" @if($religion->id == $religion_id) selected @endif> {{ $religion->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="filter-bar__field">
            <label>{{ translate('Caste') }}</label>
            <div class="input-icon">
                <i class="las la-users"></i>
                <select name="caste_id" id="caste_id" class="glass-input" data-live-search="true" >
                    <option value="">{{translate('Select One')}}</option>
                </select>
            </div>
        </div>
        <div class="filter-bar__field">
            <label>{{ translate('Sub Caste') }}</label>
            <div class="input-icon">
                <i class="las la-sitemap"></i>
                <select name="sub_caste_id" id="sub_caste_id" class="glass-input" data-live-search="true">
                    <option value="">{{translate('Select One')}}</option>
                </select>
            </div>
        </div>
        <div class="filter-bar__field">
            <label>{{ translate('Mother Tongue') }}</label>
            @php $mother_tongues = \App\Models\MemberLanguage::all(); @endphp
            <div class="input-icon">
                <i class="las la-language"></i>
                <select name="mother_tongue" class="glass-input" data-live-search="true" >
                    <option value="">{{translate('Select One')}}</option>
                    @foreach ($mother_tongues as $mother_tongue_select)
                        <option value="{{$mother_tongue_select->id}}" @if($mother_tongue_select->id == $mother_tongue) selected @endif> {{ $mother_tongue_select->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="filter-bar__field">
            <label>{{ translate('Profession') }}</label>
            <div class="input-icon">
                <i class="las la-briefcase"></i>
                <input type="text" name="profession" value="{{ $profession }}" class="glass-input" >
            </div>
        </div>
        <div class="filter-bar__field filter-span-12">
            <label>{{ translate('Location') }}</label>
            <div class="filter-bar__grid">
                <div class="filter-bar__field filter-bar__field--sm4">
                    <div class="input-icon">
                        <i class="las la-globe"></i>
                        @php $countries = \App\Models\Country::where('status',1)->get(); @endphp
                        <select name="country_id" id="country_id" class="glass-input" data-live-search="true" >
                            <option value="">{{translate('Country')}}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if($country->id == $country_id) selected @endif >{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="filter-bar__field filter-bar__field--sm4">
                    <div class="input-icon">
                        <i class="las la-map"></i>
                        <select name="state_id" id="state_id" class="glass-input" data-live-search="true" ></select>
                    </div>
                </div>
                <div class="filter-bar__field filter-bar__field--sm4">
                    <div class="input-icon">
                        <i class="las la-city"></i>
                        <select name="city_id" id="city_id" class="glass-input" data-live-search="true" ></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-bar__field">
            <label>{{ translate('Min Height (feet)') }}</label>
            <div class="input-icon">
                <i class="las la-arrows-alt-v"></i>
                <input type="number" name="min_height" value="{{ $min_height }}" class="glass-input" min="0" step="0.01"  >
            </div>
        </div>
        <div class="filter-bar__field">
            <label>{{ translate('Max Height (feet)') }}</label>
            <div class="input-icon">
                <i class="las la-arrows-alt"></i>
                <input type="number" name="max_height" value="{{ $max_height }}" class="glass-input" min="0" step="0.01"   >
            </div>
        </div>
        <div class="filter-bar__field filter-span-12">
            <label class="d-block mb-2 text-uppercase fs-12 text-secondary">{{ translate('Member Type') }}</label>
            <div class="glass-radio-list">
                <label class="glass-radio">
                    <input type="radio" name="member_type" value="2" onchange="applyFilter()" @if($member_type == 2) checked @endif>
                    <span>{{ translate('Premium Member') }}</span>
                    <div class="glass-radio__mark"></div>
                </label>
                <label class="glass-radio">
                    <input type="radio" name="member_type" value="1" onchange="applyFilter()"  @if($member_type == 1) checked @endif>
                    <span>{{ translate('Free member') }}</span>
                    <div class="glass-radio__mark"></div>
                </label>
                <label class="glass-radio">
                    <input type="radio" name="member_type" value="0" @if($member_type == 0) checked @endif>
                    <span>{{ translate('All Member') }}</span>
                    <div class="glass-radio__mark"></div>
                </label>
            </div>
        </div>
    </div>
    <div class="glass-advanced__footer">
        <button type="submit" class="btn btn-primary btn-glass px-4">{{ translate('Apply Filters') }}</button>
    </div>
</div>
