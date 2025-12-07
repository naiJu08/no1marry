<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Spiritual & Social Background')}}</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('spiritual_backgrounds.update', $member->id) }}" method="POST">
          <input name="_method" type="hidden" value="PATCH">
          @csrf
          <input type="hidden" name="address_type" value="present">
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="member_religion_id">{{translate('Religion')}}</label>
                  <div class="profile-select-wrapper">
                      <select class="form-control profile-input profile-select" name="member_religion_id" id="member_religion_id" data-live-search="true" required>
                          <option value="">{{translate('Select One')}}</option>
                          @foreach ($religions as $religion)
                              <option value="{{$religion->id}}" @if($religion->id == $member_religion_id) selected @endif> {{ $religion->name }} </option>
                          @endforeach
                      </select>
                  </div>
                  @error('member_religion_id')
                      <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
              </div>
              <div class="col-md-6">
                  <label for="member_caste_id">{{translate('Caste')}}</label>
                  <div class="profile-select-wrapper">
                      <select class="form-control profile-input profile-select" name="member_caste_id" id="member_caste_id" data-live-search="true" required>

                      </select>
                  </div>
                  @error('member_caste_id')
                      <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
              </div>
          </div>
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="member_sub_caste_id">{{translate('Sub Caste')}}</label>
                  <div class="profile-select-wrapper">
                      <select class="form-control profile-input profile-select" name="member_sub_caste_id" id="member_sub_caste_id" data-live-search="true">

                      </select>
                  </div>
              </div>
              <div class="col-md-6">
                  <label for="member_family_value_id">{{translate('Family Status')}}</label>
              <div class="profile-select-wrapper">
              <select class="form-control profile-input profile-select" name="family_value_id" id="family_value_id">
                <option disabled selected>Select Family Values</option>
                <?php foreach ($family_values as $family_value) {
                ?>
                <option value="<?php  echo $family_value->id ?>"><?php  echo $family_value->name ?></option>
                <?php } ?>
              </select>
              </div>
          </div>
          <div class="text-right">
              <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>
          </div>
      </form>
    </div>
</div>
