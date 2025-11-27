<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayUMoneyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\PublicProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//demo
Route::get('/demo/cron_1', 'DemoController@cron_1');
Route::get('/demo/cron_2', 'DemoController@cron_2');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout.post');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


Route::match(['get', 'post'], '/verify', [RegisterController::class, 'verify_otp'])->name('verify.otp');
Route::match(['get', 'post'], 'resent-otp/{id}', [RegisterController::class, 'resent_otp'])->name('resent.otp');

Route::post('/contact', function () {
    toastr()->success("Your massege sended successful");
    return redirect()->back();
})->name('contact');

Route::get('/terms_and_conditions', function () {
    return view('frontend.terms_and_conditions');
});
Route::get('/privacy_policy', function () {
    return view('frontend.privacy_policy');
});
Route::get('/shipping_and_delivery', function () {
    return view('frontend.shipping_and_delivery');
});
Route::get('/cancellation_and_refund', function () {
    return view('frontend.cancellation_and_refund');
});
Route::get('/help_and_support', function () {
    return view('frontend.help_and_support');
});
//Home Page
Route::get('/user/registration', 'HomeController@index')->name('index');
Route::get('/', 'HomeController@base')->name('base');
Route::get('/home', function () {
    return view('home');
})->name('home');

// Uploader
Route::get('/refresh-csrf', function () {
    return csrf_token();
});
Route::post('/aiz-uploader', 'AizUploadController@show_uploader');
Route::post('/aiz-uploader/upload', 'AizUploadController@upload');
Route::get('/aiz-uploader/get_uploaded_files', 'AizUploadController@get_uploaded_files');
Route::delete('/aiz-uploader/destroy/{id}', 'AizUploadController@destroy');
Route::post('/aiz-uploader/get_file_by_ids', 'AizUploadController@get_preview_files');
Route::get('/aiz-uploader/download/{id}', 'AizUploadController@attachment_download')->name('download_attachment');
Route::get('/migrate/database', 'AizUploadController@migrate_database');

// Password reset
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset.post');

// Email verification
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('/verification-confirmation/{code}', 'Auth\VerificationController@verification_confirmation')->name('email.verification.confirmation');
Route::get('/email_change/callback', 'HomeController@email_change_callback')->name('email_change.callback');
Route::post('/password/reset/email/submit', 'HomeController@reset_password_with_code')->name('password.update');


