@extends('frontend.layouts.member_panel')
@section('panel_content')
<style>
.modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
    z-index: 9999;
}
.btn-circle 
{
      width: max-content !important;
}
    .table-responsive {
     display: inline-table !important;
     width: 100%;
     overflow-x: auto;
     -webkit-overflow-scrolling: touch;
  } 
   #fluid
    {
        z-index:99 ;
    }
    #usermenu-nav
{
       display:none;
    position: absolute;
    will-change: transform;
    top: 0px;
    left: -50%;
    transform: translate3d(-27px, 47px, 0px);
}
  @media only screen 
   and (min-device-width: 210px) 
   and (max-device-width:320px)
  {
  
   .table-responsive {
     display:block !important;
     width: 100%;
     overflow-x: auto;
     -webkit-overflow-scrolling: touch;
  } 
  
  }
  @media only screen 
   and (min-device-width: 320px) 
   and (max-device-width: 480px)
  {
      .table-responsive {
     display:block !important;
     width: 100%;
     overflow-x: auto;
     -webkit-overflow-scrolling: touch;
  } 
  
  }
  @media only screen 
   and (min-device-width:480px) 
   and (max-device-width:620px)
  {
      .table-responsive {
     display:block !important;
     width: 100%;
     overflow-x: auto;
     -webkit-overflow-scrolling: touch;
  } 
  }
  @media only screen 
   and (min-device-width:620px) 
   and (max-device-width:720px)
   { .table-responsive {
     display:block !important;
     width: 100%;
     overflow-x: auto;
     -webkit-overflow-scrolling: touch;
  } 
  
   }
  @media only screen 
   and (min-device-width:720px) 
   and (max-device-width:820px)
   {
  
  
  }
  @media only screen 
   and (min-device-width:820px) 
   and (max-device-width:1200px)
   {
  
  
  
  
  
  }
  
  
  
  </style>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('Interest Requests') }}</h5>
        </div>
        <div class="card-body">
            <table class="table table-responsive mb-0">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>{{translate('Image')}}</th>
                      <th>{{translate('Name')}}</th>
                      <th>{{translate('Age')}}</th>
                      <th class="text-center">{{translate('Action')}}</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($interests as $key => $interest)
                      @php $interested_by = \App\User::where('id',$interest->interested_by)->first(); @endphp
                      <tr id="interested_member_{{ $interested_by->id }}">
                          <td>{{ ($key+1) + ($interests->currentPage() - 1)*$interests->perPage() }}</td>
                          <td>
                              <a
                                  @if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1)
                                      href="javascript:void(0);" onclick="package_update_alert()"
                                  @else
                                      href="{{ route('member_profile', $interested_by->id) }}"
                                  @endif
                                  class="text-reset c-pointer"
                              >
                                  @if(uploaded_asset($interested_by->photo) != null)
                                      <img class="img-md" src="{{ uploaded_asset($interested_by->photo) }}" height="45px"  alt="{{translate('photo')}}">
                                  @else
                                      <img class="img-md" src="{{ static_asset('assets/img/avatar-place.png') }}" height="45px"  alt="{{translate('photo')}}">
                                  @endif
                              </a>
                          </td>
                          <td>
                              <a
                                  @if(get_setting('full_profile_show_according_to_membership') == 1 && Auth::user()->membership == 1)
                                      href="javascript:void(0);" onclick="package_update_alert()"
                                  @else
                                      href="{{ route('member_profile', $interested_by->id) }}"
                                  @endif
                                  class="text-reset c-pointer"
                              >
                                  {{ $interested_by->first_name.' '.$interested_by->last_name }}</td>
                              </a>

                          <td>{{ \Carbon\Carbon::parse($interested_by->member->birthday)->age }}</td>
                         <td class="text-center">
                             @if($interest->status != 1)
                                <a href="javascript:void(0);" onclick="accept_interest({{ $interest->id }})" class="btn btn-success btn-icon btn-circle btn-sm" title="{{ translate('Accept') }}">
         							Accept
         						</a>
                     			<a href="javascript:void(0);" onclick="reject_interest({{ $interest->id }})" class="btn btn-danger btn-icon btn-circle btn-sm confirm-delete" title="{{ translate('Reject') }}">
                     				Reject
                     			</a>
                            @else
                                <span class="badge badge-inline badge-success">{{translate('Accepted')}}</span>
                            @endif
                         </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $interests->links() }}
            </div>
        </div>
    </div>
@endsection
@section('modal')
    {{-- Interest Accept modal--}}
    <div class="modal fade interest_accept_modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{translate('Interest Accept!')}}</h4>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
                </div>
                <div class="modal-body text-center">
                    <form class="form-horizontal member-block" action="{{ route('accept_interest') }}" method="POST">
                        @csrf
                        <input type="hidden" name="interest_id" id="interest_accept_id" value="">
                        <p class="mt-1">{{translate('Are you sure you want to accept this interest?')}}</p>
                        <button type="button" class="btn btn-danger cancel mt-2" data-dismiss="modal">{{translate('Cancel')}}</button>
                        <button type="submit" class="btn btn-info mt-2">{{translate('Confirm')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Interest Reject Modal --}}
    <div class="modal fade interest_reject_modal" id="fade1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title h6">{{translate('Interest Reject !')}}</h4>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
                </div>
                <div class="modal-body text-center">
                    <form class="form-horizontal member-block" action="{{ route('reject_interest') }}" method="POST">
                        @csrf
                        <input type="hidden" name="interest_id" id="interest_reject_id" value="">
                        <p class="mt-1">{{translate('Are you sure you want to rejet his interest?')}}</p>
                        <button type="button" class="btn btn-danger cancel mt-2" data-dismiss="modal">{{translate('Cancel')}}</button>
                        <button type="submit" class="btn btn-info mt-2">{{translate('Confirm')}}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
 <script>
	  $(document).ready(function() {
  
  // required elements
  var imgPopup = $('.img-popup');
  var imgCont  = $('.container__img-holder');
  var popupImage = $('.img-popup img');
  var closeBtn = $('.close-btn');
  
  // handle events
  imgCont.on('click', function() {
	var img_src = $(this).children('img').attr('src');
	imgPopup.children('img').attr('src', img_src);
	imgPopup.addClass('opened');
  });
  
  $(imgPopup, closeBtn).on('click', function() {
	imgPopup.removeClass('opened');
	imgPopup.children('img').attr('src', '');
  });
  
  popupImage.on('click', function(e) {
	e.stopPropagation();
  });
  
  });
  </script>
<script type="text/javascript">

    function accept_interest(id) {
        $('.interest_accept_modal').modal('show');
        $('#interest_accept_id').val(id);
    }

    function reject_interest(id) {
        $('.interest_reject_modal').modal('show');
        $('#interest_reject_id').val(id);
    }

</script>
<script>
    $(".cancel").click(function(){
        $(".fade").hide();
    });
     $(".cancel").click(function(){
        $("#fade1").hide();
    })
</script>
@endsection
