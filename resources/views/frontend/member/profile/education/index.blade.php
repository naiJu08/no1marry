<style>
    .w-35
    {
        width:35% !important;
    }
</style>
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Education Info')}}</h5>
        <div class="text-right">
            <a onclick="education_add_modal('{{$member->id}}');"  href="javascript:void(0);" class="btn btn-sm btn-primary w-100 profile-section__add-btn" id="education">
              <i class="las mr-1 la-plus"></i>
              {{translate('Add New')}}
            </a>
        </div>
    </div>
    <div class="card-body">
        @php $educations = \App\Models\Education::where('user_id',$member->id)->get(); @endphp

        @if($educations->isEmpty())
            <p class="profile-empty-state mb-0">{{ translate('You have not added any education details yet.') }}</p>
        @else
            <div class="profile-list profile-list--education">
                @foreach ($educations as $key => $education)
                    <div class="profile-list-item">
                        <div class="profile-list-main">
                            <h6 class="profile-list-title mb-1">{{ $education->degree }}</h6>
                        </div>
                        <div class="profile-list-actions">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" id="status.{{ $key }}" onchange="update_education_present_status(this)" value="{{ $education->id }}" @if($education->present == 1) checked @endif data-switch="success"/>
                                <span></span>
                            </label>
                            <a href="javascript:void(0);" class="btn btn-softinfo btn-icon btn-circle btn-sm education" onclick="education_edit_modal('{{$education->id}}');" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-softdanger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('education.destroy', $education->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>


