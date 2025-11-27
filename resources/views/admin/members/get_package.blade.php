<!--<form action="{{ route('members.package_do_update', $member_id) }}" method="POST">-->
<!--<form action="https://no1marry.com/admin/members/package_do_update/{{ $member_id }}" method="POST">-->
<!--    @csrf-->
<!--    <div class="modal-header">-->
<!--        <h5 class="modal-title h6">{{translate('Upgrade Package')}}</h5>-->
<!--        <button type="button" class="close" data-dismiss="modal"></button>-->
<!--    </div>-->
<!--    <div class="modal-body">-->
<!--        <div class="row gutters-10">-->
<!--            @foreach($packages as $package)-->
<!--            <div class="col-4 col-md-3">-->
<!--                <label class="aiz-megabox d-block mb-3">-->
<!--                    <input value="{{ $package->id }}" type="radio" name="package_id">-->
<!--                    <span class="d-block p-3 aiz-megabox-elem">-->
<!--                        <img src="{{ uploaded_asset($package->image)}}" class="img-fluid mb-2">-->
<!--                        <span class="d-block text-center">-->
<!--                            <span class="d-block fw-600 fs-15">{{ $package->name }}</span>-->
<!--                        </span>-->
<!--                    </span>-->
<!--                </label>-->
<!--            </div>-->
<!--            @endforeach-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="modal-footer">-->
<!--    <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Close')}}</button>-->
<!--    <button type="submit" class="btn btn-success">{{translate('Submit')}}</button>-->
<!--</div>-->
<!--</form>-->

<!-- Include CSRF token in meta for JS to use -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="modal-header">
    <h5 class="modal-title h6">{{translate('Upgrade Package')}}</h5>
    <button type="button" class="close" data-dismiss="modal"></button>
</div>
<div class="modal-body">
    <div class="row gutters-10">
        @foreach($packages as $package)
        <div class="col-4 col-md-3">
            <div onclick="upgradePackage({{ $package->id }})" class="aiz-megabox d-block mb-3" style="cursor: pointer;">
                <span class="d-block p-3 aiz-megabox-elem">
                    <img src="{{ uploaded_asset($package->image)}}" class="img-fluid mb-2">
                    <span class="d-block text-center">
                        <span class="d-block fw-600 fs-15">{{ $package->name }}</span>
                    </span>
                </span>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Close')}}</button>
</div>

<script>
    function upgradePackage(packageId) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        fetch("https://no1marry.com/admin/members/package_do_update/{{ $member_id }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ package_id: packageId })
        })
        .then(response => {
            if (!response.ok) throw new Error('Upgrade failed');
            return response.json(); // Optional: depends on your API response
        })
        .then(data => {
            alert('Package upgraded successfully!');
            location.reload(); // Optional: update UI or close modal
        })
        .catch(error => {
            console.error(error);
            alert('There was an error upgrading the package.');
        });
    }
</script>
