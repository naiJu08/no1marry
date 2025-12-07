<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Physical Attributes')}}</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('physical-attribute.update', $member->id) }}" method="POST">
          <input name="_method" type="hidden" value="PATCH">
          @csrf
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="height">{{translate('Height')}} ({{ translate('In Feet') }})</label>
                  <input type="number" name="height" value="{{ !empty($member->physical_attributes->height) ? $member->physical_attributes->height : "" }}" step="any" class="form-control profile-input" placeholder="{{translate('Height')}}" required>
                  @error('height')
                      <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
              </div>
              <div class="col-md-6">
                  <label for="weight">{{translate('Weight')}} ({{ translate('In Kg')}})</label>
                  <input type="number" name="weight" value="{{ !empty($member->physical_attributes->weight) ? $member->physical_attributes->weight : "" }}" step="any" placeholder="{{ translate('Weight') }}" class="form-control profile-input" required>
                  @error('weight')
                      <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
              </div>
          </div>



          <div class="form-group row">
               <div class="col-md-6">
                  <label for="disability">{{translate('Disability')}}</label>
                  <input type="text" name="disability" value="{{ !empty($member->physical_attributes->disability) ? $member->physical_attributes->disability : "" }}" class="form-control profile-input" placeholder="{{translate('Disability')}}">
                  @error('disability')
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
