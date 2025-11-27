<form action="{{ route('career.store') }}" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title h6">{{translate('Add New Career Info')}}</h5>
       
    </div>
    <div class="modal-body">
        <input type="hidden" name="user_id" value="{{ $member_id }}">
        <div class="form-group row">
            <label class="col-md-3 col-form-label">{{translate('Designation')}}</label>
            <div class="col-md-9">
                <input type="text" name="designation" class="form-control" placeholder="{{translate('designation')}}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label">{{translate('Sector')}}</label>
            <div class="col-md-9">
                              <select required class="form-control" name="sector" id="sector">
                <option disabled selected>Select Job Status</option>
                <option>Government Sector</option>
                <option>Private Sector</option>
                <option>Self Employed</option>
              </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary"  id="carrerbtn">{{translate('Close')}}</button>-->
        <button type="submit" class="btn w-50 btn-primary">{{translate('Add New Career Info')}}</button>
    </div>
</form>
<script>
    $(document).ready(function(){
        $("#carrerbtn").click(function(){
            $(".create_edit_modal").hide();
            $(".modal-backdrop").hide();
        });
         $(".carrericon").click(function(){
            $(".create_edit_modal").show();
            $(".modal-backdrop").show();
        });
         $(".close").click(function(){
            $(".create_edit_modal").hide();
            $(".modal-backdrop").hide();
        });
    });
</script>