@extends('frontend.layouts.app')
@section('content')
<style>
    .payment-page-section {
        background: radial-gradient(circle at top, #fdfbff 0, #f5f7fb 55%, #edf0f8 100%);
    }
    .payment-summary-card {
        border-radius: 24px;
        background: #ffffff;
        border: 1px solid rgba(226,229,241,0.9);
        box-shadow: 0 18px 38px rgba(15,10,43,0.12);
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .payment-summary-header {
        text-align: center;
        padding: 1.6rem 1.6rem 1.2rem;
        background: radial-gradient(circle at top, rgba(253, 101, 91, 0.08), transparent 65%);
    }
    .payment-summary-icon img {
        width: 60px;
        height: 60px;
        border-radius: 999px;
        object-fit: cover;
        box-shadow: 0 8px 18px rgba(15, 10, 43, 0.25);
    }
    .payment-summary-title {
        font-size: 1.1rem;
        margin-top: .75rem;
        margin-bottom: .25rem;
        font-weight: 700;
        color: #1c1635;
    }
    .payment-summary-subtitle {
        font-size: .78rem;
        text-transform: uppercase;
        letter-spacing: .14em;
        color: #8b86a8;
    }
    .payment-summary-body {
        padding: 1.2rem 1.6rem 1.5rem;
        display: flex;
        flex-direction: column;
        flex: 1;
    }
    .payment-summary-features {
        list-style: none;
        padding: 0;
        margin: 0 0 1.3rem 0;
        font-size: .9rem;
    }
    .payment-summary-features li {
        display: flex;
        align-items: flex-start;
        gap: .45rem;
        margin-bottom: .4rem;
    }
    .payment-summary-features i {
        margin-top: .18rem;
    }
    .payment-summary-price {
        text-align: center;
    }
    .payment-summary-price .amount {
        display: block;
        font-size: 1.7rem;
        font-weight: 700;
        color: #fd655b;
        line-height: 1.2;
    }
    .payment-summary-price .duration {
        font-size: .85rem;
        color: #8b86a8;
    }
    .payment-options-card {
        border-radius: 18px;
        border: 1px solid rgba(226,229,241,0.9);
    }
    .aiz-megabox-elem {
        height: 200px;
        border-radius: 16px;
    }
    @media (max-width: 991.98px) {
        .payment-summary-card {
            margin-bottom: 1.75rem;
        }
    }
</style>
<section class="py-5 payment-page-section">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-xl-4">
                <div class="payment-summary-card">
                    <div class="payment-summary-header">
                        <div class="payment-summary-icon">
                            <img src="{{ static_asset('assets/img/email-campaign.svg') }}" alt="{{ $package->name }}">
                        </div>
                        <div class="payment-summary-title">{{$package->name}}</div>
                        <div class="payment-summary-subtitle">{{ translate('Unlimited profiles with contacts') }}</div>
                    </div>
                    <div class="payment-summary-body">
                        <ul class="payment-summary-features">
                            <li>
                                <i class="las la-check text-success"></i>
                                <span>{{ $package->express_interest }} {{ translate('Express Interests') }}</span>
                            </li>
                            <li>
                                <i class="las la-check text-success"></i>
                                <span>{{ $package->photo_gallery }} {{ translate('Galley Photo Upload') }}</span>
                            </li>
                            <!--<li>-->
                            <!--    <i class="las la-check text-success mr-2"></i>-->
                            <!--    {{ $package->contact }} {{ translate('Contact Info View') }}-->
                            <!--</li>-->
                            <li class="text-line-through">
                                @if( $package->auto_profile_match == 0 )
                                    <i class="las la-times text-danger mr-2"></i>
                                    <del class="opacity-60">{{ translate('Show Auto Profile Match') }}</del>
                                @else
                                    <i class="las la-check text-success mr-2"></i>
                                    {{ translate('Show Auto Profile Match') }}
                                @endif
                            </li>
                        </ul>
                        <div class="payment-summary-price">
                            @php
                              $package_price = $package->price;
                            @endphp
                            @if ($package->id == 1)
                                <span class="display-4 fw-600 lh-1 mb-0">{{ translate('Free') }}</span>
                            @else
                                @if(addon_activation('referral_system') && Auth::user()->referred_by != null && Auth::user()->referral_comission == 0)
                                  @php
                                    $discount_type = get_setting('referral_user_package_purchase_discount_type');
                                    if($discount_type == 'percent'){
                                      $discount = ($package->price*get_setting('referral_user_package_purchase_discount'))/100;
                                    }
                                    else{
                                      $discount = get_setting('referral_user_package_purchase_discount');
                                    }
                                    $package_price = $package_price - $discount;
                                  @endphp
                                  <del class="opacity-60">{{ single_price($package->price) }}</del>
                                  <br>
                                  <span class="display-4 fw-600 lh-1 mb-0">{{single_price($package_price)}}</span>
                                @else
                                  <span class="display-4 fw-600 lh-1 mb-0">{{single_price($package_price)}}</span>
                                @endif
                            @endif
                            <span class="duration">{{$package->validity}} {{translate('Days')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form action="{{ route('package.payment') }}" class="form-default" role="form" method="POST" id="package-payment-form">
                    @csrf
                    <input type="hidden" name="package_id" value="{{ $package->id }}">
                    <input type="hidden" name="amount" value="{{ $package_price }}">
                    <input type="hidden" id="payment_type" value="">

                    <div class="card shadow-none payment-options-card">
                        <div class="card-header p-3">
                            <h3 class="fs-16 fw-600 mb-0">
                                {{ translate('Select a payment option')}}
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xxl-8 col-xl-10 mx-auto">
                                    <div class="row gutters-10">
                                        @if(get_setting('razorpay_payment_activation') == 1)
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="razorpay" class="online_payment" type="radio" name="payment_option">
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="{{ static_asset('assets/img/payment_method/rozarpay.png')}}" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15">{{ translate('Razorpay')}}</span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        @endif
                                        {{-- @if(get_setting('wallet_system') == 1)
                                        <div class="col-6 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="wallet" class="online_payment" type="radio" name="payment_option">
                                                <span class="d-block p-3 aiz-megabox-elem">
                                                    <img src="{{ static_asset('assets/img/payment_method/wallet.png')}}" class="img-fluid mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15">{{ translate('Wallet')}}</span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        @endif --}}
                                        @if(get_setting('manual_payment_1_activation') == 1)
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="manual_payment_1" type="radio" name="payment_option" class="manual_payment_1">
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="{{ uploaded_asset(get_setting('manual_payment_1_image')) }}" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15">{{ get_setting('manual_payment_1_name')}}</span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        @endif
                                        @if(get_setting('manual_payment_2_activation') == 1)
                                            <div class="col-6 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="manual_payment_2" type="radio" name="payment_option" class="manual_payment_2">
                                                    <span class="d-block p-3 aiz-megabox-elem">
                                                        <img src="{{ uploaded_asset(get_setting('manual_payment_2_image')) }}" class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span class="d-block fw-600 fs-15">{{ get_setting('manual_payment_2_name') }}</span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 d-none" id="manual_payment_1_info">
                                    <div class="bg-white border mb-3 p-3 rounded text-left ">
                                        @php echo get_setting('manual_payment_1_instruction')  @endphp
                                    </div>
                                </div>
                                <div class="col-md-12 d-none" id="manual_payment_2_info">
                                    <div class="bg-white border mb-3 p-3 rounded text-left ">
                                        @php echo get_setting('manual_payment_2_instruction')  @endphp
                                    </div>
                                </div>
                                <div class="col-md-12 d-none" id="purchase_by_manual_payment">
                                  <div class="form-group row">
                                      <div class="col-md-6">
                                          <label >{{translate('Transaction Id')}}<span class="text-danger"> *</span></label>
                                          <input type="text" name="transaction_id" id="transaction_id"  class="form-control" placeholder="{{translate('Transaction Id')}}">
                                      </div>
                                      <div class="col-md-6">
                                          <label>{{translate('Payment Proof')}}<span class="text-danger"> *</span></label>
                                          <div class="input-group" data-toggle="aizuploader" data-type="image">
                                              <div class="input-group-prepend">
                                                  <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                              </div>
                                              <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                              <input type="hidden" name="payment_proof" id="payment_proof" class="selected-files">
                                          </div>
                                          <div class="file-preview box sm">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-md-12">
                                      <label>{{translate('Payment Details')}}</label>
                                      <textarea type="text" name="payment_details" class="form-control" rows="2" placeholder="{{translate('Payment Details')}}"></textarea>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" text-right pt-3">
                        <button type="button" onclick="package_purchase(this)" class="btn btn-primary fw-600 purchase_button" disabled>{{ translate('Confirm')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready(function(){
            $(".online_payment").click(function(){
                $('#manual_payment_1_info').addClass('d-none');
                $('#manual_payment_2_info').addClass('d-none');
                $('#purchase_by_manual_payment').addClass('d-none');
                $(".purchase_button").prop('disabled', false);
                $("#payment_type").val('online_payment');
            });
            $(".manual_payment_1").click(function(){
                $('#manual_payment_1_info').removeClass('d-none');
                $('#manual_payment_2_info').addClass('d-none');
                $('#purchase_by_manual_payment').removeClass('d-none');
                $(".purchase_button").prop('disabled', false);
                $("#payment_type").val('manual_payment');
            });
            $(".manual_payment_2").click(function(){
                $('#manual_payment_1_info').addClass('d-none');
                $('#manual_payment_2_info').removeClass('d-none');
                $('#purchase_by_manual_payment').removeClass('d-none');
                $(".purchase_button").prop('disabled', false);
                $("#payment_type").val('manual_payment');
            });
        });

        function package_purchase(el){
            $(el).prop('disabled', true);
            var payment_type = $("#payment_type").val();
            if (payment_type == 'manual_payment') {
                var transaction_id = $("#transaction_id").val();
                var payment_proof = $("#payment_proof").val();
                if(transaction_id == '' || payment_proof == '')
                {
                  AIZ.plugins.notify('danger','{{ translate('Please Provide transaction id and payemnt proof.') }}');
                  $(el).prop('disabled', false);
                }
                else {
                  $('#package-payment-form').submit();
                }
            }
            else {
              $('#package-payment-form').submit();
            }
        }
    </script>
@endsection
