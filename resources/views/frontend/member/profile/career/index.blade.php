<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Career')}}</h5>
        <div class="text-right">
            <a onclick="career_add_modal('{{$member->id}}');"  href="javascript:void(0);" class="btn btn-sm w-100 btn-primary profile-section__add-btn carrer ">
              <i class="las mr-1 la-plus"></i>
              {{translate('Add New')}}
            </a>
        </div>
    </div>
    <div class="card-body">
        @php $careers = \App\Models\Career::where('user_id',$member->id)->get(); @endphp

        @if($careers->isEmpty())
            <p class="profile-empty-state mb-0">{{ translate('You have not added any career information yet.') }}</p>
        @else
            <div class="profile-list profile-list--career">
              @foreach ($careers as $key => $career)
              <div class="profile-list-item">
                  <div class="profile-list-main">
                      <h6 class="profile-list-title mb-1">{{ $career->designation }}</h6>
                      <p class="mb-0 small text-muted">{{ $career->sector }}</p>
                  </div>
                  <div class="profile-list-actions">
                      <label class="aiz-switch aiz-switch-success mb-0">
                          <input type="checkbox" id="status.{{ $key }}" onchange="update_career_present_status(this)" value="{{ $career->id }}" @if($career->present == 1) checked @endif data-switch="success"/>
                          <span></span>
                      </label>
                      <a href="javascript:void(0);" class="btn btn-softinfo btn-icon btn-circle btn-sm carrericon" onclick="career_edit_modal('{{$career->id}}');" title="{{ translate('Edit') }}">
                          <i class="las la-edit"></i>
                      </a>
                      <a href="javascript:void(0);" class="btn btn-softdanger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('career.destroy', $career->id)}}" title="{{ translate('Delete') }}">
                          <i class="las la-trash"></i>
                      </a>
                  </div>
              </div>
              @endforeach
            </div>
        @endif

    </div>
</div>
