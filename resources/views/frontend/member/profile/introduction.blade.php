<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Introduction')}}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('member.introduction.update', $member->id) }}" method="POST">
            @csrf
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="introduction" >{{translate('Introduction')}}</label>
                    <textarea name="introduction" class="form-control profile-input" rows="5" placeholder="{{translate('Tell us something about yourself...')}}">{{ optional($member->member)->introduction }}</textarea>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>
            </div>
        </form>
    </div>
</div>