Route::get('/users/login', 'HomeController@login')->name('user.login');
Route::get('/social-login/redirect/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/social-login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::get('/users/blocked', 'HomeController@user_account_blocked')->name('user.blocked');

Route::post('/language', 'LanguageController@changeLanguage')->name('language.change');
Route::post('/currency', 'CurrencyController@changeCurrency')->name('currency.change');


Route::get('/packages', 'PackageController@select_package')->name('packages');
Route::get('/happy-stories', 'HomeController@happy_stories')->name('happy_stories');
Route::get('/story_details/{id}', 'HomeController@story_details')->name('story_details');

Route::group(['middleware' => ['member']], function () {

    Route::any('/member-listing', 'HomeController@member_listing')->name('member.listing');

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/matches', 'HomeController@matches')->name('matches');
    Route::get('/marriage-support/{id}', 'HomeController@marriage_support')->name('marriage.support');
    Route::get('/photo-request/{id}', 'HomeController@photo_request')->name('photo.request');
    Route::post('/new-user-email', 'HomeController@update_email')->name('user.change.email');
    Route::post('/new-user-verification', 'HomeController@new_verify')->name('user.new.verify');




    Route::get('/profile-settings', 'MemberController@profile_settings')->name('profile_settings');
    Route::get('/package-payment-methods/{id}', 'PackageController@package_payemnt_methods')->name('package_payment_methods');
    Route::post('/package-payment', 'PackagePaymentController@store')->name('package.payment');

    Route::get('/package-purchase-history', 'PackagePaymentController@package_purchase_history')->name('package_purchase_history');

    Route::get('/member-profile/{id}', 'HomeController@view_member_profile')->name('member_profile');
    Route::get('/member/profile-clean/{id}', 'HomeController@view_member_profile_clean')->name('member_profile_clean');

    // Password Change
    Route::get('/members/change-password', 'MemberController@change_password')->name('member.change_password');
    Route::post('/member/password-update/{id}', 'MemberController@password_update')->name('member.password_update');

    // Member Picture privacy
    Route::get('/members/picture-privacy', 'MemberController@picture_privacy')->name('member.picture_privacy');
    Route::post('/member/update-picture-privacy/{id}', 'MemberController@update_picture_privacy')->name('member.update_picture_privacy');

    // Gallery Image
    Route::resource('/gallery-image', 'GalleryImageController');
    Route::get('/gallery_image/destroy/{id}', 'GalleryImageController@destroy')->name('gallery_image.destroy');

    // Account deacticvation
    Route::post('/member/account-activation', 'MemberController@update_account_deactivation_status')->name('member.account_deactivation');


    // Express Interest
    Route::resource('/express-interest', 'ExpressInterestController');
    Route::get('/my-interests', 'ExpressInterestController@index')->name('my_interests.index');
    Route::get('/interest/requests', 'ExpressInterestController@interest_requests')->name('interest_requests');
    Route::post('/interest/accept', 'ExpressInterestController@accept_interest')->name('accept_interest');
    Route::post('/interest/reject', 'ExpressInterestController@reject_interest')->name('reject_interest');

    // Chat
    Route::get('/chat', 'ChatController@index')->name('all.messages');
    Route::get('/single-chat/{id}', 'ChatController@chat_view')->name('chat_view');
    Route::post('/chat-reply', 'ChatController@chat_reply')->name('chat.reply');
    Route::get('/chat/refresh/{id}', 'ChatController@chat_refresh')->name('chat_refresh');
    Route::post('/chat/old-messages', 'ChatController@get_old_messages')->name('get-old-message');
    Route::post('/create-chat', 'ChatController@create_chat')->name('start.chat');


    // ShortList list, Add, Remove
    Route::get('/my-shortlists', 'ShortlistController@index')->name('my_shortlists');
    Route::post('/member/add-to-shortlist', 'ShortlistController@create')->name('member.add_to_shortlist');
    Route::post('/member/remove-from-shortlist', 'ShortlistController@remove')->name('member.remove_from_shortlist');

    // Ignore list, Add, Remove
    Route::get('/ignored-list', 'IgnoredUserController@index')->name('my_ignored_list');
    Route::post('/member/add-to-ignore-list', 'IgnoredUserController@add_to_ignore_list')->name('member.add_to_ignore_list');
    Route::post('/member/remove-from-ignored-list', 'IgnoredUserController@remove_from_ignored_list')->name('member.remove_from_ignored_list');

    Route::resource('reportusers', 'ReportedUserController');
    Route::resource('view_contacts', 'ViewContactController');

    // Wallet
    Route::get('/wallet', 'WalletController@index')->name('wallet.index');
    Route::get('/wallet-recharge-methods', 'WalletController@wallet_recharge_methods')->name('wallet.recharge_methods');
    Route::post('/recharge', 'WalletController@recharge')->name('wallet.recharge');


    Route::get('/member/notifications', 'NotificationController@frontend_notify_listing')->name('frontend.notifications');
    Route::post('/id-verification/{id}', 'MemberController@updateIDVerification')->name('id_verification.update');
    Route::get('/member/{id}/verification-id', 'MemberController@verification_id')->name('member.verification_id');

    // Route::post('/id-verification/{id}', [MemberController::class, 'updateIDVerification'])->name('id_verification.update');


});
Route::post('test/states/get_state_by_country', 'StateController@get_state_by_country')->name('states.get_state_by_country');
Route::post('test/cities/get_cities_by_state', 'CityController@get_cities_by_state')->name('cities.get_cities_by_state');
Route::post('test/castes/get_caste_by_religion', 'CasteController@get_caste_by_religion')->name('castes.get_caste_by_religion');
Route::post('/uplode/uplode_pro_pic', 'MemberController@update_pro_pic')->name('uplode.uplode_pro_pic');



Route::group(['middleware' => ['auth']], function () {
    // member info edit

    Route::post('/members/introduction_update/{id}', 'MemberController@introduction_update')->name('member.introduction.update');
    Route::post('/members/basic_info_update/{id}', 'MemberController@basic_info_update')->name('member.basic_info_update');
    Route::post('/members/language_info_update/{id}', 'MemberController@language_info_update')->name('member.language_info_update');

    Route::resource('/address', 'AddressController');

    // Member education
    Route::resource('/education', 'EducationController');
    Route::post('/education/create', 'EducationController@create')->name('education.create');
    Route::post('/education/edit', 'EducationController@edit')->name('education.edit');
    Route::post('/education/update_education_present_status', 'EducationController@update_education_present_status')->name('education.update_education_present_status');
    Route::get('/education/destroy/{id}', 'EducationController@destroy')->name('education.destroy');

    // Member Career
    Route::resource('/career', 'CareerController');
    Route::post('/career/create', 'CareerController@create')->name('career.create');
    Route::post('/career/edit', 'CareerController@edit')->name('career.edit');
    Route::post('/career/update_career_present_status', 'CareerController@update_career_present_status')->name('career.update_career_present_status');
    Route::get('/career/destroy/{id}', 'CareerController@destroy')->name('career.destroy');

    Route::resource('/physical-attribute', 'PhysicalAttributeController');
    Route::resource('/hobbies', 'HobbyController');
    Route::resource('/attitudes', 'AttitudeController');
    Route::resource('/recidencies', 'RecidencyController');
    Route::resource('/lifestyles', 'LifestyleController');
    Route::resource('/astrologies', 'AstrologyController');
    Route::resource('/families', 'FamilyController');
    Route::resource('/spiritual_backgrounds', 'SpiritualBackgroundController');
    Route::resource('/partner_expectations', 'PartnerExpectationController');

    Route::post('/states/get_state_by_country', 'StateController@get_state_by_country')->name('states.get_state_by_country');
    Route::post('/cities/get_cities_by_state', 'CityController@get_cities_by_state')->name('cities.get_cities_by_state');
    Route::post('/castes/get_caste_by_religion', 'CasteController@get_caste_by_religion')->name('castes.get_caste_by_religion');
    Route::post('/sub-castes/get_sub_castes_by_religion', 'SubCasteController@get_sub_castes_by_religion')->name('sub_castes.get_sub_castes_by_religion');

    Route::get('/package-payment-invoice/{id}', 'PackagePaymentController@package_payment_invoice')->name('package_payment.invoice');

    Route::resource('/happy-story', 'HappyStoryController');

    Route::get('/notification-view/{id}', 'NotificationController@notification_view')->name('notification_view');
});

// Payment gateway Redirect

//Paypal START
Route::get('/paypal/payment/done', 'PaypalController@getDone')->name('payment.done');
Route::get('/paypal/payment/cancel', 'PaypalController@getCancel')->name('payment.cancel');
//Paypal END

Route::get('/instamojo/payment/pay-success', 'InstamojoController@success')->name('instamojo.success');
Route::post('rozer/payment/pay-success', 'RazorpayController@payment')->name('payment.rozer');

//Stipe Start
Route::get('stripe', 'StripeController@stripe');
Route::post('/stripe/create-checkout-session', 'StripeController@create_checkout_session')->name('stripe.get_token');
Route::any('/stripe/payment/callback', 'StripeController@callback')->name('stripe.callback');
Route::get('/stripe/success', 'StripeController@success')->name('stripe.success');
Route::get('/stripe/cancel', 'StripeController@cancel')->name('stripe.cancel');
//Stripe END

//payu start
Route::match(['get', 'post'], 'pay-u-money-view', [PayUMoneyController::class, 'payUMoneyView'])->name('pay.u.pay');
Route::match(['get', 'post'], 'pay-u-response', [PayUMoneyController::class, 'payUResponse'])->name('pay.u.response');
Route::match(['get', 'post'], 'pay-u-cancel', [PayUMoneyController::class, 'payUCancel'])->name('pay.u.cancel');
//payu End

Route::get('/customer-products/admin', 'HomeController@profile_edit')->name('profile.edit');
Route::get('/check_for_package_invalid', 'PackageController@check_for_package_invalid')->name('member.check_for_package_invalid');

Route::get('/match_profiles', 'ProfileMatchController@match_profiles')->name('match_profiles');
Route::get('/migrate/products/', 'ProfileMatchController@migrate_profiles');

Route::get('/check', 'HomeController@check');
Route::get('/permissions', 'HomeController@permissions');

//Custom page
Route::get('/{slug}', 'PageController@show_custom_page')->name('custom-pages.show_custom_page');
Route::post('test/castes/get_caste_by_religion_noauth', 'ExtraController@get_caste_by_religion')->name('castes.get_caste_by_religion.noauth');

Route::post('extra/city', 'ExtraController@getCityByState')->name('extra.city');


Route::post('members/register', 'HomeController@userRegistration')->name('members.register');


Route::post('/razorpay/payment', [RazorpayController::class, 'payment'])->name('razorpay.payment');
Route::post('razorpay/payment/success', [RazorpayController::class, 'paymentSuccess'])->name('razorpay.payment.success');
Route::get('/profile/payment-or-profile', [PublicProfileController::class, 'showPaymentOrProfile'])->name('profile.paymentOrProfile');

Route::post('/profile-payment', 'PackagePaymentController@store')->name('package.payment');
