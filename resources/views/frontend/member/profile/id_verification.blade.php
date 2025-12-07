<!--<div class="card">-->
<!--    <div class="card-header">-->
<!--        <h5 class="mb-0 h6">{{translate('ID Verification')}}</h5>-->
<!--    </div>-->
<!--    <div class="card-body">-->
<!--        <form action="{{ route('id_verification.update', $member->id) }}" method="POST" enctype="multipart/form-data">-->
<!--            @csrf-->
<!--            <div class="form-group row">-->
<!--                <div class="col-md-12">-->
<!--                    <label for="id_upload">{{translate('Upload ID')}}</label>-->
<!--                    <input type="file" name="id_upload" class="form-control" required>-->
<!--                    @error('id_upload')-->
<!--                        <small class="form-text text-danger">{{ $message }}</small>-->
<!--                    @enderror-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="text-right">-->
<!--                <button type="submit" class="btn btn-primary btn-sm">{{translate('Upload')}}</button>-->
<!--            </div>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{ translate('ID Verification') }}</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Display Current File -->


        <!-- Upload Form -->
        <form action="{{ route('id_verification.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="id_upload">{{ translate('Upload Identity Proof') }}</label>
                    <input type="file" name="id_upload" class="form-control profile-input" required>
                    @error('id_upload')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                    @if(!empty($member->id_upload_path) && file_exists(storage_path('app/public/' . $member->id_upload_path)))

                    <div class="col-md-12 mt-3">
                        <label for="id_upload">{{ translate('Uploaded Identity Proof') }}</label>
                        <a href="{{ asset('storage/' . $member->id_upload_path) }}" class="btn btn-sm btn-success" download>
                            {{ translate('Download File') }}
                        </a>
                    </div>
                @endif

             </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">{{ translate('Upload') }}</button>
            </div>
        </form>
    </div>
</div>

