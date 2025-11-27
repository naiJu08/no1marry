<div class="modal fade confirm_modal" id="modal-basic">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
              <h5 class="modal-title h6" id="confirm_modal_title"></h5>
            <button type="button" class="close" onclick="confirmclosebasic()"></button>
        </div>
        <div class="modal-body text-center" id="confirm_modal_content">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="confirmclosebasic()">{{ translate('Close') }}</button>
          <button type="submit" class="btn btn-primary" id="confirm_button">{{translate('Confirm')}}</button>
        </div>
      </div>
  </div>
</div>
<script>
  function confirmclosebasic() {
    $('.confirm_modal').modal('hide');
  }
  document.getElementById('closeButton').addEventListener('click', closePopup)
</script>