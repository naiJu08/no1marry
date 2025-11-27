@extends('admin.layouts.app')
@section('content')
<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{translate('Marriage Support')}}</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header row gutters-5">
  				<div class="col text-center text-md-left">
  					<h5 class="mb-md-0 h6">{{ translate('Marriage Support List') }}</h5>
  				</div>
  				<div class="col-md-3">
  					<form class="" id="sort_members" action="" method="GET">
  						<div class="input-group input-group-sm">
  					  		<input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Requsted Member / Respected Member / ID & Enter') }}">
  						</div>
  					</form>
  				</div>
		    </div>
            <div class="card-body">
                <table class="table aiz-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th data-breakpoints="md">{{translate('Requsted Member')}}</th>
                            <th data-breakpoints="md">{{translate('Respected Member')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $key => $member)
                            <tr>
                                <td>{{ ($key+1) + ($members->currentPage() - 1)*$members->perPage() }}</td>
                                <td>
                                @php
                                $requsted_member=\App\User::where('id',$member->requsted_id)->first();
                                @endphp
                                
                                {{ $requsted_member->first_name.' '.$requsted_member->last_name }}  |  {{$requsted_member->code}}<br>
                                <a href="{{ route('members.show', $member->requsted_id) }}">{{translate('View')}}</a>
                                </td>
                                 <td>
                                @php
                                $respected_member=\App\User::where('id',$member->needed_id)->first();
                                @endphp
                                 {{ $respected_member->first_name.' '.$respected_member->last_name }}  |  {{$respected_member->code}}<br>
                                <a href="{{ route('members.show', $member->needed_id) }}">{{translate('View')}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    {{ $members->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
    {{-- Member Approval Modal --}}
    <div class="modal fade member-approval-modal" id="modal-basic">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{translate('Member Approval !')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body text-center">
                    <form class="form-horizontal member-block" action="{{ route('members.approve') }}" method="POST">
                        @csrf
                        <input type="hidden" name="member_id" id="member_id" value="">
                        <p class="mt-1">{{translate('Are you sure to approve this member?')}}</p>
                        <button type="button" class="btn btn-link mt-2" data-dismiss="modal">{{translate('Cancel')}}</button>
                        <button type="submit" class="btn btn-info mt-2">{{translate('Approve')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Member Block Modal--}}
    <div class="modal fade member-block-modal" id="modal-basic">
    	<div class="modal-dialog">
    		<div class="modal-content">
                <form class="form-horizontal member-block" action="{{ route('members.block') }}" method="POST">
                    @csrf
                    <input type="hidden" name="member_id" id="block_member_id" value="">
                    <input type="hidden" name="block_status" id="block_status" value="">
                    <div class="modal-header">
                        <h5 class="modal-title h6">{{translate('Member Block !')}}</h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{translate('Blocking Reason')}}</label>
                            <div class="col-md-9">
                                <textarea type="text" name="blocking_reason" class="form-control" placeholder="{{translate('Blocking Reason')}}" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Close')}}</button>
                        <button type="submit" class="btn btn-info">{{translate('Submit')}}</button>
                    </div>
                </form>
        	</div>
    	</div>
    </div>

    <!-- Member Unblock Modal -->
    <div class="modal fade member-unblock-modal" id="modal-basic">
    	<div class="modal-dialog">
    		<div class="modal-content">
            <form class="form-horizontal member-block" action="{{ route('members.block') }}" method="POST">
                @csrf
                <input type="hidden" name="member_id" id="unblock_member_id" value="">
                <input type="hidden" name="block_status" id="unblock_block_status" value="">
                <div class="modal-header">
                    <h5 class="modal-title h6">{{translate('Member Unblock !')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <b>{{translate('Blocked Reason')}} : </b>
                        <span id="block_reason"></span>
                    </p>
                    <p class="mt-1">{{translate('Are you want to unblock this member?')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Close')}}</button>
                    <button type="submit" class="btn btn-info">{{translate('Unblock')}}</button>
                </div>
            </form>
      	</div>
    	</div>
    </div>

    <div class="modal fade member_wallet_balance_modal" id="modal-basic">
    	<div class="modal-dialog">
    		<div class="modal-content">
            <form class="form-horizontal member-block" action="{{ route('member.wallet_balance_update') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" id="user_id_wallet_balance" value="">
                <div class="modal-header">
                    <h5 class="modal-title h6">{{translate('Wallet Balance Update')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                  <div class="row">
                      <div class="col-md-4">
                          <label>{{ translate('Current Banalce')}}</label>
                      </div>
                      <div class="col-md-8">
                          <input type="number" class="form-control mb-3" id="member_wallet_balance" value="" readonly>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                          <label>{{ translate('Update Type')}} <span class="text-danger">*</span></label>
                      </div>
                      <div class="col-md-8">
                          <div class="mb-3">
                              <select class="form-control selectpicker" data-minimum-results-for-search="Infinity" name="payment_option" data-live-search="true">
                                <option value="added_by_admin">{{ translate('Add')}}</option>
                                <option value="deducted_by_admin">{{ translate('Deduct')}}</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                          <label>{{ translate('Amount')}} <span class="text-danger">*</span></label>
                      </div>
                      <div class="col-md-8">
                          <input type="number" lang="en" class="form-control mb-3" name="wallet_amount" placeholder="{{ translate('Amount')}}" required>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Close')}}</button>
                    <button type="submit" class="btn btn-info">{{translate('Submit')}}</button>
                </div>
            </form>
      	</div>
    	</div>
    </div>

    @include('modals.create_edit_modal')
    @include('modals.delete_modal')
@endsection

@section('script')
<script type="text/javascript">
    function sort_members(el){
        $('#sort_members').submit();
    }

     function package_info(id){
         $.post('{{ route('members.package_info') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
             $('.create_edit_modal_content').html(data);
             $('.create_edit_modal').modal('show');
         });
     }

     function get_package(id){
         $.post('{{ route('members.get_package') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
             $('.create_edit_modal_content').html(data);
             $('.create_edit_modal').modal('show');
         });
     }


     function approve_member(id){
         $('.member-approval-modal').modal('show');
         $('#member_id').val(id);
     }

     function block_member(id){
         $('.member-block-modal').modal('show');
         $('#block_member_id').val(id);
         $('#block_status').val(1);
     }

     function unblock_member(id){
         $('#unblock_member_id').val(id);
         $('#unblock_block_status').val(0);
         $.post('{{ route('members.blocking_reason') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
             $('.member-unblock-modal').modal('show');
             $('#block_reason').html(data);
         });
     }

     function wallet_balance_update(id, balance){
          $('.member_wallet_balance_modal').modal('show');
          $('#user_id_wallet_balance').val(id);
          $('#member_wallet_balance').val(balance);
     }

</script>
@endsection
