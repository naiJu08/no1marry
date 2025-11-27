<form action="{{ route('education.store') }}" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title h6">{{translate('Add New Education Info')}}</h5>
        <!--<button type="button" class="close">-->
        <!--</button>-->
    </div>
    <div class="modal-body" id="degree">
        <input type="hidden" name="user_id" value="{{ $member_id }}">
        <div class="form-group row">
            <label class="col-md-3 col-form-label">{{translate('Education')}}</label>
            <div class="col-md-9">
                <input type="text" name="degree" class="form-control" placeholder="{{translate('Education')}}" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" id="edu1">{{translate('Close')}}</button>-->
        <button type="submit" class="btn w-35 btn-primary">{{translate('Add New Education Info')}}</button>
    </div>
</form>


<script>
    $(document).ready(function(){
        $("#edu1").click(function(){
            $(".create_edit_modal").hide();
            $(".modal-backdrop").hide();
        });
        $("#education").click(function(){
            $(".create_edit_modal").show();
            $(".modal-backdrop").show();
        });
         $(".close").click(function(){
            $(".create_edit_modal").hide();
            $(".modal-backdrop").removeClass( "show" )
        });
    });
</script>
