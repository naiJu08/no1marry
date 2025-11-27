<form action="{{ route('education.update', $education->id) }}" method="POST">
    <input name="_method" type="hidden" value="PATCH">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title h6">{{translate('Edit Education Info')}}</h5>
        <!--<button type="button" class="close" onclick="closebasic()">-->
        <!--</button>-->
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-md-3 col-form-label">{{translate('Education')}}</label>
            <div class="col-md-9">
                <input type="text" name="degree" value="{{$education->degree}}" class="form-control" placeholder="{{translate('Education')}}" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
                <button type="button" class="btn btn-secondary edu">{{translate('Close')}}</button>
        <button type="submit" class="btn btn-primary w-35">{{translate('Update Education Info')}}</button>
    </div>
</form>


<script>
    $(document).ready(function(){
        $(".edu").click(function(){
            $(".create_edit_modal").hide();
            $(".modal-backdrop").hide();
        });
        $(".education").click(function(){
            $(".create_edit_modal").show();
            $(".modal-backdrop").show();
        });
         $(".close").click(function(){
            $(".create_edit_modal").hide();
            $(".modal-backdrop").removeClass( "show" )
        });
    });
</script>
