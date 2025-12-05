@extends('frontend.layouts.app')
@section('content')

<section class="pt-6 pb-4 bg-white text-center">
    <div class="container">
        <h1 class="mb-0 fw-600 text-dark">{{ translate('Select Your Package') }}</h1>
    </div>
</section>

<style>
    .pricing-section {
        background: radial-gradient(circle at top, #fdfbff 0, #f5f7fb 55%, #edf0f8 100%);
    }
    .pricing-section .carousel-box {
        margin-bottom: 2rem;
    }
    .pricing-card {
        position: relative;
        border-radius: 26px;
        background: #ffffff;
        box-shadow: 0 20px 45px rgba(15, 10, 43, 0.14);
        border: 1px solid rgba(226, 229, 241, 0.9);
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .pricing-card__badge {
        position: absolute;
        top: 12px;
        right: 14px;
        background: linear-gradient(135deg, #ff6b9b, #ff9052);
        color: #fff;
        font-size: .7rem;
        font-weight: 600;
        padding: .2rem .6rem;
        border-radius: 999px;
        text-transform: uppercase;
        letter-spacing: .08em;
    }
    .pricing-card__header {
        padding: 1.6rem 1.6rem 1.1rem;
        text-align: center;
        background: radial-gradient(circle at top, rgba(253, 101, 91, 0.09), transparent 60%);
    }
    .pricing-card__icon img {
        width: 60px;
        height: 60px;
        border-radius: 999px;
        object-fit: cover;
        box-shadow: 0 8px 18px rgba(15, 10, 43, 0.25);
    }
    .pricing-card__title {
        font-size: 1.2rem;
        margin: .75rem 0 .25rem;
        font-weight: 700;
        color: #1c1635;
    }
    .pricing-card__subtitle {
        font-size: .8rem;
        text-transform: uppercase;
        letter-spacing: .16em;
        color: #8b86a8;
    }
    .pricing-card__price {
        margin-top: .8rem;
        display: flex;
        justify-content: center;
        align-items: baseline;
        gap: .35rem;
    }
    .pricing-card__amount {
        font-size: 2rem;
        font-weight: 700;
        color: #fd655b;
    }
    .pricing-card__duration {
        font-size: .85rem;
        color: #8b86a8;
    }
    .pricing-card__body {
        padding: 1.4rem 1.7rem 1.7rem;
        display: flex;
        flex-direction: column;
        flex: 1;
    }
    .pricing-card__features {
        list-style: none;
        padding: 0;
        margin: 0 0 1.4rem 0;
        font-size: .9rem;
    }
    .pricing-card__features li {
        display: flex;
        align-items: flex-start;
        gap: .45rem;
        margin-bottom: .45rem;
    }
    .pricing-card__features i {
        margin-top: .18rem;
    }
    .pricing-card__footer {
        margin-top: auto;
        text-align: center;
    }
    .pricing-card__footer .btn {
        width: 100%;
        border-radius: 999px;
        padding: .65rem 1.6rem;
    }
    @media (max-width: 767.98px) {
        .pricing-section .carousel-box {
            width: 100%;
        }
    }
</style>

<section class="py-5 pricing-section">
    <div class="container">
        <div class="row">
            @foreach ($packages as $key => $package)
            @if($package->id != 1) 
                <div class="carousel-box col-md-4">
                    <div class="pricing-card">
                        @if($loop->first)
                            <div class="pricing-card__badge">{{ translate('Most Popular') }}</div>
                        @endif
                        <div class="pricing-card__header text-center">
                            <div class="pricing-card__icon mx-auto">
                                <img src="{{ static_asset('assets/img/email-campaign.svg') }}" alt="{{ $package->name }}">
                            </div>
                            <h5 class="pricing-card__title">{{$package->name}}</h5>
                            <div class="pricing-card__subtitle">{{ translate('Unlimited profiles with contacts') }}</div>
                            <div class="pricing-card__price">
                                <span class="pricing-card__amount">
                                    @if ($package->id == 1)
                                        {{ translate('Free') }}
                                    @else
                                        {{ single_price($package->price) }}
                                    @endif
                                </span>
                                <span class="pricing-card__duration">/ {{$package->validity}} {{translate('Days')}}</span>
                            </div>
                        </div>
                        <div class="pricing-card__body">
                            <ul class="pricing-card__features">
                                <li>
                                    <i class="las la-check text-success"></i>
                                    <span>{{ $package->express_interest }} {{ translate('Express Interests') }}</span>
                                </li>
                                {{-- <li class="list-group-item py-2">
                                    <i class="las la-check text-success mr-2"></i>
                                    {{ $package->photo_gallery }} {{ translate('Galley Photo Upload') }}
                                </li> --}}
                                <!--<li class="list-group-item py-2">-->
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
                                <li class="text-line-through">
                                    <i class="las la-check text-success mr-2"></i>
                                    {{ translate('Marriage Support') }}
                                </li>
                            </ul>
                            <div class="pricing-card__footer">
                                @if ($package->id != 1)
                                    @if(Auth::check())
                                        <a href="{{ route('package_payment_methods', encrypt($package->id)) }}" type="submit" class="btn btn-primary">{{translate('Purchase This Package')}}</a>
                                    @else
                                        <button type="submit" onclick="loginModal()" class="btn btn-primary" >{{translate('Purchase This Package')}}</button>
                                    @endif
                                @else
                                    <a href="javascript:void(0);" class="btn btn-light" ><del>{{translate('Purchase This Package')}}</del></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('modal')
    @include('modals.login_modal')
    @include('modals.package_update_alert_modal')
@endsection

@section('script')
<script type="text/javascript">

	// Login alert
    function loginModal(){
        $('#LoginModal').modal();
    }

    // Package update alert
    function package_update_alert(){
      $('.package_update_alert_modal').modal('show');
    }

</script>
@endsection
