<form action="{{ route('career.update', $career->id) }}" method="POST">
    <input name="_method" type="hidden" value="PATCH">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title h6">{{translate('Edit Career Info')}}</h5>
        <button type="button" class="close" onclick="closebasic()">
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-md-3 col-form-label">{{translate('Designation')}}</label>
            <div class="col-md-9">
                <input type="text" name="designation" value="{{$career->designation}}" class="form-control" placeholder="{{translate('designation')}}" required>
            </div>
        </div>
                <div class="form-group row">
            <label class="col-md-3 col-form-label">{{translate('Sector')}}</label>
            <div class="col-md-9">
                <select required class="form-control" name="sector" id="sector" value="{{$career->sector}}">
                <option>Government Sector</option>
                <option>Private Sector</option>
                <option>Self Employed</option>
              </select>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary carrerbtn" onclick="closebasic()">{{translate('Close')}}</button>-->
        <button type="submit" class="btn w-50 btn-primary">{{translate('Update Career Info')}}</button>
    </div>
</form>
<script>
    $(document).ready(function(){
        $(".carrerbtn").click(function(){
            $(".create_edit_modal").hide();
            $(".modal-backdrop").hide();
        });
         $(".carrer").click(function(){
            $(".create_edit_modal").show();
            $(".modal-backdrop").show();
        });
         $(".close").click(function(){
            $(".create_edit_modal").hide();
            $(".modal-backdrop").hide();
        });
    });
</script>